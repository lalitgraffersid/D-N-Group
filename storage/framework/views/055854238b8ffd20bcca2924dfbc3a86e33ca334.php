
<?php $__env->startSection('content'); ?>
 
<style type="text/css">
   .select12:invalid + .select2 .select2-selection{
       border-color: #dc3545!important;
   }
   .select12:valid + .select2 .select2-selection{
       border-color: #28a745!important;
   }
   *:focus{
     outline:0px;
   }
</style>

<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Product</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
                  <li class="breadcrumb-item active">Product Add</li>
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
                     <h3 class="card-title">Add <small>Product</small></h3>
                  </div>
                  <?php if(count($errors) > 0): ?>       
                     <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <span><?php echo e($error); ?></span><br/>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                     </div>         
                  <?php endif; ?>
                  <form id="quickForm" action="<?php echo e(route('products.save')); ?>" method="POST" enctype="multipart/form-data" >
                     <?php echo e(csrf_field()); ?>

                     <div class="card-body">

                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="category_id">Category</label>
                                 <select name="category_id" class="category_id select12 form-control" id="category_id" data-placeholder="Select a category" style="width: 100%;" required >
                                    <option value="">Select Category</option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </select>
                              </div>
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="dealer_id">Dealer</label>
                                 <select name="dealer_id" class="dealer_id select12 form-control" id="dealer_id" data-placeholder="Select a Dealer" style="width: 100%;" required>
                                    <option value="">Select Dealer</option>
                                    <?php $__currentLoopData = $dealers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </select>
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="stock_number">Stock Number</label>
                                 <input type="text" name="stock_number" class="form-control" id="stock_number" value="<?php echo e(old('stock_number')); ?>" placeholder="Stock Number">
                              </div>
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="backorder_number">Backorder Number</label>
                                 <input type="text" name="backorder_number" class="form-control" id="backorder_number" value="<?php echo e(old('backorder_number')); ?>" placeholder="Backorder Number">
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="title">Title</label>
                                 <input type="text" name="title" value="<?php echo e(old('title')); ?>" class="form-control" id="title" placeholder="Title">
                              </div>
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="date">Date</label>
                                 <input type="date" name="date" value="<?php echo e(old('date')); ?>" class="form-control" id="date" >
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="make">Make</label>
                                 <input type="text" name="make" value="<?php echo e(old('make')); ?>" class="form-control" id="make" placeholder="Make">
                              </div>
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="model">Model</label>
                                 <input type="text" name="model" value="<?php echo e(old('model')); ?>" class="form-control" id="model" placeholder="Model">
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label for="year">Year</label>
                                 <input type="text" name="year" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy" data-mask id="year" value="<?php echo e(old('year')); ?>">
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label for="hours">Hours</label>
                                 <input type="number" name="hours" class="form-control" id="hours" placeholder="Hours" value="<?php echo e(old('hours')); ?>">
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label for="weight">Weight</label>
                                 <input type="number" name="weight" step="0.02" class="form-control" id="weight" placeholder="Weight" value="<?php echo e(old('weight')); ?>">
                              </div>
                           </div>
                        </div>

                        <div class="form-group">
                           <label for="description">Description</label>
                           <textarea name="description" id="description" ><?php echo e(old('stock_number')); ?></textarea>
                        </div>

                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="price">Price</label>
                                 <input type="number" name="price" class="form-control" id="price" placeholder="Price" step="0.02" value="<?php echo e(old('price')); ?>">
                              </div>
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="type">Type</label>
                                 <select name="type" class="type form-control" id="type" data-placeholder="Select a type" style="width: 100%;" required>
                                    <option value="">Select Type</option>
                                    <option value="New">New</option>
                                    <option value="Used">Used</option>
                                 </select>
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="image">Product Images</label>
                                 <input type="file" name="image[]" class="form-control" id="image" accept="image/*" multiple>
                              </div>
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="attachment">Attachment</label>
                                 <input type="file" name="attachment" class="form-control" id="attachment" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf">
                              </div>
                           </div>
                        </div>

                        <div class="form-group">
                           <label for="status">Status</label>
                           <select name="status" class="status form-control" id="status" data-placeholder="Select status" style="width: 100%;" required>
                              <option value="">Select status</option>
                              <option value="Coming Soon">Coming Soon</option>
                              <option value="In Stock">In Stock</option>
                              <option value="Sold">Sold</option>
                           </select>
                        </div>

                     </div>
                     <div class="card-footer">
                        <div>
                           <button type="submit" class="btn btn-primary">Submit</button>
                           <a href="<?php echo e(route('products.index')); ?>" class="btn btn-default btn-secondary">Back</a>
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

$('.select12').select2({
   theme: 'bootstrap4',
   minimumResultsForSearch: Infinity
});

$('#year').inputmask('yyyy', { 'placeholder': 'yyyy' });

$('#description').summernote({
   height: 150,
   toolbar: [
    ['style', ['style']],
    ['font', ['bold', 'italic', 'underline', 'clear']],
    ['fontname', ['fontname']],
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
         stock_number: {
            required: true
         },
         backorder_number: {
            required: true
         },
         title: {
            required: true
         },
         date: {
            required: true
         },
         make: {
            required: true
         },
         model: {
            required: true
         },
         year: {
            required: true
         },
         hours: {
            required: true
         },
         weight: {
            required: true
         },
         price: {
            required: true
         },
         type: {
            required: true
         },
         image: {
            required: true
         },
         status: {
            required: true
         },
      },
      messages: {
         stock_number: {
            required: "Please enter stock number",
         },
         backorder_number: {
            required: "Please enter backorder number",
         },
         title: {
            required: "Please enter title",
         },
         date: {
            required: "Please select date",
         },
         make: {
            required: "Please enter make",
         },
         model: {
            required: "Please enter model",
         },
         year: {
            required: "Please enter year",
         },
         hours: {
            required: "Please enter hours",
         },
         weight: {
            required: "Please enter weight",
         },
         price: {
            required: "Please enter price",
         },
         type: {
            required: "Please select type",
         },
         image: {
            required: "Please upload an image",
         },
         status: {
            required: "Please select status",
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
  



<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fjs_plant\resources\views/admin/products/add.blade.php ENDPATH**/ ?>