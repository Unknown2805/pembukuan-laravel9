@extends('layouts.master')
@section('main')
    <div class="card bg-info">
        <div class="card-body">            
            <h2 class="text-light">Sisa Saldo: Rp. @money((float)$sisa)</h2>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5>Rekap</h5>
        </div>
        <div class="card-body">
            <div class="row">               
                <div class="col-2 col-md-2">
                    <a class="btn btn-danger" href={{url('rekap/pdf')}}>
                        <span class="me-1"><i class="bi bi-printer-fill"></i></span>
                        PDF
                    </a>
                </div>
            </div>
            <table class="table" id="table1">
                <thead>
                    <th>Tanggal</th>
                    <th>Uraian</th>
                    <th>Jumlah</th>
                </thead>
                <tbody>                            
                    @foreach ($rekap as $r)
                        <tr>
                            <td>{{$r->tanggal}}</td>
                        @if($r->jenis === 'masuk')
                            @foreach($r->masuks as $m)
                                <td>{{$m->uraian}}</td>
                                <td class="text-success">
                                    <span><i class="bi bi-arrow-up"></i></span>
                                    {{$r->jumlah}}
                                </td>
                            @endforeach
                        @else
                            @foreach($r->keluars as $k)
                                <td>{{$k->uraian}}</td>
                                <td class="text-danger">
                                    <span><i class="bi bi-arrow-down"></i></span>
                                    {{$r->jumlah}}
                                </td>
                            @endforeach
                        @endif

                        </tr>  
                    @endforeach                                                                             
                </tbody>
            </table>
        </div>
    </div>
@endsection