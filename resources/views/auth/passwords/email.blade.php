<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
      <title>Login</title>
      <meta name="viewport" content="width=device-width initial-scale=1.0" />

      <!-- Bootstrap css --> 
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

      <!-- Font Awesome theme -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      <!-- Style css -->
     <link href="{{ asset('css/style.css') }}" rel="stylesheet">

      <!-- Bootbox -->
      <script src="{{ asset('bootbox/app.min.js') }}"></script>
  </head>
  <body class="bg-gold container margin-botton-150">
    <div class="container">
      
      <br>  
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 text-center">
          <img src="{{ asset('img/logotype/logo.png') }}" alt="" width="150px" height="95px">
          @if (session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
          @endif
          <div class="row text-left">
            @include('inc.show_errors_form')
          </div>
        </div>  
       
        <div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 bg-white">
          <br>
          <h4 class="text-center">Recovery Password:</h4>
          <form action="{{ url('password/email') }}" method="POST" class="form">
            <br>
            {{ csrf_field() }}
            <div class="form-group">
              {!! Form::label('email','E-mail',['class'=>'form-label', 'placeholder'=>'e-mail']) !!}
              <br>
              {!! Form::email('email', null,['class'=>'input-transparent form-control']) !!}
            </div>
            <br>
            <button type="submit" class="btn btn-primary">
              <i class="fa fa-btn fa-envelope"></i> Send Password Reset Link
            </button>
          </form>
          <hr>
          <div class="row">
            <div class="col-md-6 col-xs-6 col-sm text-left">
              <a href="{{ url('/login') }}"><i class="fa fa-chevron-left"></i> back at login</a>
            </div>
            <div class="col-md-6 col-xs-6 col-sm text-right">
              <a class="text-right" href="{{ url('/register') }}"> go to register <i class="fa fa-chevron-right"></i></a>
            </div>
          </div>
          <br>
        </div>
      </div>
    </div>
  </body>
</html>