<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'don_hang';
    protected $primaryKey = 'don_hang_id';
    protected $fillable = [
        'don_hang_id',
        'nguoi_dung_id',
        'trang_thai_don_hang',
        'tong_tien',
        'ngay_dat',
        'phuong_thuc_thanh_toan',
        'dia_chi_giao_hang',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            // Tìm giá trị lớn nhất của nguoi_dung_id và ép kiểu về int
            $maxId = (int) Order::max('don_hang_id'); // Ép kiểu về int
            $order->don_hang_id = $maxId > 0 ? $maxId + 1 : 1; // Tăng lên 1
        });
    }
    public function User()
    {
        return $this->belongsTo(nguoiDung::class, 'nguoi_dung_id');
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'don_hang_id', 'don_hang_id');
    }
}
