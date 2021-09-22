
<?php $__env->startSection('content'); ?>

<style>
  ul.cus-info li:last-child{
     margin: 20px 0 0 0;
    font-size: 30px;
    font-weight: 700;
}
</style>

<?php 
   $account_type = Auth::user()->account_type;
?>

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
                              <li><a href="#"><img src="<?php echo e(url('/public/admin/clip-one/assets/products/original')); ?>/<?php echo e($product->image); ?>" alt=""> <span><?php echo e($product->title); ?></span><span>&#163;<?php echo e($product->price); ?></span></a></li>
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

                           <li><span>Serial Number:</span> 
                              <span class="cus-message">
                                 <?php if($account_type == 'Office'): ?>
                                 <input type="text" name="serial_number" class="form-control" id="serial_number" value="<?php echo e($result->serial_number); ?>">
                                 <?php else: ?>
                                 <?php echo e($result->serial_number); ?>

                                 <?php endif; ?>
                              </span>
                           </li>

                           <li><span>PDI Status:</span>
                              <?php if($account_type == 'Service'): ?>
                                 <span class="cus-message">
                                    <select class="form-control" name="PDI_status" id="PDI_status">
                                       <option value="">Select PDI Status</option>
                                       <option value="1" <?php if($result->PDI_status == '1'){echo "selected";} ?> >Approved</option>
                                       <option value="0" <?php if($result->PDI_status == '0'){echo "selected";} ?> >Defected</option>
                                    </select>
                                 </span>
                              <?php else: ?>
                                 <?php if($result->PDI_status == '1'): ?>
                                    <span class="cus-message btn btn-success">Approved</span>
                                 <?php else: ?>
                                    <span class="cus-message btn btn-danger">Defected</span>
                                 <?php endif; ?>
                              <?php endif; ?>
                           </li>
                           <li>
                              <span>PDI Message:</span>
                              <span class="cus-message">
                                 <?php if($account_type == 'Service'): ?>
                                    <textarea class="form-control" name="PDI_message" id="PDI_message"><?php echo e($result->PDI_message); ?></textarea>
                                 <?php else: ?>
                                    <?php echo e($result->PDI_message); ?>

                                 <?php endif; ?>
                              </span>
                           </li>
                           <li><span>Payment Confirm:</span>
                              <?php if($account_type == 'Account'): ?>
                                 <span class="cus-message">
                                    <select class="form-control" name="payment_confirm" id="payment_confirm">
                                       <option value="">Select Payment Status</option>
                                       <option value="1" <?php if($result->payment_confirm == '1'){echo "selected";} ?> >Yes</option>
                                       <option value="0" <?php if($result->payment_confirm == '0'){echo "selected";} ?> >No</option>
                                    </select>
                                 </span>
                              <?php else: ?>
                                 <?php if($result->payment_confirm == '1'): ?>
                                    <span class="cus-message btn btn-success">Yes</span>
                                 <?php else: ?>
                                    <span class="cus-message btn btn-danger">No</span>
                                 <?php endif; ?>
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
                  <?php if($account_type == 'Office' || $account_type == 'Service' || $account_type == 'Account'): ?>
                        <a href="<?php echo e(route('sales_order.index')); ?>" class="btn btn-primary btn-secondary float-sm-right">Back</a>
                        <button type="button" id="submit" class="btn btn-primary float-sm-right" style="margin-right: 3px;">Submit</button>
                  <?php else: ?>
                     <a href="<?php echo e(route('sales_order.index')); ?>" class="btn btn-primary btn-secondary float-sm-right">Back</a>
                  <?php endif; ?>
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

<?php if($account_type == 'Office'): ?>
   <script>
      $(document).ready(function(){
         $('#submit').on('click',function(){
            var serial_number = $('#serial_number').val();
            var id = "<?php echo $result->id; ?>"
            var account_type = "Office";

            if (serial_number == '') {
               toastr.error('Please enter Serial Number.', 'Error');
               $('#serial_number').focus();
               return false;
            }
            
            $.ajax({
               url: "<?php echo e(url('admin/sales_order/update')); ?>",
               method: "POST",
               data: {_token: '<?php echo e(csrf_token()); ?>', serial_number: serial_number, id: id, account_type: account_type},
               success: function (response) {
                  if(response.status == 'success'){
                     toastr.success('Serial Number updated successfully.', 'Success');
                     setTimeout(function(){ 
                        location.reload();
                     }, 2000);
                  }else{
                     toastr.error('Something went wrong! Try Again', 'Error');
                     $('#serial_number').focus();
                     return false;
                  }
               }
            });
         });
      });
   </script>
<?php endif; ?>

<?php if($account_type == 'Service'): ?>
   <script>
      $(document).ready(function(){
         $('#submit').on('click',function(){
            var PDI_status = $('#PDI_status').val();
            var PDI_message = $('#PDI_message').val();
            var id = "<?php echo $result->id; ?>"
            var account_type = "Service";

            if ((PDI_status != '0' || PDI_status != '1') && PDI_message == '') {
               toastr.error('Please select PDI status and enter PDI message.', 'Error');
               $('#PDI_status').focus();
               return false;
            }
            
            $.ajax({
               url: "<?php echo e(url('admin/sales_order/update')); ?>",
               method: "POST",
               data: {_token: '<?php echo e(csrf_token()); ?>', PDI_status: PDI_status, PDI_message: PDI_message, id: id, account_type: account_type},
               success: function (response) {
                  if(response.status == 'success'){
                     toastr.success('PDI status and message updated successfully.', 'Success');
                     setTimeout(function(){ 
                        location.reload();
                     }, 2000);
                  }else{
                     toastr.error('Something went wrong! Try Again', 'Error');
                     $('#PDI_status').focus();
                     return false;
                  }
               }
            });
         });
      });
   </script>
<?php endif; ?>

<?php if($account_type == 'Account'): ?>
   <script>
      $(document).ready(function(){
         $('#submit').on('click',function(){
            var payment_confirm = $('#payment_confirm').val();
            var id = "<?php echo $result->id; ?>"
            var account_type = "Account";
            
            $.ajax({
               url: "<?php echo e(url('admin/sales_order/update')); ?>",
               method: "POST",
               data: {_token: '<?php echo e(csrf_token()); ?>', payment_confirm: payment_confirm, id: id, account_type: account_type},
               success: function (response) {
                  if(response.status == 'success'){
                     toastr.success('Payment status updated successfully.', 'Success');
                     setTimeout(function(){ 
                        location.reload();
                     }, 2000);
                  }else{
                     toastr.error('Something went wrong! Try Again', 'Error');
                     $('#payment_confirm').focus();
                     return false;
                  }
               }
            });
         });
      });
   </script>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fjs_plant\resources\views/admin/sales_order/view.blade.php ENDPATH**/ ?>