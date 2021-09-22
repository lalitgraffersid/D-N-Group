
<?php $__env->startSection('content'); ?>

		<section>
		<div class="container-fluid">
			<div class="row">
				<div class="banner-bg full-width">
					<img src="<?php echo e(asset('assets/front/images/about-us-inner.jpg')); ?>" alt="" class="img-fluid d-block mx-auto">
					<div class="inner-caption">
						<h1><?php echo e($project->title); ?></h1>
					</div>
				</div>
			</div>
		</div>
	</section>


	
	
	
	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="grey-bg full-width" style="background-color: #dedede;">
					<div class="container">
						<div class="row">						
							<div class="col-md-12">
								<div class="web-content project-content">
									<h2><?php echo e($project->title); ?></h2>
									<p><?php echo $project->description; ?></p>
									<!--<a href="#">View More</a>-->
								</div>
							</div>

							<div class="col-md-12" id="gallery">
								<!-- <img src="images/project-1.jpg" alt="" class="img-fluid d-block mx-auto project-img"> -->

	<div id="image-gallery">
      <div class="row">
        <?php $__currentLoopData = $projectdetailes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prodetails): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
          <div class="img-wrapper">
            <a href="images/about-us.jpg"><img src="<?php echo e(asset('/public/admin/clip-one/assets/project/original')); ?>/<?php echo e($prodetails->image); ?>" class="img-fluid d-block mx-auto"></a>
            <div class="img-overlay">
              <i class="fa fa-plus-circle" aria-hidden="true"></i>
            </div>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       

      </div><!-- End row -->
    </div>
		

								</div>	
							</div>

						</div>
				</div>
			</div>
		</div>
	</section>
	<script  src="<?php echo e(asset('assets/front/js/gallery.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hm3hczr3zv0q/public_html/demo/get-solutionweb/resources/views/front/project/details.blade.php ENDPATH**/ ?>