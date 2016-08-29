<?php
/**
 * @Developed By	:	Engr. Rajib Mahmud
 * @Start Date	  	:	2nd Sep 2013
 * @Last Update		:	16th Sep 2013
 * @Copyright     	:  	Bangladesh Agricultural Research Council
 * @Link          	:  	http://www.barc.gov.bd
 * */

App::uses('AppController', 'Controller');
class SettingsController extends AppController {
	public $name = 'Settings';
	public $uses = array("User","PayScale","Designation","Validator","CommonSetting");
	public $layout = "admin";
	
	
	function beforeFilter(){
  		$this->adminCheck();
  		$this->myBeforeController();	
		Configure::load('constant');
	}
	
	/**
	 * Display admin dashboard
	 */
	public function index(){ 
		if(!empty($this->data)){
			$data["Setting"] = $this->data["Setting"];
			$data["Setting"]["status"] = $this->data["website"]; 
			if(!empty($this->data) AND !$this->dataCheck($this->data["Setting"],1)){
				$data["Setting"]["id"] = 1;
				if(!empty($data["Setting"]["launch"])){
					$date = explode('-',$data["Setting"]["launch"]);
				    $data["Setting"]["launch"] = mktime(0,0,0,$date[1],$date[0],$date[2]);
				    $data["Setting"]["updated"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
				    $settings = $this->Setting->find("first",array("fields"=>array("execution_date","created")));
				    if(empty($settings["Setting"]["created"]) OR $settings["Setting"]["created"] == 0)
				    	$data["Setting"]["created"] = $data["Setting"]["updated"];
				    if($settings["Setting"]["execution_date"] == 0)
				    	$data["Setting"]["execution_date"] = $data["Setting"]["launch"]; 
				}
				$this->Setting->save($data["Setting"]);
			}
		}
		$this->data = $this->Setting->find("first");
		if(!empty($this->data["Setting"]["launch"]))
			$this->request->data["Setting"]["launch"] = date("d-m-Y",$this->data["Setting"]["launch"]);
		else
			$this->request->data["Setting"]["launch"] = NULL;
	}
	
	function commonSetting(){
		$this->loadModel('commonSetting');
		if(!empty($this->data)){
			$data["commonSetting"] = $this->data["commonSetting"];
			$data["commonSetting"]["id"] = 1;
			$this->commonSetting->save($data["commonSetting"]);
		}
		$this->data = $this->commonSetting->find("first");
	}
	
	function dataCheck($data, $fn){
		$error = 0;
		if($fn == 1){
			$this->Setting->set($data);
			$data["title"] = addslashes($data["title"] ? trim($data["title"]) : null);
			$data["pay_scale"] = addslashes($data["pay_scale"] ? trim($data["pay_scale"]) : null);
			$data["admin_email"] = addslashes($data["admin_email"] ? trim($data["admin_email"]) : null);
			$data["copyright"] = addslashes($data["copyright"] ? trim($data["copyright"]) : null);
			$this->Setting->validate = array(
		        'title' => array(
		             'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message'  => 'Input Required.'
		            )
		        ),
		        'pay_scale' => array(
		             'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message'  => 'Input Required.'
		            )
		        ),
		        'admin_email' => array(
		             'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message'  => 'Input Required.'
		            )
		        ),
		        'copyright' => array(
		             'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message'  => 'Input Required.'
		            )
		        )
		    );
			if(!$this->Setting->validates()){
				$errors = $this->Setting->validationErrors;
				$this->set("errors", $errors);
			}
		}elseif($fn == 2){
			$this->PayScale->set($data);
			$data["scale"] = addslashes($data["scale"] ? trim($data["scale"]) : null);
			$data["increment"] = addslashes($data["increment"] ? trim($data["increment"]) : null);
			$data["increment_iteration"] = addslashes($data["increment_iteration"] ? trim($data["increment_iteration"]) : null);
			$data["eb"] = addslashes($data["eb"] ? trim($data["eb"]) : null);
			$data["eb_iteration"] = addslashes($data["eb_iteration"] ? trim($data["eb_iteration"]) : null);
			$this->PayScale->validate = array(
		        'scale' => array(
		             'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message'  => 'Input Required.'
		            )/*,
		            'isUnique' => array(
		               	'rule'    => "isUnique",
		                'required' => true,
		                'message'  => 'Same scale inserted.'
		            ),
		            'numeric' => array(
		               	'rule'    => "numeric",
		                'required' => true,
		                'message'  => 'Invalid input.'
		            )*/
		        ),
		        'increment' => array(
		             'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message'  => 'Input Required.'
		            ),
		            'isUnique' => array(
		               	'rule'    => "isUnique",
		                'required' => true,
		                'message'  => 'Same scale inserted.'
		            ),
		            'numeric' => array(
		               	'rule'    => "numeric",
		                'required' => true,
		                'message'  => 'Invalid input.'
		            )
		        ),
		        'increment_iteration' => array(
		             'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message'  => 'Input Required.'
		            ),
		            'numeric' => array(
		               	'rule'    => "numeric",
		                'required' => true,
		                'message'  => 'Invalid input.'
		            )
		        ),
		        'eb' => array(
		             'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'allowEmpty' => true,
		                'message'  => 'Input Required.'
		            ),
		           /* 'isUnique' => array(
		               	'rule'    => "isUnique",
		                'allowEmpty' => true,
		                'message'  => 'Same scale inserted.'
		            ), */
		            'numeric' => array(
		               	'rule'    => "numeric",
		                'allowEmpty' => true,
		                'message'  => 'Invalid input.'
		            )
		        ),
		        'eb_iteration' => array(
		             'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'allowEmpty' => true,
		                'message'  => 'Input Required.'
		            ),
		            'numeric' => array(
		               	'rule'    => "numeric",
		                'allowEmpty' => true,
		                'message'  => 'Invalid input.'
		            )
		        )
		    );
			if(!$this->PayScale->validates()){
				$errors = $this->PayScale->validationErrors;
				$this->set("errors", $errors);
			}
		}elseif($fn == 3){
			$this->Designation->set($data);
			$data["title"] = addslashes($data["title"] ? trim($data["title"]) : null);
			$this->Designation->validate = array(
		        'title' => array(
		             'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message'  => 'Input Required.'
		            ),
		           /* 'isUnique' => array(
		               	'rule'    => "isUnique",
		                'required' => true,
		                'message'  => 'Same designation inserted.'
		            ) */
		        )
		    );
			if(!$this->Designation->validates()){
				$errors = $this->Designation->validationErrors;
				$this->set("errors", $errors);
			}
		}
		return $error;
	}
	public function payScale(){
		$payScales = $this->PayScale->find("all",array("","","order"=>"PayScale.grade ASC")); 	
		$this->set("payScales",$payScales);
	}
	
	public function addScale(){
		if(!empty($this->data) AND !$this->dataCheck($this->data["PayScale"],2)){
			$data["PayScale"] = $this->data["PayScale"];
			$data["PayScale"]["status"] = 1;
			if(empty($data["PayScale"]["increment"]))
				$data["PayScale"]["increment"] = 0; 
			if(empty($data["PayScale"]["increment_iteration"]))
				$data["PayScale"]["increment_iteration"] = 0;
			if(empty($data["PayScale"]["eb"]))
				$data["PayScale"]["eb"] = 0;
			if(empty($data["PayScale"]["eb_iteration"]))
				$data["PayScale"]["eb_iteration"] = 0;
			$data["PayScale"]["created"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
			$data["PayScale"]["updated"] = $data["PayScale"]["created"];
			$data['PayScale']['terminal'] = $_SERVER['REMOTE_ADDR'];
			if ($this->PayScale->save($data["PayScale"])){
				$this->Session->setFlash('Pay Scale Saved!');
				$this->redirect("/settings/payScale/");
			} else {
				$this->Session->setFlash("Error in addition. Please try again.","flash_bad");
			}
		}
	}
	
	public function editScale($id){
		//if(!empty($this->data) AND !$this->dataCheck($this->data["PayScale"],2)){
		if(!empty($this->data)){	
			$data["PayScale"] = $this->data["PayScale"];
			$data["PayScale"]["status"] = 1;
			if(empty($data["PayScale"]["increment"]))
				$data["PayScale"]["increment"] = 0; 
			if(empty($data["PayScale"]["increment_iteration"]))
				$data["PayScale"]["increment_iteration"] = 0;
			if(empty($data["PayScale"]["eb"]))
				$data["PayScale"]["eb"] = 0;
			if(empty($data["PayScale"]["eb_iteration"]))
				$data["PayScale"]["eb_iteration"] = 0;
			$data["PayScale"]["updated"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
			$data['PayScale']['terminal'] = $_SERVER['REMOTE_ADDR'];
			$data["PayScale"]["id"] = $id;
			if ($this->PayScale->save($data["PayScale"])){
				$this->Session->setFlash('Pay Scale Saved!');
				$this->redirect("/settings/payScale/");
			} else {
				$this->Session->setFlash("Error in addition. Please try again.","flash_bad");
			}
		}
		$this->data = $this->PayScale->find("first",array("conditions"=>"PayScale.id = '".$id."'"));
		$this->set("id",$id); 
	}
	
	public function designationList(){
		$designations = $this->Designation->find("all"); 	
		$this->set("designations",$designations);
	
	}
	
	public function addDesignation(){
		if(!empty($this->data) AND !$this->dataCheck($this->data["Designation"],3)){
			$data["Designation"] = $this->data["Designation"];
			$data["Designation"]["status"] = 1;
			$data["Designation"]["created"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
			$data["Designation"]["updated"] = $data["Designation"]["created"];
			$data['Designation']['terminal'] = $_SERVER['REMOTE_ADDR'];
			if ($this->Designation->save($data["Designation"])){
				$this->Session->setFlash('Designation Saved!');
				$this->redirect("/settings/designationList/");
			} else {
				$this->Session->setFlash("Error in addition. Please try again.","flash_bad");
			}
		}
	}
	
	public function editDesignation($id){
		if(!empty($this->data) AND !$this->dataCheck($this->data["Designation"],3)){
			$data["Designation"] = $this->data["Designation"];
			$data["Designation"]["status"] = 1;
			$data["Designation"]["updated"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
			$data['Designation']['terminal'] = $_SERVER['REMOTE_ADDR'];
			$data["Designation"]["id"]= $id;
			if ($this->Designation->save($data["Designation"])){
				$this->Session->setFlash('Designation Saved!');
				$this->redirect("/settings/designationList/");
			} else {
				$this->Session->setFlash("Error in addition. Please try again.","flash_bad");
			}
		}
		$this->data = $this->Designation->find("first",array("conditions"=>"Designation.id = '".$id."'"));
		$this->set("id",$id); 
	}
	
	function desTypeFix(){
		$designations = $this->Designation->find("all",array("fields"=>array("id")));
		foreach($designations as $designation){
			$designation["Designation"]["type"] = 1;
			$data[] = $designation;
		}
		$this->Designation->saveMany($data);
		$this->redirect("/settings/designationList");	
	}
	
	function statusChange($fn,$val,$id){
		$this->adminCheck();
		if($fn == 1){
			//$id = $this->Designation->find("first",array("conditions"=>"Designation.id = $id","fields"=>"id"));
		    if($this->switchValue($id,$val,"Designation","status")){
				$this->Session->setFlash(array('Status changed successfully.',"Thank you."), 'default', array('class' => 'alert-success'));
				$this->redirect("/settings/designationList");
		    }else{
		       $this->Session->setFlash(array('Change failed.',"Please try again."), 'default', array('class' => 'alert-error'));
		       $this->redirect("/settings/designationList");
		    }
		}
	}
	
	public function salary($desId){
		$grade = $this->Designation->find("first",array("conditions"=>"Designation.id = $desId"),array("fields"=>"grade"));
		echo json_encode($data["Designation"]["grade"]);
		
	}
}