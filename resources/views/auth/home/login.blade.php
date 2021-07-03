@extends('app')

@section('title')
Login | Repair.Inc
@endsection

@section('content')
<div class="login-section section mt-90 mb-90">
	<div class="container">
		<div class="row">

			<div class="col-md-3 col-12 d-flex">
			</div>

			<div class="col-md-6 col-12 d-flex">
				<div class="ee-login">
					<h3>Login</h3>

					<form action="" method="POST">
						@csrf
						<div class="row">
							<div class="col-12 mb-30">
								<input type="text" placeholder="Username" name="username">
							</div>
							<div class="col-12 mb-20">
								<input type="password" placeholder="Password" name="password">
							</div>
							<div class="col-12 text-right">
								<input type="submit" value="Login"></input>
							</div>
						</div>
					</form>
					<h4>Belum punya akun? klik di sini untuk <a href="{{ route('home.register') }}">Register</a></h4>
				</div>
			</div>

			<div class="col-md-3 col-12 d-flex">
			</div>

		</div>
	</div>
</div>
@endsection