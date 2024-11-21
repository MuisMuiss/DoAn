<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'gio_hang';
    protected $primaryKey = 'gio_hang_id';
    protected $fillable = [
        'gio_hang_id',
        'nguoi_dung_id',
        'san_pham_id',
        'so_luong',
        'ngay_them',
    ];

    // Quan hệ với sản phẩm
    public function product()
    {
        return $this->belongsTo(Product::class, 'san_pham_id', 'san_pham_id');
    }
    // Quan hệ với người dùng
    public function user()
    {
        return $this->belongsTo(User::class,'nguoi_dung_id','nguoi_dung_id');
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($cart) {
            // Tìm giá trị lớn nhất của nguoi_dung_id và ép kiểu về int
            $maxId = (int) Cart::max('gio_hang_id'); // Ép kiểu về int
            $cart->gio_hang_id = $maxId > 0 ? $maxId + 1 : 1; // Tăng lên 1
        });
    }
}