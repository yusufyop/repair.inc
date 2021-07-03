@extends('app')

@section('title')
@foreach($artikel as $ar)
{{ $ar->judul }} | Repair.Inc
@endforeach
@endsection

@section('content')
@foreach($artikel as $ar)
<div class="blog-section section mt-90 mb-50">
	<div class="container mb10">
		<div class="row row-40">

			<div class="col-lg-8 col-12 order-1 order-lg-2 mb-40">
				<div class="row">

					<div class="col-12 mb-50">
						<div class="ee-single-blog">
							<div class="image"><img src="{{ $ar->gambar }}" alt="Blog Image"></div>
							<div class="content">
								<h3>{{ $ar->judul }}</h3>
								<ul class="meta">
									<li>{{ \Carbon\Carbon::parse($ar->created_at)->isoFormat('dddd, D MMMM Y') }}</li>
								</ul>
								
								{!! $ar->artikel !!}

							</div>
						</div>
					</div>

				</div>

			</div>

			<div class="col-lg-4 col-12 order-2 order-lg-1">
				<div class="blog-sidebar mb-40">
					<h4 class="title">RECENT POST</h4>

					@foreach($artikels as $ar)
					<div class="sidebar-blog">
						<a href="{{ route('artikel.detail', $ar->id) }}" class="image"><img src="{{ $ar->gambar }}" alt="Sidebar Blog"></a>
						<div class="content">
							<h5><a href="{{ route('artikel.detail', $ar->id) }}">{{ $ar->judul }}</a></h5>
							<span>{{ \Carbon\Carbon::parse($ar->created_at)->isoFormat('dddd, D MMMM Y') }}</span>
						</div>
					</div>
					@endforeach

				</div>
			</div>

		</div>
	</div>
</div>]
@endforeach
@endsection