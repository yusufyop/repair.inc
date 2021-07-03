@extends('app-dashboard')

@section('title')
Admin | Repair.Inc
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
							<h3 class='card-title'>Pengguna</h3>
							<div class="card-right align-items-center">
								<p>{{ App\Customer::all()->count() }}</p>
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
							<h3 class='card-title'>Mitra</h3>
							<div class="card-right align-items-center">
								<p>{{ App\Mitra::all()->count() }}</p>
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
								<p>{{ App\Pembayaran::where('status', 'Terbayar')->count() }}</p>
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
							@php
							$pembayaran = App\Pembayaran::where('status', 'Terbayar')->get('id_pesanan');
							$pesanan = App\Pesanan::whereIn('id', $pembayaran)->get();
							$jumlah = 0;

							foreach($pesanan as $dt) {
								$jumlahs = App\Jasa::where('id', $dt->id_jasa)->value('harga');
								$jumlah += $jumlahs;
							}
							@endphp
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
		<div class="col-md-7">
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
								@php
								$pesanan = App\Pesanan::limit(5)->orderBy('created_at', 'desc')->get();
								@endphp
								@foreach($pesanan as $ps)
								<tr>
									<td>{{ App\Customer::where('id', $ps->id_customer)->value('username') }}</td>
									<td>{{ App\Jasa::where('id', $ps->id_jasa)->value('nama') }}</td>
									<td>{{ $ps->status }}</td>
									<td>{{ date('d-m-Y', strtotime($ps->created_at)) }}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-5">
			<div class="card">
				<div class="card-header">
					<h3 class='card-heading p-1 pl-3'>Transaksi</h3>
				</div>
				<div class="card-body">
					<div class="row">
						<div id="line"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('js-plus')
<script src="{{asset('assets/admin/assets/vendors/dayjs/dayjs.min.js')}}"></script>
<script src="{{asset('assets/admin/assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/admin/assets/js/main.js')}}"></script>

<script type="text/javascript">
	var options = {
		series: [{{ App\Pesanan::where('status', 'Selesai')->count() }}, {{ App\Pesanan::where('status', 'Ditolak')->count() }}, {{ App\Pesanan::where('status', 'Belum diproses')->count() }}],
		chart: {
			width: 380,
			type: 'pie',
		},
		labels: ['Selesai', 'Ditolak', 'Belum Diproses'],
		responsive: [{
			breakpoint: 480,
			options: {
				chart: {
					width: 200
				},
				legend: {
					position: 'bottom'
				}
			}
		}]
	};

	var chart = new ApexCharts(document.querySelector("#line"), options);
	chart.render();
</script>
@endsection