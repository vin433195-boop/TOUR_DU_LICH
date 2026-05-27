<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BookHotel;
use App\Models\Hotel;

class BookHotelController extends Controller
{
    public function __construct(BookHotel $bookHotel)
    {
        view()->share([
            'book_hotel_active' => 'active',
            'status'      => $bookHotel::STATUS,
            'classStatus' => $bookHotel::CLASS_STATUS,
        ]);
        $this->bookHotel = $bookHotel;
    }

    public function index(Request $request)
    {
        $bookHotels = BookHotel::with(['hotel', 'user']);

        if ($request->h_name) {
            $name = $request->h_name;
            $bookHotels->whereIn('bh_hotel_id', function ($q) use ($name) {
                $q->from('hotels')->select('id')->where('h_name', 'like', '%'.$name.'%');
            });
        }
        if ($request->bh_name) {
            $bookHotels->where('bh_name', 'like', '%'.$request->bh_name.'%');
        }
        if ($request->bh_email) {
            $bookHotels->where('bh_email', $request->bh_email);
        }
        if ($request->bh_phone) {
            $bookHotels->where('bh_phone', $request->bh_phone);
        }
        if ($request->bh_status) {
            $bookHotels->where('bh_status', $request->bh_status);
        }

        $bookHotels = $bookHotels->orderByDesc('id')->paginate(NUMBER_PAGINATION_PAGE);
        return view('admin.book_hotel.index', compact('bookHotels'));
    }

    public function updateStatus(Request $request, $status, $id)
    {
        $bookHotel = BookHotel::find($id);
        if (!$bookHotel) {
            return redirect()->back()->with('error', 'Dữ liệu không tồn tại');
        }
        if (!isset(BookHotel::STATUS[$status])) {
            return redirect()->back()->with('error', 'Trạng thái không hợp lệ');
        }

        try {
            $bookHotel->bh_status = $status;
            $bookHotel->save();
            return redirect()->route('book.hotel.index')->with('success', 'Cập nhật trạng thái thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi lưu dữ liệu');
        }
    }

    public function delete($id)
    {
        $bookHotel = BookHotel::find($id);
        if (!$bookHotel) {
            return redirect()->back()->with('error', 'Dữ liệu không tồn tại');
        }

        try {
            $bookHotel->delete();
            return redirect()->back()->with('success', 'Xóa thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi không thể xóa dữ liệu');
        }
    }
}
