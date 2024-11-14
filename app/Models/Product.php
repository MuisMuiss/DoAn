<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\ProductImage;

class Product extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'san_pham';
    protected $primaryKey = 'san_pham_id';
    protected $fillable = [
        'san_pham_id',
        'ten_san_pham',
        'loai_sp_id',
        'gia',
        'mo_ta',
        'so_luong_kho',
        'thuong_hieu_id',
        'hinh_anh',
        'sp_bestseller',
        'sp_moi'.
        'ngay_tao',

    ];
    
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $maxId = (int) Product::max('san_pham_id'); // Lấy giá trị lớn nhất của san_pham_id
            $product->san_pham_id = $maxId > 0 ? $maxId + 1 : 1; // Nếu không có sản phẩm, gán san_pham_id = 1
        });
    }
    //1sp-n`anh
    public function images(){
        return $this->hasMany(ProductImage::class,'album_sp_id','san_pham_id');
    }
}
