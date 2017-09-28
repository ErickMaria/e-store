@inject('carts','App\Models\Cart')

<div class="hidden-xs">
  @include('inc.header_navbar_desktop')
</div>
<div class="visible-xs">
  @include('inc.header_navbar_mobile')
</div>