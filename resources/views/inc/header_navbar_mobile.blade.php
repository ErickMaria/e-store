<!-- navbar smartphone -->

<nav class="navbar bg-gold navbar-mobile">
	<div class="container-fluid">
		<div class="col-xs-2 text-left">
			
			<button class="btn navbar-collpase navbar-btn btn-transparent" data-toggle="collapse" data-target="#categories">
				<i class="fa fa-bars fa-lg"></i>
			</button>

		</div>
		<div class="col-xs-6 text-center">
			<a class="navbar-brand" href="/">
        <img src="{{ asset('img/logotype/logo.png') }}" alt="" width="100px" height="60px">
      </a>
		</div>

		<div class="col-xs-2">
			<div class="dropdown">
				<button class="navbar-btn btn-transparent" data-toggle="dropdown">
          <i class="fa fa-user-circle fa-lg"></i>
        </button>
				<div class="dropdown-menu dropdown-menu-right">
					@include('inc.navbar_user')
				</div>
			</div>
		</div>
		<div class="col-xs-2">
			<div class="dropdown">
				<button class="navbar-btn btn-transparent" data-toggle="dropdown">
          <i class="fa fa-shopping-cart fa-lg">
						<span class="badge hidden-xs">
							@if(isset($carts))
								{{ $carts->count() }}
							@endif
						</span>
					</i>
        </button>
				<style>
					.dropdown-menu-cart{
						right: -60px;
						width: auto;
					}
				</style>
				<div class="dropdown-menu dropdown-menu-right">
					@include('inc.navbar_cart')
				</div>
			</div>
		</div>
		<br/>
		<br/>
		
		<div class="collapse" id="categories">
			
			@if(isset($categories))
				<br>
				@foreach($categories as $category)
					<div class="collapse-content">
						<a href="{{ asset('filter_category') }}/{{ $category->id }}">
							{{ $category->name }}
						</a>
					</div>
				@endforeach
			@else
				<div class="text-center">
					NO CATEGORIES
				</div>
			@endif
		</div>
		<br/> @include('inc.search_form')
	</div>
</nav>