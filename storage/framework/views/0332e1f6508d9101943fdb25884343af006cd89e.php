
<?php $__env->startSection('content'); ?>

<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/products.css')); ?>">

<section>
	<div class="container-fluid">
		<div class="row">
<div id="carouselExampleCaptions" class="carousel slide p-0" data-bs-ride="carousel">
  
	 
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo e(asset('assets/front/images/slider1.jpg')); ?>" class="img-fluid d-block mx-auto" alt="">
      <div class="carousel-caption d-none d-md-block">
        <h5>Mobile Plant &amp; Construction</h5>
        <p>Machinery Specialist</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?php echo e(asset('assets/front/images/slider2.jpg')); ?>" class="img-fluid d-block mx-auto" alt="">
      <div class="carousel-caption d-none d-md-block">
        <h5>Mobile Plant &amp; Construction</h5>
        <p>Machinery Specialist</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?php echo e(asset('assets/front/images/slider3.jpg')); ?>" class="img-fluid d-block mx-auto" alt="">
      <div class="carousel-caption d-none d-md-block">
        <h5>Mobile Plant &amp; Construction</h5>
        <p>Machinery Specialist</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
		</div>
</div>
</section>


<section>
	<div class="container-xxl container-xl container-md container-sm">
		<form action="<?php echo e(route('productsFilter')); ?>" method="GET">
			<!-- <?php echo e(csrf_field()); ?> -->
			<div class="filter-search">
				<div class="row">
					<div class="col-xl col-lg col-md col-sm">
						<select class="" name="type" id="type">
							<option value="">Choose Type</option>
							<option value="New">New</option>
							<option value="Used">Used</option>
						</select>
					</div>
						
					<div class="col-xl col-lg col-md col-sm">
						<select class="" name="dealer_id[]" id="dealer_id">
							<option value="">Choose Dealer</option>
							<?php $__currentLoopData = $dealers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dealer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($dealer->id); ?>"><?php echo e($dealer->name); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div>
						
					<div class="col-xl col-lg col-md col-sm">
						<select class="" name="make[]" id="make">
							<option value="">Choose Make</option>
							<?php $__currentLoopData = $makes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $make): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($make->make); ?>"><?php echo e($make->make); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div>
						
					<div class="col-xl col-lg col-md col-sm">
						<select class="" name="model[]" id="model">
							<option value="">Choose Model</option>
							<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($model->model); ?>"><?php echo e($model->model); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div>
						
					<div class="col-xl col-lg col-md col-sm">
						<button type="submit" id="filter_button"><i class="icofont-search-2"></i></button>
					</div>
					<span id="filter_error"></span>
				</div>
			</div>
		</form>
	</div>
</section>
	

	
<section class="top-space">
	<div class="container-xxl container-xl container-md container-sm">
		<div class="row">
			<div class="col-xl-5 col-lg-5 col-md-6 col-sm-12">
				<img src="<?php echo e(asset('assets/front/images/machine01.jpg')); ?>" alt="" class="img-fluid d-block mx-auto">
			</div>
			
			<div class="col-xl-7 col-lg-7 col-md-6 col-sm-12">
				<div class="web-content">
					<h1>About Us</h1>
					<p>FJS Plant was established in 1993 we are based approximately 25 miles from Dublin city centre. FJS Plant currently employ 22 skilled and highly experienced Staff across the area of Sales, Service, Repair, Spare Parts, Marketing and Administration. They are now a market leader in the Sales, Supply and Service of mobile plant and demolition equipment in Ireland.</p>
					<a href="<?php echo e(route('about_us')); ?>">Read More</a>
				</div>
			</div>
		</div>
	</div>
</section>
	
	
<section class="top-space">
	<div class="container-fluid">
		<div class="row">
			<div class="product-panel">
				<div class="container-xxl container-xl container-md container-sm">
					<div class="row">
						<div class="col-xxl-12">
							<div class="web-content">
								<h2 class="text-center">Checkout Our Machines</h2>
							</div>
						</div>


						<div class="owl-slider">
							<div class="owl-carousel" id="carousel">

								<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="item">
									<div class="product-box">
										<div class="product-icon">
											<img src="<?php echo e(url('/public/admin/clip-one/assets/categories/original')); ?>/<?php echo e($category->image); ?>" alt="" class="img-fluid d-block mx-auto">
										</div>
										
										<div class="product-text web-content">
											<h3><?php echo e($category->name); ?></h3>
											<p><?php echo e(\Illuminate\Support\Str::limit($category->description, 70, $end='...')); ?></p>
											<a href="<?php echo e(route('productsByCategory',$category->id)); ?>">Continue <span></span></a>
										</div>
									</div>
								</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									
							</div>
						</div>
						
											
						<!-- <div class="col-xxl-12">
							<div class="web-content text-center">
								<a href="#" class="pt-3 pb-3">All Categories</a>
							</div>
						</div> -->
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
	
	
	
<section class="top-space">
	<div class="container-xxl container-xl container-md container-sm">
		<div class="row">
			<div class="col-lg-12">
				<div class="web-content text-center">
					<h4>Clients Testimonials</h4>
				</div>
			</div>
			
			
	<div class="col-lg-12">
	<div class="gtco-testimonials">
    <div class="owl-carousel owl-carousel1 owl-theme">
      <div>
        <div class="card text-center"><img class="card-img-top" src="<?php echo e(asset('assets/front/images/testi.jpg')); ?>" alt="">
          <div class="card-body">
            <h5>Mick Fox</h5>
            <p class="card-text">“ Fast efficient and friendly ” </p>
          </div>
        </div>
      </div>
      <div>
        <div class="card text-center"><img class="card-img-top" src="<?php echo e(asset('assets/front/images/testi.jpg')); ?>" alt="">
          <div class="card-body">
            <h5>Cathal Phibbs</h5>
            <p class="card-text">“ Excellent customer service, and quality products ” </p>
          </div>
        </div>
      </div>
      <div>
        <div class="card text-center"><img class="card-img-top" src="<?php echo e(asset('assets/front/images/testi.jpg')); ?>" alt="">
          <div class="card-body">
            <h5>Paul Clare</h5>
            <p class="card-text">“ Purchased this girl 28 months ago and its has never missed a beat ” </p>
          </div>
        </div>
      </div>
		<div>
			<div class="card text-center"><img class="card-img-top" src="<?php echo e(asset('assets/front/images/testi.jpg')); ?>" alt="">
          <div class="card-body">
            <h5>Sale Kildare</h5>
            <p class="card-text">“ Great service ” </p>
          </div>
        </div>
		</div>
        
		  
		<div>
			<div class="card text-center"><img class="card-img-top" src="<?php echo e(asset('assets/front/images/testi.jpg')); ?>" alt="">
          <div class="card-body">
            <h5>Glenn Power</h5>
            <p class="card-text">“ Great staff and service ” </p>
          </div>
        </div>
		</div>
		  
		<div>
			<div class="card text-center"><img class="card-img-top" src="<?php echo e(asset('assets/front/images/testi.jpg')); ?>" alt="">
          <div class="card-body">
            <h5>Finbarr Sullivan</h5>
            <p class="card-text">“ Been in here lately good people make a great business they looked after me really well 1 top roller and hub oil change very quick . Thanks guys and lovely girls in office cheers ” </p>
          </div>
        </div>
		</div>
		  
		<div>
			<div class="card text-center"><img class="card-img-top" src="<?php echo e(asset('assets/front/images/testi.jpg')); ?>" alt="">
          <div class="card-body">
            <h5>KNR Turbines</h5>
            <p class="card-text">“ Excellent machines ” </p>
          </div>
        </div>
		</div> 
		 
		<div>
			<div class="card text-center"><img class="card-img-top" src="<?php echo e(asset('assets/front/images/testi.jpg')); ?>" alt="">
          <div class="card-body">
            <h5>William Mullally</h5>
            <p class="card-text">“ Excellent ” </p>
          </div>
        </div>
		</div>
		  
    </div>
  </div>
			</div>
		</div>
	</div>
</section>

	
	
<section>
	<div class="container-xxl container-xl container-md container-sm">
		<div class="row">
			<div class="col-lg-12 mb-4">
				<div class="web-content text-center">
					<h4>Brands</h4>
				</div>
			</div>
			
			<div class="col-lg-12">
    			<div class="customer-logos slider">
    				<?php $__currentLoopData = $dealers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dealer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      				<div class="slide"><img src="<?php echo e(url('/public/admin/clip-one/assets/dealers/original')); ?>/<?php echo e($dealer->image); ?>" alt=""></div>
      				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   				</div>
			</div>
		</div>
	</div>
</section>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script  src="<?php echo e(asset('assets/front/js/products.js')); ?>"></script>

<script>
	$('#filter_button').on('click',function(){
		var type = $('#type').val();
		var dealer_id = $('#dealer_id').val();
		var make = $('#make').val();
		var model = $('#model').val();

		if (type == '' && dealer_id == '' && make == '' && model == '') {
			toastr.error('Please choose atleast one.', 'Error');
			return false;
		}
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\a1_solutions\resources\views/front/home/index.blade.php ENDPATH**/ ?>