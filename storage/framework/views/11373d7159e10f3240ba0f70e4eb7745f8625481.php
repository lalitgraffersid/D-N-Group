<?php echo $__env->make('front/includes/head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('front/includes/navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  

<?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->make('front/includes/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldContent('script'); ?><?php /**PATH C:\xampp\htdocs\a1_solutions\resources\views/front/layout/master.blade.php ENDPATH**/ ?>