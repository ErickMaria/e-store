@extends('layouts.app')

@section('title','search')

@section('content')
  @if(empty($result_search))
      <div class="mardgin-top-150">
        <div class="alert alert-info">
          Empty search
        </div>
      </div>
  @else
    @foreach($result_search as $product)
      @include('inc.render_product_list')
    @endforeach
  @endif
@endsection