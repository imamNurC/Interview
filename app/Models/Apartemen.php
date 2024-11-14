<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartemen extends Model
{
    use HasFactory;
    // Tentukan nama tabel jika berbeda dengan plural dari nama model
    protected $table = 'apartemens';

    // Tentukan kolom-kolom yang dapat diisi
    protected $fillable = [
        'nomor_apartemen',
        'lantai',
        'status',
    ];

    // Relasi satu ke banyak (One-to-many) dengan penghuni
    public function penghuni()
    {
        return $this->hasMany(Penghuni::class, 'apart_id');
    }
}
