<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Product extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'san_pham';
    protected $primaryKey = 'san_pham_id';
    protected $fillable = [
        'san_pham_id',
        'ten_san_pham',
        'loai_san_pham',
        'gia',
        'mo_ta',
        'so_luong_kho',
        'thuong_hieu_id',
        'hinh_anh',
        'ngay_tao',

    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            // Tìm giá trị lớn nhất của nguoi_dung_id và ép kiểu về int
            $maxId = (int) Product::max('san_pham_id'); // Ép kiểu về int
            $user->san_pham_id = $maxId + 1; // Tăng lên 1
        });
    }
}
