
<?php $__env->startSection('content'); ?>

<section class="top-space">
	<div class="container-xxl container-xl container-md container-sm">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<div class="web-content">
					<h1>News</h1>
				</div>
				<div class="blog-panel detail-panel">

					<?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="blog-box">
						<div class="blogger">
							<span><img src="<?php echo e(url('/public/admin/clip-one/assets/news/thumbnail')); ?>/<?php echo e($result->image); ?>" alt="" width="100"></span>
							<h2><?php echo e($result->title); ?></h2>
						</div>

						<div class="blog-date">
							<h3><?php echo e(date('d F Y',strtotime($result->created_at))); ?></h3>
						</div>

						<div class="blog-content web-content">
							<h4><?php echo e(\Illuminate\Support\Str::limit($result->description, 90, $end='...')); ?></h4>
							<a href="<?php echo e(route('news.details',$result->id)); ?>">Continue</a>
						</div>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fjs_plant\resources\views/front/news/index.blade.php ENDPATH**/ ?>