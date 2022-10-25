<!DOCTYPE html>
<html>
    <head>
        <title>Pemasukan Pembukuan</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <style type="text/css">
            table tr td,
            table tr th{
                font-size: 9pt;
            }
        </style>
        <h5>Pemasukan</h5>
        <table class="table table-bordered" id="table1">
            <thead>
                <th>Tanggal</th>
                <th>Uraian</th>
                <th>Jumlah</th>
            </thead>
            <tbody>                            
                                        
                @foreach ($rekap as $r)
                    @foreach ($r->masuks as $m)  
                        <tr>
                            <td>{{$m->tanggal}}</td>
                            <td>{{$m->uraian}}</td>                      
                            <td>Rp. @money((float)$m->jumlah)
                            </td>                            
                        </tr>                                                                  
                    @endforeach                                    
                @endforeach       
                <tr>
                    <td colspan="2" class="text-center">Total</td>
                    <td>Rp. @money((float)$total)</td>
                </tr>                  

            </tbody>
        </table>
    </body>
</html>
