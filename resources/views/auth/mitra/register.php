@extends('app-dashboard')

@section('title')
Pesanan | Repair-Inc
@endsection

@section('content')
<div class="page-title">
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
						<th>Nama</th>
						<th>Kategori</th>
						<th>Ratting</th>
						<th>Harga</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					{{-- @foreach($jasa as $cs)
					<tr>
						<td>{{ $cs->nama }}</td>
					<td>{{ App\Kategori::where('id', $cs->id_kategori)->value('nama') }}</td>
					<td>{{ $cs->ratting }}</td>
					<td>{{ $cs->harga }}</td>
					<td>
						<button type="button" class="btn icon btn-warning" data-toggle="modal" data-target="#edit-{{ $cs->id }}"><i data-feather="edit"></i></button>

						<button type="button" class="btn icon btn-danger" data-toggle="modal" data-target="#hapus-{{ $cs->id }}"><i data-feather="delete"></i></button>
					</td>
					</tr>
					@endforeach --}}
				</tbody>
			</table>
		</div>
	</div>
</section>

@endsection