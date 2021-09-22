
<?php $__env->startSection('content'); ?>
  <tr>
    <td align="left" valign="top" style="background:#f4f4f4; border-top: 1px solid #ccc; padding:0 20px;"><table width="560" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="left" valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" valign="top" style="font-family:'Arial Black', Gadget, sans-serif; font-size:15px; font-weight:600; color:#000; padding-top:10px;">Hello,</td>
        </tr>
        <tr>
          <td align="left" valign="top" style="font-family:'Arial Black', Gadget, sans-serif; font-size:15px; line-height:24px; font-weight:300; color:#000;">
          <p>New Job Application form submission given below:</p>
             <?php if(!empty($job)): ?>
            <p>Job Apply For : <?php echo e($job); ?></p>
             <?php endif; ?>
            <p>Name : <?php echo e($name); ?></p>
            <p>Email : <?php echo e($email); ?></p>
            <p>Phone : <?php echo e($contact_no); ?></p>
            <p>Subject : <?php echo e($subject); ?></p>
             <?php if(!empty($address)): ?>
            <p>Address : <?php echo e($address); ?></p>
             <?php endif; ?>
             <?php if(!empty($dob)): ?>
            <p>Dob : <?php echo e($dob); ?></p>
            <?php endif; ?>
             <?php if(!empty($experience)): ?>
            <p>Experience : <?php echo e($experience); ?></p>
            <?php endif; ?>
             <?php if(!empty($machine_experience)): ?>
            <p>Machine Experience : <?php echo e($machine_experience); ?></p>
            <?php endif; ?>
            <?php if(!empty($your_self)): ?>
            <p>About Your Self : <?php echo e($your_self); ?></p>
            <?php endif; ?> 
            
            </td>
        </tr>
        <tr>
          <td align="left" valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" valign="top" style="border-top: 1px solid #737373;">&nbsp;</td>
        </tr>
        
      </table></td>
  </tr>
  <tr>
    
  </tr>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('front.emails.emailMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hm3hczr3zv0q/public_html/demo/DNGroup/resources/views/front/emails/emailContact.blade.php ENDPATH**/ ?>