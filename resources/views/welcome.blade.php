<x-header></x-header>
<div class="wrapper">
    <x-navbar></x-navbar>
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mb-4 mt-1">
                    <h4 class="font-weight-bold">Overview</h4>
                </div>

                <!-- Cards -->
                @php
                    $cards = [
                        ['label' => 'Total Kantor Kecamatan', 'value' => $totalKantorKecamatan],
                        ['label' => 'Total Stasiun', 'value' => $totalStasiun],
                        ['label' => 'Total Bank', 'value' => $totalBank],
                        ['label' => 'Total Puskesmas', 'value' => $totalPuskesmas],
                        ['label' => 'Total Posyandu', 'value' => $totalPosyandu],
                        ['label' => 'Total Fasilitas', 'value' => $totalFasilitas],
                        ['label' => 'Total Kecamatan', 'value' => $totalKecamatan],
                        ['label' => 'Total Tipe Fasilitas', 'value' => $totalTipeFasilitas],
                    ];
                @endphp

                @foreach ($cards as $card)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <p class="mb-2 text-secondary">{{ $card['label'] }}</p>
                                <h5 class="mb-0 font-weight-bold">{{ $card['value'] }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Charts -->
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="font-weight-bold">Fasilitas per Kecamatan</h6>
                            <canvas id="kecamatanChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="font-weight-bold">Fasilitas per Tipe</h6>
                            <canvas id="typeChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<x-footer></x-footer>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fasilitas per Kecamatan
        const kecamatanCtx = document.getElementById('kecamatanChart').getContext('2d');
        new Chart(kecamatanCtx, {
            type: 'bar',
            data: {
                labels: @json($kecamatanLabels),
                datasets: [{
                    label: 'Jumlah Fasilitas',
                    data: @json($kecamatanData),
                    backgroundColor: '#42A5F5'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // Fasilitas per Tipe
        const typeCtx = document.getElementById('typeChart').getContext('2d');
        new Chart(typeCtx, {
            type: 'pie',
            data: {
                labels: @json($typeLabels),
                datasets: [{
                    data: @json($typeData),
                    backgroundColor: ['#FF7043', '#42A5F5', '#66BB6A', '#AB47BC', '#FFCA28']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    }
                }
            }
        });
    });
</script>
