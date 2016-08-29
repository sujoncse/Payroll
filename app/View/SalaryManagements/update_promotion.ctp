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
 echo $this->Form->create('Promotion',array('url'=>array('controller'=>'salaryManagements','action'=>'updatePromotion',$employeeId,$type,$id),"class"=>"stdform stdform2",'id'=>'updatePromotion'));
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
			<p id="employee"><label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Promotion Date</label>
				<span class="field">
					<?php echo $this->Form->input('promotion_date',array("id"=>"promotionDate","type"=>"text",'error' => false,"data-placeholder"=>"Choose an employee...","class"=>"chzn-select","style"=>"width:280px",'label'=>false,'div'=>false,"tabindex"=>"3","data-date-format"=>"dd-mm-yyyy","value"=>date("d-m-Y",$this->data["Promotion"]["promotion_date"]),"readonly"=>"true"));?>
				</span>
			</p>
			<p id="nextGrade"><label><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/>Charged/Promoted Grade</label>
				<span class="field">
					<?php echo $this->Form->input('grade',array("id"=>"gradeId","type"=>"select", "onchange"=>"getDes()",'error' => false,"data-placeholder"=>"Choose a grade","class"=>"chzn-select","style"=>"width:280px",'label'=>false,'div'=>false,"tabindex"=>"8","options"=>$grades,"empty"=>"Select Grade","value"=>$this->data["Employee"]["grade"]));?>
					<?php if(!empty($errors["grade"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["grade"][0];?></span></span>
					<?php } ?>
				</span>
			</p>
			<p id="loadingImage2" style="display:none;"><span class="field"><img src="<?php echo $this->webroot."img/loading.gif";?>" style="width:215px; height:10px;"/></span></p>
			<p id="nextDes"><label><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/>Charged/Promoted Designation</label>
				<span class="field">
					<?php echo $this->Form->input('new_designation_id',array("id"=>"newDesId","type"=>"select",'error' => false,"data-placeholder"=>"Choose a designation","class"=>"chzn-select","style"=>"width:280px",'label'=>false,'div'=>false,"tabindex"=>"9","options"=>$designations,"empty"=>"Select Designation","value"=>$this->data["Employee"]["designation_id"]));?>
					<?php if(!empty($errors["new_designation_id"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["new_designation_id"][0];?></span></span>
					<?php } ?>
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
	$('#promotionDate').datepicker();
	function submitForm(){ 
		$('#updatePromotion').submit();
	}
	function getDes() { 
		grade =document.getElementById("gradeId").value; 
		if(grade){ 
			$('#loadingImage2').show();
			$("#nextDes").show();
			url="<?php echo $this->webroot."admins/getDesignations/"?>"+grade;
			$.ajax({ 
				url: url,
			 	cache: false,
			    success: function(html){
			    	$('#loadingImage2').hide();			    	
			    	$("#nextDes").html(html);
				}
			});
		} else {
			document.getElementById("employee").options[0].selected = true;
			document.getElementById("employee").disabled = true;
			$('#loadingImage2').hide();			
		}
	}
</SCRIPT>