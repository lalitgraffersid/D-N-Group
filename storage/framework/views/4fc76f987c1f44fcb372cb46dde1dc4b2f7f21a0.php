<?php
 $set= DB::table('settings')->first();
?>
 <div class="footer-main">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 footer-col-dark">
              <a href="home.html"><img src="<?php echo e(asset('assets/front/images/logo-footer.png')); ?>" style="border-radius:10px" class="img-fluid" /></a>
              <p class="footer-text">Founded by Eddie Doyle and Brian Nugent in 2006 as D&N Electrical, the company
                became D&N Group after branching into Reactive, Planned and Preventative
                Maintenance</p>
                <ul class="social-list">
                  <li><a href="https://www.facebook.com/DN-Group-127544670644901/?ref=py_c"><i class="fa fa-facebook fa-size fb-bg"></i></a></li>
                  <li><a href="https://www.instagram.com/dngroup__/"><i class="fa fa-instagram fa-size insta-bg"></i></a></li>
                </ul>
              
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 footer-col">
              <h2 class="footer-head">Useful Links</h2>
              <ul style="list-style: none;">
                <li class="li-space"><a href="home.html" class="footer-links">Home</a></li>
                <li class="li-space"><a href="about.html" class="footer-links">About Us</a></li>
                <li class="li-space"><a href="services.html" class="footer-links">Services</a></li>
                <li class="li-space"><a href="projects.html" class="footer-links">Projects</a></li>
                <li class="li-space"><a href="sponsorships.html" class="footer-links">Sponsorships</a></li>
                <li class="li-space"><a href="career.html" class="footer-links">Career</a></li>
                <li class="li-space"><a href="privacy.html" class="footer-links">Privacy Policy</a></li>
                <li class="li-space"><a href="contact.html" class="footer-links">Contact Us</a></li>
              </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 footer-col">
              <h2 class="footer-head">Services</h2>
              <ul style="list-style: none;">
                <li class="li-space"><a href="services-one.html" class="footer-links">Complete Property service</a></li>
                <li class="li-space"><a href="services-one.html" class="footer-links">Planned maintenance</a></li>
                <li class="li-space"><a href="services-one.html" class="footer-links">Reactive maintenance</a></li>
                <li class="li-space"><a href="services-one.html" class="footer-links">Construction</a></li>
                <li class="li-space"><a href="services-one.html" class="footer-links">Electrical &amp; Mechanical Contractors</a></li>
                  <li class="li-space"><a href="services-one.html" class="footer-links">Facilities management</a></li>
              </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 footer-col">
              <h2 class="footer-head">Contact Us</h2>
              <ul style="list-style: none;">
                <li class="li-space">Office: <a href="callto:044 937 6730" class="footer-links">044 937 6730</a></li>
                <li class="li-space">Eddie: <a href="callto:087 668 7739" class="footer-links">087 668 7739</a></li>
                <li class="li-space">Brian: <a href="callto:087 965 4916" class="footer-links">087 965 4916</a></li>
                <li class="li-space">Email: <a href="mailto:info@dngroup.ie" class="footer-links">info@dngroup.ie</a>
                </li>
              </ul>
              <h2 class="footer-head">Head Office</h2>
              <ul style="list-style: none;">
                <li class="li-space">Unit 8A Zone C, Mullingar Business Park, Mullingar, Co. Westmeath</li>
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
<?php /**PATH C:\xampp\htdocs\D&NGroup\resources\views/front/includes/footer.blade.php ENDPATH**/ ?>