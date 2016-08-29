<?php
/**
 * @Developed By  :  Mahmud IT Limited
 * @Copyright     :  Copyright 2012-2013, Mahmud IT Limited. (http://mahmudit.com)
 * @Link          :  http://mahmudit.com
 * @Since         :  July 2012
 */
?>
<p id="employee"><label>Employee</label>
	<span class="field">
		<?php 
			if(count($employees > 1)) 
				echo $this->Form->input('Employee.employee_id',array("id"=>"empId", "type"=>"select","onchange"=>"getBasic()","data-placeholder"=>"Choose an employee...","class"=>"chzn-select","style"=>"width:280px",'label'=>false,'div'=>false,"tabindex"=>"2","options"=>$employees,"empty"=>"Select Employee"));
			else
				echo $this->Form->input('Employee.employee_id',array("id"=>"empId", "type"=>"select","onchange"=>"getBasic()","data-placeholder"=>"Choose an employee...","class"=>"chzn-select","style"=>"width:280px",'label'=>false,'div'=>false,"tabindex"=>"2","options"=>$employees));
		?>
	</span>
</p>
<p id="loadingImage2" style="display:none;"><span class="field"><img src="<?php echo $this->webroot."img/loading.gif";?>" style="width:215px; height:10px;"/></span></p>
<p id = "basic" style="display:none">
	<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Basic Salary</label>
    <span class="field">
    	<?php echo $this->Form->input('basic',array("id"=>"add_basic",'error' => false,"type"=>"text","class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"3","disabled"=>"true"));?>
    	<?php if(!empty($errors["basic"])){?>
		<span class="par control-group error"><span class="help-inline"><?php echo $errors["basic"][0];?></span></span>
		<?php } ?>
    </span>
</p>
<script type="text/javascript">
	function getBasic(){ 
		emp =document.getElementById("empId").value;
		if(emp){ 
			$('#loadingImage2').show();
			$("#basic2").hide();
			$("#basic").show();
			url="<?php echo $this->webroot."admins/getBasic/"?>"+emp;
			$.ajax({ 
				url: url,
			 	cache: false,
			    success: function(html){
			    	$('#loadingImage2').hide();			    	
			    	$("#basic").html(html);
			    	$(calcTotal());
				}
			});
		} else {
			document.getElementById("basic").disabled = true;
			$('#loadingImage2').hide();			
		}
	  }
</script>