<?php
/**
 * @Developed By	:	Engr. Rajib Mahmud
 * @Start Date	  	:	2nd Sep 2013
 * @Last Update		:	22th Sep 2013
 * @Copyright     	:  	Bangladesh Agricultural Research Council
 * @Link          	:  	http://www.barc.gov.bd
 * */

 $grades = Configure::read("grades");
 $serviceStatus = Configure::read("serviceStatus");
 $jobStatus = Configure::read("jobStatus");
 echo $this->Html->script(array("admin/jquery.validate.min","admin/underscore","admin/jquery.tagsinput.min","admin/forms"));
 echo $this->Html->css(array("admin/datepicker"));
 echo $this->Form->create('Fixation',array('url'=>array('controller'=>'salaryManagements','action'=>'deputationRelease',$id),"class"=>"stdform stdform2",'id'=>'deputationRelease'));
 echo $this->Form->hidden('id');
 if(!empty($this->data["Employee"]["middle_name"]))
 	$name = $this->data["Employee"]["first_name"]." ".$this->data["Employee"]["middle_name"]." ".$this->data["Employee"]["last_name"];
 else
 	$name = $this->data["Employee"]["first_name"]." ".$this->data["Employee"]["last_name"];
?>
<h3 class="widgettitle">Deputation Release</h3>
<div class="widgetcontent bordered shadowed nopadding">
	<div>
    	<div class="widgetcontent bordered shadowed nopadding">
			<p><label><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/>Designation</label>
				<span class="field">
					<?php echo $this->Form->input('designation_id',array("id"=>"desId","type"=>"text",'error' => false,"data-placeholder"=>"Choose one...","class"=>"chzn-select","style"=>"width:280px","onchange"=>"getEmp()",'label'=>false,'div'=>false,"tabindex"=>"1","value"=>$designations[$this->data["Deputation"]["deputate_designation"]],"readonly"=>"true"));?>
				</span>
			</p>
			
			<p id="employee"><label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Employee</label>
				<span class="field">
					<?php echo $this->Form->input('employee_id',array("id"=>"empId","type"=>"text",'error' => false,"data-placeholder"=>"Choose an employee...","class"=>"chzn-select","style"=>"width:280px",'label'=>false,'div'=>false,"tabindex"=>"2","value"=>$name,"readonly"=>"true"));?>
				</span>
			</p>
			<p id="employee"><label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Taken</label>
				<span class="field">
					<?php echo $this->Form->input('taken',array("id"=>"taken","type"=>"text",'error' => false,"data-placeholder"=>"Choose an employee...","class"=>"chzn-select","style"=>"width:280px",'label'=>false,'div'=>false,"tabindex"=>"3","value"=>date("j'S M, Y",$this->data["Deputation"]["taken"]),"readonly"=>"true"));?>
				</span>
			</p>
			<p id="statusDate">
				<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Release Date</label>
		        <span class="field">
		        	<?php echo $this->Form->input('execution_date',array("id"=>"statusChangeDate","data-date-format"=>"dd-mm-yyyy","data-date-viewmode"=>"years", 'error' => false,"type"=>"text","class"=>"input-xlarge","placeholder"=>"YYYY-MM-DD",'label'=>false,'div'=>false, "tabindex"=>"4","readonly"=>"true"));?>
		        	<?php if(!empty($errors["execution_date"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["execution_date"][0];?></span></span>
					<?php } ?>
		        </span>
		    </p>
		   	<p class="stdformbutton">
				<button class="btn btn-primary">Released</button>
			</p>
		</div>
	</div>
</div>
<?php echo $this->Form->end();?>
<script type="text/javascript">
	$('#statusChangeDate').datepicker();
	
	function submitForm(){ 
		$('#deputationRelease').submit();
	}
</SCRIPT>