<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penghuni extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dengan plural dari nama model
    protected $table = 'penghunis';

    // Tentukan kolom-kolom yang dapat diisi
    protected $fillable = [
        'apart_id',
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'umur',
        'status',
    ];

    // Relasi many-to-one (Many-to-one) dengan apartemen
    public function apartemen()
    {
        return $this->belongsTo(Apartemen::class, 'apart_id');
    }
}
