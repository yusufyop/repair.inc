@extends('app')

@section('title')
Register | Repair.Inc
@endsection

@section('content')

<div class="register-section section mt-90 mb-90">
	<div class="container mb10">
		<div class="row">
			<div class="col-md-3 col-12 d-flex">
			</div>

			<div class="col-md-6 col-12 d-flex">
				<div class="ee-register">

					<h3>Register</h3>

					<form action="{{ route('register.store') }}" method="POST">
						@csrf
						<div class="row">
							<div class="col-12 mb-30">
								<input type="text" placeholder="Username" name="username" required>
							</div>
							<div class="col-12 mb-30">
								<input type="email" placeholder="Email" name="email" required>
							</div>
							<div class="col-12 mb-30">
								<input type="text" placeholder="Nomor Telepon" name="notelp" required>
							</div>
							<div class="col-12 mb-20">
								<input type="password" placeholder="Password" name="password" required>
							</div>
							<div class="col-12 mb-20">
								<textarea name="alamat" placeholder="Alamat" required></textarea>
							</div>
							<div class="col-12 text-center">
								<input type="submit" value="Register"></input>
							</div>
						</div>
					</form>

				</div>
			</div>

			<div class="col-md-3 col-12 d-flex">
			</div>

		</div>
	</div>
</div>
@endsection