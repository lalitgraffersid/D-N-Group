
<?php $__env->startSection('content'); ?>
 	<div class="container container-main-inner" id="about">
  <ul class="breadcrumb">
    <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
    <li>About Us</li>
  </ul>
  <h2 class="mb-2"><?php echo e($about->heading); ?></h2>
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
<img src="<?php echo e(asset('/public/admin/clip-one/assets/about_us')); ?>/<?php echo e($about->image); ?>" class="img-responsive" style="border-radius:10px" />
</div>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 about-main">

<p class="main-text"><?php echo e($about->description); ?></p>




</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 about-main">
<p class="main-text"><?php echo e($about->long_description); ?></p>
</div>
</div>
</div>

<div class="container-gray" id="services">
<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
<h1 class="main-heading2">Our Features</h1>

</div>
</div>
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
  <div class="abt-service-box">
<img src="images/service1.jpg" class="service-img-responsive" />
</div>
<h4 class="features-head">Electrical Services</h4>
</div>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
  <div class="abt-service-box">
<img src="images/service2.jpg" class="service-img-responsive" />
</div>
<h4 class="features-head">Facilities Management</h4>
</div>
<div class="col-lg-4 col-md-4 col-sm-12">
<div class="abt-service-box">
<img src="images/service3.jpg" class="service-img-responsive" />
</div>
<h4 class="features-head">Construction</h4>
</div>

</div>
</div>


</div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\D&NGroup\resources\views/front/about/index.blade.php ENDPATH**/ ?>