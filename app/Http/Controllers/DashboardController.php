<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Masuk;
use App\Models\Keluar;

class DashboardController extends Controller
{

    public function index()
    {
            $masuk = Masuk::all();
            $keluar = Keluar::all();

            $this_year = Carbon::now()->format('Y');
            $month_in = Masuk::where('tanggal','like', $this_year.'%')->get();
            $month_out = Keluar::where('tanggal','like', $this_year.'%')->get();

            for ($i=1; $i <= 12; $i++){
                $data_month_in[(int)$i]=0;
            }
    
            foreach ($month_in as $a) {
                $bulan_in= explode('-',carbon::parse($a->created_at)->format('Y-m-d'))[1];
                $data_month_in[(int) $bulan_in]+= $a->jumlah; 
            }

            for ($i=1; $i <= 12; $i++){
                $data_month_out[(int)$i]=0;
            }
    
            foreach ($month_out as $a) {
                $bulan_out= explode('-',carbon::parse($a->created_at)->format('Y-m-d'))[1];
                $data_month_out[(int) $bulan_out]+= $a->jumlah; 
            }

            $total_in = $masuk->sum('jumlah');
            $total_out = $keluar->sum('jumlah');
            $sisa = $total_in - $total_out;
            return view('dashboard.index',compact('total_in','total_out','sisa'))
            -> with('data_month_in', $data_month_in)
            -> with('data_month_out', $data_month_out);
            ;
    }

    
}
