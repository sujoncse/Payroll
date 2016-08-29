<?php
/**
 * @Developed By	:	Engr. Rajib Mahmud
 * @Start Date	  	:	2nd Sep 2013
 * @Last Update		:	10th Sep 2013
 * @Copyright     	:  	Bangladesh Agricultural Research Council
 * @Link          	:  	http://www.barc.gov.bd
 * */
 $settingInfo = $this->Session->read("SETTING_INFO");
 $grades = Configure::read("grades");
 echo $this->Html->script(array("admin/jquery.dataTables"));
 $msg = $this->Session->read("Message");
 //pr($_SESSION);
 ?>
<div class="alert <?php echo $msg["flash"]["params"]["class"];?>">
  <button data-dismiss="alert" class="close" type="button">×</button>
  <strong><?php echo $msg["flash"]["message"]["0"];?></strong> <?php echo $msg["flash"]["message"]["1"];?>
</div>
<div class="row-fluid">
	<div class="span12">
    	<ul class="widgeticons row-fluid">
    		<li class="one_third">
    			<a href="<?php echo $this->webroot."salaryManagements"; ?>" title="Salary Management">   
                	<img src="<?php echo $this->webroot; ?>img/gold_coin.png" alt="" />
            	</a>
            </li>
            <li class="one_third">
	        	<a href="<?php echo $this->webroot."pfManagements#"; ?>" title="Provident Fund Management">   
	                <img src="<?php echo $this->webroot; ?>img/pf.png" alt="" />
	            </a>
	        </li>
	        <li class="one_third">
				<a href="<?php echo $this->webroot."loanManagements#"; ?>" title="Loan Management">   
	                <img src="<?php echo $this->webroot; ?>img/loan.png" alt=""/>
	            </a>
	        </li>
            <li class="one_third last">
				<a href="<?php echo $this->webroot."settings"; ?>" title="Basic Settings">   
	                <img src="<?php echo $this->webroot; ?>img/settings.png" alt=""/>
	            </a>
            </li>
        </ul>
	</div>
</div>
<h4 class="widgettitle">National Pay Scale <?php echo $settingInfo["pay_scale"]; ?></h4>
<table class="table table-bordered" id="payScale">
    <thead>
        <tr>
			<th>Sl.</th>
          	<th class="head0">Grade</th>
            <th class="head1">Scale</th>
            <!--<th class="head0">Increment</th>
            <th class="head1">Increment Iteration</th>
            <th class="head1">Interim Scale</th>
            <th class="head0">Efficiency Bar</th>
            <th class="head1">EB Iteration</th>
            <th class="head1">Upper Limit</th>-->
        </tr>
    </thead>
    <tbody>
    	<?php 
        	if(!empty($payScales)){ $j=1;
        		foreach($payScales as $payScale){
        ?>
        <tr class="gradeA">
			<td><?php echo $j;?></td>
          	<td><?php echo $grades[$payScale["PayScale"]["grade"]];?></td>
            <td><?php echo $payScale["PayScale"]["scale"];?></td>
            <!--<td><?php echo $payScale["PayScale"]["increment"]; ?></td>
            <td><?php echo $payScale["PayScale"]["increment_iteration"]; ?></td>
            <td><?php echo $payScale["PayScale"]["scale"] + ($payScale["PayScale"]["increment"]*$payScale["PayScale"]["increment_iteration"]); ?></td>
            <td><?php echo $payScale["PayScale"]["eb"];?></td>
            <td><?php echo $payScale["PayScale"]["eb_iteration"]; ?></td>
            <td><?php echo $payScale["PayScale"]["scale"] + ($payScale["PayScale"]["increment"]*$payScale["PayScale"]["increment_iteration"]) + ($payScale["PayScale"]["eb_iteration"] * $payScale["PayScale"]["eb"]);?></td>-->
        </tr>
        <?php $j++; } } ?>
    </tbody>
</table>
<div class="divider15"></div>
<script>
jQuery('#payScale').dataTable({
	"sPaginationType": "full_numbers",
});
</script>