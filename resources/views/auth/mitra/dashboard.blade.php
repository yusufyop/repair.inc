@extends('app-dashboard')

@section('title')
Mitra | Repair.Inc
@endsection

@section('content')
<div class="page-title mb2">
  <h3>Dashboard</h3>
</div>

<section class="section">
  <div class="row mb-2">
    <div class="col-12 col-md-3">
      <div class="card card-statistic">
        <div class="card-body p-0">
          <div class="d-flex flex-column">
            <div class='px-3 py-3 d-flex justify-content-between'>
              <h3 class='card-title'>Sudah Disetujui</h3>
              <div class="card-right align-items-center">

                <?php
                $z = [];
                $count = 0;
                $count2 = 0;
                $transaksi = 0;
                $jumlah = 0;
                ?>
                @foreach(App\Jasa::all() as $js)
                @if($js->id_mitra == Auth::user()->id)
                <?php
                array_push($z, $js->id);
                ?>
                @endif
                @endforeach

                @foreach(App\Pesanan::all() as $ps)
                @if(in_array($ps->id_jasa, $z))
                <?php
                $transaksi += 1;
                ?>
                @if($ps->status == "Belum diproses" or $ps->status == "Selesai" or $ps->status == "Sedang diproses" or $ps->status == "Terbayar")
                <?php
                $count += 1;
                ?>
                @foreach(App\Jasa::all() as $js)
                @if($ps->id_jasa == $js->id)
                <?php
                $jumlah += $js->harga;
                ?>
                @endif
                @endforeach
                @elseif($ps->status == "Belum disetujui" )
                <?php
                $count2 += 1;
                ?>
                @endif
                @endif
                @endforeach




                <p>{{$count}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-3">
      <div class="card card-statistic">
        <div class="card-body p-0">
          <div class="d-flex flex-column">
            <div class='px-3 py-3 d-flex justify-content-between'>
              <h3 class='card-title'>Belum Disetujui</h3>
              <div class="card-right align-items-center">
                <p>{{ $count2 }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-3">
      <div class="card card-statistic">
        <div class="card-body p-0">
          <div class="d-flex flex-column">
            <div class='px-3 py-3 d-flex justify-content-between'>
              <h3 class='card-title'>Transaksi</h3>
              <div class="card-right align-items-center">
                <p>{{ $transaksi }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-3">
      <div class="card card-statistic">
        <div class="card-body p-0">
          <div class="d-flex flex-column">
            <div class='px-3 py-3 justify-content-between'>
              <h3 class='card-title'>
                Pendapatan
              </h3>
              <div class="card-right">
                <p>Rp {{ number_format($jumlah) }} </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mb-4">
        <div class="card">
      <div class="card-header">
        <h3 class='card-heading p-1 pl-3'>Pesanan Terbaru</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Customer</th>
                <th>Jasa</th>
                <th>Status</th>
                <th>Tanggal</th>
              </tr>
            </thead>
            <tbody>
              @foreach(App\Pesanan::all() as $ps)
              @if(in_array($ps->id_jasa, $z))
              <tr>
                <td>{{ App\Customer::where('id', $ps->id_customer)->value('username') }}</td>
                <td>{{ App\Jasa::where('id', $ps->id_jasa)->value('nama') }}</td>
                <td>{{ $ps->status }}</td>
                <td>{{ date('d-m-Y', strtotime($ps->created_at)) }}</td>
              </tr>
              @endif
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!-- </div> -->
    </div>
  </div>
</section>
@endsection

@section('js-plus')
<script src="{{asset('assets/admin/assets/vendors/dayjs/dayjs.min.js')}}"></script>
<script src="{{asset('assets/admin/assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/admin/assets/js/main.js')}}"></script>
@endsection