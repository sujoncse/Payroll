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
 echo $this->Form->create('Increment',array('url'=>array('controller'=>'salaryManagements','action'=>'updateIncrement',$employeeId,$type,$id),"class"=>"stdform stdform2",'id'=>'updateIncrement'));
 echo $this->Form->hidden('id');
 if(!empty($this->data["Employee"]["middle_name"]))
 	$name = $this->data["Employee"]["first_name"]." ".$this->data["Employee"]["middle_name"]." ".$this->data["Employee"]["last_name"];
 else
 	$name = $this->data["Employee"]["first_name"]." ".$this->data["Employee"]["last_name"];
?>
<h3 class="widgettitle">Charge Release</h3>
<div class="widgetcontent bordered shadowed nopadding">
	<div>
    	<div class="widgetcontent bordered shadowed nopadding">
			<p><label><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/>Designation</label>
				<span class="field">
					<?php echo $this->Form->input('designation_id',array("id"=>"desId","type"=>"text",'error' => false,"data-placeholder"=>"Choose a Country...","class"=>"chzn-select","style"=>"width:280px","onchange"=>"getEmp()",'label'=>false,'div'=>false,"tabindex"=>"1","value"=>$designations[$this->data["Employee"]["designation_id"]],"readonly"=>"true"));?>
				</span>
			</p>
			
			<p id="employee"><label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Employee</label>
				<span class="field">
					<?php echo $this->Form->input('employee_id',array("id"=>"empId","type"=>"text",'error' => false,"data-placeholder"=>"Choose an employee...","class"=>"chzn-select","style"=>"width:280px",'label'=>false,'div'=>false,"tabindex"=>"2","value"=>$name,"readonly"=>"true"));?>
				</span>
			</p>
			<p id="employee"><label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Increment Date</label>
				<span class="field">
					<?php echo $this->Form->input('increment_date',array("id"=>"incrementDate","type"=>"text",'error' => false,"data-placeholder"=>"Choose an employee...","class"=>"chzn-select","style"=>"width:280px",'label'=>false,'div'=>false,"tabindex"=>"3","data-date-format"=>"dd-mm-yyyy","value"=>date("d-m-Y",$this->data["Increment"]["increment_date"]),"readonly"=>"true"));?>
				</span>
			</p>
			<p class="stdformbutton">
				<button class="btn btn-primary">Update</button>
			</p>
		</div>
	</div>
</div>
<?php echo $this->Form->end();?>
<script type="text/javascript">
	$('#incrementDate').datepicker();
	
	function submitForm(){ 
		$('#updateIncrement').submit();
	}
</SCRIPT>