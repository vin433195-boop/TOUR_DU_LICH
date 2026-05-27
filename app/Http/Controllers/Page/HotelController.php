<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Location;
use App\Models\BookHotel;
use App\Models\User;
use App\Http\Requests\BookHotelRequest;
use Illuminate\Support\Facades\Auth;

class HotelController extends Controller
{
    public function index(Request $request)
    {
        $hotels = Hotel::with('user');

        if ($request->key_hotel) {
            $hotels->where('h_name', 'like', '%'.$request->key_hotel.'%');
        }

        if ($request->location_id) {
            $hotels->where('h_location_id', $request->location_id);
        }

        if ($request->price) {
            $price = explode('-', $request->price);
            $hotels->whereBetween('h_price', [$price[0], $price[1]]);
        }

        $hotels = $hotels->active()->orderByDesc('id')->paginate(NUMBER_PAGINATION_PAGE);
        $locations = Location::where('l_status', 1)->get();
        return view('page.hotel.index', compact('hotels', 'locations'));
    }

    public function detail(Request $request, $id)
    {
        $hotel = Hotel::with(['comments' => function($query) use ($id){
            $query->with(['user', 'replies' => function($q) {
                $q->with('user')->limit(10);
            }])->where('cm_hotel_id', $id)->limit(20)->orderByDesc('id');
        }])->find($id);
        if (!$hotel) {
            return redirect()->back()->with('error', 'Dữ liệu không tồn tại');
        }

        $hotels = Hotel::with('user')->where(['h_location_id' => $hotel->h_location_id])->where('id', '<>', $id)->active()->orderByDesc('id')->limit(NUMBER_PAGINATION_PAGE)->get();
        return view('page.hotel.detail', compact('hotel', 'hotels'));
    }

    public function bookHotel(Request $request, $id, $slug)
    {
        if (!Auth::guard('users')->check()) {
            return redirect()->route('page.user.account')->with('error', 'Vui lòng đăng nhập để đặt phòng');
        }

        $hotel = Hotel::find($id);
        if (!$hotel) {
            return redirect()->back()->with('error', 'Dữ liệu không tồn tại');
        }

        $user = User::find(Auth::guard('users')->user()->id);
        return view('page.hotel.book', compact('hotel', 'user'));
    }

    public function postBookHotel(BookHotelRequest $request, $id)
    {
        if (!Auth::guard('users')->check()) {
            return redirect()->route('page.user.account')->with('error', 'Vui lòng đăng nhập để đặt phòng');
        }

        $hotel = Hotel::find($id);
        if (!$hotel) {
            return redirect()->back()->with('error', 'Dữ liệu không tồn tại');
        }

        \DB::beginTransaction();
        try {
            $params = $request->except(['_token']);
            $user = Auth::guard('users')->user();
            $params['bh_hotel_id'] = $id;
            $params['bh_user_id']  = $user->id;
            $params['bh_status']   = 1;
            $params['bh_price']    = $hotel->h_price - ($hotel->h_price * $hotel->h_sale / 100);

            BookHotel::create($params);
            \DB::commit();

            return redirect()->route('page.home')->with('success', 'Cảm ơn bạn đã đặt phòng, chúng tôi sẽ liên hệ sớm để xác nhận.');
        } catch (\Exception $exception) {
            \DB::rollBack();
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi lưu dữ liệu');
        }
    }
}
