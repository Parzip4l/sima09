@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
  <div>
    <h4 class="mb-3 mb-md-0">Selamat Datang di Dashboard Dusun Margalaksana </h4>
  </div>
  <div class="d-flex align-items-center flex-wrap text-nowrap">
    <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
      <i class="btn-icon-prepend" data-feather="printer"></i>
      Print
    </button>
    <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
      <i class="btn-icon-prepend" data-feather="download-cloud"></i>
      Download Data
    </button>
  </div>
</div>

<div class="row">
  <div class="col-12 col-xl-12 stretch-card">
    <div class="row flex-grow-1">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-header">
            <h6>Catatan Kependudukan</h6>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="mb-0 align-self-center">Jumlah Warga</h6>
              <div class="totaluangkas">
                <h5 class="text-end">{{ $dataasli }}</h5>
                <p class="text-muted">Jiwa</p>
              </div>
            </div>
            <hr>
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="mb-0 align-self-center">Jumlah KK</h6>
              <div class="totaluangkas">
                <h5 class="text-end">{{$kk}}</h5>
                <p class="text-muted">Kepala Keluarga</p>
              </div>
            </div>
            <hr>
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="mb-0 align-self-center">Jumlah Warga Laki-Laki</h6>
              <div class="totaluangkas">
                <h5 class="text-end">{{$laki}}</h5>
                <p class="text-muted">Jiwa</p>
              </div>
            </div>
            <hr>
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="mb-0 align-self-center">Jumlah Warga Perempuan</h6>
              <div class="totaluangkas">
                <h5 class="text-end">{{$perempuan}}</h5>
                <p class="text-muted">Jiwa</p>
              </div>
            </div>
            <hr>
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="mb-0 align-self-center">Jumlah Kelahiran</h6>
              <div class="totaluangkas">
                <h5 class="text-end">{{ $totalKelahiran }}</h5>
                <p class="text-muted">Persentase Kelahiran {{ $persentasereal }}%</p>
              </div>
            </div>
            <hr>
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="mb-0 align-self-center">Jumlah Kematian</h6>
              <div class="totaluangkas">
                <h5 class="text-end">{{ $totalKematian }}</h5>
                <p class="text-muted">Persentase Kematian {{ $formattedPersentase }}%</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-header">
            <h6>Catatan Keuangan</h6>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="mb-0">Total Kas RW</h6>
              <div class="totaluangkas">
                <h5>Rp. {{ number_format($totalsaldorw, 0, ',', '.') }}</h5>
              </div>
            </div>
            <hr>
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="mb-0">Total Kas DKM</h6>
              <div class="totaluangkas">
                <h5>Rp. {{ number_format($totalsaldodkm, 0, ',', '.') }}</h5>
              </div>
            </div>
            <hr>
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="mb-0">Total Kas Karang Taruna</h6>
              <div class="totaluangkas">
                <h5>Rp. {{ number_format($totalsaldokarta, 0, ',', '.') }}</h5>
              </div>
            </div>
            <hr>
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="mb-0">Total Kas TPU Damar</h6>
              <div class="totaluangkas">
                <h5>Rp. {{ number_format($totalsaldodamar, 0, ',', '.') }}</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
          <canvas id="ChartRT"></canvas>
          <p class="text-center pt-2">Statistik Penduduk Berdasarkan RT Tahun {{ date('Y') }}</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
          <canvas id="ChartKawin"></canvas>
          <p class="text-center pt-2">Statistik Penduduk Berdasarkan Status Perkawinan Tahun {{ date('Y') }}</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <canvas id="myChart"></canvas>
            <p class="text-center pt-2">Statistik Penduduk Berdasarkan Jenis Kelamin Tahun {{ date('Y') }}</p>
          </div>
        </div>
      </div>
      <div class="col-xl-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h6 class="card-title">Data Warga Berdasarkan Pendidikan</h6>
            <canvas id="ChartPendidikan"></canvas>
          </div>
        </div>
      </div>
      <div class="col-xl-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h6 class="card-title">Data Warga Berdasarkan Pekerjaan</h6>
            <canvas id="ChartPekerjaan"></canvas>
          </div>
        </div>
      </div>
      <div class="col-xl-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h6 class="card-title">Data Warga Berdasarkan Usia</h6>
            <canvas id="StatsUsia"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</div> <!-- row -->

@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/flatpickr/flatpickr.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/chartjs/chart.umd.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>
  <script src="{{ asset('assets/js/apexcharts.js') }}"></script>
  <script src="{{ asset('assets/js/chartjs.js') }}"></script>
  <script>
    var data = {!! json_encode($data) !!};

    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: data,
    });
  </script>
  <script>
    var data = {!! json_encode($datart) !!};

    var ctx = document.getElementById('ChartRT').getContext('2d');
    var ChartRT = new Chart(ctx, {
        type: 'doughnut',
        data: data,
    });
  </script>
  <script>
    var data = {!! json_encode($datakawin) !!};

    var ctx = document.getElementById('ChartKawin').getContext('2d');
    var ChartRT = new Chart(ctx, {
        type: 'doughnut',
        data: data,
    });
  </script>
  <script>
    var data = {!! json_encode($datapendidikan) !!};

    var ctx = document.getElementById('ChartPendidikan').getContext('2d');
    var ChartRT = new Chart(ctx, {
        type: 'bar',
        data: data,
    });
  </script>
  <script>
    var data = {!! json_encode($datapekerjaan) !!};

    var ctx = document.getElementById('ChartPekerjaan').getContext('2d');
    var ChartRT = new Chart(ctx, {
        type: 'bar',
        data: data,
    });
  </script>
  <script>
    var data = {!! json_encode($datausia) !!};

    var ctx = document.getElementById('StatsUsia').getContext('2d');
    var ChartRT = new Chart(ctx, {
        type: 'bar',
        data: data,
    });
  </script>

@endpush