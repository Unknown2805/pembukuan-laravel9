<?php

namespace App\Http\Controllers;

use App\Models\Rekap;
use App\Models\Masuk;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\ProductsExport;
use Illuminate\Http\Request;

class MasukController extends Controller
{
//view
    public function index()
        {
            $rekap = Rekap::with('masuks')->get();
            $masuk = Masuk::all();
            $total = $masuk->sum('jumlah');
            return view('masuk.index',compact('rekap','total'));
        }
//pdf   
    public function pdf()
        {   
            
            $rekap = Rekap::with('masuks')->get();
            $masuk = Masuk::all();
            $total = $masuk->sum('jumlah');
            
            $pdf = PDF::loadview('masuk.pdf',['rekap'=>$rekap,'total'=>$total]);
            return $pdf->download('pemasukan.pdf');
        }
//add
    public function store(Request $request)
        {   
            $this->validate($request, [
                'jumlah' => 'required',
                'uraian' => 'required',
                'tanggal' => 'required',
            ]);        
            $rekap = new Rekap();
            $rekap->jumlah = preg_replace("/[^0-9]/", "", $request->jumlah);
            $rekap->jenis = 'masuk';
            $rekap->tanggal = $request->tanggal;
            $rekap->save();
            // dd($masuk->id);          
                Masuk::create([
                    'jumlah' => preg_replace("/[^0-9]/", "", $request->jumlah),
                    'rekap_id' => $rekap->id,                       
                    'tanggal' => $request->tanggal,
                    'uraian' => $request->uraian
            ]);

            return redirect()->back();
        }
//edit
    public function edit(Request $request, $id)
        {
            // dd($request->rekap_id);
            $edit = Rekap::where('id',$request->rekap_id)->update([
                'jumlah' => preg_replace("/[^0-9]/", "", $request->jumlah),
                'tanggal' => $request->tanggal
            ]);
            $edit1 = Masuk::find($id)->update([
                'jumlah' => preg_replace("/[^0-9]/", "", $request->jumlah),            
                'uraian' => $request->uraian,
                'tanggal' => $request->tanggal
            ]);

            return redirect()->back();
        }
//delete
    public function destroy($id)
        {
            $delete = Masuk::find($id);

                $delete->delete();

                return redirect()->back();
        }
}
