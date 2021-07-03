@extends('app-dashboard')

@section('title')
Artikel | Repair.Inc
@endsection

@section('content')
<div class="page-title mb2">
	<h3>Artikel</h3>
</div>

<section class="section">
	<div class="card">
		<div class="card-header">
			<a href="#" class="btn icon icon-left btn-primary" data-toggle="modal" data-target="#add-new">
				<i data-feather="plus"></i> Artikel Baru
			</a>
		</div>
		<div class="card-body">
			<table class='table table-striped' id="table1">
				<thead>
					<tr>
						<th>Gambar</th>
						<th>Judul</th>
						<th>Tanggal Posting</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($artikel as $cs)
					<tr>
						<td><img src="{{ $cs->gambar }}" width="100"></td>
						<td>{{ $cs->judul }}</td>
						<td>{{ \Carbon\Carbon::parse($cs->created_at)->isoFormat('dddd, D MMMM Y') }}</td>
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

@foreach($artikel as $cs)
<div class="modal fade text-left" id="hapus-{{ $cs->id }}" tabindex="-1" role="dialog">
	<form action="{{ route('admin.artikel.delete', $cs->id) }}" method="POST">
		@csrf
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel19">Hapus Artikel</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<div class="modal-body">
					Semua data Artikel {{ $cs->judul }} akan terhapus
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
	<form action="{{ route('admin.artikel.edit', $cs->id) }}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-full" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel20">Edit Artikel</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-file mb-3">
						<input type="file" class="form-file-input" id="customFile" name="gambar">
						<label class="form-file-label" for="customFile">
							<span class="form-file-text">Pilih Gambar ...</span>
							<span class="form-file-button">Cari</span>
						</label>
					</div>
					<div class="form-group mb-3">
						<label for="judul">Judul</label>
						<input type="text" class="form-control" id="judul" placeholder="Judul" name="judul" value="{{ $cs->judul }}">
					</div>
					<div class="form-group mb-3">
						<textarea class="tiny" name="artikel">{!! $cs->artikel !!}</textarea>
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

<div class="modal fade text-left w-100" id="add-new" tabindex="-1" role="dialog">
	<form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-full" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel20">Add New Artikel</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-file mb-3">
						<input type="file" class="form-file-input" id="customFile" name="gambar" required>
						<label class="form-file-label" for="customFile">
							<span class="form-file-text">Pilih Gambar ...</span>
							<span class="form-file-button">Cari</span>
						</label>
					</div>
					<div class="form-group mb-3">
						<label for="judul">Judul</label>
						<input type="text" class="form-control" id="judul" placeholder="Judul" name="judul" required>
					</div>
					<div class="form-group mb-3">
						<textarea class="tiny" name="artikel" ></textarea>
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

@section('js-plus')
<script src="https://cdn.tiny.cloud/1/naiean50arcvcg7c4k08y4vbuuu0sg1n4s3q5jyab04r7rhi/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
	tinymce.init({
		selector: "textarea.tiny",
		menubar: false,
		plugins: [
		"advlist autolink lists link image charmap print preview anchor",
		"searchreplace visualblocks code fullscreen",
		"insertdatetime media table paste",
		"autoresize"
		],

		image_title: true,
		automatic_uploads: true,
		file_picker_types: 'image',

		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",

		file_picker_callback: function (cb, value, meta) {
			var input = document.createElement('input');
			input.setAttribute('type', 'file');
			input.setAttribute('accept', 'image/*');


			input.onchange = function () {
				var file = this.files[0];

				var reader = new FileReader();
				reader.onload = function () {

					var id = 'blobid' + (new Date()).getTime();
					var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
					var base64 = reader.result.split(',')[1];
					var blobInfo = blobCache.create(id, file, base64);
					blobCache.add(blobInfo);

					cb(blobInfo.blobUri(), { title: file.name });
				};
				reader.readAsDataURL(file);
			};

			input.click();
		}
	});

	$.extend(M.Modal.prototype, {
		_handleFocus(e) {
			if (!this.el.contains(e.target) && this._nthModalOpened === M.Modal._modalsOpen && document.defaultView.getComputedStyle(e.target, null).zIndex < 1002) {
				this.el.focus();
			}
		}
	});
</script>
@endsection