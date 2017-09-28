
<!-- navbar desktop and tablet -->
<nav class="navbar bg-gold">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">
      <img src="{{ asset('img/logotype/logo.png') }}" alt="" width="100px" height="58px">
    </a>
    <p class="navbar-text">|</p>
    
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <button class="navbar-btn btn-transparent" data-toggle="dropdown">
          <i class="fa fa-user fa-lg"></i>
        </button>
        <ul class="dropdown-menu">
          @include('inc.navbar_user')
        </ul>
      </li>
      <li class="dropdown">
        <button class="navbar-btn btn-transparent" data-toggle="dropdown">
          <i class="fa fa-shopping-cart fa-lg">
            <span class="badge">
              @if(isset($carts))
                {{ $carts->count() }}
              @endif
            </span>
          </i>
        </button>
        <ul class="dropdown-menu dropdown-menu-cart">
          
          @include('inc.navbar_cart')
        </ul>
      </li>
    </ul>
    <p class="navbar-text navbar-right">|</p>
    @include('inc.search_form')
  </div>
  <div class="dropdown">
    <div class="category-desktop category-desktop-bg-black">
      <div class=" container-fluid">
        <button class=" dropdown-toggle category-desktop-btn-dropdown-menu btn-link" data-toggle="dropdown" id="navbar-open-category-desktop">
          <h5>
            <i class="fa fa-bars fa-lg"></i>  All Categories <i class="fa fa-chevron-down"></i>
          </h5>
        </button>
          <div class="dropdown-menu">
            @if(isset($categories))
            
              @foreach($categories as $category)
                <div class="collapse-content bg-white">
                  <a  href="{{ asset('filter_category') }}/{{ $category->id }}">
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
      </div>
    </div>
  </div>
</nav>