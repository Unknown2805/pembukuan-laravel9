<?php

namespace App\Http\Controllers;

use App\Models\Rekap;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\ProductsExport;
use Illuminate\Http\Request;

class RekapController extends Controller
{
//view
    public function index()
        {   
            $rekap = Rekap::all();          
            $keluar = Rekap::with('keluars')->where('jenis','keluar')->get();
            $masuk = Rekap::with('masuks')->where('jenis','masuk')->get();
            $sisa = $masuk->sum('jumlah') - $keluar->sum('jumlah');
            
            return view('rekap.index',compact('rekap','masuk','keluar','sisa'));
        }
//pdf  
    public function pdf()
        {      
            $rekap = Rekap::all();                   
            $keluar = Rekap::with('keluars')->where('jenis','keluar')->get();
            $masuk = Rekap::with('masuks')->where('jenis','masuk')->get();
            $sisa = $masuk->sum('jumlah') - $keluar->sum('jumlah');

            $pdf = PDF::loadview('rekap.pdf',['rekap'=>$rekap,'masuk'=>$masuk,'keluar'=>$keluar,'sisa'=>$sisa]);
            return $pdf->download('rekap.pdf');
        }

 
}
