<!doctype html>
<html lang="en">
<head>      
  @yield('head')
  @include('subview/header')
  @yield('subHead')
  
  @if (Session::has('error_message'))
  <div class="alert alert-danger" role="alert">{{ Session::get('error_message') }}</div>       
  @endif
  @if (Session::has('success_message'))
  <div class="alert alert-success" role="alert">{{ Session::get('success_message') }}</div> 
  @endif
  
  @yield('body')
  @include('subview/footer')
</body>
</html>