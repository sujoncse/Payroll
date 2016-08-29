<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	var $helpers = array('Html','Form','Time','Number','Session',"Text","Js");
	var $components = array("Session","DebugKit.Toolbar");
	var $uses = array("Setting","Validator","Designation","Employee");
	
	public function myBeforeController() {
		$setting_info = $this->Setting->find("first");
		if(!empty($setting_info))
			$this->Session->write("SETTING_INFO",$setting_info["Setting"]);
	}
	
	function adminCheck(){
  		$admin = $this->Session->read("ADMIN_INFO");
  		if($admin["id"] != 1 ){
  			$this->redirect(array('controller'=>'admins','action'=>'login'));
  			exit;
      	}
  	}
	function sessionDistroy($ids){
		foreach($ids as $id)
			$this->Session->delete($id);
	}
	function designations($type = NULL,$grade = NULL){
		$designations = NULL;
		$conditions[] = "Designation.status = 1";
		if(!empty($type) AND $type == 1 AND empty($grade)){
			$conditions[] = "Designation.grade < 15";
			$temps = $this->Designation->find("all",array("conditions"=>$conditions),array("Designation.id", "Designation.title"));
		}elseif(!empty($type) AND $type == 2 AND empty($grade)){
			$conditions[] = "Designation.grade > 7";
			$temps = $this->Designation->find("all",array("conditions"=>$conditions),array("Designation.id", "Designation.title"));
		}elseif(!empty($grade)){
			$conditions[] = "Designation.grade = $grade";
			$temps = $this->Designation->find("all",array("conditions"=>$conditions),array("Designation.id", "Designation.title"));
		}else{
			$temps = $this->Designation->find("all",array("conditions"=>$conditions),array("Designation.id", "Designation.title"));
		}
		if(!empty($temps)){
			foreach($temps as $temp){
				$designations[$temp["Designation"]["id"]] = $temp["Designation"]["title"];	
			}
		}
		$this->set("designations", $designations);
	}
	function employees($id = NULL){
		$employees = NULL;
		if(!empty($id)){
			$temps = $this->Employee->find("all",array("conditions"=>"Employee.status != 0 AND Employee.id = $id","fields"=>array("id", "first_name","middle_name","last_name")));
		}else{
			$temps = $this->Employee->find("all",array("conditions"=>"Employee.status != 0","fields"=>array("id", "first_name","middle_name","last_name")));
		}
		if(!empty($temps)){
			foreach($temps as $temp){
				if(!empty($temp["Employee"]["middle_name"]))
					$employees[$temp["Employee"]["id"]] = $temp["Employee"]["first_name"]." ".$temp["Employee"]["middle_name"]." ".$temp["Employee"]["last_name"];	
				else
					$employees[$temp["Employee"]["id"]] = $temp["Employee"]["first_name"]." ".$temp["Employee"]["last_name"];
			}
		}
		return $employees;
		$this->set("employees", $employees);
	}
	
	function employeesDes($id){ 
		$employees = NULL;
		$grade = NULL;
		if(!empty($id)){
			$temps = $this->Employee->find("all",array("conditions"=>"Employee.status != 0 AND Employee.designation_id = $id","fields"=>array("id", "first_name","middle_name","last_name","grade")));
		}
		if(!empty($temps)){
			$grade = $temps[0]["Employee"]["grade"];
			foreach($temps as $temp){
				if(!empty($temp["Employee"]["middle_name"])){
					$employees[$temp["Employee"]["id"]] = $temp["Employee"]["first_name"]." ".$temp["Employee"]["middle_name"]." ".$temp["Employee"]["last_name"];
				}else{
					$employees[$temp["Employee"]["id"]] = $temp["Employee"]["first_name"]." ".$temp["Employee"]["last_name"];
				}
			}
		}
		$this->set("employees", $employees);
		$this->set("grade", $grade);
		return $grade;
	}
	
	function translateToWords($number) {
		$number = (int)$number;
		$prefix = NULL; $suffix = NULL;
	    $max_size = pow(10,18);
	    if (!$number) return "zero";
	    if (is_int($number) && $number < abs($max_size)) {            
	        switch ($number) {
	            // set up some rules for converting digits to words
	            case $number < 0:
	                $prefix = "negative";
	                $suffix = $this->translateToWords(-1*$number);
	                $string = $prefix . " " . $suffix;
	                break;
	            case 1:
	                $string = "one";
	                break;
	            case 2:
	                $string = "two";
	                break;
	            case 3:
	                $string = "three";
	                break;
	            case 4: 
	                $string = "four";
	                break;
	            case 5:
	                $string = "five";
	                break;
	            case 6:
	                $string = "six";
	                break;
	            case 7:
	                $string = "seven";
	                break;
	            case 8:
	                $string = "eight";
	                break;
	            case 9:
	                $string = "nine";
	                break;                
	            case 10:
	                $string = "ten";
	                break;            
	            case 11:
	                $string = "eleven";
	                break;            
	            case 12:
	                $string = "twelve";
	                break;            
	            case 13:
	                $string = "thirteen";
	                break;            
	            // fourteen handled later
	            case 15:
	                $string = "fifteen";
	                break;            
	            case $number < 20:
	                $string = $this->translateToWords($number%10);
	                // eighteen only has one "t"
	                if ($number == 18)
	                {
	                $suffix = "een";
	                } else 
	                {
	                $suffix = "teen";
	                }
	                $string .= $suffix;
	                break;            
	            case 20:
	                $string = "twenty";
	                break;            
	            case 30:
	                $string = "thirty";
	                break;            
	            case 40:
	                $string = "forty";
	                break;            
	            case 50:
	                $string = "fifty";
	                break;            
	            case 60:
	                $string = "sixty";
	                break;            
	            case 70:
	                $string = "seventy";
	                break;            
	            case 80:
	                $string = "eighty";
	                break;            
	            case 90:
	                $string = "ninety";
	                break;                
	            case $number < 100:
	                $prefix = $this->translateToWords($number-$number%10);
	                $suffix = $this->translateToWords($number%10);
	                $string = $prefix . "-" . $suffix;
	                break;
	            // handles all number 100 to 999
	            case $number < pow(10,3):                    
	                // floor return a float not an integer
	                $prefix = $this->translateToWords(intval(floor($number/pow(10,2)))) . " hundred";
	                if ($number%pow(10,2)) $suffix = " and " . $this->translateToWords($number%pow(10,2));
	                $string = $prefix . $suffix;
	                break;
	            case $number < pow(10,5):
	                // floor return a float not an integer
	                $prefix = $this->translateToWords(intval(floor($number/pow(10,3)))) . " thousand";
	                if ($number%pow(10,3)) $suffix = $this->translateToWords($number%pow(10,3));
	                $string = $prefix . " " . $suffix;
	                break;
	            case $number < pow(10,9):
	                // floor return a float not an integer
	                $prefix = $this->translateToWords(intval(floor($number/pow(10,5)))) . " lac";
	                if ($number%pow(10,5)) $suffix = $this->translateToWords($number%pow(10,5));
	                $string = $prefix . " " . $suffix;
	                break;                    
	            case $number < pow(10,12):
	                // floor return a float not an integer
	                $prefix = $this->translateToWords(intval(floor($number/pow(10,9)))) . " billion";
	                if ($number%pow(10,9)) $suffix = $this->translateToWords($number%pow(10,9));
	                $string = $prefix . " " . $suffix;    
	                break;
	            case $number < pow(10,15):
	                // floor return a float not an integer
	                $prefix = $this->translateToWords(intval(floor($number/pow(10,12)))) . " trillion";
	                if ($number%pow(10,12)) $suffix = $this->translateToWords($number%pow(10,12));
	                $string = $prefix . " " . $suffix;    
	                break;        
	            // Be careful not to pass default formatted numbers in the quadrillions+ into this function
	            // Default formatting is float and causes errors
	            case $number < pow(10,18):
	                // floor return a float not an integer
	                $prefix = $this->translateToWords(intval(floor($number/pow(10,15)))) . " quadrillion";
	                if ($number%pow(10,15)) $suffix = $this->translateToWords($number%pow(10,15));
	                $string = $prefix . " " . $suffix;    
	                break;                    
	        }
	    } else {
	        echo "ERROR with - $number<br/> Number must be an integer between -" . number_format($max_size, 0, ".", ",") . " and " . number_format($max_size, 0, ".", ",") . " exclussive.";
	    }
	    return ucfirst($string);    
	}
	
	function switchValue($pid,$val,$modelName,$fieldName){
		if(!$pid && empty($val)){
			return false;
		}
		$this->loadModel($modelName);
 		$cond = $modelName;
 		$cond .= ".id = " . $pid;
		$this->{$modelName}->updateAll(array($fieldName=>$val),$cond);  
		return true;
	}	
}