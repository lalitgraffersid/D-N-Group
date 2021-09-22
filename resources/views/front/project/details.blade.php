@extends('front.layout.master')
@section('content')
<link rel="stylesheet" href="{{asset('assets/front/Bootstrap/gallery.css')}}">
	<div class="container-gray-inner">
<div class="container">
  <ul class="breadcrumb">
    <li><a href="{{route('home')}}">Home</a></li>
    <li>Projects</li>
  </ul>
  <h2>{{$project->title}}</h2>
  <div class="main-text">
    <p>{!! $project->description !!} </p>
  </div>
  

</div>

</div>

<section id="gallery" class="mt-5">
  <div class="container">
    <div id="image-gallery">
      <div class="row">
        @foreach($projectdetailes as $prodetails)
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
          <div class="img-wrapper">
            <a href="{{ asset('/public/admin/clip-one/assets/project/original') }}/{{$prodetails->image}}"><img src="{{ asset('/public/admin/clip-one/assets/project/original') }}/{{$prodetails->image}}" class="img-responsive"></a>
            <div class="img-overlay">
              <i class="fa fa-plus-circle" aria-hidden="true"></i>
            </div>
          </div>
        </div>
       
       @endforeach 


      </div><!-- End row -->
    </div><!-- End image gallery -->
  </div><!-- End container --> 
</section>




@endsection

