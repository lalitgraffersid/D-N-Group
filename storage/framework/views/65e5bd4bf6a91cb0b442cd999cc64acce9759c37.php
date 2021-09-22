
<?php $__env->startSection('content'); ?>

	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="banner-bg full-width">
					<img src="<?php echo e(asset('assets/front/images/about-us-inner.jpg')); ?>" alt="" class="img-fluid d-block mx-auto">
					<div class="inner-caption">
						<h1>Projects</h1>
					</div>
				</div>
			</div>
		</div>
	</section>


	
	<?php $__currentLoopData = $project; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	
	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="grey-bg full-width" style="background-color: #dedede;">
					<div class="container">
						<div class="row">
							<div class="col-md-5">
								<img src="<?php echo e(asset('/public/admin/clip-one/assets/project/original')); ?>/<?php echo e($pro->image); ?>" alt="" class="img-fluid d-block mx-auto project-img">
							</div>

							<div class="col-md-7">
								<div class="web-content project-content">
									<h2><?php echo e($pro->title); ?></h2>
									<p><?php echo e($pro->description); ?> </p>
									<a href="<?php echo e(route('projectdetail',$pro->id)); ?>">View More</a>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
	</section>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\get_solutions\resources\views/front/project/index.blade.php ENDPATH**/ ?>