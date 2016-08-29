<?php
/**
 * @Developed By	:	Engr. Rajib Mahmud
 * @Start Date	  	:	2nd Sep 2013
 * @Last Update		:	17th Sep 2013
 * @Copyright     	:  	Bangladesh Agricultural Research Council
 * @Link          	:  	http://www.barc.gov.bd
 * 
 * */
 echo $this->Html->script(array("admin/jquery.dataTables"));
 ?>
 <?php $msg = $this->Session->read("Message");  if(!empty($msg["flash"]["message"])){ ?>
<div class="alert <?php echo $msg["flash"]["params"]["class"];?>">
	<button data-dismiss="alert" class="close" type="button">×</button>
  	<strong><?php echo $msg["flash"]["message"]["0"];?></strong> <?php echo $msg["flash"]["message"]["1"];?>
</div>
<?php } ?>
<h4 class="widgettitle"><?php if($type == 1) echo "Officer's"; elseif($type == 2) echo "Staff's";?> payroll register</h4>
<?php 
 echo $this->Form->create('GeneratedSalary',array('url'=>array('controller'=>'reportManagements','action'=>'preg',$type),"class"=>"stdform stdform2",'id'=>'gs'));
 echo $this->Form->hidden('id');
?>
<div>
	<div class="widgetcontent bordered shadowed nopadding">
		<p><label><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/>Designation</label>
			<span class="field"><?php echo $this->Form->input('designation_id',array("id"=>"desId","type"=>"select",'error' => false,"data-placeholder"=>"Choose a Country...","class"=>"chzn-select","style"=>"width:280px","onchange"=>"getEmp()",'label'=>false,'div'=>false,"tabindex"=>"1","options"=>$designations,"empty"=>"Select Designation"));?></span>
		</p>
		<p id="loadingImage" style="display:none;"><span class="field"><img src="<?php echo $this->webroot."img/loading.gif";?>" style="width:215px; height:10px;"/></span></p>
		<p id="employee"><label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Employee</label>
			<span class="field"><?php echo $this->Form->input('employee_id',array("id"=>"empId","type"=>"select",'error' => false,"data-placeholder"=>"Choose an employee...","class"=>"chzn-select","style"=>"width:280px",'label'=>false,'div'=>false,"tabindex"=>"2","options"=>NULL,"empty"=>"Select Employee","disabled"=>"true"));?></span>
		</p>
		<p class="stdformbutton">
			<button class="btn btn-primary">Search</button>
		</p>
	</div>
</div>
<?php echo $this->Form->end();?>
<table class="table table-bordered" id="salary">
    <thead>
        <tr>
          	<th class="head0">Employee</th>
            <th class="head1">Designation</th>
            <th class="head0">Basic</th>
            <th class="head1">Benevolent Fund</th>
            <?php if(!empty($id)){?>
            <th class="head0 right"><a href="<?php echo $this->webroot."reportManagements/pregPdf/".$id."/PR_".date('F, Y').".pdf";;?>" class="btn btn-primary">Generate Report</a></th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
    	<?php 
    		if(!empty($salaries)){
    			foreach($salaries as $salary){ 
        ?>
        <tr class="gradeA">
          	<td>
          		<?php 
          			if(!empty($salary["Employee"]["middle_name"])) 
          				echo $salary["Employee"]["first_name"]." ".$salary["Employee"]["middle_name"]." ".$salary["Employee"]["last_name"];
          			else
          				echo $salary["Employee"]["first_name"]." ".$salary["Employee"]["last_name"];
          		?>
          	</td>
          	<td><?php echo $designations[$salary["Employee"]["designation_id"]]; if($salary["Employee"]["status"] == 2) echo " (AC)"; elseif($salary["Employee"]["status"] == 3) echo " (CC)";?></td>
          	<td><?php echo $salary["GeneratedSalary"]["basic"];?></td>
          	<td><?php echo $salary["GeneratedDeduction"]["benevolent_fund"];?></td>
          	<td><a href="<?php echo $this->webroot."salaryManagements/generatedDetail/".$salary["GeneratedSalary"]["id"];?>" class="btn btn-primary"><i class="icon-eye-open"></i>Detail</a></td>
        </tr>
        <?php } }else{ ?>
        	<tr class="gradeA"><td colspan="5">No data found.</td></tr>
        <?php } ?>
    </tbody>
</table>
<div class="divider15"></div>
<script>
<?php if(!empty($salaries)){ ?>
$(document).ready(function() {
    $('#salary').dataTable( {   } );
} );
<?php } ?>
</script>
<script type="text/javascript">
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
	
	
	function submitForm(){ 
		$('#gs').submit();
	}
</SCRIPT>