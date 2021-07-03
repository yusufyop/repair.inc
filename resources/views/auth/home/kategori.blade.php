@extends('app')

@section('title')
Kategori | Repair.Inc
@endsection

@section('content')
<div class="product-section section mb-60 mt-60">
	<div class="container mb10">
		<div class="row">
			<div class="col-12">
				<div class="row">

					@foreach($kategori as $kt)
					<div class="col-xl-3 col-lg-4 col-md-6 col-12 pb-30 pt-10">
						<div class="ee-product">
							<div class="image">
								<a href="{{ route('kategori.detail', $kt->id) }}" class="img">
									<img src="{{ $kt->gambar }}" alt="Product Image">
								</a>
							</div>

							<div class="content">
								<div class="category-title">
									<h5 class="title">
										<a href="{{ route('kategori.detail', $kt->id) }}">{{ $kt->nama }}</a>
									</h5>
								</div>
								<div class="price-ratting">
									<h5 class="price">
										{{ App\Jasa::where('id_kategori', $kt->id)->count() }} Jasa
									</h5>
								</div>
							</div>
						</div>
					</div>
					@endforeach

				</div>
			</div>
		</div>
	</div>
</div>
@endsection