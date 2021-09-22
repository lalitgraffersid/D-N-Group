
<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/front/Bootstrap/gallery.css')); ?>">
	<div class="container-gray-inner">
<div class="container">
  <ul class="breadcrumb">
    <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
    <li>Projects</li>
  </ul>
  <h2><?php echo e($project->title); ?></h2>
  <div class="main-text">
    <p><?php echo $project->description; ?> </p>
  </div>
  

</div>

</div>

<section id="gallery" class="mt-5">
  <div class="container">
    <div id="image-gallery">
      <div class="row">
        <?php $__currentLoopData = $projectdetailes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prodetails): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
          <div class="img-wrapper">
            <a href="<?php echo e(asset('/public/admin/clip-one/assets/project/original')); ?>/<?php echo e($prodetails->image); ?>"><img src="<?php echo e(asset('/public/admin/clip-one/assets/project/original')); ?>/<?php echo e($prodetails->image); ?>" class="img-responsive"></a>
            <div class="img-overlay">
              <i class="fa fa-plus-circle" aria-hidden="true"></i>
            </div>
          </div>
        </div>
       
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 


      </div><!-- End row -->
    </div><!-- End image gallery -->
  </div><!-- End container --> 
</section>




<?php $__env->stopSection(); ?>


<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hm3hczr3zv0q/public_html/demo/DNGroup/resources/views/front/project/details.blade.php ENDPATH**/ ?>