@extends('layouts.app')

@section('title','Cart')
<?php
  $zc = 0;
  $t_zc = 0;
?>
@section('content')

  @include('inc.pre_loader')

  <div class="table-responsive">
    <table class="table ">
      <thead class="bg-gold">
        <tr>
          <th>Product</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Total</th>
          <th>Buy</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($carts as $user_cart)
          <tr>
            <td>{{ $user_cart->name }} </td>
            <td>
              {{ $user_cart->price }}</td>
            <td>
              <label for="cartIcrement{{ $user_cart->id }}" class="btn btn-default btn-xs">+</label>
              <input type="radio" id="cartIcrement{{ $user_cart->id }}" name="cartIcrement" value="{{ $user_cart->id_product }}"class="input-radio-none"/>
              &nbsp;{{ $user_cart->quantity }}&nbsp;
              @if($user_cart->quantity >= 2)
                <label for="cartDecrement{{ $user_cart->id }}" class="btn btn-default btn-xs">-</label>
                <input type="radio" id="cartDecrement{{ $user_cart->id }}" name="cartDecrement" value="{{ $user_cart->id_product }}" class="input-radio-none"/>
              @endif
            </td>
            <td>{{ $user_cart->total }}</td>
            <td>
              <a class="btn btn-success btn-xs" href="{{ url('checkout') }}/{{ $user_cart->id_product}}/{{ $zc }}/{{ $t_zc }}/{{ $user_cart->id }}" id="buy">  
                <i class="fa fa-money fa-lg"> Buy</i>  
              </a>
            </td>
            <td>   
              <label for="cartDelete{{ $user_cart->id}}" class=" btn btn-danger btn-xs fa fa-remove"> Delete</label>
              <input type="radio" id="cartDelete{{ $user_cart->id }}" name="cartDelete" value="{{ $user_cart->id }}" class="input-radio-none"/>
            </td> 
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
<script>
</script>