<?php
/**
 * @Developed By	:	Engr. Rajib Mahmud
 * @Start Date	  	:	2nd Sep 2013
 * @Last Update		:	10th Sep 2013
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
 $sq = Configure::read("sq");
 $type = Configure::read("type");
 echo $this->Html->css(array("admin/datepicker"));
 echo $this->Session->flash();
 echo $this->Form->create('User',array('url'=>array('controller'=>'admins','action'=>'createUser'),"class"=>"stdform stdform2",'id'=>'add'));
 echo $this->Form->hidden('id');

?>

<div class="widgetcontent bordered shadowed nopadding">
	<div id="stabs2">
		<h4 class="widgettitle">Create PDS</h4>
		<div class="widgetcontent bordered shadowed nopadding">
			<p><label><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/>Designation</label>
				<span class="field">
					<?php
						if(count($designations > 1)) 
							echo $this->Form->input('designation_id',array("id"=>"desId","type"=>"select",'error' => false,"data-placeholder"=>"Choose a Country...","class"=>"chzn-select","style"=>"width:280px","onchange"=>"getEmp()",'label'=>false,'div'=>false,"tabindex"=>"1","options"=>$designations,"empty"=>"Select Designation"));
						else
							echo $this->Form->input('designation_id',array("id"=>"desId","type"=>"select",'error' => false,"data-placeholder"=>"Choose a Country...","class"=>"chzn-select","style"=>"width:280px","onchange"=>"getEmp()",'label'=>false,'div'=>false,"tabindex"=>"1","options"=>$designations));
					?>
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
			<p>
				<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>User Name</label>
				<span class="field">
					<?php echo $this->Form->input('username',array("id"=>"username","type"=>"text",'error' => false,"class"=>"input-xlarge","placeholder"=>"User Name",'label'=>false,'div'=>false, "tabindex"=>"8"));?>
					<?php if(!empty($errors["username"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["username"][0];?></span></span>
					<?php } ?>
				</span>
			</p>
			<p>
				<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Password</label>
				<span class="field">
					<?php echo $this->Form->input('password',array("id"=>"password","type"=>"password",'error' => false,"class"=>"input-xlarge","placeholder"=>"Password",'label'=>false,'div'=>false, "tabindex"=>"9"));?>
					<?php if(!empty($errors["password"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["password"][0];?></span></span>
					<?php } ?>
				</span>
			</p>
			<p>
				<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Confirm Password</label>
				<span class="field">
					<?php echo $this->Form->input('confirm_password',array("id"=>"confirmPass","type"=>"password",'error' => false,"class"=>"input-xlarge","placeholder"=>"Confirm Password",'label'=>false,'div'=>false, "tabindex"=>"10"));?>
					<?php if(!empty($errors["confirm_password"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["confirm_password"][0];?></span></span>
					<?php } ?>
				</span>
			</p>
			
			<p>
				<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Email</label>
				<span class="field">
					<?php echo $this->Form->input('email',array("id"=>"email","type"=>"text",'error' => false,"class"=>"input-xlarge","placeholder"=>"Email Address","data-validation-type"=>"present",'label'=>false,'div'=>false, "tabindex"=>"11"));?>
					<?php if(!empty($errors["email"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["email"][0];?></span></span>
					<?php } ?>
				</span>
			</p>
			<p>
				<label>Secrate Questions</label>
				<span class="field"><?php echo $this->Form->input('sq',array("type"=>"select",'error' => false,'label'=>false,"class"=>"chzn-select","style"=>"width:280px",'div'=>false, "tabindex"=>"12","options"=>$sq));?></span>
			</p>
			<p>
				<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Answer</label>
				<span class="field">
					<?php echo $this->Form->input('answer',array("id"=>"email","type"=>"text",'error' => false,"class"=>"input-xlarge","placeholder"=>"Secrate Answer","data-validation-type"=>"present",'label'=>false,'div'=>false, "tabindex"=>"13"));?>
					<?php if(!empty($errors["answer"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["answer"][0];?></span></span>
					<?php } ?>
				</span>
			</p>
			<p class="stdformbutton">
				<button class="btn btn-primary" tabindex="14">Create</button>
				<button type="reset" class="btn">Reset Form</button>
			</p>
		</div>
	</div>
</div>
<?php echo $this->Form->end();?>
<script>
	function submitForm(){ 
		$('#add').submit();
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
</SCRIPT>