@extends('front.layout.master')
@section('content')

	

<div class="container-gray-inner" id="services">
<div class="container">
  <ul class="breadcrumb">
    <li><a href="{{route('home')}}">Home</a></li>
    <li>Services</li>
  </ul>
  <h2 class="mb-2">Services</h2>
  <div class="row">
    <div class="col-xl-12">
      <p class="main-text">Founded by Eddie Doyle and Brian Nugent in 2006 as D&N Electrical, the company
        became D&N Group after branching into Reactive, Planned and Preventative Maintenance.</p>
      
    </div>
  </div>
  <div class="row container-main">
    
      @foreach($service as $ser)
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <div class="service-box">
        <div class="service-img">
          <img src="{{ asset('/public/admin/clip-one/assets/category/original') }}/{{$ser->image}}" class="service-img-responsive">
        </div>
        <div class="service-box-text">
          <h4 class="services-head">{{$ser->title}}</h4>
          <!--<p class="services-text">{{ \Illuminate\Support\Str::limit(strip_tags($ser->description), 200, $end='...') }}</p>-->
          <a href="{{route('servicedetail',$ser->id)}}" class="btn-yellow">View Details</a>
        </div>
      </div>
    </div>
   @endforeach
  



  </div>
</div>

</div>














@endsection

