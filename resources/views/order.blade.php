@extends('layouts.app')

@section('title','Order')

@section('content')
  
  @include('inc.pre_loader')
  
  @if($orders->count() > 0)
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead class="bg-gold">
          <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>total</th>
            <th>Cancele Order</th>
          </tr>
        </thead>
        <tbody>
          @foreach($orders as $order)
            <tr>
              <td>{{ $order->name }} </td>
              <td>{{ $order->price }}</td>
              <td>{{ $order->quantity }}</td>
              <td>{{ $order->total }}</td>
              <td><a href="{{ url('cancele_order') }}/{{ $order->id }}" id="cart_delete" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @else
    <p class="text-center">No Orders</p>
  @endif
@endsection