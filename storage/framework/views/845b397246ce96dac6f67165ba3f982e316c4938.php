
<?php $__env->startSection('content'); ?>

	
	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="banner-bg full-width">
					<img src="<?php echo e(asset('assets/front/images/about-us-inner.jpg')); ?>" alt="" class="img-fluid d-block mx-auto">
					<div class="inner-caption">
						<h1>Get Solutions Services</h1>
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

							<div class="col-lg-12 text-center mb-4">
								<div class="web-content">
									<h2>Our Services</h2>
								</div>
							</div>
                             <?php $__currentLoopData = $service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-lg-3">
								<div class="our-team-box">
									<div class="team-icon srvc-icon"><img src="<?php echo e(asset('/public/admin/clip-one/assets/service/original')); ?>/<?php echo e($ser->image); ?>" alt="" class="img-fluid d-block mx-auto"></div>
									<div class="team-text get-services-text">
										<h2><?php echo e($ser->title); ?></h2>
										<img src="<?php echo e(asset('assets/front/images/logo.png')); ?>" alt="" class="img-fluid" width="120">
										<a href="#">Read More</a>
									</div>
								</div>
							</div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							
							

							


					</div>
				</div>
			</div>
		</div>
	</section>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hm3hczr3zv0q/public_html/demo/get-solutionweb/resources/views/front/service/index.blade.php ENDPATH**/ ?>