<?php
 $set= DB::table('settings')->first();
?>
<footer class="top-space">
		<div class="container-fluid">
			<div class="row">
				<div class="footer-panel full-width">
					<div class="container">
						<div class="row">

							<div class="col-lg-7" style="border-right: solid #666 1px;">
								
								<div class="row">
									<div class="col-lg-6">
										<img src="<?php echo e(asset('assets/front/images/ftr-logo1.png')); ?>" alt="" class="img-fluid" width="240">
									</div>


									<div class="col-lg-6">
										<img src="<?php echo e(asset('assets/front/images/ftr-logo2.png')); ?>" alt="" class="img-fluid" width="240">
									</div>
								</div>
							</div>

							<div class="col-lg-5">
							<h5 class="mt-4 mb-2">Contact Us</h5>

							<ul class="address-list">
								<li><?php echo e($set->address); ?></li>
								<li>Call - <?php echo e($set->phone); ?></li>
								<li>Email - <?php echo e($set->email); ?></li>
							</ul>
							<a href="<?php echo e($set->facebook_link); ?>"><img src="<?php echo e(asset('assets/front/images/fb.png')); ?>" alt=""></a> &nbsp;
							<a href="<?php echo e($set->tw_link); ?>"><img src="<?php echo e(asset('assets/front/images/tw.png')); ?>" alt=""></a> &nbsp;
							<a href="<?php echo e($set->instagram_link); ?>"><img src="<?php echo e(asset('assets/front/images/insta.png')); ?>" alt=""></a> &nbsp;
							<a href="<?php echo e($set->ln_link); ?>"><img src="<?php echo e(asset('assets/front/images/in.png')); ?>" alt=""></a>
							</div>

						</div>
					</div>
				</div>
				
				<div class="copyright-panel full-width">
					<div class="container">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<p>&copy; Get Solutions 2021</p>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">
								<ul class="copy-links">
									<li><a href="<?php echo e(route('home')); ?>">Home</a></li>
									<li><a href="<?php echo e(route('team')); ?>">Our Team</a></li>
									<li><a href="<?php echo e(route('project.all')); ?>">Projects</a></li>
									<li><a href="<?php echo e(route('energy')); ?>">Energy Solutions</a></li>
									<li><a href="<?php echo e(route('contactus')); ?>">Contact Us</a></li>
									<li><a href="<?php echo e(route('privacy')); ?>">Privacy Policy</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	</body>	


<script src="<?php echo e(asset('assets/front/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/front/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/front/js/stellarnav.min.js')); ?>"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			jQuery('.stellarnav').stellarNav({
				theme: 'dark',
				breakpoint: 960,
				position: 'right',
//				phoneBtn: '18009997788',
//				locationBtn: 'https://www.google.com/maps'
			});
		});
	</script>
	
<script src="https://use.fontawesome.com/1744f3f671.js"></script>
<script src="<?php echo e(asset('assets/front/js/testi.js')); ?>"></script>
	
	<script>
		$(window).scroll(function(){
			var fixed = $('#menuSticky'),
				scroll = $(window).scrollTop();
			if(scroll >= 300) fixed.addClass('stickyHeader');
			else fixed.removeClass('stickyHeader');
			
			var logo = $('#cusLogo'),
				scroll = $(window).scrollTop();
			if(scroll >= 300) logo.addClass('logoShrink');
			else logo.removeClass('logoShrink');
		});
		
		
	</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script src="<?php echo e(asset('assets/front/js/script.js')); ?>"></script>
<script src="<?php echo e(asset('assets/front/js/gallery.js')); ?>"></script>


<!-- <script>
function changeText(cont1,cont2,speed){
	var Otext=cont1.text();
	var Ocontent=Otext.split("");
	var i=0;
	function show(){
		if(i<Ocontent.length)
		{		
			cont2.append(Ocontent[i]);
			i=i+1;
		};
	};
		var Otimer=setInterval(show,speed);	
};
$(document).ready(function(){
	$('body').on('click',function(){
		changeText($(".heading1"),$("#main-hdng1"),60);
		changeText($(".heading2"),$("#main-hdng2"),60);
		changeText($(".heading3"),$("#main-hdng3"),60);
		changeText($(".heading4"),$("#main-hdng4"),60);
		clearInterval(Otimer);
	});
});
</script> -->




	
</html><?php /**PATH C:\xampp\htdocs\get_solutions\resources\views/front/includes/footer.blade.php ENDPATH**/ ?>