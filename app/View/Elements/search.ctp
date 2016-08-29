<p><label>Designation</label>
	<span class="formwrapper">
		<?php echo $this->Form->input('designation_id',array("id"=>"desId","type"=>"select","data-placeholder"=>"Choose a Country...","class"=>"chzn-select","style"=>"width:300px","onchange"=>"getEmp()",'label'=>false,'div'=>false,"tabindex"=>"1","options"=>$designations,"empty"=>"Select Designation"));?>
	</span>
</p>
<p id="loadingImage" style="display:none;"><span class="formwrapper"><img src="<?php echo $this->webroot."img/loading.gif";?>" style="width:215px; height:10px;"/></span></p>
<p id="employee"><label>Employee</label>
	<span class="formwrapper">
		<?php echo $this->Form->input('emp_id',array("type"=>"select","data-placeholder"=>"Choose an employee...","class"=>"chzn-select","style"=>"width:300px",'label'=>false,'div'=>false,"tabindex"=>"2","options"=>$employees,"empty"=>"Select Employee"));?>
	</span>
</p>
<script>
	function getEmp() { 
		if(document.getElementById("desId").value){ 
			$('#loadingImage').show();
			$("#employee").show();
			url="<?php echo $this->webroot."admins/getEmployees/"?>"+document.getElementById("desId").value;
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
</script>