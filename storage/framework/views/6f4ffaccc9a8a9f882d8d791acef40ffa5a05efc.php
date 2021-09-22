
<?php $__env->startSection('content'); ?>
<div class="container-gray-inner" id="services">
        <div class="container">
          <ul class="breadcrumb">
            <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
            <li><a href="<?php echo e(route('services.all')); ?>">Services</a></li>
            <li><?php echo e($project->name); ?></li>
          </ul>
          <h2 class="mb-3"><?php echo e($project->title); ?></h2>
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
            <img src="<?php echo e(asset('/public/admin/clip-one/assets/service/original')); ?>/<?php echo e($project->image); ?>" class="img-responsive" style="border-radius:10px" />
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 about-main">
            
            <p class="main-text"><?php echo $project->description; ?> </p>
            
            

            
            </div>
            </div>
        </div>   
        
        </div>
        
      
        <div class="container-gray" id="services">
          <div class="container">
          
          <div class="row">
             <?php if(!empty(projectdetailes)): ?>
             <?php $__currentLoopData = $projectdetailes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prodetails): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         
           <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 ">
            <div class="abt-service-box">
          <img src="<?php echo e(asset('/public/admin/clip-one/assets/project/original')); ?>/<?php echo e($prodetails->image); ?>" class="service-img-responsive" />
          </div>
         
          </div>
          
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

          </div>
          </div>
          
          
          </div>

	
<?php $__env->stopSection(); ?>


<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\DNGroup\resources\views/front/service/details.blade.php ENDPATH**/ ?>