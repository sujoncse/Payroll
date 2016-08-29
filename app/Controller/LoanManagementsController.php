<?php
/**
 * @Developed By	:	Engr. Rajib Mahmud
 * @Start Date	  	:	2nd Sep 2013
 * @Last Update		:	16th Dec 2013
 * @Copyright     	:  	Bangladesh Agricultural Research Council
 * @Link          	:  	http://www.barc.gov.bd
 * */

App::uses('AppController', 'Controller');
class LoanManagementsController extends AppController {
	public $name = 'LoanManagements';
	public $uses = array("User","Loan","Designation","Validator","Refund","Deduction");
	public $layout = "admin";
	var $components = array("RequestHandler");
	
	function beforeFilter(){
  		$this->adminCheck();
  		$this->myBeforeController();	
		Configure::load('constant');
	}
	
	function index($type){ 
		$this->designations();
		$this->Loan->bindModel( array('belongsTo' => array(
		'Employee' => array(
        	'className'     => 'Employee',
            'foreignKey'    => 'employee_id',
            'conditions'    => array("Employee.status != 0 AND Employee.type = $type"),
            'dependent'     => true,
            "fields"		=> array("Employee.first_name","Employee.middle_name","Employee.last_name","Employee.grade","Employee.designation_id","Employee.employee_code")
        ))));
        $this->Loan->bindModel( array('hasMany' => array(
		'Refund' => array(
        	'className'     => 'refund',
            'foreignKey'    => 'loan_id',
            "order"			=> "Refund.id DESC",
            'dependent'     => true
        ))));
		$loans = $this->Loan->find("all");
		$this->set("loans",$loans);
	}
	
	/**
	 * Display admin dashboard
	 */
	function dataCheck($data, $fn){
		$this->loadModel('Validation');
		$error = 0;
		if($fn == 1){
			$data["Loan"]["total"] = addslashes($data["Loan"]["total"] ? trim($data["Loan"]["total"]) : null);
			$data["Loan"]["total_installment"] = addslashes($data["Loan"]["total_installment"] ? trim($data["Loan"]["total_installment"]) : null);
			$data["Refund"]["paid_amount"] = addslashes($data["Refund"]["paid_amount"] ? trim($data["Refund"]["paid_amount"]) : null);
			$data["Refund"]["paid_installment"] = addslashes($data["Refund"]["paid_installment"] ? trim($data["Refund"]["paid_installment"]) : null);
			$data["Refund"]["balance"] = addslashes($data["Refund"]["balance"] ? trim($data["Refund"]["balance"]) : null);
			$this->Loan->set($data);
			$this->Loan->validate = array(
		         'total' => array(
		             'numeric' => array(
		                'rule'     => 'numeric',
		                'required' => true,
		                'message'  => 'Invalid input.'
		            )
		        ),
		        'total_installment' => array(
		             'numeric' => array(
		                'rule'     => 'numeric',
		                'required' => true,
		                'message'  => 'Invalid input.'
		            )
		        ),
		        'amount' => array(
		             'numeric' => array(
		                'rule'     => 'numeric',
		                'required' => true,
		                'message'  => 'Invalid input.'
		            )
		        )
		    );
		    if(!$this->Loan->validates()){
				$errors = $this->Loan->validationErrors;
				$this->set("errors", $errors);
			}
		    $this->Refund->validate = array(
		         'paid_amount' => array(
		             'numeric' => array(
		                'rule'     => 'numeric',
		                'required' => true,
		                'message'  => 'Invalid input.'
		            )
		        ),
		        'paid_installment' => array(
		             'numeric' => array(
		                'rule'     => 'numeric',
		                'required' => true,
		                'message'  => 'Invalid input.'
		            )
		        ),
		        'balance' => array(
		             'numeric' => array(
		                'rule'     => 'numeric',
		                'required' => true,
		                'message'  => 'Invalid input.'
		            )
		        )
		    );
		   	
			if(!$this->Refund->validates()){
				$errors = $this->Refund->validationErrors;
				$this->set("errors", $errors);
			}
		}
		return $error;
	}
	
	public function loanInfo($id,$type){
		pr($id); pr($type); die();
	}
	
	public function addLoan(){
		$this->designations();
		$userInfo = $this->Session->read("ADMIN_INFO"); 
		if(!empty($this->data) AND !$this->dataCheck($this->data,1)){
			
			$empp_id = $this->data["employee_id"];
			$emp_type = $this->Employee->find("first",array("conditions"=>"Employee.id = $empp_id"));
			
			$this->request->data["Loan"]["status"] = 1;
			$this->request->data["Loan"]["user_id"] = $userInfo["id"];
			$this->request->data["Loan"]["employee_id"] = $this->data["employee_id"];
			$this->request->data["Loan"]["type"] = $this->data["type"];
			unset($this->request->data["employee_id"]);
			$this->request->data["Loan"]["created"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
			$this->request->data["Loan"]["updated"] = $this->data["Loan"]["created"];
			$this->request->data["Loan"]["total_installment"] = $this->data["Loan"]["total_installment"];
			$this->request->data["Loan"]["terminal"] = $_SERVER["REMOTE_ADDR"];
			$date = explode('-',$this->data["Loan"]["execution_date"]);
			$this->request->data["Loan"]["execution_date"] = mktime(0,0,0,$date[1],$date[0],$date[2]);
			$this->request->data["Loan"]["total_interest"] = round($this->data["Loan"]["total"]*$this->data["Loan"]["total_installment"]/500,0);
			$this->request->data["Refund"]["interest_balance"] = $this->request->data["Loan"]["total_interest"]; 
			//pr($this->data); exit;
			if ($this->Loan->save($this->data["Loan"])){
				$this->request->data["Refund"]["loan_id"] = $this->Loan->getLastInsertID();
				$this->request->data["Refund"]["status"] = 1;
				$this->request->data["Refund"]["user_id"] = $userInfo["id"];
				$this->request->data["Refund"]["execution_date"] = $this->data["Loan"]["execution_date"];
				$this->request->data["Refund"]["created"] = $this->data["Loan"]["created"];
				$this->request->data["Refund"]["updated"] = $this->data["Loan"]["created"];
				$this->request->data["Refund"]["terminal"] = $_SERVER["REMOTE_ADDR"];
				if ($this->Refund->save($this->data["Refund"])){
					$deduction = $this->Deduction->find("first",array("conditions"=>"Deduction.employee_id = ".$this->data["Loan"]["employee_id"],"fields"=>"id"));
					if($this->data["Loan"]["type"] == 1)
						$deduction["Deduction"]["cpf_loan1"] = $this->data["Loan"]["amount"];
					elseif($this->data["Loan"]["type"] == 2)
						$deduction["Deduction"]["cpf_loan2"] = $this->data["Loan"]["amount"];
					elseif($this->data["Loan"]["type"] == 3)
						$deduction["Deduction"]["house_loan"] = $this->data["Loan"]["amount"];
					elseif($this->data["Loan"]["type"] == 4)
						$deduction["Deduction"]["vehicle_loan"] = $this->data["Loan"]["amount"];
					$deduction["Deduction"]["status"] = 1;
					if($this->Deduction->save($deduction)){
						$this->Session->setFlash(array('Data saved successfully.',"Thank you."), 'default', array('class' => 'alert-success'));
						$this->redirect("/loanManagements/index/". $emp_type["Employee"]["type"]);
					}
				}
			} else {
				$this->Session->setFlash(array('Saving failed.',"Please try again."), 'default', array('class' => 'alert-error'));
			}
		}
	}
	
	public function updateLoan($id){
		$this->designations();
		$userInfo = $this->Session->read("ADMIN_INFO"); 
		if(!empty($this->data) AND !$this->dataCheck($this->data,1)){ 
		
			$empp_id = $this->request->data["Loan"]["employee_id"];
			$emp_type = $this->Employee->find("first",array("conditions"=>"Employee.id = $empp_id"));
			
			//pr($this->request->data);
			//pr($this->data);exit;
			$this->request->data["Loan"]["status"] = $this->request->data["Loan"]["status"];
			$this->request->data["Loan"]["user_id"] = $userInfo["id"];
			$this->request->data["Loan"]["employee_id"] = $this->request->data["Loan"]["employee_id"];//$this->data["employee_id"];
			//unset($this->request->data["employee_id"]);
			$this->request->data["Loan"]["created"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
			$this->request->data["Loan"]["updated"] = $this->data["Loan"]["created"];
			$this->request->data["Loan"]["terminal"] = $_SERVER["REMOTE_ADDR"];
			$date = explode('-',$this->data["Loan"]["execution_date"]);
			$this->request->data["Loan"]["execution_date"] = mktime(0,0,0,$date[1],$date[0],$date[2]);
			$this->request->data["Loan"]["total_interest"] = round($this->data["Loan"]["total"]*$this->data["Loan"]["total_installment"]/500,0);
			$this->request->data["Refund"]["interest_balance"] = $this->request->data["Loan"]["total_interest"]; 
			//pr($this->data); die();
			if ($this->Loan->save($this->data["Loan"])){
				$rrefund = $this->Refund->find("first",array("conditions"=>"Refund.loan_id = ".$id));
				//pr($rrefund['Refund']['id']);
				$this->request->data["Refund"]["id"] = $rrefund['Refund']['id'];
				$this->request->data["Refund"]["loan_id"] = $id;//$this->request->data["Loan"]["id"]; //$this->Loan->getLastInsertID();
				$this->request->data["Refund"]["status"] = 1;
				$this->request->data["Refund"]["user_id"] = $userInfo["id"];
				$this->request->data["Refund"]["execution_date"] = $this->data["Loan"]["execution_date"];
				$this->request->data["Refund"]["created"] = $this->data["Loan"]["created"];
				$this->request->data["Refund"]["updated"] = $this->data["Loan"]["created"];
				$this->request->data["Refund"]["terminal"] = $_SERVER["REMOTE_ADDR"];
				if ($this->Refund->save($this->data["Refund"])){
					$deduction = $this->Deduction->find("first",array("conditions"=>"Deduction.employee_id = ".$this->data["Loan"]["employee_id"],"fields"=>"id"));
					if($this->data["Loan"]["type"] == 1){
						if($this->data["Loan"]["status"] == 1){
							$deduction["Deduction"]["cpf_loan1"] = $this->data["Loan"]["amount"];
						}
						else{
							$deduction["Deduction"]["cpf_loan1"] = 0;
						}
					}	
					elseif($this->data["Loan"]["type"] == 2){
						if($this->data["Loan"]["status"] == 1){
							$deduction["Deduction"]["cpf_loan2"] = $this->data["Loan"]["amount"];
						}
						else{
							$deduction["Deduction"]["cpf_loan2"] = 0;
						}
					}	
					elseif($this->data["Loan"]["type"] == 3){
						if($this->data["Loan"]["status"] == 1){
							$deduction["Deduction"]["house_loan"] = $this->data["Loan"]["amount"];
						}
						else{
							$deduction["Deduction"]["house_loan"] = 0;
						}
					}	
					elseif($this->data["Loan"]["type"] == 4){
						if($this->data["Loan"]["status"] == 1){
							$deduction["Deduction"]["vehicle_loan"] = $this->data["Loan"]["amount"];
						}
						else{
							$deduction["Deduction"]["vehicle_loan"] = 0;
						}
					}	
					$deduction["Deduction"]["status"] = 1;
					if($this->Deduction->save($deduction)){
						$this->Session->setFlash(array('Data saved successfully.',"Thank you."), 'default', array('class' => 'alert-success'));
						$this->redirect("/loanManagements/index/". $emp_type["Employee"]["type"]);
					}
				}
				
				
			} else {
				$this->Session->setFlash(array('Saving failed.',"Please try again."), 'default', array('class' => 'alert-error'));
			}
		}
		$this->Loan->bindModel( array('belongsTo' => array(
		'Employee' => array(
        	'className'     => 'Employee',
            'foreignKey'    => 'employee_id',
            'conditions'    => array("Employee.status != 0"),
            'dependent'     => true,
            "fields"		=> array("Employee.first_name","Employee.middle_name","Employee.last_name","Employee.grade","Employee.designation_id")
        ))));
        $this->Loan->bindModel( array('hasOne' => array(
		'Refund' => array(
        	'className'     => 'refund',
            'foreignKey'    => 'loan_id',
            'dependent'     => true
        ))));
		$this->data = $this->Loan->find("first",array("conditions"=>"Loan.id = $id"));
		$this->set("id",$id);
		$this->set("employees",$this->employees($this->data["Loan"]["employee_id"]));
		$this->request->data["Loan"]["execution_date"] = date("d-m-Y",$this->data["Loan"]["execution_date"]);
	}
		
}
