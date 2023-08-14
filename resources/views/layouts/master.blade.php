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
    @if(Auth::user()->role == 5)  
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