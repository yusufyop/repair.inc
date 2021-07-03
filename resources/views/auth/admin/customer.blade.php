@extends('app-dashboard')

@section('title')
Customer | Repair.Inc
@endsection

@section('content')
<div class="page-title mb2">
	<h3>Customer</h3>
</div>

<section class="section">
	<div class="card">
		<div class="card-body">
			<table class='table table-striped' id="table1">
				<thead>
					<tr>
						<th>Username</th>
						<th>Email</th>
						<th>No Telepon</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($customer as $cs)
					<tr>
						<td>{{ $cs->username }}</td>
						<td>{{ $cs->email }}</td>
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

@foreach($customer as $cs)
<div class="modal fade text-left" id="hapus-{{ $cs->id }}" tabindex="-1" role="dialog">
	<form action="{{ route('admin.customer.delete', $cs->id) }}" method="POST">
		@csrf
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel19">Hapus Customer</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<div class="modal-body">
					Semua data Customer {{ $cs->username }} akan terhapus
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
	<form action="{{ route('admin.customer.edit', $cs->id) }}" method="POST">
		@csrf
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Edit Customer</h5>
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
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{ $cs->email }}">
					</div>

					<div class="form-group">
						<label for="notelp">No Telepon</label>
						<input type="number" class="form-control" id="notelp" placeholder="No Telepon" name="notelp" value="{{ $cs->notelp }}">
					</div>

					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" placeholder="Password" name="password" value="" required>
					</div>

					<div class="form-group mb-3">
						<label for="alamat" class="form-label">Alamat</label>
						<textarea class="form-control" id="alamat" rows="3" name="alamat">{{ $cs->alamat }}</textarea>
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
@endsection