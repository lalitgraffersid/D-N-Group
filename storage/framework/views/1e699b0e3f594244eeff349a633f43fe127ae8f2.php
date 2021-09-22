
<?php $__env->startSection('content'); ?>

<style>
   .dataTables_filter, .dataTables_info { display: none; }
</style>

<?php 
   $current_route = \Request::route()->getName();
   $routeArr = explode('.', $current_route);
   $section = $routeArr[0];
   $action = $routeArr[1];

   $data = App\Helpers\AdminHelper::checkAddButtonPermission($section,Auth::user()->id);

   $users = DB::table('users')->where('user_type','user')->get();

   $user_id = Request::get('user_id');
   $PDI_status = Request::get('PDI_status');
   $payment_confirm = Request::get('payment_confirm');
?>
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Sales Order</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
              <li class="breadcrumb-item active">Sales Order List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- <div class="col-md-12">
           <form action="enhanced-results.html">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Result Type:</label>
                                    <input type="search" class="form-control" placeholder="Type your keywords here" value="">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Sort Order:</label>
                                    <select class="select12" style="width: 100%;">
                                        <option selected>ASC</option>
                                        <option>DESC</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Order By:</label>
                                    <select class="select12" style="width: 100%;">
                                        <option selected>Title</option>
                                        <option>Date</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div> -->


      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
           
           <div class="col-lg-12"> 
              <!-- <?php if(count($errors) > 0): ?>
             <div class="alert alert-danger val-error-list">
                <ul>
                  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><?php echo e($error); ?></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              </div>
              <?php endif; ?>
              <?php if(Session::has('message')): ?>
                <p class="alert <?php echo e(Session::get('alert-class', 'alert-success')); ?>"><?php echo e(Session::get('message')); ?></p>
              <?php endif; ?> -->
               
              <div class="card">

               <?php if(!empty($data['checkRole']) && (Auth::user()->user_type == 'admin' || !empty($data['checkPermission']))): ?>
                  <div class="card-header float-right">
                     <a href="<?php echo e(route('leads.add')); ?>" class="btn btn-info float-right"><i class="fas fa-plus"></i> Add</a>
                  </div>
               <?php endif; ?>



              <!-- /.card-header -->
              <div class="card-body">

               <div class="col-md-12">
                 <form action="<?php echo e(route('sales_order_report.index')); ?>" method="GET">
                     <?php echo e(csrf_field()); ?>

                      <div class="row">
                          <div class="col-md-12">
                              <div class="row">
                                  <div class="col-3">
                                      <div class="form-group">
                                          <select class="select12" name="user_id" style="width: 100%;" data-placeholder="Select User">
                                              <option value="">Select User</option>
                                              <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <option value="<?php echo e($user->id); ?>" <?php if($user_id == $user->id){echo "selected";} ?>><?php echo e($user->name); ?></option>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-3">
                                      <div class="form-group">
                                          <select class="select12" name="PDI_status" style="width: 100%;" data-placeholder="Select PDI Status">
                                              <option value="">Select PDI Status</option>
                                              <option value="1" <?php if($PDI_status == '1'){echo "selected";} ?>>Approved</option>
                                              <option value="0" <?php if($PDI_status == '0'){echo "selected";} ?>>Defected</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-3">
                                      <div class="form-group">
                                          <select class="select12" name="payment_confirm" style="width: 100%;" data-placeholder="Select Payment Status">
                                              <option value="">Select Status</option>
                                              <option value="1" <?php if($payment_confirm == '1'){echo "selected";} ?>>Yes</option>
                                              <option value="0" <?php if($payment_confirm == '0'){echo "selected";} ?>>No</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-2">
                                      <div class="form-group">
                                          <label></label>
                                          <button type="submit" class="btn btn-info" style="width: 97%;">Search</button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
                <?php echo $dataTable->table(['class'=>'table dataTable no-footer projects']); ?>

              </div>
              <!-- /.card-body -->
            </div>
          </div>
         </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<?php echo $dataTable->scripts(); ?>


<script>
   $('.select12').select2({
   theme: 'bootstrap4'
});
</script>

<?php $__env->stopSection(); ?>
  



<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fjs_plant\resources\views/admin/sales_order_report/index.blade.php ENDPATH**/ ?>