<?php
/**
 * @Developed By	:	Engr. Rajib Mahmud
 * @Start Date	  	:	2nd Sep 2013
 * @Last Update		:	17th Sep 2013
 * @Copyright     	:  	Bangladesh Agricultural Research Council
 * @Link          	:  	http://www.barc.gov.bd
 * */
 $loanType = Configure::read("loanType");
 echo $this->Html->css(array("admin/datepicker"));
 	echo $this->Form->create('Loan',array('url'=>array('controller'=>'loanManagements','action'=>'addLoan'),"class"=>"stdform stdform2",'id'=>'add'));
 	echo $this->Form->hidden('id');
?>

<h4 class="widgettitle">Loan Add</h4>
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
					<?php echo $this->Form->input('employee_id',array("id"=>"empId","type"=>"select",'error' => false,"data-placeholder"=>"Choose an employee...","class"=>"chzn-select","style"=>"width:280px","onchange"=>"getloans()",'label'=>false,'div'=>false,"tabindex"=>"2","options"=>NULL,"empty"=>"Select Employee","disabled"=>"true"));?>
					<?php if(!empty($errors["employee_id"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["employee_id"][0];?></span></span>
					<?php } ?>
				</span>
			</p>
			<p id="loans"><label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Loan Type</label>
				<span class="field">
					<?php echo $this->Form->input('type',array("id"=>"type","type"=>"select",'error' => false,"data-placeholder"=>"Choose an employee...","class"=>"chzn-select","style"=>"width:280px",'label'=>false,'div'=>false,"tabindex"=>"3","options"=>$loanType,"empty"=>"Select Type"));?>
					<?php if(!empty($errors["type"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["type"][0];?></span></span>
					<?php } ?>
				</span>
			</p>
			<p>
				<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Total Loan</label>
		        <span class="field">
		        	<?php echo $this->Form->input('total',array("id"=>"total",'error' => false,"type"=>"text","class"=>"input-xlarge","placeholder"=>"Total Loan",'label'=>false,'div'=>false, "tabindex"=>"4"));?>
		        	<?php if(!empty($errors["total"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["total"][0];?></span></span>
					<?php } ?>
		        </span>
		    </p>
			<p>
				<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Total Installment</label>
		        <span class="field">
		        	<?php echo $this->Form->input('total_installment',array("id"=>"totalInstallment",'error' => false,"type"=>"text","class"=>"input-xlarge","placeholder"=>"Total Installment",'label'=>false,'div'=>false, "tabindex"=>"5"));?>
		        	<?php if(!empty($errors["total_installment"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["total_installment"][0];?></span></span>
					<?php } ?>
		        </span>
		    </p>
		    <p>
				<label>Paid Installment</label>
		        <span class="field">
		        	<?php echo $this->Form->input('Refund.paid_installment',array("id"=>"totalInstallment",'error' => false,"type"=>"text","class"=>"input-xlarge","placeholder"=>"Refund Installment",'label'=>false,'div'=>false, "tabindex"=>"6"));?>
		        	<?php if(!empty($errors["paid_installment"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["paid_installment"][0];?></span></span>
					<?php } ?>
		        </span>
		    </p>
		    <p>
				<label>Installment Amount</label>
		        <span class="field">
		        	<?php echo $this->Form->input('amount',array("id"=>"amount",'error' => false,"type"=>"text","class"=>"input-xlarge","placeholder"=>"Amount",'label'=>false,'div'=>false, "tabindex"=>"7"));?>
		        	<?php if(!empty($errors["amount"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["amount"][0];?></span></span>
					<?php } ?>
		        </span>
		    </p>
		    <p>
				<label>Total Refund</label>
		        <span class="field">
		        	<?php echo $this->Form->input('Refund.paid_amount',array("id"=>"paidAmount",'error' => false,"type"=>"text","class"=>"input-xlarge","placeholder"=>"Paid Amount",'label'=>false,'div'=>false, "tabindex"=>"8"));?>
		        	<?php if(!empty($errors["paid_amount"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["paid_amount"][0];?></span></span>
					<?php } ?>
		        </span>
		    </p>
		    <p>
				<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Balance Loan</label>
		        <span class="field">
		        	<?php echo $this->Form->input('Refund.balance',array("id"=>"total",'error' => false,"type"=>"text","class"=>"input-xlarge","placeholder"=>"Balance Loan",'label'=>false,'div'=>false, "tabindex"=>"9"));?>
		        	<?php if(!empty($errors["balance"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["balance"][0];?></span></span>
					<?php } ?>
		        </span>
		    </p>
		    <p>
				<label>Interest Installment</label>
		        <span class="field">
		        	<?php echo $this->Form->input('interest_installment',array("id"=>"interestInstallment",'error' => false,"type"=>"text","class"=>"input-xlarge","placeholder"=>"Interest Installment",'label'=>false,'div'=>false, "tabindex"=>"10"));?>
		        	<?php if(!empty($errors["interest_installment"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["interest_installment"][0];?></span></span>
					<?php } ?>
		        </span>
		    </p>
			<p>
				<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Execution Date</label>
		        <span class="field">
		        	<?php echo $this->Form->input('execution_date',array("id"=>"executionDate","data-date-format"=>"dd-mm-yyyy","data-date-viewmode"=>"years", 'error' => false,"type"=>"text","class"=>"input-xlarge","placeholder"=>"YYYY-MM-DD",'label'=>false,'div'=>false, "tabindex"=>"11","readonly"=>"true"));?>
		        	<?php if(!empty($errors["execution_date"])){?>
					<span class="par control-group error"><span class="help-inline"><?php echo $errors["execution_date"][0];?></span></span>
					<?php } ?>
		        </span>
		    </p>
    		<p class="stdformbutton"><button class="btn btn-primary">Save</button></p>
		</div>
	</div>
</div>
<?php echo $this->Form->end();?>
<script>
	function submitForm(){ 
		$('#add').submit();
	}
	$('#executionDate').datepicker();
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
	
	function getloans() { 
		emp =document.getElementById("empId").value;
		if(emp){ 
			$('#loadingImage').show();
			$("#loans").show();
			url="<?php echo $this->webroot."admins/getloanEmployees/"?>"+emp;
			$.ajax({ 
				url: url,
			 	cache: false,
			    success: function(html){
			    	$('#loadingImage').hide();			    	
			    	$("#loans").html(html);
				}
			});
		} else {
			document.getElementById("loans").options[0].selected = true;
			document.getElementById("loans").disabled = true;
			$('#loadingImage').hide();			
		}
	}
</SCRIPT>