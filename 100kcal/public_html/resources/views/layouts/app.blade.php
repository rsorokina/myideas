<!DOCTYPE html>
<html lang="en" ng-app="app">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>100Kcal</title>

    <!-- CSS и JavaScript -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" media="screen" />
  </head>

  <body>
    <div class="container">
      <nav class="navbar navbar-default">
        <!-- Содержимое Navbar -->
      </nav>
    </div>
    <div class="container">
    @yield('content')
    </div>
    
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bower_components/angular/angular.min.js') }}"></script>
    
    
    
    <script src="{{ asset('scripts/timer.js') }}"></script>
  </body>
</html>