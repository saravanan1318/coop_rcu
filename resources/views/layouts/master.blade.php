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
    @include('partials.societymenu')
    @yield('content')
    @include('partials.footer')
    @include('partials.scripts')
</body>
</html>