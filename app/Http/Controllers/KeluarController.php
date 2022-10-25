<?php

namespace App\Http\Controllers;
use App\Models\Rekap;
use App\Models\Keluar;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\ProductsExport;
use Illuminate\Http\Request;

class KeluarController extends Controller
{
//view
    public function index()
        {
            $rekap = Rekap::with('masuks')->get();
            $keluar = Keluar::all();
            $total = $keluar->sum('jumlah');
            return view('keluar.index',compact('rekap','total'));
        }
//pdf
    public function pdf()
        {   
            
            $rekap = Rekap::with('masuks')->get();
            $keluar = Keluar::all();
            $total = $keluar->sum('jumlah');
            
            $pdf = PDF::loadview('keluar.pdf',['rekap'=>$rekap,'total'=>$total]);
            return $pdf->download('pengeluaran.pdf');
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
            $rekap->jenis = 'keluar';
            $rekap->tanggal = $request->tanggal;
            $rekap->save();
            // dd($masuk->id);          
                Keluar::create([
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
            $edit = Rekap::where('id',$request->rekap_id)->update([
                'jumlah' => preg_replace("/[^0-9]/", "", $request->jumlah),
                'tanggal' => $request->tanggal
            ]);
            $edit1 = Keluar::find($id)->update([
                'jumlah' => preg_replace("/[^0-9]/", "", $request->jumlah),            
                'uraian' => $request->uraian,
                'tanggal' => $request->tanggal
            ]);

            return redirect()->back();
        }
//delete
    public function destroy($id)
        {
            $delete = Keluar::find($id);

                $delete->delete();

                return redirect()->back();
        }
}
