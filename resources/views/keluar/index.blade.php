@extends('layouts.master')
@section('main')

    @foreach ($rekap as $r)    
        @foreach ($r->keluars as $k)
            <div class="modal fade" id="hapuskeluar{{ $k->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    
                        <form action={{ url('/keluar/delete/' . $k->id) }} method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                            <div class="modal-body">
                                <center class="mt-3">
                                    <h5>
                                        apakah anda yakin ingin menghapus data ini?
                                    </h5>
                                </center>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                <button type="submit" class="btn btn-danger">Hapus!</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach
    
    <div class="card bg-danger">
        <div class="card-body">
            <h2 class="text-light">Pengeluaran: Rp. @money((float)$total)</h2>
        </div>
    </div>


    <div class="card">
        <div class="card-header">
            <h5>Pengeluaran</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-1 col-md-1">
                    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#addkeluar">
                        Add
                    </button>
                </div>
                <div class="col-2 col-md-2">
                    <a class="btn btn-danger" href={{url('keluar/pdf')}}>
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
                    <th>Aksi</th>
                </thead>
                <tbody> 
                    @foreach ($rekap as $r)                        
                        @foreach ($r->keluars as $k)                    
                            <tr>
                                <td>{{$k->tanggal}}</td>
                                <td>{{$k->uraian}}</td>
                                <td>Rp. @money((float)$k->jumlah)</td>
                                <td>
                                    <a class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#editkeluar{{$k->id}}">
                                        edit
                                    </a>
                                    <a class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#hapuskeluar{{$k->id}}">
                                        delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript">    
        function formatbaru(e){
            let hasil = formatedit(e.target.value);

            e.target.value = hasil;
        }
      
        /* Fungsi formateditom */
        function formatedit(angka) {
            var prefix = "Rp";
          var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            edit = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);
      
          // tambahkan titik jika yang di input sudah menjadi angka ribuan
          if (ribuan) {
            separator = sisa ? '.' : '';
            edit += separator + ribuan.join('.');
          }
      
          edit = split[1] != undefined ? edit + ',' + split[1] : edit;
          return prefix == undefined ? edit : (edit ? 'Rp ' + edit : '');
        }
      </script>
    @include('keluar/modal')
@endsection