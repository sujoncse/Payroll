<?php
/**
 * @Developed By	:	Engr. Rajib Mahmud
 * @Start Date	  	:	2nd Sep 2013
 * @Last Update		:	10th Sep 2013
 * @Copyright     	:  	Bangladesh Agricultural Research Council
 * @Link          	:  	http://www.barc.gov.bd
 * */
 $serviceStatus = Configure::read("serviceStatus");
 $quotaStatus = Configure::read("quota");
 $bloodGroup = Configure::read("bloodGroup");
 $religion = Configure::read("religion");
 $spouseProfession = Configure::read("spouseProfession");
 echo $this->Html->css(array("admin/datepicker"));
 echo $this->Form->create('Employee',array('url'=>array('controller'=>'employeeManagements','action'=>'addEmployee',$type),"class"=>"stdform stdform2",'id'=>'add'));
 echo $this->Form->hidden('id');
?>
<?php $msg = $this->Session->read("Message");  if(!empty($msg["flash"]["message"])){ ?>
<div class="alert <?php echo $msg["flash"]["params"]["class"];?>">
	<button data-dismiss="alert" class="close" type="button">×</button>
  	<strong><?php echo $msg["flash"]["message"]["0"];?></strong> <?php echo $msg["flash"]["message"]["1"];?>
</div>
<?php } ?>
<h2 class="widgettitle">Employee Information Section</h2>
<div>
	<div id="basic">
		<h4 class="widgettitle">Basic Information</h4>
		<div class="widgetcontent bordered shadowed nopadding">
			<p>
				<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Employee ID</label>
		        <span class="field">
		        	<?php echo $this->Form->input('employee_code',array("id"=>"employeeCode", 'error' => false,"type"=>"text","class"=>"input-xlarge","placeholder"=>"Employee ID",'label'=>false,'div'=>false, "tabindex"=>"1"));?>
		        	<?php if(!empty($errors["employee_code"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["employee_code"][0];?></span></span>
					<?php } ?>
		        </span>
		    </p>
		    <p>
				<label>Type</label>
				<span class="field">
		        	<input type="radio" name="Employee[type]" id="type" value="1" style="opacity: 1;" tabindex="17"/> Officer &nbsp; &nbsp;
		            <input type="radio" name="Employee[type]" id="type" value = "2" style="opacity: 1;" tabindex="18"/> Staff
		        </span>
			</p>
		    <p>
				<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Employee Name</label>
		        <span class="field">
		        	<?php echo $this->Form->input('first_name',array("id"=>"firstName", 'error' => false,"type"=>"text","class"=>"input-xlarge","placeholder"=>"First Name",'label'=>false,'div'=>false, "tabindex"=>"2"));?>
		        	<?php if(!empty($errors["first_name"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["first_name"][0];?></span></span>
					<?php } ?>
		        </span>
		        <span class="field">
		        	<?php echo $this->Form->input('middle_name',array("id"=>"middleName", 'error' => false,"type"=>"text","class"=>"input-xlarge","placeholder"=>"Middle Name",'label'=>false,'div'=>false, "tabindex"=>"3"));?>
		        </span>
		        <span class="field">
		        	<?php echo $this->Form->input('last_name',array("id"=>"lastName", 'error' => false,"type"=>"text","class"=>"input-xlarge","placeholder"=>"Last Name",'label'=>false,'div'=>false, "tabindex"=>"4"));?>
		        	<?php if(!empty($errors["last_name"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["last_name"][0];?></span></span>
					<?php } ?>
		        </span>
		    </p>
		    <!--<p>
				<label>Joining Date</label>
		        <span class="field">
		        	<?php echo $this->Form->input('joining_date',array("id"=>"joiningDate","data-date-format"=>"dd-mm-yyyy","data-date-viewmode"=>"years", 'error' => false,"type"=>"text","class"=>"input-xlarge","placeholder"=>"YYYY-MM-DD",'label'=>false,'div'=>false, "tabindex"=>"5","readonly"=>"true"));?>
		        	<?php if(!empty($errors["joining_date"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["joining_date"][0];?></span></span>
					<?php } ?>
		        </span>
		    </p>
		    <p><label>Joining Grade</label>
				<span class="field">
					<?php echo $this->Form->input('joining_grade',array("id"=>"jgradeId","type"=>"select",'error' => false,"data-placeholder"=>"Choose a grade","class"=>"chzn-select","style"=>"width:280px",'label'=>false,'div'=>false,"tabindex"=>"6","size"=>"6","options"=>$grades,"empty"=>"Select Joining Grade"));?>
					<?php if(!empty($errors["joining_grade"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["joining_grade"][0];?></span></span>
					<?php } ?>
				</span>
			</p>
			<p><label>Joining Designation</label>
				<span class="field">
					<?php echo $this->Form->input('joining_designation',array("id"=>"jdesId","type"=>"select",'error' => false,"data-placeholder"=>"Choose a designation","class"=>"chzn-select","style"=>"width:280px","size"=>"5",'label'=>false,'div'=>false,"tabindex"=>"7","options"=>$designations,"empty"=>"Select Joining Designation"));?>
					<?php if(!empty($errors["joining_designation"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["joining_designation"][0];?></span></span>
					<?php } ?>
				</span>
			</p>-->
			<p><label><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/>Current Grade</label>
				<span class="field">
					<?php echo $this->Form->input('grade',array("id"=>"gradeId","type"=>"select",'error' => false,"data-placeholder"=>"Choose a grade","class"=>"chzn-select","style"=>"width:280px",'label'=>false,'div'=>false,"tabindex"=>"8","size"=>"5","options"=>$grades,"empty"=>"Select Grade"));?>
					<?php if(!empty($errors["grade"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["grade"][0];?></span></span>
					<?php } ?>
				</span>
			</p>
			<p><label><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/>Current Designation</label>
				<span class="field">
					<?php echo $this->Form->input('designation_id',array("id"=>"desId","type"=>"select",'error' => false,"data-placeholder"=>"Choose a designation","class"=>"chzn-select","style"=>"width:280px","size"=>"5",'label'=>false,'div'=>false,"tabindex"=>"9","options"=>$designations,"empty"=>"Select Designation"));?>
					<?php if(!empty($errors["designation_id"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["designation_id"][0];?></span></span>
					<?php } ?>
				</span>
			</p>
			
			<p>
				<label>Service Status</label>
				<span class="field">
					<?php echo $this->Form->input('status',array("id"=>"status","type"=>"select",'label'=>false,'div'=>false,"class"=>"chzn-select",'error' => false,"style"=>"width:280px", "tabindex"=>"10","options"=>$serviceStatus));?>
				</span>
			</p>
			
			<p><label>Quota Status</label>
				<span class="field">
					<?php echo $this->Form->input('quota_status',array("id"=>"quota","type"=>"select",'error' => false,"class"=>"chzn-select","style"=>"width:280px","onchange"=>"getQuota()",'label'=>false,'div'=>false,"tabindex"=>"14","options"=>$quotaStatus,"empty"=>"Select Quota"));?>
				</span>
			</p>
			<p id="oq" style="display:none">	
				<label>Other Quota Status</label>
		        <span class="field">
		        	<?php echo $this->Form->input('other_quota_status',array("id"=>"otherQuota", 'error' => false,"type"=>"text","class"=>"input-xlarge","placeholder"=>"Other Quota Status",'label'=>false,'div'=>false, "tabindex"=>"15"));?>
		        	<?php if(!empty($errors["other_quota_status"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["other_quota_status"][0];?></span></span>
					<?php } ?>
		        </span>
		    </p>
			<p class="stdformbutton">
				<a onClick="$('#basic').slideUp('slow'); $('#personal').show();" class="btn btn-primary">Next</a>
				<a onClick="$('#basic').slideUp('slow'); $('#salary').show();" class="btn btn-primary">Last</a>
				<button type="reset" class="btn">Reset Form</button>
			</p>
		</div>
	</div>
	<div id="personal" style="display:none">
		<h4 class="widgettitle">Personal information</h4>
		<div class="widgetcontent bordered shadowed nopadding">
			<p>
				<label>National ID</label>
				<span class="field">
					<?php echo $this->Form->input('EmployeePersonal.nid',array("id"=>"nid","type"=>"text","class"=>"input-xlarge","data-validation-type"=>"present",'error' => false,"placeholder"=>"National ID",'label'=>false,'div'=>false, "tabindex"=>"16"));?>
					<?php if(!empty($errors["nid"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["nid"][0];?></span></span>
					<?php } ?>
				</span>
			</p>
			<p>
				<label>Gender</label>
				<span class="field">
		        	<input type="radio" name="EmployeePersonal[gender]" checked="checked" id="gender" value="1" style="opacity: 1;" tabindex="17"/> Male &nbsp; &nbsp;
		            <input type="radio" name="EmployeePersonal[gender]" id="gender" value = "2" style="opacity: 1;" tabindex="18"/> Female
		        </span>
			</p>
			<p>
				<label>Marital Status</label>
				<span class="field">
					<input type="radio" name="EmployeePersonal[marital_status]" id="marital_status" checked="checked" onclick="married()" value = "1" tabindex="19"/>
					Married
					<input type="radio" name="EmployeePersonal[marital_status]" id="marital_status" onclick="married()" value = "0" tabindex="20"/>
					Unmarried
				</span>
			</p>
			<p>
				<label># of chieldren going to school</label>
				<span class="field">
					<input type="radio" name="EmployeePersonal[children]" id="children" checked="checked" value="1" tabindex="21"/>
					One (01)
					<input type="radio" name="EmployeePersonal[children]" id="children" value = "2" tabindex="22"/>
					More then One (> 01)
					<input type="radio" name="EmployeePersonal[children]" id="children" value="0" tabindex="23"/>
					None
				</span>
			</p>
			<p>
				<label>Present Address</label>
				<span class="field">
					<?php echo $this->Form->input('EmployeePersonal.present_address',array("id"=>"present_address",'error' => false,"class"=>"input-xlarge","type"=>"textarea","data-validation-type"=>"present",'label'=>false,'div'=>false, "tabindex"=>"24"));?>
					<?php if(!empty($errors["present_address"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["present_address"][0];?></span></span>
					<?php } ?>
				</span>
			</p>
			<p>
				<label>Permanent Address</label>
				<span class="field">
					<?php echo $this->Form->input('EmployeePersonal.permanent_address',array("id"=>"permanent_address",'error' => false,"class"=>"input-xlarge","type"=>"textarea","data-validation-type"=>"present",'label'=>false,'div'=>false, "tabindex"=>"25"));?>
					<?php if(!empty($errors["permanent_address"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["permanent_address"][0];?></span></span>
					<?php } ?>
				</span>
			</p>
			<p>
				<label>Cell Number</label>
				<span class="field">
					<?php echo $this->Form->input('EmployeePersonal.cell',array("id"=>"cell","type"=>"text",'error' => false,"class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"26"));?>
					<?php if(!empty($errors["cell"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["cell"][0];?></span></span>
					<?php } ?>
				</span>
			</p>
			<p>
				<label>Alternative Number</label>
				<span class="field"><?php echo $this->Form->input('EmployeePersonal.other_number',array("id"=>"other_number",'error' => false,"type"=>"text","class"=>"input-xlarge","data-validation-type"=>"present",'label'=>false,'div'=>false, "tabindex"=>"27"));?></span>
			</p>
			<p>
				<label>Email</label>
				<span class="field"><?php echo $this->Form->input('EmployeePersonal.email',array("id"=>"email","type"=>"text",'error' => false,"class"=>"input-xlarge","data-validation-type"=>"present",'label'=>false,'div'=>false, "tabindex"=>"28"));?></span>
			</p>
			<p>
				<label>Father's Name</label>
				<span class="field">
					<?php echo $this->Form->input('EmployeePersonal.f_name',array("id"=>"f_name","type"=>"text",'error' => false,"class"=>"input-xlarge","data-validation-type"=>"present",'label'=>false,'div'=>false, "tabindex"=>"29"));?>
					<?php if(!empty($errors["f_name"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["f_name"][0];?></span></span>
					<?php } ?>
				</span>
			</p>
			<p>
				<label>Mother's Name</label>
				<span class="field">
					<?php echo $this->Form->input('EmployeePersonal.m_name',array("id"=>"m_name","type"=>"text",'error' => false,"class"=>"input-xlarge","data-validation-type"=>"present",'label'=>false,'div'=>false, "tabindex"=>"30"));?>
					<?php if(!empty($errors["m_name"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["m_name"][0];?></span></span>
					<?php } ?>
				</span>
			</p>
			<p id="sn">
				<label>Spouse's Name</label>
				<span class="field"><?php echo $this->Form->input('EmployeePersonal.s_name',array("id"=>"s_name",'error' => false,"type"=>"text","class"=>"input-xlarge","data-validation-type"=>"present",'label'=>false,'div'=>false, "tabindex"=>"31"));?></span>
			</p>
			<p id="sp">
				<label>Spouse's Profession</label>
				<span class="field"><?php echo $this->Form->input('EmployeePersonal.s_profession',array("type"=>"select",'error' => false,'label'=>false,"class"=>"chzn-select","style"=>"width:280px",'div'=>false, "tabindex"=>"32","options"=>$spouseProfession,"empty"=>"Select Profession"));?></span>
			</p>
			<p>
				<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Bank</label>
				<span class="field">
					<?php echo $this->Form->input('EmployeePersonal.bank',array("id"=>"bank","type"=>"text",'error' => false,"class"=>"input-xlarge","data-validation-type"=>"present",'label'=>false,'div'=>false, "tabindex"=>"33","value"=>"Agrani Bank Ltd."));?>
					<?php if(!empty($errors["bank"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["bank"][0];?></span></span>
					<?php } ?>
				</span>
			</p>
			<p>
				<label>A/C Number</label>
				<span class="field">
					<?php echo $this->Form->input('EmployeePersonal.account',array("id"=>"account","type"=>"text",'error' => false,"class"=>"input-xlarge","data-validation-type"=>"present",'label'=>false,'div'=>false, "tabindex"=>"34"));?>
					<?php if(!empty($errors["account"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["account"][0];?></span></span>
					<?php } ?>
				</span>
			</p>
			<p>
				<label>ETIN</label>
				<span class="field">
					<?php echo $this->Form->input('EmployeePersonal.etin',array("id"=>"etin","type"=>"text","class"=>"input-xlarge","data-validation-type"=>"present",'error' => false,"placeholder"=>"E TIN",'label'=>false,'div'=>false, "tabindex"=>"16"));?>
					<?php if(!empty($errors["etin"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["etin"][0];?></span></span>
					<?php } ?>
				</span>
			</p>
			<p>
				<label>Blood Group</label>
				<span class="field"><?php echo $this->Form->input('EmployeePersonal.blood_group',array("type"=>"select",'error' => false,'label'=>false,"class"=>"chzn-select","style"=>"width:280px",'div'=>false, "tabindex"=>"35","options"=>$bloodGroup,"empty"=>"Select One"));?></span>
			</p>
			
			<p>
				<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Religion</label>
				<span class="field"><?php echo $this->Form->input('EmployeePersonal.religion',array("id"=>"relegion","type"=>"select",'error' => false,'label'=>false,"onchange"=>"getRelegion()","class"=>"chzn-select","style"=>"width:280px",'div'=>false, "tabindex"=>"36","options"=>$religion));?></span>
			</p>
			<p id="or" style="display:none">	
				<label>Other Relegion Status</label>
		        <span class="field">
		        	<?php echo $this->Form->input('EmployeePersonal.other_religion_status',array("id"=>"otherRelegion", 'error' => false,"type"=>"text","class"=>"input-xlarge","placeholder"=>"Other Relegion Status",'label'=>false,'div'=>false, "tabindex"=>"37"));?>
		        	<?php if(!empty($errors["other_relegion_status"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["other_relegion_status"][0];?></span></span>
					<?php } ?>
		        </span>
		    </p>
			<!--<p>
				<label>Date of Birth</label>
		        <span class="field">
		        	<?php echo $this->Form->input('EmployeePersonal.dob',array("id"=>"dob","data-date-format"=>"dd-mm-yyyy","data-date-viewmode"=>"years", 'error' => false,"type"=>"text","class"=>"input-xlarge","placeholder"=>"YYYY-MM-DD",'label'=>false,'div'=>false, "tabindex"=>"38","readonly"=>"true"));?>
		        	<?php if(!empty($errors["dob"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["dob"][0];?></span></span>
					<?php } ?>
		        </span>
		    </p>-->
			<p class="stdformbutton">
				<a onClick="$('#basic').slideDown('slow'); $('#personal').hide();" class="btn btn-primary">Prev</a>
				<a onClick="$('#personal').slideUp('slow'); $('#salary').show();" class="btn btn-primary">Next</a>
				<button type="reset" class="btn">Reset Form</button>
			</p>
		</div>
	</div>
	<div id="salary" style="display:none">
		<h4 class="widgettitle">Salary Information</h4>
		<div class="widgetcontent bordered shadowed nopadding">
			<p>
				<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Basic Salary</label>
				<span class="field">
					<?php echo $this->Form->input('basic',array("id"=>"basic","type"=>"text",'error' => false,"class"=>"input-xlarge","data-validation-type"=>"present",'label'=>false,'div'=>false, "tabindex"=>"39"));?>
					<?php if(!empty($errors["present_address"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["present_address"][0];?></span></span>
					<?php } ?>
				</span>
			</p>
			<p>
				<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span># of Increment in current grade</label>
				<span class="field">
					<?php echo $this->Form->input('increment_number',array("id"=>"increment_number","type"=>"text",'error' => false,"class"=>"input-xlarge","data-validation-type"=>"present",'label'=>false,'div'=>false, "tabindex"=>"40","readonly"=>true));?>
					<?php if(!empty($errors["increment_number"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["increment_number"][0];?></span></span>
					<?php } ?>
				</span>
			</p>
			<p>
				<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span># of Time Scale in current designation</label>
				<span class="field">
					<?php echo $this->Form->input('time_scale',array("id"=>"time_scale","type"=>"text",'error' => false,"class"=>"input-xlarge","data-validation-type"=>"present",'label'=>false,'div'=>false, "tabindex"=>"41"));?>
					<?php if(!empty($errors["time_scale"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["time_scale"][0];?></span></span>
					<?php } ?>
				</span>
			</p>
			<p>
				<label>House Rent Receive?</label>
				<span class="field">
					<input type="radio" name="EmployeePersonal[house_rent]" id="house_rent" checked="checked" value="1" tabindex="42"/>
					Yes
					<input type="radio" name="EmployeePersonal[house_rent]" id="house_rent" value="0" tabindex="43"/>
					No
				</span>
			</p>
			<p>
				<label>Conveyance Receive?</label>
				<span class="field">
					<input type="radio" name="EmployeePersonal[conveyance]" id="conveyanceR" <?php if($type == 2) echo "checked='checked'";?> value="1" tabindex="44"/>
					Yes
					<input type="radio" name="EmployeePersonal[conveyance]" id="conveyanceR" <?php if($type == 1) echo "checked='checked'";?> value="0" tabindex="45"/>
					No
				</span>
			</p>
			<p>
				<label>Association Subscription?</label>
				<span class="field">
					<input type="radio" name="EmployeePersonal[associoation]" id="associoation" <?php echo "checked='checked'";?> value="1" tabindex="46"/>
					Yes
					<input type="radio" name="EmployeePersonal[associoation]" id="associoation" value="0" tabindex="47"/>
					No
				</span>
			</p>
			<p class="stdformbutton">
				<a onClick="$('#personal').slideDown('slow'); $('#salary').hide();" class="btn btn-primary">Prev</a>
				<button class="btn btn-primary">Save</button>
				<button type="reset" class="btn">Reset Form</button>
			</p>
		</div>
	</div>
</div>
<?php echo $this->Form->end();?>
<script>
	function married(){
		if( $("#marital_status").attr("checked")=="checked"){
			if($("#marital_status").val() == 1){
				$('#sn').slideDown();
				$('#sp').slideDown();
			}else{
				$('#sn').slideUp();
				$('#sp').slideUp();
			}
		}else{
			$('#sn').slideUp();
			$('#sp').slideUp();
		}
	}
	$('#joiningDate').datepicker();
	$('#dob').datepicker();
	function submitForm(){ 
		$('#add').submit();
	}
	
	function getRelegion() {  
		relegion = $('#relegion').val();	
		if(relegion == 0)
			$('#or').slideDown();
		else
			$('#or').slideUp();
	}
	function getQuota() {  
		quota = $('#quota').val();	
		if(quota == 0)
			$('#oq').slideDown();
		else
			$('#oq').slideUp();
	}
</SCRIPT>