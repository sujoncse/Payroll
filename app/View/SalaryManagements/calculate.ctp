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
 $quotaStatus = Configure::read("quota");
 $bloodGroup = Configure::read("bloodGroup");
 $religion = Configure::read("religion");
 $spouseProfession = Configure::read("spouseProfession");
 echo $this->Html->script(array("admin/jquery.validate.min","admin/jquery.uniform.min","admin/jquery.tagsinput.min","admin/chosen.jquery.min","admin/forms","admin/ui.spinner.min","admin/jquery.chained","admin/jquery.calculation","admin/slider","admin/toword"));
 echo $this->Html->css(array("admin/bootstrap-fileupload.min","admin/bootstrap-timepicker.min"));
 echo $this->Form->create('Salary',array('url'=>array('controller'=>'salaryManagements','action'=>'calculate',$type,$empId),"class"=>"stdform stdform2",'id'=>'calculation'));
 echo $this->Form->hidden('id');
?>
<body  onload="calcTotal()">
<h3 class="widgettitle">Salary Calculation</h3>
<div class="widgetcontent">
	<div id="tabs2" class="tabs2">
    	<div id="stabs1">
    		<h4 class="widgettitle">Payable</h4>
        	<div class="widgetcontent bordered shadowed nopadding">
				<p><label><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/>Designation</label>
					<span class="field">
						<?php echo $this->Form->input('designation',array("id"=>"desId","type"=>"text",'error' => false,"data-placeholder"=>"Employee designation","class"=>"input-xlarge","style"=>"width:280px",'label'=>false,'div'=>false,"tabindex"=>"1","value"=>$designations[$this->data["Salary"]["designation_id"]],"readonly"=>true));?>
						<?php if(!empty($errors["designation_id"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["designation_id"][0];?></span></span>
						<?php } ?>
					</span>
				</p>
				<p style="display:none"><label><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/>Designation</label>
					<span class="field">
						<?php echo $this->Form->input('designation_id',array("id"=>"desId","type"=>"text",'error' => false,"data-placeholder"=>"Employee designation","class"=>"input-xlarge","style"=>"width:280px",'label'=>false,'div'=>false,"tabindex"=>"1","value"=>$this->data["Salary"]["designation_id"]));?>
					</span>
				</p>
				<p id="employee"><label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Employee</label>
					<span class="field">
						<?php echo $this->Form->input('employee_id',array("id"=>"empId","type"=>"text",'error' => false,"data-placeholder"=>"Choose an employee...","class"=>"input-xlarge","style"=>"width:280px",'label'=>false,'div'=>false,"tabindex"=>"2","value"=>$employees[$this->data["Salary"]["employee_id"]],"readonly"=>true));?>
						<?php if(!empty($errors["employee_id"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["employee_id"][0];?></span></span>
						<?php } ?>
					</span>
				</p>
				<p id="grade" style="display:none"><label>Grade</label>
					<span class="field">
						<?php echo $this->Form->input('Employee.grade',array("id"=>"gradeId", 'error' => false,"type"=>"text","data-placeholder"=>"Employee grade","class"=>"chzn-select","style"=>"width:300px",'label'=>false,'div'=>false,"value"=>$this->data["Employee"]["grade"]));?>
					</span>
				</p>
				<p id="children" style="display:none"><label>Children</label>
					<span class="field">
						<?php echo $this->Form->input('EmployeePersonal.children',array("id"=>"childrenId", "type"=>"text","data-placeholder"=>"Employee grade","class"=>"chzn-select","style"=>"width:300px",'label'=>false,'div'=>false,"value"=>$this->data["EmployeePersonal"]["children"]));?>
					</span>
				</p>
				<p id="houseRent" style="display:none"><label>House Rent</label>
					<span class="field">
						<?php echo $this->Form->input('EmployeePersonal.house_rent',array("id"=>"hr", "type"=>"text","data-placeholder"=>"Employee grade","class"=>"chzn-select","style"=>"width:300px",'label'=>false,'div'=>false,"value"=>$this->data["EmployeePersonal"]["house_rent"]));?>
					</span>
				</p>
				<p id = "basic2">
					<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Basic Salary</label>
			        <span class="field">
			        	<?php echo $this->Form->input('basic',array("id"=>"add_basic", 'error' => false,"type"=>"text","class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"3","disabled"=>"true"));?>
			        	<?php if(!empty($errors["basic"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["basic"][0];?></span></span>
						<?php } ?>
			        </span>
			    </p>
			    <p id="add_hr">
			    	<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>House Rent</label>
			        <span class="field">
			        	<?php echo $this->Form->input('house_rent',array("id"=>"add_house_rent",'error' => false,"type"=>"text","class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"4"));?>
			        	<?php if(!empty($errors["house_rent"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["house_rent"][0];?></span></span>
						<?php } ?>
			        </span>
			    </p>
			    <p>
			    	<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Medical Allowance</label>
			        <span class="field">
			        	<?php echo $this->Form->input('medical',array("id"=>"add_medical",'error' => false,"type"=>"text","class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"5"));?>
			        	<?php if(!empty($errors["medical"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["medical"][0];?></span></span>
						<?php } ?>
			        </span>
			    </p>
			    <p>
			    	<label>Personal Pay</label>
			        <span class="field">
			        	<?php echo $this->Form->input('pp',array("id"=>"add_pp","type"=>"text",'error' => false,"class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"6"));?>
			        	<?php if(!empty($errors["pp"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["pp"][0];?></span></span>
						<?php } ?>
					</span>
			    </p>
			    <p>
			    	<label>Educational Allowance</label>
			        <span class="field">
			        	<?php echo $this->Form->input('edu',array("id"=>"add_edu","type"=>"text",'error' => false,"class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"7"));?>
			        	<?php if(!empty($errors["edu"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["edu"][0];?></span></span>
						<?php } ?>
					</span>
			    </p>
			    <p>
			    	<label>Charge Allowance</label>
			        <span class="field">
			        	<?php echo $this->Form->input('charge',array("id"=>"add_charge","type"=>"text",'error' => false,"class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"8"));?>
			        	<?php if(!empty($errors["charge"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["charge"][0];?></span></span>
						<?php } ?>
					</span>
			    </p>
			    <p>
			    	<label>Dearness Allowance</label>
			        <span class="field">
			        	<?php echo $this->Form->input('dearness',array("id"=>"add_dearness","type"=>"text",'error' => false,"class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"9"));?>
			        	<?php if(!empty($errors["dearness"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["dearness"][0];?></span></span>
						<?php } ?>
			        </span>
			    </p>
			    <p id="add_con">
			    	<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Conveyance Allowance</label>
			        <span class="field">
			        	<?php echo $this->Form->input('conveyance',array("id"=>"add_conveyance","type"=>"text",'error' => false,"class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"10"));?>
			        	<?php if(!empty($errors["conveyance"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["conveyance"][0];?></span></span>
						<?php } ?>
					</span>
			    </p>
			    <p id="add_tiff">
			    	<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Tiffin Allowance</label>
			        <span class="field">
			        	<?php echo $this->Form->input('tiffin',array("id"=>"add_tiffin","type"=>"text",'error' => false,"class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"11"));?>
			        	<?php if(!empty($errors["tiffin"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["tiffin"][0];?></span></span>
						<?php } ?>
			        </span>
			    </p>
			    <p id="add_wash">
			    	<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Washing Allowance</label>
			        <span class="field">
			        	<?php echo $this->Form->input('washing',array("id"=>"add_washing","type"=>"text",'error' => false,"class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"12"));?>
			        	<?php if(!empty($errors["washing"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["washing"][0];?></span></span>
						<?php } ?>
					</span>
			    </p>
			    <p id="add_dep">
			    	<label>Deputation Allowance</label>
			        <span class="field">
			        	<?php echo $this->Form->input('deputation',array("id"=>"add_deputation","type"=>"text",'error' => false,"class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"13"));?>
			        	<?php if(!empty($errors["deputation"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["deputation"][0];?></span></span>
						<?php } ?>
			        </span>
			    </p>
			    <p id="add_dom">
			    	<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Domestic Aid</label>
			        <span class="field">
			        	<?php echo $this->Form->input('aid',array("id"=>"add_aid","type"=>"text",'error' => false,"class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"14"));?>
			        	<?php if(!empty($errors["aid"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["aid"][0];?></span></span>
						<?php } ?>
					</span>
			    </p>
			    <p id="add_sump">
			    	<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Sumptuary</label>
			        <span class="field">
			        	<?php echo $this->Form->input('sumptuary',array("id"=>"add_sumptuary","type"=>"text",'error' => false,"class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"15"));?>
			        	<?php if(!empty($errors["sumptuary"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["sumptuary"][0];?></span></span>
						<?php } ?>
					</span>
			    </p>
			    <p>
			    	<label>Arrear</label>
			        <span class="field">
			        	<?php echo $this->Form->input('arrear',array("id"=>"add_arrear","type"=>"text",'error' => false,"class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"16"));?>
			        	<?php if(!empty($errors["arrear"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["arrear"][0];?></span></span>
						<?php } ?>
					</span>
			    </p>
			    <p>
			    	<label>Miscellaneous</label>
			        <span class="field">
			        	<?php echo $this->Form->input('miscellaneous',array("id"=>"add_miscellaneous","type"=>"text",'error' => false,"class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"17"));?>
			        	<?php if(!empty($errors["miscellaneous"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["miscellaneous"][0];?></span></span>
						<?php } ?>
					</span>
			    </p>
			    <p>
			    	<label>Fractional Increment</label>
			        <span class="field">
			        	<?php echo $this->Form->input('fraction_increment',array("id"=>"add_fractional_increment","type"=>"text",'error' => false,"class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"18"));?>
			        	<?php if(!empty($errors["fraction_increment"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["fraction_increment"][0];?></span></span>
						<?php } ?>
					</span>
			    </p>
			    <p class="stdformbutton">
			        <a onClick="$('#stabs1').slideUp('slow'); $('#stabs2').show();" class="btn btn-primary">Next</a>
			        <a onClick="$('#stabs1').slideUp('slow'); $('#stabs3').show();" class="btn btn-primary">Last</a>
			        <button type="reset" class="btn">Reset Form</button>
			    </p>
			    <p>
					<label>Gross Salary</label>
					<span class="field"><input name="totalAdd1" id="totalAdd1" readonly="readonly" type="text" class="input-xlarge"></span>
				</p>
			</div>
    	</div>
    	<div id="stabs2" style="display:none">
        	<h4 class="widgettitle">Deduction</h4>
			<div class="widgetcontent bordered shadowed nopadding">
				<p>
			    	<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>CPF Contribution</label>
			        <span class="field">
			        	<?php echo $this->Form->input('Deduction.cpf1',array("id"=>"sub_cpf1","type"=>"text",'error' => false,"class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"19"));?>
			        	<?php if(!empty($errors["cpf1"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["cpf1"][0];?></span></span>
						<?php } ?>
					</span>
			    </p>
			    <p>
			    	<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Aditional CPF Contribution</label>
			        <span class="field">
			        	<?php echo $this->Form->input('Deduction.cpf2',array("id"=>"sub_cpf2","type"=>"text",'error' => false,"class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"20"));?>
			        	<?php if(!empty($errors["cpf2"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["cpf2"][0];?></span></span>
						<?php } ?>
					</span>
			    </p>
			    <p>
			    	<label>Arrear CPF Deduction</label>
			        <span class="field">
			        	<?php echo $this->Form->input('Deduction.arrear_cpf',array("id"=>"sub_arrear_cpf","type"=>"text",'error' => false,"class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"21"));?>
			        	<?php if(!empty($errors["arrear_cpf"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["arrear_cpf"][0];?></span></span>
						<?php } ?>
					</span>
			    </p>
			    <p>
			    	<label>CPF Loan</label>
			        <span class="field">
			        	<?php echo $this->Form->input('Deduction.cpf_loan1',array("id"=>"sub_cpf_loan1","type"=>"text",'error' => false,"class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"22"));?>
			        	<?php if(!empty($errors["cpf_loan1"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["cpf_loan1"][0];?></span></span>
						<?php } ?>
					</span>
			    </p>
			    <p>
			    	<label>Aditional CPF Loan</label>
			        <span class="field">
			        	<?php echo $this->Form->input('Deduction.cpf_loan2',array("id"=>"sub_cpf_loan2","type"=>"text",'error' => false,"class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"23"));?>
			        	<?php if(!empty($errors["cpf_lona2"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["cpf_loan2"][0];?></span></span>
						<?php } ?>
					</span>
			    </p>
			    <p>
			    	<label>House Loan</label>
			        <span class="field">
			        	<?php echo $this->Form->input('Deduction.house_loan',array("id"=>"sub_house_loan","type"=>"text",'error' => false,"class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"24"));?>
			        	<?php if(!empty($errors["house_loan"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["house_loan"][0];?></span></span>
						<?php } ?>
					</span>
			    </p>
			    <p>
			    	<label>Vehicle Loan</label>
			        <span class="field">
			        	<?php echo $this->Form->input('Deduction.vehicle_loan',array("id"=>"sub_vehicle_loan","type"=>"text",'error' => false,"class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"25"));?>
			        	<?php if(!empty($errors["vehicle_loan"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["vehicle_loan"][0];?></span></span>
						<?php } ?>
					</span>
			    </p>
			    <p>
			    	<label>Total CPF Interest</label>
			        <span class="field">
			        	<?php echo $this->Form->input('Deduction.cpf_interest',array("id"=>"sub_cpf_interest","type"=>"text",'error' => false,"class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"26"));?>
			        	<?php if(!empty($errors["cpf_interest"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["cpf_interest"][0];?></span></span>
						<?php } ?>
					</span>
			    </p>
			    <p>
			    	<label>Total House Loan Interest</label>
			        <span class="field">
			        	<?php echo $this->Form->input('Deduction.h_interest',array("id"=>"sub_h_interest","type"=>"text",'error' => false,"class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"27"));?>
			        	<?php if(!empty($errors["h_interest"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["h_interest"][0];?></span></span>
						<?php } ?>
					</span>
			    </p>
			    <p>
			    	<label>Total Vehicle Loan Interest</label>
			        <span class="field">
			        	<?php echo $this->Form->input('Deduction.v_interest',array("id"=>"sub_v_interest","type"=>"text",'error' => false,"class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"27"));?>
			        	<?php if(!empty($errors["v_interest"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["v_interest"][0];?></span></span>
						<?php } ?>
					</span>
			    </p>
			    <p>
			    	<label>Benevolent Fund</label>
			        <span class="field">
			        	<?php echo $this->Form->input('Deduction.benevolent_fund',array("id"=>"sub_benevolent_fund","type"=>"text",'error' => false,"class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"28"));?>
			        	<?php if(!empty($errors["benevolent_fund"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["benevolent_fund"][0];?></span></span>
						<?php } ?>
					</span>
			    </p>
			    <p id="sub_hr">
			    	<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>House Rent Deduct</label>
			        <span class="field">
			        	<?php echo $this->Form->input('Deduction.house_rent_deduct',array("id"=>"sub_house_rent_deduct","type"=>"text",'error' => false,"class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"29"));?>
			        	<?php if(!empty($errors["house_rent_deduct"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["house_rent_deduct"][0];?></span></span>
						<?php } ?>
					</span>
			    </p>
			    <p>
			    	<label>Tranport Bill</label>
			        <span class="field">
			        	<?php echo $this->Form->input('Deduction.transport_bill',array("id"=>"sub_transport_bill","type"=>"text",'error' => false,"class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"30"));?>
			        	<?php if(!empty($errors["transport_bill"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["transport_bill"][0];?></span></span>
						<?php } ?>
					</span>
			    </p>
			    <p>
			    	<label>Personal Vehicle Used</label>
			        <span class="field">
			        	<?php echo $this->Form->input('Deduction.personal_vehicle',array("id"=>"sub_personal_vehicle","type"=>"text",'error' => false,"class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"31"));?>
			        	<?php if(!empty($errors["personal_vehicle"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["personal_vehicle"][0];?></span></span>
						<?php } ?>
					</span>
			    </p>
			    <p>
			    	<label>Group Insurance</label>
			        <span class="field">
			        	<?php echo $this->Form->input('Deduction.group_insurance',array("id"=>"sub_group_insurance","type"=>"text",'error' => false,"class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"32"));?>
			        	<?php if(!empty($errors["group_insurance"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["group_insurance"][0];?></span></span>
						<?php } ?>
					</span>
			    </p>
			    <p id="w_s">
			    	<label>Water & Swerage</label>
			        <span class="field">
			        	<?php echo $this->Form->input('Deduction.w_s',array("id"=>"sub_w_s","type"=>"text","class"=>"input-xlarge",'error' => false,'label'=>false,'div'=>false, "tabindex"=>"33"));?>
			        	<?php if(!empty($errors["w_s"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["w_s"][0];?></span></span>
						<?php } ?>
					</span>
			    </p>
			    <p id="fuel">
			    	<label>Fuel Cost</label>
			        <span class="field">
			        	<?php echo $this->Form->input('Deduction.fuel',array("id"=>"sub_fuel","type"=>"text","class"=>"input-xlarge",'error' => false,'label'=>false,'div'=>false, "tabindex"=>"34"));?>
			        	<?php if(!empty($errors["fuel"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["fuel"][0];?></span></span>
						<?php } ?>
					</span>
			    </p>
			    
			    <p>
			    	<label>Overdrawn</label>
			        <span class="field">
			        	<?php echo $this->Form->input('Deduction.overdrawn',array("id"=>"sub_overdrawn","type"=>"text",'error' => false,"class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"35"));?>
			        	<?php if(!empty($errors["overdrawn"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["overdrawn"][0];?></span></span>
						<?php } ?>
					</span>
			    </p>
			    <p>
			    	<label>Telephone Bill</label>
			        <span class="field">
			        	<?php echo $this->Form->input('Deduction.phone_bill',array("id"=>"sub_phone_bill","type"=>"text",'error' => false,"class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"36"));?>
			        	<?php if(!empty($errors["phone_bill"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["phone_bill"][0];?></span></span>
						<?php } ?>
					</span>
			    </p>
			    <p>
			    	<label>Association Subscription</label>
			        <span class="field">
			        	<?php echo $this->Form->input('Deduction.association',array("id"=>"sub_association","type"=>"text","class"=>"input-xlarge",'error' => false,'label'=>false,'div'=>false, "tabindex"=>"37"));?>
			        	<?php if(!empty($errors["association"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["association"][0];?></span></span>
						<?php } ?>
					</span>
			    </p>
			    <p>
			    	<label>Income TAX</label>
			        <span class="field">
			        	<?php echo $this->Form->input('Deduction.tax',array("id"=>"sub_tax","type"=>"text","class"=>"input-xlarge",'error' => false,'label'=>false,'div'=>false, "tabindex"=>"38"));?>
			        	<?php if(!empty($errors["tax"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["tax"][0];?></span></span>
						<?php } ?>
					</span>
			    </p>
			    <p>
			    	<label>Miscellaneous Deduction</label>
			        <span class="field">
			        	<?php echo $this->Form->input('Deduction.miscellaneous_deduct',array("id"=>"sub_miscellaneous_deduct",'error' => false,"type"=>"text","class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"39"));?>
			        	<?php if(!empty($errors["miscellaneous_deduct"])){?>
						<span class="par control-group error"><span class="help-inline"><?php echo $errors["miscellaneous_deduct"][0];?></span></span>
						<?php } ?>
					</span>
			    </p>
			    <p class="stdformbutton">
			    	<a onClick="$('#stabs1').slideDown('slow'); $('#stabs2').hide();" class="btn btn-primary">Prev</a>
			        <a onClick="$('#stabs2').slideUp('slow'); $('#stabs3').show();" class="btn btn-primary">Next</a>
			        <button type="reset" class="btn">Reset Form</button>
			    </p>
			    <p>
					<label>Total Deduction</label>
					<span class="field"><input name="totalSub1" id="totalSub1" readonly="readonly" type="text" class="input-xlarge"></span>
				</p>
			</div>
    	</div>
    	<div id="stabs3" style="display:none">
       		<h4 class="widgettitle">Salary Calculation</h4>
			<div class="widgetcontent bordered shadowed nopadding">
				<p>
					<label>Gross Salary</label>
					<span class="field"><input name="totalAdd" id="totalAdd" readonly="readonly" type="text" class="input-xxlarge"></span>
				</p>
				<p>
					<label>Total Deduction</label>
					<span class="field"><input name="totalSub" id="totalSub" readonly="readonly" type="text" class="input-xxlarge"></span>
				</p>
				<p>
					<label>Net Payable</label>
					<span class="field"><input name="payable" id="payable" readonly="readonly" type="text" class="input-xxlarge"></span>
				</p>
				<p>
					<label>In Word</label>
					<span class="field"><input name="inWord" id="inWord" readonly="readonly" type="text" class="input-xxlarge"></span>
				</p>
				<p>
					<span class="field">
						<a onClick="$('#stabs1').slideDown('slow'); $('#stabs3').hide();" class="btn btn-primary">First</a>
						<a onClick="$('#stabs2').slideDown('slow'); $('#stabs3').hide();" class="btn btn-primary">Prev</a>
			        	<button class="btn btn-primary">Calculate</button>
			        	<button type="reset" class="btn">Reset Form</button>
			        </span>
			    </p>
			</div>
    	</div>
    	
	</div><!--#tabs-->
</div>
</body>
<?php echo $this->Form->end();?>
<script type="text/javascript">
	function getEmp() { 
		des =document.getElementById("desId").value; 
		if(des){ 
			$('#loadingImage').show();
			$("#employee").show();
			url="<?php echo $this->webroot."admins/getEmployees/"?>"+des;
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
	 
	///Add Section
	var $val=$("input[id^=add_basic]").keyup(calcTotal);
	var $val=$("input[id^=add_house_rent]").keyup(calcTotal);
	var $val=$("input[id^=add_medical]").keyup(calcTotal);
	var $val=$("input[id^=add_pp]").keyup(calcTotal);
	var $val=$("input[id^=add_edu]").keyup(calcTotal);
	var $val=$("input[id^=add_charge]").keyup(calcTotal);
	var $val=$("input[id^=add_dearness]").keyup(calcTotal);
	var $val=$("input[id^=add_conveyance]").keyup(calcTotal);
	var $val=$("input[id^=add_tiffin]").keyup(calcTotal);
	var $val=$("input[id^=add_washing]").keyup(calcTotal);
	var $val=$("input[id^=add_deputation]").keyup(calcTotal);
	var $val=$("input[id^=add_aid]").keyup(calcTotal);
	var $val=$("input[id^=add_sumptuary]").keyup(calcTotal);
	var $val=$("input[id^=add_arrear]").keyup(calcTotal);
	var $val=$("input[id^=add_miscellaneous]").keyup(calcTotal);
	var $val=$("input[id^=add_fractional_increment]").keyup(calcTotal);
	
	/// Deduct Section
	var $val=$("input[id^=sub_cpf1]").keyup(calcTotal);
	var $val=$("input[id^=sub_cpf2]").keyup(calcTotal);
	var $val=$("input[id^=sub_arrear_cpf]").keyup(calcTotal);
	var $val=$("input[id^=sub_cpf_loan1]").keyup(calcTotal);
	var $val=$("input[id^=sub_cpf_loan2]").keyup(calcTotal);
	var $val=$("input[id^=sub_house_loan]").keyup(calcTotal);
	var $val=$("input[id^=sub_vehicle_loan]").keyup(calcTotal);
	var $val=$("input[id^=sub_cpf_interest]").keyup(calcTotal);
	var $val=$("input[id^=sub_h_interest]").keyup(calcTotal);
	var $val=$("input[id^=sub_v_interest]").keyup(calcTotal);
	var $val=$("input[id^=sub_benevolent_fund]").keyup(calcTotal);
	var $val=$("input[id^=sub_house_rent_deduct]").keyup(calcTotal);
	var $val=$("input[id^=sub_transport_bill]").keyup(calcTotal);
	var $val=$("input[id^=sub_association]").keyup(calcTotal);
	var $val=$("input[id^=sub_personal_vehicle]").keyup(calcTotal);
	var $val=$("input[id^=sub_group_insurance]").keyup(calcTotal);
	var $val=$("input[id^=sub_w_s]").keyup(calcTotal);
	var $val=$("input[id^=sub_fuel]").keyup(calcTotal);
	var $val=$("input[id^=sub_overdrawn]").keyup(calcTotal);
	var $val=$("input[id^=sub_phone_bill]").keyup(calcTotal);
	var $val=$("input[id^=sub_tax]").keyup(calcTotal);
	var $val=$("input[id^=sub_miscellaneous_deduct]").keyup(calcTotal);
	
	function calcTotal(){
		desType = <?php echo $desType;?>;
		if(desType == 1){
			grade = $("#gradeId").val();
			empType = <?php echo $type; ?>;
			designation = <?php echo $this->data["Salary"]["designation_id"]; ?>; 
			children = $("#childrenId").val();
			serviceStatus = $("#serviceStatus").val();
			var hr=0;
		    basic=(parseInt($('#add_basic').val(),10));
		    if(grade != 1){
		    	if(grade == 4){
		    		if(basic < 25000){
		    			$('#add_medical').val(NaN);
	    			}
	    			if(basic > 33000){
		    			$('#add_medical').val(NaN);
	    			}
		    	}
		    	$('#sub_hr').hide();
		    	$('#add_dom').hide();
		    	hrStatus = <?php echo $this->data["EmployeePersonal"]["house_rent"];?>;
		    	if(hrStatus == 1){
				    if(basic <= 5000){
				    	hr = basic * .65;
				    	if(hr < 2800){
				    		hr = 2800;
				    	}
				    }else{
					    if(basic > 5001 && basic <= 10800){
					    	hr = basic * .60;
					    	if(hr < 3300){
					    		hr = 3300;
					    	}
					    }else{
					    	if(basic > 10801 && basic <= 21600){
						    	hr = basic * .55;
						    	if(hr < 6500){
						    		hr = 6500;
						    	}
						    }else{
						    	hr = basic * .50;
						    	if(hr < 11900){
						    		hr = 11900;
						    	}else{
						    		if(hr > 39500){
							    		hr = 19250;
							    	}
						    	}
							}
					    }
				    }
		    	}else{
		    		hr = 0;	
		    	}
				$('#add_house_rent').val(Math.round(hr,2));
				$('#sub_house_rent_deduct').val(0);
			}else{
				$('#add_basic').val(40000);
				$('#add_hr').hide();
				hr = basic * 7.5 / 100;
				$('#add_house_rent').val(0);
				$('#sub_house_rent_deduct').val(Math.round(hr,2));
				
			}
		    $('#add_medical').val(700);
		   	if(empType == 1){
		    	$('#sub_association').val(100);
		    }else{
		    	$('#sub_association').val(0);
		    }
		    if(children == 1){
		    	$('#add_edu').val(200);
		    }else{
		    	if(children == 2){
		    		$('#add_edu').val(300);
		    	}else{
		    		$('#add_edu').val(0);
		    	}
		    }
		    /*dearness = basic * .20;
	    	if(dearness < 1500){
	    		dearness = 1500;
	    	}else{
				if(dearness > 6000){
		    		dearness = 6000;
		    	}    	
	    	}
	    	*/
	    	dearness = 0;
	    	$('#add_dearness').val(dearness);
	    	benevolent_fund = basic * .01;
	    	if(benevolent_fund > 50){
	    		benevolent_fund = 50;
	    	}
	    	$('#sub_benevolent_fund').val(benevolent_fund);
	    	if(empType == 2)
				$('#add_dep').hide();
			if(grade > 3)
				$('#add_sump').hide();
			else
				$('#add_sump').show();
			if(empType == 2){
				conv = <?php echo $this->data["EmployeePersonal"]["conveyance"];?>;
				if(conv == 1)
					$('#add_conveyance').val(150);
		    	$('#add_tiffin').val(150);
		    }else{
		    	$('#add_con').hide();
				$('#add_tiff').hide();
				$('#add_wash').hide();	
				$('#w_s').hide();
				$('#fuel').hide();
		    }
		    if(designation == 1){
		    	$('#add_aid').val(1300);
		    	$('#add_sumptuary').val(1000);
		    }else{
		    	if(designation == 2){
			    	$('#add_sumptuary').val(900);
			    }else{
			    	if(designation == 3){
			    		$('#add_sumptuary').val(600);
			    	}else{
			    		$('#add_sumptuary').val(0);
			    	}
			    }	
		    }
		    if((grade <= 9) && serviceStatus == 2){
		    	var dep = basic * .2; 
		    	$('#add_deputation').val(dep);	
		    }else{
		    	$('#add_dep').hide();	
		    }
		    var cpf1 = 0;
		    cpf1 = basic * 8.33/100;
		    $('#sub_cpf1').val(Math.round(cpf1,2));
		    if(empType == 1){
		    	var cpf2 = 0;
			    cpf2 = basic * 2.5/100;
			    $('#sub_cpf2').val(Math.round(cpf2,2));
		    	$('#sub_group_insurance').val(15);
		    }
		    $("input[id^=add]").sum("keyup", "#totalAdd");
			$("input[id^=sub]").sum("keyup", "#totalSub");
			$("input[id^=add]").sum("keyup", "#totalAdd1");
			$("input[id^=sub]").sum("keyup", "#totalSub1");
			totalAdd=(parseInt($('#totalAdd').val(),10));
			totalSub=(parseInt($('#totalSub').val(),10));
			var total = totalAdd - totalSub;
			$('#payable').val(total);
			payable = $("#payable").val();
			var inWord = toWords(payable);
			$('#inWord').val(inWord);
			$("input[id^=gradeId]").val(grade);
		}else{
			$("input[id^=add]").sum("keyup", "#totalAdd");
			$("input[id^=sub]").sum("keyup", "#totalSub");
			$("input[id^=add]").sum("keyup", "#totalAdd1");
			$("input[id^=sub]").sum("keyup", "#totalSub1");
			totalAdd=(parseInt($('#totalAdd').val(),10));
			totalSub=(parseInt($('#totalSub').val(),10));
			var total = totalAdd - totalSub;
			$('#payable').val(total);
			payable = $("#payable").val();
			var inWord = toWords(payable);
			$('#inWord').val(inWord);
		}
	}
	
	function submitForm(){ 
		$('#calculation').submit();
	}
</SCRIPT>