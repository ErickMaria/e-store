@extends('layouts.app')

@section('title',$details_product->name)

<?php
  $zc = 0;
  $t_zc = 0;
  if(session('freight')){
    $freight = session('freight');
    $freight['value'] = str_replace(',','.', $freight['value']);
    $value_total = $details_product->price + $freight['value'] . 0;
    $zc = $freight['zipcode_freight'];
    $t_zc = $freight['type_freight'];
  }
?>

@section('content')

  <div id="ploader" class="">
    @include('inc.pre_loader')
  </div>  
  
    

  <div class="row">
    <div class="col-md-6 col-xs-6 col-sm text-left">
      <a class="text-left" href="{{ URL::previous() }}"><i class="fa fa-chevron-left"></i> back page</a>
    </div>
    <div class="col-md-6 col-xs-6 col-sm text-right">
      <a class="text-left" href="{{ asset('filter_category') }}/{{ $details_product->id_category }}">go this category <i class="fa fa-chevron-right"></i></a>
    </div>
  </div>
  <hr>
  <div class="row">
    
    <h1 class="text-center visible-xs"><b>{{ $details_product->name }}</b></h1>
    
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center">
      <div class="thumbnail">      
        <img src="{{ asset($details_product->imagePath) }}" alt="{{ $details_product->name }}">
      </div>
      <h3 class=" hidden-xs"><b>{{ $details_product->name }}</b></h3>
    </div>
    
    <div class="col-xs-12  col-sm-8 col-md-8 col-lg-8">
      <ul  class="nav nav-tabs">
        <li class="active"><a href="#main" data-toggle="tab">main</a></li>
        <li ><a href="#description" data-toggle="tab">Description</a></li>
      </ul>
      
      <div class="tab-content ">
        <div id="main" class="tab-pane fade in active">
          <br>
          <h6 class="price">
            R${{ $details_product->price }}
          </h6>
         
          <a href="{{ url('checkout') }}/{{ $details_product->id }}/{{ $zc }}/{{ $t_zc }}" role="submit" id="buy" class="btn btn-danger">  
            <i class="fa fa-money"> Buy</i>  
          </a>
          
          <button id="addCart" class="btn btn-default">
            <i class="fa fa-cart-plus"> Add cart</i>
            <i id="addCartLoad" class="fa fa-circle-o-notch fa-spin fa-lg hidden"></i>
          </button>
          
          <input type="hidden" id ="idCart" value="{{ $details_product->id }}">
          
          <hr> 
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <form action="{{ url('freight') }}" method="POST" class="form desabled" id="calcFreight" >
              {{ csrf_field() }}
              <div class="form-group">
                {!! Form::label('zipcode_freight','Calculate freight',['class'=>'form-label']) !!}
                <a href="#" data-toggle="tooltip" title="Brazilian zipcode only"><i class="fa fa-info-circle"></i></a>
                {!! Form::text('zipcode_freight',Auth::User()->zipcode,['class'=>'input-transparent form-control']) !!}
              </div>  
              <div class="form-group">
                Comum
                {{ Form::radio('type_freight', '41106',['class'=>'active']) }}
                |
                Sedex
                {{ Form::radio('type_freight', '40010') }}
              </div>
              {!! Form::hidden('id_product', $details_product->id) !!}
							
							<button type="submit" class="btn btn-primary">
								Calculate
								<i id="calcFreightLoad" class="fa fa-circle-o-notch fa-spin fa-lg hidden"> </i>
							</button>
              
            </form>
          </div>
          <div id="dataFreight" class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <br>
            @if(session('freight'))
              <div>
                <p>freight: R${{ $freight['value'] }}</p>
                <p>total: R${{ $value_total }}</p>
                <p>delivery in: {{ $freight['delivery'] }} @if($freight['delivery'] > 1) days @else day @endif</p>
              </div>
            @else
              @include('inc.show_errors_form')
            @endif
          </div> 
        </div> 
        <div id="description" class="tab-pane fade in">
          <br>
          <p>{{ $details_product->description }}</p>
        </div>
      </div>
    </div>
  </div>
  <hr>  
    <h2> Related</h2>
   
			<div class="inline-content text-center">
				@foreach($categories->find($details_product->id_category)->product()->paginate(10) as $product)
					<div class="inline-inner">	
						<a href="{{ asset('details_product') }}/{{ $product->id }}">
							<div class="thumbnail">
								<img src="{{ asset($product->imagePath) }}"  alt="{{ $product->name }}" />
								<div class="caption">
									<h3>{{ $product->name }}</h3>
									<h5 class="price">R${{ $product->price }}</h5>
								</div>
							</div>
						</a>
				</div> 
				@endforeach
			</div>
  
@endsection
