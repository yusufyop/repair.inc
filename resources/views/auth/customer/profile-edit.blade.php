@extends('app')

@section('title', 'Edit Profile | Repair.Inc')

@section('content')
<div class="product-section section mb-60 mt-60">
	<div class="container mb10">
		<div class="row">
			<div class="col-6 mx-auto">
				<h1 class="text-center mb-5">Edit Profile</h1>
                <form action="{{route('profileData', Auth::guard('customer')->user()->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                    <label for="">Username Anda</label>
                    <input type="text" class="form-control" name="username" value="{{$data->username}}">
                </div>
                <div class="form-group">
                    <label for="">Password Anda</label>
                    <input type="password" class="form-control" placeholder="*************" name="password" value="">
                </div>
                <div class="form-group">
                    <label for="">Email Anda</label>
                    <input type="text" class="form-control" name="email" value="{{$data->email}}">
                </div>
                <div class="form-group">
                    <label for="">Nomor Handphone Anda</label>
                    <input type="text" class="form-control" name="notelp" value="{{$data->notelp}}">
                </div>
                <div class="form-group">
                    <label for="">Alamat Anda</label>
                    <textarea type="text" class="form-control" name="alamat" >{{$data->alamat}}</textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success text-light">Submit</button>
                </div>
                </form>
			</div>
		</div>
	</div>
</div>
@endsection