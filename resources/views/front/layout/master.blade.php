<!DOCTYPE html>
<html>
@include('front/includes/head')
<body style="overflow-x:hidden">
  <div class="wrapper">

@yield('slider')

@include('front/includes/header')

@yield('content')

@include('front/includes/footer')

</body>

</html>