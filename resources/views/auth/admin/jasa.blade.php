@extends('app-dashboard')

@section('title')
Jasa | Repair.Inc
@endsection

@section('content')
<div class="page-title mb2">
	<h3>Jasa</h3>
</div>

<section class="section">
	<div class="card">
		<div class="card-body">
			<table class='table table-striped' id="table1">
				<thead>
					<tr>
						<th>Nama</th>
						<th>Mitra</th>
						<th>Harga</th>
						<th>Order</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($jasa as $js)
					<tr>
						<td>{{ $js->nama }}</td>
						<td>{{ App\Mitra::where('id', $js->id_mitra)->value('nama') }}</td>
						<td>{{ $js->harga }}</td>
						<td></td>
						<td class="text-right">
							<button 
							type="button" 
							class="btn icon btn-warning"
							data-toggle="modal" 
							data-target="#edit-{{ $js->id }}"><i data-feather="edit"></i></button>

							<button 
							type="button" 
							class="btn icon btn-danger"
							data-toggle="modal" 
							data-target="#hapus-{{ $js->id }}"><i data-feather="delete"></i></button>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section>

@foreach($jasa as $cs)
<div class="modal fade text-left" id="hapus-{{ $cs->id }}" tabindex="-1" role="dialog">
	<form action="{{ route('admin.jasa.delete', $cs->id) }}" method="POST">
		@csrf
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel19">Hapus Jasa</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<div class="modal-body">
					Semua data Jasa {{ $cs->nama }} akan terhapus
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
	<form action="{{ route('admin.jasa.edit', $cs->id) }}" method="POST" enctype="multipart/form-data">
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
						<label for="nama">Nama</label>
						<input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" value="{{ $cs->nama }}">
					</div>
					<div class="form-group">
						<label for="id_kategori">Kategori</label>
						<select class="choices form-select" id="id_kategori" name="id_kategori">
							@foreach($kategori as $kt)
							<option value="{{ $kt->id }}" {{( $kt->id == $cs->id_kategori) ? 'selected' : '' }}>{{ $kt->nama }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="harga">Harga</label>
						<input type="number" class="form-control" id="harga" placeholder="Harga" name="harga" value="{{ $cs->harga }}">
					</div>
					<div class="form-file">
						<input type="file" class="form-file-input" id="gambar" name="gambar" required>
						<label class="form-file-label" for="gambar">
							<span class="form-file-text">Pilih Gambar...</span>
							<span class="form-file-button">Cari</span>
						</label>
					</div>
					<div class="form-group mb-3">
						<label for="deskripsi" class="form-label">Deskripsi</label>
						<textarea class="form-control" id="deskripsi" rows="3" name="deskripsi">{{ $cs->deskripsi }}</textarea>
					</div>
					<input type="hidden" name="id_mitra" value="{{ $cs->id_mitra }}">
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
@endsection