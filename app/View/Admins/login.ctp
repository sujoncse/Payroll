<?php
/**
 * @Developed By	:	Engr. Rajib Mahmud
 * @Start Date	  	:	01st Sep 2013
 * @Last Update		:	09th Sep 2013
 * @Copyright     	:  	Bangladesh Agricultural Research Council. (http://www.barc.gov.bd)
 **/
 ?>
<div class="loginwrap zindex100 animate2 bounceInDown">
	<?php $msg = $this->Session->read("Message");  if(!empty($msg["flash"]["message"])){ ?>
	<div class="alert <?php echo $msg["flash"]["params"]["class"];?>">
	  <strong><?php echo $msg["flash"]["message"]["0"];?></strong> <?php echo $msg["flash"]["message"]["1"];?>
	</div>
	<?php } ?>
	<h1 class="logintitle"><span class="iconfa-lock"></span> Sign In <span class="subtitle">Hello! Sign in to get into the Administrative section.</span></h1>
	<div class="loginwrapperinner">
		<?php 
			echo $this->Form->create('User',array('url'=>array('controller'=>'admins','action'=>'login'),'id'=>'login-form'));
			echo $this->Form->hidden('id');
		?>
			<p class="animate4 bounceIn"><?php echo $this->Form->input('username',array("id"=>"username","type"=>"text","data-validation-type"=>"present",'label'=>false,'div'=>false, "tabindex"=>"1", "value"=>"User Name", "placeholder"=>"Username",  "onfocus"=>"if(this.value=='User Name')this.value='';", "onblur"=>"if(this.value=='')this.value='User Name';"));?>
			<p class="animate5 bounceIn">
			<?php echo $this->Form->input('password',array("id"=>"password","type"=>"password","data-validation-type"=>"present",'class'=>'comment_input comment_name','label'=>false,'div'=>false, "value"=>"Password","placeholder"=>"Password", "tabindex"=>"2", "onfocus"=>"if(this.value=='Password')this.value='';", "onblur"=>"if(this.value=='')this.value='Password';"));?>
			<p class="animate6 bounceIn"><button class="btn btn-default btn-block">Login</button></p>
			<p class="animate7 fadeIn"><a href="<?php echo $this->webroot."admins/forgotPassword";?>"><span class="icon-question-sign icon-white"></span> Forgot Password?</a></p>
		<?php echo $this->Form->end();?>
	</div><!--loginwrapperinner-->
</div>
<div class="loginshadow animate3 fadeInUp"></div>
 
  
<script>
	function submitForm(){ 
		$('#login-form').submit();
	}
	jQuery.noConflict();

jQuery(document).ready(function(){
	
	var anievent = (jQuery.browser.webkit)? 'webkitAnimationEnd' : 'animationend';
	jQuery('.loginwrap').bind(anievent,function(){
		jQuery(this).removeClass('animate2 bounceInDown');
	});
	
	jQuery('#username,#password').focus(function(){
		if(jQuery(this).hasClass('error')) jQuery(this).removeClass('error');
	});
	
	jQuery('#loginform button').click(function(){
		if(!jQuery.browser.msie) {
			if(jQuery('#username').val() == '' || jQuery('#password').val() == '') {
				if(jQuery('#username').val() == '') jQuery('#username').addClass('error'); else jQuery('#username').removeClass('error');
				if(jQuery('#password').val() == '') jQuery('#password').addClass('error'); else jQuery('#password').removeClass('error');
				jQuery('.loginwrap').addClass('animate0 wobble').bind(anievent,function(){
					jQuery(this).removeClass('animate0 wobble');
				});
			} else {
				jQuery('.loginwrapper').addClass('animate0 fadeOutUp').bind(anievent,function(){
					jQuery('#loginform').submit();
				});
			}
			return false;
		}
	});
});
</SCRIPT>