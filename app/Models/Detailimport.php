<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailimport extends Model
{
    use HasFactory;
    protected $table = 'chi_tiet_nhap_hang';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nhap_hang_id',
        'san_pham_id',
        'thuong_hieu_id ',
        'so_luong',
        'gia_nhap',
        'thanh_tien',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($type) {
            // Tìm giá trị lớn nhất của nguoi_dung_id và ép kiểu về int
            $maxId = (int) Detailimport::max('id'); // Ép kiểu về int
            $type->id = $maxId > 0 ? $maxId + 1 : 1;  // Tăng lên 1
        });
    }
    public function sanPham()
    {
        return $this->belongsTo(Product::class, 'san_pham_id', 'san_pham_id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'thuong_hieu_id', 'thuong_hieu_id');
    }
}
