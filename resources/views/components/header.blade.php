<div class="header-section section">
	<div class="header-top header-top-one header-top-border pt-10 pb-10">
		<div class="container">
			<div class="row align-items-center justify-content-between">
				<div class="col mt-10 mb-10">
					@if (Auth::guard('customer'))
					@auth('customer')
					<div class="header-links">
						<a href="{{ route('customer.order') }}">
							<img src="{{asset('assets/images/icons/histo.png')}}" alt="Car Icon"> 
							<span>History Order</span>
						</a>
					</div>
					@else
					@endauth
					@endif
				</div>

				<div class="col order-12 order-xs-12 order-lg-2 mt-10 mb-10">
				</div>

				<div class="col order-2 order-xs-2 order-lg-12 mt-10 mb-10">
					<div class="header-account-links">

						@if (Auth::guard('customer'))
						@auth('customer')
						<a href="{{route('customer.profile', Auth::guard('customer')->user()->id)}}">
							<i class="icofont icofont-user-alt-7"></i> 
							<span>{{ Auth::guard('customer')->user()->username }}</span>
						</a>
						<a href="/logout">
							<i class="icofont icofont-login d-none"></i> <span>Logout</span>
						</a>
						@else
						<a href="{{ route('login') }}">
							<i class="icofont icofont-login d-none"></i> <span>Login</span>
						</a>
						@endauth
						@endif

					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="header-bottom header-bottom-one header-sticky">
		<div class="container">
			<div class="row align-items-center justify-content-between">

				<div class="col mt-15 mb-15">
					<div class="header-logo">
						<a href="/">
							<img src="{{asset('assets/images/icons/repair.png')}}" alt="no img" style="height: 40px;">
							<img class="theme-dark" src="{{asset('assets/images/logo-light.png')}}" alt="E&E - Electronics eCommerce Bootstrap4 HTML Template">
						</a>
					</div>
				</div>

				<div class="col order-12 order-lg-2 order-xl-2 d-none d-lg-block">
					<div class="main-menu">
						<nav>
							<ul>
								<li class="active"><a href="/">HOME</a></li>
								<li class="menu-item-has-children"><a href="{{ route('kategori') }}">Kategori</a>
									<ul class="sub-menu">
										@foreach($kategoris as $kt)
										<li><a href="{{ route('kategori.detail', $kt->id) }}">{{ $kt->nama }}</a></li>
										@endforeach
										<li><a href="{{ route('kategori') }}">Lihat Semua Kategori</a></li>
									</ul>
								</li>
								<li class="active"><a href="{{ route('artikel') }}">Artikel</a></li>
								<li class="active"><a href="{{ route('faq') }}">FAQ</a></li>
							</ul>
						</nav>
					</div>
				</div>

				<div class="mobile-menu order-12 d-block d-lg-none col"></div>

			</div>
		</div>
	</div>
</div>