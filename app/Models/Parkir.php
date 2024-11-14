<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parkir extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dengan plural dari nama model
    protected $table = 'parkirs';

    // Tentukan kolom-kolom yang dapat diisi
    protected $fillable = [
        'nopol',
        'kendaraan',
        'waktu_parkir',
    ];
}
