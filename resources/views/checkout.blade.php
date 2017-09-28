@extends('layouts.app')

@section('title','Checkout')

@section('content')

  @include('inc.pre_loader')
  
  @if($checkouts->count() > 0)
    @foreach($checkouts as $user_checkout)
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead class="bg-gold">
            <tr>
              <th>Image</th>
              <th>Product</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <td class="col-xs-2">

                  <div class="thumbnail">      
                    <img src="{{ asset($user_checkout->product_imagePath) }}" alt="{{ $user_checkout->name }}">
                  </div>
                </td>
                <td>{{ $user_checkout->name }} </td>
                <td>R${{ $user_checkout->price }}</td>
                <td>
                  <label for="checkoutIcrement{{ $user_checkout->id }}" class="btn btn-default btn-xs">+</label>
                  <input type="radio" id="checkoutIcrement{{ $user_checkout->id }}" name="checkoutIcrement" value="{{ $user_checkout->id_product }}"class="input-radio-none"/>
                  &nbsp;{{ $user_checkout->quantity }}&nbsp;
                  @if($user_checkout->quantity >= 2)
                    <label for="checkoutDecrement{{ $user_checkout->id }}" class="btn btn-default btn-xs">-</label>
                    <input type="radio" id="checkoutDecrement{{ $user_checkout->id }}" name="checkoutDecrement" value="{{ $user_checkout->id_product }}" class="input-radio-none"/>
                  @endif
                </td>
                <td>
                  <p>R${{ $user_checkout->price * $user_checkout->quantity }}</p>
                  @if(isset($freights))
                    @foreach($freights as $freight)
                      @if($freight->id_checkout == $user_checkout->id)
                        <?php
                          $f = $freight->value;
                          $v = $freight->delivery;
                          $z = $freight->zipcode;
                        ?>
                      @endif
                    @endforeach
                    @if(isset($f))
                      <p>R${{ $f }} -  freight * {{ $user_checkout->quantity }} - quantity</p> 
                      <p>{{ $user_checkout->total}} - Total to pay plus freight included</p>
                      <p>to zipcode {{ $z }}</p>
                      <p>Delivery in {{ $v }} @if($v > 1) days @else day @endif</p>
                    @endif
                  @endif
                </td>
                
              </tr>
          </tbody>  
        </table>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
          <a role="button" class="btn btn-success btn-block" href="{{ url('buy_finish') }}/{{ $user_checkout->id }}" >  
            <i class="fa fa-money"> Buy Finish</i>  
          </a>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
          <label for="checkoutDelete{{ $user_checkout->id}}" class=" btn btn-danger btn-sm btn-block fa fa-remove"> Delete</label>
          <input type="radio" id="checkoutDelete{{ $user_checkout->id }}" name="checkoutDelete" value="{{ $user_checkout->id }}" class="input-radio-none"/>
        </div> 
      </div>
      <hr>
    @endforeach
  @else
    <p class="text-center">No Checkouts</p>
  @endif
@endsection