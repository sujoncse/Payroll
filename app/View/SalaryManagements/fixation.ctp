<?php
/**
 * @Developed By	:	Engr. Rajib Mahmud
 * @Start Date	  	:	2nd Sep 2013
 * @Last Update		:	22th Sep 2013
 * @Copyright     	:  	Bangladesh Agricultural Research Council
 * @Link          	:  	http://www.barc.gov.bd
 * */

 $grades = Configure::read("grades");
 $keys = array_keys($grades);
 if($type == 1){
 	$i = 1;
 	foreach($grades as $grade){
 		if($keys[$i-1] < 11)
 			$temp[$i] = $grade;
 		$i++;	
 	}	
 	$grades = $temp;
 }elseif($type == 2){
 	$i = 1;
 	foreach($grades as $grade){
 		if($keys[$i-1] > 7)
 			$temp[$i] = $grade;
 		$i++;	
 	}
 	$grades = $temp;	
 }
 $serviceStatus = Configure::read("serviceStatus");
 $jobStatus = Configure::read("jobStatus");
 $deputationTypes = Configure::read("deputationTypes");
 //pr($serviceStatus); pr($jobStatus);
 echo $this->Html->script(array("admin/jquery.validate.min","admin/underscore","admin/jquery.tagsinput.min","admin/forms"));
 echo $this->Html->css(array("admin/datepicker"));
 echo $this->Form->create('Fixation',array('url'=>array('controller'=>'salaryManagements','action'=>'fixation',$type),"class"=>"stdform stdform2",'id'=>'fixation'));
 echo $this->Form->hidden('id');
?>
<h3 class="widgettitle">Salary Fixition</h3>
<div class="widgetcontent bordered shadowed nopadding">
	<div>
    	<div class="widgetcontent bordered shadowed nopadding">
			<p><label><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/>Designation</label>
				<span class="field">
					<?php echo $this->Form->input('designation_id',array("id"=>"desId","type"=>"select",'error' => false,"data-placeholder"=>"Choose a Country...","class"=>"chzn-select","style"=>"width:280px","onchange"=>"getEmp()",'label'=>false,'div'=>false,"tabindex"=>"1","options"=>$designations,"empty"=>"Select Designation"));?>
					<?php if(!empty($errors["designation_id"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["designation_id"][0];?></span></span>
					<?php } ?>
				</span>
			</p>
				
			<p id="loadingImage" style="display:none;"><span class="field"><img src="<?php echo $this->webroot."img/loading.gif";?>" style="width:215px; height:10px;"/></span></p>
			<p id="employee"><label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Employee</label>
				<span class="field">
					<?php echo $this->Form->input('employee_id',array("id"=>"empId","type"=>"select",'error' => false,"data-placeholder"=>"Choose an employee...","class"=>"chzn-select","style"=>"width:280px",'label'=>false,'div'=>false,"tabindex"=>"2","options"=>NULL,"empty"=>"Select Employee","disabled"=>"true"));?>
					<?php if(!empty($errors["employee_id"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["employee_id"][0];?></span></span>
					<?php } ?>
				</span>
			</p>
			<p><label><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/>Job Status Code</label>
				<span class="field">
					<?php echo $this->Form->input('service_status',array("id"=>"statusCode","type"=>"select","onchange"=>"statusCodeChange()",'error' => false,"data-placeholder"=>"Choose a Country...","class"=>"chzn-select","style"=>"width:280px",'label'=>false,'div'=>false,"tabindex"=>"1","options"=>$serviceStatus));?>
					<?php if(!empty($errors["service_status"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["service_status"][0];?></span></span>
					<?php } ?>
				</span>
			</p>
			
			<p id="loadingImage1" style="display:none;"><span class="field"><img src="<?php echo $this->webroot."img/loading.gif";?>" style="width:215px; height:10px;"/></span></p>
			<p id="status"><label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Job Status</label>
				<span class="field">
					<?php echo $this->Form->input('job_status',array("id"=>"jobStatus","type"=>"select","onchange"=>"jobCodeChange()",'error' => false,"data-placeholder"=>"Choose an employee...","class"=>"chzn-select","style"=>"width:280px",'label'=>false,'div'=>false,"tabindex"=>"2","options"=>$jobStatus,"empty"=>"Select One"));?>
					<?php if(!empty($errors["emp_id"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["emp_id"][0];?></span></span>
					<?php } ?>
				</span>
			</p>
			<p id="statusDate">
				<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Execution Date</label>
		        <span class="field">
		        	<?php echo $this->Form->input('execution_date',array("id"=>"statusChangeDate","data-date-format"=>"dd-mm-yyyy","data-date-viewmode"=>"years", 'error' => false,"type"=>"text","class"=>"input-xlarge","placeholder"=>"YYYY-MM-DD",'label'=>false,'div'=>false, "tabindex"=>"5","readonly"=>"true"));?>
		        	<?php if(!empty($errors["execution_date"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["execution_date"][0];?></span></span>
					<?php } ?>
		        </span>
		    </p>
		    <p id="depType" style="display:none"><label><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/>Deputation Nature</label>
				<span class="field">
					<?php echo $this->Form->input('deputation_type',array("id"=>"deputationType","type"=>"select",'error' => false,"data-placeholder"=>"Choose a designation","class"=>"chzn-select","style"=>"width:280px",'label'=>false,'div'=>false,"tabindex"=>"9","options"=>$deputationTypes,"empty"=>"Select One"));?>
					<?php if(!empty($errors["designation_id"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["designation_id"][0];?></span></span>
					<?php } ?>
				</span>
			</p>
			<p id="cg" style="display:none">
				<label>Type of Contribution</label>
				<span class="field">
		        	<input type="radio" name="Fixation[ctype]" checked="checked" id="contributionType" value="1" style="opacity: 1;" tabindex="11"/> CPF &nbsp; &nbsp;
		            <input type="radio" name="Fixation[ctype]" id="ctype" value = "2" style="opacity: 1;" tabindex="12"/> GPF
		        </span>
			</p>
			<p id="ptz" style="display:none">
				<label>Contribution Percentage</label>
				<span class="field">
					<?php echo $this->Form->input('percentage',array("id"=>"percentage","type"=>"text","class"=>"input-xlarge","data-validation-type"=>"present",'error' => false,"placeholder"=>"Deduction of Contribution",'label'=>false,'div'=>false, "tabindex"=>"13"));?>
					<?php if(!empty($errors["percentage"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["percentage"][0];?></span></span>
					<?php } ?>
				</span>
			</p>
			<p id="ptz2" style="display:none">
				<label>Aditional Contirbution Percentage</label>
				<span class="field">
					<?php echo $this->Form->input('percentage2',array("id"=>"percentage2","type"=>"text","class"=>"input-xlarge","data-validation-type"=>"present",'error' => false,"placeholder"=>"Deduction of Aditional Contribution",'label'=>false,'div'=>false, "tabindex"=>"14"));?>
					<?php if(!empty($errors["percentage2"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["percentage2"][0];?></span></span>
					<?php } ?>
				</span>
			</p>
			<p id="gi" style="display:none">
				<label>Group Insurance</label>
				<span class="field">
					<?php echo $this->Form->input('group_insurance',array("id"=>"group_insurance","type"=>"text","class"=>"input-xlarge","data-validation-type"=>"present",'error' => false,"placeholder"=>"Deduction of Group Insurance",'label'=>false,'div'=>false, "tabindex"=>"14"));?>
					<?php if(!empty($errors["group_insurance"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["group_insurance"][0];?></span></span>
					<?php } ?>
				</span>
			</p>
			<p id="bf" style="display:none">
				<label>Benevolent Fund</label>
				<span class="field">
					<?php echo $this->Form->input('benevolent_fund',array("id"=>"bfund","type"=>"text","class"=>"input-xlarge","data-validation-type"=>"present",'error' => false,"placeholder"=>"Deduction of Benevolent Fund",'label'=>false,'div'=>false, "tabindex"=>"14"));?>
					<?php if(!empty($errors["benevolent_fund"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["benevolent_fund"][0];?></span></span>
					<?php } ?>
				</span>
			</p>
			<p id="hrd" style="display:none">
				<label>House Rent Deduction</label>
				<span class="field">
					<?php echo $this->Form->input('house_rent_deduct',array("id"=>"hrd1","type"=>"text","class"=>"input-xlarge","data-validation-type"=>"present",'error' => false,"placeholder"=>"Deduction of House Rent",'label'=>false,'div'=>false, "tabindex"=>"14"));?>
					<?php if(!empty($errors["house_rent_deduct"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["house_rent_deduct"][0];?></span></span>
					<?php } ?>
				</span>
			</p>
			<p id="org" style="display:none">
				<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Organization/Institute/University Name</label>
		        <span class="field">
		        	<?php echo $this->Form->input('organization',array("id"=>"organization",'error' => false,"type"=>"text","class"=>"input-xlarge","placeholder"=>"Name",'label'=>false,'div'=>false, "tabindex"=>"5"));?>
		        	<?php if(!empty($errors["organization"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["organization"][0];?></span></span>
					<?php } ?>
		        </span>
		    </p>
		   	<p id="active" style="display:none">
				<label>Active</label>
				<span class="field">
			    	<input type="checkbox" name="activeStatus" id="activeStatus" style="opacity: 1;" tabindex="3" value="1"/> Yes &nbsp; &nbsp;
			    </span>
			</p>
			<p id="pi" style="display:none">
				<label>Performance Increment</label>
				<span class="field">
			    	<input type="checkbox" name="inc" id="inc" onclick="incNum()" style="opacity: 1;" tabindex="3" value="1"/> Yes &nbsp; &nbsp;
			    </span>
			</p>
			<p id="incNum" style="display:none">
				<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Increment Number</label>
		        <span class="field">
		        	<?php echo $this->Form->input('num',array("id"=>"num",'error' => false,"type"=>"text","class"=>"input-xlarge","placeholder"=>"01",'label'=>false,'div'=>false, "tabindex"=>"5"));?>
		        	<?php if(!empty($errors["num"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["num"][0];?></span></span>
					<?php } ?>
		        </span>
		    </p>
		    <p id="nextGrade" style="display:none"><label><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/>Charged/Promoted Grade</label>
				<span class="field">
					<?php echo $this->Form->input('grade',array("id"=>"gradeId","type"=>"select", "onchange"=>"getDes()",'error' => false,"data-placeholder"=>"Choose a grade","class"=>"chzn-select","style"=>"width:280px",'label'=>false,'div'=>false,"tabindex"=>"8","options"=>$grades,"empty"=>"Select Grade"));?>
					<?php if(!empty($errors["grade"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["grade"][0];?></span></span>
					<?php } ?>
				</span>
			</p>
			<p id="loadingImage2" style="display:none;"><span class="field"><img src="<?php echo $this->webroot."img/loading.gif";?>" style="width:215px; height:10px;"/></span></p>
			<p id="nextDes" style="display:none"><label><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/>Charged/Promoted Designation</label>
				<span class="field">
					<?php echo $this->Form->input('new_designation_id',array("id"=>"newDesId","type"=>"select",'error' => false,"data-placeholder"=>"Choose a designation","class"=>"chzn-select","style"=>"width:280px",'label'=>false,'div'=>false,"tabindex"=>"9","options"=>$designations,"empty"=>"Select Designation"));?>
					<?php if(!empty($errors["designation_id"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["designation_id"][0];?></span></span>
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
	function incNum(){
		if( $("#inc").attr("checked")=="checked"){
			$('#incNum').slideDown();
			$('#num').val(1);
		}else{
			$('#incNum').slideUp();
		}
	}
	
	function getEmp() { 
		des =document.getElementById("desId").value; 
		if(des){ 
			$('#loadingImage').show();
			$("#employee").show();
			url="<?php echo $this->webroot."admins/getChangedEmployees/"?>"+des;
			$.ajax({ 
				url: url,
			 	cache: false,
			    success: function(html){
			    	$('#loadingImage').hide();			    	
			    	$("#employee").html(html);
				}
			});
		} else {
			document.getElementById("employee").options[0].selected = true;
			document.getElementById("employee").disabled = true;
			$('#loadingImage').hide();			
		}
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
	
	$('#statusChangeDate').datepicker();
	
	function statusCodeChange(){
		code =$('#statusCode').val();
		if(code != 0){
			if(code == 2){
				$('#org').slideDown();
				$("#depType").slideDown();
				$('#loadingImage1').show();
				$("#status").slideDown(); 
				$("#cg").slideDown();
				$("#ptz").slideDown();
				$("#ptz2").slideDown();
				$("#gi").slideDown();
				$("#bf").slideDown();
				$("#hrd").slideDown();
				$("#nextGrade").slideDown();
			}else{
				if(code == 4){
					$('#org').slideDown();
					$('#loadingImage1').show();
					$("#status").slideDown();
				}else{
					$('#org').slideUp();
					if(code == 5){
						$('#status').slideUp();
						$('#loadingImage1').hide();	
						$("#statusDate").slideDown();
					}else{
						if(code == 6){
							$('#loadingImage1').hide();
							$("#status").slideUp();
							$("#statusDate").slideDown();
						}else{
							if(code == 3){
								$("#statusDate").slideDown();		
							}else{
								$('#loadingImage1').show();
								$("#status").slideDown();
								$("#statusDate").slideUp();
							}	
						}
					}
				}
				$("#depType").slideUp();
				$("#cg").slideUp();
				$("#ptz").slideUp(); 
				$("#ptz2").slideUp();
				$("#gi").slideUp();
				$("#bf").slideUp();
				$("#hrd").slideUp();
			}
			if(code == 2)
				$('#active').slideDown();
			else
				$('#active').slideUp();
			url="<?php echo $this->webroot."admins/jobStatus/"?>"+code;
			$.ajax({ 
				url: url,
			 	cache: false,
			    success: function(html){
			    	$('#loadingImage1').hide();			    	
			    	$("#status").html(html);
				}
			});
		} else {
			$("#depType").slideUp();
			$("#status").slideUp();
			$("#statusDate").slideDown();
			document.getElementById("jobStatus").options[0].selected = true;
			document.getElementById("jobStatus").disabled = true;
			$('#loadingImage1').hide();			
		}
	}
	
	function jobCodeChange(){
		job = $('#jobStatus').val();
		if(job == 1){
			$('#active').slideUp();
			$('#nextGrade').slideDown();
			$('#pi').slideUp();
			$('#incNum').slideUp();
		}else{
			if(job == 2){
				$('#active').slideUp();
				$('#pi').slideDown();
				$('#nextGrade').slideUp();
				$('#nextDes').slideUp();
			}else{
				if(job == 3){
					$('#active').slideDown();
					$('#nextGrade').slideDown();
					$('#pi').slideUp();	
					$('#incNum').slideUp();
				}else{
					if(job == 4){
						$('#active').slideDown();
						$('#nextDes').slideUp();
						$('#nextGrade').slideDown();
						$('#pi').slideUp();
						$('#incNum').slideUp();
					}else{
						if(job == 5){
							$('#active').slideUp();
							$('#nextGrade').slideUp();
							$('#nextDes').slideUp();
							$('#pi').slideUp();
							$('#incNum').slideUp();
						}else{
							if(job == 6){
								$('#active').slideUp();
								$('#nextGrade').slideUp();
								$('#nextDes').slideUp();
								$('#pi').slideUp();
								$('#incNum').slideUp();
							}else{
								$('#active').slideUp();
								$('#nextGrade').slideUp();
								$('#nextDes').slideUp();
								$('#pi').slideUp();
								$('#incNum').slideUp();
							}	
						}	
					}
				}
			}
		}
	}
	function submitForm(){ 
		$('#fixation').submit();
	}
</SCRIPT>