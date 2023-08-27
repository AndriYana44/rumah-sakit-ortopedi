<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jam extends Model
{
    use HasFactory;

    protected $table = 'r_jam';
    protected $fillable = ['jam'];

    // get all jam
    public static function getAll()
    {
        return self::all();
    }
}
