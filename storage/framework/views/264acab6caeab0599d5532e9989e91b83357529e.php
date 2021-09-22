<?php 

$productTypes = DB::table('products')->select('type')->groupby('type')->get();

?>

<section>
    <div class="container-fluid">
        <div class="row">
            <div class="menu-panel">
                <div class="container-xxl container-xl container-md container-sm">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="stellarnav">
                                <ul>
                                    <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                                    <li><a href="<?php echo e(route('about_us')); ?>">About Us</a></li>
                                    <li><a href="<?php echo e(route('brands')); ?>">Brand</a></li>
                                    <li><a href="<?php echo e(route('services')); ?>">Services</a></li>
                                    <li><a href="#">Stock</a>
                                        <ul>
                                            <?php $__currentLoopData = $productTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><a href="<?php echo e(route('getProducts',$productType->type)); ?>"><?php echo e($productType->type); ?> Machinery</a></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </li>
                                    <li><a href="<?php echo e(route('contact_us')); ?>">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><?php /**PATH C:\xampp\htdocs\a1_solutions\resources\views/front/includes/navbar.blade.php ENDPATH**/ ?>