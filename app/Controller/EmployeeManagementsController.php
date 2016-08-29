<?php
/**
 * @Developed By	:	Engr. Rajib Mahmud
 * @Start Date	  	:	2nd Sep 2013
 * @Last Update		:	10th Sep 2013
 * @Copyright     	:  	Bangladesh Agricultural Research Council
 * @Link          	:  	http://www.barc.gov.bd
 * */

App::uses('AppController', 'Controller');
class EmployeeManagementsController extends AppController {
	public $name = 'EmployeeManagements';
	public $uses = array("User","Employee","EmployeePersonal","PayScale","Validator","Salary","Deduction","Cpf");
	public $layout = "admin";
	var $components = array("RequestHandler");
	
	
	function beforeFilter(){
  		$this->myBeforeController();
  		$this->adminCheck();	
		Configure::load('constant');
		$this->Session->delete("Message");
	}
	
	/**
	 * Display admin dashboard
	 */
	public function index($type){
		$this->designations();
		$conditions = NULL;
		$this->paginate = array('limit' => 10,'order' => array('id' => 'desc'));
	    $conditions[] = "Employee.type = $type";
		$employee = NULL;
		$this->Employee->bindModel( array('hasOne' => array(
			'EmployeePersonal' => array(
	        	'className'     => 'EmployeePersonal',
	            'foreignKey'    => 'employee_id',
	            'conditions'    => array("Employee.status != 0","EmployeePersonal.status != 0"),
	            'dependent'     => true
	        ))));
       $this->Employee->bindModel( array('belongsTo' => array(
		'PayScale' => array(
        	'className'     => 'PayScale',
            'foreignKey'    => 'pay_scale_id',
            "fields"		=> array("scale"),
            'dependent'     => true
        ))));
        $employees = $this->Employee->find("all",array("conditions"=>$conditions,"order"=>array("Employee.designation_id ASC" ,"Employee.employee_code ASC")));
        $this->set('employees',$employees);
		$this->set("type",$type);
	}
	
	function statusChange($id, $val){
		$this->Employee->bindModel( array('hasOne' => array(
			'EmployeePersonal' => array(
	        	'className'     => 'EmployeePersonal',
	            'foreignKey'    => 'employee_id',
	            'conditions'    => '',//array("EmployeePersonal.status != 0"),
	            'dependent'     => true
	        ))));
	    $this->Employee->bindModel( array('hasOne' => array(
			'Salary' => array(
	        	'className'     => 'Salary',
	            'foreignKey'    => 'employee_id',
	            'conditions'    => '',//array("Salary.status != 0"),
	            'dependent'     => true
	        ))));
	    $this->Employee->bindModel( array('hasOne' => array(
			'Deduction' => array(
	        	'className'     => 'Deduction',
	            'foreignKey'    => 'employee_id',
	            'conditions'    => '',//array("Deduction.status != 0"),
	            'dependent'     => true
	        ))));
	    $conditions[] = "Employee.id = $id";
	    //$conditions[] = "Employee.status != 0";
	    $employee = $this->Employee->find("first",array("conditions"=>$conditions,"fields"=>array("id","status","type","EmployeePersonal.employee_id","EmployeePersonal.status","Salary.id","Salary.status","Deduction.id","Deduction.status")));
	    if(!empty($employee)){
		    $this->switchValue($employee["Employee"]["id"],$val,"Employee","status");
		    $this->switchValue($employee["EmployeePersonal"]["employee_id"],$val,"EmployeePersonal","status");
		    $this->switchValue($employee["Salary"]["id"],$val,"Salary","status");
		    $this->switchValue($employee["Deduction"]["id"],$val,"Deduction","status");
	    }
	    //pr($employee);
	    $this->redirect("/employeeManagements/index/". $employee["Employee"]["type"]);
	}
	 
	function dataCheck($data, $fn){
		$this->loadModel('Validation');
		$errors = NULL;
		if($fn == 1){
			$data["Employee"]['employee_code'] = addslashes($data["Employee"]['employee_code'] ? trim($data["Employee"]['employee_code']) : null);
			$data["Employee"]['first_name'] = addslashes($data["Employee"]['first_name'] ? trim($data["Employee"]['first_name']) : null);
			$data["Employee"]['middle_name'] = addslashes($data["Employee"]['middle_name'] ? trim($data["Employee"]['middle_name']) : null);
			$data["Employee"]['last_name'] = addslashes($data["Employee"]['last_name'] ? trim($data["Employee"]['last_name']) : null);
			$data["EmployeePersonal"]['nid'] = addslashes($data["EmployeePersonal"]['nid'] ? trim($data["EmployeePersonal"]['nid']) : null);
			$data["EmployeePersonal"]['present_address'] = addslashes($data["EmployeePersonal"]['present_address'] ? trim($data["EmployeePersonal"]['present_address']) : null);
			$data["EmployeePersonal"]['permanent_address'] = addslashes($data["EmployeePersonal"]['permanent_address'] ? trim($data["EmployeePersonal"]['permanent_address']) : null);
			$data["EmployeePersonal"]['cell'] = addslashes($data["EmployeePersonal"]['cell'] ? trim($data["EmployeePersonal"]['cell']) : null);
			$data["EmployeePersonal"]['other_number'] = addslashes($data["EmployeePersonal"]['other_number'] ? trim($data["EmployeePersonal"]['other_number']) : null);
			$data["EmployeePersonal"]['f_name'] = addslashes($data["EmployeePersonal"]['f_name'] ? trim($data["EmployeePersonal"]['f_name']) : null);
			$data["EmployeePersonal"]['m_name'] = addslashes($data["EmployeePersonal"]['m_name'] ? trim($data["EmployeePersonal"]['m_name']) : null);
			$data["EmployeePersonal"]['s_name'] = addslashes($data["EmployeePersonal"]['s_name'] ? trim($data["EmployeePersonal"]['s_name']) : null);
			$data["EmployeePersonal"]['email'] = addslashes($data["EmployeePersonal"]['email'] ? trim($data["EmployeePersonal"]['email']) : null);
			$data["EmployeePersonal"]['bank'] = addslashes($data["EmployeePersonal"]['bank'] ? trim($data["EmployeePersonal"]['bank']) : null);
			$data["EmployeePersonal"]['account'] = addslashes($data["EmployeePersonal"]['account'] ? trim($data["EmployeePersonal"]['account']) : null);
			$data["Employee"]['basic'] = addslashes($data["Employee"]['basic'] ? trim($data["Employee"]['basic']) : null);
			$this->Employee->set($data["Employee"]);
			$this->Employee->validate = array(
		        'designation_id' => array(
		            'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message'  => 'Inpute Required.'
		            )
		        ),
		       /* 'joining_designation' => array(
		            'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message'  => 'Inpute Required.'
		            )
		        ), */
		        'employee_code' => array(
		             'custom' => array(
		                'rule'     => "/^[A-Za-z0-9]{2,15}$/i",
		                'allowEmpty' => true,
		                'message'  => 'Invalid character inserted.'
		            ),
		             'isUnique' => array(
		               	'rule'    => "isUnique",
		                'allowEmpty' => true,
		                'message'  => 'Same data inserted.'
		            )
		        ),
		        'first_name' => array(
		             'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message'  => 'Input Required.'
		            ),
		             'between' => array(
		                'rule'     => array("between","2","35"),
		                'required' => true,
		                'message'  => 'Out of range.'
		            ),
		            'custom' => array(
		               	'rule'    => "/^[A-Za-z .]{2,35}$/i",
		                'required' => true,
		                'message'  => 'Invalid character inserted.'
		            )
		        ),
		         'middle_name' => array(
		             'between' => array(
		                'rule'     => array("between","2","15"),
		                'allowEmpty' => true,
		                'message'  => 'Out of range.'
		            ),
		            'custom' => array(
		               	'rule'    => "/^[A-Za-z .]{2,15}$/i",
		                'allowEmpty' => true,
		                'message'  => 'Invalid character inserted.'
		            )
		        ),
		         'last_name' => array(
		             'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message'  => 'Input Required.'
		            ),
		             'between' => array(
		                'rule'     => array("between","2","35"),
		                'required' => true,
		                'message'  => 'Out of range.'
		            ),
		            'custom' => array(
		               	'rule'    => "/^[A-Za-z .]{2,35}$/i",
		                'required' => true,
		                'message'  => 'Invalid character inserted.'
		            )
		        ),
		        /* 'joining_date' => array(
		             'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message'  => 'Input Required.'
		            ),
		              'date' => array(
		               	'rule'    => array('date', 'dmy'),
		                'required' => true,
		                'message'  => 'Invalid date input. Please give (DD-MM-YYYY) format.'
		            )
		        ), */
		        'grade' => array(
		             'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message'  => 'Input Required.'
		            ),
		        ),
		        /* 'joining_grade' => array(
		             'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message'  => 'Input Required.'
		            ),
		        ), */
		        'basic' => array(
		              'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message'  => 'Input Required.'
		            ),
		            'decimal' => array(
		               	'rule'    => "decimal",
		                'required' => true,
		                'message'  => 'Invalid input inserted.'
		            )
		        ),
		        'increment_number' => array(
		              'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'allowEmpty' => true,
		                'message'  => 'Input Required.'
		            ),
		            'numeric' => array(
		               	'rule'    => "numeric",
		                'allowEmpty' => true,
		                'message'  => 'Invalid input inserted.'
		            )
		        )
		    );
		   	$this->EmployeePersonal->set($data["EmployeePersonal"]);
			$this->EmployeePersonal->validate = array(
		        /* 'dob' => array(
		             'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message'  => 'Input Required.'
		            ),
		              'date' => array(
		               	'rule'    => array('date', 'dmy'),
		                'required' => true,
		                'message'  => 'Invalid date input. Please give (DD-MM-YYYY) format.'
		            )
		        ), */
		        'other_quota_status' => array(
		             'custom' => array(
		                'rule'     => "/^[A-Za-z]{4,15}$/i",
		                'allowEmpty' => true,
		                'message'  => 'Invalid character inserted.'
		            )
		        ),
		       
		         'bank' => array(
		             'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message'  => 'Input Required.'
		            ),
		            'custom' => array(
		               	'rule'    => "/^[A-Za-z .]{2,40}$/i",
		                'required' => true,
		                'message'  => 'Invalid character inserted.'
		            )
		        ),
		         /* 'account' => array(
		             'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message' .
		                ''  => 'Input Required.'
		            ),
		            'custom' => array(
		               	'rule'    => "/^[A-Za-z0-9 .-]{5,15}$/i",
		                'required' => true,
		                'message'  => 'Invalid character inserted.'
		            ),
		             'isUnique' => array(
		               	'rule'    => "isUnique",
		                'required' => true,
		                'message'  => 'Same data inserted.'
		            )
		        ),
		        'nid' => array(
		             'numeric' => array(
		                'rule'     => 'numeric',
		                'allowEmpty' => true,
		                'message'  => 'Invalid input.'
		            ),
		            'custom' => array(
		               	'rule'    => array('custom', '/^[0-9]{13,17}$/i'),
		                'allowEmpty' => true,
		                'message'  => 'Does not matched.'
		            ),
		             'isUnique' => array(
		               	'rule'    => "isUnique",
		                'required' => true,
		                'message'  => 'Same data inserted.'
		            )
		        ),
		        'present_address' => array(
		             'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message'  => 'Input Required.'
		            )
		        ),*/
		         'email' => array(
		             'email' => array(
		                'rule'     => 'email',
		                'allowEmpty' => true,
		                'message'  => 'Invalid input.'
		            ),
		             'isUnique' => array(
		               	'rule'    => "isUnique",
		                'required' => true,
		                'message'  => 'Same data inserted.'
		            )
		            //check Same as previous
		        ),
		        /* 'cell' => array(
		            'phone' => array(
		               	'rule'    => array("phone","/(011|015|016|017|018|019)[0-9]{8}/"),
		                'required' => true,
		                'message'  => 'Invalid input'
		            ),
		             'isUnique' => array(
		               	'rule'    => "isUnique",
		                'required' => true,
		                'message'  => 'Same data inserted.'
		            )
		        ),
		         'f_name' => array(
		             'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message'  => 'Input Required.'
		            ),
		             'between' => array(
		                'rule'     => array("between","2","50"),
		                'required' => true,
		                'message'  => 'Out of range.'
		            ),
		            'custom' => array(
		               	'rule'    => "/^[A-Za-z .]{2,50}$/i",
		                'required' => true,
		                'message'  => 'Invalid character inserted.'
		            )
		        ),
		         'm_name' => array(
		             'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message'  => 'Input Required.'
		            ),
		             'between' => array(
		                'rule'     => array("between","2","50"),
		                'required' => true,
		                'message'  => 'Out of range.'
		            ),
		            'custom' => array(
		               	'rule'    => "/^[A-Za-z .]{2,50}$/i",
		                'required' => true,
		                'message'  => 'Invalid character inserted.'
		            )
		        ), 
		        'other_number' => array(
		            'phone' => array(
		               	'rule'    => array("phone","/(011|015|016|017|018|019)[0-9]{8}/"),
		                'allowEmpty' => true,
		                'message'  => 'Invalid input'
		            )
		        )*/
		    );
		    
		   if(!$this->Employee->validates() AND !$this->EmployeePersonal->validates()){
				$errors1 = $this->Employee->validationErrors;
				$errors2 = $this->EmployeePersonal->validationErrors;
				$errors = array_merge($errors1,$errors2);
				$this->set("errors", $errors);
			}
		}elseif($fn == 2){
			$data["Employee"]['employee_code'] = addslashes($data["Employee"]['employee_code'] ? trim($data["Employee"]['employee_code']) : null);
			$data["Employee"]['first_name'] = addslashes($data["Employee"]['first_name'] ? trim($data["Employee"]['first_name']) : null);
			$data["Employee"]['middle_name'] = addslashes($data["Employee"]['middle_name'] ? trim($data["Employee"]['middle_name']) : null);
			$data["Employee"]['last_name'] = addslashes($data["Employee"]['last_name'] ? trim($data["Employee"]['last_name']) : null);
			$data["EmployeePersonal"]['nid'] = addslashes($data["EmployeePersonal"]['nid'] ? trim($data["EmployeePersonal"]['nid']) : null);
			$data["EmployeePersonal"]['present_address'] = addslashes($data["EmployeePersonal"]['present_address'] ? trim($data["EmployeePersonal"]['present_address']) : null);
			$data["EmployeePersonal"]['permanent_address'] = addslashes($data["EmployeePersonal"]['permanent_address'] ? trim($data["EmployeePersonal"]['permanent_address']) : null);
			$data["EmployeePersonal"]['cell'] = addslashes($data["EmployeePersonal"]['cell'] ? trim($data["EmployeePersonal"]['cell']) : null);
			$data["EmployeePersonal"]['other_number'] = addslashes($data["EmployeePersonal"]['other_number'] ? trim($data["EmployeePersonal"]['other_number']) : null);
			$data["EmployeePersonal"]['f_name'] = addslashes($data["EmployeePersonal"]['f_name'] ? trim($data["EmployeePersonal"]['f_name']) : null);
			$data["EmployeePersonal"]['m_name'] = addslashes($data["EmployeePersonal"]['m_name'] ? trim($data["EmployeePersonal"]['m_name']) : null);
			$data["EmployeePersonal"]['s_name'] = addslashes($data["EmployeePersonal"]['s_name'] ? trim($data["EmployeePersonal"]['s_name']) : null);
			$data["EmployeePersonal"]['email'] = addslashes($data["EmployeePersonal"]['email'] ? trim($data["EmployeePersonal"]['email']) : null);
			$data["EmployeePersonal"]['bank'] = addslashes($data["EmployeePersonal"]['bank'] ? trim($data["EmployeePersonal"]['bank']) : null);
			$data["EmployeePersonal"]['account'] = addslashes($data["EmployeePersonal"]['account'] ? trim($data["EmployeePersonal"]['account']) : null);
			$data["Employee"]['basic'] = addslashes($data["Employee"]['basic'] ? trim($data["Employee"]['basic']) : null);
			$this->Employee->set($data["Employee"]);
			$this->Employee->validate = array(
		        'designation_id' => array(
		            'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message'  => 'Inpute Required.'
		            )
		        ),
		       /* 'joining_designation' => array(
		            'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message'  => 'Inpute Required.'
		            )
		        ), */
		        'employee_code' => array(
		             'custom' => array(
		                'rule'     => "/^[A-Za-z0-9]{2,15}$/i",
		                'allowEmpty' => true,
		                'message'  => 'Invalid character inserted.'
		            )
		        ),
		        'first_name' => array(
		             'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message'  => 'Inpute Required.'
		            ),
		             'between' => array(
		                'rule'     => array("between","2","35"),
		                'required' => true,
		                'message'  => 'Out of range.'
		            ),
		            'custom' => array(
		               	'rule'    => "/^[A-Za-z .]{2,35}$/i",
		                'required' => true,
		                'message'  => 'Invalid character inserted.'
		            )
		        ),
		         'middle_name' => array(
		             'between' => array(
		                'rule'     => array("between","2","15"),
		                'allowEmpty' => true,
		                'message'  => 'Out of range.'
		            ),
		            'custom' => array(
		               	'rule'    => "/^[A-Za-z .]{2,15}$/i",
		                'allowEmpty' => true,
		                'message'  => 'Invalid character inserted.'
		            )
		        ),
		        /* 'last_name' => array(
		             'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message'  => 'Inpute Required.'
		            ),
		             'between' => array(
		                'rule'     => array("between","2","35"),
		                'required' => true,
		                'message'  => 'Out of range.'
		            ),
		            'custom' => array(
		               	'rule'    => "/^[A-Za-z .]{2,35}$/i",
		                'required' => true,
		                'message'  => 'Invalid character inserted.'
		            )
		        ),
		         'joining_date' => array(
		             'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message'  => 'Inpute Required.'
		            ),
		              'date' => array(
		               	'rule'    => array('date', 'dmy'),
		                'required' => true,
		                'message'  => 'Invalid date input. Please give (DD-MM-YYYY) format.'
		            )
		        ), */
		        'grade' => array(
		             'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message'  => 'Inpute Required.'
		            ),
		        ),
		        /* 'joining_grade' => array(
		             'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message'  => 'Inpute Required.'
		            ),
		        ), */
		        'basic' => array(
		              'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message'  => 'Inpute Required.'
		            ),
		            'decimal' => array(
		               	'rule'    => "decimal",
		                'allowEmpty' => true,
		                'message'  => 'Invalid input inserted.'
		            )
		        )
		    );
		   	$this->EmployeePersonal->set($data["EmployeePersonal"]);
			$this->EmployeePersonal->validate = array(
		        /* 'dob' => array(
		             'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message'  => 'Inpute Required.'
		            ),
		              'date' => array(
		               	'rule'    => array('date', 'dmy'),
		                'required' => true,
		                'message'  => 'Invalid date input. Please give (DD-MM-YYYY) format.'
		            )
		        ), */
		         
		        'other_quota_status' => array(
		             'custom' => array(
		                'rule'     => "/^[A-Za-z]{4,15}$/i",
		                'allowEmpty' => true,
		                'message'  => 'Invalid character inserted.'
		            )
		        ),
		       
		         'bank' => array(
		             'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message'  => 'Inpute Required.'
		            ),
		            'custom' => array(
		               	'rule'    => "/^[A-Za-z .]{2,40}$/i",
		                'required' => true,
		                'message'  => 'Invalid character inserted.'
		            )
		        ),
		        /* 'account' => array(
		             'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message' .
		                ''  => 'Inpute Required.'
		            ),
		            'custom' => array(
		               	'rule'    => "/^[A-Za-z0-9 .-]{5,15}$/i",
		                'required' => true,
		                'message'  => 'Invalid character inserted.'
		            ),
		             'isUnique' => array(
		               	'rule'    => array('equalTo', $data["EmployeePersonal"]["account"], $this->uniqueCheck("EmployeePersonal","account",$data["EmployeePersonal"]["account"],"id",$data["EmployeePersonal"]["id"],"id")),
		                'required' => true,
		                'message'  => 'Same data inserted.'
		            )
		        ),
		         'nid' => array(
		             'numeric' => array(
		                'rule'     => 'numeric',
		                'allowEmpty' => true,
		                'message'  => 'Invalid input.'
		            ),
		            'custom' => array(
		               	'rule'    => array('custom', '/^[0-9]{13,17}$/i'),
		                'allowEmpty' => true,
		                'message'  => 'Does not matched.'
		            ),
		             'isUnique' => array(
		               	'rule'    => array('equalTo', $data["EmployeePersonal"]["nid"], $this->uniqueCheck("EmployeePersonal","nid",$data["EmployeePersonal"]["nid"],"id",$data["EmployeePersonal"]["id"],"id")),
		                'required' => true,
		                'message'  => 'Same data inserted.'
		            )
		        ),
		        'present_address' => array(
		             'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message'  => 'Inpute Required.'
		            )
		        ), 
		         'email' => array(
		             'email' => array(
		                'rule'     => 'email',
		                'allowEmpty' => true,
		                'message'  => 'Invalid input.'
		            ),
		             'isUnique' => array(
		               	'rule'    => array('equalTo', $data["EmployeePersonal"]["email"], $this->uniqueCheck("EmployeePersonal","email",$data["EmployeePersonal"]["email"],"id",$data["EmployeePersonal"]["id"],"id")),
		                'required' => true,
		                'message'  => 'Same data inserted.'
		            )
		            //check Same as previous
		        ),
		         'cell' => array(
		            'phone' => array(
		               	'rule'    => array("phone","/(011|015|016|017|018|019)[0-9]{8}/"),
		                'required' => true,
		                'message'  => 'Invalid input'
		            ),
		             'isUnique' => array(
		               	'rule'    => array('equalTo', $data["EmployeePersonal"]["cell"], $this->uniqueCheck("EmployeePersonal","cell",$data["EmployeePersonal"]["cell"],"id",$data["EmployeePersonal"]["id"],"id")),
		                'required' => true,
		                'message'  => 'Same data inserted.'
		            )
		        ),
		         'f_name' => array(
		             'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message'  => 'Inpute Required.'
		            ),
		             'between' => array(
		                'rule'     => array("between","2","50"),
		                'required' => true,
		                'message'  => 'Out of range.'
		            ),
		            'custom' => array(
		               	'rule'    => "/^[A-Za-z .]{2,50}$/i",
		                'required' => true,
		                'message'  => 'Invalid character inserted.'
		            )
		        ),
		         'm_name' => array(
		             'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message'  => 'Inpute Required.'
		            ),
		             'between' => array(
		                'rule'     => array("between","2","50"),
		                'required' => true,
		                'message'  => 'Out of range.'
		            ),
		            'custom' => array(
		               	'rule'    => "/^[A-Za-z .]{2,50}$/i",
		                'required' => true,
		                'message'  => 'Invalid character inserted.'
		            )
		        ),
		        'other_number' => array(
		            'phone' => array(
		               	'rule'    => array("phone","/(011|015|016|017|018|019)[0-9]{8}/"),
		                'allowEmpty' => true,
		                'message'  => 'Invalid input'
		            )
		        )*/
		    );
		   if(!$this->Employee->validates() AND !$this->EmployeePersonal->validates()){
				$errors1 = $this->Employee->validationErrors;
				$errors2 = $this->EmployeePersonal->validationErrors;
				$errors = array_merge($errors1,$errors2);
				$this->set("errors", $errors);
			}
		}
		//$errors = $this->Employee->validationErrors;
		//pr($errors); pr($data); die();
		return $errors;
	}
	
	function uniqueCheck($model, $field1,$val1, $field2 = NULL, $val2 = NULL){
		if(!empty($val1))
			$data = $this->$model->find("count",array("conditions"=>"$model.$field1 = '$val1' AND $model.$field2 = '$val2'"));
		else
			$data = 0;
		if($data < 2)
			return $val1;
		else
			return FALSE;
	}
	
	public function addEmployee($type){
		$this->designations($type);
		$userInfo = $this->Session->read("ADMIN_INFO"); 
		//if(!empty($this->data) AND !$this->dataCheck($this->data,1)){
		if(!empty($this->data)){	
			$data = $this->data;
			//pr($data);exit;
			//$data["EmployeePersonal"]["gender"] = $this->data["gender"];
			//$data["EmployeePersonal"]["house_rent"] = $this->data["house_rent"];
			//$data["EmployeePersonal"]["marital_status"] = $this->data["marital_status"];
			//$data["EmployeePersonal"]["children"] = $this->data["children"];
			$data["Employee"]["created"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
			$data["Employee"]["updated"] = $data["Employee"]["created"];
			$data['Employee']['terminal'] = $_SERVER['REMOTE_ADDR'];
			$data["Employee"]["type"] = $type;
			$data["EmployeePersonal"]["status"] = $data["Employee"]["status"];
			$data['EmployeePersonal']['created'] = $data['Employee']['created'];
			$data['EmployeePersonal']['updated'] = $data['Employee']['updated'];
			$data['EmployeePersonal']['terminal'] = $data['Employee']['terminal'];
			$data["Employee"]["user_id"] = $userInfo["id"];
			$data["EmployeePersonal"]["user_id"] = $userInfo["id"];
			if(!empty($data["EmployeePersonal"]["dob"])){
				$date = explode('-',$this->data["EmployeePersonal"]["dob"]);
			    $data["EmployeePersonal"]["dob"] = mktime(0,0,0,$date[1],$date[0],$date[2]);
			}
			if(!empty($data["EmployeePersonal"]["joining_date"])){
			    $date = explode('-',$this->data["Employee"]["joining_date"]);
			    $data["Employee"]["joining_date"] = mktime(0,0,0,$date[1],$date[0],$date[2]);
			}
			
			if(!empty($this->data["EmployeePersonal"]["etin"]))
				$this->request->data["EmployeePersonal"]["etin"] = $this->data["EmployeePersonal"]["etin"];
			else
				$this->request->data["EmployeePersonal"]["etin"] = NULL;
		
		    $payScale = $this->PayScale->find("first",array("conditions"=>array("PayScale.grade = ".$data["Employee"]["grade"]),"fields"=>array("id","scale","increment","increment_iteration","eb","eb_iteration")));
		    $increment = $data["Employee"]["basic"] - $payScale["PayScale"]["scale"];
		    $data["Employee"]["pay_scale_id"] = $payScale["PayScale"]["id"];
		    $data["Employee"]["total_increment"] = $increment;
		    if($payScale["PayScale"]["increment"] * $payScale["PayScale"]["increment_iteration"] > $increment){
		    	 //$data["Employee"]["increment_number"] = $data["Employee"]["total_increment"]/ $payScale["PayScale"]["increment"];	
				$data["Employee"]["increment_number"] = 0;
		    }else{
		    	//$data["Employee"]["increment_number"] = ($data["Employee"]["total_increment"]-($payScale["PayScale"]["increment"] * $payScale["PayScale"]["increment_iteration"]))/ $payScale["PayScale"]["eb"] + $payScale["PayScale"]["increment_iteration"];
				$data["Employee"]["increment_number"] = 0;
		    }
		    if(!empty($data["Employee"]["joining_date"]))
		    	$this->Employee->validator()->remove('joining_date', 'date');
		    if ($this->Employee->save($data["Employee"])){
		    	$data["EmployeePersonal"]["employee_id"] = $this->Employee->getLastInsertID();
		    	$data["Salary"]["employee_id"] = $data["EmployeePersonal"]["employee_id"];
		    	$data["Salary"]["user_id"] = $data["Employee"]["user_id"];
	    		$data["Salary"]["designation_id"] = $data["Employee"]["designation_id"];
	    		$data["Salary"]["grade"] = $data["Employee"]["grade"];
	    		$data["Salary"]["user_id"] = $data["Employee"]["user_id"];
	    		$data["Salary"]["basic"] = $data["Employee"]["basic"];
	    		$data["Salary"]["total_add"] = 0;
	    		$data["Salary"]["house_rent"] = 0;
	    		$data["Salary"]["conveyance"] = 0;
	    		$data["Salary"]["medical"] = 0;
	    		$data["Salary"]["payable"] = 0;
	    		$data["Salary"]["in_word"] = "n/a";
	    		$data["Salary"]["status"] = $data["Employee"]["status"];
	    		$data["Salary"]["created"] = $data["Employee"]["created"];
	    		$data["Salary"]["updated"] = $data["Employee"]["updated"];
	    		$data["Salary"]["terminal"] = $data["Employee"]["terminal"];
	    		if(!empty($data["EmployeePersonal"]["dob"]))
		    		$this->EmployeePersonal->validator()->remove('dob', 'date');
		    	if ($this->EmployeePersonal->save($data["EmployeePersonal"]) AND $this->Salary->save($data["Salary"])){
		    		$data["Deduction"]["salary_id"] = $this->Salary->getLastInsertID();
		    		$data["Deduction"]["employee_id"] = $data["EmployeePersonal"]["employee_id"];
		    		$data["Deduction"]["user_id"] = $data["Employee"]["user_id"];
		    		$data["Deduction"]["designation_id"] = $data["Employee"]["designation_id"];
		    		$data["Deduction"]["grade"] = $data["Employee"]["grade"];
		    		$data["Deduction"]["user_id"] = $data["Employee"]["user_id"];
		    		//$data["Deduction"]["cpf1"] = 0;
		    		//$data["Deduction"]["total_sub"] = 0;
		    		//$data["Deduction"]["in_word"] = "n/a";
		    		$data["Deduction"]["status"] = $data["Employee"]["status"];
		    		$data["Deduction"]["created"] = $data["Employee"]["created"];
		    		$data["Deduction"]["updated"] = $data["Employee"]["updated"];
		    		$data["Deduction"]["terminal"] = $data["Employee"]["terminal"];
		    		if($this->Deduction->save($data["Deduction"])){
		    			$cpf["Cpf"]["employee_id"] = $data["EmployeePersonal"]["employee_id"];
		    			$cpf["Cpf"]["salary_id"] = $data["Deduction"]["salary_id"];
		    			$cpf["Cpf"]["cpf1"] = 0;
		    			$cpf["Cpf"]["cpf2"] = 0;
		    			$cpf["Cpf"]["arrear_cpf"] = 0;
		    			$cpf["Cpf"]["created"] = $data["Employee"]["created"];
			    		$cpf["Cpf"]["updated"] = $data["Employee"]["updated"];
			    		$cpf["Cpf"]["terminal"] = $data["Employee"]["terminal"];
			    		if($this->Cpf->save($cpf)){
			    			$this->Session->setFlash(array('Data saved successfully.',"Thank you."), 'default', array('class' => 'alert-success'));
			    			$this->redirect("/salaryManagements/calculate/".$type."/".$data["Salary"]["employee_id"]);
			    		}
		    		}
		    	}else{
		    		pr($this->EmployeePersonal->validationErrors);	
		    	}
			} else {
				pr($this->Employee->validationErrors);
				$this->Session->setFlash(array('Saving failed.',"Please try again."), 'default', array('class' => 'alert-error'));
			}
		}
		$grades = Configure::read("grades");
		/*if($type == 1){
			for($i = 12; $i <=20; $i++)
				unset($grades[$i]);
		}elseif($type == 2){
			for($i = 1; $i <=7; $i++) // time scale and selection grade.
				unset($grades[$i]);
		}*/
		$this->set("grades",$grades);
		$this->set("type",$type);
	}
	
	public function editEmployee($type,$id){
		$this->designations($type);
		$userInfo = $this->Session->read("ADMIN_INFO");
		if(!empty($this->data) AND !$this->dataCheck($this->data,2)){
			$data = $this->data;
			//$data["Employee"]["gender"] = $this->data["gender"];
			//$data["Employee"]["house_rent"] = $this->data["house_rent"];
			//$data["Employee"]["marital_status"] = $this->data["marital_status"];
			//$data["Employee"]["children"] = $this->data["children"];
			$data["Employee"]["created"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
			$data["Employee"]["updated"] = $data["Employee"]["created"];
			$data['Employee']['terminal'] = $_SERVER['REMOTE_ADDR'];
			$data["Employee"]["user_id"] = $userInfo["id"];
			//$data["Employee"]["type"] = $type;
			$data["EmployeePersonal"]["user_id"] = $userInfo["id"];
			if(!empty($this->data["EmployeePersonal"]["dob"])){
				$date = explode('-',$this->data["EmployeePersonal"]["dob"]);
			    $data["EmployeePersonal"]["dob"] = mktime(0,0,0,$date[1],$date[0],$date[2]);
			}
			if(!empty($this->data["Employee"]["joining_date"])){
			    $date = explode('-',$this->data["Employee"]["joining_date"]);
			    $data["Employee"]["joining_date"] = mktime(0,0,0,$date[1],$date[0],$date[2]);
			}
		    $payScale = $this->PayScale->find("first",array("conditions"=>array("PayScale.grade = ".$data["Employee"]["grade"]),"fields"=>array("id","scale")));
		    $increment = $data["Employee"]["basic"] - $payScale["PayScale"]["scale"];
		    $data["Employee"]["pay_scale_id"] = $payScale["PayScale"]["id"];
		    $data["Employee"]["total_increment"] = $increment;
		    if(!empty($this->data["Employee"]["joining_date"]))
		    	$this->Employee->validator()->remove('joining_date', 'date');
		    if ($this->Employee->save($data["Employee"])){
		    	$data["EmployeePersonal"]["employee_id"] = $data["Employee"]["id"];
		    	$con = "Salary.employee_id = ".$data["Employee"]["id"];
		    	$data["Salary"]["id"] = $data["Employee"]["id"];
		    	$data["Salary"]["designation_id"] = $data["Employee"]["designation_id"];
	    		$data["Salary"]["grade"] = $data["Employee"]["grade"];
	    		$data["Salary"]["basic"] = $data["Employee"]["basic"];
	    		$data["Salary"]["total_add"] = 0;
	    		$data["Salary"]["house_rent"] = 0;
	    		$data["Salary"]["conveyance"] = 0;
	    		$data["Salary"]["medical"] = 0;
	    		$data["Salary"]["payable"] = 0;
	    		$data["Salary"]["in_word"] = "n/a";
	    		$data["Salary"]["updated"] = $data["Employee"]["updated"];
	    		$data["Salary"]["terminal"] = $data["Employee"]["terminal"];
	    		if(!empty($this->data["Employee"]["dob"]))
	    			$this->EmployeePersonal->validator()->remove('dob', 'date');
	    		if(empty($data["EmployeePersonal"]["marital_status"]) AND $data["EmployeePersonal"]["marital_status"] == 0){
	    			$data["EmployeePersonal"]["s_name"] = NULL;
	    			$data["EmployeePersonal"]["s_profession"] = NULL;
	    		}
	    		$data["EmployeePersonal"]["id"] = $id;
		    	if ($this->EmployeePersonal->save($data["EmployeePersonal"]) AND $this->Salary->save($data["Salary"])){
		    		$data["Deduction"]["salary_id"] = $data["Salary"]["id"];
		    		$data["Deduction"]["id"] = $id;
		    		$data["Deduction"]["employee_id"] = $data["EmployeePersonal"]["employee_id"];
		    		$data["Deduction"]["user_id"] = $data["Employee"]["user_id"];
		    		$data["Deduction"]["designation_id"] = $data["Employee"]["designation_id"];
		    		$data["Deduction"]["grade"] = $data["Employee"]["grade"];
		    		$data["Deduction"]["user_id"] = $data["Employee"]["user_id"];
		    		//$data["Deduction"]["cpf1"] = 0;
		    		//$data["Deduction"]["total_sub"] = 0;
		    		//$data["Deduction"]["in_word"] = "n/a";
		    		$data["Deduction"]["status"] = $data["Employee"]["status"];
		    		$data["Deduction"]["created"] = $data["Employee"]["created"];
		    		$data["Deduction"]["updated"] = $data["Employee"]["updated"];
		    		$data["Deduction"]["terminal"] = $data["Employee"]["terminal"];
		    		if($this->Deduction->save($data["Deduction"])){
		    			$this->Session->setFlash(array('Data saved successfully.',"Thank you."), 'default', array('class' => 'alert-success'));
		    			$this->redirect("/salaryManagements/calculateUpdate/".$type."/".$id);
		    		}
		    	}else{
		    		pr($this->EmployeePersonal->validationErrors);	
		    	}
			} else {
				echo "Employee";
				pr($this->Employee->validationErrors);
				$this->Session->setFlash(array('Sving failed.',"Please try again."), 'default', array('class' => 'alert-error'));
			}
		}
		$this->Employee->bindModel( array('hasOne' => array(
			'EmployeePersonal' => array(
	        	'className'     => 'EmployeePersonal',
	            'foreignKey'    => 'employee_id',
	            'conditions'    => array("Employee.status != 0","EmployeePersonal.status != 0"),
	            "fields"		=>	array("id","nid","present_address","permanent_address","cell","other_number","email","f_name","m_name","s_name","s_profession","bank","account","blood_group","religion","other_religion_status","dob","gender","children","marital_status","house_rent","conveyance","association"),
	            'dependent'     => true
	        ))));
       
		$this->data = $this->Employee->find("first",array("conditions"=>"Employee.id = '".$id."'"));
		$payScale = $this->PayScale->find("first",array("conditions"=>"PayScale.id = ".$this->data["Employee"]["pay_scale_id"],"fields"=>"scale"));
		$this->request->data["PayScale"]["scale"] = $payScale["PayScale"]["scale"];
		if(!empty($this->data["Employee"]["joining_date"]))
			$this->request->data["Employee"]["joining_date"] = date("d-m-Y",$this->data["Employee"]["joining_date"]);
		else
			$this->request->data["Employee"]["joining_date"] = NULL;
			
		if(!empty($this->data["Employee"]["dob"]))
			$this->request->data["EmployeePersonal"]["dob"] = date("d-m-Y",$this->data["EmployeePersonal"]["dob"]);
		else
			$this->request->data["EmployeePersonal"]["dob"] = NULL;
		
		if(!empty($this->data["Employee"]["etin"]))
			$this->request->data["EmployeePersonal"]["etin"] = $this->data["EmployeePersonal"]["etin"];
		else
			$this->request->data["EmployeePersonal"]["etin"] = NULL;
		//pr($this->data);
		$this->request->data["Employee"]["basic"] = $this->data["PayScale"]["scale"] + $this->data["Employee"]["total_increment"];
		//$this->set("start",$start);
		$this->set("type",$type);
		$this->set("id",$id);
		$grades = Configure::read("grades");
		/*if($type == 1){
			for($i = 12; $i <=20; $i++)
				unset($grades[$i]);
		}
		elseif($type == 2){
			for($i = 1; $i <=7; $i++)
				unset($grades[$i]);
		}*/
		$this->set("grades",$grades);
	}
	
	public function incrementFix(){
		$this->Employee->bindModel( array('belongsTo' => array(
			'PayScale' => array(
	        	'className'     => 'PayScale',
	            'foreignKey'    => 'pay_scale_id',
	            'dependent'     => true
	        ))));
		$employees = $this->Employee->find("all",array("conditions"=>"Employee.employee_code > 1","fields"=>array("id","employee_code","grade","first_name","middle_name","last_name","total_increment","PayScale.scale","PayScale.increment","PayScale.increment_iteration","PayScale.eb","PayScale.eb_iteration"),"order"=>array("Employee.id ASC","Employee.employee_code ASC")));
		foreach($employees as $employee){
			if($employee["Employee"]["total_increment"] > 0){
				if($employee["PayScale"]["increment"] * $employee["PayScale"]["increment_iteration"] >= $employee["Employee"]["total_increment"]){ 
					$employee["Employee"]["increment_number"] = $employee["Employee"]["total_increment"] / $employee["PayScale"]["increment"];
				}else{
					$employee["Employee"]["increment_number"] = ($employee["Employee"]["total_increment"] - ($employee["PayScale"]["increment"] * $employee["PayScale"]["increment_iteration"])) / $employee["PayScale"]["eb"] + $employee["PayScale"]["increment_iteration"];
				}
			}else{
				$employee["Employee"]["increment_number"] = 0;
			}
			//$employee["Employee"]["increment_number"] = 0;
			
			//pr($employee); 
			$check = explode(".",$employee["Employee"]["increment_number"]);
			$i = 0;
			while(!empty($check[1])){
				$employee["Employee"]["grade"] = $employee["Employee"]["grade"] - 1;
				$payScale = $this->PayScale->find("first",array("conditions"=>"PayScale.grade = ".$employee["Employee"]["grade"]));
				if($employee["Employee"]["total_increment"] > 0){
					$inc = $employee["Employee"]["total_increment"]+$employee["PayScale"]["scale"] - $payScale["PayScale"]["scale"];
					//pr($inc);
					if($payScale["PayScale"]["increment"] * $payScale["PayScale"]["increment_iteration"] >= $inc){ 
						$employee["Employee"]["increment_number"] = $inc / $payScale["PayScale"]["increment"];
					}else{
						$employee["Employee"]["increment_number"] = ($inc - ($payScale["PayScale"]["increment"] * $payScale["PayScale"]["increment_iteration"])) / $payScale["PayScale"]["eb"] + $payScale["PayScale"]["increment_iteration"];
					}
					//pr(($inc - ($payScale["PayScale"]["increment"] * $payScale["PayScale"]["increment_iteration"]))/$payScale["PayScale"]["eb"] + $payScale["PayScale"]["increment_iteration"]);
					//pr($employee); echo "hi";
				}else{
					$employee["Employee"]["increment_number"] = 0;
				}
				//pr($employee);
				//die();
				$employee["Employee"]["total_increment"] = $inc;
				$employee["PayScale"]["scale"] = $payScale["PayScale"]["scale"];
				$check = explode(".",$employee["Employee"]["increment_number"]);
				//pr($payScale); pr($employee);  //die();
				$i++;
				//pr($check);
				if($i == 10 OR empty($check[1])){
					
					break;
				}
				
			}	
			//pr($employee["Employee"]);
			$data[]["Employee"] = $employee["Employee"];
		}
		//pr($data);
		$this->Employee->saveMany($data);
		$this->redirect("/employeeManagements/index/1");
	}  	
	
	function typeFix(){
		$employees = $this->Employee->find("all",array("fields"=>array("id","employee_code")));
		foreach($employees as $employee){
			//pr($employee);
			if($employee["Employee"]["employee_code"] < 300)
				$employee["Employee"]["type"] = 1;
			else
				$employee["Employee"]["type"] = 2;
			//pr($employee);
			$data[] = $employee;
		}
		$this->Employee->saveMany($data);
		$this->redirect("/employeeManagements/index/1");	
	}
	
	function basicFix(){
		$this->Employee->bindModel( array('belongsTo' => array(
		'PayScale' => array(
        	'className'     => 'PayScale',
            'foreignKey'    => 'pay_scale_id',
            'dependent'     => true
        ))));
        $this->Employee->bindModel( array('hasOne' => array(
			'Salary' => array(
	        	'className'     => 'Salary',
	            'foreignKey'    => 'employee_id',
	            'dependent'     => true
	        ))));
		$temp = $this->Employee->find("all",array("fields"=>array("id","Salary.id","grade","employee_code","total_increment","increment_number","Salary.basic","Salary.grade","PayScale.scale","PayScale.increment","PayScale.increment_iteration","PayScale.eb")));
		foreach($temp as $employee){
			$employee["Employee"]["basic"] = $employee["Employee"]["total_increment"] + $employee["PayScale"]["scale"];
			if($employee["Employee"]["basic"] != $employee["Salary"]["basic"]){
				$scale = $this->getScale($employee["Employee"]["grade"]);
				//pr($scale);
				$employee["Employee"]["total_increment"] = $employee["Salary"]["basic"] - $scale["PayScale"]["scale"];
				$employee["Employee"]["pay_scale_id"] = $scale["PayScale"]["id"];
				$employee["Employee"]["grade"] = $employee["Salary"]["grade"];
				$employee["Employee"]["new_basic"] = $employee["Employee"]["total_increment"] + $scale["PayScale"]["scale"];
				if($employee["Employee"]["total_increment"] < $employee["PayScale"]["increment"] * $employee["PayScale"]["increment_iteration"])
					$employee["Employee"]["new_increment_number"] = ($employee["Employee"]["total_increment"] / $employee["PayScale"]["increment"]);
				else
					$employee["Employee"]["new_increment_number"] = (($employee["Employee"]["total_increment"] - ($scale["PayScale"]["increment"] * $scale["PayScale"]["increment_iteration"])) / $scale["PayScale"]["eb"] + $scale["PayScale"]["increment_iteration"]);
				$employees[] = $employee; 
			}
			
		}
		if(!empty($employees)){
			pr($employees);
			//$this->Employee->saveMany($employees);
			//$this->incrementFix();
		}
		//$employees = $this->Employee->find("all",array("fields"=>array("id","Salary.id","employee_code","total_increment","Salary.basic","Salary.grade","PayScale.scale","PayScale.increment","PayScale.increment_iteration","PayScale.eb")));
		//pr($employees);	
	}
	
	function getScale($grade){
		$payScale = $this->PayScale->find("first",array("conditions"=>"PayScale.grade = $grade","fields"=>array("id","scale","increment","increment_iteration","eb","eb_iteration")));	
		return $payScale;
	}
}