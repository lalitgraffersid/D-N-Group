
<?php $__env->startSection('content'); ?>

<style>
.user-block img {
    float: left;
    height: 80px;
    width: 80px;
    object-fit: cover;
    margin: 0 10px 0 0;
}

.user-block .username {
    margin: 20px 0 0 0;
}
ul.cus-info{
    list-style-type: none;
    padding: 6px;
    height: auto;
}
ul.cus-info li{
    font-size: 16px;
    margin: 0 0 10px 0;
    list-style-type: none;
    padding: 0 0 0 0;
}
ul.cus-info li span{
    display: inline-block;
    width: 130px;
    vertical-align: top;
}
ul.cus-info li span.cus-message{
    width: 80%;
    height: auto;
}

</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
              <li class="breadcrumb-item active">User Details</li>
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
                <div class="col-12">
                  <h4></h4>
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="<?php echo e($image); ?>" alt="">
                        <span class="username">
                          <a href="#"><?php echo e($result->name); ?></a>
                        </span>
                        <span class="description">Joined On - <?php echo e(date('d F Y',strtotime($result->created_at))); ?></span>
                      </div>
                      <!-- /.user-block -->

                      <ul class="cus-info">
                          <li><span>Email:</span> <?php echo e($result->email); ?></li>
                          <li><span>Contact No.:</span> <?php echo e($result->mobile); ?></li>
                          <li><span>Biodata:</span> <span class="cus-message"><?php echo e($result->bio); ?></span></li>
                      </ul>
                    </div>

                </div>
              </div>
            </div>
            
          </div>

          <div class="card-footer">
              <div>
                 <a href="<?php echo e(route('users.index')); ?>" class="btn btn-primary btn-secondary float-sm-right">Back</a>
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
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fjs_plant\resources\views/admin/users/view.blade.php ENDPATH**/ ?>