@extends('front.layout.master')
@section('content')

	<div class="container-gray-inner" id="services">
<div class="container">
  <ul class="breadcrumb">
    <li><a href="home.html">Home</a></li>
    <li>Career</li>
  </ul>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h2 class="mb-3">Join Our Team! </h2>
    <h5>Please Submit CV's to: <a href="mailto:cv@dngroup.ie">cv@dngroup.ie</a></h5>
<div class="main-text">
  <p>Do you have what it takes to work in a fast paced, fast thinking environment?</p>
 
  <p>D&N Group are looking for workers of all sorts to fill positions in our ever expanding company. </p>
  <p>Please see below for open positions - Immediate starts available.</p>
  
</div>
</div>
</div>
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
  
    @foreach($job as $jb )
  <div class="job-container">
   <h4 style="font-size: 18px;"> {{$jb->title}}</h4>
  <div class="job-box">
  <p class="main-text">{!! $jb->description !!}</p>
       </div>

      </div>
     @endforeach


        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 centered">
          <div class="contact-box-job">
            <h4 style="font-size: 18px;">Apply for a Job</h4>
           
              @if (count($errors) > 0)
                                  <div class="alert alert-danger val-error-list">
                                     <ul>
                                      @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                         @endforeach
                                     </ul>
                                    </div>
                                   @endif
                                    @if(Session::has('message'))
                                    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{Session::get('message')}}</p>
                                   @endif 
           <form id="quickForm" action="{{route('career.save')}}" method="POST" enctype="multipart/form-data">
						                 {{csrf_field()}}

						            <select name="job" required class="input-box">
						                 <option value=""> Select Job</option>
						                 @foreach($job as $jb)
						                <option value="{{$jb->title}}">{{$jb->title}}</option>
						                 @endforeach
						        
						                 </select>
                                     <input type="text" placeholder="Name" name="name" class="input-box" required>
										<input type="text" required name="contact_no"placeholder="Contact No." class="input-box">
										<input type="text" required name="email" placeholder="Email" class="input-box">
										<textarea rows="6" class="input-box" name="address" placeholder="Address"></textarea>
										<input type="text"  class="input-box" name="dob" required="" placeholder="Date of Birth">
   
                                          <select name="experience" required="" class="input-box">
											<option>-- Experience --</option>
											<option value="1 Years">1 Years</option>
											<option value="2 Years">2 Years</option>
											<option value="3 Years">3 Years</option>
											<option value="4 Years">4 Years</option>
											<option value="5 Years">5 Years</option>
										</select>

										<select name="machine_experience" required="" class="input-box">
											<option>-- Machine Experience --</option>
											<option  value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
                                        
										<textarea  class="input-box" required="" name="your_self" rows="6" placeholder="Tell About Yourself"></textarea>
										<!-- <input type="file"  required name="cv"> -->
										<button type="Submit">Submit</button>
    </form>
    </div>
    
        </div>
        </div>
</div>

</div>
	

@endsection





