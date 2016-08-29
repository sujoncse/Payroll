<?php
/**
 * @Developed By	:	BARC
 * @Start Date	  	:	2nd Sep 2013
 * @Last Update		:	22th Sep 2013
 * @Copyright     	:  	Bangladesh Agricultural Research Council
 * @Link          	:  	http://www.barc.gov.bd
 * */

 $festivals = Configure::read("festivals");
 echo $this->Html->script(array("admin/jquery.validate.min","admin/underscore","admin/jquery.tagsinput.min","admin/forms"));
 echo $this->Html->css(array("admin/datepicker"));
 echo $this->Form->create('FestivalAllowance',array('url'=>array('controller'=>'salaryManagements','action'=>'approveFa',$type),"class"=>"stdform stdform2",'id'=>'fa'));
 echo $this->Form->hidden('id');
?>
<h3 class="widgettitle">Approve Festival Allowance</h3>
<div class="widgetcontent bordered shadowed nopadding">
	<div>
    	<div class="widgetcontent bordered shadowed nopadding">
			<p>
				<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Festival</label>
				<span class="field"><?php echo $this->Form->input('festival',array("id"=>"relegion","type"=>"select",'error' => false,'label'=>false,"class"=>"chzn-select","style"=>"width:280px",'div'=>false, "tabindex"=>"1","options"=>$festivals));?></span>
			</p>
			<p id="statusDate">
				<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Execution Date</label>
		        <span class="field">
		        	<?php echo $this->Form->input('execution_date',array("id"=>"faDate","data-date-format"=>"dd-mm-yyyy","data-date-viewmode"=>"years", 'error' => false,"type"=>"text","class"=>"input-xlarge","placeholder"=>"YYYY-MM-DD",'label'=>false,'div'=>false, "tabindex"=>"2","readonly"=>"true"));?>
		        	<?php if(!empty($errors["execution_date"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["execution_date"][0];?></span></span>
					<?php } ?>
		        </span>
		    </p>
		    <p id="statusDate">
				<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Payment Date</label>
		        <span class="field">
		        	<?php echo $this->Form->input('payment_date',array("id"=>"paymentDate","data-date-format"=>"dd-mm-yyyy","data-date-viewmode"=>"years", 'error' => false,"type"=>"text","class"=>"input-xlarge","placeholder"=>"YYYY-MM-DD",'label'=>false,'div'=>false, "tabindex"=>"3","readonly"=>"true"));?>
		        	<?php if(!empty($errors["payment_date"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["payment_date"][0];?></span></span>
					<?php } ?>
		        </span>
		    </p>
			<p class="stdformbutton">
				<button class="btn btn-primary">Approve</button>
			</p>
		</div>
	</div>
</div>
<?php echo $this->Form->end();?>
<script type="text/javascript">
	$('#faDate').datepicker();
	$('#paymentDate').datepicker();
	function submitForm(){ 
		$('#fa').submit();
	}
</SCRIPT>