<?php
/**
 * @Developed By	:	BARC
 * @Start Date	  	:	2nd Sep 2013
 * @Last Update		:	10th Sep 2013
 * @Copyright     	:  	Bangladesh Agricultural Research Council
 * @Link          	:  	http://www.barc.gov.bd
 * */
 	echo $this->Form->create('commonSetting',array('url'=>array('controller'=>'settings','action'=>'commonSetting'),"class"=>"stdform stdform2",'id'=>'commonSettings'));
   	echo $this->Form->hidden('id');
   	echo $this->Html->css(array("admin/datepicker"));
?>
<h4 class="widgettitle">Common Application Settings</h4>
<div class="widgetcontent bordered shadowed nopadding">
	<p>
		<label>Medical Allowance</label>
        <span class="field"><?php echo $this->Form->input('medical',array("id"=>"medical","type"=>"text","class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"31"));?></span>
    </p>
    <p id="add_hr">
    	<label>One Children Allowance</label>
        <span class="field"><?php echo $this->Form->input('onechild',array("id"=>"onechild","type"=>"text","class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"31"));?></span>
    </p>
    <p>
    	<label>Two Children Allowance</label>
        <span class="field"><?php echo $this->Form->input('twochild',array("id"=>"twochild","type"=>"text","class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"31"));?></span>
    </p>
	<p>
    	<label>Group Insurance</label>
        <span class="field"><?php echo $this->Form->input('group_insurance',array("id"=>"group_insurance","type"=>"text","class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"31"));?></span>
    </p>
	<p>
    	<label>Benevolent Fund</label>
        <span class="field"><?php echo $this->Form->input('benevolent',array("id"=>"benevolent","type"=>"text","class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"31"));?></span>
    </p>
	<p>
    	<label>Association Subscription</label>
        <span class="field"><?php echo $this->Form->input('association_suscription',array("id"=>"association_suscription","type"=>"text","class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"31"));?></span>
    </p>
	<p>
    	<label>Tiffin Allowance</label>
        <span class="field"><?php echo $this->Form->input('tiffin',array("id"=>"tiffin","type"=>"text","class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"31"));?></span>
    </p>
	<p>
    	<label>Conveyance Allowance</label>
        <span class="field"><?php echo $this->Form->input('conveyance',array("id"=>"conveyance","type"=>"text","class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"31"));?></span>
    </p>
	
	<p>
    	<label>One day salary for staff</label>
        <span class="field"><?php echo $this->Form->input('one_day_salary',array("id"=>"one_day_salary","type"=>"text","class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"31"));?>  (Give the number of days of the month) </span>
    </p>
	
	<p>
		<label>Officer's salary date</label>
		<span class="field"><?php echo $this->Form->input('officer_salary_date',array("id"=>"officer_salary_date","type"=>"text","class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"31"));?></span>
	</p>
	
	<p>
		<label>Staff's salary date</label>
		<span class="field"><?php echo $this->Form->input('staff_salary_date',array("id"=>"staff_salary_date","type"=>"text","class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"31"));?></span>
	</p>
	
	<p>
		<label>Festival's salary date</label>
		<span class="field"><?php echo $this->Form->input('festival_salary_date',array("id"=>"festival_salary_date","type"=>"text","class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"31"));?></span>
	</p>
	
	<p>
		<label>Officer's Bank Advise File No</label>
		<span class="field"><?php echo $this->Form->input('officer_file_no',array("id"=>"officer_file_no","type"=>"text","class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"31"));?></span>
	</p>
	
	<p>
		<label>Staff's Bank Advise File No</label>
		<span class="field"><?php echo $this->Form->input('staff_file_no',array("id"=>"staff_file_no","type"=>"text","class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"31"));?></span>
	</p>
	
	<p>
		<label>Festival's Bank Advise File No</label>
		<span class="field"><?php echo $this->Form->input('festival_file_no',array("id"=>"festival_file_no","type"=>"text","class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"31"));?></span>
	</p>
	
	<p>
		<label>Officer's Bank Advise Date</label>
		<span class="field"><?php echo $this->Form->input('officer_bank_date',array("id"=>"officer_bank_date","type"=>"text","class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"31"));?></span>
	</p>
	
	<p>
		<label>Staff's Bank Advise Date</label>
		<span class="field"><?php echo $this->Form->input('staff_bank_date',array("id"=>"staff_bank_date","type"=>"text","class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"31"));?></span>
	</p>
	
	<p>
		<label>Festival's Bank Advise Date</label>
		<span class="field"><?php echo $this->Form->input('festival_bank_date',array("id"=>"festival_bank_date","type"=>"text","class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"31"));?></span>
	</p>
    
    <p class="stdformbutton"><button class="btn btn-primary">Save</button></p>
</div>
<?php echo $this->Form->end();?>
<script>
	function submitForm(){ 
		$('#commonSettings').submit();
	}
</script>