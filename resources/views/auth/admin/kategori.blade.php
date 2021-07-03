@extends('app-dashboard')

@section('title')
Kategori | Repair.Inc
@endsection

@section('content')
<div class="page-title mb2">
	<h3>Kategori</h3>
</div>

<section class="section">
	<div class="card">
		<div class="card-header">
			<a href="#" class="btn icon icon-left btn-primary" data-toggle="modal" data-target="#add-new">
				<i data-feather="plus"></i> Kategori Baru
			</a>
		</div>
		<div class="card-body">
			<table class='table table-striped' id="table1">
				<thead>
					<tr>
						<th>Gambar</th>
						<th>Nama</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($kategori as $cs)
					<tr>
						<td><img src="{{ $cs->gambar }}" height="100px"></td>
						<td>{{ $cs->nama }}</td>
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

@foreach($kategori as $cs)
<div class="modal fade text-left" id="hapus-{{ $cs->id }}" tabindex="-1" role="dialog">
	<form action="{{ route('admin.jasa.kategori.delete', $cs->id) }}" method="POST">
		@csrf
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel19">Hapus Kategori</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<div class="modal-body">
					Semua data Kategori {{ $cs->nama }} akan terhapus
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
	<form action="{{ route('admin.jasa.kategori.edit', $cs->id) }}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Edit Kategori</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" value="{{ $cs->nama }}" required>
					</div>
					<div class="form-file">
						<input type="file" class="form-file-input" id="gambar" name="gambar" required>
						<label class="form-file-label" for="gambar">
							<span class="form-file-text">Pilih Gambar...</span>
							<span class="form-file-button">Cari</span>
						</label>
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
	<form action="{{ route('admin.jasa.kategori.store') }}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Add New Kategori</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" required>
					</div>
					<div class="form-file">
						<input type="file" class="form-file-input" id="gambar" name="gambar" required>
						<label class="form-file-label" for="gambar">
							<span class="form-file-text">Pilih Gambar...</span>
							<span class="form-file-button">Cari</span>
						</label>
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