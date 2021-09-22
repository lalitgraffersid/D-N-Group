
<?php $__env->startSection('content'); ?>

  <link rel="stylesheet" href="<?php echo e(asset('assets/front/Bootstrap/gallery.css')); ?>">
 <div class="container-gray-inner" id="services">
<div class="container">
  <ul class="breadcrumb">
    <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
    <li>Gallery</li>
  </ul>
  <h2 class="mb-2">Gallery</h2>
</div>

</div>


<section id="gallery">
  <div class="container">
    <div id="image-gallery">
      <div class="row">
        <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
          <div class="img-wrapper">
            <a href="<?php echo e(asset('/public/admin/clip-one/assets/gallery/before_image')); ?>/<?php echo e($gal->image); ?>"><img src="<?php echo e(asset('/public/admin/clip-one/assets/gallery/before_image')); ?>/<?php echo e($gal->image); ?>" class="img-responsive"></a>
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


<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hm3hczr3zv0q/public_html/demo/DNGroup/resources/views/front/gallery/index.blade.php ENDPATH**/ ?>