
<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/front/Bootstrap/gallery.css')); ?>">
<div class="container-gray-inner">
<div class="container">
  <ul class="breadcrumb">
    <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
    <li>D &amp; N Group's Sponsorships</li>
  </ul>
  <h2><?php echo e($sponsorship->heading); ?> </h2>
  <div class="main-text">
    <p><?php echo $sponsorship->description; ?></p>
  </div>
  

</div>

</div>

<section id="gallery" class="mt-5">
  <div class="container">
    <div id="image-gallery">
      <div class="row">
       
        <?php $__currentLoopData = $sponsorshipimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image mb-4">
          <div class="img-wrapper mb-0">
            <a href="<?php echo e(asset('/public/admin/clip-one/assets/sponsorship/original')); ?>/<?php echo e($img->image); ?>"><img src="<?php echo e(asset('/public/admin/clip-one/assets/sponsorship/original')); ?>/<?php echo e($img->image); ?>" class="img-responsive"></a>
            <div class="img-overlay">
              <i class="fa fa-plus-circle" aria-hidden="true"></i>
            </div>
          </div>
          <div class="centered"><h5><?php echo e($img->name); ?></h5></div>
        </div>

         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          
       
      </div><!-- End row -->
    </div><!-- End image gallery -->
  </div><!-- End container --> 
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\DNGroup\resources\views/front/sponsorship/index.blade.php ENDPATH**/ ?>