
<?php $__env->startSection('content'); ?>

<section class="top-space">
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
	
	

<section class="top-space">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 mb-3">
			</div>
			<div class="col-sm-12">
				<div class="category-filter mb-3">
					<button class="btn btn-outline-primary category-button active mr-3" data-filter="all">All</button>
					<?php $__currentLoopData = $dealers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dealer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	    				<button class="btn btn-outline-primary category-button mr-3" data-filter="<?php echo e($dealer->name); ?>"><?php echo e($dealer->name); ?></button>
	    			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>
		</div>

		<div class="row">
			<?php $__currentLoopData = $dealers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dealer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php
				$products = DB::table('products')
                    			->where('dealer_id',$dealer->id)
                    			->get();
                foreach ($products as $key1 => $value) {
                	$product_image = DB::table('product_images')
                    					->where('product_id',$value->id)
                    					->first();
			?>
				<div class="col-sm-6 col-md-4 col-lg-3 filter <?php echo e($dealer->name); ?> mb-4">
				  	<img src="<?php echo e(url('/public/admin/clip-one/assets/products/original')); ?>/<?php echo e($product_image->image); ?>" class="img-fluid">
				</div>
			<?php } ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fjs_plant\resources\views/front/brand/index.blade.php ENDPATH**/ ?>