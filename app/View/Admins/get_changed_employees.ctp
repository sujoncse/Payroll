<?php
/**
 * @Developed By  :  Mahmud IT Limited
 * @Copyright     :  Copyright 2012-2013, Mahmud IT Limited. (http://mahmudit.com)
 * @Link          :  http://mahmudit.com
 * @Since         :  July 2012
 */
?>
<p id="employee"><label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Employee</label>
	<span class="field">
		<?php 
			if(count($employees) > 1) 
				echo $this->Form->input('employee_id',array("id"=>"empId", "type"=>"select","onchange"=>"getloans()","data-placeholder"=>"Choose an employee...","class"=>"chzn-select","style"=>"width:280px",'label'=>false,'div'=>false,"tabindex"=>"2","options"=>$employees,"empty"=>"Select Employee"));
			else
				echo $this->Form->input('employee_id',array("id"=>"empId", "type"=>"select","onchange"=>"getloans()","data-placeholder"=>"Choose an employee...","class"=>"chzn-select","style"=>"width:280px",'label'=>false,'div'=>false,"tabindex"=>"2","options"=>$employees,"empty"=>"Select Employee"));
		?>
	</span>
</p>
<p id = "increment" style="display:none">
	<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Increment</label>
    <span class="field">
    	<?php echo $this->Form->input('increment_number',array("id"=>"incrementNum",'error' => false,"type"=>"text","class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"3","disabled"=>"true"));?>
    </span>
</p>
<script type="text/javascript">
	function getInfo(){ 
		emp =document.getElementById("empId").value;
		if(emp){ 
			url="<?php echo $this->webroot."admins/getInfo/"?>"+emp;
			$.ajax({ 
				url: url,
			 	cache: false,
			    success: function(html){
			    	$("#increment").html(html);
				}
			});
		} else {
			document.getElementById("increment").disabled = true;
		}
	  }
</script>