<!DOCTYPE html>
<html>
@include('front/includes/head')
<style>
    .owl-item .item {
    width: 200px;
    height: 125px;
    background: #e7e7e7;
    padding: 1em;
    display: flex;
    justify-content: center;
    vertical-align: middle;
    border-radius: 10px;
}
</style>
<body style="overflow-x:hidden">
  <div class="wrapper">

@yield('slider')

@include('front/includes/homeheader')

@yield('content')

@include('front/includes/footer')

</body>

</html>