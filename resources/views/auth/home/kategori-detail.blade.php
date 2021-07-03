@extends('app')

@section('title')
@foreach($kategori as $kt)
{{ $kt->nama }} | Repair.Inc
@endforeach
@endsection

@section('content')

<div class="product-section section mb-60 mt-60">
	<div class="container mb10">
		<div class="row">
			<div class="col-12 mb-60">
				@foreach($kategori as $kt)
				<div class="section-title-one" data-title="Jasa {{ $kt->nama }}"><h1>Jasa {{ $kt->nama }}</h1></div>
				@endforeach
			</div>

			<div class="col-12">

				@foreach($jasa as $js)
				<div class="ee-product-list mb-20">
					<div class="image">
						<a href="{{ route('jasa.detail', $js->id) }}" class="img">
							<img src="{{ $js->gambar }}" alt="Product Image">
						</a>
					</div>

					<div class="content">
						<div class="head-content">
							<div class="category-title">
								<h5 class="title"><a href="{{ route('jasa.detail', $js->id) }}">{{ $js->nama }}</a></h5>
							</div>

							<h5 class="price">Rp {{ number_format($js->harga) }}</h5>
						</div>

						<div class="left-content">
							<div class="ratting">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o"></i>
							</div>

							<a href="{{ route('jasa.detail', $js->id) }}" class="mb-30">By {{ App\Mitra::where('id', $js->id_mitra)->value('nama') }}</a>

							<div class="actions">
								<a href="{{ route('jasa.detail', $js->id) }}" class="btn-prim">Detail</a>
							</div>
						</div>

						<div class="right-content">
							<div class="specification">
								<h5>Deskripsi</h5>
								<p>{{ Str::limit($js->deskripsi, 150) }}</p>
							</div>
						</div>

					</div>
				</div>
				@endforeach

			</div>
		</div>
	</div>
</div>
@endsection