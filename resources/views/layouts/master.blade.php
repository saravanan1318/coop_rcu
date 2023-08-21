<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Coop</title>
  @include('partials.styles')
</head>
<body>
    @include('partials.header')
    @if(Auth::user()->role == 5 || Auth::user()->role == 6 || Auth::user()->role == 7 
    || Auth::user()->role == 8 || Auth::user()->role == 9 || Auth::user()->role == 10 
    || Auth::user()->role == 11 || Auth::user()->role == 12 || Auth::user()->role == 13)  
      @include('partials.societymenu')
    @elseif(Auth::user()->role == 2)
      @include('partials.superadminmenu')   
    @endif
    
    @yield('content')
    @include('partials.footer')
    </div>
    @include('partials.scripts')
</body>
</html>