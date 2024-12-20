<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'danh_muc_san_pham';
    protected $primaryKey = 'danh_muc_id';
    protected $fillable = [
        'danh_muc_id',
        'ten_danh_muc',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($cate) {
            // Tìm giá trị lớn nhất của nguoi_dung_id và ép kiểu về int
            $maxId = (int) Category::max('danh_muc_id'); // Ép kiểu về int
            $cate->danh_muc_id = $maxId > 0 ? $maxId + 1 : 1; // Tăng lên 1
        });
    }
    public function loaiSanPhams()
    {
        return $this->hasMany(ProductType::class, 'danh_muc_id');
    }
}
