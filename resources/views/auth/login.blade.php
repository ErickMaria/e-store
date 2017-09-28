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
    
  </head>
  <body class="bg-gold container margin-botton-30">
    <div class="container">
      <br>  
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 text-center">
          <img src="{{ asset('img/logotype/logo.png') }}" alt="" width="150px" height="95px">
          <div class="row text-left">
            @include('inc.show_errors_form')
          </div>
        </div>  
        <br>
        <div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 bg-white">
          <br>
          <h4 class="text-center">Login:</h4>
          <form action="{{ url('/login') }}" method="POST" class="form">
            <br>
            {{ csrf_field() }}
            <div class="form-group">
              {!! Form::label('email','E-mail',['class'=>'form-label', 'placeholder'=>'e-mail']) !!}
              <br>
              {!! Form::email('email', null,['class'=>'input-transparent form-control']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('password', 'Password',['class'=>'form-label']) !!}
              <br>
              {!! Form::password('password', null,['class'=>'input-transparent form-control', 'placeholder'=>'password']) !!}
            </div>
            <br>
            {!! Form::submit('Login',['class'=>'btn btn-primary']) !!}  
          </form>
          <br>
          <p class="alert alert-info">You not already a login? <a href="{{ url('register') }}">click here</a></p>
          <p class="alert alert-info">forget your password? <a href="{{ url('password/reset') }}">click here</a></p>
          <br>
        </div>
          <br>
      </div>
    </div>
  </body>
</html>