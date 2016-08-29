<?php
/**
 * @Developed By	:	Engr. Rajib Mahmud
 * @Start Date	  	:	2nd Sep 2013
 * @Last Update		:	17th Sep 2013
 * @Copyright     	:  	Bangladesh Agricultural Research Council
 * @Link          	:  	http://www.barc.gov.bd
 * */
 $grades = Configure::read("grades");
 	echo $this->Form->create('PayScale',array('url'=>array('controller'=>'settings','action'=>'addScale'),"class"=>"stdform stdform2",'id'=>'addScale'));
 	echo $this->Form->hidden('id');
?>
<h4 class="widgettitle">Pay Scale</h4>
<div class="widgetcontent bordered shadowed nopadding">
	 <p id="add_hr">
    	<label>Grade</label>
        <span class="field"><?php echo $this->Form->input('grade',array("type"=>"select",'label'=>false,'div'=>false,"class"=>"uniformselect", "tabindex"=>"2","options"=>$grades,"size"=>"6","default"=>NULL));?></span>
    </p>
	<p>
		<label>Scale</label>
        <span class="field"><?php echo $this->Form->input('scale',array("id"=>"scale","type"=>"text","class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"31"));?></span>
    </p>
   <p>
		<label>Increment Rate</label>
        <span class="field"><?php echo $this->Form->input('increment',array("id"=>"increment","type"=>"text","class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"31"));?></span>
    </p>
   <p>
		<label>Increment Iteration</label>
        <span class="field"><?php echo $this->Form->input('increment_iteration',array("id"=>"increment_iteration","type"=>"text","class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"31"));?></span>
    </p>
    <p>
		<label>Efficiency Bar</label>
        <span class="field"><?php echo $this->Form->input('eb',array("id"=>"eb","type"=>"text","class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"31"));?></span>
    </p>
    <p>
		<label>EB Iteration</label>
        <span class="field"><?php echo $this->Form->input('eb_iteration',array("id"=>"eb_iteration","type"=>"text","class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"31"));?></span>
    </p>
    <p class="stdformbutton"><button class="btn btn-primary">Save</button></p>
</div>
<?php echo $this->Form->end();?>
<script>
	function submitForm(){ 
		$('#addScale').submit();
	}
</SCRIPT>