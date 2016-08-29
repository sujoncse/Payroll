<?php
/**
 * @Developed By	:	Engr. Rajib Mahmud
 * @Start Date	  	:	2nd Sep 2013
 * @Last Update		:	17th Sep 2013
 * @Copyright     	:  	Bangladesh Agricultural Research Council
 * @Link          	:  	http://www.barc.gov.bd
 * */
 $grades = Configure::read("grades");
 	echo $this->Form->create('Designation',array('url'=>array('controller'=>'settings','action'=>'addDesignation'),"class"=>"stdform stdform2",'id'=>'addDesignation'));
 	echo $this->Form->hidden('id');
?>
<h4 class="widgettitle">Employee Designation</h4>
<div class="widgetcontent bordered shadowed nopadding">
	<p>
		<label>Designation Title</label>
        <span class="field"><?php echo $this->Form->input('title',array("id"=>"title","type"=>"text","class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"31"));?></span>
    </p>
    <p id="add_hr">
    	<label>Grade</label>
        <span class="field"><?php echo $this->Form->input('grade',array("type"=>"select",'label'=>false,'div'=>false,"class"=>"uniformselect", "tabindex"=>"2","options"=>$grades,"size"=>"4","default"=>NULL));?></span>
    </p>
    <p>
		<label>Type</label>
		<span class="field">
        	<input type="radio" name="Designation[type]" id="type" checked value="1" style="opacity: 1;" tabindex="17"/> Regular &nbsp; &nbsp;
            <input type="radio" name="Designation[type]" id="type" value = "2" style="opacity: 1;" tabindex="18"/> Contractual
        </span>
	</p>
    <p class="stdformbutton"><button class="btn btn-primary">Save</button></p>
</div>
<?php echo $this->Form->end();?>
<script>
	function submitForm(){ 
		$('#addDesignation').submit();
	}
</SCRIPT>