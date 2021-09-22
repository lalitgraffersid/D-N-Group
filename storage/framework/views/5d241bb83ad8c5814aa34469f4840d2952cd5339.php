
<?php $__env->startSection('content'); ?>

<style>
  ul.cus-info li:last-child{
     margin: 20px 0 0 0;
    font-size: 30px;
    font-weight: 700;
}
</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sales Order Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
              <li class="breadcrumb-item active">Sales Order Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <!-- <div class="card-header">
          <h3 class="card-title">Projects Detail</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div> -->
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
              <div class="row">

               <div class="col-12 col-sm-12">
                  <div class="machine-panel">
                     <h1>Selected Machines</h1>
                        <ul class="machine-list">
                           <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <li><a href="#"><img src="<?php echo e(url('/public/admin/clip-one/assets/products/original')); ?>/<?php echo e($product->image); ?>" alt=""> <span><?php echo e($product->title); ?></span></a></li>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                  </div>
               </div>

              </div>
               <div class="row">
                  <div class="col-md-12">
                     <h4></h4>
                     <div class="post">
                        <!-- /.user-block -->

                        <ul class="cus-info">
                           <li><span>User Name:</span> <?php echo e($result->user_name); ?></li>
                           <li><span>Lead Name:</span> <?php echo e($result->lead_name); ?></li>
                           <li><span>Email:</span> <?php echo e($result->email); ?></li>
                           <li><span>Contact No.:</span> <?php echo e($result->phone); ?></li>
                           <li><span>Date:</span> <?php echo e(date('d F Y',strtotime($result->created_at))); ?></li>
                           <li><span>Time:</span> <?php echo e(date('h:i A',strtotime($result->created_at))); ?></li>
                           <li><span>Message:</span> <span class="cus-message"><?php echo e($result->message); ?></span></li>
                           <?php if(!empty($result->attachment)){ 
                              $ext = explode('.', $result->attachment);
                              ?>
                              <li><span>Attachment:</span> 
                                 <a class="" href="<?php echo e(asset('/public/admin/clip-one/assets/quotes')); ?>/<?php echo e($result->attachment); ?>" target="_blank" downlaod><span><?php echo e($result->attachment); ?></span></a>
                                 <i class="far fa-file-<?php echo e($icons[$ext[1]]); ?> fa-5x text-center"/></i>
                              </li>
                           <?php } ?>
                           <li><span>Serial Number:</span> <span class="cus-message"><?php echo e($result->serial_number); ?></span></li>
                           <li><span>PDI Status:</span> 
                              <?php if($result->PDI_status == '1'): ?>
                                 <span class="cus-message btn btn-success">Approved</span>
                              <?php else: ?>
                                 <span class="cus-message btn btn-danger">Defected</span>
                              <?php endif; ?>
                           </li>
                           <li><span>PDI Message:</span> <span class="cus-message"><?php echo e($result->PDI_message); ?></span></li>
                           <li><span>Payment Confirm:</span> 
                              <?php if($result->payment_confirm == '1'): ?>
                                 <span class="cus-message btn btn-success">Yes</span>
                              <?php else: ?>
                                 <span class="cus-message btn btn-danger">No</span>
                              <?php endif; ?>
                           </li>
                           <li><span>Price:</span> <span class="cus-message"><?php echo e(number_format($result->price,2)); ?></span></li>
                           <li><span>Tax:</span> <span class="cus-message"><?php echo e($result->tax); ?></span></li>
                           <li><span>Total Price:</span> <span class="cus-price">&#163;<?php echo e(number_format($result->total_price,2)); ?></span></li>
                        </ul>
                     </div>
                  </div>
               </div>

               <div class="row">
                  <div class="col-md-12">

                  </div>
               </div>

            </div>
            
          </div>

          <div class="card-footer">
              <div>
                 <a href="<?php echo e(route('sales_order_report.index')); ?>" class="btn btn-primary btn-secondary float-sm-right">Back</a>
              </div>
           </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fjs_plant\resources\views/admin/sales_order_report/view.blade.php ENDPATH**/ ?>