
<?php $__env->startSection('content'); ?>

<style>
	.team-details h2{
		padding: 0;
    	text-align: left;
	}
</style>

<section>
	<div class="container-fluid">
		<div class="row">
			<div class="inner-header">&nbsp;</div>
		</div>
	</div>
</section>



<section>
	<div class="container-fluid">
		<div class="row">
			<div class="services-panel">
				<div class="container-xxl container-xl container-md container-sm">
					<div class="row">
						<div class="col-xl-12 text-center mb-2">
							<div class="web-content">
								<h1>Our Team</h1>
							</div>
						</div>

						<?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
								<div class="team-panel">
									<div class="team-icon">
										<img src="<?php echo e(url('/public/admin/clip-one/assets/team/original')); ?>/<?php echo e($team->image); ?>" alt="" class="img-fluid d-block mx-auto">
									</div>

									<div class="team-details">
										<h1><?php echo e($team->name); ?></h1>
										<h2><?php echo e($team->designation); ?></h2>
										<p><?php echo e($team->description); ?></p>
									</div>
								</div>
							</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
	$(document).ready(function(){
		$('#footer_class').removeClass();
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fjs_plant\resources\views/front/our_team.blade.php ENDPATH**/ ?>