<!DOCTYPE html>
<html>
    <head>
        <title>Rekap Pembukuan</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <style type="text/css">
            table tr td,
            table tr th{
                font-size: 9pt;
            }
        </style>
        <h5>Rekap</h5>        
        <table class="table table-bordered" id="table1">
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
                            <td class="text-success">Rp. @money((float)$r->jumlah)</td>
                        @endforeach
                    @else
                        @foreach($r->keluars as $k)
                            <td>{{$k->uraian}}</td>
                            <td class="text-danger">Rp. @money((float)$r->jumlah)</td>
                        @endforeach
                    @endif

                    </tr>  
                @endforeach  
                <tr>
                    <td colspan="2" class="text-center">Sisa</td>
                    @if ($sisa < 0)                        
                        <td class="text-danger">Rp. @money((float)$sisa)</td>
                    @elseif($sisa > 0)
                        <td class="text-success">Rp. @money((float)$sisa)</td>
                    @endif
                 </tr> 
            </tbody>
        </table>
    </body>
</html>
