
<?php $__env->startSection('content'); ?>

	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="grey-bg full-width">
					<div class="container">
						<div class="row">
							<div class="col-lg-12 text-center mb-4">
								<div class="web-content">
									<h2>Contact Us</h2>
								</div>	
							</div>

							<div class="col-lg-6">
								  <?php if(count($errors) > 0): ?>
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
            <?php endif; ?> 
								<div class="">
									<div class="home-formbox">
										<h5>Get in Touch</h5>
                                <form id="quickForm" action="<?php echo e(route('contact.save')); ?>" method="POST">
						<?php echo e(csrf_field()); ?>

							<input type="text"  required name="name" placeholder="Name">
							<input type="text" required name="email" placeholder="Email">
							<input type="text" required name="contact_no" placeholder="Contact No.">
							<!--<input type="text" required name="subject" placeholder="subject">-->
							<textarea rows="6"  required name="message" placeholder="Message"></textarea>
							<button type="Submit">Submit</button>
							</form>
						</div>
				</div>
		</div>

							<div class="col-lg-6">
								<ul class="contact-list">
									<li><span>Address:</span> <?php echo e($setting->address); ?> </li>
									<li><span>Call:</span> <a href="tel:<?php echo e($setting->phone); ?>"><?php echo e($setting->phone); ?></a></li>
							 	 	<li><span>Email</span> <a href="<?php echo e($setting->email); ?>"><?php echo e($setting->email); ?></a></li> 
								</ul>
							</div>
						</div>
				</div>
			</div>
		</div>
	</section>


	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 p-0">
								<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d2381.1348184866497!2d-6.55024348416108!3d53.35874207998162!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sUnit%20A2%2C%20M4%20Business%20Park%2C%20Celbridge%2C%20Co.Kildare%2C%20W23%20PW2K!5e0!3m2!1sen!2sin!4v1616154714321!5m2!1sen!2sin" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
							</div>
			</div>
		</div>
	</section>









<?php $__env->stopSection(); ?>


<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hm3hczr3zv0q/public_html/demo/get-solutionweb/resources/views/front/contact_us.blade.php ENDPATH**/ ?>