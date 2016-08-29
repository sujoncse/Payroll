<?php
/**
 * @Developed By	:	Engr. Rajib Mahmud
 * @Start Date	  	:	2nd Sep 2013
 * @Last Update		:	10th Sep 2013
 * @Copyright     	:  	Bangladesh Agricultural Research Council
 * @Link          	:  	http://www.barc.gov.bd
 * */
 	echo $this->Form->create('Setting',array('url'=>array('controller'=>'settings','action'=>'index'),"class"=>"stdform stdform2",'id'=>'index'));
   	echo $this->Form->hidden('id');
   	echo $this->Html->css(array("admin/datepicker"));
?>
<h4 class="widgettitle">Application Settings</h4>
<div class="widgetcontent bordered shadowed nopadding">
	<p>
		<label>Title</label>
        <span class="field"><?php echo $this->Form->input('title',array("id"=>"title","type"=>"text","class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"31"));?></span>
    </p>
    <p id="add_hr">
    	<label>Admin Emails</label>
        <span class="field"><?php echo $this->Form->input('admin_email',array("id"=>"adminEmail","type"=>"text","class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"31"));?></span>
    </p>
    <p>
    	<label>Copyright Text</label>
    	<span class="field"><?php echo $this->Form->input('copyright',array("id"=>"copyrightText","type"=>"textarea","class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"31"));?></span>
    </p>
    <p>
    	<label>Pay Scale Title</label>
        <span class="field"><?php echo $this->Form->input('pay_scale',array("id"=>"payScale","type"=>"text","class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"31"));?></span>
    </p>
    <p>
		<label>Launch Date</label>
        <span class="field">
        	<?php
        		if(empty($this->data["Setting"]["launch"])) 
        			echo $this->Form->input('launch',array("id"=>"launch","data-date-format"=>"dd-mm-yyyy","data-date-viewmode"=>"years", 'error' => false,"type"=>"text","class"=>"input-xlarge","placeholder"=>"YYYY-MM-DD",'label'=>false,'div'=>false, "tabindex"=>"32","readonly"=>"true"));
        		else
        			echo $this->Form->input('launch',array("id"=>"launch","data-date-format"=>"dd-mm-yyyy","data-date-viewmode"=>"years", 'error' => false,"type"=>"text","class"=>"input-xlarge","placeholder"=>"YYYY-MM-DD",'label'=>false,'div'=>false, "tabindex"=>"32","readonly"=>"true","disabled"=>true));
        	?>
        </span>
    </p>
    <p>
    	<label>Website Status</label>
        <span class="formwrapper">
        	<input type="radio" name="website" checked="checked" id="website" value="1"/> Live &nbsp; &nbsp;
            <input type="radio" name="website" id="website" value = "0"/> Maintenance 
        </span>
    </p>
    <p class="stdformbutton"><button class="btn btn-primary">Save</button></p>
</div>
<?php echo $this->Form->end();?>
<script>
	$('#launch').datepicker();
	function submitForm(){ 
		$('#index').submit();
	}
</SCRIPT>