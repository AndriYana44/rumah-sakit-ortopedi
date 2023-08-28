<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $table = 'm_dokter';
    protected $fillable = [
        'nama_dokter',
        'spesialis',
        'alamat',
        'no_telp',
        'email',
        'password',
        'foto',
        'status',
    ];

    // get all data
    public static function getAll()
    {
        return Dokter::orderBy('id', 'desc')->get();
    }

    // get data by id
    public static function getById($id)
    {
        return Dokter::where('id', $id)->first();
    }
}
