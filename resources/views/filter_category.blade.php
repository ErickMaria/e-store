@extends('layouts.app')

@section('title',$category_filted->name)

@section('content')

  @include('inc.pre_loader')
  
  @if(isset($product_filted))
    <div class="row text-center bg-primary">
      <h3>{{ $category_filted->name }}</h3>
    </div>
    <hr>
    @foreach($product_filted as $product)
      @include('inc.render_product_list')
    @endforeach
  @else
    <p class="middle">NO PRODUCTS</p>
  @endif
@endsection