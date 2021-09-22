
<?php $__env->startSection('content'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lead Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
              <li class="breadcrumb-item active">Lead Details</li>
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
              <!-- <div class="row">
                <div class="col-12 col-sm-3">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Match Played</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo e($total_matches); ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-3">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Total Wins</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo e($total_win); ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-3">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Total Loose</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo e($total_loose); ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-3">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Total Points</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo e($total_points); ?></span>
                    </div>
                  </div>
                </div>
              </div> -->
               <div class="row">
                  <div class="col-md-12">
                     <h4></h4>
                     <div class="post">
                        <!-- /.user-block -->

                        <ul class="cus-info">
                           <li><span>Name:</span> <?php echo e($result->name); ?></li>
                           <li><span>Email:</span> <?php echo e($result->email); ?></li>
                           <li><span>Contact No.:</span> <?php echo e($result->phone); ?></li>
                           <li><span>Date:</span> <?php echo e(date('d F Y',strtotime($result->created_at))); ?></li>
                           <li><span>Message:</span> <span class="cus-message"><?php echo e($result->message); ?></span></li>
                        </ul>
                     </div>
                  </div>
               </div>

               <div class="row">
                  <div class="col-md-12">
                     <div class="card card-info">
                        <div class="card-header">Comment panel</div>
                           <div class="card-body">
                              <form action="<?php echo e(route('leads.comment')); ?>" method="POST">
                                 <?php echo e(csrf_field()); ?>

                                 <input type="hidden" name="lead_id" value="<?php echo e($result->id); ?>">
                                 <textarea name="comment" class="form-control" placeholder="write a comment..." rows="3"></textarea><br>
                                 <button type="submit" class="btn btn-info float-right">Post</button>
                                 <div class="clearfix"></div>
                              </form>
                              <hr>
                              
                              <ul class="media-list">
                              <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php
                                 $user = DB::table('users')->where('id',$comment->comment_by)->first();
                                 $timeAgo = App\Helpers\AdminHelper::time_elapsed_string($comment->created_at);
                              ?>
                                 <li class="media">
                                     <a href="#" class="float-left">
                                         <img src="https://bootdey.com/img/Content/user_1.jpg" alt="" class="img-circle" style="width: 60px">
                                     </a>
                                     <div class="media-body">
                                         <span class="text-muted float-right">
                                             <small class="text-muted"><?php echo e($timeAgo); ?></small>
                                         </span>
                                         <strong class="text-success">by <?php echo e($user->name != 'admin' ? $user->name : 'me'); ?></strong>
                                         <p><?php echo e($comment->comment); ?></a>
                                         </p>
                                     </div>
                                 </li>
                                 <hr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                             </ul>
                         </div>
                     </div>

                  </div>
               </div>

            </div>
            
          </div>

          <div class="card-footer">
              <div>
                 <a href="<?php echo e(route('leads.index')); ?>" class="btn btn-primary btn-secondary float-sm-right">Back</a>
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
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fjs_plant\resources\views/admin/leads/view.blade.php ENDPATH**/ ?>