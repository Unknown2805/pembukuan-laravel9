<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masuk extends Model
{
    use HasFactory;
    
    protected $table = 'masuks';
    protected $fillable = [
        'jumlah',
        'uraian',
        'tanggal',
        'rekap_id'
    ];
    public function rekap(){
        return $this->belongsTo(Rekap::class);
    }
}
