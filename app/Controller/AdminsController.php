<?php
/**
 * @Developed By	:	Engr. Rajib Mahmud
 * @Start Date	  	:	2nd Sep 2013
 * @Last Update		:	10th Sep 2013
 * @Copyright     	:  	Bangladesh Agricultural Research Council
 * @Link          	:  	http://www.barc.gov.bd
 * */

App::uses('AppController', 'Controller');
class AdminsController extends AppController {
	public $name = 'Admins';
	public $uses = array("User","PayScale","Employee","EmployeePersonal","UserLogin","Loan");
	public $layout = "admin";
	
	
	function beforeFilter(){
  		$this->myBeforeController();	
		Configure::load('constant');
	}
	
	/**
	 * Display admin dashboard
	 */
	public function index(){
		$this->adminCheck();
		$payScales = $this->PayScale->find("all",array("","","order"=>"PayScale.grade ASC")); 
		$this->set("payScales",$payScales);
	}
	
	var $return_array = array();
    var $macAddr;
	var $ipAddr;
    
    function GetMacAddr($osType){
    	switch ( strtolower($osType) ){
	    	case "linux":
	        	$this->forLinux();
	            break;
	        case "solaris":
	            break;
	        case "unix":
	            break;
	        case "aix":
	            break;
	        default:
	            $this->forWindows();
	        break;
		}
        $temp_array = array();
        foreach ( $this->return_array as $value ){ 
			$value = trim($value);
        	if ( preg_match( "/[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f]/i", $value, $temp_array ) ){ 
               	$this->macAddr[] = $temp_array[0];
			}
		}
        unset($temp_array);
       	return $this->macAddr;
	}
	
	function GetIpAddr($osType){
		$m = NULL;
    	switch ( strtolower($osType) ){
	    	case "linux":
	        	$this->forLinux();
	            break;
	        case "solaris":
	            break;
	        case "unix":
	            break;
	        case "aix":
	            break;
	        default:
	            $this->forWindows();
	        break;
		}
        $temp_array = array();
        foreach ( $this->return_array as $value ){ 
			$value = trim($value);
			if(preg_match("/\b\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\b/i",$value, $m)){
				$this->ipAddr[] = $m[0];
			}
		}
        unset($temp_array);
       	return $this->ipAddr;
	}

        	
	function forWindows(){
    	@exec("ipconfig /all", $this->return_array);
        if ( $this->return_array )
        	return $this->return_array;
		else{
        	$ipconfig = $_SERVER["WINDIR"]."system32ipconfig.exe";
            if ( is_file($ipconfig) )
                @exec($ipconfig." /all", $this->return_array);
            else
                @exec($_SERVER["WINDIR"]."systemipconfig.exe /all", $this->return_array);
            return $this->return_array;
		}
	}
	
	function forLinux(){
		$this->return_array = NULL;
    	@exec("netstat -ie", $this->return_array);
    	return $this->return_array;
	}
	
	function multi_unique($array) {
    	foreach ($array as $k=>$na)
            $new[$k] = serialize($na);
        $uniq = array_unique($new);
        foreach($uniq as $k=>$ser)
            $new1[$k] = unserialize($ser);
        return ($new1);
    }
    
	public function loginInfo($userId){
		$data = NULL;
		$ipAddress=$_SERVER['REMOTE_ADDR'];
		$macs = $this->GetMacAddr(strtolower(PHP_OS));
		if(!empty($macs)){
        	$macs = $this->multi_unique($macs);
	    }
		foreach (array_keys($macs, '00-00-00-00-00-00') as $key) {
		    unset($macs[$key]);
		}
		$temp = "@";
		$string = implode($temp,$macs);
		$data['UserLogin']["login"] = mktime(date("H"), date("i"), date("s"), date("m"),date("d"),date("Y"));
		$data['UserLogin']["terminal"] = $_SERVER["REMOTE_ADDR"];
		$data['UserLogin']["user_id"] = $userId;
		$data["UserLogin"]["browser_info"] = $_SERVER["HTTP_USER_AGENT"];
		$data["UserLogin"]["server_signature"] = $_SERVER["SERVER_SIGNATURE"];
		$data["UserLogin"]["server_software"] = $_SERVER["SERVER_SOFTWARE"];
		$data["UserLogin"]["server_ip"] = $_SERVER["SERVER_ADDR"];
		$data["UserLogin"]["server_mac"] = $string;
		$_SESSION["sessionId"] = session_id();
		$data["UserLogin"]["session_id"] = session_id();
		$this->UserLogin->save($data);
	}
	
	function getEmployees($id){
		$this->layout = "blank";
		$empStatus = NULL;
		$grade = $this->employeesDes($id);
		$this->set("empStatus",$empStatus);
		
	}
	
	function getDesignations($grade){
		$this->layout = "blank";
		$this->designations("1",$grade);
	}
	
	function getChangedEmployees($id){
		$this->layout = "blank";
		$empStatus = NULL;
		$grade = $this->employeesDes($id);
		$this->set("empStatus",$empStatus);
		
	}
	
	function getloanEmployees($id){
		$this->layout = "blank";
		$loanStatus = NULL;
		$loans = $this->Loan->find("all",array("conditions"=>"employee_id = $id","fields"=>array("type")));
		$this->set("loans",$loans);
	}
	
	function getInfo($id){
		$this->layout = "blank";
		$basic = NULL;
		$this->Employee->bindModel( array('belongsTo' => array(
		'PayScale' => array(
        	'className'     => 'PayScale',
            'foreignKey'    => 'pay_scale_id',
            'conditions'    => array("Employee.status != 0"),
            'dependent'     => true
        ))));   
		$employee = $this->Employee->find("first",array("conditions"=>"Employee.id = $id","fields"=>array("Employee.increment_number","PayScale.increment_iteration","PayScale.eb_iteration")));
		if( $employee["PayScale"]["increment_iteration"] - $employee["Employee"]["increment_number"] < 0 AND $employee["PayScale"]["eb_iteration"] == 0){
			$jobStatus = Configure::read("jobStatus");
			unset($jobStatus[2]);	
			$this->set("jobStatus",$jobStatus);
		}else{
			$this->set("incrementNum",$temp["Employee"]["increment_number"]);
		}
	}
	
	function getBasic($id){
		$this->layout = "blank";
		$basic = NULL;
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
            'conditions'    => array("Employee.status != 0","PayScale.status" => "1"),
            "fields"		=> array("scale"),
            'dependent'     => true
        ))));
		$temp = $this->Employee->find("first",array("conditions"=>"Employee.id = $id","fields"=>array("PayScale.scale","total_increment","grade","EmployeePersonal.children","EmployeePersonal.house_rent")));
		$basic = $temp["PayScale"]["scale"] + $temp["Employee"]["total_increment"];
		$this->set("basic",$basic);
		$this->set("grade",$temp["Employee"]["grade"]);
		$this->set("children",$temp["EmployeePersonal"]["children"]);
		$this->set("house_rent",$temp["EmployeePersonal"]["house_rent"]);
		$this->getStatus($id);
	}
	
	function jobStatus($status){
		$this->layout = "blank";
		$jobStatus = Configure::read("jobStatus");
		if($status == 2){
			unset($jobStatus[2]);
			unset($jobStatus[3]);
			unset($jobStatus[4]);
			unset($jobStatus[0]);
		}elseif($status == 3){
			unset($jobStatus[1]);
			unset($jobStatus[3]);
			unset($jobStatus[4]);
			unset($jobStatus[5]);
			unset($jobStatus[6]);
		}elseif($status == 4){
			unset($jobStatus[1]);
			unset($jobStatus[3]);
			unset($jobStatus[4]);
			unset($jobStatus[0]);
		}elseif($status == 1){
			unset($jobStatus[0]);
		}
		$this->set("jobStatus",$jobStatus);
	}
	
	function getStatus($id){
		$this->layout = "blank";
		$empStatus = NULL;
		$this->Employee->bindModel( array('hasOne' => array(
			'EmployeePersonal' => array(
	        	'className'     => 'EmployeePersonal',
	            'foreignKey'    => 'employee_id',
	            'conditions'    => array("Employee.status != 0","EmployeePersonal.status != 0"),
	            'dependent'     => true
	        ))));
		$empStatus = $this->Employee->find("first",array("conditions"=>"Employee.id = $id","fields"=>array("status","grade","service_status","EmployeePersonal.children","EmployeePersonal.house_rent")));
		$this->set("empStatus",$empStatus);
	}
	/**
	 * Display login section to get access into admin area.
	 */
	
	public function login() {
		$this->sessionDistroy(array("Message"));
		$this->layout = "default";
		if(!empty($this->data["User"])){ 
			$this->Session->destroy();
	    	$userName    = $this->data['User']['username'];
	    	$password = md5($this->data['User']['password']);
	    	$conditions[] = "User.username = '$userName'";
	    	$conditions[] = "User.password = '$password'";
	    	$conditions[] = "User.status = '1'";
	    	$conditions[] = "User.type = '1'";      
		    $user = $this->User->find("first", array("conditions"=>$conditions,"fields"=>array("id")));	
		    if(!empty($user["User"]["id"])){
		    	$this->Session->write('ADMIN_INFO',$user["User"]);
		    	$this->loginInfo($user["User"]["id"]);
				$this->Session->setFlash(array('Login Success.',"Enjoy the payroll management system."), 'default', array('class' => 'alert-success'));
			    $this->redirect("/admins/");
			    exit;
	    	}else{
		    	$this->Session->setFlash(array('Login Failure.',"Please try again."), 'default', array('class' => 'alert-error'));
			}
		}
	}
	
	/**
	 * Logout, kill the active session and redirect to homes/index
	 */
	 
	function logout() {
		$this->adminCheck();
		$sessionId = $_SESSION["sessionId"];
		$login = $this->UserLogin->find("first",array("conditions"=>"UserLogin.session_id LIKE '$sessionId'","fields"=>"id"));
		$data["UserLogin"]["logout"] = mktime(date("H"), date("i"), date("s"), date("m"),date("d"),date("Y"));
		$data["UserLogin"]["id"] = $login["UserLogin"]["id"];
		$data["UserLogin"]["status"] = 1;
		$this->UserLogin->save($data);
		$this->sessionDistroy(array("ADMIN_INFO"));
		$this->sessionDistroy(array("sessionId"));   
	    $this->Session->setFlash(array('Logout ',"successful."), 'default', array('class' => 'alert-success'));
	    $this->redirect("/");	
	}
	function dataCheck($data, $fn){
		$this->loadModel('Validation');
		$errors = NULL;
		if($fn == 1){
			$data['username'] = addslashes($data['username'] ? trim($data['username']) : null);
			$data['password'] = addslashes($data['password'] ? trim($data['password']) : null);
			$data['confirm_password'] = addslashes($data['confirm_password'] ? trim($data['confirm_password']) : null);
			$data['email'] = addslashes($data['email'] ? trim($data['email']) : null);
			$data['answer'] = addslashes($data['answer'] ? trim($data['answer']) : null);
			$this->User->set($data);
			$this->User->validate = array(
		    	'username' => array(
		        	'notEmpty' => array(
			        	'rule'     => 'notEmpty',
		            	'required' => true,
		                'message'  => 'Inpute Required.'
			        ),
		            'between' => array(
		                'rule'     => array("between","4","15"),
		                'required' => true,
		                'message'  => 'Out of range.'
		            ),
			        'isUnique' => array(
			        	'rule'    => array("isUnique"),
		            	'required' => true,
		                'message'  => 'Same input given. Please change.'
					),
			        'alphaNumeric' => array(
						'rule'    => "alphaNumeric",
		            	'required' => true,
		                'message'  => 'Invalid character inserted.'
		            )
		        ),
		        'password' => array(
		         	'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message'  => 'Inpute Required.'
		            ),
		             'between' => array(
		                'rule'     => array("between","9","25"),
		                'required' => true,
		                'message'  => 'Out of range.'
		            ),
		            'equalTo' => array(
		               	'rule'    => array('equalTo', $data["password"], $this->passwordCheck($data["password"])),
		                'allowEmpty' => true,
		                'message'  => 'Out of range.'
		            )
				),
				'confirm_password' => array(
		         	'notEmpty' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message'  => 'Inpute Required.'
		            ),
		             'between' => array(
		                'rule'     => array("between","9","25"),
		                'required' => true,
		                'message'  => 'Out of range.'
		            ),
					'equalTo' => array(
		               	'rule'    => array('equalTo', $data["password"]),
		                'requried' => true,
		                'message'  => 'Input does not matched.'
		            )
				),
				'email' => array(
		         	'rule1' => array(
		                'rule'     => 'notEmpty',
		                'required' => true,
		                'message'  => 'Inpute Required.'
		            ),
		             'rule2' => array(
		                'rule'     => array("between","10","40"),
		                'required' => true,
		                'message'  => 'Out of range.'
		            ),
		            'isUnique' => array(
		               	'rule'    => array("isUnique"),
		                'required' => true,
		                'message'  => 'Same input given. Please change.'
		            ),
		            'email' => array(
		                'rule'     => 'email',
		                'required' => true,
		                'message'  => 'Invalid input.'
		            )
		        ),
			    'sq' => array(
	                'rule'     => 'notEmpty',
	                'required' => true,
	                'message'  => 'Input required.'
	            ),
	            'answer' => array(
	                'rule'     => 'notEmpty',
	                'required' => true,
	                'message'  => 'Input required.'
	            ),
	        );
		   if(!$this->User->validates()){
				$errors = $this->User->validationErrors;
				$this->set("errors", $errors);
			}
		}
		//pr($this->User->validate);
		//pr($errors); die();
		return $errors;
	}
	
	function passwordCheck($password){
		
	}
	
	function users(){
		$this->Session->delete("Message");
		$users = $this->User->find("all");
		$this->set("users",$users);	
	}
	
	function createUser($type){
		$this->designations($type);
		if(!empty($this->data) AND !$this->dataCheck($this->data["User"],1)){
			$data["User"] = $this->data["User"];
			$data["User"]["password"] = hash("sha512",$data["User"]["password"]);
			$data["User"]["answer"] = hash("sha512",$data["User"]["answer"]);
			unset($data["User"]['confirm_password']);
			$data["User"]["created"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
			$data["User"]["updated"] = $data["User"]["created"];
			$data["User"]['terminal'] = $_SERVER['REMOTE_ADDR'];
			$data["User"]["key"] = hash("sha512",$data["User"]["password"].hash("sha512",$data["User"]["email"]).hash("sha512",$data["User"]["username"]).hash("sha512",$data["User"]["answer"]));
		    $data["User"]["status"] = "1";
		    $this->User->validator()->remove('password', 'between');
		   	$this->User->validator()->remove('confirm_password','between');
		   	//pr($data); die();
		   	if ($this->User->save($data["User"])){
	   			$this->Session->setFlash('Data Validation Success', 'default', array('class' => 'notice success'));
	    		$this->redirect("/admins/users");
	   		} else {
				$this->Session->setFlash('Data Validation Failure', 'default', array('class' => 'cake-error'));
			}
		}
		$this->set("type",$type);		
	}
	
	public function template($i = 1){
		$this->set("i",$i);
		//$projects = $this->Employee->find("all",array("conditions"=>"Project.type = 4 AND Project.status = 1","fields"=>array("id","title","start","end","type","organization_id")));
		$this->set("projects",NULL);
		$this->set("type","4");
	}
}