
<?php $__env->startSection('content'); ?>

<style type="text/css">
   .clearfix{
      margin-bottom: auto;
   }
</style>

<?php
  $sections = DB::table('sections')->where('section_slug','!=','modules')->orderBy('section_order','ASC')->get();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Sub Admin</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">SubAdmin Edit</li>
               </ol>
            </div><!-- /.col -->
         </div><!-- /.row -->
      </div><!-- /.container-fluid -->
   </div>
<!-- /.content-header -->

   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="row">
       
            <div class="col-lg-12"> 
               <?php if(count($errors) > 0): ?>       
                  <div class="alert alert-danger alert-dismissable">
                     <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                     <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span><?php echo e($error); ?></span><br/>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                  </div>         
               <?php endif; ?>
              
              <?php if(Session::has('message')): ?>
                  <p class="alert <?php echo e(Session::get('alert-class', 'alert-success')); ?>"><?php echo e(Session::get('message')); ?></p>
              <?php endif; ?>
        
               <div class="card card-primary">
                  <div class="card-header">
                     <h3 class="card-title">Sub Admin Edit</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="quickForm" role="form" action="<?php echo e(route('sub_admin.update')); ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                 <?php echo e(csrf_field()); ?>

                     <input type="hidden" name="id" value="<?php echo e($user->id); ?>">

                     <div class="card-body">
                        <div class="form-group">
                           <label for="sub_admin">Account Type</label>
                           <select name="account_type" class="form-control">
                              <option value="">Select Account Type</option>
                              <option value="Office" <?php if($user->account_type == 'Office'){echo "selected";} ?>>Office</option>
                              <option value="Service" <?php if($user->account_type == 'Service'){echo "selected";} ?>>Service</option>
                              <option value="Account" <?php if($user->account_type == 'Account'){echo "selected";} ?>>Account</option>
                           </select>
                        </div>

                        <div class="form-group">
                           <label for="sub_admin">User Name</label>
                           <input type="text" name="name" value="<?php echo e($user->name); ?>" class="form-control" id="sub_admin" placeholder="Enter  Name" autocomplete="off" />
                        </div>
                        <div class="form-group">
                           <label for="user_email">Email</label>
                           <input type="email" name="email" value="<?php echo e($user->email); ?>" class="form-control" id="user_email" placeholder="Enter Email" autocomplete="off" />
                        </div>
                        <div class="form-group">
                           <label for="user_password">Password</label>
                           <input type="text" name="password" value="" class="form-control" id="user_password" placeholder="Enter Password" autocomplete="off" />
                        </div>
                  
                        <?php $i=0;?>
                        <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                           <?php $roles=DB::table('roles')->where('section_id',$section->id)->orderBy('order','ASC')->get(); ?>
                           <h5><?php echo e($section->section_title); ?>:</h5>
                           <?php if(!empty($roles)): ?>
                              <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                 <?php $i++; ?>
                                 <div class="form-group clearfix" style="padding-left: 20px;">
                                    <label for="role_id<?php echo e($i); ?>"><?php echo e($rol->name); ?>: &nbsp;</label>
                                    <input type="hidden" name="role_id<?php echo e($i); ?>" value="<?php echo e($rol->id); ?>">
                                    
                                       <?php $rolid=$rol->action_id;
                                       $action_id=explode(',',$rolid);
                                       foreach($action_id as $actid){
                                          $actions=DB::table('actions')->where('id',$actid)->first(); 
                                          $adminPermission = DB::table('admin_permissions')->where('user_id',$user->id)->where('role_id',$rol->id)->first();

                                          $adminAction = [];
                                          if (!empty($adminPermission)) {
                                             $adminAction = explode(',',$adminPermission->action_id);
                                          }

                                          ?>

                                          <div class="d-inline">
                                             <input type="checkbox" id="checkbox_<?php echo e($i); ?>" name="action_id<?php echo e($i); ?>[]" value="<?php echo e($actions->action_slug); ?>" <?php if(in_array($actions->action_slug, $adminAction)){echo "checked";} ?>>
                                             <label style="font-weight: 400;" for="checkbox_<?php echo e($i); ?>"><?php echo e($actions->action_title); ?></label>
                                          </div>
                                       
                                       <?php } ?>

                                 </div>  
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                           <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                
                
                     </div>
                     <input type="hidden" name="total_row" value="<?php echo e($i); ?>">

                     <div class="card-footer">
                        <div>
                           <button type="submit" class="btn btn-primary">Submit</button>
                           <a href="<?php echo e(route('sub_admin.index')); ?>" class="btn btn-default btn-secondary">Back</a>
                        </div>
                     </div>
                  </form>
               </div> 
            </div>
            <div class="col-lg-2"></div>
         </div>
      </div><!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/admin/plugins/jquery-validation/jquery.validate.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/plugins/jquery-validation/additional-methods.min.js')); ?>"></script>

<script>
$(function () {
   // $.validator.setDefaults({
   //    submitHandler: function () {
   //       alert( "Form successful submitted!" );
   //    }
   // });
   $('#quickForm').validate({
      rules: {
         account_type: {
            required: true
         },
         name: {
            required: true
         },
         email: {
            required: true,
            email: true,
         },
         password: {
            required: true,
            minlength: 6
         },
      },
      messages: {
         account_type: {
            required: "Please select account type",
         },
         name: {
            required: "Please enter name",
         },
         email: {
            required: "Please enter a email address",
            email: "Please enter a vaild email address"
         },
         password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 6 characters long"
         },
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
         error.addClass('invalid-feedback');
         element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
         $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
         $(element).removeClass('is-invalid');
      }
   });
});

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fjs_plant\resources\views/admin/sub_admin/edit.blade.php ENDPATH**/ ?>