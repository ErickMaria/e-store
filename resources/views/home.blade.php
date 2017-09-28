@extends('layouts.app')

@section('title','home')

@section('slide')
  @include('inc.slide_show_products')
@endsection

@section('content')
  
  @include('inc.pre_loader')

  <div class="row text-center bg-primary">
    <h3>All Products</h3>
  </div>
  <hr>
  <div class="row">
    @if(isset($products))
    @foreach($products as $product)
      @include('inc.render_product_list')
    @endforeach
  </div>
    <nav aria-label="...">
      <ul class="pager">
        <hr/>
        <li><a href="{{ $products->previousPageUrl() }}"><i class="fa fa-arrow-left"></i></a></li>
        <li class="disabled"><a>{{ $products->currentPage() }}</a></li>
        <li><a href="{{ $products->nextPageUrl() }}"><i class="fa fa-arrow-right"></i></a></li>
        <li ><a href="?page={{ $products->lastPage() }}">{{ $products->lastPage() }}</a></li>
      </ul>
    </nav>
  @else
    <div class="text-center">
      NO PRODUCTS LIST <br><br>
    </div>
  @endif
@endsection


