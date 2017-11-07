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

		<div class="col-xs-2"><!--
			<div class="dropdown"> -->
				<button class="navbar-collapse navbar-btn btn-transparent" data-toggle="collapse" data-target="#user">
          <i class="fa fa-user-circle fa-lg"></i>
        </button><!--
			</div>-->
		</div>
		<div class="col-xs-2"><!--
			<div class="dropdown"> -->
				<button class="navbar-collapse navbar-btn btn-transparent" data-toggle="collapse" data-target="#cart">
          <i class="fa fa-shopping-cart fa-lg">
						<span class="badge hidden-xs">
							@if(isset($carts))
								{{ $carts->count() }}
							@endif
						</span>
					</i>
        </button><!--
			</div> -->
		</div>
		<br/>
		<br/>
		
    <br>
    <div style="background:white" class="collapse" id="cart">
      <hr>
			@include('inc.navbar_cart')
      <br>
		</div>
    <br>
    <div style="background:white" class="collapse" id="user">
      
      @include('inc.navbar_user')
    </div>
    <br>
		<div style="background:white" class="collapse" id="categories">
      
			
			@if(isset($categories))
				
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