
<?php $__env->startSection('content'); ?>
 	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="banner-bg full-width">
					<img src="<?php echo e(asset('assets/front/images/about-us-inner.jpg')); ?>" alt="" class="img-fluid d-block mx-auto">
					<div class="inner-caption">
						<h1>Get Solutions</h1>
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
							<div class="col-lg-6 col-md-6 col-sm-12">
								<img src="<?php echo e(asset('/public/admin/clip-one/assets/service/original')); ?>/<?php echo e($about->image); ?>" alt="" class="img-fluid d-block mx-auto rounded">
							</div>
							
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="web-content">
									<h2><?php echo e($about->title); ?></h2>
									<p><?php echo $about->description; ?></p>

									
								</div>
						</div>


						



					</div>
				</div>
			</div>
		</div>
	</section>
	

<?php $__env->stopSection(); ?>


<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hm3hczr3zv0q/public_html/demo/get-solutionweb/resources/views/front/about/index.blade.php ENDPATH**/ ?>