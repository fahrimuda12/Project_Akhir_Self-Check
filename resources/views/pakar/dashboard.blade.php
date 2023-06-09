@extends('pakar/app')
@section('content')
    {{-- @extends('admin/sidebar') --}}
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div class="flex flex-col items-center justify-center p-2 rounded bg-yellow-600  dark:bg-gray-800">
                    <p class="text-2xl text-gray-50 font-bold dark:text-gray-500">{{ $user }}</p>
                    <p class="text-gray-50">Pengguna</p>
                </div>
                <div class="flex flex-col items-center justify-center h-24 rounded bg-blue-600  dark:bg-gray-800">
                    <p class="text-2xl text-gray-50 font-bold dark:text-gray-500">{{ $pakar }}</p>
                    <p class="text-gray-50">Dokter</p>
                </div>
                <div class="flex flex-col items-center justify-center h-24 rounded bg-pink-600 dark:bg-gray-800">
                    <p class="text-2xl text-gray-50 font-bold dark:text-gray-500">{{ $penyakit->count() }}</p>
                    <p class="text-gray-50">Penyakit</p>
                </div>
            </div>
            <div class="flex mb-4 gap-2  dark:bg-gray-800">
                <div class="flex flex-col justify-between  gap-4 w-full py-4 px-10 bg-gray-50 rounded ">
                    <div class="">
                        <h1>Traffic Penyakit</h1>
                    </div>
                    <div class="relative md:w-[20vw] lg:w-full  ">
                        <canvas id="graphActivity" width="200" height="100"></canvas>
                    </div>
                </div>
                {{-- <div class="flex flex-col justify-start py-4 px-10 bg-gray-50 rounded ">
                    <div class="">
                        <h1>Traffic Penyakit</h1>
                    </div>
                    <div class="relative self-center md:w-[20vw] lg:w-full ">
                        <canvas id="myChart"></canvas>
                    </div>
                </div> --}}
            </div>
            {{-- <div class="grid grid-cols-2 gap-4 mb-4">
                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                </div>
                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                </div>
                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                </div>
                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                </div>
            </div>
            <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                </div>
                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                </div>
                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                </div>
                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                </div>
            </div> --}}
        </div>
    </div>

    @push('scripts-chart')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
        <script type="text/javascript">
            const ctx = document.getElementById('myChart');
            const penyakit = {!! $penyakitJson->toJson() !!};
            console.log(penyakit);
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: penyakit.map((p) => p.nama_penyakit),
                    datasets: [{
                        label: 'Total Terjangkit',
                        data: penyakit.map((p) => p.total_terjangkit),
                        borderWidth: 1,
                    }]
                },
                options: {
                    responsive: true,
                    // scales: {
                    //     y: {
                    //         beginAtZero: true
                    //     }
                    // },
                    plugins: {
                        datalabels: {
                            color: '#36A2EB',
                            display: function(context) {
                                var dataset = context.dataset;
                                var value = dataset.data[context.dataIndex];
                                var labels = dataset.label;
                                var sum = dataset.data.reduce((a, b) => a + b);
                                var currentValue = value / sum * 100;
                                return labels + ": " + currentValue + " %";
                            },
                            font: {
                                weight: 'bold'
                            },
                            // padding: 6,
                            formatter: (context) => {
                                var dataset = context.dataset;
                                var value = dataset.data[context.dataIndex];
                                var labels = dataset.label;
                                var sum = dataset.data.reduce((a, b) => a + b);
                                var currentValue = value / sum * 100;
                                return labels + ": " + currentValue + " %";
                            }
                        },
                        tooltip: {
                            // enabled: false,
                            callbacks: {
                                label: function(context) {
                                    var dataset = context.dataset;
                                    var value = dataset.data[context.dataIndex];
                                    var labels = dataset.label;
                                    var sum = dataset.data.reduce((a, b) => a + b);
                                    var currentValue = value / sum * 100;
                                    return labels + ": " + currentValue.toFixed(2) + " %";
                                }
                            }
                        },
                        legend: {
                            display: true,
                            position: 'left',
                            align: 'center',
                            labels: {
                                pointStyle: 'rect',
                                usePointStyle: true,
                                pointStyleWidth: 20,
                            }
                        }
                    },
                    animation: {
                        animateRotate: false,
                        animateScale: true
                    }

                }
            });

            const ctx2 = document.getElementById('graphActivity');
            new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: penyakit.map((p) => p.nama_penyakit),
                    datasets: [{
                        label: 'Total Terjangkit',
                        data: penyakit.map((p) => p.total_terjangkit),
                        borderWidth: 1,
                    }]
                },
                options: {
                    responsive: true,
                    // scales: {
                    //     y: {
                    //         beginAtZero: true
                    //     }
                    // },
                    plugins: {
                        datalabels: {
                            color: '#36A2EB',
                            display: function(context) {
                                var dataset = context.dataset;
                                var value = dataset.data[context.dataIndex];
                                var labels = dataset.label;
                                var sum = dataset.data.reduce((a, b) => a + b);
                                var currentValue = value / sum * 100;
                                return labels + ": " + currentValue + " %";
                            },
                            font: {
                                weight: 'bold'
                            },
                            // padding: 6,
                            formatter: (context) => {
                                var dataset = context.dataset;
                                var value = dataset.data[context.dataIndex];
                                var labels = dataset.label;
                                var sum = dataset.data.reduce((a, b) => a + b);
                                var currentValue = value / sum * 100;
                                return labels + ": " + currentValue + " %";
                            }
                        },
                        tooltip: {
                            // enabled: false,
                            callbacks: {
                                label: function(context) {
                                    var dataset = context.dataset;
                                    var value = dataset.data[context.dataIndex];
                                    var labels = dataset.label;
                                    var sum = dataset.data.reduce((a, b) => a + b);
                                    var currentValue = value / sum * 100;
                                    return labels + ": " + currentValue.toFixed(2) + " %";
                                }
                            }
                        },
                        legend: {
                            display: true,
                            position: 'bottom',
                            align: 'center',
                            labels: {
                                pointStyle: 'rect',
                                usePointStyle: true,
                                pointStyleWidth: 20,
                            }
                        }
                    },
                    animation: {
                        animateRotate: false,
                        animateScale: true
                    }

                }
            });
        </script>
    @endpush
@endsection
