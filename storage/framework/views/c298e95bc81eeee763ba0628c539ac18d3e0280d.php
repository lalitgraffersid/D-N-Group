<!DOCTYPE html>
<html>
<?php echo $__env->make('front/includes/head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body style="overflow-x:hidden">
  <div class="wrapper">

<?php echo $__env->yieldContent('slider'); ?>

<?php echo $__env->make('front/includes/homeheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->make('front/includes/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html><?php /**PATH C:\xampp\htdocs\DNGroup\resources\views/front/layout/homemaster.blade.php ENDPATH**/ ?>