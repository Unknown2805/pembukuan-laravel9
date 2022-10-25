<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluar extends Model
{
    use HasFactory;

    protected $table = 'keluars';
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
