<?php

namespace App\Models;

use App\Models\Fasilitas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipeFasilitas extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function fasilitas()
    {
        return $this->hasMany(Fasilitas::class, 'tipe_id');
    }
}
