@extends('front.layout.master')
@section('content')
<link rel="stylesheet" href="{{asset('assets/front/Bootstrap/gallery.css')}}">
<div class="container-gray-inner">
<div class="container">
  <ul class="breadcrumb">
    <li><a href="{{route('home')}}">Home</a></li>
    <li>D &amp; N Group's Sponsorships</li>
  </ul>
  <h2>{{$sponsorship->heading}} </h2>
  <div class="main-text">
    <p>{!! $sponsorship->description !!}</p>
  </div>
  

</div>

</div>

<section id="gallery" class="mt-5">
  <div class="container">
    <div id="image-gallery">
      <div class="row">
       
        @foreach($sponsorshipimages as $img)
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image mb-4">
          <div class="img-wrapper mb-0">
            <a href="{{ asset('/public/admin/clip-one/assets/sponsorship/original') }}/{{$img->image}}"><img src="{{ asset('/public/admin/clip-one/assets/sponsorship/original') }}/{{$img->image}}" class="img-responsive"></a>
            <div class="img-overlay">
              <i class="fa fa-plus-circle" aria-hidden="true"></i>
            </div>
          </div>
          <!--<div class="centered"><h5>{{$img->name}}</h5></div> -->
        </div>

         @endforeach

          
       
      </div><!-- End row -->
    </div><!-- End image gallery -->
  </div><!-- End container --> 
</section>
@endsection