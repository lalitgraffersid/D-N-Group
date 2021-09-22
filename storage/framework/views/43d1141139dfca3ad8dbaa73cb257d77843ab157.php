
<?php $__env->startSection('content'); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/css/lightbox.min.css">

<section>
	<div class="container-fluid">
		<div class="row">
			<div class="services-panel">
				<div class="container-xxl container-xl container-md container-sm">
					<div class="row">
						<div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
							<div class="detail-panel">
								<div class="pro-detail-box mb-4">
									<img src="<?php echo e(url('/public/admin/clip-one/assets/products/original')); ?>/<?php echo e($product_images[0]->image); ?>" alt="" class="img-fluid d-block mx-auto">
								</div>


								<div class="aligner">
									<div class="owl-carousel owl-theme">
										
										<?php $__currentLoopData = $product_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<div class="item">
											<a href="<?php echo e(url('/public/admin/clip-one/assets/products/original')); ?>/<?php echo e($product_image->image); ?>" data-lightbox="gallery">
												<img src="<?php echo e(url('/public/admin/clip-one/assets/products/original')); ?>/<?php echo e($product_image->image); ?>" alt="">
											</a>
										</div>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
							<div class="machine-details">
								<div class="web-content">
								<h1><?php echo e($result->title); ?></h1>
								<?php echo $result->description; ?>


								<h2 class="machine-cost mt-4">Price: <span><i class="icofont-pound"></i><?php echo e($result->price); ?></span></h2>
							</div>

							<h3 class="machine-details">Machine Details</h3>
							<ul class="details-list">
									<li><span class="machine-title">Make:</span> <span><?php echo e($result->make); ?></span></li>
									<li><span class="machine-title">Model:</span> <span><?php echo e($result->model); ?></span></li>
								</ul>

								<ul class="button-list">
									<li><a href="<?php echo e(route('contact_us')); ?>">Enquiry</a></li>
								</ul>

								<div class="social-sharebox">
									<h4 class="machine-details">Social Sharing</h4>
									<ul class="ftr-socials detail-social">
										<li><a href="https://www.facebook.com/fjsplant/" target="_blank"><i class="icofont-facebook"></i></a></li>
										<li><a href="https://www.linkedin.com/in/fjs-plant-a49869199/" target="_blank"><i class="icofont-linkedin"></i></a></li>
										<li><a href="https://www.instagram.com/fjsplant/" target="_blank"><i class="icofont-instagram"></i></a></li>
									</ul>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/js/lightbox.min.js"></script>
<script  src="<?php echo e(asset('assets/front/js/owl.js')); ?>"></script>

<script>
	$(document).ready(function(){
		$('#footer_class').removeClass();
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fjs_plant\resources\views/front/products/productDetails.blade.php ENDPATH**/ ?>