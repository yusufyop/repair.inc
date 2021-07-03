<nav class="navbar navbar-header navbar-expand navbar-light">
	<a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
	<button 
	class="btn navbar-toggler" 
	type="button" 
	data-toggle="collapse" 
	data-target="#navbarSupportedContent"
	aria-controls="navbarSupportedContent" 
	aria-expanded="false" 
	aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span></button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav d-flex align-items-center navbar-light ml-auto">
			<li class="dropdown">
				
				@if (Auth::guard('mitra'))
				@auth('mitra')
				<a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
					<div class="avatar mr-1">
						<img src="{{asset('assets/images/icons/person.png')}}" alt="" srcset="">
					</div>

					<div class="d-none d-md-block d-lg-inline-block">Hi, {{ Auth::guard('mitra')->user()->nama }}</div>
				</a>
				<div class="dropdown-menu dropdown-menu-right">
					
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="/logout"><i data-feather="log-out"></i> Logout</a>
				</div>
				@else

				<a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
					<div class="avatar mr-1">
						<img src="{{asset('assets/images/icons/person.png')}}" alt="" srcset="">
					</div>

					<div class="d-none d-md-block d-lg-inline-block">{{ Auth::guard('admin')->user()->username }}</div>
				</a>

				<div class="dropdown-menu dropdown-menu-right">
					
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="/logout"><i data-feather="log-out"></i> Logout</a>
				</div>
				@endauth
						@endif
				
			</li>
		</ul>
	</div>
</nav>