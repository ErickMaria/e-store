<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width initial-scale=1.0" />

      <!-- Bootstrap css --> 
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

      <!-- Font Awesome theme -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      <!-- Style css -->
     <link href="{{ asset('css/style.css') }}" rel="stylesheet">

  </head>
  <body class="bg-gold container margin-botton-30">
    <header>
      <nav class="navbar">
        <div class="container">
          <div class="navbar-brand">
            <img src="{{ asset('img/logotype/logo.png') }}" alt="" width="100px" height="58px">
          </div>
        </div>
      </nav>
    </header>    
    <div class="container">
      
      <div class="row">
        @include('inc.show_errors_form')
      </div>  
      
      <div>
        <div class="row bg-white">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
            <br>
            <h4 class="text-center">Register:</h4>
            <br>
            <form action="{{ asset('/store') }}" method="POST" class="form">
               {{ csrf_field() }}
               <div class="form-group">
                 {!! Form::label('name', 'Full Name', ['class' => 'form-label']) !!}
                 <br>
                 {!! Form::text('name', null, ['class' => 'input-transparent form-control', 'placeholder'=>'name']) !!}
               </div>
               <hr>
               <div class="form-group">
                 {!! Form::label('email', 'E-mail Address', ['class' => 'form-label']) !!}
                 <br>
                 {!! Form::email('email', null, ['class' => 'input-transparent form-control', 'placeholder'=>'e-mail']) !!}
               </div>
               <hr>
               <div class="form-group">
                 {!! Form::label('password', 'Password', ['class' => 'form-label']) !!}
                 <br>
                 {!! Form::password('password', null, ['class' => 'input-transparent form-control','placeholder'=>'password']) !!}
               </div>
               <hr>
               <div class="form-group">
                 {!! Form::label('check_password', ' CheckPassword', ['class' => 'form-label']) !!}
                 <br>
                 {!! Form::password('check_password', null, ['class' => 'input-transparent form-control', 'placeholder'=>'check password']) !!}
               </div>
               <hr> 
               <div class="form-group">
                 {!! Form::label('birthdate', 'Birthdate', ['class' => 'form-label']) !!}
                 <br>
                 {!! Form::date('birthdate', null, ['class' => 'input-transparent form-control', 'placeholder'=>'date of birth']) !!}
               </div>
               <hr>
               <div class="form-group">
                 {!! Form::label('phone', 'Phone', ['class' => 'form-label']) !!}
                 <br> 
                 {!! Form::number('phone', null, ['class' => 'input-transparent form-control', 'placeholder'=>'phone number']) !!}
               </div>
               <hr>
               <div class="form-group">
                 {!! Form::label('zipcode', 'Zip Code', ['class' => 'form-label']) !!}
                 <br>
                 {!! Form::text('zipcode', null, ['class' => 'input-transparent form-control', 'placeholder'=>'zip code']) !!}
               </div>
               <hr>
               <div class="form-group">
                 {!! Form::label('address', 'Address', ['class' => 'form-label']) !!}
                 <br>
                 {!! Form::text('address', null, ['class' => 'input-transparent form-control','placeholder'=>'address']) !!}
               </div>
               <hr>
               <div class="form-group">
                 {!! Form::label('address_number', 'Address Number', ['class' => 'form-label']) !!}
                 <br>
                 {!! Form::text('address_number', null, ['class' => 'input-transparent form-control','placeholder'=>'number']) !!}
               </div>
               <hr>
               <div class="form-group">
                 {!! Form::label('complement', 'Complement', ['class' => 'form-label']) !!}
                 <br>
                 {!! Form::textarea('complement', null, ['class' => 'form-control','placeholder'=>'complement']) !!}
               </div>
                <hr>
                <div class="form-group">
                 {!! Form::label('neighborhood', 'Neighborhood', ['class' => 'form-label']) !!}
                 <br>
                 {!! Form::text('neighborhood', null, ['class' => 'input-transparent form-control','placeholder'=>'neighborhood']) !!}
               </div>
               <hr>
               <div class="form-group">
                 {!! Form::label('city', 'City', ['class' => 'form-label']) !!}
                 <br>
                 {!! Form::text('city', null, ['class' => 'input-transparent form-control','placeholder'=>'city']) !!}
               <hr>
               <div class="form-group">
                 {!! Form::label('state', 'State', ['class' => 'form-label']) !!}
                 <br>
                 {!! Form::text('state', null, ['class' => 'input-transparent form-control','placeholder'=>'state']) !!}
               </div>
               <hr>
                {!! Form::submit('Register',['class'=>'btn btn-success']) !!}  
                <br>
                <br>
                <blockquote class="alert alert-info">
                  <p>You already a login? <a href="{{ url('/login') }}">click here</a></p>
                </blockquote>
              </form>
            </div>
          </div>
        </div>
      </div>
    
    <!-- Bootbox -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
      
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
      
    <!-- script ajax of Usercontroller for search Zip Code -->
    <script src="{{ asset('js/search_zip.js') }}"></script>
  </body>
</html>