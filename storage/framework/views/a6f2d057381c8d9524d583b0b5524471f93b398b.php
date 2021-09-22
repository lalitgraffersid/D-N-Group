<!DOCTYPE html>
<html>
<?php echo $__env->make('front/includes/head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
    .owl-item .item {
    width: 200px;
    height: 125px;
    background: #e7e7e7;
    padding: 1em;
    display: flex;
    justify-content: center;
    vertical-align: middle;
    border-radius: 10px;
}
</style>
<body style="overflow-x:hidden">
  <div class="wrapper">

<?php echo $__env->yieldContent('slider'); ?>

<?php echo $__env->make('front/includes/homeheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->make('front/includes/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html><?php /**PATH /home/hm3hczr3zv0q/public_html/demo/DNGroup/resources/views/front/layout/homemaster.blade.php ENDPATH**/ ?>