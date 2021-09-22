@extends('front.layout.master')
@section('content')

<section>
	<div class="container-fluid">
		<div class="row">
			<div class="services-panel">
				<div class="container-xxl container-xl container-md container-sm">
					<div class="row">
						<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
							<div class="row">
								<div class="col-xl-12 col-lg-12 col-md-12">
									<div class="web-content">
										<h1>Machinery</h1>
									</div>
								</div>
								
								@foreach($results as $result)
								<?php 
									$product_image = DB::table('product_images')->where('product_id',$result->id)->first();
								?>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
									<div class="product-box">
										<div class="product-icon stock-icon">
											<img src="{{url('/public/admin/clip-one/assets/products/original')}}/{{$product_image->image}}" alt="" class="img-fluid d-block mx-auto">
										</div>
										
										<div class="product-text web-content stock-box">
											<h3>{{$result->title}}</h3>
											<a href="{{route('productDetails',$result->id)}}">Read More</a>
										</div>
									</div>
								</div>
								@endforeach
								
							</div>
						</div>
						
						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
							<div style="position: sticky; top: 0;">
								<div class="web-content">
									<h2>Filter</h2>
								</div>
								<!-- <div class="stock-sidebar">
									<ul class="stock-list">
										<li><a href="new-machinery.html">New Machinery</a></li>
										<li><a href="new-machinery.html">Used Machinery</a></li>
									</ul>																
								</div> -->

								<div class="page-wrapper chiller-theme toggled">
									<form action="{{route('productsFilter')}}" method="GET">
										<nav id="sidebar" class="sidebar-wrapper">
											<div class="sidebar-menu">
											  <ul>
												
												<li class="sidebar-dropdown">
												  <a href="#">
													<span>Choose Type</span>
												  </a>
												  <div class="sidebar-submenu">
													<ul>
													  <li><label><input type="radio" name="type" value="New" <?php if($type == 'New') {echo "checked";} ?>> New</label></li>
													  <li><label><input type="radio" name="type" value="Used" <?php if($type == 'Used') {echo "checked";} ?>> Used</label></li>
													</ul>
												  </div>
												</li>
												
												<li class="sidebar-dropdown">
														<a href="#">
														  <span>Choose Dealer</span>
														</a>
														<div class="sidebar-submenu">
														  <ul>
														  	@foreach($dealers as $dealer)
																<li><label><input type="checkbox" name="dealer_id[]" value="{{$dealer->id}}" <?php if(in_array($dealer->id,$dealer_id)) {echo "checked";} ?>> {{$dealer->name}}</label></li>
															@endforeach
														  </ul>
														</div>
													  </li>

												<li class="sidebar-dropdown">
												  <a href="#">
													<span>Choose Make</span>
												  </a>
												  <div class="sidebar-submenu">
													<ul>
														@foreach($makes as $make)
													  	<li><label><input type="checkbox" name="make[]" value="{{$make->make}}" <?php if(in_array($make->make,$make_value)) {echo "checked";} ?>> {{$make->make}}</label></li>
													  	@endforeach
													</ul>
												  </div>
												</li>

												<li class="sidebar-dropdown">
												  <a href="#">
													<span>Choose Model</span>
												  </a>
												  <div class="sidebar-submenu">
													<ul>
														@foreach($models as $model)
													  	<li><label><input type="checkbox" name="model[]" value="{{$model->model}}" <?php if(in_array($model->model,$model_value)) {echo "checked";} ?>> {{$model->model}}</label></li>
													  	@endforeach
													</ul>
												  </div>
												</li>
											  
											  </ul>
											</div>
										</nav>

										<button type="submit" class="stock-contact">Apply Filter</button>
									</form>
								</div>

								
							
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection

@section('script')
<script src="{{asset('assets/front/js/sidebar.js')}}"></script>

<script>
	$(document).ready(function(){
		$('#footer_class').removeClass();
	});
</script>
@endsection