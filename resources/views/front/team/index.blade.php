@extends('front.layout.master')
@section('content')

	
		<section>
		<div class="container-fluid">
			<div class="row">
				<div class="banner-bg full-width">
					<img src="{{asset('assets/front/images/about-us-inner.jpg')}}" alt="" class="img-fluid d-block mx-auto">
					<div class="inner-caption">
						<h1>Our Team</h1>
					</div>
				</div>
			</div>
		</div>
	</section>


	
	
	
	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="grey-bg full-width">
					<div class="container">
						<div class="row">

                             
							
                            @foreach($team as $te)        
							<div class="col-lg-4">
								<div class="our-team-box">
									<div class="team-icon"><img src="{{ asset('/public/admin/clip-one/assets/team/original') }}/{{$te->image}}" alt="" class="img-fluid d-block mx-auto"></div>
									<div class="team-text">
										<h2>{{$te->name}}</h2>
										<h3>{{$te->designation}}</h3>
										<p>{{$te->description}}</p>
									</div>
								</div>
							</div> 
                            @endforeach
						

						

					</div>
				</div>
			</div>
		</div>
	</section>

@endsection

