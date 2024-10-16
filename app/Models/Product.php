<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Product extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'san_pham_id',
        'ten_san_pham',
        'loai_san_pham',
        'gia	mo_ta',
        'so_luong_kho',
        'nha_cung_cap_id',
        'hinh_anh',
        'ngay_tao',

    ];
}
