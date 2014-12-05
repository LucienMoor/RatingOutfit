<!doctype html>
<html lang="en">
<head>
  @yield('head')
</head>
<body>
  @include('subview/header')
  
  @yield('body')
  @include('subview/footer')
</body>
</html>