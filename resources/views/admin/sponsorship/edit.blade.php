@extends('admin.layout.master')
@section('content')
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
               <h1 class="m-0 text-dark">Sponsorship</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item active">Sponsorship Edit</li>
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
                     <h3 class="card-title">Edit <small>Sponsorship</small></h3>
                  </div>
                  @if (count($errors) > 0)       
                     <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        @foreach ($errors->all() as $error)
                           <span>{{ $error }}</span><br/>
                        @endforeach    
                     </div>         
                  @endif
                  <form id="quickForm" action="{{route('sponsorship.update')}}" method="POST" enctype="multipart/form-data">
                     {{csrf_field()}}
                     <input type="hidden" name="id" value="{{$result->id}}">

                     <div class="card-body">

                        <div class="form-group">
                           <label for="heading">Heading</label>
                           <input type="text" name="heading" value="{{$result->heading}}" class="form-control" id="heading" placeholder="Heading">
                        </div>

                        <div class="form-group">
                           <label for="description">Description</label>
                           <textarea name="description" id="description" class="form-control">{{$result->description}}</textarea>
                        </div>
                         

                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="image">Images</label>
                                 
                              </div>
                              @if (count($images)>0)
                                <br>
                                @foreach($images as $productImage)
                                 <div class="custom_close">
                                    <img src="{{ asset('/public/admin/clip-one/assets/sponsorship/thumbnail')}}/{{ $productImage->image }}" alt="" class="product-edit-img"> 
                                      <button type="button" class="btn btn-danger product-edit-btn" id="delete_img" data-id="{{$productImage->id}}"><i class="far fa-trash-alt"></i></button>
                                 </div>
                                @endforeach
                              @endif
                           </div>

                        </div>

                     </div>
                     <div class="card-footer">
                        <div>
                           <button type="submit" class="btn btn-primary">Submit</button>
                           <a href="{{route('sponsorship.index')}}" class="btn btn-default btn-secondary">Back</a>
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
@endsection

@section('script')
<script src="{{asset('assets/admin/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/jquery-validation/additional-methods.min.js')}}"></script>

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
             url: "{{ url('admin/sponsorship/image/delete') }}/"+id,
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

@endsection
  


