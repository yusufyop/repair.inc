@extends('app-dashboard')

@section('title')
Mitra | Repair.Inc
@endsection

@section('content')
<div class="page-title mb2">
	<h3>Mitra</h3>
</div>

<section class="section">
	<div class="card">
		<div class="card-header">
			<a href="#" class="btn icon icon-left btn-primary" data-toggle="modal" data-target="#add-new">
				<i data-feather="plus"></i> Mitra Baru
			</a>
		</div>
		<div class="card-body">
			<table class='table table-striped' id="table1">
				<thead>
					<tr>
						<th>Nama</th>
						<th>Username</th>
						<th>Ratting</th>
						<th>No Telepon</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($mitra as $cs)
					<tr>
						<td>{{ $cs->nama }}</td>
						<td>{{ $cs->username }}</td>
						<td>{{ $cs->ratting }}</td>
						<td>{{ $cs->notelp }}</td>
						<td class="text-right">
							<button 
							type="button" 
							class="btn icon btn-warning"
							data-toggle="modal" 
							data-target="#edit-{{ $cs->id }}"><i data-feather="edit"></i></button>

							<button 
							type="button" 
							class="btn icon btn-danger"
							data-toggle="modal" 
							data-target="#hapus-{{ $cs->id }}"><i data-feather="delete"></i></button>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section>

@foreach($mitra as $cs)
<div class="modal fade text-left" id="hapus-{{ $cs->id }}" tabindex="-1" role="dialog">
	<form action="{{ route('admin.mitra.delete', $cs->id) }}" method="POST">
		@csrf
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel19">Hapus Mitra</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<div class="modal-body">
					Semua data Mitra {{ $cs->username }} akan terhapus
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-light-secondary btn-sm" data-dismiss="modal">
						<i class="bx bx-x d-block d-sm-none"></i>
						<span class="d-sm-block d-none">Batal</span>
					</button>
					<button type="submit" class="btn btn-primary ml-1 btn-sm">
						<i class="bx bx-check d-block d-sm-none"></i>
						<span class="d-sm-block d-none">Hapus</span>
					</button>
				</div>
			</div>
		</div>
	</form>
</div>

<div class="modal fade" id="edit-{{ $cs->id }}" tabindex="-1" role="dialog">
	<form action="{{ route('admin.mitra.edit', $cs->id) }}" method="POST">
		@csrf
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Edit Mitra</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" id="username" placeholder="Username" name="username" value="{{ $cs->username }}">
					</div>

					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" value="{{ $cs->nama }}">
					</div>

					<div class="form-group">
						<label for="notelp">No Telepon</label>
						<input type="text" class="form-control" id="notelp" placeholder="No Telepon" name="notelp" value="{{ $cs->notelp }}">
					</div>

					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" placeholder="Password" name="password" value="">
					</div>

					<div class="form-group mb-3">
						<label for="descPerform" class="form-label">Deskripsi Performa</label>
						<textarea class="form-control" id="descPerform" rows="3" name="descPerform">{{ $cs->descPerform }}</textarea>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-light-secondary" data-dismiss="modal">
						<i class="bx bx-x d-block d-sm-none"></i>
						<span class="d-none d-sm-block">Close</span>
					</button>

					<button type="submit" class="btn btn-primary ml-1">
						<i class="bx bx-check d-block d-sm-none"></i>
						<span class="d-none d-sm-block">Simpan</span>
					</button>
				</div>
			</div>
		</div>
	</form>
</div>
@endforeach

<div class="modal fade" id="add-new" tabindex="-1" role="dialog">
	<form action="{{ route('admin.mitra.store') }}" method="POST">
		@csrf
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Add New Mitra</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
					</div>

					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" required>
					</div>

					<div class="form-group">
						<label for="notelp">No Telepon</label>
						<input type="number" class="form-control" id="notelp" placeholder="No Telepon" name="notelp" required>
					</div>

					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" placeholder="Password" name="password" value="" required>
					</div>

					<div class="form-group mb-3">
						<label for="descPerform" class="form-label">Deskripsi Performa</label>
						<textarea class="form-control" id="descPerform" rows="3" name="descPerform" required></textarea>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-light-secondary" data-dismiss="modal">
						<i class="bx bx-x d-block d-sm-none"></i>
						<span class="d-none d-sm-block">Close</span>
					</button>

					<button type="submit" class="btn btn-primary ml-1">
						<i class="bx bx-check d-block d-sm-none"></i>
						<span class="d-none d-sm-block">Simpan</span>
					</button>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection