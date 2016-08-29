<?php
/**
 * @Developed By	:	Engr. Rajib Mahmud
 * @Start Date	  	:	2nd Sep 2013
 * @Last Update		:	27th Nov 2013
 * @Copyright     	:  	Bangladesh Agricultural Research Council
 * @Link          	:  	http://www.barc.gov.bd
 * */

App::uses('AppController', 'Controller');
class ReportManagementsController extends AppController {
	public $name = 'ReportManagements';
	public $uses = array("User","Employee","EmployeePersonal","Validator","Salary","Deduction","PayScale","Loan","Refund","GeneratedSalary","GeneratedDeduction","FestivalAllowance","commonSetting");
	public $layout = "admin";
	//var $components = array("RequestHandler");
	var $components = array("RequestHandler", 'Mpdf.Mpdf');	
	function beforeFilter(){
		$this->adminCheck();
  		$this->myBeforeController();	
		Configure::load('constant');
	}
	
	public function index($type){
		$this->adminCheck();
		
	}
	
	function bankAdvice($type){
		$this->designations();
		$settingInfo = $this->Session->read("SETTING_INFO");
		$currentTime = $settingInfo["execution_date"];
		$start = mktime(0,0,0,date ('m',$currentTime),1,date ('Y',$currentTime));
		$end = mktime(0,0,0,date ('m',$currentTime) + 1,0,date ('Y',$currentTime));
		//$start = mktime(0,0,0,date ('m'),1,date ('Y'));
		//$end = mktime(0,0,0,date ('m') + 1,0,date ('Y'));
	   	
		$this->GeneratedSalary->bindModel( array('belongsTo' => array(
		'Employee' => array(
        	'className'     => 'Employee',
            'foreignKey'    => 'employee_id',
            'dependent'     => true
        ))));
         $this->GeneratedSalary->bindModel( array('belongsTo' => array(
		'EmployeePersonal' => array(
        	'className'     => 'EmployeePersonal',
            'foreignKey'    => 'employee_id',
            'dependent'     => true
        )))); 
		$conditions[] = "GeneratedSalary.execution_date >= $start";
    	$conditions[] = "GeneratedSalary.execution_date <= $end";
        $conditons[] = "GeneratedSalary.status != 0";
        $conditions[] = "Employee.type = $type";
		$conditions[] = "Employee.status != 0";
        $salaries = $this->GeneratedSalary->find("all",array("conditions"=>$conditions,"fields"=>array("payable","EmployeePersonal.account","Employee.first_name","Employee.middle_name","Employee.last_name","Employee.employee_code","Employee.designation_id"),"order"=>array("ABS(`Employee`.`employee_code`) ASC")));
        $this->set("curdate",$currentTime);
		$this->set("salaries",$salaries);
		$this->set("type",$type);
		$commonSetting = $this->commonSetting->find("first");
		$this->set("commonSetting",$commonSetting);
	}
	
	function generateBankAdvice($type,$fileName){
		$this->layout="pdf";
		$this->designations();
		$settingInfo = $this->Session->read("SETTING_INFO");
		$currentTime = $settingInfo["execution_date"];
		$start = mktime(0,0,0,date ('m',$currentTime),1,date ('Y',$currentTime));
		$end = mktime(0,0,0,date ('m',$currentTime) + 1,0,date ('Y',$currentTime));
		//$start = mktime(0,0,0,date ('m'),1,date ('Y'));
		//$end = mktime(0,0,0,date ('m') + 1,0,date ('Y'));
	   	$conditions[] = "GeneratedSalary.execution_date > $start";
    	$conditions[] = "GeneratedSalary.execution_date < $end";
		$conditons[] = "GeneratedSalary.status != 0";
    	$conditions[] = "Employee.type = $type";
		$conditions[] = "Employee.status != 0";
		$this->GeneratedSalary->bindModel( array('belongsTo' => array(
		'Employee' => array(
        	'className'     => 'Employee',
            'foreignKey'    => 'employee_id',
            'dependent'     => true
        ))));
         $this->GeneratedSalary->bindModel( array('belongsTo' => array(
		'EmployeePersonal' => array(
        	'className'     => 'EmployeePersonal',
            'foreignKey'    => 'employee_id',
            'dependent'     => true
        )))); 
        $salaries = $this->GeneratedSalary->find("all",array("conditions"=>$conditions,"fields"=>array("payable","EmployeePersonal.account","Employee.first_name","Employee.middle_name","Employee.last_name","Employee.employee_code","Employee.designation_id"),"order"=>array("ABS(`Employee`.`employee_code`) ASC")));
        $total  = 0;
        foreach($salaries as $salary){
        	$total = $total + $salary["GeneratedSalary"]["payable"];
        }
        $inWord = $this->translateToWords($total);
        $this->set("total",number_format($total));
        //$this->set("total_sal",number_format($total));
        $this->set("inWord",$inWord);
        //pr($conditions); pr($salaries); die();
		$this->set("salaries",$salaries);
		$this->set("type",$type);
		$this->set("curdate",$currentTime);
		$commonSetting = $this->commonSetting->find("first");
		$this->set("commonSetting",$commonSetting);
		/*Configure::write('debug', 0);
		ini_set("magic_quotes_runtime", 0); // only use for Mpdf
		Configure::write('CakePdf', array(
	        'engine' => 'CakePdf.Mpdf',
	        'options' => array(
	            'print-media-type' => false,
	            'outline' => true,
	            'dpi' => 96
	        ),
	        'margin' => array(
	            'bottom' => 1,
	            'left' => 1,
	            'right' => 1,
	            'top' => 1
	        ),
	        "pageSize"=>"A4",
	        'orientation' => 'potrait',
	        "title"=>"Pay Slip",
	        'filename' => $fileName,
	        'download' => false,
	        'encoding'=>'UTF-8'
	    ));
	    $this->Session->delete("Message");
		$this->Session->delete("SETTING_INFO");*/ 
		$_html = '
		<htmlpagefooter name="MyFooter1">
		<div style="height:50px !important;">
		&nbsp;
		
		<div>
		</htmlpagefooter>

		<sethtmlpagefooter name="MyFooter1" value="on" />
		';			
		$_html .= $this->_getViewObject()->element('generate_bank_advice');
        $this->create_pdf($_html);
	}
	
	function faBankAdvice($type){
		$this->designations();
		$settingInfo = $this->Session->read("SETTING_INFO");
		$currentTime = $settingInfo["execution_date"];
		$start = mktime(0,0,0,date ('m',$currentTime),1,date ('Y',$currentTime));
		$end = mktime(0,0,0,date ('m',$currentTime) + 1,0,date ('Y',$currentTime));
		//$start = mktime(0,0,0,date ('m'),1,date ('Y')); 
		//$end = mktime(0,0,0,date ('m') + 1,0,date ('Y'));
		//pr(date("d-m-Y",$start)); pr(date("d-m-Y",$end));
	   	$conditions[] = "FestivalAllowance.payment_date >= $start";
    	$conditions[] = "FestivalAllowance.payment_date <= $end";
    	$conditions[] = "Employee.type = $type";
		$conditions[] = "Employee.status != 0";
		$this->FestivalAllowance->bindModel( array('belongsTo' => array(
			'Employee' => array(
        	'className'     => 'Employee',
            'foreignKey'    => 'employee_id',
            'dependent'     => true
        ))));
        $this->FestivalAllowance->bindModel( array('belongsTo' => array(
			'EmployeePersonal' => array(
        	'className'     => 'EmployeePersonal',
            'foreignKey'    => 'employee_id',
            'dependent'     => true
        ))));
        //$conditions = NULL;
        $fas = $this->FestivalAllowance->find("all",array("conditions"=>$conditions));
		$this->set("fas",$fas);
		$this->set("type",$type);
		$commonSetting = $this->commonSetting->find("first");
		$this->set("commonSetting",$commonSetting);
		//pr($fas); pr($conditions);
	}
	
	function generateFaBankAdvice($type,$fileName){
		$this->designations();
		$this->layout="pdf";
		$settingInfo = $this->Session->read("SETTING_INFO");
		$currentTime = $settingInfo["execution_date"];
		$start = mktime(0,0,0,date ('m',$currentTime),1,date ('Y',$currentTime));
		$end = mktime(0,0,0,date ('m',$currentTime) + 1,0,date ('Y',$currentTime));
		//$start = mktime(0,0,0,date ('m'),1,date ('Y'));
		//$end = mktime(0,0,0,date ('m') + 1,0,date ('Y'));
	   	$conditions[] = "FestivalAllowance.payment_date >= $start";
    	$conditions[] = "FestivalAllowance.payment_date <= $end";
    	$conditions[] = "Employee.type = $type";
		$conditions[] = "Employee.status != 0";
		$this->FestivalAllowance->bindModel( array('belongsTo' => array(
			'Employee' => array(
        	'className'     => 'Employee',
            'foreignKey'    => 'employee_id',
            'dependent'     => true
        ))));
        $this->FestivalAllowance->bindModel( array('belongsTo' => array(
			'EmployeePersonal' => array(
        	'className'     => 'EmployeePersonal',
            'foreignKey'    => 'employee_id',
            'dependent'     => true
        ))));
        //$conditions = NULL;
        $fas = $this->FestivalAllowance->find("all",array("conditions"=>$conditions));
		$this->set("fas",$fas);
        $total  = 0;
        foreach($fas as $fa){
        	$total = $total + $fa["FestivalAllowance"]["payable"];
        }
        $inWord = $this->translateToWords($total);
        $this->set("total",number_format($total));
        $this->set("inWord",$inWord);
		$commonSetting = $this->commonSetting->find("first");
		$this->set("commonSetting",$commonSetting);
       	//pr($total); pr($inWord); pr($fas); die();
		$this->set("type",$type);
		/*Configure::write('debug', 0);
		ini_set("magic_quotes_runtime", 0); // only use for Mpdf
		Configure::write('CakePdf', array(
	        'engine' => 'CakePdf.Mpdf',
	        'options' => array(
	            'print-media-type' => false,
	            'outline' => true,
	            'dpi' => 96
	        ),
	        'margin' => array(
	            'bottom' => 1,
	            'left' => 1,
	            'right' => 1,
	            'top' => 1
	        ),
	        "pageSize"=>"A4",
	        'orientation' => 'portraitit',
	        "title"=>"Pay Slip",
	        'filename' => $fileName,
	        'download' => false,
	        'encoding'=>'UTF-8'
	    ));
	    $this->Session->delete("Message");
		$this->Session->delete("SETTING_INFO");*/
		$_html = $this->_getViewObject()->element('generate_fa_bank_advice');
        $this->create_pdf($_html);	
	}
	
	function basic($type){
		$this->designations();
		$settingInfo = $this->Session->read("SETTING_INFO");
		$currentTime = $settingInfo["execution_date"];
		$start = mktime(0,0,0,date ('m',$currentTime),1,date ('Y',$currentTime));
		$end = mktime(0,0,0,date ('m',$currentTime) + 1,0,date ('Y',$currentTime));
		//$start = mktime(0,0,0,date ('m'),1,date ('Y'));
		//$end = mktime(0,0,0,date ('m') + 1,0,date ('Y'));
	   	$conditions[] = "GeneratedSalary.execution_date >= $start";
    	$conditions[] = "GeneratedSalary.execution_date <= $end";
        $conditions[] = "Employee.type = $type";
		$conditions[] = "Employee.status != 0";
        $this->GeneratedSalary->bindModel( array('belongsTo' => array(
		'Employee' => array(
        	'className'     => 'Employee',
            'foreignKey'    => 'employee_id',
            'dependent'     => true
        ))));
        $salaries = $this->GeneratedSalary->find("all",array("conditions"=>$conditions,"fields"=>array("id","basic","Employee.first_name","Employee.middle_name","Employee.last_name","Employee.employee_code","Employee.designation_id"),"order"=>array("ABS(`Employee`.`employee_code`) ASC")));
        //$log = $this->GeneratedSalary->getDataSource()->getLog(false, false); debug($log);
		//pr($salaries); die();
		$this->set("curdate",$currentTime);
		$this->set("salaries",$salaries);
		$this->set("type",$type);
	}
	
	function basicPdf($type,$fileName){
		$this->designations();
		$this->layout="pdf";
		$settingInfo = $this->Session->read("SETTING_INFO");
		$currentTime = $settingInfo["execution_date"];
		$this->set("curdate",$currentTime);
		$start = mktime(0,0,0,date ('m',$currentTime),1,date ('Y',$currentTime));
		$end = mktime(0,0,0,date ('m',$currentTime) + 1,0,date ('Y',$currentTime));
		//$start = mktime(0,0,0,date ('m'),1,date ('Y'));
		//$end = mktime(0,0,0,date ('m') + 1,0,date ('Y'));
	   	$conditions[] = "GeneratedSalary.execution_date >= $start";
    	$conditions[] = "GeneratedSalary.execution_date <= $end";
        $conditions[] = "Employee.type = $type";
		$conditions[] = "Employee.status != 0";
        $this->GeneratedSalary->bindModel( array('belongsTo' => array(
		'Employee' => array(
        	'className'     => 'Employee',
            'foreignKey'    => 'employee_id',
            'dependent'     => true
        ))));
        $salaries = $this->GeneratedSalary->find("all",array("conditions"=>$conditions,"fields"=>array("id","basic","Employee.first_name","Employee.middle_name","Employee.last_name","Employee.employee_code","Employee.designation_id"),"order"=>array("ABS(`Employee`.`employee_code`) ASC")));
        
		$this->set("salaries",$salaries);
		//pr($salaries);exit;
		$this->set("type",$type);
		/*Configure::write('debug', 0);
		ini_set("magic_quotes_runtime", 0); // only use for Mpdf
		Configure::write('CakePdf', array(
	        'engine' => 'CakePdf.Mpdf',
	        'options' => array(
	            'print-media-type' => false,
	            'outline' => true,
	            'dpi' => 96
	        ),
	        'margin' => array(
	            'bottom' => 1,
	            'left' => 1,
	            'right' => 1,
	            'top' => 1
	        ),
	        "pageSize"=>"A4",
	        'orientation' => 'portrait',
	        "title"=>"Pay Slip",
	        'filename' => $fileName,
	        'download' => false,
	        'encoding'=>'UTF-8'
	    ));*/
		
		$_html = $this->_getViewObject()->element('basic_pdf');
        $this->create_pdf($_html);
	}
	
	function grossTotal($type){
		$this->designations();
		$settingInfo = $this->Session->read("SETTING_INFO");
		$currentTime = $settingInfo["execution_date"];
		$start = mktime(0,0,0,date ('m',$currentTime),1,date ('Y',$currentTime));
		$end = mktime(0,0,0,date ('m',$currentTime) + 1,0,date ('Y',$currentTime));
		$conditions = NULL;
        $conditions[] = "GeneratedSalary.status != 0";
        $conditions[] = "GeneratedDeduction.status != 0";
        $conditions[] = "GeneratedSalary.execution_date between $start AND $end";
        //$conditions[] = "GeneratedSalary.execution_date < $end";
        $conditions[] = "Employee.type = $type";
		$conditions[] = "Employee.status != 0 ";
        $this->GeneratedSalary->bindModel(array('belongsTo' => array(
                'Employee' => array(
                    'className' => 'Employee',
                    'foreignKey' => 'employee_id',
                    "fields" => array("employee_code", "first_name", "middle_name", "last_name", "status"),
                    'dependent' => true
        ))));
        $this->GeneratedSalary->bindModel(array('hasOne' => array(
                'GeneratedDeduction' => array(
                    'className' => 'GeneratedDeduction',
                    'foreignKey' => 'generated_salary_id',
                    'dependent' => true
        ))));
        $salaries = $this->GeneratedSalary->find("all", array("conditions" => $conditions, "order" => array("GeneratedSalary.id ASC", "GeneratedSalary.grade ASC", "GeneratedSalary.designation_id ASC")));
        
		$net_salary = array();
		$net_salary['basic'] = $net_salary['house_rent'] = $net_salary['medical'] = $net_salary['pp'] = $net_salary['edu'] = $net_salary['charge'] = $net_salary['dearness'] = $net_salary['conveyance'] = $net_salary['tiffin'] = $net_salary['washing'] = $net_salary['aid'] = $net_salary['sumptuary'] = $net_salary['arrear'] = $net_salary['miscellaneous'] = $net_salary['fraction_increment'] = $net_salary['total_add'] = $net_salary['deputation'] = 0;
		
		$net_deduction = array();
		$net_deduction['cpf1'] = $net_deduction['cpf2'] = $net_deduction['arrear_cpf'] = $net_deduction['cpf_loan1'] = $net_deduction['cpf_loan2'] = $net_deduction['house_loan'] = $net_deduction['vehicle_loan'] = $net_deduction['cpf_interest'] = $net_deduction['h_interest'] = $net_deduction['v_interest'] = $net_deduction['benevolent_fund'] = $net_deduction['house_rent_deduct'] = $net_deduction['transport_bill'] = $net_deduction['personal_vehicle'] = $net_deduction['group_insurance'] = $net_deduction['w_s'] = $net_deduction['fuel'] = $net_deduction['overdrawn'] = $net_deduction['phone_bill'] = $net_deduction['association'] = $net_deduction['tax'] = $net_deduction['miscellaneous_deduct'] = $net_deduction['total_sub'] = 0;
		
		$reg_deduction = array();
		$reg_deduction['cpf1'] = $reg_deduction['cpf2'] = $reg_deduction['arrear_cpf'] = $reg_deduction['cpf_loan1'] = $reg_deduction['cpf_loan2'] = $reg_deduction['house_loan'] = $reg_deduction['vehicle_loan'] = $reg_deduction['cpf_interest'] = $reg_deduction['h_interest'] = $reg_deduction['v_interest'] = $reg_deduction['benevolent_fund'] = $reg_deduction['house_rent_deduct'] = $reg_deduction['transport_bill'] = $reg_deduction['personal_vehicle'] = $reg_deduction['group_insurance'] = $reg_deduction['w_s'] = $reg_deduction['fuel'] = $reg_deduction['overdrawn'] = $reg_deduction['phone_bill'] = $reg_deduction['association'] = $reg_deduction['tax'] = $reg_deduction['miscellaneous_deduct'] = $reg_deduction['total_sub'] = 0;
		
		$dep_deduction = array();
		$dep_deduction['cpf1'] = $dep_deduction['cpf2'] = $dep_deduction['arrear_cpf'] = $dep_deduction['cpf_loan1'] = $dep_deduction['cpf_loan2'] = $dep_deduction['house_loan'] = $dep_deduction['vehicle_loan'] = $dep_deduction['cpf_interest'] = $dep_deduction['h_interest'] = $dep_deduction['v_interest'] = $dep_deduction['benevolent_fund'] = $dep_deduction['house_rent_deduct'] = $dep_deduction['transport_bill'] = $dep_deduction['personal_vehicle'] = $dep_deduction['group_insurance'] = $dep_deduction['w_s'] = $dep_deduction['fuel'] = $dep_deduction['overdrawn'] = $dep_deduction['phone_bill'] = $dep_deduction['association'] = $dep_deduction['tax'] = $dep_deduction['miscellaneous_deduct'] = $dep_deduction['total_sub'] = 0;
		
		foreach($salaries AS $sal){
			$net_salary['basic'] = $net_salary['basic'] + $sal['GeneratedSalary']['basic'] ;
			$net_salary['deputation'] = $net_salary['deputation'] + $sal['GeneratedSalary']['deputation'] ;
			$net_salary['house_rent'] = round($net_salary['house_rent']) + round($sal['GeneratedSalary']['house_rent']);
			$net_salary['medical'] = $net_salary['medical'] + $sal['GeneratedSalary']['medical'];
			$net_salary['pp'] = $net_salary['pp'] + $sal['GeneratedSalary']['pp'];
			$net_salary['edu'] = $net_salary['edu'] + $sal['GeneratedSalary']['edu'];
			$net_salary['charge'] = $net_salary['charge'] + $sal['GeneratedSalary']['charge'];
			$net_salary['dearness'] = $net_salary['dearness'] + $sal['GeneratedSalary']['dearness'];
			$net_salary['conveyance'] = $net_salary['conveyance'] + $sal['GeneratedSalary']['conveyance'];
			$net_salary['tiffin'] = $net_salary['tiffin'] + $sal['GeneratedSalary']['tiffin'];
			$net_salary['washing'] = $net_salary['washing'] + $sal['GeneratedSalary']['washing'];
			$net_salary['aid'] = $net_salary['aid'] + $sal['GeneratedSalary']['aid'];
			$net_salary['sumptuary'] = $net_salary['sumptuary'] + $sal['GeneratedSalary']['sumptuary'];
			$net_salary['arrear'] = $net_salary['arrear'] + $sal['GeneratedSalary']['arrear'];
			$net_salary['miscellaneous'] = $net_salary['miscellaneous'] + $sal['GeneratedSalary']['miscellaneous'];
			$net_salary['fraction_increment'] = $net_salary['fraction_increment'] + $sal['GeneratedSalary']['fraction_increment'];
			$net_salary['total_add'] = round($net_salary['total_add']) + round($sal['GeneratedSalary']['total_add']);
			
			$net_deduction['cpf1'] = $net_deduction['cpf1'] + $sal['GeneratedDeduction']['cpf1'];
			$net_deduction['cpf2'] = $net_deduction['cpf2'] + $sal['GeneratedDeduction']['cpf2'];
			$net_deduction['arrear_cpf'] = $net_deduction['arrear_cpf'] + $sal['GeneratedDeduction']['arrear_cpf'];
			$net_deduction['cpf_loan1'] = $net_deduction['cpf_loan1'] + $sal['GeneratedDeduction']['cpf_loan1'];
			$net_deduction['cpf_loan2'] = $net_deduction['cpf_loan2'] + $sal['GeneratedDeduction']['cpf_loan2'];
			$net_deduction['house_loan'] = $net_deduction['house_loan'] + $sal['GeneratedDeduction']['house_loan'];
			$net_deduction['vehicle_loan'] = $net_deduction['vehicle_loan'] + $sal['GeneratedDeduction']['vehicle_loan'];
			$net_deduction['cpf_interest'] = $net_deduction['cpf_interest'] + $sal['GeneratedDeduction']['cpf_interest'];
			$net_deduction['h_interest'] = $net_deduction['h_interest'] + $sal['GeneratedDeduction']['h_interest'];
			$net_deduction['v_interest'] = $net_deduction['v_interest'] + $sal['GeneratedDeduction']['v_interest'];
			$net_deduction['benevolent_fund'] = $net_deduction['benevolent_fund'] + $sal['GeneratedDeduction']['benevolent_fund'];
			$net_deduction['house_rent_deduct'] = $net_deduction['house_rent_deduct'] + $sal['GeneratedDeduction']['house_rent_deduct'];
			$net_deduction['transport_bill'] = $net_deduction['transport_bill'] + $sal['GeneratedDeduction']['transport_bill'];
			$net_deduction['personal_vehicle'] = $net_deduction['personal_vehicle'] + $sal['GeneratedDeduction']['personal_vehicle'];
			$net_deduction['group_insurance'] = $net_deduction['group_insurance'] + $sal['GeneratedDeduction']['group_insurance'];
			$net_deduction['w_s'] = $net_deduction['w_s'] + $sal['GeneratedDeduction']['w_s'];
			$net_deduction['fuel'] = $net_deduction['fuel'] + $sal['GeneratedDeduction']['fuel'];
			$net_deduction['overdrawn'] = $net_deduction['overdrawn'] + $sal['GeneratedDeduction']['overdrawn'];
			$net_deduction['phone_bill'] = $net_deduction['phone_bill'] + $sal['GeneratedDeduction']['phone_bill'];
			$net_deduction['association'] = $net_deduction['association'] + $sal['GeneratedDeduction']['association'];
			$net_deduction['tax'] = $net_deduction['tax'] + $sal['GeneratedDeduction']['tax'];
			$net_deduction['miscellaneous_deduct'] = $net_deduction['miscellaneous_deduct'] + $sal['GeneratedDeduction']['miscellaneous_deduct'];
			$net_deduction['total_sub'] = round($net_deduction['total_sub']) + round($sal['GeneratedDeduction']['total_sub']);
			
			if($sal['Employee']['status'] == 2){
				$dep_deduction['cpf1'] = $dep_deduction['cpf1'] + $sal['GeneratedDeduction']['cpf1'];
				$dep_deduction['cpf2'] = $dep_deduction['cpf2'] + $sal['GeneratedDeduction']['cpf2'];
				$dep_deduction['arrear_cpf'] = $dep_deduction['arrear_cpf'] + $sal['GeneratedDeduction']['arrear_cpf'];
				$dep_deduction['cpf_loan1'] = $dep_deduction['cpf_loan1'] + $sal['GeneratedDeduction']['cpf_loan1'];
				$dep_deduction['cpf_loan2'] = $dep_deduction['cpf_loan2'] + $sal['GeneratedDeduction']['cpf_loan2'];
				$dep_deduction['house_loan'] = $dep_deduction['house_loan'] + $sal['GeneratedDeduction']['house_loan'];
				$dep_deduction['vehicle_loan'] = $dep_deduction['vehicle_loan'] + $sal['GeneratedDeduction']['vehicle_loan'];
				$dep_deduction['cpf_interest'] = $dep_deduction['cpf_interest'] + $sal['GeneratedDeduction']['cpf_interest'];
				$dep_deduction['h_interest'] = $dep_deduction['h_interest'] + $sal['GeneratedDeduction']['h_interest'];
				$dep_deduction['v_interest'] = $dep_deduction['v_interest'] + $sal['GeneratedDeduction']['v_interest'];
				$dep_deduction['benevolent_fund'] = $dep_deduction['benevolent_fund'] + $sal['GeneratedDeduction']['benevolent_fund'];
				$dep_deduction['house_rent_deduct'] = $dep_deduction['house_rent_deduct'] + $sal['GeneratedDeduction']['house_rent_deduct'];
				$dep_deduction['transport_bill'] = $dep_deduction['transport_bill'] + $sal['GeneratedDeduction']['transport_bill'];
				$dep_deduction['personal_vehicle'] = $dep_deduction['personal_vehicle'] + $sal['GeneratedDeduction']['personal_vehicle'];
				$dep_deduction['group_insurance'] = $dep_deduction['group_insurance'] + $sal['GeneratedDeduction']['group_insurance'];
				$dep_deduction['w_s'] = $dep_deduction['w_s'] + $sal['GeneratedDeduction']['w_s'];
				$dep_deduction['fuel'] = $dep_deduction['fuel'] + $sal['GeneratedDeduction']['fuel'];
				$dep_deduction['overdrawn'] = $dep_deduction['overdrawn'] + $sal['GeneratedDeduction']['overdrawn'];
				$dep_deduction['phone_bill'] = $dep_deduction['phone_bill'] + $sal['GeneratedDeduction']['phone_bill'];
				$dep_deduction['association'] = $dep_deduction['association'] + $sal['GeneratedDeduction']['association'];
				$dep_deduction['tax'] = $dep_deduction['tax'] + $sal['GeneratedDeduction']['tax'];
				$dep_deduction['miscellaneous_deduct'] = $dep_deduction['miscellaneous_deduct'] + $sal['GeneratedDeduction']['miscellaneous_deduct'];
				$dep_deduction['total_sub'] = $dep_deduction['total_sub'] + $sal['GeneratedDeduction']['total_sub'];
			}
			else{
				$reg_deduction['cpf1'] = $reg_deduction['cpf1'] + $sal['GeneratedDeduction']['cpf1'];
				$reg_deduction['cpf2'] = $reg_deduction['cpf2'] + $sal['GeneratedDeduction']['cpf2'];
				$reg_deduction['arrear_cpf'] = $reg_deduction['arrear_cpf'] + $sal['GeneratedDeduction']['arrear_cpf'];
				$reg_deduction['cpf_loan1'] = $reg_deduction['cpf_loan1'] + $sal['GeneratedDeduction']['cpf_loan1'];
				$reg_deduction['cpf_loan2'] = $reg_deduction['cpf_loan2'] + $sal['GeneratedDeduction']['cpf_loan2'];
				$reg_deduction['house_loan'] = $reg_deduction['house_loan'] + $sal['GeneratedDeduction']['house_loan'];
				$reg_deduction['vehicle_loan'] = $reg_deduction['vehicle_loan'] + $sal['GeneratedDeduction']['vehicle_loan'];
				$reg_deduction['cpf_interest'] = $reg_deduction['cpf_interest'] + $sal['GeneratedDeduction']['cpf_interest'];
				$reg_deduction['h_interest'] = $reg_deduction['h_interest'] + $sal['GeneratedDeduction']['h_interest'];
				$reg_deduction['v_interest'] = $reg_deduction['v_interest'] + $sal['GeneratedDeduction']['v_interest'];
				$reg_deduction['benevolent_fund'] = $reg_deduction['benevolent_fund'] + $sal['GeneratedDeduction']['benevolent_fund'];
				$reg_deduction['house_rent_deduct'] = $reg_deduction['house_rent_deduct'] + $sal['GeneratedDeduction']['house_rent_deduct'];
				$reg_deduction['transport_bill'] = $reg_deduction['transport_bill'] + $sal['GeneratedDeduction']['transport_bill'];
				$reg_deduction['personal_vehicle'] = $reg_deduction['personal_vehicle'] + $sal['GeneratedDeduction']['personal_vehicle'];
				$reg_deduction['group_insurance'] = $reg_deduction['group_insurance'] + $sal['GeneratedDeduction']['group_insurance'];
				$reg_deduction['w_s'] = $reg_deduction['w_s'] + $sal['GeneratedDeduction']['w_s'];
				$reg_deduction['fuel'] = $reg_deduction['fuel'] + $sal['GeneratedDeduction']['fuel'];
				$reg_deduction['overdrawn'] = $reg_deduction['overdrawn'] + $sal['GeneratedDeduction']['overdrawn'];
				$reg_deduction['phone_bill'] = $reg_deduction['phone_bill'] + $sal['GeneratedDeduction']['phone_bill'];
				$reg_deduction['association'] = $reg_deduction['association'] + $sal['GeneratedDeduction']['association'];
				$reg_deduction['tax'] = $reg_deduction['tax'] + $sal['GeneratedDeduction']['tax'];
				$reg_deduction['miscellaneous_deduct'] = $reg_deduction['miscellaneous_deduct'] + $sal['GeneratedDeduction']['miscellaneous_deduct'];
				$reg_deduction['total_sub'] = $reg_deduction['total_sub'] + $sal['GeneratedDeduction']['total_sub'];
			}
		}
		$intotal = $this->translateToWords($net_salary['total_add'] - $net_deduction['total_sub']);
		
		$this->set("curdate",$currentTime);
		$this->set("net_salaries",$net_salary);
		$this->set("net_deductions",$net_deduction);
		$this->set("reg_deductions",$reg_deduction);
		$this->set("dep_deductions",$dep_deduction);
		$this->set("intotal",$intotal);
		$this->set("type",$type);
		
	}
	
	function grosstotalPdf($type,$fileName){
		$this->designations();
		$this->layout="pdf";
		$settingInfo = $this->Session->read("SETTING_INFO");
		$currentTime = $settingInfo["execution_date"];
		$start = mktime(0,0,0,date ('m',$currentTime),1,date ('Y',$currentTime));
		$end = mktime(0,0,0,date ('m',$currentTime) + 1,0,date ('Y',$currentTime));
		$conditions = NULL;
        $conditions[] = "GeneratedSalary.status != 0";
        $conditions[] = "GeneratedDeduction.status != 0";
        $conditions[] = "GeneratedSalary.execution_date between $start AND $end";
        //$conditions[] = "GeneratedSalary.execution_date < $end";
        $conditions[] = "Employee.type = $type";
        $this->GeneratedSalary->bindModel(array('belongsTo' => array(
                'Employee' => array(
                    'className' => 'Employee',
                    'foreignKey' => 'employee_id',
                    "fields" => array("employee_code", "first_name", "middle_name", "last_name", "status"),
                    'dependent' => true
        ))));
        $this->GeneratedSalary->bindModel(array('hasOne' => array(
                'GeneratedDeduction' => array(
                    'className' => 'GeneratedDeduction',
                    'foreignKey' => 'generated_salary_id',
                    'dependent' => true
        ))));
        $salaries = $this->GeneratedSalary->find("all", array("conditions" => $conditions, "order" => array("GeneratedSalary.id ASC", "GeneratedSalary.grade ASC", "GeneratedSalary.designation_id ASC")));
        
		$net_salary = array();
		$net_salary['basic'] = $net_salary['house_rent'] = $net_salary['medical'] = $net_salary['pp'] = $net_salary['edu'] = $net_salary['charge'] = $net_salary['dearness'] = $net_salary['conveyance'] = $net_salary['tiffin'] = $net_salary['washing'] = $net_salary['aid'] = $net_salary['sumptuary'] = $net_salary['arrear'] = $net_salary['miscellaneous'] = $net_salary['fraction_increment'] = $net_salary['total_add'] = $net_salary['deputation'] = 0;
		
		$net_deduction = array();
		$net_deduction['cpf1'] = $net_deduction['cpf2'] = $net_deduction['arrear_cpf'] = $net_deduction['cpf_loan1'] = $net_deduction['cpf_loan2'] = $net_deduction['house_loan'] = $net_deduction['vehicle_loan'] = $net_deduction['cpf_interest'] = $net_deduction['h_interest'] = $net_deduction['v_interest'] = $net_deduction['benevolent_fund'] = $net_deduction['house_rent_deduct'] = $net_deduction['transport_bill'] = $net_deduction['personal_vehicle'] = $net_deduction['group_insurance'] = $net_deduction['w_s'] = $net_deduction['fuel'] = $net_deduction['overdrawn'] = $net_deduction['phone_bill'] = $net_deduction['association'] = $net_deduction['tax'] = $net_deduction['miscellaneous_deduct'] = $net_deduction['total_sub'] = 0;
		
		$reg_deduction = array();
		$reg_deduction['cpf1'] = $reg_deduction['cpf2'] = $reg_deduction['arrear_cpf'] = $reg_deduction['cpf_loan1'] = $reg_deduction['cpf_loan2'] = $reg_deduction['house_loan'] = $reg_deduction['vehicle_loan'] = $reg_deduction['cpf_interest'] = $reg_deduction['h_interest'] = $reg_deduction['v_interest'] = $reg_deduction['benevolent_fund'] = $reg_deduction['house_rent_deduct'] = $reg_deduction['transport_bill'] = $reg_deduction['personal_vehicle'] = $reg_deduction['group_insurance'] = $reg_deduction['w_s'] = $reg_deduction['fuel'] = $reg_deduction['overdrawn'] = $reg_deduction['phone_bill'] = $reg_deduction['association'] = $reg_deduction['tax'] = $reg_deduction['miscellaneous_deduct'] = $reg_deduction['total_sub'] = 0;
		
		$dep_deduction = array();
		$dep_deduction['cpf1'] = $dep_deduction['cpf2'] = $dep_deduction['arrear_cpf'] = $dep_deduction['cpf_loan1'] = $dep_deduction['cpf_loan2'] = $dep_deduction['house_loan'] = $dep_deduction['vehicle_loan'] = $dep_deduction['cpf_interest'] = $dep_deduction['h_interest'] = $dep_deduction['v_interest'] = $dep_deduction['benevolent_fund'] = $dep_deduction['house_rent_deduct'] = $dep_deduction['transport_bill'] = $dep_deduction['personal_vehicle'] = $dep_deduction['group_insurance'] = $dep_deduction['w_s'] = $dep_deduction['fuel'] = $dep_deduction['overdrawn'] = $dep_deduction['phone_bill'] = $dep_deduction['association'] = $dep_deduction['tax'] = $dep_deduction['miscellaneous_deduct'] = $dep_deduction['total_sub'] = 0;
		
		foreach($salaries AS $sal){
			$net_salary['basic'] = $net_salary['basic'] + $sal['GeneratedSalary']['basic'] ;
			$net_salary['deputation'] = $net_salary['deputation'] + $sal['GeneratedSalary']['deputation'] ;
			$net_salary['house_rent'] = $net_salary['house_rent'] + $sal['GeneratedSalary']['house_rent'];
			$net_salary['medical'] = $net_salary['medical'] + $sal['GeneratedSalary']['medical'];
			$net_salary['pp'] = $net_salary['pp'] + $sal['GeneratedSalary']['pp'];
			$net_salary['edu'] = $net_salary['edu'] + $sal['GeneratedSalary']['edu'];
			$net_salary['charge'] = $net_salary['charge'] + $sal['GeneratedSalary']['charge'];
			$net_salary['dearness'] = $net_salary['dearness'] + $sal['GeneratedSalary']['dearness'];
			$net_salary['conveyance'] = $net_salary['conveyance'] + $sal['GeneratedSalary']['conveyance'];
			$net_salary['tiffin'] = $net_salary['tiffin'] + $sal['GeneratedSalary']['tiffin'];
			$net_salary['washing'] = $net_salary['washing'] + $sal['GeneratedSalary']['washing'];
			$net_salary['aid'] = $net_salary['aid'] + $sal['GeneratedSalary']['aid'];
			$net_salary['sumptuary'] = $net_salary['sumptuary'] + $sal['GeneratedSalary']['sumptuary'];
			$net_salary['arrear'] = $net_salary['arrear'] + $sal['GeneratedSalary']['arrear'];
			$net_salary['miscellaneous'] = $net_salary['miscellaneous'] + $sal['GeneratedSalary']['miscellaneous'];
			$net_salary['fraction_increment'] = $net_salary['fraction_increment'] + $sal['GeneratedSalary']['fraction_increment'];
			$net_salary['total_add'] = $net_salary['total_add'] + $sal['GeneratedSalary']['total_add'];
			
			$net_deduction['cpf1'] = $net_deduction['cpf1'] + $sal['GeneratedDeduction']['cpf1'];
			$net_deduction['cpf2'] = $net_deduction['cpf2'] + $sal['GeneratedDeduction']['cpf2'];
			$net_deduction['arrear_cpf'] = $net_deduction['arrear_cpf'] + $sal['GeneratedDeduction']['arrear_cpf'];
			$net_deduction['cpf_loan1'] = $net_deduction['cpf_loan1'] + $sal['GeneratedDeduction']['cpf_loan1'];
			$net_deduction['cpf_loan2'] = $net_deduction['cpf_loan2'] + $sal['GeneratedDeduction']['cpf_loan2'];
			$net_deduction['house_loan'] = $net_deduction['house_loan'] + $sal['GeneratedDeduction']['house_loan'];
			$net_deduction['vehicle_loan'] = $net_deduction['vehicle_loan'] + $sal['GeneratedDeduction']['vehicle_loan'];
			$net_deduction['cpf_interest'] = $net_deduction['cpf_interest'] + $sal['GeneratedDeduction']['cpf_interest'];
			$net_deduction['h_interest'] = $net_deduction['h_interest'] + $sal['GeneratedDeduction']['h_interest'];
			$net_deduction['v_interest'] = $net_deduction['v_interest'] + $sal['GeneratedDeduction']['v_interest'];
			$net_deduction['benevolent_fund'] = $net_deduction['benevolent_fund'] + $sal['GeneratedDeduction']['benevolent_fund'];
			$net_deduction['house_rent_deduct'] = $net_deduction['house_rent_deduct'] + $sal['GeneratedDeduction']['house_rent_deduct'];
			$net_deduction['transport_bill'] = $net_deduction['transport_bill'] + $sal['GeneratedDeduction']['transport_bill'];
			$net_deduction['personal_vehicle'] = $net_deduction['personal_vehicle'] + $sal['GeneratedDeduction']['personal_vehicle'];
			$net_deduction['group_insurance'] = $net_deduction['group_insurance'] + $sal['GeneratedDeduction']['group_insurance'];
			$net_deduction['w_s'] = $net_deduction['w_s'] + $sal['GeneratedDeduction']['w_s'];
			$net_deduction['fuel'] = $net_deduction['fuel'] + $sal['GeneratedDeduction']['fuel'];
			$net_deduction['overdrawn'] = $net_deduction['overdrawn'] + $sal['GeneratedDeduction']['overdrawn'];
			$net_deduction['phone_bill'] = $net_deduction['phone_bill'] + $sal['GeneratedDeduction']['phone_bill'];
			$net_deduction['association'] = $net_deduction['association'] + $sal['GeneratedDeduction']['association'];
			$net_deduction['tax'] = $net_deduction['tax'] + $sal['GeneratedDeduction']['tax'];
			$net_deduction['miscellaneous_deduct'] = $net_deduction['miscellaneous_deduct'] + $sal['GeneratedDeduction']['miscellaneous_deduct'];
			$net_deduction['total_sub'] = $net_deduction['total_sub'] + $sal['GeneratedDeduction']['total_sub'];
			
			if($sal['Employee']['status'] == 2){
				$dep_deduction['cpf1'] = $dep_deduction['cpf1'] + $sal['GeneratedDeduction']['cpf1'];
				$dep_deduction['cpf2'] = $dep_deduction['cpf2'] + $sal['GeneratedDeduction']['cpf2'];
				$dep_deduction['arrear_cpf'] = $dep_deduction['arrear_cpf'] + $sal['GeneratedDeduction']['arrear_cpf'];
				$dep_deduction['cpf_loan1'] = $dep_deduction['cpf_loan1'] + $sal['GeneratedDeduction']['cpf_loan1'];
				$dep_deduction['cpf_loan2'] = $dep_deduction['cpf_loan2'] + $sal['GeneratedDeduction']['cpf_loan2'];
				$dep_deduction['house_loan'] = $dep_deduction['house_loan'] + $sal['GeneratedDeduction']['house_loan'];
				$dep_deduction['vehicle_loan'] = $dep_deduction['vehicle_loan'] + $sal['GeneratedDeduction']['vehicle_loan'];
				$dep_deduction['cpf_interest'] = $dep_deduction['cpf_interest'] + $sal['GeneratedDeduction']['cpf_interest'];
				$dep_deduction['h_interest'] = $dep_deduction['h_interest'] + $sal['GeneratedDeduction']['h_interest'];
				$dep_deduction['v_interest'] = $dep_deduction['v_interest'] + $sal['GeneratedDeduction']['v_interest'];
				$dep_deduction['benevolent_fund'] = $dep_deduction['benevolent_fund'] + $sal['GeneratedDeduction']['benevolent_fund'];
				$dep_deduction['house_rent_deduct'] = $dep_deduction['house_rent_deduct'] + $sal['GeneratedDeduction']['house_rent_deduct'];
				$dep_deduction['transport_bill'] = $dep_deduction['transport_bill'] + $sal['GeneratedDeduction']['transport_bill'];
				$dep_deduction['personal_vehicle'] = $dep_deduction['personal_vehicle'] + $sal['GeneratedDeduction']['personal_vehicle'];
				$dep_deduction['group_insurance'] = $dep_deduction['group_insurance'] + $sal['GeneratedDeduction']['group_insurance'];
				$dep_deduction['w_s'] = $dep_deduction['w_s'] + $sal['GeneratedDeduction']['w_s'];
				$dep_deduction['fuel'] = $dep_deduction['fuel'] + $sal['GeneratedDeduction']['fuel'];
				$dep_deduction['overdrawn'] = $dep_deduction['overdrawn'] + $sal['GeneratedDeduction']['overdrawn'];
				$dep_deduction['phone_bill'] = $dep_deduction['phone_bill'] + $sal['GeneratedDeduction']['phone_bill'];
				$dep_deduction['association'] = $dep_deduction['association'] + $sal['GeneratedDeduction']['association'];
				$dep_deduction['tax'] = $dep_deduction['tax'] + $sal['GeneratedDeduction']['tax'];
				$dep_deduction['miscellaneous_deduct'] = $dep_deduction['miscellaneous_deduct'] + $sal['GeneratedDeduction']['miscellaneous_deduct'];
				$dep_deduction['total_sub'] = $dep_deduction['total_sub'] + $sal['GeneratedDeduction']['total_sub'];
			}
			else{
				$reg_deduction['cpf1'] = $reg_deduction['cpf1'] + $sal['GeneratedDeduction']['cpf1'];
				$reg_deduction['cpf2'] = $reg_deduction['cpf2'] + $sal['GeneratedDeduction']['cpf2'];
				$reg_deduction['arrear_cpf'] = $reg_deduction['arrear_cpf'] + $sal['GeneratedDeduction']['arrear_cpf'];
				$reg_deduction['cpf_loan1'] = $reg_deduction['cpf_loan1'] + $sal['GeneratedDeduction']['cpf_loan1'];
				$reg_deduction['cpf_loan2'] = $reg_deduction['cpf_loan2'] + $sal['GeneratedDeduction']['cpf_loan2'];
				$reg_deduction['house_loan'] = $reg_deduction['house_loan'] + $sal['GeneratedDeduction']['house_loan'];
				$reg_deduction['vehicle_loan'] = $reg_deduction['vehicle_loan'] + $sal['GeneratedDeduction']['vehicle_loan'];
				$reg_deduction['cpf_interest'] = $reg_deduction['cpf_interest'] + $sal['GeneratedDeduction']['cpf_interest'];
				$reg_deduction['h_interest'] = $reg_deduction['h_interest'] + $sal['GeneratedDeduction']['h_interest'];
				$reg_deduction['v_interest'] = $reg_deduction['v_interest'] + $sal['GeneratedDeduction']['v_interest'];
				$reg_deduction['benevolent_fund'] = $reg_deduction['benevolent_fund'] + $sal['GeneratedDeduction']['benevolent_fund'];
				$reg_deduction['house_rent_deduct'] = $reg_deduction['house_rent_deduct'] + $sal['GeneratedDeduction']['house_rent_deduct'];
				$reg_deduction['transport_bill'] = $reg_deduction['transport_bill'] + $sal['GeneratedDeduction']['transport_bill'];
				$reg_deduction['personal_vehicle'] = $reg_deduction['personal_vehicle'] + $sal['GeneratedDeduction']['personal_vehicle'];
				$reg_deduction['group_insurance'] = $reg_deduction['group_insurance'] + $sal['GeneratedDeduction']['group_insurance'];
				$reg_deduction['w_s'] = $reg_deduction['w_s'] + $sal['GeneratedDeduction']['w_s'];
				$reg_deduction['fuel'] = $reg_deduction['fuel'] + $sal['GeneratedDeduction']['fuel'];
				$reg_deduction['overdrawn'] = $reg_deduction['overdrawn'] + $sal['GeneratedDeduction']['overdrawn'];
				$reg_deduction['phone_bill'] = $reg_deduction['phone_bill'] + $sal['GeneratedDeduction']['phone_bill'];
				$reg_deduction['association'] = $reg_deduction['association'] + $sal['GeneratedDeduction']['association'];
				$reg_deduction['tax'] = $reg_deduction['tax'] + $sal['GeneratedDeduction']['tax'];
				$reg_deduction['miscellaneous_deduct'] = $reg_deduction['miscellaneous_deduct'] + $sal['GeneratedDeduction']['miscellaneous_deduct'];
				$reg_deduction['total_sub'] = $reg_deduction['total_sub'] + $sal['GeneratedDeduction']['total_sub'];
			}
		}
		$intotal = $this->translateToWords($net_salary['total_add'] - $net_deduction['total_sub']);
		$this->set("curdate",$currentTime);
		$this->set("net_salaries",$net_salary);
		$this->set("net_deductions",$net_deduction);
		$this->set("reg_deductions",$reg_deduction);
		$this->set("dep_deductions",$dep_deduction);
		$this->set("intotal",$intotal);
		$this->set("type",$type);
		/*$_html = '
		<htmlpageheader name="MyHeader1">
		<div style="text-align: right; border-bottom: 1px solid #000000; font-weight: bold; font-size: 10pt;">My document</div>
		</htmlpageheader>

		<htmlpagefooter name="MyFooter1">
		<table width="100%" style="vertical-align: bottom; font-family: serif; font-size: 8pt; 
			color: #000000; font-weight: bold; font-style: italic;"><tr>
			<td width="33%"><span style="font-weight: bold; font-style: italic;">{DATE j-m-Y}</span></td>
			<td width="33%" align="center" style="font-weight: bold; font-style: italic;">{PAGENO}/{nbpg}</td>
			<td width="33%" style="text-align: right; ">My document</td>
			</tr>
		</table>
		</htmlpagefooter>

		<sethtmlpageheader name="MyHeader1" value="on" show-this-page="1" />
		<sethtmlpagefooter name="MyFooter1" value="on" />

		<div>Start of the document ... and all the rest</div>
		';*/
		$_html = $this->_getViewObject()->element('grosstotal_pdf');
        $this->create_pdf($_html);
		
	}
	
	public function create_pdf($_html){
		$this->autoRender = FALSE;
        set_time_limit(0);
        $this->Mpdf->init();
        $base_url = WWW_ROOT . 'css' . DS . 'style.css';
        $stylesheet = file_get_contents("{$base_url}");
        $this->Mpdf->WriteHTML($stylesheet, 1);
		$this->Mpdf->WriteHTML($_html);
        $this->Mpdf->SetWatermarkText("Draft");
        $this->Mpdf->_init = FALSE;
        $this->Mpdf->Output("files/atiq.pdf", 'F');
    }
	
	public function create_footer_pdf($_html){
		$this->autoRender = FALSE;
        set_time_limit(0);
        $configuration = array(
			// mode: 'c' for core fonts only, 'utf8-s' for subset etc.
			'mode' => 'c',
			// page format: 'A0' - 'A10', if suffixed with '-L', force landscape
			'format' => 'A4',
			 // default font size in points (pt)
			'font_size' => 0,
			// default font
			'font' => NULL,
			// page margins in mm
			'margin_footer' => 200
		);
        $this->Mpdf->init($configuration);
        $base_url = WWW_ROOT . 'css' . DS . 'style.css';
        $stylesheet = file_get_contents("{$base_url}");
        $this->Mpdf->WriteHTML($stylesheet, 1);
		
		$this->Mpdf->WriteHTML($_html);
        $this->Mpdf->SetWatermarkText("Draft");
        $this->Mpdf->_init = FALSE;
        $this->Mpdf->Output("files/atiq.pdf", 'F');
    }
	
	public function create_landscape_pdf($_html){
		$this->autoRender = FALSE;
        set_time_limit(0);
		$configuration = array(
			// mode: 'c' for core fonts only, 'utf8-s' for subset etc.
			'mode' => 'c',
			// page format: 'A0' - 'A10', if suffixed with '-L', force landscape
			'format' => 'A4-L',
			 // default font size in points (pt)
			'font_size' => 0,
			// default font
			'font' => NULL,
			// page margins in mm
			'margin_left' => 15,
			'margin_right' => 15,
			'margin_top' => 16,
			'margin_bottom' => 16,
			'margin_header' => 9,
			'margin_footer' => 9
		);
        $this->Mpdf->init($configuration);
        $base_url = WWW_ROOT . 'css' . DS . 'style.css';
        $stylesheet = file_get_contents("{$base_url}");
        $this->Mpdf->WriteHTML($stylesheet, 1);
		
		$this->Mpdf->WriteHTML($_html);
        $this->Mpdf->SetWatermarkText("Draft");
        $this->Mpdf->_init = FALSE;
        $this->Mpdf->Output("files/atiq.pdf", 'F');
    }
	
	function bf($type){
		$this->designations();
		$settingInfo = $this->Session->read("SETTING_INFO");
		$currentTime = $settingInfo["execution_date"];
		$start = mktime(0,0,0,date ('m',$currentTime),1,date ('Y',$currentTime));
		$end = mktime(0,0,0,date ('m',$currentTime) + 1,0,date ('Y',$currentTime));
		//$start = mktime(0,0,0,date ('m'),1,date ('Y'));
		//$end = mktime(0,0,0,date ('m') + 1,0,date ('Y'));
		$conditions[] = "GeneratedDeduction.execution_date > $start";
    	$conditions[] = "GeneratedDeduction.execution_date < $end";
        $conditions[] = "Employee.type = $type";
        $this->GeneratedSalary->bindModel( array('belongsTo' => array(
		'Employee' => array(
        	'className'     => 'Employee',
            'foreignKey'    => 'employee_id',
            'dependent'     => true
        ))));
        $this->GeneratedSalary->bindModel( array('belongsTo' => array(
		'GeneratedDeduction' => array(
        	'className'     => 'GeneratedDeduction',
            'foreignKey'    => 'employee_id',
            'dependent'     => true
        ))));
        $salaries = $this->GeneratedSalary->find("all",array("conditions"=>$conditions,"fields"=>array("id","basic","GeneratedDeduction.benevolent_fund","Employee.first_name","Employee.middle_name","Employee.last_name","Employee.employee_code","Employee.designation_id"),"order"=>"Employee.grade ASC"));
       	$this->set("salaries",$salaries);
		$this->set("type",$type);
	}
	
	function bfPdf($type,$fileName){
		$this->layout="pdf";
		$this->designations();
		$settingInfo = $this->Session->read("SETTING_INFO");
		$currentTime = $settingInfo["execution_date"];
		$start = mktime(0,0,0,date ('m',$currentTime),1,date ('Y',$currentTime));
		$end = mktime(0,0,0,date ('m',$currentTime) + 1,0,date ('Y',$currentTime));
		//$start = mktime(0,0,0,date ('m'),1,date ('Y'));
		//$end = mktime(0,0,0,date ('m') + 1,0,date ('Y'));
	   	$conditions[] = "GeneratedDeduction.execution_date > $start";
    	$conditions[] = "GeneratedDeduction.execution_date < $end";
        $conditions[] = "Employee.type = $type";
        $this->GeneratedSalary->bindModel( array('belongsTo' => array(
		'Employee' => array(
        	'className'     => 'Employee',
            'foreignKey'    => 'employee_id',
            'dependent'     => true
        ))));
        $this->GeneratedSalary->bindModel( array('belongsTo' => array(
		'GeneratedDeduction' => array(
        	'className'     => 'GeneratedDeduction',
            'foreignKey'    => 'employee_id',
            'dependent'     => true
        ))));
        $salaries = $this->GeneratedSalary->find("all",array("conditions"=>$conditions,"fields"=>array("id","basic","GeneratedDeduction.benevolent_fund","Employee.first_name","Employee.middle_name","Employee.last_name","Employee.employee_code","Employee.designation_id"),"order"=>"Employee.grade ASC"));
        //pr($salaries); die();
		$this->set("salaries",$salaries);
		$this->set("type",$type);
		Configure::write('debug', 0);
		ini_set("magic_quotes_runtime", 0); // only use for Mpdf
		Configure::write('CakePdf', array(
	        'engine' => 'CakePdf.Mpdf',
	        'options' => array(
	            'print-media-type' => false,
	            'outline' => true,
	            'dpi' => 96
	        ),
	        'margin' => array(
	            'bottom' => 1,
	            'left' => 1,
	            'right' => 1,
	            'top' => 1
	        ),
	        "pageSize"=>"A4",
	        'orientation' => 'portrait',
	        "title"=>"Pay Slip",
	        'filename' => $fileName,
	        'download' => false,
	        'encoding'=>'UTF-8'
	    ));
	}
	
	function payable($type){
		$this->designations();
		$settingInfo = $this->Session->read("SETTING_INFO");
		$currentTime = $settingInfo["execution_date"];
		$start = mktime(0,0,0,date ('m',$currentTime),1,date ('Y',$currentTime));
		$end = mktime(0,0,0,date ('m',$currentTime) + 1,0,date ('Y',$currentTime));
		//$start = mktime(0,0,0,date ('m'),1,date ('Y'));
		//$end = mktime(0,0,0,date ('m') + 1,0,date ('Y'));
	   	$conditions[] = "GeneratedSalary.execution_date > $start";
    	$conditions[] = "GeneratedSalary.execution_date < $end";
        $conditions[] = "Employee.type = $type";
        $this->GeneratedSalary->bindModel( array('hasOne' => array(
			'GeneratedDeduction' => array(
        	'className'     => 'Deduction',
            'foreignKey'    => 'salary_id',
            'dependent'     => true
        ))));
        $this->GeneratedSalary->bindModel( array('belongsTo' => array(
			'Employee' => array(
        	'className'     => 'Employee',
            'foreignKey'    => 'employee_id',
            'dependent'     => true
        ))));
        $this->GeneratedSalary->bindModel( array('belongsTo' => array(
			'EmployeePersonal' => array(
        	'className'     => 'EmployeePersonal',
            'foreignKey'    => 'employee_id',
            "fields"		=> array("bank","account","etin"),
            'dependent'     => true
        ))));
        $temps = $this->GeneratedSalary->find("all",array("conditions"=>$conditions));
        //pr($temps); 
        $salary["Salary"]["basic"] = NULL;
        $salary["Salary"]["house_rent"] = NULL;
        $salary["Salary"]["medical"] = NULL;
        $salary["Salary"]["pp"] = NULL;
        $salary["Salary"]["edu"] = NULL;
        $salary["Salary"]["charge"] = NULL;
        $salary["Salary"]["dearness"] = NULL;
        $salary["Salary"]["conveyance"] = NULL;
        $salary["Salary"]["tiffin"] = NULL;
        $salary["Salary"]["washing"] = NULL;
        $salary["Salary"]["deputation"] = NULL;
        $salary["Salary"]["aid"] = NULL;
        $salary["Salary"]["sumptuary"] = NULL;
        $salary["Salary"]["arrear"] = NULL;
        $salary["Salary"]["miscellaneous"] = NULL;
        $salary["Salary"]["fraction_increment"] = NULL;
        $salary["Salary"]["total_add"] = NULL;
        $salary["Salary"]["payable"] = NULL;
        $salary["Deduction"]["cpf1"] = NULL;
        $salary["Deduction"]["cpf2"] = NULL;
        $salary["Deduction"]["arrear_cpf"] = NULL;
        $salary["Deduction"]["cpf_loan1"] = NULL;
        $salary["Deduction"]["cpf_loan2"] = NULL;
        $salary["Deduction"]["house_loan"] = NULL;
        $salary["Deduction"]["vehicle_loan"] = NULL;
        $salary["Deduction"]["cpf_interest"] = NULL;
        $salary["Deduction"]["h_interest"] = NULL;
        $salary["Deduction"]["v_interest"] = NULL;
        $salary["Deduction"]["benevolent_fund"] = NULL;
        $salary["Deduction"]["house_rent_deduct"] = NULL;
        $salary["Deduction"]["transport_bill"] = NULL;
        $salary["Deduction"]["personal_vehicle"] = NULL;
        $salary["Deduction"]["group_insurance"] = NULL;
        $salary["Deduction"]["w_s"] = NULL;
        $salary["Deduction"]["fuel"] = NULL;
        $salary["Deduction"]["overdrawn"] = NULL;
        $salary["Deduction"]["phone_bill"] = NULL;
        $salary["Deduction"]["association"] = NULL;
        $salary["Deduction"]["tax"] = NULL;
        $salary["Deduction"]["miscellaneous_deduct"] = NULL;
        $salary["Deduction"]["total_sub"] = NULL;
        foreach($temps as $temp){
        	$salary["Salary"]["basic"] = $salary["Salary"]["basic"] + $temp["GeneratedSalary"]["basic"]; 
        	$salary["Salary"]["house_rent"] = $salary["Salary"]["house_rent"] + $temp["GeneratedSalary"]["house_rent"];
        	$salary["Salary"]["medical"] = $salary["Salary"]["medical"] + $temp["GeneratedSalary"]["medical"];
        	$salary["Salary"]["pp"] = $salary["Salary"]["pp"] + $temp["GeneratedSalary"]["pp"];
        	$salary["Salary"]["edu"] = $salary["Salary"]["edu"] + $temp["GeneratedSalary"]["edu"];
        	$salary["Salary"]["charge"] = $salary["Salary"]["charge"] + $temp["GeneratedSalary"]["charge"];
        	$salary["Salary"]["dearness"] = $salary["Salary"]["dearness"] + $temp["GeneratedSalary"]["dearness"];
        	$salary["Salary"]["conveyance"] = $salary["Salary"]["conveyance"] + $temp["GeneratedSalary"]["conveyance"];
        	$salary["Salary"]["tiffin"] = $salary["Salary"]["tiffin"] + $temp["GeneratedSalary"]["tiffin"];
        	$salary["Salary"]["washing"] = $salary["Salary"]["washing"] + $temp["GeneratedSalary"]["washing"];
        	$salary["Salary"]["deputation"] = $salary["Salary"]["deputation"] + $temp["GeneratedSalary"]["deputation"];
        	$salary["Salary"]["aid"] = $salary["Salary"]["aid"] + $temp["GeneratedSalary"]["aid"];
        	$salary["Salary"]["sumptuary"] = $salary["Salary"]["sumptuary"] + $temp["GeneratedSalary"]["sumptuary"];
        	$salary["Salary"]["arrear"] = $salary["Salary"]["arrear"] + $temp["GeneratedSalary"]["arrear"];
        	$salary["Salary"]["miscellaneous"] = $salary["Salary"]["miscellaneous"] + $temp["GeneratedSalary"]["miscellaneous"];
        	$salary["Salary"]["fraction_increment"] = $salary["Salary"]["fraction_increment"] + $temp["GeneratedSalary"]["fraction_increment"];
        	$salary["Salary"]["total_add"] = $salary["Salary"]["total_add"] + $temp["GeneratedSalary"]["total_add"];
        	$salary["Salary"]["payable"] = $salary["Salary"]["payable"] + $temp["GeneratedSalary"]["payable"];
        	$salary["Salary"]["add_in_word"] = $this->translateToWords($salary["Salary"]["total_add"]);
        	$salary["Salary"]["in_word"] = $this->translateToWords($salary["Salary"]["payable"]);
        	$salary["Deduction"]["cpf1"] = $salary["Deduction"]["cpf1"] + $temp["GeneratedDeduction"]["cpf1"];
        	$salary["Deduction"]["cpf2"] = $salary["Deduction"]["cpf2"] + $temp["GeneratedDeduction"]["cpf2"];
        	$salary["Deduction"]["arrear_cpf"] = $salary["Deduction"]["arrear_cpf"] + $temp["GeneratedDeduction"]["arrear_cpf"];
        	$salary["Deduction"]["cpf_loan1"] = $salary["Deduction"]["cpf_loan1"] + $temp["GeneratedDeduction"]["cpf_loan1"];
        	$salary["Deduction"]["cpf_loan2"] = $salary["Deduction"]["cpf_loan2"] + $temp["GeneratedDeduction"]["cpf_loan2"];
        	$salary["Deduction"]["house_loan"] = $salary["Deduction"]["house_loan"] + $temp["GeneratedDeduction"]["house_loan"];
        	$salary["Deduction"]["vehicle_loan"] = $salary["Deduction"]["vehicle_loan"] + $temp["GeneratedDeduction"]["vehicle_loan"];
        	$salary["Deduction"]["cpf_interest"] = $salary["Deduction"]["cpf_interest"] + $temp["GeneratedDeduction"]["cpf_interest"];
        	$salary["Deduction"]["h_interest"] = $salary["Deduction"]["h_interest"] + $temp["GeneratedDeduction"]["h_interest"];
        	$salary["Deduction"]["v_interest"] = $salary["Deduction"]["v_interest"] + $temp["GeneratedDeduction"]["v_interest"];
        	$salary["Deduction"]["benevolent_fund"] = $salary["Deduction"]["benevolent_fund"] + $temp["GeneratedDeduction"]["benevolent_fund"];
        	$salary["Deduction"]["house_rent_deduct"] = $salary["Deduction"]["house_rent_deduct"] + $temp["GeneratedDeduction"]["house_rent_deduct"];
        	$salary["Deduction"]["transport_bill"] = $salary["Deduction"]["transport_bill"] + $temp["GeneratedDeduction"]["transport_bill"];
        	$salary["Deduction"]["personal_vehicle"] = $salary["Deduction"]["personal_vehicle"] + $temp["GeneratedDeduction"]["personal_vehicle"];
        	$salary["Deduction"]["group_insurance"] = $salary["Deduction"]["group_insurance"] + $temp["GeneratedDeduction"]["group_insurance"];
        	$salary["Deduction"]["w_s"] = $salary["Deduction"]["w_s"] + $temp["GeneratedDeduction"]["w_s"];
        	$salary["Deduction"]["fuel"] = $salary["Deduction"]["fuel"] + $temp["GeneratedDeduction"]["fuel"];
        	$salary["Deduction"]["overdrawn"] = $salary["Deduction"]["overdrawn"] + $temp["GeneratedDeduction"]["overdrawn"];
        	$salary["Deduction"]["phone_bill"] = $salary["Deduction"]["phone_bill"] + $temp["GeneratedDeduction"]["phone_bill"];
        	$salary["Deduction"]["association"] = $salary["Deduction"]["association"] + $temp["GeneratedDeduction"]["association"];
        	$salary["Deduction"]["tax"] = $salary["Deduction"]["tax"] + $temp["GeneratedDeduction"]["tax"];
        	$salary["Deduction"]["miscellaneous_deduct"] = $salary["Deduction"]["miscellaneous_deduct"] + $temp["GeneratedDeduction"]["miscellaneous_deduct"];
        	$salary["Deduction"]["total_sub"] = $salary["Deduction"]["total_sub"] + $temp["GeneratedDeduction"]["total_sub"];
        	$salary["Deduction"]["in_word"] = $this->translateToWords($salary["Deduction"]["total_sub"]);
        }
        //pr($salary); //die();
		$this->set("salary",$salary);
		$this->set("type",$type);
	}
	
	function payablePdf($type,$fileName){
		$this->layout="pdf";
		$this->designations();
		$settingInfo = $this->Session->read("SETTING_INFO");
		$currentTime = $settingInfo["execution_date"];
		$start = mktime(0,0,0,date ('m',$currentTime),1,date ('Y',$currentTime));
		$end = mktime(0,0,0,date ('m',$currentTime) + 1,0,date ('Y',$currentTime));
		//$start = mktime(0,0,0,date ('m'),1,date ('Y'));
		//$end = mktime(0,0,0,date ('m') + 1,0,date ('Y'));
	   	$conditions[] = "GeneratedSalary.execution_date > $start";
    	$conditions[] = "GeneratedSalary.execution_date < $end";
        $conditions[] = "Employee.type = $type";
        $this->GeneratedSalary->bindModel( array('hasOne' => array(
			'GeneratedDeduction' => array(
        	'className'     => 'Deduction',
            'foreignKey'    => 'salary_id',
            'dependent'     => true
        ))));
        $this->GeneratedSalary->bindModel( array('belongsTo' => array(
			'Employee' => array(
        	'className'     => 'Employee',
            'foreignKey'    => 'employee_id',
            'dependent'     => true
        ))));
        $temps = $this->GeneratedSalary->find("all",array("conditions"=>$conditions));
       // pr($temps); 
        $salary["Salary"]["basic"] = NULL;
        $salary["Salary"]["house_rent"] = NULL;
        $salary["Salary"]["medical"] = NULL;
        $salary["Salary"]["pp"] = NULL;
        $salary["Salary"]["edu"] = NULL;
        $salary["Salary"]["charge"] = NULL;
        $salary["Salary"]["dearness"] = NULL;
        $salary["Salary"]["conveyance"] = NULL;
        $salary["Salary"]["tiffin"] = NULL;
        $salary["Salary"]["washing"] = NULL;
        $salary["Salary"]["deputation"] = NULL;
        $salary["Salary"]["aid"] = NULL;
        $salary["Salary"]["sumptuary"] = NULL;
        $salary["Salary"]["arrear"] = NULL;
        $salary["Salary"]["miscellaneous"] = NULL;
        $salary["Salary"]["fraction_increment"] = NULL;
        $salary["Salary"]["total_add"] = NULL;
        $salary["Salary"]["payable"] = NULL;
        $salary["Deduction"]["cpf1"] = NULL;
        $salary["Deduction"]["cpf2"] = NULL;
        $salary["Deduction"]["arrear_cpf"] = NULL;
        $salary["Deduction"]["cpf_loan1"] = NULL;
        $salary["Deduction"]["cpf_loan2"] = NULL;
        $salary["Deduction"]["house_loan"] = NULL;
        $salary["Deduction"]["vehicle_loan"] = NULL;
        $salary["Deduction"]["cpf_interest"] = NULL;
        $salary["Deduction"]["h_interest"] = NULL;
        $salary["Deduction"]["v_interest"] = NULL;
        $salary["Deduction"]["benevolent_fund"] = NULL;
        $salary["Deduction"]["house_rent_deduct"] = NULL;
        $salary["Deduction"]["transport_bill"] = NULL;
        $salary["Deduction"]["personal_vehicle"] = NULL;
        $salary["Deduction"]["group_insurance"] = NULL;
        $salary["Deduction"]["w_s"] = NULL;
        $salary["Deduction"]["fuel"] = NULL;
        $salary["Deduction"]["overdrawn"] = NULL;
        $salary["Deduction"]["phone_bill"] = NULL;
        $salary["Deduction"]["association"] = NULL;
        $salary["Deduction"]["tax"] = NULL;
        $salary["Deduction"]["miscellaneous_deduct"] = NULL;
        $salary["Deduction"]["total_sub"] = NULL;
        foreach($temps as $temp){
        	$salary["Salary"]["basic"] = $salary["Salary"]["basic"] + $temp["GeneratedSalary"]["basic"]; 
        	$salary["Salary"]["house_rent"] = $salary["Salary"]["house_rent"] + $temp["GeneratedSalary"]["house_rent"];
        	$salary["Salary"]["medical"] = $salary["Salary"]["medical"] + $temp["GeneratedSalary"]["medical"];
        	$salary["Salary"]["pp"] = $salary["Salary"]["pp"] + $temp["GeneratedSalary"]["pp"];
        	$salary["Salary"]["edu"] = $salary["Salary"]["edu"] + $temp["GeneratedSalary"]["edu"];
        	$salary["Salary"]["charge"] = $salary["Salary"]["charge"] + $temp["GeneratedSalary"]["charge"];
        	$salary["Salary"]["dearness"] = $salary["Salary"]["dearness"] + $temp["GeneratedSalary"]["dearness"];
        	$salary["Salary"]["conveyance"] = $salary["Salary"]["conveyance"] + $temp["GeneratedSalary"]["conveyance"];
        	$salary["Salary"]["tiffin"] = $salary["Salary"]["tiffin"] + $temp["GeneratedSalary"]["tiffin"];
        	$salary["Salary"]["washing"] = $salary["Salary"]["washing"] + $temp["GeneratedSalary"]["washing"];
        	$salary["Salary"]["deputation"] = $salary["Salary"]["deputation"] + $temp["GeneratedSalary"]["deputation"];
        	$salary["Salary"]["aid"] = $salary["Salary"]["aid"] + $temp["GeneratedSalary"]["aid"];
        	$salary["Salary"]["sumptuary"] = $salary["Salary"]["sumptuary"] + $temp["GeneratedSalary"]["sumptuary"];
        	$salary["Salary"]["arrear"] = $salary["Salary"]["arrear"] + $temp["GeneratedSalary"]["arrear"];
        	$salary["Salary"]["miscellaneous"] = $salary["Salary"]["miscellaneous"] + $temp["GeneratedSalary"]["miscellaneous"];
        	$salary["Salary"]["fraction_increment"] = $salary["Salary"]["fraction_increment"] + $temp["GeneratedSalary"]["fraction_increment"];
        	$salary["Salary"]["total_add"] = $salary["Salary"]["total_add"] + $temp["GeneratedSalary"]["total_add"];
        	$salary["Salary"]["payable"] = $salary["Salary"]["payable"] + $temp["GeneratedSalary"]["payable"];
        	$salary["Salary"]["add_in_word"] = $this->translateToWords($salary["Salary"]["total_add"]);
        	$salary["Salary"]["in_word"] = $this->translateToWords($salary["Salary"]["payable"]);
        	$salary["Deduction"]["cpf1"] = $salary["Deduction"]["cpf1"] + $temp["GeneratedDeduction"]["cpf1"];
        	$salary["Deduction"]["cpf2"] = $salary["Deduction"]["cpf2"] + $temp["GeneratedDeduction"]["cpf2"];
        	$salary["Deduction"]["arrear_cpf"] = $salary["Deduction"]["arrear_cpf"] + $temp["GeneratedDeduction"]["arrear_cpf"];
        	$salary["Deduction"]["cpf_loan1"] = $salary["Deduction"]["cpf_loan1"] + $temp["GeneratedDeduction"]["cpf_loan1"];
        	$salary["Deduction"]["cpf_loan2"] = $salary["Deduction"]["cpf_loan2"] + $temp["GeneratedDeduction"]["cpf_loan2"];
        	$salary["Deduction"]["house_loan"] = $salary["Deduction"]["house_loan"] + $temp["GeneratedDeduction"]["house_loan"];
        	$salary["Deduction"]["vehicle_loan"] = $salary["Deduction"]["vehicle_loan"] + $temp["GeneratedDeduction"]["vehicle_loan"];
        	$salary["Deduction"]["cpf_interest"] = $salary["Deduction"]["cpf_interest"] + $temp["GeneratedDeduction"]["cpf_interest"];
        	$salary["Deduction"]["h_interest"] = $salary["Deduction"]["h_interest"] + $temp["GeneratedDeduction"]["h_interest"];
        	$salary["Deduction"]["v_interest"] = $salary["Deduction"]["v_interest"] + $temp["GeneratedDeduction"]["v_interest"];
        	$salary["Deduction"]["benevolent_fund"] = $salary["Deduction"]["benevolent_fund"] + $temp["GeneratedDeduction"]["benevolent_fund"];
        	$salary["Deduction"]["house_rent_deduct"] = $salary["Deduction"]["house_rent_deduct"] + $temp["GeneratedDeduction"]["house_rent_deduct"];
        	$salary["Deduction"]["transport_bill"] = $salary["Deduction"]["transport_bill"] + $temp["GeneratedDeduction"]["transport_bill"];
        	$salary["Deduction"]["personal_vehicle"] = $salary["Deduction"]["personal_vehicle"] + $temp["GeneratedDeduction"]["personal_vehicle"];
        	$salary["Deduction"]["group_insurance"] = $salary["Deduction"]["group_insurance"] + $temp["GeneratedDeduction"]["group_insurance"];
        	$salary["Deduction"]["w_s"] = $salary["Deduction"]["w_s"] + $temp["GeneratedDeduction"]["w_s"];
        	$salary["Deduction"]["fuel"] = $salary["Deduction"]["fuel"] + $temp["GeneratedDeduction"]["fuel"];
        	$salary["Deduction"]["overdrawn"] = $salary["Deduction"]["overdrawn"] + $temp["GeneratedDeduction"]["overdrawn"];
        	$salary["Deduction"]["phone_bill"] = $salary["Deduction"]["phone_bill"] + $temp["GeneratedDeduction"]["phone_bill"];
        	$salary["Deduction"]["association"] = $salary["Deduction"]["association"] + $temp["GeneratedDeduction"]["association"];
        	$salary["Deduction"]["tax"] = $salary["Deduction"]["tax"] + $temp["GeneratedDeduction"]["tax"];
        	$salary["Deduction"]["miscellaneous_deduct"] = $salary["Deduction"]["miscellaneous_deduct"] + $temp["GeneratedDeduction"]["miscellaneous_deduct"];
        	$salary["Deduction"]["total_sub"] = $salary["Deduction"]["total_sub"] + $temp["GeneratedDeduction"]["total_sub"];
        	$salary["Deduction"]["in_word"] = $this->translateToWords($salary["Deduction"]["total_sub"]);
        }
        //pr($salary); //die();
		$this->set("salary",$salary);
		$this->set("type",$type);
		Configure::write('debug', 0);
		ini_set("magic_quotes_runtime", 0); // only use for Mpdf
		Configure::write('CakePdf', array(
	        'engine' => 'CakePdf.Mpdf',
	        'options' => array(
	            'print-media-type' => false,
	            'outline' => true,
	            'dpi' => 96
	        ),
	        'margin' => array(
	            'bottom' => 1,
	            'left' => 1,
	            'right' => 1,
	            'top' => 1
	        ),
	        "pageSize"=>"A4",
	        'orientation' => 'portrait',
	        "title"=>"Pay Slip",
	        'filename' => $fileName,
	        'download' => false,
	        'encoding'=>'UTF-8'
	    ));
	}
	
	function preg($type){
		$this->designations($type);
		if(!empty($this->data)){
			$settingInfo = $this->Session->read("SETTING_INFO");
			$currentTime = $settingInfo["execution_date"];
			$start = mktime(0,0,0,date ('m',$currentTime),1,date ('Y',$currentTime));
			$end = mktime(0,0,0,date ('m',$currentTime) + 1,0,date ('Y',$currentTime));
			//$start = mktime(0,0,0,7,1,date ('Y')-1);
			//$end = mktime(0,0,0,7,0,date ('Y'));
			//pr($start);
			//pr(date("d-m-Y",$start)); pr(date("d-m-Y",$end)); 
			//pr($this->data); //die();
		   	$conditions[] = "GeneratedSalary.execution_date > $start";
	    	$conditions[] = "GeneratedSalary.execution_date < $end";
	    	$conditions[] = "GeneratedSalary.employee_id = ".$this->data["employee_id"];
	    	$conditions[] = "Employee.type = $type";
	        $this->GeneratedSalary->bindModel( array('belongsTo' => array(
			'Employee' => array(
	        	'className'     => 'Employee',
	            'foreignKey'    => 'employee_id',
	            'dependent'     => true
	        ))));
	        $this->GeneratedSalary->bindModel( array('belongsTo' => array(
			'GeneratedDeduction' => array(
	        	'className'     => 'GeneratedDeduction',
	            'foreignKey'    => 'employee_id',
	            'dependent'     => true
	        ))));
	        $salaries = $this->GeneratedSalary->find("all",array("conditions"=>$conditions,"fields"=>array("id","basic","GeneratedDeduction.benevolent_fund","Employee.first_name","Employee.middle_name","Employee.last_name","Employee.employee_code","Employee.designation_id"),"order"=>"Employee.grade ASC"));
	        //pr($salaries); die();
	       	$this->set("salaries",$salaries);
	       	$this->set("id",$this->data["employee_id"]);
		}
		$this->set("type",$type);
	}
	
	function pregPdf($id,$fileName){
		$this->layout="pdf";
		$this->designations();
		$settingInfo = $this->Session->read("SETTING_INFO");
		$currentTime = $settingInfo["execution_date"];
		$start = mktime(0,0,0,date ('m',$currentTime),1,date ('Y',$currentTime));
		$end = mktime(0,0,0,date ('m',$currentTime) + 1,0,date ('Y',$currentTime));
		//$start = mktime(0,0,0,7,1,date ('Y')-1);
		//$end = mktime(0,0,0,7,0,date ('Y'));
		$this->set("start",$start); $this->set("end",$end);
	   	$conditions[] = "GeneratedDeduction.execution-date > $start";
    	$conditions[] = "GeneratedDeduction.execution_date < $end";
    	$conditions[] = "GeneratedSalary.employee_id = $id";
        $this->GeneratedSalary->bindModel( array('belongsTo' => array(
		'GeneratedDeduction' => array(
        	'className'     => 'GeneratedDeduction',
            'foreignKey'    => 'employee_id',
            'dependent'     => true
        ))));
        $salaries = $this->GeneratedSalary->find("all",array("conditions"=>$conditions,"fields"=>array("id","basic","grade","house_rent","medical","pp","edu","charge","dearness","conveyance","tiffin","washing","deputation","aid","sumptuary","arrear","miscellaneous","fraction_increment","total_add","payable","status","updated","GeneratedDeduction.cpf1","GeneratedDeduction.cpf2","GeneratedDeduction.arrear_cpf","GeneratedDeduction.cpf_loan1","GeneratedDeduction.cpf_loan2","GeneratedDeduction.house_loan","GeneratedDeduction.vehicle_loan","GeneratedDeduction.cpf_interest","GeneratedDeduction.h_interest","GeneratedDeduction.v_interest","GeneratedDeduction.benevolent_fund","GeneratedDeduction.house_rent_deduct","GeneratedDeduction.transport_bill","GeneratedDeduction.personal_vehicle","GeneratedDeduction.group_insurance","GeneratedDeduction.w_s","GeneratedDeduction.fuel","GeneratedDeduction.overdrawn","GeneratedDeduction.phone_bill","GeneratedDeduction.tax","GeneratedDeduction.miscellaneous_deduct","GeneratedDeduction.total_sub","GeneratedDeduction.status"),"order"=>"GeneratedSalary.grade ASC"));
        $employee = $this->Employee->find("first",array("conditions"=>"Employee.id = $id","fields"=>array("first_name","middle_name","last_name","employee_code","designation_id")));
        //pr($salaries); die();
		$this->set("salaries",$salaries);
		$this->set("employee",$employee);
		$i = 0;
		foreach($salaries as $salary){
			$temp = $this->PayScale->find("first",array("conditions"=>"PayScale.grade =".$salary["GeneratedSalary"]["grade"]));
			$salaries[$i]["PayScale"] = $temp["PayScale"];
			if($salary["GeneratedDeduction"]["status"] == 2){
				$this->Loan->bindModel( array('hasOne' => array(
				'Refund' => array(
		        	'className'     => 'Refund',
		            'foreignKey'    => 'loan_id',
		            'dependent'     => true,
		        ))));
		        $loans = $this->Loan->find("all",array("conditions"=>"Loan.employee_id = ".$salary["Employee"]["id"]));
				$salaries[$i]["Loans"] = $loans;
			}
			$i++;
		}
		$this->set("id",$id);
		Configure::write('debug', 0);
		ini_set("magic_quotes_runtime", 0); // only use for Mpdf
		Configure::write('CakePdf', array(
	        'engine' => 'CakePdf.Mpdf',
	        'options' => array(
	            'print-media-type' => false,
	            'outline' => true,
	            'dpi' => 96,
	            "pageSize"=>"A4",
	        	'orientation' => "landscape",
				'margin' => array(
		            'bottom' => 1,
		            'left' => 1,
		            'right' => 1,
		            'top' => 1
	        	),	
	        	"title"=>"Payroll Register",
	        	'filename' => $fileName,
	        ),
	        "pageSize"=>"A4",
        	'orientation' => "landscape",
	        'download' => false,
	        'encoding'=>"UTF-8"
	    ));
	   
	     // initializing mPDF
	   // $this->Mpdf->init();
	
	    // setting filename of output pdf file
	    //$this->Mpdf->setFilename('file.pdf'); 
	
	    // setting output to I, D, F, S
	    //$this->Mpdf->setOutput('D');
	
	    // you can call any mPDF method via component, for example:
	    //$this->Mpdf->SetWatermarkText("Draft");
	    
	   /* include("../vendor/mpdf/mpdf.php");
	    $mpdf=new mPDF();
		$mpdf->WriteHTML('hello',0);
		$mpdf->debug = true;
		$mpdf->Output();
		exit; */
	}
	
	function cpfs($type){
		$this->designations($type);
		$settingInfo = $this->Session->read("SETTING_INFO");
		$currentTime = $settingInfo["execution_date"];
		$start = mktime(0,0,0,date ('m',$currentTime),1,date ('Y',$currentTime));
		$end = mktime(0,0,0,date ('m',$currentTime) + 1,0,date ('Y',$currentTime));
		//$start = mktime(0,0,0,date ('m'),1,date ('Y'));
		//$end = mktime(0,0,0,date ('m') + 1,0,date ('Y'));
		$conditions[] = "Employee.type = $type";
		$conditions[] = "Employee.status != 0";
		$conditions[] = "GeneratedDeduction.execution_date > $start";
    	$conditions[] = "GeneratedDeduction.execution_date < $end";
		$this->GeneratedSalary->bindModel( array('belongsTo' => array(
		'Employee' => array(
        	'className'     => 'Employee',
            'foreignKey'    => 'employee_id',
            'conditions'    => array(),
            'dependent'     => true,
        ))));
        $this->GeneratedSalary->bindModel( array('hasOne' => array(
		'GeneratedDeduction' => array(
        	'className'     => 'GeneratedDeduction',
            'foreignKey'    => 'gs_id',
            'dependent'     => true,
        ))));  
        $salaries = $this->GeneratedSalary->find("all",array("conditions"=>$conditions,"fields"=>array("id","basic","GeneratedDeduction.cpf1","GeneratedDeduction.cpf2","GeneratedDeduction.arrear_cpf","GeneratedDeduction.cpf_interest","GeneratedDeduction.cpf_loan1","GeneratedDeduction.cpf_loan2","Employee.id","Employee.first_name","Employee.middle_name","Employee.last_name","Employee.employee_code","Employee.type","Employee.designation_id")));
        $this->set("salaries",$salaries);
		$this->set("type",$type);
		//pr($salaries);
	}
	
	function cpfsPdf($type,$fileName){
		$this->layout="pdf";
		$this->designations($type);
		$settingInfo = $this->Session->read("SETTING_INFO");
		$currentTime = $settingInfo["execution_date"];
		$start = mktime(0,0,0,date ('m',$currentTime),1,date ('Y',$currentTime));
		$end = mktime(0,0,0,date ('m',$currentTime) + 1,0,date ('Y',$currentTime));
		//$start = mktime(0,0,0,date ('m'),1,date ('Y'));
		//$end = mktime(0,0,0,date ('m') + 1,0,date ('Y'));
		$conditions[] = "Employee.type = $type";
		$conditions[] = "Employee.status != 0";
		$conditions[] = "GeneratedDeduction.execution_date > $start";
    	$conditions[] = "GeneratedDeduction.execution_date < $end";
		$this->GeneratedSalary->bindModel( array('belongsTo' => array(
		'Employee' => array(
        	'className'     => 'Employee',
            'foreignKey'    => 'employee_id',
            'conditions'    => array(),
            'dependent'     => true,
        ))));
        $this->GeneratedSalary->bindModel( array('hasOne' => array(
		'GeneratedDeduction' => array(
        	'className'     => 'GeneratedDeduction',
            'foreignKey'    => 'gs_id',
            'dependent'     => true,
        ))));  
        $salaries = $this->GeneratedSalary->find("all",array("conditions"=>$conditions,"fields"=>array("id","basic","GeneratedDeduction.cpf1","GeneratedDeduction.cpf2","GeneratedDeduction.arrear_cpf","GeneratedDeduction.cpf_interest","GeneratedDeduction.cpf_loan1","GeneratedDeduction.cpf_loan2","Employee.id","Employee.first_name","Employee.middle_name","Employee.last_name","Employee.employee_code","Employee.type","Employee.designation_id")));
        $this->set("salaries",$salaries);
		$this->set("type",$type);
		Configure::write('debug', 0);
		ini_set("magic_quotes_runtime", 0); // only use for Mpdf
		Configure::write('CakePdf', array(
	        'engine' => 'CakePdf.Mpdf',
	        'options' => array(
	            'print-media-type' => false,
	            'outline' => true,
	            'dpi' => 96,
	            "pageSize"=>"A4",
	        	'orientation' => "landscape",
				'margin' => array(
		            'bottom' => 1,
		            'left' => 1,
		            'right' => 1,
		            'top' => 1
	        	),	
	        	"title"=>"Payroll Register",
	        	'filename' => $fileName,
	        ),
	        "pageSize"=>"A4",
        	'orientation' => "landscape",
	        'download' => false,
	        'encoding'=>"UTF-8"
	    ));
	}
	
	function cpfloanStatement($type){
		$this->designations();
		$settingInfo = $this->Session->read("SETTING_INFO");
		$currentTime = $settingInfo["execution_date"];
		$start = mktime(0,0,0,date ('m',$currentTime),1,date ('Y',$currentTime));
		$end = mktime(0,0,0,date ('m',$currentTime) + 1,0,date ('Y',$currentTime));
		//$start = mktime(0,0,0,date ('m'),1,date ('Y'));
		//$end = mktime(0,0,0,date ('m') + 1,0,date ('Y'));
		$conditions[] = "GeneratedSalary.status != 0";
	   	$conditions[] = "GeneratedSalary.execution_date > $start";
    	$conditions[] = "GeneratedSalary.execution_date < $end";
        $conditions[] = "Employee.type = $type";
        $this->GeneratedSalary->bindModel( array('hasOne' => array(
			'GeneratedDeduction' => array(
        	'className'     => 'Deduction',
            'foreignKey'    => 'salary_id',
            'dependent'     => true
        ))));
        $this->GeneratedSalary->bindModel( array('belongsTo' => array(
			'Employee' => array(
        	'className'     => 'Employee',
            'foreignKey'    => 'employee_id',
            'dependent'     => true
        ))));
        $this->GeneratedSalary->bindModel( array('belongsTo' => array(
			'EmployeePersonal' => array(
        	'className'     => 'EmployeePersonal',
            'foreignKey'    => 'employee_id',
            "fields"		=> array("bank","account","etin"),
            'dependent'     => true
        ))));
        $temps = $this->GeneratedSalary->find("all",array("conditions"=>$conditions,"order"=>array("ABS(`Employee`.`employee_code`) ASC")));
		
		$i = 0;
		foreach($temps AS $tmp){
			$loans = $this->Loan->find("all", array("conditions" => "Loan.employee_id = " . $tmp["Employee"]["id"]));
			foreach($loans AS $loan){
				$refund = $this->Refund->find("all", array("conditions" => "Refund.loan_id = " . $loan["Loan"]["id"]));
				
				if($loan["Loan"]["type"] == 1){
					$temps[$i]['loan_data1'] = array('status'=>$loan["Loan"]["status"],'loan'=>$loan["Loan"]["total"], 'total_installment'=>$loan["Loan"]["total_installment"],'paid_installment'=>$refund[0]['Refund']['paid_installment'],'deduct'=>$loan["Loan"]["amount"],'balance'=>$refund[0]['Refund']['balance']);
				}
				if($loan["Loan"]["type"] == 2){
					$temps[$i]['loan_data2'] = array('status'=>$loan["Loan"]["status"],'loan'=>$loan["Loan"]["total"], 'total_installment'=>$loan["Loan"]["total_installment"],'paid_installment'=>$refund[0]['Refund']['paid_installment'],'deduct'=>$loan["Loan"]["amount"],'balance'=>$refund[0]['Refund']['balance']);
				}
				
			}
			$i++;
		}
		$this->set("curdate",$currentTime);
		$this->set("temps",$temps);
		$this->set("type",$type);
	}
	
	function cpfloanstatementPdf($type,$fileName){
		$this->designations();
		$this->layout="pdf";
		$settingInfo = $this->Session->read("SETTING_INFO");
		$currentTime = $settingInfo["execution_date"];
		$start = mktime(0,0,0,date ('m',$currentTime),1,date ('Y',$currentTime));
		$end = mktime(0,0,0,date ('m',$currentTime) + 1,0,date ('Y',$currentTime));
		//$start = mktime(0,0,0,date ('m'),1,date ('Y'));
		//$end = mktime(0,0,0,date ('m') + 1,0,date ('Y'));
		$conditions[] = "GeneratedSalary.status != 0";
	   	$conditions[] = "GeneratedSalary.execution_date > $start";
    	$conditions[] = "GeneratedSalary.execution_date < $end";
        $conditions[] = "Employee.type = $type";
        $this->GeneratedSalary->bindModel( array('hasOne' => array(
			'GeneratedDeduction' => array(
        	'className'     => 'Deduction',
            'foreignKey'    => 'salary_id',
            'dependent'     => true
        ))));
        $this->GeneratedSalary->bindModel( array('belongsTo' => array(
			'Employee' => array(
        	'className'     => 'Employee',
            'foreignKey'    => 'employee_id',
            'dependent'     => true
        ))));
        $this->GeneratedSalary->bindModel( array('belongsTo' => array(
			'EmployeePersonal' => array(
        	'className'     => 'EmployeePersonal',
            'foreignKey'    => 'employee_id',
            "fields"		=> array("bank","account","etin"),
            'dependent'     => true
        ))));
        $temps = $this->GeneratedSalary->find("all",array("conditions"=>$conditions,"order"=>array("ABS(`Employee`.`employee_code`) ASC")));
		
		$i = 0;
		foreach($temps AS $tmp){
			$loans = $this->Loan->find("all", array("conditions" => "Loan.employee_id = " . $tmp["Employee"]["id"]));
			foreach($loans AS $loan){
				$refund = $this->Refund->find("all", array("conditions" => "Refund.loan_id = " . $loan["Loan"]["id"]));
				
				if($loan["Loan"]["type"] == 1){
					$temps[$i]['loan_data1'] = array('loan'=>$loan["Loan"]["total"], 'total_installment'=>$loan["Loan"]["total_installment"],'paid_installment'=>$refund[0]['Refund']['paid_installment'],'deduct'=>$loan["Loan"]["amount"],'balance'=>$refund[0]['Refund']['balance']);
				}
				if($loan["Loan"]["type"] == 2){
					$temps[$i]['loan_data2'] = array('loan'=>$loan["Loan"]["total"], 'total_installment'=>$loan["Loan"]["total_installment"],'paid_installment'=>$refund[0]['Refund']['paid_installment'],'deduct'=>$loan["Loan"]["amount"],'balance'=>$refund[0]['Refund']['balance']);
				}
				
			}
			$i++;
		}
		$this->set("curdate",$currentTime);
		$this->set("temps",$temps);
		$this->set("type",$type);
		$_html = '
		<div class="row-fluid">
			<div class="span12">
				<div class="invoice_logo"><img src="'. $this->webroot .'img/logo.png" alt="" class="img-polaroid" width="940px"/></div>
			</div><!--span6-->
			<div class="span12" style="text-align:center;margin-bottom:25px">';
		
		if($type == 1) $_html .= "Employee (Grade 1-10)"; elseif($type == 2) $_html .="Employee (Grade 11-20)"; $_html .=' CPF Loan Statement of '. date('F, Y', $currentTime);	
			
		$_html .='</div>
		</div>
		';
		$_html .= $this->_getViewObject()->element('cpfloanstatement_pdf');
        $this->create_pdf($_html);
	}
	
	function scheduleCpf($type){
		$this->designations();
		$settingInfo = $this->Session->read("SETTING_INFO");
		$currentTime = $settingInfo["execution_date"];
		$start = mktime(0,0,0,date ('m',$currentTime),1,date ('Y',$currentTime));
		$end = mktime(0,0,0,date ('m',$currentTime) + 1,0,date ('Y',$currentTime));
		
		$conditions[] = "GeneratedDeduction.status != 0";
	   	$conditions[] = "GeneratedDeduction.execution_date > $start";
    	$conditions[] = "GeneratedDeduction.execution_date < $end";
        $conditions[] = "GeneratedDeduction.type = $type";
		
		 $this->GeneratedDeduction->bindModel( array('belongsTo' => array(
			'GeneratedSalary' => array(
        	'className'     => 'GeneratedSalary',
            'foreignKey'    => 'generated_salary_id',
            'dependent'     => true
        ))));
        $this->GeneratedDeduction->bindModel( array('belongsTo' => array(
			'Employee' => array(
        	'className'     => 'Employee',
            'foreignKey'    => 'employee_id',
            "fields"		=> array("employee_code","first_name","last_name","middle_name","designation_id","employee_code"),
            'dependent'     => true
        ))));
		
		$temps = $this->GeneratedDeduction->find("all",array("conditions"=>$conditions,"order"=>array("ABS(`Employee`.`employee_code`) ASC")));
		
		$i=0;
		foreach($temps AS $tmp){
			$total = $tmp['GeneratedDeduction']['cpf1'] + $tmp['GeneratedDeduction']['cpf2'] + $tmp['GeneratedDeduction']['cpf_loan1'] + $tmp['GeneratedDeduction']['cpf_loan2'] + $tmp['GeneratedDeduction']['cpf_interest'] + $tmp['GeneratedDeduction']['arrear_cpf'];
			$temps[$i]['total'] = $total;
			$i++;
		}
		
		$this->set("curdate",$currentTime);
		$this->set("temps",$temps);
		$this->set("type",$type);
	}
	
	function schedulecpfPdf($type,$fileName){
		$this->designations();
		$this->layout="pdf";
		$settingInfo = $this->Session->read("SETTING_INFO");
		$currentTime = $settingInfo["execution_date"];
		$start = mktime(0,0,0,date ('m',$currentTime),1,date ('Y',$currentTime));
		$end = mktime(0,0,0,date ('m',$currentTime) + 1,0,date ('Y',$currentTime));
		
		$conditions[] = "GeneratedDeduction.status != 0";
	   	$conditions[] = "GeneratedDeduction.execution_date > $start";
    	$conditions[] = "GeneratedDeduction.execution_date < $end";
        $conditions[] = "GeneratedDeduction.type = $type";
		
		 $this->GeneratedDeduction->bindModel( array('belongsTo' => array(
			'GeneratedSalary' => array(
        	'className'     => 'GeneratedSalary',
            'foreignKey'    => 'generated_salary_id',
            'dependent'     => true
        ))));
        $this->GeneratedDeduction->bindModel( array('belongsTo' => array(
			'Employee' => array(
        	'className'     => 'Employee',
            'foreignKey'    => 'employee_id',
            "fields"		=> array("employee_code","first_name","last_name","middle_name","designation_id","employee_code"),
            'dependent'     => true
        ))));
		
		$temps = $this->GeneratedDeduction->find("all",array("conditions"=>$conditions,"order"=>array("ABS(`Employee`.`employee_code`) ASC")));
		$i=0;
		foreach($temps AS $tmp){
			$total = $tmp['GeneratedDeduction']['cpf1'] + $tmp['GeneratedDeduction']['cpf2'] + $tmp['GeneratedDeduction']['cpf_loan1'] + $tmp['GeneratedDeduction']['cpf_loan2'] + $tmp['GeneratedDeduction']['cpf_interest'] + $tmp['GeneratedDeduction']['arrear_cpf'];
			$temps[$i]['total'] = $total;
			$i++;
		}
		
		$entry_per_page = 15;
		
		$divide_data = array_chunk($temps, $entry_per_page);
		$j = 1;
		$cpf1_total = $cpf2_total = $cpf_loan1_total = $cpf_loan2_total = $cpf_interest_total = $arrear_cpf_total = $all_total = 0;
		$page_details = array();
		foreach ($divide_data AS $data){
			foreach($data AS $info){
				$cpf1_total = $cpf1_total + $info['GeneratedDeduction']['cpf1'];
				$cpf2_total = $cpf2_total + $info['GeneratedDeduction']['cpf2'];
				$cpf_loan1_total = $cpf_loan1_total + $info['GeneratedDeduction']['cpf_loan1'];
				$cpf_loan2_total = $cpf_loan2_total + $info['GeneratedDeduction']['cpf_loan2'];
				$cpf_interest_total = $cpf_interest_total + $info['GeneratedDeduction']['cpf_interest'];
				$arrear_cpf_total = $arrear_cpf_total + $info['GeneratedDeduction']['arrear_cpf'];
				$all_total = $all_total + $info['total'];
			}
			$page_details[$j] = array('cpf1_total'=>$cpf1_total,'cpf2_total'=>$cpf2_total,'cpf_loan1_total'=>$cpf_loan1_total,'cpf_loan2_total'=>$cpf_loan2_total,'cpf_interest_total'=>$cpf_interest_total,'arrear_cpf_total'=>$arrear_cpf_total,'all_total'=>$all_total);
			$cpf1_total = $cpf2_total = $cpf_loan1_total = $cpf_loan2_total = $cpf_interest_total = $arrear_cpf_total = $all_total = 0;
			$j++;
		}
		
		$k = 1;
		$cpf1_grand_total = $cpf2_grand_total = $cpf_loan1_grand_total = $cpf_loan2_grand_total = $cpf_interest_grand_total = $arrear_cpf_grand_total = $grand_total = 0;
		foreach($page_details AS $details){
			$cpf1_grand_total = $cpf1_grand_total + $details['cpf1_total'];
			$cpf2_grand_total = $cpf2_grand_total + $details['cpf2_total'];
			$cpf_loan1_grand_total = $cpf_loan1_grand_total + $details['cpf_loan1_total'];
			$cpf_loan2_grand_total = $cpf_loan2_grand_total + $details['cpf_loan2_total'];
			$cpf_interest_grand_total = $cpf_interest_grand_total + $details['cpf_interest_total'];
			$arrear_cpf_grand_total = $arrear_cpf_grand_total + $details['arrear_cpf_total'];
			$grand_total = $grand_total + $details['all_total'];
		}
		
		$grand_total_by_page = array('cpf1_grand_total'=>$cpf1_grand_total,'cpf2_grand_total'=>$cpf2_grand_total,'cpf_loan1_grand_total'=>$cpf_loan1_grand_total,'cpf_loan2_grand_total'=>$cpf_loan2_grand_total,'cpf_interest_grand_total'=>$cpf_interest_grand_total,'arrear_cpf_grand_total'=>$arrear_cpf_grand_total,'grand_total'=>$grand_total);
		
		$this->set("curdate",$currentTime);
		$this->set("temps",$temps);
		$this->set("divide_data",$divide_data);
		$this->set("page_details",$page_details);
		$this->set("grand_total_by_page",$grand_total_by_page);
		$this->set("entry_per_page",$entry_per_page);
		$this->set("type",$type);
		
		/*$_html = '
		<div class="row-fluid">
			<div class="span12">
				<div class="invoice_logo"><img src="'. $this->webroot .'img/logo.png" alt="" class="img-polaroid" width="940px"/></div>
			</div><!--span6-->
			<div class="span12" style="text-align:center;margin-bottom:25px">';
		
		if($type == 1) $_html .= "Officer's"; elseif($type == 2) $_html .="Staff's"; $_html .=' Schudule of CPF of '. date('F, Y', $currentTime);	
			
		$_html .='</div>
		</div>
		';*/
		$_html = '<htmlpagefooter name="MyFooter1">
		<table width="100%" style="vertical-align: bottom; font-family: serif; font-size: 8pt; 
			color: #000000; font-weight: bold; font-style: italic;"><tr>
			<td width="33%"><span style="font-weight: bold; font-style: italic;">{DATE j-m-Y}</span></td>
			<td width="33%" align="center" style="font-weight: bold; font-style: italic;">{PAGENO}/{nbpg}</td>
			<td width="33%" style="text-align: right; ">BARC</td>
			</tr>
		</table>
		</htmlpagefooter>

		<sethtmlpagefooter name="MyFooter1" value="on" />
		';
		$_html .= $this->_getViewObject()->element('schedulecpf_pdf');
        $this->create_landscape_pdf($_html);
	}
	
	function journalVoucher($type){
		$this->designations();
		$settingInfo = $this->Session->read("SETTING_INFO");
		$currentTime = $settingInfo["execution_date"];
		$start = mktime(0,0,0,date ('m',$currentTime),1,date ('Y',$currentTime));
		$end = mktime(0,0,0,date ('m',$currentTime) + 1,0,date ('Y',$currentTime));
		$conditions = NULL;
        $conditions[] = "GeneratedSalary.status != 0";
        $conditions[] = "GeneratedDeduction.status != 0";
        $conditions[] = "GeneratedSalary.execution_date between $start AND $end";
        //$conditions[] = "GeneratedSalary.execution_date < $end";
        $conditions[] = "Employee.type = $type";
        $this->GeneratedSalary->bindModel(array('belongsTo' => array(
                'Employee' => array(
                    'className' => 'Employee',
                    'foreignKey' => 'employee_id',
                    "fields" => array("employee_code", "first_name", "middle_name", "last_name", "status"),
                    'dependent' => true
        ))));
        $this->GeneratedSalary->bindModel(array('hasOne' => array(
                'GeneratedDeduction' => array(
                    'className' => 'GeneratedDeduction',
                    'foreignKey' => 'generated_salary_id',
                    'dependent' => true
        ))));
        $salaries = $this->GeneratedSalary->find("all", array("conditions" => $conditions, "order" => array("GeneratedSalary.id ASC", "GeneratedSalary.grade ASC", "GeneratedSalary.designation_id ASC")));
        
		$net_deduction = array();
		$net_deduction['cpf1'] = $net_deduction['cpf2'] = $net_deduction['arrear_cpf'] = $net_deduction['cpf_loan1'] = $net_deduction['cpf_loan2'] = $net_deduction['house_loan'] = $net_deduction['vehicle_loan'] = $net_deduction['cpf_interest'] = $net_deduction['h_interest'] = $net_deduction['v_interest'] = $net_deduction['benevolent_fund'] = $net_deduction['house_rent_deduct'] = $net_deduction['transport_bill'] = $net_deduction['personal_vehicle'] = $net_deduction['group_insurance'] = $net_deduction['w_s'] = $net_deduction['fuel'] = $net_deduction['overdrawn'] = $net_deduction['phone_bill'] = $net_deduction['association'] = $net_deduction['tax'] = $net_deduction['miscellaneous_deduct'] = $net_deduction['total_sub'] = 0;
		$net_deduction['j_v_cpf'] = 0;
		$net_deduction['e_j_v_cpf'] = 0;
		
		$reg_deduction = array();
		$reg_deduction['cpf1'] = $reg_deduction['cpf2'] = $reg_deduction['arrear_cpf'] = $reg_deduction['cpf_loan1'] = $reg_deduction['cpf_loan2'] = $reg_deduction['house_loan'] = $reg_deduction['vehicle_loan'] = $reg_deduction['cpf_interest'] = $reg_deduction['h_interest'] = $reg_deduction['v_interest'] = $reg_deduction['benevolent_fund'] = $reg_deduction['house_rent_deduct'] = $reg_deduction['transport_bill'] = $reg_deduction['personal_vehicle'] = $reg_deduction['group_insurance'] = $reg_deduction['w_s'] = $reg_deduction['fuel'] = $reg_deduction['overdrawn'] = $reg_deduction['phone_bill'] = $reg_deduction['association'] = $reg_deduction['tax'] = $reg_deduction['miscellaneous_deduct'] = $reg_deduction['total_sub'] = 0;
		$reg_deduction['j_v_cpf'] = 0;
		$reg_deduction['e_j_v_cpf'] = 0;
		
		foreach($salaries AS $sal){
			
			$net_deduction['cpf1'] = $net_deduction['cpf1'] + $sal['GeneratedDeduction']['cpf1'];
			$net_deduction['cpf2'] = $net_deduction['cpf2'] + $sal['GeneratedDeduction']['cpf2'];
			$net_deduction['arrear_cpf'] = $net_deduction['arrear_cpf'] + $sal['GeneratedDeduction']['arrear_cpf'];
			$net_deduction['cpf_loan1'] = $net_deduction['cpf_loan1'] + $sal['GeneratedDeduction']['cpf_loan1'];
			$net_deduction['cpf_loan2'] = $net_deduction['cpf_loan2'] + $sal['GeneratedDeduction']['cpf_loan2'];
			$net_deduction['house_loan'] = $net_deduction['house_loan'] + $sal['GeneratedDeduction']['house_loan'];
			$net_deduction['vehicle_loan'] = $net_deduction['vehicle_loan'] + $sal['GeneratedDeduction']['vehicle_loan'];
			$net_deduction['cpf_interest'] = $net_deduction['cpf_interest'] + $sal['GeneratedDeduction']['cpf_interest'];
			$net_deduction['h_interest'] = $net_deduction['h_interest'] + $sal['GeneratedDeduction']['h_interest'];
			$net_deduction['v_interest'] = $net_deduction['v_interest'] + $sal['GeneratedDeduction']['v_interest'];
			$net_deduction['benevolent_fund'] = $net_deduction['benevolent_fund'] + $sal['GeneratedDeduction']['benevolent_fund'];
			$net_deduction['house_rent_deduct'] = $net_deduction['house_rent_deduct'] + $sal['GeneratedDeduction']['house_rent_deduct'];
			$net_deduction['transport_bill'] = $net_deduction['transport_bill'] + $sal['GeneratedDeduction']['transport_bill'];
			$net_deduction['personal_vehicle'] = $net_deduction['personal_vehicle'] + $sal['GeneratedDeduction']['personal_vehicle'];
			$net_deduction['group_insurance'] = $net_deduction['group_insurance'] + $sal['GeneratedDeduction']['group_insurance'];
			$net_deduction['w_s'] = $net_deduction['w_s'] + $sal['GeneratedDeduction']['w_s'];
			$net_deduction['fuel'] = $net_deduction['fuel'] + $sal['GeneratedDeduction']['fuel'];
			$net_deduction['overdrawn'] = $net_deduction['overdrawn'] + $sal['GeneratedDeduction']['overdrawn'];
			$net_deduction['phone_bill'] = $net_deduction['phone_bill'] + $sal['GeneratedDeduction']['phone_bill'];
			$net_deduction['association'] = $net_deduction['association'] + $sal['GeneratedDeduction']['association'];
			$net_deduction['tax'] = $net_deduction['tax'] + $sal['GeneratedDeduction']['tax'];
			$net_deduction['miscellaneous_deduct'] = $net_deduction['miscellaneous_deduct'] + $sal['GeneratedDeduction']['miscellaneous_deduct'];
			$net_deduction['total_sub'] = $net_deduction['total_sub'] + $sal['GeneratedDeduction']['total_sub'];
			
			if($sal['Employee']['status'] == 1){
				$reg_deduction['cpf1'] = $reg_deduction['cpf1'] + $sal['GeneratedDeduction']['cpf1'];
				$reg_deduction['cpf2'] = $reg_deduction['cpf2'] + $sal['GeneratedDeduction']['cpf2'];
				$reg_deduction['arrear_cpf'] = $reg_deduction['arrear_cpf'] + $sal['GeneratedDeduction']['arrear_cpf'];
				$reg_deduction['cpf_loan1'] = $reg_deduction['cpf_loan1'] + $sal['GeneratedDeduction']['cpf_loan1'];
				$reg_deduction['cpf_loan2'] = $reg_deduction['cpf_loan2'] + $sal['GeneratedDeduction']['cpf_loan2'];
				$reg_deduction['house_loan'] = $reg_deduction['house_loan'] + $sal['GeneratedDeduction']['house_loan'];
				$reg_deduction['vehicle_loan'] = $reg_deduction['vehicle_loan'] + $sal['GeneratedDeduction']['vehicle_loan'];
				$reg_deduction['cpf_interest'] = $reg_deduction['cpf_interest'] + $sal['GeneratedDeduction']['cpf_interest'];
				$reg_deduction['h_interest'] = $reg_deduction['h_interest'] + $sal['GeneratedDeduction']['h_interest'];
				$reg_deduction['v_interest'] = $reg_deduction['v_interest'] + $sal['GeneratedDeduction']['v_interest'];
				$reg_deduction['benevolent_fund'] = $reg_deduction['benevolent_fund'] + $sal['GeneratedDeduction']['benevolent_fund'];
				$reg_deduction['house_rent_deduct'] = $reg_deduction['house_rent_deduct'] + $sal['GeneratedDeduction']['house_rent_deduct'];
				$reg_deduction['transport_bill'] = $reg_deduction['transport_bill'] + $sal['GeneratedDeduction']['transport_bill'];
				$reg_deduction['personal_vehicle'] = $reg_deduction['personal_vehicle'] + $sal['GeneratedDeduction']['personal_vehicle'];
				$reg_deduction['group_insurance'] = $reg_deduction['group_insurance'] + $sal['GeneratedDeduction']['group_insurance'];
				$reg_deduction['w_s'] = $reg_deduction['w_s'] + $sal['GeneratedDeduction']['w_s'];
				$reg_deduction['fuel'] = $reg_deduction['fuel'] + $sal['GeneratedDeduction']['fuel'];
				$reg_deduction['overdrawn'] = $reg_deduction['overdrawn'] + $sal['GeneratedDeduction']['overdrawn'];
				$reg_deduction['phone_bill'] = $reg_deduction['phone_bill'] + $sal['GeneratedDeduction']['phone_bill'];
				$reg_deduction['association'] = $reg_deduction['association'] + $sal['GeneratedDeduction']['association'];
				$reg_deduction['tax'] = $reg_deduction['tax'] + $sal['GeneratedDeduction']['tax'];
				$reg_deduction['miscellaneous_deduct'] = $reg_deduction['miscellaneous_deduct'] + $sal['GeneratedDeduction']['miscellaneous_deduct'];
				$reg_deduction['total_sub'] = $reg_deduction['total_sub'] + $sal['GeneratedDeduction']['total_sub'];
			}
			
		}
		$net_deduction['j_v_cpf'] = $net_deduction['cpf1'] + $net_deduction['cpf2'] + $net_deduction['arrear_cpf'] + $net_deduction['cpf_loan1'] + $net_deduction['cpf_loan2'] + $net_deduction['cpf_interest'];
		$reg_deduction['j_v_cpf'] = $reg_deduction['cpf1'] + $reg_deduction['cpf2'] + $reg_deduction['arrear_cpf'] + $reg_deduction['cpf_loan1'] + $reg_deduction['cpf_loan2'] + $reg_deduction['cpf_interest'];
		
		$net_deduction['e_j_v_cpf'] = $net_deduction['house_loan'] + $net_deduction['vehicle_loan'] + $net_deduction['h_interest'] + $net_deduction['v_interest'] + $net_deduction['benevolent_fund'] + $net_deduction['house_rent_deduct'] + $net_deduction['transport_bill'] + $net_deduction['personal_vehicle'] + $net_deduction['group_insurance'] + $net_deduction['w_s'] + $net_deduction['fuel'] + $net_deduction['overdrawn'] + $net_deduction['phone_bill'] + $net_deduction['association'] + $net_deduction['tax'] + $net_deduction['miscellaneous_deduct'];
		$reg_deduction['e_j_v_cpf'] = $reg_deduction['house_loan'] + $reg_deduction['vehicle_loan'] + $reg_deduction['h_interest'] + $reg_deduction['v_interest'] + $reg_deduction['benevolent_fund'] + $reg_deduction['house_rent_deduct'] + $reg_deduction['transport_bill'] + $reg_deduction['personal_vehicle'] + $reg_deduction['group_insurance'] + $reg_deduction['w_s'] + $reg_deduction['fuel'] + $reg_deduction['overdrawn'] + $reg_deduction['phone_bill'] + $reg_deduction['association'] + $reg_deduction['tax'] + $reg_deduction['miscellaneous_deduct'];
		
		$this->set("curdate",$currentTime);
		$this->set("net_deductions",$net_deduction);
		$this->set("reg_deductions",$reg_deduction);
		$this->set("type",$type);
	}
	
	function journalvoucherPdf($type,$fileName){
		$this->designations();
		$this->layout="pdf";
		$settingInfo = $this->Session->read("SETTING_INFO");
		$currentTime = $settingInfo["execution_date"];
		$start = mktime(0,0,0,date ('m',$currentTime),1,date ('Y',$currentTime));
		$end = mktime(0,0,0,date ('m',$currentTime) + 1,0,date ('Y',$currentTime));
		$conditions = NULL;
        $conditions[] = "GeneratedSalary.status != 0";
        $conditions[] = "GeneratedDeduction.status != 0";
        $conditions[] = "GeneratedSalary.execution_date between $start AND $end";
        //$conditions[] = "GeneratedSalary.execution_date < $end";
        $conditions[] = "Employee.type = $type";
        $this->GeneratedSalary->bindModel(array('belongsTo' => array(
                'Employee' => array(
                    'className' => 'Employee',
                    'foreignKey' => 'employee_id',
                    "fields" => array("employee_code", "first_name", "middle_name", "last_name", "status"),
                    'dependent' => true
        ))));
        $this->GeneratedSalary->bindModel(array('hasOne' => array(
                'GeneratedDeduction' => array(
                    'className' => 'GeneratedDeduction',
                    'foreignKey' => 'generated_salary_id',
                    'dependent' => true
        ))));
        $salaries = $this->GeneratedSalary->find("all", array("conditions" => $conditions, "order" => array("GeneratedSalary.id ASC", "GeneratedSalary.grade ASC", "GeneratedSalary.designation_id ASC")));
        
		$net_deduction = array();
		$net_deduction['cpf1'] = $net_deduction['cpf2'] = $net_deduction['arrear_cpf'] = $net_deduction['cpf_loan1'] = $net_deduction['cpf_loan2'] = $net_deduction['house_loan'] = $net_deduction['vehicle_loan'] = $net_deduction['cpf_interest'] = $net_deduction['h_interest'] = $net_deduction['v_interest'] = $net_deduction['benevolent_fund'] = $net_deduction['house_rent_deduct'] = $net_deduction['transport_bill'] = $net_deduction['personal_vehicle'] = $net_deduction['group_insurance'] = $net_deduction['w_s'] = $net_deduction['fuel'] = $net_deduction['overdrawn'] = $net_deduction['phone_bill'] = $net_deduction['association'] = $net_deduction['tax'] = $net_deduction['miscellaneous_deduct'] = $net_deduction['total_sub'] = 0;
		$net_deduction['j_v_cpf'] = 0;
		$net_deduction['e_j_v_cpf'] = 0;
		
		$reg_deduction = array();
		$reg_deduction['cpf1'] = $reg_deduction['cpf2'] = $reg_deduction['arrear_cpf'] = $reg_deduction['cpf_loan1'] = $reg_deduction['cpf_loan2'] = $reg_deduction['house_loan'] = $reg_deduction['vehicle_loan'] = $reg_deduction['cpf_interest'] = $reg_deduction['h_interest'] = $reg_deduction['v_interest'] = $reg_deduction['benevolent_fund'] = $reg_deduction['house_rent_deduct'] = $reg_deduction['transport_bill'] = $reg_deduction['personal_vehicle'] = $reg_deduction['group_insurance'] = $reg_deduction['w_s'] = $reg_deduction['fuel'] = $reg_deduction['overdrawn'] = $reg_deduction['phone_bill'] = $reg_deduction['association'] = $reg_deduction['tax'] = $reg_deduction['miscellaneous_deduct'] = $reg_deduction['total_sub'] = 0;
		$reg_deduction['j_v_cpf'] = 0;
		$reg_deduction['e_j_v_cpf'] = 0;
		
		foreach($salaries AS $sal){
			
			$net_deduction['cpf1'] = $net_deduction['cpf1'] + $sal['GeneratedDeduction']['cpf1'];
			$net_deduction['cpf2'] = $net_deduction['cpf2'] + $sal['GeneratedDeduction']['cpf2'];
			$net_deduction['arrear_cpf'] = $net_deduction['arrear_cpf'] + $sal['GeneratedDeduction']['arrear_cpf'];
			$net_deduction['cpf_loan1'] = $net_deduction['cpf_loan1'] + $sal['GeneratedDeduction']['cpf_loan1'];
			$net_deduction['cpf_loan2'] = $net_deduction['cpf_loan2'] + $sal['GeneratedDeduction']['cpf_loan2'];
			$net_deduction['house_loan'] = $net_deduction['house_loan'] + $sal['GeneratedDeduction']['house_loan'];
			$net_deduction['vehicle_loan'] = $net_deduction['vehicle_loan'] + $sal['GeneratedDeduction']['vehicle_loan'];
			$net_deduction['cpf_interest'] = $net_deduction['cpf_interest'] + $sal['GeneratedDeduction']['cpf_interest'];
			$net_deduction['h_interest'] = $net_deduction['h_interest'] + $sal['GeneratedDeduction']['h_interest'];
			$net_deduction['v_interest'] = $net_deduction['v_interest'] + $sal['GeneratedDeduction']['v_interest'];
			$net_deduction['benevolent_fund'] = $net_deduction['benevolent_fund'] + $sal['GeneratedDeduction']['benevolent_fund'];
			$net_deduction['house_rent_deduct'] = $net_deduction['house_rent_deduct'] + $sal['GeneratedDeduction']['house_rent_deduct'];
			$net_deduction['transport_bill'] = $net_deduction['transport_bill'] + $sal['GeneratedDeduction']['transport_bill'];
			$net_deduction['personal_vehicle'] = $net_deduction['personal_vehicle'] + $sal['GeneratedDeduction']['personal_vehicle'];
			$net_deduction['group_insurance'] = $net_deduction['group_insurance'] + $sal['GeneratedDeduction']['group_insurance'];
			$net_deduction['w_s'] = $net_deduction['w_s'] + $sal['GeneratedDeduction']['w_s'];
			$net_deduction['fuel'] = $net_deduction['fuel'] + $sal['GeneratedDeduction']['fuel'];
			$net_deduction['overdrawn'] = $net_deduction['overdrawn'] + $sal['GeneratedDeduction']['overdrawn'];
			$net_deduction['phone_bill'] = $net_deduction['phone_bill'] + $sal['GeneratedDeduction']['phone_bill'];
			$net_deduction['association'] = $net_deduction['association'] + $sal['GeneratedDeduction']['association'];
			$net_deduction['tax'] = $net_deduction['tax'] + $sal['GeneratedDeduction']['tax'];
			$net_deduction['miscellaneous_deduct'] = $net_deduction['miscellaneous_deduct'] + $sal['GeneratedDeduction']['miscellaneous_deduct'];
			$net_deduction['total_sub'] = $net_deduction['total_sub'] + $sal['GeneratedDeduction']['total_sub'];
			
			if($sal['Employee']['status'] == 1){
				$reg_deduction['cpf1'] = $reg_deduction['cpf1'] + $sal['GeneratedDeduction']['cpf1'];
				$reg_deduction['cpf2'] = $reg_deduction['cpf2'] + $sal['GeneratedDeduction']['cpf2'];
				$reg_deduction['arrear_cpf'] = $reg_deduction['arrear_cpf'] + $sal['GeneratedDeduction']['arrear_cpf'];
				$reg_deduction['cpf_loan1'] = $reg_deduction['cpf_loan1'] + $sal['GeneratedDeduction']['cpf_loan1'];
				$reg_deduction['cpf_loan2'] = $reg_deduction['cpf_loan2'] + $sal['GeneratedDeduction']['cpf_loan2'];
				$reg_deduction['house_loan'] = $reg_deduction['house_loan'] + $sal['GeneratedDeduction']['house_loan'];
				$reg_deduction['vehicle_loan'] = $reg_deduction['vehicle_loan'] + $sal['GeneratedDeduction']['vehicle_loan'];
				$reg_deduction['cpf_interest'] = $reg_deduction['cpf_interest'] + $sal['GeneratedDeduction']['cpf_interest'];
				$reg_deduction['h_interest'] = $reg_deduction['h_interest'] + $sal['GeneratedDeduction']['h_interest'];
				$reg_deduction['v_interest'] = $reg_deduction['v_interest'] + $sal['GeneratedDeduction']['v_interest'];
				$reg_deduction['benevolent_fund'] = $reg_deduction['benevolent_fund'] + $sal['GeneratedDeduction']['benevolent_fund'];
				$reg_deduction['house_rent_deduct'] = $reg_deduction['house_rent_deduct'] + $sal['GeneratedDeduction']['house_rent_deduct'];
				$reg_deduction['transport_bill'] = $reg_deduction['transport_bill'] + $sal['GeneratedDeduction']['transport_bill'];
				$reg_deduction['personal_vehicle'] = $reg_deduction['personal_vehicle'] + $sal['GeneratedDeduction']['personal_vehicle'];
				$reg_deduction['group_insurance'] = $reg_deduction['group_insurance'] + $sal['GeneratedDeduction']['group_insurance'];
				$reg_deduction['w_s'] = $reg_deduction['w_s'] + $sal['GeneratedDeduction']['w_s'];
				$reg_deduction['fuel'] = $reg_deduction['fuel'] + $sal['GeneratedDeduction']['fuel'];
				$reg_deduction['overdrawn'] = $reg_deduction['overdrawn'] + $sal['GeneratedDeduction']['overdrawn'];
				$reg_deduction['phone_bill'] = $reg_deduction['phone_bill'] + $sal['GeneratedDeduction']['phone_bill'];
				$reg_deduction['association'] = $reg_deduction['association'] + $sal['GeneratedDeduction']['association'];
				$reg_deduction['tax'] = $reg_deduction['tax'] + $sal['GeneratedDeduction']['tax'];
				$reg_deduction['miscellaneous_deduct'] = $reg_deduction['miscellaneous_deduct'] + $sal['GeneratedDeduction']['miscellaneous_deduct'];
				$reg_deduction['total_sub'] = $reg_deduction['total_sub'] + $sal['GeneratedDeduction']['total_sub'];
			}
			
		}
		$net_deduction['j_v_cpf'] = $net_deduction['cpf1'] + $net_deduction['cpf2'] + $net_deduction['arrear_cpf'] + $net_deduction['cpf_loan1'] + $net_deduction['cpf_loan2'] + $net_deduction['cpf_interest'];
		$reg_deduction['j_v_cpf'] = $reg_deduction['cpf1'] + $reg_deduction['cpf2'] + $reg_deduction['arrear_cpf'] + $reg_deduction['cpf_loan1'] + $reg_deduction['cpf_loan2'] + $reg_deduction['cpf_interest'];
		
		$net_deduction['e_j_v_cpf'] = $net_deduction['house_loan'] + $net_deduction['vehicle_loan'] + $net_deduction['h_interest'] + $net_deduction['v_interest'] + $net_deduction['benevolent_fund'] + $net_deduction['house_rent_deduct'] + $net_deduction['transport_bill'] + $net_deduction['personal_vehicle'] + $net_deduction['group_insurance'] + $net_deduction['w_s'] + $net_deduction['fuel'] + $net_deduction['overdrawn'] + $net_deduction['phone_bill'] + $net_deduction['association'] + $net_deduction['tax'] + $net_deduction['miscellaneous_deduct'];
		$reg_deduction['e_j_v_cpf'] = $reg_deduction['house_loan'] + $reg_deduction['vehicle_loan'] + $reg_deduction['h_interest'] + $reg_deduction['v_interest'] + $reg_deduction['benevolent_fund'] + $reg_deduction['house_rent_deduct'] + $reg_deduction['transport_bill'] + $reg_deduction['personal_vehicle'] + $reg_deduction['group_insurance'] + $reg_deduction['w_s'] + $reg_deduction['fuel'] + $reg_deduction['overdrawn'] + $reg_deduction['phone_bill'] + $reg_deduction['association'] + $reg_deduction['tax'] + $reg_deduction['miscellaneous_deduct'];
		
		$this->set("curdate",$currentTime);
		$this->set("net_deductions",$net_deduction);
		$this->set("reg_deductions",$reg_deduction);
		$this->set("type",$type);
		
		$_html = $this->_getViewObject()->element('journalvoucher_pdf');
        $this->create_pdf($_html);
	}
	
	function journalvoucherDeputation($type){
		$this->designations();
		$settingInfo = $this->Session->read("SETTING_INFO");
		$currentTime = $settingInfo["execution_date"];
		$start = mktime(0,0,0,date ('m',$currentTime),1,date ('Y',$currentTime));
		$end = mktime(0,0,0,date ('m',$currentTime) + 1,0,date ('Y',$currentTime));
		$conditions = NULL;
        $conditions[] = "GeneratedSalary.status != 0";
        $conditions[] = "GeneratedDeduction.status != 0";
        $conditions[] = "GeneratedSalary.execution_date between $start AND $end";
        //$conditions[] = "GeneratedSalary.execution_date < $end";
        $conditions[] = "Employee.type = $type";
        $this->GeneratedSalary->bindModel(array('belongsTo' => array(
                'Employee' => array(
                    'className' => 'Employee',
                    'foreignKey' => 'employee_id',
                    "fields" => array("employee_code", "first_name", "middle_name", "last_name", "status"),
                    'dependent' => true
        ))));
        $this->GeneratedSalary->bindModel(array('hasOne' => array(
                'GeneratedDeduction' => array(
                    'className' => 'GeneratedDeduction',
                    'foreignKey' => 'generated_salary_id',
                    'dependent' => true
        ))));
        $salaries = $this->GeneratedSalary->find("all", array("conditions" => $conditions, "order" => array("GeneratedSalary.id ASC", "GeneratedSalary.grade ASC", "GeneratedSalary.designation_id ASC")));
        
		$net_deduction = array();
		$net_deduction['cpf1'] = $net_deduction['cpf2'] = $net_deduction['arrear_cpf'] = $net_deduction['cpf_loan1'] = $net_deduction['cpf_loan2'] = $net_deduction['house_loan'] = $net_deduction['vehicle_loan'] = $net_deduction['cpf_interest'] = $net_deduction['h_interest'] = $net_deduction['v_interest'] = $net_deduction['benevolent_fund'] = $net_deduction['house_rent_deduct'] = $net_deduction['transport_bill'] = $net_deduction['personal_vehicle'] = $net_deduction['group_insurance'] = $net_deduction['w_s'] = $net_deduction['fuel'] = $net_deduction['overdrawn'] = $net_deduction['phone_bill'] = $net_deduction['association'] = $net_deduction['tax'] = $net_deduction['miscellaneous_deduct'] = $net_deduction['total_sub'] = 0;
		$net_deduction['j_v_cpf'] = 0;
		$net_deduction['e_j_v_cpf'] = 0;
		
		$dep_deduction = array();
		$dep_deduction['cpf1'] = $dep_deduction['cpf2'] = $dep_deduction['arrear_cpf'] = $dep_deduction['cpf_loan1'] = $dep_deduction['cpf_loan2'] = $dep_deduction['house_loan'] = $dep_deduction['vehicle_loan'] = $dep_deduction['cpf_interest'] = $dep_deduction['h_interest'] = $dep_deduction['v_interest'] = $dep_deduction['benevolent_fund'] = $dep_deduction['house_rent_deduct'] = $dep_deduction['transport_bill'] = $dep_deduction['personal_vehicle'] = $dep_deduction['group_insurance'] = $dep_deduction['w_s'] = $dep_deduction['fuel'] = $dep_deduction['overdrawn'] = $dep_deduction['phone_bill'] = $dep_deduction['association'] = $dep_deduction['tax'] = $dep_deduction['miscellaneous_deduct'] = $dep_deduction['total_sub'] = 0;
		$dep_deduction['j_v_cpf'] = 0;
		$dep_deduction['e_j_v_cpf'] = 0;
		
		foreach($salaries AS $sal){
			
			$net_deduction['cpf1'] = $net_deduction['cpf1'] + $sal['GeneratedDeduction']['cpf1'];
			$net_deduction['cpf2'] = $net_deduction['cpf2'] + $sal['GeneratedDeduction']['cpf2'];
			$net_deduction['arrear_cpf'] = $net_deduction['arrear_cpf'] + $sal['GeneratedDeduction']['arrear_cpf'];
			$net_deduction['cpf_loan1'] = $net_deduction['cpf_loan1'] + $sal['GeneratedDeduction']['cpf_loan1'];
			$net_deduction['cpf_loan2'] = $net_deduction['cpf_loan2'] + $sal['GeneratedDeduction']['cpf_loan2'];
			$net_deduction['house_loan'] = $net_deduction['house_loan'] + $sal['GeneratedDeduction']['house_loan'];
			$net_deduction['vehicle_loan'] = $net_deduction['vehicle_loan'] + $sal['GeneratedDeduction']['vehicle_loan'];
			$net_deduction['cpf_interest'] = $net_deduction['cpf_interest'] + $sal['GeneratedDeduction']['cpf_interest'];
			$net_deduction['h_interest'] = $net_deduction['h_interest'] + $sal['GeneratedDeduction']['h_interest'];
			$net_deduction['v_interest'] = $net_deduction['v_interest'] + $sal['GeneratedDeduction']['v_interest'];
			$net_deduction['benevolent_fund'] = $net_deduction['benevolent_fund'] + $sal['GeneratedDeduction']['benevolent_fund'];
			$net_deduction['house_rent_deduct'] = $net_deduction['house_rent_deduct'] + $sal['GeneratedDeduction']['house_rent_deduct'];
			$net_deduction['transport_bill'] = $net_deduction['transport_bill'] + $sal['GeneratedDeduction']['transport_bill'];
			$net_deduction['personal_vehicle'] = $net_deduction['personal_vehicle'] + $sal['GeneratedDeduction']['personal_vehicle'];
			$net_deduction['group_insurance'] = $net_deduction['group_insurance'] + $sal['GeneratedDeduction']['group_insurance'];
			$net_deduction['w_s'] = $net_deduction['w_s'] + $sal['GeneratedDeduction']['w_s'];
			$net_deduction['fuel'] = $net_deduction['fuel'] + $sal['GeneratedDeduction']['fuel'];
			$net_deduction['overdrawn'] = $net_deduction['overdrawn'] + $sal['GeneratedDeduction']['overdrawn'];
			$net_deduction['phone_bill'] = $net_deduction['phone_bill'] + $sal['GeneratedDeduction']['phone_bill'];
			$net_deduction['association'] = $net_deduction['association'] + $sal['GeneratedDeduction']['association'];
			$net_deduction['tax'] = $net_deduction['tax'] + $sal['GeneratedDeduction']['tax'];
			$net_deduction['miscellaneous_deduct'] = $net_deduction['miscellaneous_deduct'] + $sal['GeneratedDeduction']['miscellaneous_deduct'];
			$net_deduction['total_sub'] = $net_deduction['total_sub'] + $sal['GeneratedDeduction']['total_sub'];
			
			if($sal['Employee']['status'] == 2){
				$dep_deduction['cpf1'] = $dep_deduction['cpf1'] + $sal['GeneratedDeduction']['cpf1'];
				$dep_deduction['cpf2'] = $dep_deduction['cpf2'] + $sal['GeneratedDeduction']['cpf2'];
				$dep_deduction['arrear_cpf'] = $dep_deduction['arrear_cpf'] + $sal['GeneratedDeduction']['arrear_cpf'];
				$dep_deduction['cpf_loan1'] = $dep_deduction['cpf_loan1'] + $sal['GeneratedDeduction']['cpf_loan1'];
				$dep_deduction['cpf_loan2'] = $dep_deduction['cpf_loan2'] + $sal['GeneratedDeduction']['cpf_loan2'];
				$dep_deduction['house_loan'] = $dep_deduction['house_loan'] + $sal['GeneratedDeduction']['house_loan'];
				$dep_deduction['vehicle_loan'] = $dep_deduction['vehicle_loan'] + $sal['GeneratedDeduction']['vehicle_loan'];
				$dep_deduction['cpf_interest'] = $dep_deduction['cpf_interest'] + $sal['GeneratedDeduction']['cpf_interest'];
				$dep_deduction['h_interest'] = $dep_deduction['h_interest'] + $sal['GeneratedDeduction']['h_interest'];
				$dep_deduction['v_interest'] = $dep_deduction['v_interest'] + $sal['GeneratedDeduction']['v_interest'];
				$dep_deduction['benevolent_fund'] = $dep_deduction['benevolent_fund'] + $sal['GeneratedDeduction']['benevolent_fund'];
				$dep_deduction['house_rent_deduct'] = $dep_deduction['house_rent_deduct'] + $sal['GeneratedDeduction']['house_rent_deduct'];
				$dep_deduction['transport_bill'] = $dep_deduction['transport_bill'] + $sal['GeneratedDeduction']['transport_bill'];
				$dep_deduction['personal_vehicle'] = $dep_deduction['personal_vehicle'] + $sal['GeneratedDeduction']['personal_vehicle'];
				$dep_deduction['group_insurance'] = $dep_deduction['group_insurance'] + $sal['GeneratedDeduction']['group_insurance'];
				$dep_deduction['w_s'] = $dep_deduction['w_s'] + $sal['GeneratedDeduction']['w_s'];
				$dep_deduction['fuel'] = $dep_deduction['fuel'] + $sal['GeneratedDeduction']['fuel'];
				$dep_deduction['overdrawn'] = $dep_deduction['overdrawn'] + $sal['GeneratedDeduction']['overdrawn'];
				$dep_deduction['phone_bill'] = $dep_deduction['phone_bill'] + $sal['GeneratedDeduction']['phone_bill'];
				$dep_deduction['association'] = $dep_deduction['association'] + $sal['GeneratedDeduction']['association'];
				$dep_deduction['tax'] = $dep_deduction['tax'] + $sal['GeneratedDeduction']['tax'];
				$dep_deduction['miscellaneous_deduct'] = $dep_deduction['miscellaneous_deduct'] + $sal['GeneratedDeduction']['miscellaneous_deduct'];
				$dep_deduction['total_sub'] = $dep_deduction['total_sub'] + $sal['GeneratedDeduction']['total_sub'];
			}
			
		}
		
		$net_deduction['j_v_cpf'] = $net_deduction['cpf1'] + $net_deduction['cpf2'] + $net_deduction['arrear_cpf'] + $net_deduction['cpf_loan1'] + $net_deduction['cpf_loan2'] + $net_deduction['cpf_interest'];
		$dep_deduction['j_v_cpf'] = $dep_deduction['cpf1'] + $dep_deduction['cpf2'] + $dep_deduction['arrear_cpf'] + $dep_deduction['cpf_loan1'] + $dep_deduction['cpf_loan2'] + $dep_deduction['cpf_interest'];
		
		$net_deduction['e_j_v_cpf'] = $net_deduction['house_loan'] + $net_deduction['vehicle_loan'] + $net_deduction['h_interest'] + $net_deduction['v_interest'] + $net_deduction['benevolent_fund'] + $net_deduction['house_rent_deduct'] + $net_deduction['transport_bill'] + $net_deduction['personal_vehicle'] + $net_deduction['group_insurance'] + $net_deduction['w_s'] + $net_deduction['fuel'] + $net_deduction['overdrawn'] + $net_deduction['phone_bill'] + $net_deduction['association'] + $net_deduction['tax'] + $net_deduction['miscellaneous_deduct'];
		$dep_deduction['e_j_v_cpf'] = $dep_deduction['house_loan'] + $dep_deduction['vehicle_loan'] + $dep_deduction['h_interest'] + $dep_deduction['v_interest'] + $dep_deduction['benevolent_fund'] + $dep_deduction['house_rent_deduct'] + $dep_deduction['transport_bill'] + $dep_deduction['personal_vehicle'] + $dep_deduction['group_insurance'] + $dep_deduction['w_s'] + $dep_deduction['fuel'] + $dep_deduction['overdrawn'] + $dep_deduction['phone_bill'] + $dep_deduction['association'] + $dep_deduction['tax'] + $dep_deduction['miscellaneous_deduct'];
		
		
		$this->set("curdate",$currentTime);
		$this->set("net_deductions",$net_deduction);
		$this->set("dep_deductions",$dep_deduction);
		$this->set("type",$type);
		
	}
	
	function journalvoucherdeputationPdf($type,$fileName){
		$this->designations();
		$this->layout="pdf";
		$settingInfo = $this->Session->read("SETTING_INFO");
		$currentTime = $settingInfo["execution_date"];
		$start = mktime(0,0,0,date ('m',$currentTime),1,date ('Y',$currentTime));
		$end = mktime(0,0,0,date ('m',$currentTime) + 1,0,date ('Y',$currentTime));
		$conditions = NULL;
        $conditions[] = "GeneratedSalary.status != 0";
        $conditions[] = "GeneratedDeduction.status != 0";
        $conditions[] = "GeneratedSalary.execution_date between $start AND $end";
        //$conditions[] = "GeneratedSalary.execution_date < $end";
        $conditions[] = "Employee.type = $type";
        $this->GeneratedSalary->bindModel(array('belongsTo' => array(
                'Employee' => array(
                    'className' => 'Employee',
                    'foreignKey' => 'employee_id',
                    "fields" => array("employee_code", "first_name", "middle_name", "last_name", "status"),
                    'dependent' => true
        ))));
        $this->GeneratedSalary->bindModel(array('hasOne' => array(
                'GeneratedDeduction' => array(
                    'className' => 'GeneratedDeduction',
                    'foreignKey' => 'generated_salary_id',
                    'dependent' => true
        ))));
        $salaries = $this->GeneratedSalary->find("all", array("conditions" => $conditions, "order" => array("GeneratedSalary.id ASC", "GeneratedSalary.grade ASC", "GeneratedSalary.designation_id ASC")));
        
		$net_deduction = array();
		$net_deduction['cpf1'] = $net_deduction['cpf2'] = $net_deduction['arrear_cpf'] = $net_deduction['cpf_loan1'] = $net_deduction['cpf_loan2'] = $net_deduction['house_loan'] = $net_deduction['vehicle_loan'] = $net_deduction['cpf_interest'] = $net_deduction['h_interest'] = $net_deduction['v_interest'] = $net_deduction['benevolent_fund'] = $net_deduction['house_rent_deduct'] = $net_deduction['transport_bill'] = $net_deduction['personal_vehicle'] = $net_deduction['group_insurance'] = $net_deduction['w_s'] = $net_deduction['fuel'] = $net_deduction['overdrawn'] = $net_deduction['phone_bill'] = $net_deduction['association'] = $net_deduction['tax'] = $net_deduction['miscellaneous_deduct'] = $net_deduction['total_sub'] = 0;
		$net_deduction['j_v_cpf'] = 0;
		$net_deduction['e_j_v_cpf'] = 0;
		
		$dep_deduction = array();
		$dep_deduction['cpf1'] = $dep_deduction['cpf2'] = $dep_deduction['arrear_cpf'] = $dep_deduction['cpf_loan1'] = $dep_deduction['cpf_loan2'] = $dep_deduction['house_loan'] = $dep_deduction['vehicle_loan'] = $dep_deduction['cpf_interest'] = $dep_deduction['h_interest'] = $dep_deduction['v_interest'] = $dep_deduction['benevolent_fund'] = $dep_deduction['house_rent_deduct'] = $dep_deduction['transport_bill'] = $dep_deduction['personal_vehicle'] = $dep_deduction['group_insurance'] = $dep_deduction['w_s'] = $dep_deduction['fuel'] = $dep_deduction['overdrawn'] = $dep_deduction['phone_bill'] = $dep_deduction['association'] = $dep_deduction['tax'] = $dep_deduction['miscellaneous_deduct'] = $dep_deduction['total_sub'] = 0;
		$dep_deduction['j_v_cpf'] = 0;
		$dep_deduction['e_j_v_cpf'] = 0;
		
		foreach($salaries AS $sal){
			
			$net_deduction['cpf1'] = $net_deduction['cpf1'] + $sal['GeneratedDeduction']['cpf1'];
			$net_deduction['cpf2'] = $net_deduction['cpf2'] + $sal['GeneratedDeduction']['cpf2'];
			$net_deduction['arrear_cpf'] = $net_deduction['arrear_cpf'] + $sal['GeneratedDeduction']['arrear_cpf'];
			$net_deduction['cpf_loan1'] = $net_deduction['cpf_loan1'] + $sal['GeneratedDeduction']['cpf_loan1'];
			$net_deduction['cpf_loan2'] = $net_deduction['cpf_loan2'] + $sal['GeneratedDeduction']['cpf_loan2'];
			$net_deduction['house_loan'] = $net_deduction['house_loan'] + $sal['GeneratedDeduction']['house_loan'];
			$net_deduction['vehicle_loan'] = $net_deduction['vehicle_loan'] + $sal['GeneratedDeduction']['vehicle_loan'];
			$net_deduction['cpf_interest'] = $net_deduction['cpf_interest'] + $sal['GeneratedDeduction']['cpf_interest'];
			$net_deduction['h_interest'] = $net_deduction['h_interest'] + $sal['GeneratedDeduction']['h_interest'];
			$net_deduction['v_interest'] = $net_deduction['v_interest'] + $sal['GeneratedDeduction']['v_interest'];
			$net_deduction['benevolent_fund'] = $net_deduction['benevolent_fund'] + $sal['GeneratedDeduction']['benevolent_fund'];
			$net_deduction['house_rent_deduct'] = $net_deduction['house_rent_deduct'] + $sal['GeneratedDeduction']['house_rent_deduct'];
			$net_deduction['transport_bill'] = $net_deduction['transport_bill'] + $sal['GeneratedDeduction']['transport_bill'];
			$net_deduction['personal_vehicle'] = $net_deduction['personal_vehicle'] + $sal['GeneratedDeduction']['personal_vehicle'];
			$net_deduction['group_insurance'] = $net_deduction['group_insurance'] + $sal['GeneratedDeduction']['group_insurance'];
			$net_deduction['w_s'] = $net_deduction['w_s'] + $sal['GeneratedDeduction']['w_s'];
			$net_deduction['fuel'] = $net_deduction['fuel'] + $sal['GeneratedDeduction']['fuel'];
			$net_deduction['overdrawn'] = $net_deduction['overdrawn'] + $sal['GeneratedDeduction']['overdrawn'];
			$net_deduction['phone_bill'] = $net_deduction['phone_bill'] + $sal['GeneratedDeduction']['phone_bill'];
			$net_deduction['association'] = $net_deduction['association'] + $sal['GeneratedDeduction']['association'];
			$net_deduction['tax'] = $net_deduction['tax'] + $sal['GeneratedDeduction']['tax'];
			$net_deduction['miscellaneous_deduct'] = $net_deduction['miscellaneous_deduct'] + $sal['GeneratedDeduction']['miscellaneous_deduct'];
			$net_deduction['total_sub'] = $net_deduction['total_sub'] + $sal['GeneratedDeduction']['total_sub'];
			
			if($sal['Employee']['status'] == 2){
				$dep_deduction['cpf1'] = $dep_deduction['cpf1'] + $sal['GeneratedDeduction']['cpf1'];
				$dep_deduction['cpf2'] = $dep_deduction['cpf2'] + $sal['GeneratedDeduction']['cpf2'];
				$dep_deduction['arrear_cpf'] = $dep_deduction['arrear_cpf'] + $sal['GeneratedDeduction']['arrear_cpf'];
				$dep_deduction['cpf_loan1'] = $dep_deduction['cpf_loan1'] + $sal['GeneratedDeduction']['cpf_loan1'];
				$dep_deduction['cpf_loan2'] = $dep_deduction['cpf_loan2'] + $sal['GeneratedDeduction']['cpf_loan2'];
				$dep_deduction['house_loan'] = $dep_deduction['house_loan'] + $sal['GeneratedDeduction']['house_loan'];
				$dep_deduction['vehicle_loan'] = $dep_deduction['vehicle_loan'] + $sal['GeneratedDeduction']['vehicle_loan'];
				$dep_deduction['cpf_interest'] = $dep_deduction['cpf_interest'] + $sal['GeneratedDeduction']['cpf_interest'];
				$dep_deduction['h_interest'] = $dep_deduction['h_interest'] + $sal['GeneratedDeduction']['h_interest'];
				$dep_deduction['v_interest'] = $dep_deduction['v_interest'] + $sal['GeneratedDeduction']['v_interest'];
				$dep_deduction['benevolent_fund'] = $dep_deduction['benevolent_fund'] + $sal['GeneratedDeduction']['benevolent_fund'];
				$dep_deduction['house_rent_deduct'] = $dep_deduction['house_rent_deduct'] + $sal['GeneratedDeduction']['house_rent_deduct'];
				$dep_deduction['transport_bill'] = $dep_deduction['transport_bill'] + $sal['GeneratedDeduction']['transport_bill'];
				$dep_deduction['personal_vehicle'] = $dep_deduction['personal_vehicle'] + $sal['GeneratedDeduction']['personal_vehicle'];
				$dep_deduction['group_insurance'] = $dep_deduction['group_insurance'] + $sal['GeneratedDeduction']['group_insurance'];
				$dep_deduction['w_s'] = $dep_deduction['w_s'] + $sal['GeneratedDeduction']['w_s'];
				$dep_deduction['fuel'] = $dep_deduction['fuel'] + $sal['GeneratedDeduction']['fuel'];
				$dep_deduction['overdrawn'] = $dep_deduction['overdrawn'] + $sal['GeneratedDeduction']['overdrawn'];
				$dep_deduction['phone_bill'] = $dep_deduction['phone_bill'] + $sal['GeneratedDeduction']['phone_bill'];
				$dep_deduction['association'] = $dep_deduction['association'] + $sal['GeneratedDeduction']['association'];
				$dep_deduction['tax'] = $dep_deduction['tax'] + $sal['GeneratedDeduction']['tax'];
				$dep_deduction['miscellaneous_deduct'] = $dep_deduction['miscellaneous_deduct'] + $sal['GeneratedDeduction']['miscellaneous_deduct'];
				$dep_deduction['total_sub'] = $dep_deduction['total_sub'] + $sal['GeneratedDeduction']['total_sub'];
			}
			
		}
		
		$net_deduction['j_v_cpf'] = $net_deduction['cpf1'] + $net_deduction['cpf2'] + $net_deduction['arrear_cpf'] + $net_deduction['cpf_loan1'] + $net_deduction['cpf_loan2'] + $net_deduction['cpf_interest'];
		$dep_deduction['j_v_cpf'] = $dep_deduction['cpf1'] + $dep_deduction['cpf2'] + $dep_deduction['arrear_cpf'] + $dep_deduction['cpf_loan1'] + $dep_deduction['cpf_loan2'] + $dep_deduction['cpf_interest'];
		
		$net_deduction['e_j_v_cpf'] = $net_deduction['house_loan'] + $net_deduction['vehicle_loan'] + $net_deduction['h_interest'] + $net_deduction['v_interest'] + $net_deduction['benevolent_fund'] + $net_deduction['house_rent_deduct'] + $net_deduction['transport_bill'] + $net_deduction['personal_vehicle'] + $net_deduction['group_insurance'] + $net_deduction['w_s'] + $net_deduction['fuel'] + $net_deduction['overdrawn'] + $net_deduction['phone_bill'] + $net_deduction['association'] + $net_deduction['tax'] + $net_deduction['miscellaneous_deduct'];
		$dep_deduction['e_j_v_cpf'] = $dep_deduction['house_loan'] + $dep_deduction['vehicle_loan'] + $dep_deduction['h_interest'] + $dep_deduction['v_interest'] + $dep_deduction['benevolent_fund'] + $dep_deduction['house_rent_deduct'] + $dep_deduction['transport_bill'] + $dep_deduction['personal_vehicle'] + $dep_deduction['group_insurance'] + $dep_deduction['w_s'] + $dep_deduction['fuel'] + $dep_deduction['overdrawn'] + $dep_deduction['phone_bill'] + $dep_deduction['association'] + $dep_deduction['tax'] + $dep_deduction['miscellaneous_deduct'];
		
		
		$this->set("curdate",$currentTime);
		$this->set("net_deductions",$net_deduction);
		$this->set("dep_deductions",$dep_deduction);
		$this->set("type",$type);
		
		$_html = $this->_getViewObject()->element('journalvoucherdeputation_pdf');
        $this->create_pdf($_html);
	}
}