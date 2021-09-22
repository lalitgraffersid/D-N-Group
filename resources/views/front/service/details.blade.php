@extends('front.layout.master')
@section('content')
<div class="container-gray-inner" id="services">
       
         @foreach($project as $pro)
         
         <?php
         $projectdetailes = DB::table(service_images)->where('service_id',$pro->id)->get();
         
         ?>
         
        <div class="container container-gray-border">
          
          <h2 class="mb-3">{{$pro->title}}</h2>
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
            <img src="{{ asset('/public/admin/clip-one/assets/service/original') }}/{{$pro->image}}" class="img-responsive" style="border-radius:10px" />
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 about-main">
            
            <p class="main-text">{!! $pro->description !!} </p>
            
            

            
            </div>
            </div>
        </div>   
        
        </div>
        
       @endforeach
        <div class="container-gray" id="services">
          <div class="container">
          
          <div class="row">
             @if(!empty(projectdetailes))
              
           
             @foreach($projectdetailes as $prodetails)
             
           <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 ">
            <div class="abt-service-box">
          <img src="{{ asset('/public/admin/clip-one/assets/project/original') }}/{{$prodetails->image}}" class="service-img-responsive" />
          </div>
         
          </div>
          
            @endforeach
            @endif

          </div>
          </div>
          
          
          </div>

	
@endsection

