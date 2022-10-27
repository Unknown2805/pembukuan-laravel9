@extends('layouts.master')
@section('main')
    {{-- preview kas --}}
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2 col-lg-2  d-flex justify-content-start ">
                                <div class="stats-icon green">
                                    <i class="ibi bi-box ms-2 me-2"></i>
                                </div>
                            </div>
                            <div class="col-md-10 col-lg-10 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Kas Masuk</h6>
                                
                                <h6 class="font-extrabold mb-0">Rp. @money((float)$total_in)</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2 col-lg-2  d-flex justify-content-start ">
                                <div class="stats-icon red">
                                    <i class="ibi bi-box ms-2 me-2"></i>
                                </div>
                            </div>
                            <div class="col-md-10 col-lg-10 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Kas Keluar</h6>
                                
                                <h6 class="font-extrabold mb-0">Rp. @money((float)$total_out)</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2 col-lg-2  d-flex justify-content-start ">
                                <div class="stats-icon blue">
                                    <i class="ibi bi-box ms-2 me-2"></i>
                                </div>
                            </div>
                            <div class="col-md-10 col-lg-10 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Sisa Kas</h6>
                                
                                <h6 class="font-extrabold mb-0">Rp. @money((float)$sisa)</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{-- chart --}}
    <div class="col-12 col-md-12">
        <div class="card shadow">
            <div class="card-header">
                <h6>Rekap Penjualan Product</h6>
            </div>
            <div class="card-body">

                <div class="row">


                    <div class="col-12 col-md-12">
                        <div class="text-center">
                            <canvas id="products_b"></canvas>
                        </div>
                    </div>


                </div>

            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.14.305/pdf.min.js"
            integrity="sha512-dw+7hmxlGiOvY3mCnzrPT5yoUwN/MRjVgYV7HGXqsiXnZeqsw1H9n9lsnnPu4kL2nx2bnrjFcuWK+P3lshekwQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- script chart --}}
    <script>
            const b_products = [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ];

            const b_productsd = {
                labels: b_products,
                datasets: [{
                    label: 'Netto',
                    backgroundColor: '#43beaf',
                    borderRadius: 4,
                    barThickness: 10,

                    data: [
                        @foreach ($data_month_in as $ikm)
                            {{ $ikm }},
                        @endforeach
                    ]
                }, {
                    label: 'Loss',
                    backgroundColor: '#dc3545',
                    borderRadius: 4,
                    barThickness: 10,
                    data: [
                        @foreach ($data_month_out as $okm)
                            {{ $okm }},
                        @endforeach
                    ],
                }]
            };

            const bar_products = {
                type: 'bar',
                data: b_productsd,
                options: {
                    responsive: true,
                    indexAxis: 'x',
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                usePointStyle: true,
                            },
                        },
                    },
                }
            };
    </script>
    <script>
            const bulanan_products = new Chart(
                document.getElementById('products_b'),
                bar_products
            );
    </script>
@endsection