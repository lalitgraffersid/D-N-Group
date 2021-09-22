
<?php $__env->startSection('content'); ?>

	

<div class="container-gray-inner" id="services">
<div class="container">
  <ul class="breadcrumb">
    <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
    <li>Project</li>
  </ul>
  <h2 class="mb-2">Project</h2>
  <div class="row">
    <div class="col-xl-12">
      <p class="main-text">Founded by Eddie Doyle and Brian Nugent in 2006 as D&N Electrical, the company
        became D&N Group after branching into Reactive, Planned and Preventative Maintenance.</p>
      
    </div>
  </div>
  <div class="row container-main">
    
      <?php $__currentLoopData = $project; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      
      <?php
      $ds =  str_replace("&amp;", "&",$pro->description); 
      ?>
      
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <div class="service-box">
        <div class="service-img">
          <img src="<?php echo e(asset('/public/admin/clip-one/assets/project/original')); ?>/<?php echo e($pro->image); ?>" class="service-img-responsive">
        </div>
        <div class="service-box-text">
          <h4 class="services-head"><?php echo e($pro->title); ?></h4>
          <p class="services-text"><?php echo e(\Illuminate\Support\Str::limit(strip_tags($ds), 200, $end='...')); ?></p>
          <a href="<?php echo e(route('projectdetail',$pro->id)); ?>" class="btn-yellow">View Details</a>
        </div>
      </div>
    </div>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  



  </div>
</div>

</div>














<?php $__env->stopSection(); ?>


<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hm3hczr3zv0q/public_html/demo/DNGroup/resources/views/front/project/index.blade.php ENDPATH**/ ?>