<?php
/**
 * @Developed By	:	BARC
 * @Start Date	  	:	2nd Sep 2013
 * @Last Update		:	10th Sep 2013
 * @Copyright     	:  	Bangladesh Agricultural Research Council
 * @Link          	:  	http://www.barc.gov.bd
 * */
 	echo $this->Form->create('closeMonth',array('url'=>array('controller'=>'salaryManagements','action'=>'closeMonth'),"class"=>"stdform stdform2",'id'=>'closeMonths'));
   	echo $this->Form->hidden('id');
   	echo $this->Html->css(array("admin/datepicker"));
?>
<h4 class="widgettitle">Close current month <?php echo date('F, Y', $currentTime); ?></h4>
<div class="widgetcontent bordered shadowed nopadding">
	<p style="padding:15px;color:red;font-size: 17px;line-height: 2;">Make sure you did all the fixation needed, generate monthly salary and get all the reports you needed before close the month. Once you close the month you'll not be able to change the salary later for the closed month.</p>
    <p class="stdformbutton"><button class="btn btn-primary">Close Month</button></p>
</div>
<?php echo $this->Form->end();?>
<script>
	function submitForm(){ 
		$('#closeMonths').submit();
	}
</SCRIPT>