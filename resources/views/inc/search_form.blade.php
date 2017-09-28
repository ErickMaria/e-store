<form action="/search" method="POST" class="navbar-form form-inline navbar-right">
  {{ csrf_field() }}
  <div class="input-group">
    {!! Form::text('search_for', null, ['class' => 'input-transparent form-control', 'placeholder'=>'search for...']) !!}
    <span class="input-group-btn">
      <button type="submit" class="btn btn-md btn-transparent"><i class="fa fa-search fa-lg"></i></button>
    </span>
  </div>
</form>