@if($carts->count() > 0)
  <!-- <li> -->
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($carts->where('id_user', Auth::User()->id)->get() as $user_cart)
            <tr>
              <td>{{ $user_cart->name }} </td>
              <td>{{ $user_cart->price }}</td>
              <td>{{ $user_cart->quantity }}</td>
              <td>
                <label for="cartDelete{{ $user_cart->id}}" class=" btn btn-danger btn-xs fa fa-remove"></label>
                <input type="radio" id="cartDelete{{ $user_cart->id }}" name="cartDelete" value="{{ $user_cart->id }}" class="input-radio-none"/>
              </td>
              
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="text-center">
      <a href="{{ url('cart') }}">show cart</a>
    </div>
  <!-- </li> -->
@else
  <div class="collapse-content text-justify">&nbsp; No products in the Cart</li>
@endif