<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    // use HasFactory;

    protected $fillable = [
        'name',
        'alamat',
        'kecamatan_id',
        'tipe_id',
        'no_telp',
        'latitude',
        'longitude',
        'gambar'
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function tipeFasilitas()
    {
        return $this->belongsTo(TipeFasilitas::class, 'tipe_id');
    }
}
