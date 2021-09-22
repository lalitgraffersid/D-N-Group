
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
   $status = Request::get('status');
?>
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Sales Calls</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
              <li class="breadcrumb-item active">Sales Calls List</li>
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
                 <form action="<?php echo e(route('sales_calls_report.index')); ?>" method="GET">
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
                                          <select class="select12" name="status" style="width: 100%;" data-placeholder="Select Status">
                                              <option value="">Select Status</option>
                                              <option value="New" <?php if($status == 'New'){echo "selected";} ?>>New</option>
                                              <option value="In Progress" <?php if($status == 'In Progress'){echo "selected";} ?>>In Progress</option>
                                              <option value="On Hold" <?php if($status == 'On Hold'){echo "selected";} ?>>On Hold</option>
                                              <option value="Lost" <?php if($status == 'Lost'){echo "selected";} ?>>Lost</option>
                                              <option value="Closed" <?php if($status == 'Closed'){echo "selected";} ?>>Closed</option>
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
  



<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fjs_plant\resources\views/admin/sales_calls_report/index.blade.php ENDPATH**/ ?>