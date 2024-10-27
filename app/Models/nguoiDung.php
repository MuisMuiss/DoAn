<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class nguoiDung extends Authenticatable
{
    use HasFactory;
    protected $table = 'nguoi_dungs'; // Tên bảng

    protected $primaryKey = 'nguoi_dung_id';
    protected $fillable = [
        'nguoi_dung_id',
        'ho_ten',
        'ten_dang_nhap',
        'mat_khau',
        'email',
        'so_dien_thoai',
        'dia_chi',
        'vai_tro',
        'ngay_tao',
        'avatar',
        'trang_thai'
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            // Tìm giá trị lớn nhất của nguoi_dung_id và ép kiểu về int
            $maxId = (int) nguoiDung::max('nguoi_dung_id'); // Ép kiểu về int
            $user->nguoi_dung_id = $maxId + 1; // Tăng lên 1
        });
    }
    // Model của bạn
}
// class nguoiDung extends Model
// {
    
//     use HasFactory;
//     protected $table = 'nguoi_dungs'; // Tên bảng

//     protected $primaryKey = 'nguoi_dung_id';
//     protected $fillable = [
//         'nguoi_dung_id',
//         'ho_ten',
//         'ten_dang_nhap',
//         'mat_khau',
//         'email',
//         'so_dien_thoai',
//         'dia_chi',
//         'vai_tro',
//         'ngay_tao',
//         'avatar',
//         'trang_thai'
//     ];
//     protected static function boot()
//     {
//         parent::boot();

//         static::creating(function ($user) {
//             // Tìm giá trị lớn nhất của nguoi_dung_id và ép kiểu về int
//             $maxId = (int) nguoiDung::max('nguoi_dung_id'); // Ép kiểu về int
//             $user->nguoi_dung_id = $maxId + 1; // Tăng lên 1
//         });
//     }
// }

