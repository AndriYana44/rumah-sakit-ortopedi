<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postingan extends Model
{
    use HasFactory;

    protected $table = 'm_postingan';
    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'gambar',
        'status',
        'created_by',
        'updated_by',
    ];

    // get all data
    public static function getAll()
    {
        return self::orderBy('id', 'desc')->get();
    }
}
