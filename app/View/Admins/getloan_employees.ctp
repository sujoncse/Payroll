<?php
/**
 * @Developed By  :  Mahmud IT Limited
 * @Copyright     :  Copyright 2012-2013, Mahmud IT Limited. (http://mahmudit.com)
 * @Link          :  http://mahmudit.com
 * @Since         :  July 2012
 */
?>
<?php 
$loanType1 = Configure::read("loanType");
foreach($loans AS $ln){
	$lntype = $ln['Loan']['type'];
	unset($loanType1[$lntype]);
}
?>
<p id="loans"><label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Loan Type</label>
	<span class="field">
		
		<?php echo $this->Form->input('type',array("id"=>"type","type"=>"select",'error' => false,"data-placeholder"=>"Select Type...","class"=>"chzn-select","style"=>"width:280px",'label'=>false,'div'=>false,"tabindex"=>"3","options"=>$loanType1,"empty"=>"Select Type"));?>
		
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