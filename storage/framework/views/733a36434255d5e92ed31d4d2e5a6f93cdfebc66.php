
<?php $__env->startSection('content'); ?>

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
										<h1>New Machinery</h1>
									</div>
								</div>
								
								<?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php 
									$product_image = DB::table('product_images')->where('product_id',$result->id)->first();
								?>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
									<div class="product-box">
										<div class="product-icon stock-icon">
											<img src="<?php echo e(url('/public/admin/clip-one/assets/products/original')); ?>/<?php echo e($product_image->image); ?>" alt="" class="img-fluid d-block mx-auto">
										</div>
										
										<div class="product-text web-content stock-box">
											<h3><?php echo e($result->title); ?></h3>
											<a href="<?php echo e(route('productDetails',$result->id)); ?>">Read More</a>
										</div>
									</div>
								</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

							</div>
						</div>
						
						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
							<div style="position: sticky; top: 0;">
								<div class="web-content">
									<h2>Stock</h2>
								</div>
								<div class="stock-sidebar">
									<ul class="stock-list">
										<?php $__currentLoopData = $productTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<li><a href="<?php echo e(route('getProducts',$productType->type)); ?>"><?php echo e($productType->type); ?> Machinery</a></li>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</ul>																
								</div>
								<a href="<?php echo e(route('contact_us')); ?>" class="stock-contact">Contact Us</a>
								
								<div class="web-content mt-4">
									<p>FJS Plant was established in 1993 we are based approximately 25 miles from Dublin city centre. FJS Plant currently employ 22 skilled and highly experienced Staff across the area of Sales, Service, Repair, Spare Parts, Marketing and Administration. They are now a market leader in the Sales, Supply and Service of mobile plant and demolition equipment in Ireland.</p>
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
<script>
	$(document).ready(function(){
		$('#footer_class').removeClass();
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fjs_plant\resources\views/front/products/products.blade.php ENDPATH**/ ?>