


<?php $__env->startSection('slider'); ?>
 <div id="demo" class="carousel slide" data-ride="carousel">

      <div class="carousel-inner">
        <?php $i=0?>
       <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $i++; ?> 
        <div class="carousel-item <?php if($i==1): ?> active <?php endif; ?>">
          <img src="<?php echo e(asset('/public/admin/clip-one/assets/brands/original')); ?>/<?php echo e($sl->image); ?>" alt="" class="img-fluid img-cover img-dark">
          <div class="pos-center">
            <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset('assets/front/images/logo.png')); ?>" class="img-fluid logo-width-main"></a>
            <p class="banner-head"><?php echo e($sl->name); ?></p>
            <ul class="banner-text" style="text-align: left;">
              <li>Complete Property Service</li>
              <li>Planned Maintenance</li>
              <li>Complete Fit outs</li>
              <li>Construction</li>
              <li>Electrical and Mechanical Contractors</li>
              <li>Facilities Management</li>
</ul>
           
          </div>
        </div>

       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
      



      </div>
      <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
    </div>



<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

 <div class="container-gray" id="services">
      <div class="container">
        <div class="row">
          <div class="col-xl-8 offset-xl-2">
            <h1 class="main-heading2">Our Services</h1>
            <p class="main-text-center">Founded by Eddie Doyle and Brian Nugent in 2006 as D&N Electrical, the company
              became D&N Group after branching into Reactive, Planned and Preventative Maintenance.</p>
            <hr class="hr-style" />
          </div>
        </div>
        <div class="row container-main">

          <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="service-box">
              <div class="service-img">
                <img src="<?php echo e(asset('/public/admin/clip-one/assets/category/original')); ?>/<?php echo e($cat->image); ?>" class="service-img-responsive">
              </div>
              <div class="service-box-text">
                <h4 class="services-head"><?php echo e($cat->title); ?></h4>
                
                <a href="<?php echo e(route('servicedetail',$cat->id)); ?>" class="btn-yellow">View Details</a>
              </div>
            </div>
          </div>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
          
        </div>
        <!--
<div class="blue-bg" id="contact">
<div class="container">
<div class="row">
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
<p class="blue-bg-text">We specialise in complete Commercial, Industrial and Domestic fit outs, Facilities Management and Property Maintenance.</p>
</div>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 blue-bar"><span class="contact-btn">CONTACT US</span></div>
</div>
</div>
</div>
-->
      </div>

      <!--
<div class="container-main-gallary" id="gallery">
<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
<h1 class="main-heading2">Our Gallery</h1>
</div>
</div>
<div class="row">
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
<img src="images/img1.png" class="img-responsive gallery-bottom" />
</div>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
<img src="images/img2.png" class="img-responsive gallery-bottom" />
</div>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
<img src="images/img3.png" class="img-responsive gallery-bottom" />
</div>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
<img src="images/img4.png" class="img-responsive gallery-bottom" />
</div>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
<img src="images/img5.png" class="img-responsive gallery-bottom" />
</div>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
<img src="images/img6.png" class="img-responsive gallery-bottom" />
</div>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
<img src="images/img7.png" class="img-responsive gallery-bottom" />
</div>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
<img src="images/img8.png" class="img-responsive gallery-bottom" />
</div>
</div>
</div>
</div>
-->
 <?php
 $ds=  str_replace("&amp;", "&",$about->description); 

 ?>

      <section class="position-relative project-content">
        <wrapper>

          <div class="row">
            <div class="col-lg-7 col-md-12">
              <div class="about-container">
                <h1 class="main-heading2"><?php echo e($about->heading); ?></h1>
                
                  <p><?php echo e(\Illuminate\Support\Str::limit(strip_tags($ds), 500, $end='...')); ?></p>
<p class="align-right"><a href="<?php echo e(route('about')); ?>">Read More..</a></p>
              </div>
            </div>
          </div>
        </wrapper>
      </section>



     
      <div class="container-main-gallary">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
              <h1 class="main-heading2">Our Clients</h1>
              
            </div>
          </div>
          <!-- partial:index.partial.html -->
<div class="owl-slider">
  <div id="carousel" class="owl-carousel">
    <?php $__currentLoopData = $clintlogo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <div class="item">
      <img class="owl-lazy" data-src="<?php echo e(asset('/public/admin/clip-one/assets/brands/original')); ?>/<?php echo e($cl->image); ?>" alt="">
    </div>
   
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
    
  </div>
  </div>
  <!-- partial -->

        </div>
      </div>

	
	

<?php $__env->stopSection(); ?>


<?php echo $__env->make('front.layout.homemaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hm3hczr3zv0q/public_html/demo/DNGroup/resources/views/front/home/index.blade.php ENDPATH**/ ?>