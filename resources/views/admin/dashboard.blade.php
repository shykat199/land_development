@extends('admin.layout.master')
@section('admin-content')
    <section class="section">
        <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-15">Total User</h5>
                                        <h2 class="mb-3 font-18">{{totalUser()}}</h2>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="{{asset('assets/img/banner/4.png')}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h4>Users Created Per Day</h4>
            </div>
            <div class="card-body">
                <canvas id="usersChart" height="120"></canvas>
            </div>
        </div>

    </section>
@endsection
@push('admin.script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const usersPerDay = @json($usersPerDay);

            const labels = usersPerDay.map(item => item.date);
            const data = usersPerDay.map(item => item.count);

            const ctx = document.getElementById('usersChart');

            if (!ctx) {
                console.error('Canvas not found');
                return;
            }

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Users Created Per Day',
                        data: data,
                        backgroundColor: '#4f46e5',
                        borderRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        }
                    }
                }
            });
        });
    </script>
@endpush
