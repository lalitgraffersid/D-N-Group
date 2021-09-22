
<?php $__env->startSection('content'); ?>

<section>
	<div class="container-fluid">
		<div class="row">
			<div class="inner-header" style="background-image: url(<?php echo e(asset('assets/front/images/services-banner.jpg')); ?>"></div>
		</div>
	</div>
</section>	


<section>
	<div class="container-fluid">
		<div class="row">
			<div class="services-panel">
				<div class="container-xxl container-xl container-md container-sm">
					<div class="row">
						<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 offset-md-2 border">
							<div class="services-box">
								<div class="web-content">
									<h1>Services</h1>
									<p>Our Customer and Product Support at FJS Plant is second to none. We currently have a fleet of mobile vehicles on the road offering a back up service to all of our customers.</p>
									
									<p>This along with our workshop facility at our depot ensures our customers that all service requirements are carried out to a high standard.</p>
									
									<p>We have a dedicated qualified team of plant fitters to keep your machines up and running 24/7.</p>
									
									<p>In 2018 FJS Plant Repairs were awarded the Service Excellance Reward from Kubota Construction Machiney, Pictured recieving the Award from Gary Walsh Service Manager (Kubota UK) was Frank Smyth (Director/FJS Plant Repairs Ltd).</p>


								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="top-space">
	<div class="container-xxl container-xl container-md container-sm">
		<div class="tz-gallery">

            <div class="row">
    			<div class="col-xl-12 col-lg-12 text-center mb-3">
    				<div class="web-content">
    					<h2>Machine Gallery</h2>
    				</div>
    			</div>
    			
                <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-6 col-md-4">
                    <a class="lightbox" href="<?php echo e(url('/public/admin/clip-one/assets/gallery/original')); ?>/<?php echo e($gallery->image); ?>">
                        <img src="<?php echo e(url('/public/admin/clip-one/assets/gallery/original')); ?>/<?php echo e($gallery->image); ?>" alt="Park">
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

        </div>
		
	</div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fjs_plant\resources\views/front/services.blade.php ENDPATH**/ ?>