<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;
    protected $table = 'loai_sp';
    protected $primaryKey = 'loai_sp_id';
    protected $fillable = [
        'loai_sp_id',
        'ten_loaisp',
        'danh_muc_id',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($type) {
            // Tìm giá trị lớn nhất của nguoi_dung_id và ép kiểu về int
            $maxId = (int) ProductType::max('loai_sp_id'); // Ép kiểu về int
            $type->loai_sp_id = $maxId > 0 ? $maxId + 1 : 1;  // Tăng lên 1
        });
    }

}
