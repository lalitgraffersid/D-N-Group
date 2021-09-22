
<?php $__env->startSection('content'); ?>
<style>
   .custom_close{
     position: relative;
    display: inline-block;
   }
  .custom_close button{
   position: absolute;
    right: 0;
    width: 25px;
    height: 25px;
    line-height: 0;
    text-align: center;
    padding: 0;
    font-size: 10px !important;
}
</style>
 
<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">AboutUs</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
                  <li class="breadcrumb-item active">AboutUs Edit</li>
               </ol>
            </div>
         </div>
      </div>
   </div>

   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <div class="card card-primary">
                  <div class="card-header">
                     <h3 class="card-title">Edit <small>AboutUs</small></h3>
                  </div>
                  <?php if(count($errors) > 0): ?>       
                     <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <span><?php echo e($error); ?></span><br/>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                     </div>         
                  <?php endif; ?>
                  <form id="quickForm" action="<?php echo e(route('about_us.update')); ?>" method="POST" enctype="multipart/form-data">
                     <?php echo e(csrf_field()); ?>

                     <input type="hidden" name="id" value="<?php echo e($result->id); ?>">

                     <div class="card-body">

                        <div class="form-group">
                           <label for="heading">Heading</label>
                           <input type="text" name="heading" value="<?php echo e($result->heading); ?>" class="form-control" id="heading" placeholder="Heading">
                        </div>

                        <div class="form-group">
                           <label for="description">Short Description</label>
                           <textarea name="description" id="description" class="form-control"><?php echo e($result->description); ?></textarea>
                        </div>
                         <div class="form-group">
                           <label for="description">Long Description</label>
                           <textarea name="long_description" id="long_description" class="form-control"><?php echo e($result->long_description); ?></textarea>
                        </div>

                        <div class="form-group">
                           <label for="image">Image</label>
                           <input type="file" name="image" class="form-control" id="image"><br>
                           <?php if(!empty($result->image)): ?>
                              <img src="<?php echo e(url('/public/admin/clip-one/assets/about_us')); ?>/<?php echo e($result->image); ?>" width="100px">
                           <?php endif; ?>
                        </div>

                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="image">Multiple Image</label>
                                 <input type="file" name="images[]" class="form-control" id="image" accept="image/*" multiple>
                              </div>
                              <?php if(count($images)>0): ?>
                                <br>
                                <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <div class="custom_close">
                                    <img src="<?php echo e(asset('/public/admin/clip-one/assets/about_us/thumbnail')); ?>/<?php echo e($productImage->image); ?>" alt="" class="product-edit-img"> 
                                      <button type="button" class="btn btn-danger product-edit-btn" id="delete_img" data-id="<?php echo e($productImage->id); ?>"><i class="far fa-trash-alt"></i></button>
                                 </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>
                           </div>

                        </div>

                     </div>
                     <div class="card-footer">
                        <div>
                           <button type="submit" class="btn btn-primary">Submit</button>
                           <a href="<?php echo e(route('about_us.index')); ?>" class="btn btn-default btn-secondary">Back</a>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
            <div class="col-md-6"></div>
         </div>
      </div>
   </section>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/admin/plugins/jquery-validation/jquery.validate.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/plugins/jquery-validation/additional-methods.min.js')); ?>"></script>

<script>

$('#description').summernote({
   height: 300,
   fontSizes: ['8', '9', '10', '11', '12', '14', '18', '24', '36', '48' , '64', '82', '150'],
   toolbar: [
    ['style', ['style']],
    ['font', ['bold', 'italic', 'underline', 'clear']],
    ['fontname', ['fontname']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']],
    ['table', ['table']],
    ['insert', ['link', 'picture', 'hr']],
    ['view', ['fullscreen', 'codeview']],
    ['help', ['help']]
   ],
});

$('#long_description').summernote({
   height: 300,
   fontSizes: ['8', '9', '10', '11', '12', '14', '18', '24', '36', '48' , '64', '82', '150'],
   toolbar: [
    ['style', ['style']],
    ['font', ['bold', 'italic', 'underline', 'clear']],
    ['fontname', ['fontname']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']],
    ['table', ['table']],
    ['insert', ['link', 'picture', 'hr']],
    ['view', ['fullscreen', 'codeview']],
    ['help', ['help']]
   ],
});

$(function () {
   $('#quickForm').validate({
      rules: {
         heading: {
            required: true
         },
         description: {
            required: true
         },
      },
      messages: {
         heading: {
            required: "Please select type",
         },
         description: {
            required: "Please enter a title",
         }
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
<script>
   $(document).ready(function(){
     $('.product-edit-btn').on('click',function(){
         var id = $(this).data('id');
          
         
         $.ajax({
             url: "<?php echo e(url('admin/about_us/image/delete')); ?>/"+id,
             method: "get",
             success: function (response) {
                if(response.msg == 'success'){
                    toastr.success('Image deleted successfully.', 'Success');
                     setTimeout(function(){ 
                        location.reload();
                     }, 2000);
                }
             }
         });
     });
   });
</script>

<?php $__env->stopSection(); ?>
  



<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\D&NGroup\resources\views/admin/about_us/edit.blade.php ENDPATH**/ ?>