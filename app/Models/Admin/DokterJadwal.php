<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokterJadwal extends Model
{
    use HasFactory;

    protected $table = 'm_jadwal_dokter';
    protected $fillable = [
        'dokter_id',
        'hari_id',
        'jam_mulai_id',
        'jam_selesai_id',
    ];

    // join to dokter
    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }

    // join to hari (one to many)
    public function hari()
    {
        return $this->belongsTo(Hari::class, 'hari_id');
    }

    // join to jam
    public function jam()
    {
        return $this->belongsTo(Jam::class, 'jam_mulai_id');
    }

    // get all data
    public static function getAll()
    {
        return DokterJadwal::orderBy('id', 'desc')->get();
    }

    // get dokter, jam & hari
    public static function getDokterJamHari()
    {
        return DokterJadwal::with('dokter', 'jam', 'hari')->get();
    }

    // get jadwal hari by id
    public static function getJadwalHariById($id)
    {
        return DokterJadwal::where('dokter_id', $id)->get();
    }

    // get jadwal jam by id
    public static function getJadwalJamById($id)
    {
        return DokterJadwal::where('dokter_id', $id)->get();
    }
}
