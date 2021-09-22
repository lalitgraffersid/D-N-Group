@extends('front.layout.master')
@section('content')
 	<div class="container container-main-inner" id="about">
  <ul class="breadcrumb">
    <li><a href="{{route('home')}}">Home</a></li>
    <li>About Us</li>
  </ul>
  <h2 class="mb-2">{{$about->heading}}</h2>
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
<img src="{{ asset('/public/admin/clip-one/assets/about_us') }}/{{$about->image}}" class="img-responsive" style="border-radius:10px" />
</div>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 about-main">

<p class="main-text">{!! $about->description !!}</p>




</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 about-main">
<p class="main-text">{!! $about->long_description !!}</p>
</div>
</div>
</div>

<div class="container-gray" id="services">
<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
<!--<h1 class="main-heading2">Our Features</h1> -->

</div>
</div>
<div class="row">
  
  @foreach($aboutimages as $img)
  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
  <div class="abt-service-box">
   <img src="{{ asset('/public/admin/clip-one/assets/about_us/original') }}/{{$img->image}}" class="service-img-responsive" />
  </div>
  <!-- <h4 class="features-head">Electrical Services</h4> -->
  </div>
 @endforeach
 


</div>
</div>


</div>


@endsection

