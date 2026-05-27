<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookHotel extends Model
{
    use HasFactory;
    protected $table = 'book_hotels';
    public $timestamps = true;

    const STATUS = [
        1 => 'Tiếp nhận',
        2 => 'Đã xác nhận',
        3 => 'Đã thanh toán',
        5 => 'Đã hủy',
    ];
    const CLASS_STATUS = [
        1 => 'btn-secondary',
        2 => 'btn-info',
        3 => 'btn-success',
        5 => 'btn-danger',
    ];

    protected $fillable = [
        'bh_hotel_id', 'bh_user_id', 'bh_name', 'bh_email', 'bh_phone',
        'bh_address', 'bh_check_in', 'bh_check_out', 'bh_number_rooms',
        'bh_price', 'bh_note', 'bh_status',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'bh_hotel_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'bh_user_id', 'id');
    }
}
