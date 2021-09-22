
<?php $__env->startSection('content'); ?>

	
		<section>
		<div class="container-fluid">
			<div class="row">
				<div class="banner-bg full-width">
					<img src="<?php echo e(asset('assets/front/images/about-us-inner.jpg')); ?>" alt="" class="img-fluid d-block mx-auto">
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

                             
							
                            <?php $__currentLoopData = $team; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $te): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>        
							<div class="col-lg-4">
								<div class="our-team-box">
									<div class="team-icon"><img src="<?php echo e(asset('/public/admin/clip-one/assets/team/original')); ?>/<?php echo e($te->image); ?>" alt="" class="img-fluid d-block mx-auto"></div>
									<div class="team-text">
										<h2><?php echo e($te->name); ?></h2>
										<h3><?php echo e($te->designation); ?></h3>
										<p><?php echo e($te->description); ?></p>
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


<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\get_solutions\resources\views/front/team/index.blade.php ENDPATH**/ ?>