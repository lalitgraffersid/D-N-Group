<?php
 $set= DB::table('settings')->first();
 $services= DB::table('services')->take('6')->get();
?>
 <div class="footer-main">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 footer-col-dark">
              <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset('assets/front/images/logo-footer.png')); ?>" style="border-radius:10px" class="img-fluid" /></a>
              <p class="footer-text">Founded by Eddie Doyle and Brian Nugent in 2006 as D&N Electrical, the company
                became D&N Group after branching into Reactive, Planned and Preventative
                Maintenance</p>
                <ul class="social-list">
                  <li><a href="<?php echo e($set->facebook_link); ?>"><i class="fa fa-facebook fa-size fb-bg"></i></a></li>
                  <li><a href="<?php echo e($set->instagram_link); ?>"><i class="fa fa-instagram fa-size insta-bg"></i></a></li>
                </ul>
              
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 footer-col">
              <h2 class="footer-head">Useful Links</h2>
              <ul style="list-style: none;">
                <li class="li-space"><a href="<?php echo e(route('home')); ?>" class="footer-links">Home</a></li>
                <li class="li-space"><a href="<?php echo e(route('about')); ?>" class="footer-links">About Us</a></li>
                <li class="li-space"><a href="<?php echo e(route('services.all')); ?>" class="footer-links">Services</a></li>
                <li class="li-space"><a href="<?php echo e(route('project.all')); ?>" class="footer-links">Projects</a></li>
                <li class="li-space"><a href="<?php echo e(route('sponsorship')); ?>" class="footer-links">Sponsorships</a></li>
                <li class="li-space"><a href="<?php echo e(route('job.all')); ?>" class="footer-links">Career</a></li>
                <li class="li-space"><a href="<?php echo e(route('privacy')); ?>" class="footer-links">Privacy Policy</a></li>
                <li class="li-space"><a href="<?php echo e(route('contactus')); ?>" class="footer-links">Contact Us</a></li>
              </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 footer-col">
              <h2 class="footer-head">Services</h2>
              <ul style="list-style: none;">
                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="li-space"><a href="<?php echo e(route('servicedetail',$ser->id)); ?>" class="footer-links"><?php echo e($ser->title); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 footer-col">
              <h2 class="footer-head">Contact Us</h2>
              <ul style="list-style: none;">
                <li class="li-space">Office: <a href="callto:<?php echo e($set->phone); ?>" class="footer-links">044 937 6730</a></li>
                <li class="li-space">Eddie: <a href="callto:087 668 7739" class="footer-links">087 668 7739</a></li>
                <li class="li-space">Brian: <a href="callto:087 965 4916" class="footer-links">087 965 4916</a></li>
                <li class="li-space">Email: <a href="mailto:<?php echo e($set->email); ?>" class="footer-links"><?php echo e($set->email); ?></a>
                </li>
              </ul>
              <h2 class="footer-head">Head Office</h2>
              <ul style="list-style: none;">
                <li class="li-space"><?php echo e($set->address); ?></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="footer-bottom">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 footer-bottom-text">
              Copyright 2021 | Template designed by <a href="https://dmcconsultancy.com/">DMC Consultancy.com</a>
            </div>
          </div>
        </div>
      </div>

    </div>


    <script src="<?php echo e(asset('assets/front/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/front/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/front/js/navscript.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/front/js/script.js')); ?>"></script>
    <script>
      function myFunction() {
        var x = document.getElementById("navbarSupportedContent");
        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
      }
    </script>

    <script>
     $(document).ready (function(){
      $(".close").on('click', function(){
      $(".mobile-nav").hide();
    });
    });
    </script>

    <script>


$(".btn-refresh").click(function(){
  $.ajax({
     type:'GET',
     url: "<?php echo e(url('refresh_captcha')); ?>",
     success:function(data){
        $(".captcha span").html(data.captcha);
     }
  });
});


</script>
<?php /**PATH C:\xampp\htdocs\DNGroup\resources\views/front/includes/footer.blade.php ENDPATH**/ ?>