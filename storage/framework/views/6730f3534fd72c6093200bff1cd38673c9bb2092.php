
<?php $__env->startSection('content'); ?>

	
<div class="container-gray-inner" id="services">
<div class="container">
  <ul class="breadcrumb">
    <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
    <li>Contact Us</li>
  </ul>
  <h2 class="mb-2">Get in touch with us!</h2>
  <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
  <strong>Head Office:</strong><br>
 <?php echo e($setting->address); ?><br>
  <strong>Phone:</strong><br>Office - <a href="callto:<?php echo e($setting->phone); ?>"><?php echo e($setting->phone); ?></a>, Eddie - <a href="callto:087 668 7739">087 668 7739</a>,  Brian - <a href="callto:087 965 4916">087 965 4916</a><br>
  <strong>Email:</strong><br><a href="mailto:<?php echo e($setting->email); ?>"><?php echo e($setting->email); ?></a>

  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2372.335434133856!2d-7.356898684155127!3d53.51606598001499!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x485dc00933eca3f9%3A0x92bb6263f2f4271b!2s8a%20Zone%20C%2C%20Mullingar%20Business%20Park%2C%20Mullingar%2C%20Co.%20Westmeath%2C%20Ireland!5e0!3m2!1sen!2sin!4v1627035054491!5m2!1sen!2sin" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

</div>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 centered">
    <div class="contact-box">
        <form id="quickForm" action="<?php echo e(route('contact.save')); ?>" method="POST">
						<?php echo e(csrf_field()); ?>

<input placeholder="Name*" class="input-box" type="text" name="name" />
<input placeholder="Email*" class="input-box" type="text" name="email"  />
<input placeholder="Contact*"  class="input-box" type="text" name="contact_no" />

<input placeholder="subject*"  class="input-box" type="text" name="subject" />

<textarea placeholder="Message" class="textarea-box" rows="3" name="message"></textarea>

 <div class="col-md-6">
                          <div class="captcha">
                          <span><?php echo captcha_img(); ?></span>
                          <button type="button" class="btn btn-success btn-refresh"><i class="fa fa-refresh"></i></button>
                          </div>
                          <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">


                          <?php if($errors->has('captcha')): ?>
                              <span class="help-block">
                                  <strong><?php echo e($errors->first('captcha')); ?></strong>
                              </span>
                          <?php endif; ?>
                      </div>
                  </div>

							<button type="Submit">Submit</button>
							</form>

<script type="text/javascript">

let rightCode = '';
let valiIpt = document.querySelector('#valiIpt');
let toggleBtn = document.querySelector('#toggle');
let submitBtn = document.querySelector('#submit');
toggleBtn.addEventListener('click', function(){
  getImgValiCode();
  console.log('click:' + rightCode);
}, false);
submitBtn.addEventListener('click', function(){
  if (valiIpt.value === '') {
    alert('verification code must be filled!');
    return false;
  }
  if (valiIpt.value !== rightCode) {
    alert('Verification code error!');
    return false;
  }
  alert('Submitted successfully!')
  valiIpt.value = '';
}, false);
getImgValiCode();
console.log('init:' + rightCode);
function getImgValiCode () {
  let showNum = [];
  let canvasWinth = 150;
  let canvasHeight = 30;
  let canvas = document.getElementById('valicode');
  let context = canvas.getContext('2d');
  canvas.width = canvasWinth;
  canvas.height = canvasHeight;
  let sCode = 'A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z,0,1,2,3,4,5,6,7,8,9,!,@,#,$,%,^,&,*,(,)';
  let saCode = sCode.split(',');
  let saCodeLen = saCode.length;
  for (let i = 0; i <= 3; i++) {
    let sIndex = Math.floor(Math.random()*saCodeLen);
    let sDeg = (Math.random()*30*Math.PI) / 180;
    let cTxt = saCode[sIndex];
    showNum[i] = cTxt.toLowerCase();
    let x = 10 + i*20;
    let y = 20 + Math.random()*8;
    context.font = 'bold 23px 微软雅黑';
    context.translate(x, y);
    context.rotate(sDeg);

    context.fillStyle = randomColor();
    context.fillText(cTxt, 0, 0);

    context.rotate(-sDeg);
    context.translate(-x, -y);
  }
  for (let i = 0; i <= 5; i++) {
    context.strokeStyle = randomColor();
    context.beginPath();
    context.moveTo(
      Math.random() * canvasWinth,
      Math.random() * canvasHeight
    );
    context.lineTo(
      Math.random() * canvasWinth,
      Math.random() * canvasHeight
    );
    context.stroke();
  }
  for (let i = 0; i < 30; i++) {
    context.strokeStyle = randomColor();
    context.beginPath();
    let x = Math.random() * canvasWinth;
    let y = Math.random() * canvasHeight;
    context.moveTo(x,y);
    context.lineTo(x+1, y+1);
    context.stroke();
  }
  rightCode = showNum.join('');
}

function randomColor () {
  let r = Math.floor(Math.random()*256);
  let g = Math.floor(Math.random()*256);
  let b = Math.floor(Math.random()*256);
  return 'rgb(' + r + ',' + g + ',' + b + ')';
}
    </script>
    
    </div>
    </div>

</div>




</div>

</div>






<?php $__env->stopSection(); ?>


<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\DNGroup\resources\views/front/contact_us.blade.php ENDPATH**/ ?>