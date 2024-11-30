<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'chi_tiet_don_hang';
    protected $primaryKey = 'chi_tiet_don_hang_id';
    protected $fillable = [
        'chi_tiet_don_hang_id',
        'don_hang_id',
        'san_pham_id',
        'so_luong',
        'gia_don_vi',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($orderitem) {
            // Tìm giá trị lớn nhất của nguoi_dung_id và ép kiểu về int
            $maxId = (int) OrderItem::max('chi_tiet_don_hang_id'); // Ép kiểu về int
            $orderitem->chi_tiet_don_hang_id = $maxId > 0 ? $maxId + 1 : 1; // Tăng lên 1
        });
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'san_pham_id', 'san_pham_id');
    }
}
