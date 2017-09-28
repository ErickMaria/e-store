
<!-- Errors by forms -->
@if ($errors->any())
    <div class="alert alert-danger">
        <h5>Errors</h5>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Error at register user on BD -->
@if(isset($errordb))
  <div class="alert alert-danger">
     {{ $errordb }}
  </div>
@endif

<!-- Error at login -->

@if(isset($errorLogin))
  <div class="alert alert-danger">
    {{ $errorLogin }}
  </div>
 @endif
