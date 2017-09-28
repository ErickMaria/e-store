<div class=" col-xs-12 col-sm-3 col-md-3 col-lg-3 text-center">
  <a href="{{ asset('details_product') }}/{{ $product->id }}">
    <div class="thumbnail">
      <img src="{{ asset($product->imagePath) }}"  alt="{{ $product->name }}"/>
      <div class="caption">
        <h3>{{ $product->name }}</h3>
        <h5 class="price">R${{ $product->price }}</h5>
      </div>
    </div>
  </a>   
</div>