@extends('app')

@section('title')
Artikel | Repair.Inc
@endsection

@section('content')
<div class="product-section section mb-60 mt-60">
	<div class="container mb10">
		<div class="row">
			<div class="col-12">
				<div class="row">

					@foreach($artikel as $ar)
					<div class="col-xl-4 col-lg-4 col-md-6 col-12 pb-30 pt-10">
						<div class="ee-blog">
							<a href="{{ route('artikel.detail', $ar->id) }}" class="image">
								<img src="{{ $ar->gambar }}" alt="Blog Image">
							</a>
							<div class="content">
								<h3>
									<a href="{{ route('artikel.detail', $ar->id) }}">
										{{ $ar->judul }}
									</a>
								</h3>
								<ul class="meta">
									<li>
										<a href="{{ route('artikel.detail', $ar->id) }}">{{ \Carbon\Carbon::parse($ar->created_at)->isoFormat('dddd, D MMMM Y') }}</a>
									</li>
								</ul>
								<p>{!! Str::limit($ar->artikel, 100, '...') !!}</p>
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