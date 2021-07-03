@extends('app')

@section('title')
@foreach($jasa as $js)
{{ $js->nama }} | Repair.Inc
@endforeach
@endsection

@section('content')
@foreach($jasa as $js)
<div class="product-section section mt-90 mb-90">
	<div class="container">

		<div class="row mb-90">

			<div class="col-lg-6 col-12 mb-50">

				<!-- Image -->
				<div class="single-product-image thumb-right">

					<div class="tab-content">
						<div id="single-image-1" class="tab-pane fade show active big-image-slider">
							<div class="big-image">
								<img src="{{ $js->gambar }}" alt="Big Image">
							</div>
						</div>
					</div>
				</div>

			</div>

			<div class="col-lg-6 col-12 mb-50">
				<form action="{{ route('customer.order.post') }}" method="POST">
					@csrf
					<div class="single-product-content">
						<div class="head-content">
							<div class="category-title">
								<a href="{{ route('kategori.detail', $js->id_kategori) }}" class="cat">
									{{ App\Kategori::where('id', $js->id_kategori)->value('nama') }}
								</a>
								<h5 class="title">{{ $js->nama }}</h5>
							</div>
							<h5 class="price">Rp {{ number_format($js->harga) }}</h5>
						</div>

						<div class="single-product-description">
							<div class="ratting">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o"></i>
							</div>

							<div class="desc">
								<p>{{ $js->deskripsi }}</p>
							</div>

							<span class="availability">
								By <span>{{ App\Mitra::where('id', $js->id_mitra)->value('nama') }}</span>
							</span>

							<div class="actions">
								<input type="hidden" name="id_jasa" value="{{ $js->id }}">
								<button type="submit" class="btn btn-outline-warning">Order</button>
							</div>
						</div>
					</div>
				</form>
			</div>

		</div>

	</div>
</div>
@endforeach
@endsection