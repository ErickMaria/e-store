<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','Default')</title> 
    
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   
    <!-- Font Awesome theme -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Style css -->
   <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  
   <!-- Pre loader css -->
   <link rel="stylesheet" href="{{ asset('css/pre_loader.css') }}"> 
    
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  </head>
  <body>
    
    <header>
      @include('layouts.header_navbar')
    </header>

    @yield('slide')

    <div class="container-fluid bg-white">
      <br>
      @yield('content')
      <br>
    </div>

    <footer>
      @include('layouts.footer')
    </footer>

    <!-- Jquery --> 
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

    <!-- Bootstrap js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- Script js -->
    <script src="{{ asset('js/script.js') }}"></script>
    
    <!-- Notidy js  -->
    <script src="{{ asset('notify/notify.min.js') }}"></script>
    
    <!-- Requests ajax -->
    <script src="{{ asset('js/requests.js') }}"></script>
    
    <!-- Pre loader js -->
    <script src="{{ asset('js/pre_loader.js') }}"></script>

    <!-- Bootbox -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
    
  </body>
</html>