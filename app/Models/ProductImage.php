<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $table = 'album_anh';
    protected $primaryKey = 'album_anh_id';
    protected $fillable = [
        'album_anh_id',
        'album_sp',
        'album_sp_id',
        'mo_ta',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($img) {
            $maxId = (int) ProductImage::max('album_anh_id');
            $img->album_anh_id = $maxId > 0 ? $maxId + 1 : 1; 
        });
    }
}
