<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'thuong_hieu';
    protected $primaryKey = 'thuong_hieu_id';
    protected $fillable = [
        'thuong_hieu_id',
        'ten_thuong_hieu',
        'mo_ta',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            // Tìm giá trị lớn nhất của nguoi_dung_id và ép kiểu về int
            $maxId = (int) Brand::max('thuong_hieu_id'); // Ép kiểu về int
            $user->thuong_hieu_id = $maxId + 1; // Tăng lên 1
        });
    }
}
