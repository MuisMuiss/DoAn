<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    use HasFactory;
    protected $table = 'nhap_hang'; // Tên bảng

    protected $primaryKey = 'nhap_hang_id';
    protected $fillable = [
        'nhap_hang_id',
        'tong_tien',
        'ngay_nhap',
        'thuong_hieu_nhap',
    ];
    public $incrementing = false;
    protected $keyType = 'string';
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'thuong_hieu_nhap', 'thuong_hieu_id');
    }
    public function chiTietNhapHang()
    {
        return $this->hasMany(Detailimport::class, 'nhap_hang_id', 'nhap_hang_id');
    }
}
