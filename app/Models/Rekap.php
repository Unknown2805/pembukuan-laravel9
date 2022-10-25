<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekap extends Model
{
    use HasFactory;
    protected $table = 'rekaps';
    protected $fillable = [
        'jumlah',
        'jenis',        
        'tanggal',
    ];
    public function masuks(){
        return $this->hasMany(Masuk::class);
    }
    public function keluars(){
        return $this->hasMany(Keluar::class);
    }
}
