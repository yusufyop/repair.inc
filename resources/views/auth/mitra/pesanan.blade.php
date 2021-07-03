@extends('app-dashboard')

@section('title')
Pesanan | Repair.Inc
@endsection

@section('content')
<div class="page-title mb2">
	<h3>Pesanan</h3>
</div>

<section class="section">
	<div class="card">
		<div class="card-header">

		</div>
		<div class="card-body">
			<table class='table table-striped' id="table1">
				<thead>
					<tr>
						<th>Customer</th>
						<th>Jasa</th>
						<th>Kategori</th>
						<th>Status</th>
						<th>Pembayaran</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($pesanan as $ps)
					<tr>
						<td>{{ App\Customer::where('id', $ps->id_customer)->value('username') }}</td>
						<td>{{ App\Jasa::where('id', $ps->id_jasa)->value('nama') }}</td>
						<td>{{ App\Kategori::where('id', App\Jasa::where('id', $ps->id_jasa)->value('id_kategori'))->value('nama') }}</td>
						<td>{{ $ps->status }}</td>
						<td>
							@php
							$status = App\Pembayaran::where('id_pesanan', $ps->id)->value('status');
							@endphp

							@if( $status == "Belum dibayar" && $ps->status == "Belum diproses")
							<a 
							href="#!" 
							class="btn btn-danger round">{{ App\Pembayaran::where('id_pesanan', $ps->id)->value('status') }}</a>

							@elseif($status == "Proses dibayar" && $ps->status == "Belum disetujui")

							@elseif($status == "Proses Verifikasi")
							<button 
							data-toggle="modal" 
							data-target="#modal-verifikasi{{ $ps->id }}"
							class="btn btn-warning round">{{ App\Pembayaran::where('id_pesanan', $ps->id)->value('status') }}</button>

							@elseif($status == "Terbayar")
							<button 
							data-toggle="modal" 
							data-target="#modal-pembayaran{{ $ps->id }}"
							class="btn btn-success round">{{ App\Pembayaran::where('id_pesanan', $ps->id)->value('status') }}</button>

							@endif
						</td>
						<td>
							@if($status == "Terbayar")
							<div class="btn-group mb-1">
								<div class="dropdown">
									<button class="btn btn-primary dropdown-toggle mr-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Detail
									</button>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
										<a
										data-toggle="modal" 
										class="dropdown-item"
										data-target="#modal-akhiri{{ $ps->id }}" 
										href="#">Progress</a>
										
										<a 
										data-toggle="modal" 
										class="dropdown-item"
										data-target="#modal-feedback{{ $ps->id }}"
										href="#">Feedback</a>

										<a
										data-toggle="modal" 
										class="dropdown-item"
										data-target="#modal-garansi{{ $ps->id }}" 
										href="#">Garansi</a>
									</div>
								</div>
							</div>
							@elseif($ps->status == "Belum disetujui")
							<a class="btn btn-success round" href="{{ route('mitra.pesanan.setujui', $ps->id) }}">Terima</a>
							<a class="btn btn-danger round" href="{{ route('mitra.pesanan.tolak', $ps->id) }}">Tolak</a>
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section>

@foreach($pesanan as $ps)
@php
$statuss = App\Pembayaran::where('id_pesanan', $ps->id)->value('status');
@endphp

@if( $statuss == "Proses Verifikasi" )
<div class="modal fade" id="modal-verifikasi{{ $ps->id }}" tabindex="-1" role="dialog">
	<form action="{{ route('mitra.pesanan.konfirmasi_bayar') }}" method="POST">
		@csrf
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Verifikasi Pembayaran</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<div class="modal-body">
					<table class="table table-striped">
						<tbody>
							<tr>
								<th>Customer</th>
								<td class="text-left">
									{{ App\Customer::where('id', $ps->id_customer)->value('username') }}
								</td>
							</tr>
							<tr>
								<th>Kode Invoice</th>
								<td class="text-left">{{ App\Pembayaran::where('id_pesanan', $ps->id)->value('kode_invoice') }}</td>
							</tr>
							<tr>
								<th>Kategori</th>
								<td class="text-left">{{ App\Kategori::where('id', App\Jasa::where('id', $ps->id_jasa)->value('id_kategori'))->value('nama') }}</td>
							</tr>
							<tr>
								<th>Jasa</th>
								<td class="text-left">{{ App\Jasa::where('id', $ps->id_jasa)->value('nama') }}</td>
							</tr>
							<tr>
								<th>Mitra</th>
								<td class="text-left">{{ App\Mitra::where('id', App\Jasa::where('id', $ps->id_jasa)->value('id_mitra'))->value('nama') }}</td>
							</tr>
							<tr>
								<th>Biaya</th>
								<td class="text-left">Rp {{ number_format(App\Jasa::where('id', $ps->id_jasa)->value('harga')) }}</td>
							</tr>
						</tbody>
					</table>

					<div class="alert alert-primary" role="alert">
						Dibayarkan pada {{ App\Pembayaran::where('id_pesanan', $ps->id)->value('updated_at') }}
					</div>

					<div class="text-center">
						<img width="100%" src="{{ App\Pembayaran::where('id_pesanan', $ps->id)->value('gambar') }}">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-light-secondary" data-dismiss="modal">
						<i class="bx bx-x d-block d-sm-none"></i>
						<span class="d-none d-sm-block">Close</span>
					</button>

					<input type="hidden" name="id" value="{{ App\Pembayaran::where('id_pesanan', $ps->id)->value('id') }}">

					<button type="submit" class="btn btn-primary ml-1">
						<i class="bx bx-check d-block d-sm-none"></i>
						<span class="d-none d-sm-block">Konfirmasi Sukses</span>
					</button>
				</div>
			</div>
		</div>
	</form>
</div>

@elseif($statuss == "Terbayar")
<div class="modal fade" id="modal-pembayaran{{ $ps->id }}" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Verifikasi Pembayaran</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i data-feather="x"></i>
				</button>
			</div>
			<div class="modal-body">
				<table class="table table-striped">
					<tbody>
						<tr>
							<th>Customer</th>
							<td class="text-left">
								{{ App\Customer::where('id', $ps->id_customer)->value('username') }}
							</td>
						</tr>
						<tr>
							<th>Kode Invoice</th>
							<td class="text-left">{{ App\Pembayaran::where('id_pesanan', $ps->id)->value('kode_invoice') }}</td>
						</tr>
						<tr>
							<th>Kategori</th>
							<td class="text-left">{{ App\Kategori::where('id', App\Jasa::where('id', $ps->id_jasa)->value('id_kategori'))->value('nama') }}</td>
						</tr>
						<tr>
							<th>Jasa</th>
							<td class="text-left">{{ App\Jasa::where('id', $ps->id_jasa)->value('nama') }}</td>
						</tr>
						<tr>
							<th>Mitra</th>
							<td class="text-left">{{ App\Mitra::where('id', App\Jasa::where('id', $ps->id_jasa)->value('id_mitra'))->value('nama') }}</td>
						</tr>
						<tr>
							<th>Biaya</th>
							<td class="text-left">Rp {{ number_format(App\Jasa::where('id', $ps->id_jasa)->value('harga')) }}</td>
						</tr>
					</tbody>
				</table>

				<div class="alert alert-primary" role="alert">
					Dibayarkan pada {{ App\Pembayaran::where('id_pesanan', $ps->id)->value('updated_at') }}
				</div>

				<div class="text-center">
					<img width="100%" src="{{ App\Pembayaran::where('id_pesanan', $ps->id)->value('gambar') }}">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light-secondary" data-dismiss="modal">
					<i class="bx bx-x d-block d-sm-none"></i>
					<span class="d-none d-sm-block">Close</span>
				</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade text-left w-100" id="modal-akhiri{{ $ps->id }}" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel16">Progres Pesanan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i data-feather="x"></i>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<table class="table table-striped">
							<tbody>
								<tr>
									<th>Customer</th>
									<td class="text-left">
										{{ App\Customer::where('id', $ps->id_customer)->value('username') }}
									</td>
								</tr>
								<tr>
									<th>Kode Invoice</th>
									<td class="text-left">{{ App\Pembayaran::where('id_pesanan', $ps->id)->value('kode_invoice') }}</td>
								</tr>
								<tr>
									<th>Kategori</th>
									<td class="text-left">{{ App\Kategori::where('id', App\Jasa::where('id', $ps->id_jasa)->value('id_kategori'))->value('nama') }}</td>
								</tr>
								<tr>
									<th>Jasa</th>
									<td class="text-left">{{ App\Jasa::where('id', $ps->id_jasa)->value('nama') }}</td>
								</tr>
								<tr>
									<th>Mitra</th>
									<td class="text-left">{{ App\Mitra::where('id', App\Jasa::where('id', $ps->id_jasa)->value('id_mitra'))->value('nama') }}</td>
								</tr>
								<tr>
									<th>Biaya</th>
									<td class="text-left">Rp {{ number_format(App\Jasa::where('id', $ps->id_jasa)->value('harga')) }}</td>
								</tr>
							</tbody>
						</table>

					</div>
					<div class="col-md-6">
						<div class="vertical-timeline vertical-timeline--animate vertical-timeline--one-column">


							@php
							$selesai_tes = App\Tracking::where('id_pesanan', $ps->id)->where('status', 'Selesai')->count();
							@endphp

							@foreach($tracking as $tr)
							@if($tr->id_pesanan == $ps->id)
							@if($tr->status == "Order")
							<div class="vertical-timeline-item vertical-timeline-element">
								<div> 
									<span class="vertical-timeline-element-icon bounce-in"> 
										<i class="badge badge-dot badge-dot-xl badge-success"> </i> 
									</span>
									<div class="vertical-timeline-element-content bounce-in">
										<h4 class="timeline-title">Order</h4>
										<p>diorder pada <span class="text-success">{{ \Carbon\Carbon::parse($tr->created_at)->isoFormat('dddd, D MMMM Y') }}</span></p>
									</div>
								</div>
							</div>
							@endif
							@else
							@endif
							@endforeach

							@foreach($tracking as $tr)
							@if($tr->id_pesanan == $ps->id)
							@if($tr->status == "Pembayaran")
							<div class="vertical-timeline-item vertical-timeline-element">
								<div> 
									<span class="vertical-timeline-element-icon bounce-in"> 
										<i class="badge badge-dot badge-dot-xl badge-success"> </i> 
									</span>
									<div class="vertical-timeline-element-content bounce-in">
										<h4 class="timeline-title">Pembayaran</h4>
										<p>dibayar pada <span class="text-success">{{ \Carbon\Carbon::parse($tr->created_at)->isoFormat('dddd, D MMMM Y') }}</span></p>
									</div>
								</div>
							</div>
							@endif
							@else
							@endif
							@endforeach

							@foreach($tracking as $tr)
							@if($tr->id_pesanan == $ps->id)
							@if($tr->status == "Proses")
							<div class="vertical-timeline-item vertical-timeline-element">
								<div> 
									<span class="vertical-timeline-element-icon bounce-in"> 
										@if($selesai_tes == 0)
										<i class="badge badge-dot badge-dot-xl badge-warning"> </i>
										@else
										<i class="badge badge-dot badge-dot-xl badge-success"> </i>
										@endif 
									</span>
									<div class="vertical-timeline-element-content bounce-in">
										<h4 class="timeline-title">Proses</h4>
										<p>Masih dalam pemrosesan,<br>
											mulai diproses pada <span class="text-success">{{ \Carbon\Carbon::parse($tr->created_at)->isoFormat('dddd, D MMMM Y') }}</span>
										</p>
									</div>
								</div>
							</div>
							@endif
							@else
							@endif
							@endforeach

							@if($selesai_tes == 0)
							<div class="vertical-timeline-item vertical-timeline-element">
								<div> 
									<span class="vertical-timeline-element-icon bounce-in"> 
										<i class="badge badge-dot badge-dot-xl badge-secondary"> </i> 
									</span>
									<div class="vertical-timeline-element-content bounce-in">
										<h4 class="timeline-title">Selesai</h4>
										<p>Belum selesai</p>
									</div>
								</div>
							</div>
							@else

							@foreach($tracking as $tr)
							@if($tr->id_pesanan == $ps->id)
							@if($tr->status == "Selesai")
							<div class="vertical-timeline-item vertical-timeline-element">
								<div> 
									<span class="vertical-timeline-element-icon bounce-in"> 
										<i class="badge badge-dot badge-dot-xl badge-success"> </i> 
									</span>
									<div class="vertical-timeline-element-content bounce-in">
										<h4 class="timeline-title">Selesai</h4>
										<p>selesai pada <span class="text-success">{{ $tr->created_at }}</span></p>
									</div>
								</div>
							</div>
							@endif
							@else
							@endif
							@endforeach
							@endif

						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div class="row">
					<div class="col-md-6">
						@if($ps->status == "Selesai")
						@else
						<a href="{{ route('mitra.pesanan.konfirmasi_selesai', $ps->id) }}" class="btn btn-danger round">Akhiri Progres</a>
						@endif
					</div>
					<div class="col-md-6 text-right">
						<button type="button" class="btn btn-light-secondary" data-dismiss="modal">
							<i class="bx bx-x d-block d-sm-none"></i>
							<span class="d-none d-sm-block">Close</span>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade text-left w-100" id="modal-garansi{{ $ps->id }}" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel16">Garansi</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i data-feather="x"></i>
				</button>
			</div>
			<div class="modal-body">
				{!! App\Garansi::where('id_pesanan', $ps->id)->value('garansi') !!}
			</div>
			<div class="modal-footer">
				<div class="row">
					<div class="col-md-6">
						
					</div>
					<div class="col-md-6 text-right">
						<button type="button" class="btn btn-light-secondary" data-dismiss="modal">
							<i class="bx bx-x d-block d-sm-none"></i>
							<span class="d-none d-sm-block">Close</span>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade text-left w-100" id="modal-feedback{{ $ps->id }}" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel16">Feedback</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i data-feather="x"></i>
				</button>
			</div>
			<div class="modal-body">
				{!! App\Feedback::where('id_pesanan', $ps->id)->value('feedback') !!}
			</div>
			<div class="modal-footer">
				<div class="row">
					<div class="col-md-6">
						
					</div>
					<div class="col-md-6 text-right">
						<button type="button" class="btn btn-light-secondary" data-dismiss="modal">
							<i class="bx bx-x d-block d-sm-none"></i>
							<span class="d-none d-sm-block">Close</span>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@else
@endif
@endforeach

@endsection