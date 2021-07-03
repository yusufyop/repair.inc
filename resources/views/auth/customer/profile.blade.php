@extends('app')

@section('title', 'Profile | Repair.Inc')

@section('content')
<div class="product-section section mb-60 mt-60">
	<div class="container mb10">
		<div class="row">
			<div class="col-6 mx-auto">
				<h1 class="text-center mb-5">Profile</h1>
                <div class="form-group">
                    <label for="">Username Anda</label>
                    <input type="text" class="form-control" name="username" value="{{$data->username}}" id="" disabled>
                </div>
                <div class="form-group">
                    <label for="">Password Anda</label>
                    <input type="password" class="form-control" name="username" value="{{$data->password}}" id="" disabled>
                </div>
                <div class="form-group">
                    <label for="">Email Anda</label>
                    <input type="text" class="form-control" name="username" value="{{$data->email}}" id="" disabled>
                </div>
                <div class="form-group">
                    <label for="">Nomor Handphone Anda</label>
                    <input type="text" class="form-control" name="username" value="{{$data->notelp}}" id="" disabled>
                </div>
                <div class="form-group">
                    <label for="">Alamat Anda</label>
                    <textarea type="text" class="form-control" name="username" disabled>{{$data->alamat}}</textarea>
                </div>
                <div class="text-center">
                    <a type="submit" href="{{route('customer.profile.edit', $data->id)}}" class="btn btn-warning text-light">Edit Profile</a>
                </div>
			</div>
		</div>
	</div>
</div>
@endsection