
<?php $__env->startSection('content'); ?>



<section>
		<div class="container-fluid">
			<div class="row">
				<div class="grey-bg full-width">
					<div class="container">
						<div class="row">							
							<div class="col-lg-12">
								<div class="web-content">
										<div class="privacy-policy-box">
											<h1><?php echo e($privacy->title); ?></h1>
					<p><?php echo $privacy->description; ?></p>
			
												
										
										
											</div>


								</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hm3hczr3zv0q/public_html/demo/get-solutionweb/resources/views/front/privacy.blade.php ENDPATH**/ ?>