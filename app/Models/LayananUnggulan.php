<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananUnggulan extends Model
{
    use HasFactory;

    protected $table = 'm_layanan_unggulan';
    protected $guarded = ['id'];
}
