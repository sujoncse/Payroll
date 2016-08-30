<?php

/**
 * @Developed By	:	Engr. Rajib Mahmud
 * @Start Date	  	:	2nd Sep 2013
 * @Last Update		:	10th Sep 2013
 * @Copyright     	:  	Bangladesh Agricultural Research Council
 * @Link          	:  	http://www.barc.gov.bd
 * */
App::uses('AppController', 'Controller');

//App::uses('CakePdf', 'CakePdf.Pdf');

class SalaryManagementsController extends AppController {

    public $name = 'SalaryManagements';
    public $uses = array("User", "Employee", "EmployeePersonal", "Validator", "Salary", "Deduction", "PayScale", "Increment", "Promotion", "Charge", "SelectionTime", "Fixation", "Deputation", "Lien", "Prl", "Retirement", "GeneratedSalary", "GeneratedDeduction", "Cpf", "Loan", "Refund", "FestivalAllowance","commonSetting");
    public $layout = "admin";
    var $components = array("RequestHandler", 'Mpdf.Mpdf');

    function beforeFilter() {
        $this->adminCheck();
        $this->myBeforeController();
        Configure::load('constant');
    }

    /**
     * Display admin dashboard
     */
    public function index($type) {
        $this->adminCheck();
        $this->designations($type);
        $this->Salary->bindModel(array('belongsTo' => array(
                'Employee' => array(
                    'className' => 'Employee',
                    'foreignKey' => 'employee_id',
                    'dependent' => true,
        ))));
        $this->Salary->bindModel(array('hasOne' => array(
                'Deduction' => array(
                    'className' => 'Deduction',
                    'foreignKey' => 'salary_id',
                    'dependent' => true
        ))));
        $this->Salary->bindModel(array('hasOne' => array(
                'Charge' => array(
                    'className' => 'Charge',
                    'foreignKey' => 'employee_id',
                    'dependent' => true
        ))));
        $conditions[] = "Employee.status != 0";
        $conditions[] = "Employee.type = $type";
        $salaries = $this->Salary->find("all", array("conditions" => $conditions, "fields" => array("id", "employee_id", "designation_id", "status", "basic", "total_add", "updated", "payable", "Employee.id", "Employee.first_name", "Employee.middle_name", "Employee.last_name", "Deduction.total_sub", "Employee.employee_code", "Employee.status", "Charge.type"), "order" => array("Salary.designation_id ASC", "Employee.employee_code ASC")));
        //pr($salaries);
        //$charges = $this->Charge->find("all",array("conditions"=>"Charge.released IS NULL","fields"=>array("employee_id","type")));
        //$this->set("charges",$charges);
        $this->set('salaries', $salaries);
        $this->set("type", $type);
        //pr($conditions); pr($salaries); 
        $this->Session->delete("Message");
        $settingInfo = $this->Session->read("SETTING_INFO");
        $currentTime = $settingInfo["execution_date"];
        $this->set("currentTime", $currentTime);
    }

    function dataCheck($data, $fn) {
        //$this->loadModel('Validation');
        $errors = NULL;
        if ($fn == 1) {
            //pr($data);
            //$data["Salary"]['basic'] = addslashes($data["Salary"]['basic'] ? trim($data["Salary"]['basic']) : null);
            $data["Salary"]['house_rent'] = addslashes($data["Salary"]['house_rent'] ? trim($data["Salary"]['house_rent']) : null);
            $data["Salary"]['medical'] = addslashes($data["Salary"]['medical'] ? trim($data["Salary"]['medical']) : null);
            $data["Salary"]['pp'] = addslashes($data["Salary"]['pp'] ? trim($data["Salary"]['pp']) : null);
            $data["Salary"]['edu'] = addslashes($data["Salary"]['edu'] ? trim($data["Salary"]['edu']) : null);
            $data["Salary"]['charge'] = addslashes($data["Salary"]['charge'] ? trim($data["Salary"]['charge']) : null);
            $data["Salary"]['dearness'] = addslashes($data["Salary"]['dearness'] ? trim($data["Salary"]['dearness']) : null);
            $data["Salary"]['conveyance'] = addslashes($data["Salary"]['conveyance'] ? trim($data["Salary"]['conveyance']) : null);
            $data["Salary"]['tiffin'] = addslashes($data["Salary"]['tiffin'] ? trim($data["Salary"]['tiffin']) : null);
            $data["Salary"]['washing'] = addslashes($data["Salary"]['washing'] ? trim($data["Salary"]['washing']) : null);
            $data["Salary"]['deputation'] = addslashes($data["Salary"]['deputation'] ? trim($data["Salary"]['deputation']) : null);
            $data["Salary"]['aid'] = addslashes($data["Salary"]['aid'] ? trim($data["Salary"]['aid']) : null);
            $data["Salary"]['sumptuary'] = addslashes($data["Salary"]['sumptuary'] ? trim($data["Salary"]['sumptuary']) : null);
            $data["Salary"]['arrear'] = addslashes($data["Salary"]['arrear'] ? trim($data["Salary"]['arrear']) : null);
            $data["Salary"]['miscellaneous'] = addslashes($data["Salary"]['miscellaneous'] ? trim($data["Salary"]['miscellaneous']) : null);
            $data["Salary"]['fraction_increment'] = addslashes($data["Salary"]['fraction_increment'] ? trim($data["Salary"]['fraction_increment']) : null);
            $data["Deduction"]['cpf1'] = addslashes($data["Deduction"]['cpf1'] ? trim($data["Deduction"]['cpf1']) : null);
            $data["Deduction"]['cpf2'] = addslashes($data["Deduction"]['cpf2'] ? trim($data["Deduction"]['cpf2']) : null);
            $data["Deduction"]['arrear_cpf'] = addslashes($data["Deduction"]['arrear_cpf'] ? trim($data["Deduction"]['arrear_cpf']) : null);
            $data["Deduction"]['cpf_loan1'] = addslashes($data["Deduction"]['cpf_loan1'] ? trim($data["Deduction"]['cpf_loan1']) : null);
            $data["Deduction"]['cpf_loan2'] = addslashes($data["Deduction"]['cpf_loan2'] ? trim($data["Deduction"]['cpf_loan2']) : null);
            $data["Deduction"]['house_loan'] = addslashes($data["Deduction"]['house_loan'] ? trim($data["Deduction"]['house_loan']) : null);
            $data["Deduction"]['vehicle_loan'] = addslashes($data["Deduction"]['vehicle_loan'] ? trim($data["Deduction"]['vehicle_loan']) : null);
            $data["Deduction"]['cpf_interest'] = addslashes($data["Deduction"]['cpf_interest'] ? trim($data["Deduction"]['cpf_interest']) : null);
            $data["Deduction"]['h_interest'] = addslashes($data["Deduction"]['h_interest'] ? trim($data["Deduction"]['h_interest']) : null);
            $data["Deduction"]['v_interest'] = addslashes($data["Deduction"]['v_interest'] ? trim($data["Deduction"]['v_interest']) : null);
            $data["Deduction"]['benevolent_fund'] = addslashes($data["Deduction"]['benevolent_fund'] ? trim($data["Deduction"]['benevolent_fund']) : null);
            $data["Deduction"]['transport_bill'] = addslashes($data["Deduction"]['transport_bill'] ? trim($data["Deduction"]['transport_bill']) : null);
            $data["Deduction"]['personal_vehicle'] = addslashes($data["Deduction"]['personal_vehicle'] ? trim($data["Deduction"]['personal_vehicle']) : null);
            $data["Deduction"]['group_insurance'] = addslashes($data["Deduction"]['group_insurance'] ? trim($data["Deduction"]['group_insurance']) : null);
            $data["Deduction"]['w_s'] = addslashes($data["Deduction"]['w_s'] ? trim($data["Deduction"]['w_s']) : null);
            $data["Deduction"]['fuel'] = addslashes($data["Deduction"]['fuel'] ? trim($data["Deduction"]['fuel']) : null);
            $data["Deduction"]['overdrawn'] = addslashes($data["Deduction"]['overdrawn'] ? trim($data["Deduction"]['overdrawn']) : null);
            $data["Deduction"]['phone_bill'] = addslashes($data["Deduction"]['phone_bill'] ? trim($data["Deduction"]['phone_bill']) : null);
            $data["Deduction"]['association'] = addslashes($data["Deduction"]['association'] ? trim($data["Deduction"]['association']) : null);
            $data["Deduction"]['tax'] = addslashes($data["Deduction"]['tax'] ? trim($data["Deduction"]['tax']) : null);
            $data["Deduction"]['miscellaneous_deduct'] = addslashes($data["Deduction"]['miscellaneous_deduct'] ? trim($data["Deduction"]['miscellaneous_deduct']) : null);
            //$data['emp_id'] = addslashes($data['emp_id'] ? trim($data['emp_id']) : null);
            $this->Salary->set($data);
            $this->Salary->validate = array(
                'designation_id' => array(
                    'notEmpty' => array(
                        'rule' => 'notEmpty',
                        'required' => true,
                        'message' => 'Input Required.'
                    )
                ),
                'employee_id' => array(
                    'notEmpty' => array(
                        'rule' => 'notEmpty',
                        'required' => true,
                        'message' => 'Input Required.'
                    ),
                    'isUnique' => array(
                        'rule' => "isUnique",
                        'required' => true,
                        'message' => 'Same employee inserted.'
                    )
                ),
                /* 'basic' => array(
                  'notEmpty' => array(
                  'rule'     => 'notEmpty',
                  'required' => true,
                  'message'  => 'Input Required.'
                  ),
                  'numeric' => array(
                  'rule'     => 'numeric',
                  'required' => true,
                  'message'  => 'Invalid input.'
                  ),
                  'range' => array(
                  'rule'    => array('range', 2500, 40000),
                  'required' => true,
                  'message'  => 'Out of range.'
                  )
                  ), */
                'house_rent' => array(
                    'notEmpty' => array(
                        'rule' => 'notEmpty',
                        'required' => true,
                        'message' => 'Input Required.'
                    ),
                    'numeric' => array(
                        'rule' => 'numeric',
                        'required' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                /*'medical' => array(
                    'notEmpty' => array(
                        'rule' => 'notEmpty',
                        'required' => true,
                        'message' => 'Input Required.'
                    ),
                    'numeric' => array(
                        'rule' => 'numeric',
                        'required' => true,
                        'message' => 'Invalid input.'
                    ),
                    'equalToCheck' => array(
                        'rule' => array('equalTo', '700'),
                        'required' => true,
                        'message' => 'Input does not matched.'
                    ),
                ),*/
                'pp' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    ),
                    'equalTo' => array(
                        'rule' => array('equalTo', $data["Salary"]["pp"], $this->boundaryCheck($data["Salary"]["pp"], "pp")),
                        'allowEmpty' => true,
                        'message' => 'Out of range.'
                    )
                ),
                'edu' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'charge' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'dearness' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                /*'conveyance' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'tiffin' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),*/
                'washing' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'deputation' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'aid' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'sumptuary' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    ),
                /* 'equalToCheck' => array(
                  'rule'    => array("equalTo",$data["Salary"]["sumptuary"],$this->equalToCheck($data["Salary"]["sumptuary"],array("1000","900","600"))),
                  'allowEmpty' => true,
                  'message'  => 'Input does not matched.'
                  ) */
                ),
                'arrear' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'miscellaneous' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'fraction_increment' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                )
            );

            if ($data["Employee"]["grade"] > 3)
                $this->Salary->validator()->remove('sumptuary');
            if ($data["EmployeePersonal"]["house_rent"] == 0)
                $this->Salary->validator()->remove('house_rent');
            if (empty($data["Salary"]["pp"]))
                $this->Salary->validator()->remove('pp');
            if (!$this->Salary->validates()) {
                $errors = $this->Salary->validationErrors;
                $this->set("errors", $errors);
            }

            $this->Deduction->set($data);
            $this->Deduction->validate = array(
                'cpf1' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'required' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'cpf2' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'arrear_cpf' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'cpf_loan1' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'cpf_loan2' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                /*  'house_loan' => array(
                  'numeric' => array(
                  'rule'     => 'numeric',
                  'allowEmpty' => true,
                  'message'  => 'Invalid input.'
                  ),
                  'range' => array(
                  'rule'    => array('equalTo', $data["Deduction"]["house_loan"], $this->boundaryCheck($data["Deduction"]["house_loan"],"house_loan",$data["Salary"]["employee_id"])),
                  'allowEmpty' => true,
                  'message'  => 'Out of range.'
                  )
                  ), */
                'vehicle_loan' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'cpf_interest' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'house_rent_deduct' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'transport_bill' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'personal_vehicle' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                /*  'group_insurance' => array(
                  'numeric' => array(
                  'rule'     => 'numeric',
                  'allowEmpty' => true,
                  'message'  => 'Invalid input.'
                  ),
                  'equalToCheck' => array(
                  'rule'    => array('equalTo', "15"),
                  'allowEmpty' => true,
                  'message'  => 'Input does not matched.'
                  )
                  ),
                  'w_s' => array(
                  'numeric' => array(
                  'rule'     => 'numeric',
                  'allowEmpty' => true,
                  'message'  => 'Invalid input.'
                  ),
                  'equalToCheck' => array(
                  'rule'    => array('equalTo', "20"),
                  'allowEmpty' => true,
                  'message'  => 'Input does not matched.'
                  )
                  ), */
                'fuel' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'overdrawn' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'phone_bill' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'association' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'tax' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'miscellaneous_deduct' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
            );

            if (!$this->Deduction->validates()) {
                $errors = $this->Deduction->validationErrors;
                $this->set("errors", $errors);
            }
        } elseif ($fn == 2) {
            //pr($data); die();
            //$data["Salary"]['basic'] = addslashes($data["Salary"]['basic'] ? trim($data["Salary"]['basic']) : null);
            $data["Salary"]['house_rent'] = addslashes($data["Salary"]['house_rent'] ? trim($data["Salary"]['house_rent']) : null);
            $data["Salary"]['medical'] = addslashes($data["Salary"]['medical'] ? trim($data["Salary"]['medical']) : null);
            $data["Salary"]['pp'] = addslashes($data["Salary"]['pp'] ? trim($data["Salary"]['pp']) : null);
            $data["Salary"]['edu'] = addslashes($data["Salary"]['edu'] ? trim($data["Salary"]['edu']) : null);
            $data["Salary"]['charge'] = addslashes($data["Salary"]['charge'] ? trim($data["Salary"]['charge']) : null);
            $data["Salary"]['dearness'] = addslashes($data["Salary"]['dearness'] ? trim($data["Salary"]['dearness']) : null);
            $data["Salary"]['conveyance'] = addslashes($data["Salary"]['conveyance'] ? trim($data["Salary"]['conveyance']) : null);
            $data["Salary"]['tiffin'] = addslashes($data["Salary"]['tiffin'] ? trim($data["Salary"]['tiffin']) : null);
            $data["Salary"]['washing'] = addslashes($data["Salary"]['washing'] ? trim($data["Salary"]['washing']) : null);
            $data["Salary"]['deputation'] = addslashes($data["Salary"]['deputation'] ? trim($data["Salary"]['deputation']) : null);
            $data["Salary"]['aid'] = addslashes($data["Salary"]['aid'] ? trim($data["Salary"]['aid']) : null);
            $data["Salary"]['sumptuary'] = addslashes($data["Salary"]['sumptuary'] ? trim($data["Salary"]['sumptuary']) : null);
            $data["Salary"]['arrear'] = addslashes($data["Salary"]['arrear'] ? trim($data["Salary"]['arrear']) : null);
            $data["Salary"]['miscellaneous'] = addslashes($data["Salary"]['miscellaneous'] ? trim($data["Salary"]['miscellaneous']) : null);
            $data["Salary"]['fraction_increment'] = addslashes($data["Salary"]['fraction_increment'] ? trim($data["Salary"]['fraction_increment']) : null);
            $data["Deduction"]['cpf1'] = addslashes($data["Deduction"]['cpf1'] ? trim($data["Deduction"]['cpf1']) : null);
            $data["Deduction"]['cpf2'] = addslashes($data["Deduction"]['cpf2'] ? trim($data["Deduction"]['cpf2']) : null);
            $data["Deduction"]['arrear_cpf'] = addslashes($data["Deduction"]['arrear_cpf'] ? trim($data["Deduction"]['arrear_cpf']) : null);
            $data["Deduction"]['cpf_loan1'] = addslashes($data["Deduction"]['cpf_loan1'] ? trim($data["Deduction"]['cpf_loan1']) : null);
            $data["Deduction"]['cpf_loan2'] = addslashes($data["Deduction"]['cpf_loan2'] ? trim($data["Deduction"]['cpf_loan2']) : null);
            $data["Deduction"]['house_loan'] = addslashes($data["Deduction"]['house_loan'] ? trim($data["Deduction"]['house_loan']) : null);
            $data["Deduction"]['vehicle_loan'] = addslashes($data["Deduction"]['vehicle_loan'] ? trim($data["Deduction"]['vehicle_loan']) : null);
            $data["Deduction"]['cpf_interest'] = addslashes($data["Deduction"]['cpf_interest'] ? trim($data["Deduction"]['cpf_interest']) : null);
            $data["Deduction"]['h_interest'] = addslashes($data["Deduction"]['h_interest'] ? trim($data["Deduction"]['h_interest']) : null);
            $data["Deduction"]['v_interest'] = addslashes($data["Deduction"]['v_interest'] ? trim($data["Deduction"]['v_interest']) : null);
            $data["Deduction"]['benevolent_fund'] = addslashes($data["Deduction"]['benevolent_fund'] ? trim($data["Deduction"]['benevolent_fund']) : null);
            $data["Deduction"]['transport_bill'] = addslashes($data["Deduction"]['transport_bill'] ? trim($data["Deduction"]['transport_bill']) : null);
            $data["Deduction"]['personal_vehicle'] = addslashes($data["Deduction"]['personal_vehicle'] ? trim($data["Deduction"]['personal_vehicle']) : null);
            $data["Deduction"]['group_insurance'] = addslashes($data["Deduction"]['group_insurance'] ? trim($data["Deduction"]['group_insurance']) : null);
            $data["Deduction"]['w_s'] = addslashes($data["Deduction"]['w_s'] ? trim($data["Deduction"]['w_s']) : null);
            $data["Deduction"]['fuel'] = addslashes($data["Deduction"]['fuel'] ? trim($data["Deduction"]['fuel']) : null);
            $data["Deduction"]['overdrawn'] = addslashes($data["Deduction"]['overdrawn'] ? trim($data["Deduction"]['overdrawn']) : null);
            $data["Deduction"]['phone_bill'] = addslashes($data["Deduction"]['phone_bill'] ? trim($data["Deduction"]['phone_bill']) : null);
            $data["Deduction"]['association'] = addslashes($data["Deduction"]['association'] ? trim($data["Deduction"]['association']) : null);
            $data["Deduction"]['tax'] = addslashes($data["Deduction"]['tax'] ? trim($data["Deduction"]['tax']) : null);
            $data["Deduction"]['miscellaneous_deduct'] = addslashes($data["Deduction"]['miscellaneous_deduct'] ? trim($data["Deduction"]['miscellaneous_deduct']) : null);
            //$data['emp_id'] = addslashes($data['emp_id'] ? trim($data['emp_id']) : null);
            $this->Salary->set($data);
            $this->Salary->validate = array(
                /* 'designation_id' => array(
                  'notEmpty' => array(
                  'rule'     => 'notEmpty',
                  'required' => true,
                  'message'  => 'Input Required.'
                  )
                  ),
                  'employee_id' => array(
                  'notEmpty' => array(
                  'rule'     => 'notEmpty',
                  'required' => true,
                  'message'  => 'Input Required.'
                  ),
                  'isUnique' => array(
                  'rule'    => "isUnique",
                  'required' => true,
                  'message'  => 'Same employee inserted.'
                  )
                  ),
                  'basic' => array(
                  'notEmpty' => array(
                  'rule'     => 'notEmpty',
                  'required' => true,
                  'message'  => 'Input Required.'
                  ),
                  'numeric' => array(
                  'rule'     => 'numeric',
                  'required' => true,
                  'message'  => 'Invalid input.'
                  ),
                  'range' => array(
                  'rule'    => array('range', 2500, 40000),
                  'required' => true,
                  'message'  => 'Out of range.'
                  )
                  ), */
                'house_rent' => array(
                    'notEmpty' => array(
                        'rule' => 'notEmpty',
                        'required' => true,
                        'message' => 'Input Required.'
                    ),
                    'numeric' => array(
                        'rule' => 'numeric',
                        'required' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                /*'medical' => array(
                    'notEmpty' => array(
                        'rule' => 'notEmpty',
                        'required' => true,
                        'message' => 'Input Required.'
                    ),
                    'numeric' => array(
                        'rule' => 'numeric',
                        'required' => true,
                        'message' => 'Invalid input.'
                    ),
                    'equalToCheck' => array(
                        'rule' => array('equalTo', '700'),
                        'required' => true,
                        'message' => 'Input does not matched.'
                    ),
                ),*/
                'pp' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    ),
                    'range' => array(
                        'rule' => array('equalTo', $data["Salary"]["pp"], $this->boundaryCheck($data["Salary"]["pp"], "pp")),
                        'allowEmpty' => true,
                        'message' => 'Out of range.'
                    )
                ),
                'edu' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'charge' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'dearness' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                /*'conveyance' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    ),
                    'equalToCheck' => array(
                        'rule' => array('equalTo', "150"),
                        'allowEmpty' => true,
                        'message' => 'Input does not matched.'
                    )
                ),
                'tiffin' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    ),
                    'equalTo' => array(
                        'rule' => array('equalTo', "150"),
                        'allowEmpty' => true,
                        'message' => 'Input does not matched.'
                    )
                ),*/
                'washing' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'deputation' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    ),
                    'equalToCheck' => array(
                        'rule' => array("equalTo", $data["Salary"]["deputation"], $this->equalToCheck($data["Salary"]["deputation"], array("6700", "8000"))),
                        'allowEmpty' => true,
                        'message' => 'Input does not matched.'
                    )
                ),
                'aid' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    ),
                    'equalTo' => array(
                        'rule' => array('equalTo', "1300"),
                        'allowEmpty' => true,
                        'message' => 'Input does not matched.'
                    )
                ),
                'sumptuary' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    ),
                /* 'equalToCheck' => array(
                  'rule'    => array("equalTo",$data["Salary"]["sumptuary"],$this->equalToCheck($data["Salary"]["sumptuary"],array("1000","900","600"))),
                  'allowEmpty' => true,
                  'message'  => 'Input does not matched.'
                  ) */
                ),
                'arrear' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'miscellaneous' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'fraction_increment' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                )
            );
            if ($data["Employee"]["grade"] > 3)
                $this->Salary->validator()->remove('sumptuary');
            if ($data["EmployeePersonal"]["house_rent"] == 0)
                $this->Salary->validator()->remove('house_rent');
            if (empty($data["Salary"]["pp"]))
                $this->Salary->validator()->remove('pp');
            if (!$this->Salary->validates()) {
                $errors = $this->Salary->validationErrors;
                $this->set("errors", $errors);
            }
            //pr($data); die();
            $this->Deduction->set($data);
            $this->Deduction->validate = array(
                'cpf1' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'required' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'cpf2' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'arrear_cpf' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'cpf_loan1' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'cpf_loan2' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                /* 'house_loan' => array(
                  'numeric' => array(
                  'rule'     => 'numeric',
                  'allowEmpty' => true,
                  'message'  => 'Invalid input.'
                  ),
                  'range' => array(
                  'rule'    => array('equalTo', $data["Deduction"]["house_loan"], $this->boundaryCheck($data["Deduction"]["house_loan"],"house_loan",$data["Salary"]["employee_id"])),
                  'allowEmpty' => true,
                  'message'  => 'Out of range.'
                  )
                  ), */
                'vehicle_loan' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'cpf_interest' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'house_rent_deduct' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'transport_bill' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'personal_vehicle' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                /*  'group_insurance' => array(
                  'numeric' => array(
                  'rule'     => 'numeric',
                  'allowEmpty' => true,
                  'message'  => 'Invalid input.'
                  ),
                  'equalTo' => array(
                  'rule'    => array('equalTo', "15"),
                  'allowEmpty' => true,
                  'message'  => 'Input does not matched.'
                  )
                  ),
                  'w_s' => array(
                  'numeric' => array(
                  'rule'     => 'numeric',
                  'allowEmpty' => true,
                  'message'  => 'Invalid input.'
                  ),
                  'equalTo' => array(
                  'rule'    => array('equalTo', "20"),
                  'allowEmpty' => true,
                  'message'  => 'Input does not matched.'
                  )
                  ), */
                'fuel' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'overdrawn' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'phone_bill' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'association' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'tax' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
                'miscellaneous_deduct' => array(
                    'numeric' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Invalid input.'
                    )
                ),
            );

            if (!$this->Deduction->validates()) {
                $errors = $this->Deduction->validationErrors;
                $this->set("errors", $errors);
            }
        } elseif ($fn == 3) {
            if (empty($data["employee_id"]) AND ! empty($data["Fixation"]["employee_id"]))
                $data["employee_id"] = $data["Fixation"]["employee_id"];
            else
                $data["Fixation"]["employee_id"] = $data["employee_id"];
            $this->Fixation->set($data);
            if (!empty($data["employee_id"]) OR ! empty($data["Fixation"]["employee_id"]))
                $val = $this->changeCheck($data);
            else
                $val = NULL;

            if (empty($data["Fixation"]["job_status"]) AND ! empty($data["job_status"]))
                $data["Fixation"]["job_status"] = $data["job_status"];
            if (!empty($data["Fixation"]["job_status"])) {
                if ($data["Fixation"]["job_status"] == 2) {
                    $this->Fixation->validate = array(
                        'job_status' => array(
                            'numeric' => array(
                                'rule' => 'numeric',
                                'allowEmpty' => true,
                                'message' => 'Invalid input.'
                            )
                        ),
                        'execution_date' => array(
                            'notEmpty' => array(
                                'rule' => 'notEmpty',
                                'required' => true,
                                'message' => 'Input Required.'
                            ),
                            'date' => array(
                                'rule' => array('date', 'dmy'),
                                'required' => true,
                                'message' => 'Invalid date input. Please give (DD-MM-YYYY) format.'
                            ),
                            'equalTo' => array(
                                'rule' => array("equalTo", $val),
                                'required' => true,
                                'message' => 'Invalid increment date. Please input between last increment date and today.'
                            )
                        ),
                        'employee_id' => array(
                            'notEmpty' => array(
                                'rule' => 'notEmpty',
                                'required' => true,
                                'message' => 'Data required.'
                            )
                        )
                    );

                    if (!$this->Fixation->validates()) {
                        $errors = $this->Fixation->validationErrors;
                        $this->set("errors", $errors);
                    }
                } elseif ($data["Fixation"]["job_status"] == 1) {
                    //$data["Fixation"]["new_designation_id"] = $data["new_designation_id"];
                    $this->Fixation->validate = array(
                        'job_status' => array(
                            'numeric' => array(
                                'rule' => 'numeric',
                                'allowEmpty' => true,
                                'message' => 'Invalid input.'
                            )
                        ),
                        'execution_date' => array(
                            'notEmpty' => array(
                                'rule' => 'notEmpty',
                                'required' => true,
                                'message' => 'Input Required.'
                            ),
                            'date' => array(
                                'rule' => array('date', 'dmy'),
                                'required' => true,
                                'message' => 'Invalid date input. Please give (DD-MM-YYYY) format.'
                            ),
                            'equalTo' => array(
                                'rule' => array("equalTo", $val),
                                'required' => true,
                                'message' => 'Invalid increment date. Please input between last increment date and today.'
                            )
                        ),
                        'employee_id' => array(
                            'notEmpty' => array(
                                'rule' => 'notEmpty',
                                'required' => true,
                                'message' => 'Data required.'
                            )
                        ),
                        'designation_id' => array(
                            'notEmpty' => array(
                                'rule' => 'notEmpty',
                                'required' => true,
                                'message' => 'Data required.'
                            )
                        )
                    );

                    if (!$this->Fixation->validates()) {
                        $errors = $this->Fixation->validationErrors;
                        $this->set("errors", $errors);
                    }
                } elseif ($data["Fixation"]["job_status"] == 3 OR $data["Fixation"]["job_status"] == 4) {
                    //pr($data); die();
                    $this->Fixation->validate = array(
                        'job_status' => array(
                            'numeric' => array(
                                'rule' => 'numeric',
                                'allowEmpty' => true,
                                'message' => 'Invalid input.'
                            )
                        ),
                        'execution_date' => array(
                            'notEmpty' => array(
                                'rule' => 'notEmpty',
                                'required' => true,
                                'message' => 'Input Required.'
                            ),
                            'date' => array(
                                'rule' => array('date', 'dmy'),
                                'required' => true,
                                'message' => 'Invalid date input. Please give (DD-MM-YYYY) format.'
                            ),
                            'equalTo' => array(
                                'rule' => array("equalTo", $val),
                                'required' => true,
                                'message' => 'Invalid execution date. Please input between charge taken date and today.'
                            )
                        ),
                        'employee_id' => array(
                            'notEmpty' => array(
                                'rule' => 'notEmpty',
                                'required' => true,
                                'message' => 'Data required.'
                            )
                        ),
                        'designation_id' => array(
                            'notEmpty' => array(
                                'rule' => 'notEmpty',
                                'required' => true,
                                'message' => 'Data required.'
                            )
                        )
                    );

                    if (!$this->Fixation->validates()) {
                        $errors = $this->Fixation->validationErrors;
                        $this->set("errors", $errors);
                    }
                } elseif ($data["Fixation"]["job_status"] == 5 OR $data["Fixation"]["job_status"] == 6) {
                    $this->Fixation->validate = array(
                        'job_status' => array(
                            'numeric' => array(
                                'rule' => 'numeric',
                                'allowEmpty' => true,
                                'message' => 'Invalid input.'
                            )
                        ),
                        'execution_date' => array(
                            'notEmpty' => array(
                                'rule' => 'notEmpty',
                                'required' => true,
                                'message' => 'Input Required.'
                            ),
                            'date' => array(
                                'rule' => array('date', 'dmy'),
                                'required' => true,
                                'message' => 'Invalid date input. Please give (DD-MM-YYYY) format.'
                            ),
                            'equalTo' => array(
                                'rule' => array("equalTo", $val),
                                'required' => true,
                                'message' => 'Invalid increment date. Please input between last increment date and today.'
                            )
                        ),
                        'employee_id' => array(
                            'notEmpty' => array(
                                'rule' => 'notEmpty',
                                'required' => true,
                                'message' => 'Data required.'
                            ),
                            'equalTo' => array(
                                'rule' => array("equalTo", $this->elegibilityCheck($data["employee_id"], $data["Fixation"]["service_status"], $data["Fixation"]["job_status"])),
                                'required' => true,
                                'message' => 'Not elegible.'
                            )
                        ),
                    );

                    if (!$this->Fixation->validates()) {
                        $errors = $this->Fixation->validationErrors;
                        $this->set("errors", $errors);
                    }
                } elseif ($data["Fixation"]["job_status"] == 0) {
                    $this->Fixation->validate = array(
                        'job_status' => array(
                            'numeric' => array(
                                'rule' => 'numeric',
                                'allowEmpty' => true,
                                'message' => 'Invalid input.'
                            )
                        ),
                        'execution_date' => array(
                            'notEmpty' => array(
                                'rule' => 'notEmpty',
                                'required' => true,
                                'message' => 'Input Required.'
                            ),
                            'date' => array(
                                'rule' => array('date', 'dmy'),
                                'required' => true,
                                'message' => 'Invalid date input. Please give (DD-MM-YYYY) format.'
                            ),
                            'equalTo' => array(
                                'rule' => array("equalTo", $val),
                                'required' => true,
                                'message' => 'Invalid increment date. Please input between last increment date and today.'
                            )
                        ),
                        'employee_id' => array(
                            'notEmpty' => array(
                                'rule' => 'notEmpty',
                                'required' => true,
                                'message' => 'Data required.'
                            ),
                            'equalTo' => array(
                                'rule' => array("equalTo", $this->elegibilityCheck($data["employee_id"], $data["Fixation"]["service_status"], $data["Fixation"]["job_status"])),
                                'required' => true,
                                'message' => 'Not elegible.'
                            )
                        ),
                    );

                    if (!$this->Fixation->validates()) {
                        $errors = $this->Fixation->validationErrors;
                        $this->set("errors", $errors);
                    }
                }
            } elseif (empty($data["Fixation"]["job_status"]) AND $data["Fixation"]["service_status"] == 2) {
                $this->Fixation->validate = array(
                    'execution_date' => array(
                        'notEmpty' => array(
                            'rule' => 'notEmpty',
                            'required' => true,
                            'message' => 'Input Required.'
                        ),
                        'date' => array(
                            'rule' => array('date', 'dmy'),
                            'required' => true,
                            'message' => 'Invalid date input. Please give (DD-MM-YYYY) format.'
                        ),
                        'equalTo' => array(
                            'rule' => array("equalTo", $val),
                            'required' => true,
                            'message' => 'Invalid increment date. Please input between last increment date and today.'
                        )
                    ),
                    'organization' => array(
                        'notEmpty' => array(
                            'rule' => 'notEmpty',
                            'required' => true,
                            'message' => 'Input Required.'
                        )
                    ),
                    'employee_id' => array(
                        'notEmpty' => array(
                            'rule' => 'notEmpty',
                            'required' => true,
                            'message' => 'Data required.'
                        ),
                        'equalTo' => array(
                            'rule' => array("equalTo", $this->elegibilityCheck($data["employee_id"], $data["Fixation"]["service_status"])),
                            'required' => true,
                            'message' => 'Not elegible.'
                        )
                    ),
                );

                if (!$this->Fixation->validates()) {
                    $errors = $this->Fixation->validationErrors;
                    $this->set("errors", $errors);
                }
            }
        }
        //pr($errors); pr($data);  die();
        return $errors;
    }

    function equalToCheck($check, $comparedTo) {
        foreach ($comparedTo as $key) {
            if ($check === $key)
                return $check;
            else
                return false;
        }
    }

    function boundaryCheck($val, $field, $empId = NULL) {
        //pr($val); pr($field); pr($empId); die();
        if ($field == "pp" AND ! empty($val) AND $val < 0 AND $val > 40000) {
            return $val;
        } elseif ($field == "house_loan" and ! empty($val)) {
            $emp = $this->Salary->find("first", array("conditions" => "Salary.employee_id = $empId", "fields" => "basic"));
            if ($val <= ($emp["Salary"]["basic"] * 24))
                return $val;
            else
                return FALSE;
        } else
            return FALSE;
    }

    function elegibilityCheck($empId, $serviceStatus, $jobStatus = NULL) {
        if ($jobStatus == 5) {
            $this->Employee->bindModel(array('hasOne' => array(
                    'SelectionTime' => array(
                        'className' => 'SelectionTime',
                        'foreignKey' => 'employee_id',
                        'conditions' => array('SelectionTime.status' => "1"),
                        'dependent' => true,
            ))));
            $employee = $this->Employee->find("first", array("conditions" => "Employee.id = $empId", "fields" => array("grade", "SelectionTime.id")));
            $grade = $employee["Employee"]["grade"];
            if (empty($employee["SelectionTime"]) AND $grade == 16 OR $grade == 13 OR $grade == 10 OR $grade == 9 OR $grade == 6 OR $grade == 5)
                return $empId;
            else
                return 0;
        }elseif ($jobStatus == 6) {
            $employee = $this->Employee->find("first", array("conditions" => "Employee.id = $empId", "fields" => array("grade")));
            $selectionTime = $this->SelectionTime->find("count", array("conditions" => "SelectionTime.employee_id = $empId AND SelectionTime.status = 2"));
            //pr($employee); pr($selectionTime); die();
            $grade = $employee["Employee"]["grade"];
            if ($selectionTime < 2 AND $grade != 1 AND $grade < 11)
                return $empId;
            elseif ($selectionTime < 3 AND $grade >= 11)
                return $empId;
            else
                return 0;
        }elseif ($jobStatus == 0) {
            return $empId;
        } elseif (empty($jobStatus) AND $serviceStatus == 2) {
            $this->Employee->bindModel(array('hasOne' => array(
                    'Deputation' => array(
                        'className' => 'Deputation',
                        'foreignKey' => 'employee_id',
                        'conditions' => array('Deputation.status' => "1"),
                        'dependent' => true,
            ))));
            $employee = $this->Employee->find("first", array("conditions" => "Employee.id = $empId", "fields" => array("grade", "Deputation.id")));
            $grade = $employee["Employee"]["grade"];
            if (empty($employee["Deputation"]) AND $grade <= 5)
                return $empId;
            else
                return 0;
        }
    }

    function changeCheck($data) {
        if (empty($data["employee_id"]) AND ! empty($data["Fixation"]["employee_id"]))
            $data["employee_id"] = $data["Fixation"]["employee_id"];
        if (empty($data["Fixation"]["job_status"]) AND ! empty($data["job_status"]))
            $data["Fixation"]["job_status"] = $data["job_status"];
        if (!empty($data["Fixation"]["job_status"])) {
            if ($data["Fixation"]["job_status"] == 2) {
                $date = explode('-', $data["Fixation"]["execution_date"]);
                $incrementDate = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
                $conditions[] = "Increment.employee_id = " . $data["employee_id"];
                $increment = $this->Increment->find("first", array("conditions" => $conditions, "fields" => "increment_date", "order" => "Increment.created DESC"));
                $currentTime = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                //pr($conditions); pr($increment); pr($incrementDate); pr($currentTime);
                if (!empty($increment) AND $incrementDate <= $currentTime AND $incrementDate > $increment["Increment"]["increment_date"]) {
                    return $data["Fixation"]["execution_date"];
                } elseif (empty($increment) AND $incrementDate <= $currentTime) {
                    return $data["Fixation"]["execution_date"];
                } else {
                    return 0;
                }
            } elseif ($data["Fixation"]["job_status"] == 1) {
                $date = explode('-', $data["Fixation"]["execution_date"]);
                $promotionDate = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
                $conditions[] = "Promotion.employee_id = " . $data["employee_id"];
                $promotion = $this->Promotion->find("first", array("conditions" => $conditions, "fields" => "promotion_date", "order" => "Promotion.created DESC"));
                $currentTime = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                //pr($conditions); pr($increment); pr($incrementDate); pr($currentTime);
                if (!empty($promotion) AND $promotionDate <= $currentTime AND $promotionDate > $promotion["Promotion"]["promotion_date"]) {
                    return $data["Fixation"]["execution_date"];
                } elseif (empty($promotion) AND $promotionDate <= $currentTime) {
                    return $data["Fixation"]["execution_date"];
                } else {
                    return 0;
                }
            } elseif ($data["Fixation"]["job_status"] == 3 OR $data["Fixation"]["job_status"] == 4) {
                $date = explode('-', $data["Fixation"]["execution_date"]);
                $chargedDate = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
                if (empty($data["activeStatus"])) {
                    $conditions[] = "Charge.employee_id = " . $data["employee_id"];
                    $conditions[] = "Charge.charged_grade = " . $data["Fixation"]["grade"];
                    $conditions[] = "Charge.charged_designation = " . $data["new_designation_id"];
                    $charge = $this->Charge->find("first", array("conditions" => $conditions, "fields" => array("taken", "released"), "order" => "Charge.created DESC"));
                } else {
                    $charge = NULL;
                }
                $currentTime = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                //pr($data); echo "current:".date("d-m-Y",$currentTime); pr($charge); echo "charged:".date("d-m-Y",$chargedDate); echo "</br/>taken".date("d-m-Y",$charge["Charge"]["taken"]); die();
                if (!empty($charge) AND $chargedDate <= $currentTime AND $chargedDate > $charge["Charge"]["taken"]) {
                    return $data["Fixation"]["execution_date"];
                } elseif (empty($charge) AND $chargedDate <= $currentTime) {
                    return $data["Fixation"]["execution_date"];
                } else {
                    return 0;
                }
            } elseif ($data["Fixation"]["job_status"] == 5 OR $data["Fixation"]["job_status"] == 6) {
                // officer or staff
                $date = explode('-', $data["Fixation"]["execution_date"]);
                $executionDate = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
                $conditions[] = "SelectionTime.employee_id = " . $data["employee_id"];
                if ($data["Fixation"]["job_status"] == 5)
                    $conditions[] = "SelectionTime.status = 1";
                elseif ($data["Fixation"]["job_status"] == 5)
                    $conditions[] = "SelectionTime.status = 2";
                $selectionTime = $this->SelectionTime->find("first", array("conditions" => $conditions, "fields" => "execution_date", "order" => "SelectionTime.created DESC"));
                $currentTime = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                //pr($conditions); pr($increment); pr($incrementDate); pr($currentTime);
                if (!empty($promotion) AND $data["Fixation"]["job_status"] == 6 AND $executionDate <= $currentTime AND $executionDate > $selectionTime["SelectionTime"]["execution_date"]) {
                    return $data["Fixation"]["execution_date"];
                } elseif (empty($promotion) AND $executionDate <= $currentTime) {
                    return $data["Fixation"]["execution_date"];
                } else {
                    return 0;
                }
            } elseif ($data["Fixation"]["job_status"] == 0) {
                $date = explode('-', $data["Fixation"]["execution_date"]);
                $resignDate = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
                $currentDate = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                //pr($resignDate); pr($currentDate); die();
                if (!empty($resignDate) AND $resignDate <= $currentDate) {
                    return $data["Fixation"]["execution_date"];
                } else {
                    return 0;
                }
            }
        } elseif (empty($data["Fixation"]["job_status"]) AND $data["Fixation"]["service_status"] == 2) {
            $date = explode('-', $data["Fixation"]["execution_date"]);
            $chargedDate = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
            if (empty($data["activeStatus"])) {
                $conditions[] = "Deputation.employee_id = " . $data["employee_id"];
                $conditions[] = "Deputation.deputate_grade = " . $data["Fixation"]["grade"];
                $conditions[] = "Deputation.deputate_designation = " . $data["new_designation_id"];
                $deputation = $this->Deputation->find("first", array("conditions" => $conditions, "fields" => array("taken", "released"), "order" => "Charge.created DESC"));
            } else {
                $deputation = NULL;
            }
            $currentTime = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
            //pr($data); echo "current:".date("d-m-Y",$currentTime); pr($charge); echo "charged:".date("d-m-Y",$chargedDate); echo "</br/>taken".date("d-m-Y",$charge["Charge"]["taken"]); die();
            if (!empty($deputation) AND $chargedDate <= $currentTime AND $chargedDate > $Deputation["Deputation"]["taken"]) {
                return $data["Fixation"]["execution_date"];
            } elseif (empty($deputation) AND $chargedDate <= $currentTime) {
                return $data["Fixation"]["execution_date"];
            } else {
                return 0;
            }
        }
    }

    public function calculateUpdate($type, $empId) {
        $this->calculate($type, $empId);
        $this->redirect("/employeeManagements/index/" . $type);
    }

    public function calculate($type, $empId) {
        $this->designations($type);
        $userInfo = $this->Session->read("ADMIN_INFO");
        if (!empty($this->data)) {
            $data = $this->data;
            if (!empty($this->data["Employee"]["employee_id"])) {
                $data["Salary"]["employee_id"] = $this->data["Employee"]["employee_id"];
                $data["Salary"]["grade"] = $this->data["Employee"]["grade"];
                $data["Salary"]["basic"] = $this->data["basic"];
            } else {
                $data["Salary"]["employee_id"] = $empId;
            }
        }
        $emp = $this->Employee->find("first", array("conditions" => "Employee.id = $empId"));
        $desType = $this->Designation->find("first", array("conditions" => "Designation.id = " . $emp["Employee"]["designation_id"], "fields" => "type"));
        if (!empty($this->data)) {
            if ($desType == 1 AND ! $this->dataCheck($data, 1)) {
                $data = $this->data;
                $data["Salary"]["created"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                $data["Salary"]["updated"] = $data["Salary"]["created"];
                $data['Salary']['terminal'] = $_SERVER['REMOTE_ADDR'];
                $data["Salary"]["user_id"] = $userInfo["id"];
                $data["Salary"]["employee_id"] = $empId;
                $data["Salary"]["total_add"] = $this->data["totalAdd"];
                $data["Salary"]["payable"] = $this->data["payable"];
                $data["Salary"]["grade"] = $this->data["Employee"]["grade"];
                $data["Salary"]["in_word"] = trim($this->data["inWord"]) . ".";
                $data["Salary"]["status"] = "1";
                $data["Deduction"]["created"] = $data["Salary"]["created"];
                $data["Deduction"]["updated"] = $data["Salary"]["created"];
                $data['Deduction']['terminal'] = $_SERVER['REMOTE_ADDR'];
                $data["Deduction"]["user_id"] = $userInfo["id"];
                $data["Deduction"]["employee_id"] = $empId;
                $data["Deduction"]["designation_id"] = $this->data["Salary"]["designation_id"];
                $data["Deduction"]["grade"] = $this->data["Employee"]["grade"];
                $data["Deduction"]["total_sub"] = $this->data["totalSub"];
                $data["Deduction"]["status"] = "1";
                $dId = $this->Deduction->find("first", array("conditions" => "Deduction.employee_id = $empId", "fields" => "id"));
                $data["Deduction"]["id"] = $dId["Deduction"]["id"];
                //pr($data); die();
                if ($this->Salary->save($data["Salary"])) {
                    if ($this->Deduction->save($data["Deduction"])) {
                        $this->Session->setFlash(array('Data saved successfully.', "Thank you."), 'default', array('class' => 'alert-success'));
                        $this->redirect("/employeeManagements/index/" . $type);
                    } else {
                        pr($this->Deduction->validationErrors);
                        $this->Session->setFlash(array('Saving failed.', "Please try again."), 'default', array('class' => 'alert-error'));
                    }
                } else {
                    pr($this->Salary->validationErrors);
                    $this->Session->setFlash(array('Saving failed.', "Please try again."), 'default', array('class' => 'alert-error'));
                }
            } else {
                $data = $this->data;
                $data["Salary"]["created"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                $data["Salary"]["updated"] = $data["Salary"]["created"];
                $data['Salary']['terminal'] = $_SERVER['REMOTE_ADDR'];
                $data["Salary"]["user_id"] = $userInfo["id"];
                $data["Salary"]["employee_id"] = $empId;
                $data["Salary"]["total_add"] = $this->data["totalAdd"];
                $data["Salary"]["payable"] = $this->data["payable"];
                $data["Salary"]["grade"] = $this->data["Employee"]["grade"];
                $data["Salary"]["in_word"] = trim($this->data["inWord"]) . ".";
                $data["Salary"]["status"] = "1";
                $data["Deduction"]["created"] = $data["Salary"]["created"];
                $data["Deduction"]["updated"] = $data["Salary"]["created"];
                $data['Deduction']['terminal'] = $_SERVER['REMOTE_ADDR'];
                $data["Deduction"]["user_id"] = $userInfo["id"];
                $data["Deduction"]["employee_id"] = $empId;
                $data["Deduction"]["designation_id"] = $this->data["Salary"]["designation_id"];
                $data["Deduction"]["grade"] = $this->data["Employee"]["grade"];
                $data["Deduction"]["total_sub"] = $this->data["totalSub"];
                $data["Deduction"]["status"] = "1";
                $dId = $this->Deduction->find("first", array("conditions" => "Deduction.employee_id = $empId", "fields" => "id"));
                $data["Deduction"]["id"] = $dId["Deduction"]["id"];
                //pr($data); die();
                if ($this->Salary->save($data["Salary"])) {
                    if ($this->Deduction->save($data["Deduction"])) {
                        $this->Session->setFlash(array('Data saved successfully.', "Thank you."), 'default', array('class' => 'alert-success'));
                        $this->redirect("/employeeManagements/index/" . $type);
                    } else {
                        pr($this->Deduction->validationErrors);
                        $this->Session->setFlash(array('Saving failed.', "Please try again."), 'default', array('class' => 'alert-error'));
                    }
                } else {
                    pr($this->Salary->validationErrors);
                    $this->Session->setFlash(array('Saving failed.', "Please try again."), 'default', array('class' => 'alert-error'));
                }
            }
        }
        $this->Salary->bindModel(array('belongsTo' => array(
                'Employee' => array(
                    'className' => 'Employee',
                    'foreignKey' => 'employee_id',
                    'dependent' => true
        ))));
        $this->Salary->bindModel(array('hasOne' => array(
                'Deduction' => array(
                    'className' => 'Deduction',
                    'foreignKey' => 'salary_id',
                    'dependent' => true
        ))));
        $this->data = $this->Salary->find("first", array("conditions" => "Salary.employee_id = $empId"));
		//pr($this->data);
        $this->request->data["Salary"]["designation_id"] = $this->data["Employee"]["designation_id"];
        $empPersonal = $this->EmployeePersonal->find("first", array("conditions" => "EmployeePersonal.employee_id = $empId"));
        $this->request->data["EmployeePersonal"] = $empPersonal["EmployeePersonal"];
        $this->set("employees", $this->employees());
        $this->set("type", $type);
        $this->set("empId", $empId);
        $this->set("desType", $desType["Designation"]["type"]);
        //pr($this->data); pr($empPersonal); die();
    }

    public function editSalary($type, $id) {
        $this->designations($type);
        $userInfo = $this->Session->read("ADMIN_INFO");
		$get_emp_id = $this->Salary->find("first", array("conditions" => "Salary.id = $id"));
		//pr($get_emp_id);
		$emp_id = $get_emp_id['Salary']['employee_id'];
        //$emp = $this->Employee->find("first", array("conditions" => "Employee.id = $id"));
        $emp = $this->Employee->find("first", array("conditions" => "Employee.id = $emp_id"));
		$degis_id = $emp["Employee"]["designation_id"];
        $desType = $this->Designation->find("first", array("conditions" => "Designation.id = " . $emp["Employee"]["designation_id"], "fields" => "type"));
        
		$desType = $desType["Designation"]["type"];
        $settingInfo = $this->Session->read("SETTING_INFO");
        $exTime = $settingInfo["execution_date"];
        //pr($desType);
        //pr($this->data); die();
        if (!empty($this->data)) {
            if ($desType == 1 AND ! $this->dataCheck($this->data, 2)) {
                $data = $this->data;
                $data["Salary"]["updated"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                $data['Salary']['terminal'] = $_SERVER['REMOTE_ADDR'];
                $data["Salary"]["user_id"] = $userInfo["id"];
                //$data["Salary"]["employee_id"] = $this->data["Employee"]["employee_id"];
                $data["Salary"]["total_add"] = $this->data["totalAdd"];
                $data["Salary"]["payable"] = $this->data["payable"];
                $data["Salary"]["grade"] = $this->data["Employee"]["grade"];
                $data["Salary"]["in_word"] = trim($this->data["inWord"]) . ".";
                //$data["Salary"]["status"] = "1";
                $data["Salary"]["id"] = $id;
                //pr($data); die();
                if ($emp["Employee"]["status"] == 5 OR $emp["Employee"]["status"] == 6) {
                    $this->Salary->validator()->remove("aid");
                    $this->Salary->validator()->remove("sumptuary");
                    $this->Salary->validator()->remove("conveyance");
                    $this->Salary->validator()->remove("tiffin");
                }
                if ($this->Salary->save($data["Salary"])) {
                    $temp = $this->Deduction->find("first", array("conditions" => "Deduction.salary_id = " . $data["Salary"]["id"], "fields" => "id"));
                    $data["Deduction"]["id"] = $temp["Deduction"]["id"];
                    $data["Deduction"]["salary_id"] = $data["Salary"]["id"];
                    $data["Deduction"]["updated"] = $data["Salary"]["updated"];
                    $data['Deduction']['terminal'] = $_SERVER['REMOTE_ADDR'];
                    $data["Deduction"]["user_id"] = $userInfo["id"];
                    $data["Deduction"]["total_sub"] = $this->data["totalSub"];
                    //$data["Deduction"]["status"] = "1";
                    if ($this->Deduction->save($data["Deduction"])) {
                        $this->Session->setFlash(array('Data saved successfully.', "Thank you."), 'default', array('class' => 'alert-success'));
                        $this->redirect("/salaryManagements/index/" . $type);
                    } else {
                        pr($this->Deduction->validationErrors);
                        $this->Session->setFlash(array('Saving failed.', "Please try again."), 'default', array('class' => 'alert-error'));
                    }
                } else {
                    pr($this->Salary->validationErrors);
                    $this->Session->setFlash(array('Saving failed.', "Please try again."), 'default', array('class' => 'alert-error'));
                }
            } else {
                $data = $this->data;
                $data["Salary"]["updated"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                $data['Salary']['terminal'] = $_SERVER['REMOTE_ADDR'];
                $data["Salary"]["user_id"] = $userInfo["id"];
                //$data["Salary"]["employee_id"] = $this->data["Employee"]["employee_id"];
                $data["Salary"]["total_add"] = $this->data["totalAdd"];
                $data["Salary"]["payable"] = $this->data["payable"];
                $data["Salary"]["grade"] = $this->data["Employee"]["grade"];
                $data["Salary"]["in_word"] = trim($this->data["inWord"]) . ".";
                //$data["Salary"]["status"] = "1";
                $data["Salary"]["id"] = $id;
                //pr($data); die();
                if ($this->Salary->save($data["Salary"])) {
                    $temp = $this->Deduction->find("first", array("conditions" => "Deduction.salary_id = " . $data["Salary"]["id"], "fields" => "id"));
                    $data["Deduction"]["id"] = $temp["Deduction"]["id"];
                    $data["Deduction"]["salary_id"] = $data["Salary"]["id"];
                    $data["Deduction"]["updated"] = $data["Salary"]["updated"];
                    $data['Deduction']['terminal'] = $_SERVER['REMOTE_ADDR'];
                    $data["Deduction"]["user_id"] = $userInfo["id"];
                    $data["Deduction"]["total_sub"] = $this->data["totalSub"];
                    //$data["Deduction"]["status"] = "1";
                    if ($this->Deduction->save($data["Deduction"])) {
                        $this->Session->setFlash(array('Data saved successfully.', "Thank you."), 'default', array('class' => 'alert-success'));
                        $this->redirect("/salaryManagements/index/" . $type);
                    } else {
                        pr($this->Deduction->validationErrors);
                        $this->Session->setFlash(array('Saving failed.', "Please try again."), 'default', array('class' => 'alert-error'));
                    }
                } else {
                    pr($this->Salary->validationErrors);
                    $this->Session->setFlash(array('Saving failed.', "Please try again."), 'default', array('class' => 'alert-error'));
                }
            }
        }
        $this->Salary->bindModel(array('belongsTo' => array(
                'Employee' => array(
                    'className' => 'Employee',
                    'foreignKey' => 'employee_id',
                    'dependent' => true
        ))));
        $this->Salary->bindModel(array('hasOne' => array(
                'Deduction' => array(
                    'className' => 'Deduction',
                    'foreignKey' => 'salary_id',
                    'conditions' => array("Deduction.status" => "1"),
                    'dependent' => true
        ))));
        $this->Salary->bindModel(array('hasOne' => array(
                'Charge' => array(
                    'className' => 'Charge',
                    'foreignKey' => 'employee_id',
                    'conditions' => array("Charge.status" => array("0", "2")),
                    'dependent' => true
        ))));
        $this->data = $this->Salary->find("first", array("conditions" => "Salary.id = $id", "fields" => array("id", "basic", "house_rent", "charge", "washing", "medical", "edu", "sumptuary", "dearness", "pp", "fraction_increment", "Employee.id", "Employee.first_name", "Employee.middle_name", "Employee.last_name", "Employee.total_increment", "Salary.designation_id", "Salary.grade", "Deduction.cpf_loan1", "Deduction.cpf_loan2", "Employee.status", "Salary.status", "Deduction.association", "Salary.employee_id", "Deduction.house_loan", "Deduction.vehicle_loan", "Deduction.cpf_interest", "Deduction.h_interest", "Deduction.v_interest", "Deduction.transport_bill","Deduction.house_rent_deduct", "Deduction.w_s", "Deduction.fuel", "Deduction.tax", "Deduction.benevolent_fund", "Charge.type")));
        //pr($this->data);
        if ($this->data["Employee"]["status"] == 4) {
            $deputation = $this->Deputation->find("first", array("conditions" => "Deputation.employee_id = " . $this->data["Salary"]["employee_id"], "fields" => array("ctype", "percentage", "percentage2", "group_insurance", "benevolent_fund", "deputate_designation", "house_rent_deduct")));
            $this->set("deputation", $deputation);
        }
        $fixation = $this->Fixation->find("first", array("conditions" => "Fixation.salary_id = " . $this->data["Salary"]["id"], "order" => "Fixation.id DESC"));
        //pr($fixation);
        if (!empty($fixation) AND $fixation["Fixation"]["status"] == 2) {
            $increment = $this->Increment->find("first", array("conditions" => "Increment.employee_id = " . $this->data["Employee"]["id"], "fields" => array("amount", "increment_date", "days", "previous_total"), "order" => "Increment.id DESC"));
            //$current = date ('d-m-Y',mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y")));
            $current = date('d-m-Y', $exTime);
            $current = explode("-", $current);
            $incrementDate = date('d-m-Y', mktime(0, 0, 0, date('m', $increment["Increment"]["increment_date"]), date('d', $increment["Increment"]["increment_date"]), date('Y', $increment["Increment"]["increment_date"])));
            $incrementDate = explode("-", $incrementDate);
            if ($incrementDate[1] == $current[1]) {
                $this->request->data["Salary"]["basic"] = $this->request->data["Salary"]["basic"] - $this->request->data["Employee"]["total_increment"] + $increment["Increment"]["amount"];
            } elseif ($incrementDate[1] + 1 == $current[1]) {
                $endDate = date('d-m-Y', mktime(0, 0, 0, date('m', $increment["Increment"]["increment_date"]) + 1, 0, date('Y', $increment["Increment"]["increment_date"])));
                $endDate = explode("-", $endDate);
                $basic = $this->request->data["Salary"]["basic"] - $this->request->data["Employee"]["total_increment"] + $increment["Increment"]["amount"];
                $lastBasic = $this->request->data["Salary"]["basic"] - $this->request->data["Employee"]["total_increment"] + $increment["Increment"]["previous_total"];
                $netPayable = $this->netPayable($type, $basic, $this->data["Salary"]["grade"], $endDate[0], $endDate[0], $this->data["Employee"]["status"], $this->data["Salary"]["status"]);
                $lastPayable = $this->netPayable($type, $lastBasic, $this->data["Salary"]["grade"], $endDate[0], $endDate[0], $this->data["Employee"]["status"], $this->data["Salary"]["status"]);
                //pr($basic); pr($netPayable); pr($lastPayable); 
                $this->request->data["Salary"]["arrear"] = $this->request->data["Salary"]["arrear"] + $netPayable["add"] - $lastPayable["add"];
                $this->request->data["Deduction"]["arrear_cpf"] = $this->request->data["Deduction"]["arrear_cpf"] + $netPayable["sub"] - $lastPayable["sub"];
                //pr($this->data["Salary"]["arrear"]); die();
            }
        } elseif (!empty($fixation) AND $fixation["Fixation"]["status"] == 3) {
            $promotion = $this->Promotion->find("first", array("conditions" => "Promotion.employee_id = " . $this->data["Employee"]["id"], "fields" => array("amount", "promotion_date", "previous_total_increment", "previous_grade"), "order" => "Promotion.id DESC"));
            //pr($promotion);
            //$current = date ('d-m-Y',mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y")));
            $current = date('d-m-Y', $exTime);
            $current = explode("-", $current);
            $promotionDate = date('d-m-Y', mktime(0, 0, 0, date('m', $promotion["Promotion"]["promotion_date"]), date('d', $promotion["Promotion"]["promotion_date"]), date('Y', $promotion["Promotion"]["promotion_date"])));
            $promotionDate = explode("-", $promotionDate);
            if ($promotionDate[1] == $current[1]) {
                $this->request->data["Salary"]["basic"] = $promotion["Promotion"]["amount"];
            } elseif ($promotionDate[1] + 1 == $current[1]) {
                $endDate = date('d-m-Y', mktime(0, 0, 0, date('m', $promotion["Promotion"]["promotion_date"]) + 1, 0, date('Y', $promotion["Promotion"]["promotion_date"])));
                $endDate = explode("-", $endDate);
                $payScale = $this->PayScale->find("first", array("conditions" => "PayScale.id = " . $promotion["Promotion"]["previous_grade"], "fields" => "scale"));
                $lastBasic = $payScale["PayScale"]["scale"] + $promotion["Promotion"]["previous_total_increment"];
                $basic = $promotion["Promotion"]["amount"];
                $netPayable = $this->netPayable($type, $basic, $this->data["Salary"]["grade"], $endDate[0], $endDate[0], $this->data["Employee"]["status"], $this->data["Salary"]["status"]);
                $lastPayable = $this->netPayable($type, $lastBasic, $this->data["Salary"]["grade"], $endDate[0], $endDate[0], $this->data["Employee"]["status"], $this->data["Salary"]["status"]);
                //pr($basic); pr($lastBasic); pr($netPayable); pr($lastPayable); 
                $this->request->data["Salary"]["arrear"] = $this->request->data["Salary"]["arrear"] + $netPayable["add"] - $lastPayable["add"];
                $this->request->data["Deduction"]["arrear_cpf"] = $this->request->data["Deduction"]["arrear_cpf"] + $netPayable["sub"] - $lastPayable["sub"];
            }
        }
        //elseif(!empty($fixation) AND ($fixation["Fixation"]["status"] == 4 OR $fixation["Fixation"]["status"] = 5)){
        $charge = NULL;
        $charge = $this->Charge->find("first", array("conditions" => "Charge.employee_id = " . $this->data["Employee"]["id"], "fields" => array("charged_designation"), "order" => "Charge.id DESC"));
        $this->set("charge", $charge);
        //}
		// $this->request->data["Salary"]["house_rent"] = NULL; disabled on 6-6-2016
        //$this->request->data["Salary"]["house_rent"] = NULL;
        $temp = $this->EmployeePersonal->find("first", array("conditions" => "EmployeePersonal.employee_id = " . $this->data["Employee"]["id"]));
        $this->request->data["EmployeePersonal"] = $temp["EmployeePersonal"];
        //pr($this->data);
        $this->set("type", $type);
        $this->set("id", $id);
        $this->set("desType", $desType);
		$commonSetting = $this->commonSetting->find("first");
		$this->set("comsettings", $commonSetting);
		$this->set("degis_id", $degis_id);
        /// after ending the month, set every status = 1
    }

    function netPayable($type, $basic, $grade, $last, $days, $empStatus, $salaryStatus) {
        if ($grade != 1) {
            if ($basic <= 5000) {
                $hr = $basic * .65;
                if ($hr < 2800) {
                    $hr = 2800;
                }
            } else {
                if ($basic > 5001 AND $basic <= 10800) {
                    $hr = $basic * .60;
                    if ($hr < 3300) {
                        $hr = 3300;
                    }
                } else {
                    if ($basic > 10801 AND $basic <= 21600) {
                        $hr = $basic * .55;
                        if ($hr < 6500) {
                            $hr = 6500;
                        }
                    } else {
                        $hr = $basic * .50;
                        if ($hr < 11900) {
                            $hr = 11900;
                        } else {
                            if ($hr > 39500) {
                                $hr = 19250;
                            }
                        }
                    }
                }
                $hr = round($hr, 0);
            }
        } else {
            $hr = round($basic * 7.5 / 100, 0);
        }
        $dearness = $basic * .20;
        if ($dearness < 1500) {
            $dearness = 1500;
        } else {
            if ($dearness > 6000) {
                $dearness = 6000;
            }
        }
        $benevolent_fund = $basic * .01;
        if ($benevolent_fund > 50) {
            $benevolent_fund = 50;
        }
        $dep = 0;
        if (($grade == 1 || $grade == 2 || $grade == 3) AND $empStatus == 2 AND $salaryStatus = 9) {
            $dep = $basic * .2;
        }
        $cpf1 = round($basic * 8.33 / 100, 0);
        $cpf2 = 0;
        if ($type == 1) {
            $cpf2 = round($basic * 2.5 / 100, 0);
        }
        //pr(round(($basic + $hr + $dearness + $benevolent_fund + $dep - $cpf1 - $cpf2)/$last*$days,0));

        $val["add"] = round(($basic + $hr + $dearness + $benevolent_fund + $dep) / $last * $days, 0);
        $val["sub"] = round(($cpf1 + $cpf2) / $last * $days, 0);
        return $val;
    }

    function detail($id) {
        $salary = NULL;
        $this->designations();
        $settingInfo = $this->Session->read("SETTING_INFO");
        $exTime = $settingInfo["execution_date"];
        $this->set("exTime", $exTime);
        $this->Salary->bindModel(array('belongsTo' => array(
                'Employee' => array(
                    'className' => 'Employee',
                    'foreignKey' => 'employee_id',
                    'dependent' => true,
                    "fields" => array("Employee.first_name", "Employee.middle_name", "Employee.last_name", "Employee.id", "Employee.employee_code", "Employee.increment_number", "Employee.type", "Employee.status")
        ))));
        $this->Salary->bindModel(array('belongsTo' => array(
                'EmployeePersonal' => array(
                    'className' => 'EmployeePersonal',
                    'foreignKey' => 'employee_id',
                    'dependent' => true,
                    "fields" => array("EmployeePersonal.bank", "EmployeePersonal.account", "EmployeePersonal.etin")
        ))));
        $this->Salary->bindModel(array('hasOne' => array(
                'Deduction' => array(
                    'className' => 'Deduction',
                    'foreignKey' => 'salary_id',
                    'dependent' => true,
        ))));
        $salary = $this->Salary->find("first", array("conditions" => "Salary.id = $id"));
		
        $this->set("salary", $salary);
        if (!empty($salary)) {
            $payScale = $this->PayScale->find("first", array("conditions" => "PayScale.grade =" . $salary["Salary"]["grade"]));
            $this->set("payScale", $payScale["PayScale"]);
            if ($salary["Deduction"]["status"] == 1) {
                $this->Loan->bindModel(array('hasOne' => array(
                        'Refund' => array(
                            'className' => 'Refund',
                            'foreignKey' => 'loan_id',
                            'dependent' => true,
                ))));
                $loans = $this->Loan->find("all", array("conditions" => "Loan.employee_id = $id"));
                $this->set("loans", $loans);
            }
            $deputation = NULL;
            if ($salary["Employee"]["status"] == 4) {
                $deputation = $this->Deputation->find("first", array("conditions" => "Deputation.employee_id = $id", "fields" => array("id", "released", "ctype", "percentage", "percentage2", "type", "house_rent_deduct")));
                $this->set("deputation", $deputation);
            } else {
                $this->set("deputation", $deputation);
            }
        }
		//pr($loans);
        $this->set("type", $salary["Employee"]["type"]);
    }

    function detailPdf($file, $fileName) {
        //App::uses('CakePdf', 'CakePdf.Pdf'); 
        $id = explode(".", $file);
        $id = $id[0];
        $this->layout = "pdf";
		$settingInfo = $this->Session->read("SETTING_INFO");
        $exTime = $settingInfo["execution_date"];
        $this->set("exTime", $exTime);
		
        $this->designations();
        $this->Salary->bindModel(array('belongsTo' => array(
                'Employee' => array(
                    'className' => 'Employee',
                    'foreignKey' => 'employee_id',
                    'conditions' => array("Salary.status != 0"),
                    'dependent' => true,
                    "fields" => array("Employee.first_name", "Employee.middle_name", "Employee.last_name", "Employee.employee_code", "Employee.type")
        ))));
        $this->Salary->bindModel(array('belongsTo' => array(
                'EmployeePersonal' => array(
                    'className' => 'EmployeePersonal',
                    'foreignKey' => 'employee_id',
                    'dependent' => true,
        ))));
        $this->Salary->bindModel(array('hasOne' => array(
                'Deduction' => array(
                    'className' => 'Deduction',
                    'foreignKey' => 'salary_id',
                    'dependent' => true,
        ))));
        $salary = $this->Salary->find("first", array("conditions" => "Salary.id = $id"));
        $this->set("salary", $salary);
        $deputation = NULL;
        if (!empty($salary)) {
            $payScale = $this->PayScale->find("first", array("conditions" => "PayScale.grade =" . $salary["Salary"]["grade"]));
            $this->set("payScale", $payScale["PayScale"]);
            if ($salary["Deduction"]["status"] == 1) {
                $this->Loan->bindModel(array('hasOne' => array(
                        'Refund' => array(
                            'className' => 'Refund',
                            'foreignKey' => 'loan_id',
                            'dependent' => true,
                ))));
                $loans = $this->Loan->find("all", array("conditions" => "Loan.employee_id = $id"));
                $this->set("loans", $loans);
            }
            if (isset($salary["Employee"]["status"]) && ($salary["Employee"]["status"] == 4)) {
                $deputation = $this->Deputation->find("first", array("conditions" => "Deputation.employee_id = $id", "fields" => array("id", "released", "ctype", "percentage", "percentage2", "type", "house_rent_deduct")));
                $this->set("deputation", $deputation);
            } else {
                $this->set("deputation", $deputation);
            }
        }
        $temp = $_SERVER["SCRIPT_FILENAME"];
        $temp = explode("index.php", $temp);
        $url = $temp[0];
        $this->set("url", $url);
        $month = date('F, Y', strtotime(date('Y-m') . " -1 month"));
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
            "pageSize" => "A4",
            'orientation' => 'portrait',
            "title" => "Pay Slip",
            'filename' => $fileName,
            'download' => false,
            'encoding' => 'UTF-8'
        ));*/
		
		$_html = $this->_getViewObject()->element('detail_pdf');
        $this->create_pdf($_html);
        // pr($this->request->CakePdf->margin()); die(); 
    }

    function generatePdf($type, $fileName) {

        $this->layout = 'pdf';
        $this->designations();
        $settingInfo = $this->Session->read("SETTING_INFO");
        $exTime = $settingInfo["execution_date"];
        $this->set("exTime", $exTime);
        //$start = mktime(0,0,0,date ('m'),1,date ('Y'));
        //$end = mktime(0,0,0,date ('m') + 1,0,date ('Y'));
        $start = mktime(0, 0, 0, date('m', $exTime), 1, date('Y', $exTime));
        $end = mktime(0, 0, 0, date('m', $exTime) + 1, 0, date('Y', $exTime));
        $conditions[] = "GeneratedSalary.execution_date >= $start";
        $conditions[] = "GeneratedSalary.execution_date <= $end";
        $conditions[] = "GeneratedSalary.status != 0";
        $conditions[] = "Employee.type = $type";
		$conditions[] = "Employee.status != 0 ";
        /*if ($type == 1)
            $conditions[] = "Employee.employee_code < 301";
        else
            $conditions[] = "Employee.employee_code > 300";*/
        //$conditions[] = "Employee.employee_code < 30";
        $this->GeneratedSalary->bindModel(array('belongsTo' => array(
                'Employee' => array(
                    'className' => 'Employee',
                    'foreignKey' => 'employee_id',
                    'conditions' => array(),
                    'dependent' => true,
                    "fields" => array("Employee.id","Employee.designation_id", "Employee.first_name", "Employee.middle_name", "Employee.last_name", "Employee.employee_code", "Employee.type")
        ))));
        $this->GeneratedSalary->bindModel(array('belongsTo' => array(
                'EmployeePersonal' => array(
                    'className' => 'EmployeePersonal',
                    'foreignKey' => 'employee_id',
                    'dependent' => true,
        ))));
        $this->GeneratedSalary->bindModel(array('hasOne' => array(
                'GeneratedDeduction' => array(
                    'className' => 'GeneratedDeduction',
                    'foreignKey' => 'generated_salary_id',
                    'dependent' => true,
        ))));
        $salaries = $this->GeneratedSalary->find("all", array("conditions" => $conditions));
		
		/*$log = $this->GeneratedSalary->getDataSource()->getLog(false, false); debug($log);
        pr($salaries);*/
        $i = 0;
        $loans = NULL;
        $deputations = NULL;
        foreach ($salaries as $salary) {
			$degig = $this->Designation->find("first", array("conditions" => "Designation.id = ". $salary['Employee']['designation_id']));
			$salary['GeneratedSalary']['grade'] = $degig['Designation']['grade'];
            $temp = $this->PayScale->find("first", array("conditions" => "PayScale.grade =" . $salary["GeneratedSalary"]["grade"]));
            $salaries[$i]["PayScale"] = $temp["PayScale"];
            if ($salary["GeneratedDeduction"]["status"] == 1) {
                $this->Loan->bindModel(array('hasOne' => array(
                        'Refund' => array(
                            'className' => 'Refund',
                            'foreignKey' => 'loan_id',
                            'dependent' => true,
                ))));
                $loans = $this->Loan->find("all", array("conditions" => "Loan.employee_id = " . $salary["Employee"]["id"]));
                $salaries[$i]["Loans"] = $loans;
            }
            if (isset($salary["Employee"]["status"]) && $salary["Employee"]["status"] == 4) {
                $deputations[$salary["Employee"]["id"]] = $this->Deputation->find("first", array("conditions" => "Deputation.employee_id = $id", "fields" => array("id", "released", "ctype", "percentage", "percentage2", "type", "house_rent_deduct")));
            } else {
                $deputations[$salary["Employee"]["id"]] = NULL;
            }
            $i++;
        }
		//pr($salaries); die();
        $this->set("deputations", $deputations);
        //pr($salaries); die(); pr($deputations); pr($loans); die();
        $this->set("salaries", $salaries);
        $this->set("loans", $loans);
		/*pr($salaries);
		pr($loans);exit;*/
        $_html = $this->_getViewObject()->element('generate_pdf', array('salaries'=>$salaries,'deputations'=>$deputations,'loans'=>$loans));
        $this->create_pdf($_html);
    }
	
	function previoussalarygeneratePdf($type,$salary_date,$fileName) {

        $this->layout = 'pdf';
        $this->designations();
        $settingInfo = $this->Session->read("SETTING_INFO");
        $exTime = $settingInfo["execution_date"];
        $this->set("exTime", $exTime);
        
		$date = explode('-', $salary_date);
		$start1 = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
		$this->set("start1", $start1);	
		$start = mktime(0, 0, 0, date('m', $start1), 1, date('Y', $start1));
		$end = mktime(0, 0, 0, date('m', $start1) + 1, 0, date('Y', $start1));
		
		
        $conditions[] = "GeneratedSalary.execution_date >= $start";
        $conditions[] = "GeneratedSalary.execution_date <= $end";
        $conditions[] = "Employee.type = $type";
        /*if ($type == 1)
            $conditions[] = "Employee.employee_code < 301";
        else
            $conditions[] = "Employee.employee_code > 300";*/
        //$conditions[] = "Employee.employee_code < 30";
        $this->GeneratedSalary->bindModel(array('belongsTo' => array(
                'Employee' => array(
                    'className' => 'Employee',
                    'foreignKey' => 'employee_id',
                    'conditions' => array(),
                    'dependent' => true,
                    "fields" => array("Employee.id", "Employee.first_name", "Employee.middle_name", "Employee.last_name", "Employee.employee_code", "Employee.type")
        ))));
        $this->GeneratedSalary->bindModel(array('belongsTo' => array(
                'EmployeePersonal' => array(
                    'className' => 'EmployeePersonal',
                    'foreignKey' => 'employee_id',
                    'dependent' => true,
        ))));
        $this->GeneratedSalary->bindModel(array('hasOne' => array(
                'GeneratedDeduction' => array(
                    'className' => 'GeneratedDeduction',
                    'foreignKey' => 'generated_salary_id',
                    'dependent' => true,
        ))));
        $salaries = $this->GeneratedSalary->find("all", array("conditions" => $conditions));
		/*$log = $this->GeneratedSalary->getDataSource()->getLog(false, false); debug($log);
        pr($salaries);exit;*/
        $i = 0;
        $loans = NULL;
        $deputations = NULL;
        foreach ($salaries as $salary) {
            $temp = $this->PayScale->find("first", array("conditions" => "PayScale.grade =" . $salary["GeneratedSalary"]["grade"]));
            $salaries[$i]["PayScale"] = $temp["PayScale"];
            if ($salary["GeneratedDeduction"]["status"] == 1) {
                $this->Loan->bindModel(array('hasOne' => array(
                        'Refund' => array(
                            'className' => 'Refund',
                            'foreignKey' => 'loan_id',
                            'dependent' => true,
                ))));
                $loans = $this->Loan->find("all", array("conditions" => "Loan.employee_id = " . $salary["Employee"]["id"]));
                $salaries[$i]["Loans"] = $loans;
            }
            if (isset($salary["Employee"]["status"]) && $salary["Employee"]["status"] == 4) {
                $deputations[$salary["Employee"]["id"]] = $this->Deputation->find("first", array("conditions" => "Deputation.employee_id = $id", "fields" => array("id", "released", "ctype", "percentage", "percentage2", "type", "house_rent_deduct")));
            } else {
                $deputations[$salary["Employee"]["id"]] = NULL;
            }
            $i++;
        }
		//pr($salaries); die();
        $this->set("deputations", $deputations);
        //pr($salaries); die(); pr($deputations); pr($loans); die();
        $this->set("salaries", $salaries);
        $this->set("loans", $loans);
		/*pr($salaries);
		pr($loans);exit;*/
        $_html = $this->_getViewObject()->element('previoussalarygenerate_pdf', array('salaries'=>$salaries,'deputations'=>$deputations,'loans'=>$loans));
        $this->create_pdf($_html);
    }
	
	
	function previoussalaryusergeneratePdf($type,$start_date,$end_date,$emp_id,$fileName) {

        $this->layout = 'pdf';
        $this->designations();
        $settingInfo = $this->Session->read("SETTING_INFO");
        $exTime = $settingInfo["execution_date"];
        $this->set("exTime", $exTime);
        
		$date1 = explode('-', $start_date);
		$start1 = mktime(0, 0, 0, $date1[1], $date1[0], $date1[2]);
		$date2 = explode('-', $end_date);
		$end1 = mktime(0, 0, 0, $date2[1], $date2[0], $date2[2]);
		$this->set("start1", $start1);	
		$this->set("end1", $end1);
		$start = mktime(0, 0, 0, date('m', $start1), 1, date('Y', $start1));
		$end = mktime(0, 0, 0, date('m', $end1) + 1, 0, date('Y', $end1));
		
		
        $conditions[] = "GeneratedSalary.status = 0";
        $conditions[] = "GeneratedSalary.employee_id = $emp_id";
        $conditions[] = "GeneratedDeduction.status = 0";
        $conditions[] = "GeneratedSalary.execution_date >= $start";
        $conditions[] = "GeneratedSalary.execution_date <= $end";
        $conditions[] = "Employee.type = $type";
        
        $this->GeneratedSalary->bindModel(array('belongsTo' => array(
                'Employee' => array(
                    'className' => 'Employee',
                    'foreignKey' => 'employee_id',
                    'conditions' => array(),
                    'dependent' => true,
                    "fields" => array("Employee.id", "Employee.first_name", "Employee.middle_name", "Employee.last_name", "Employee.employee_code", "Employee.type")
        ))));
        $this->GeneratedSalary->bindModel(array('belongsTo' => array(
                'EmployeePersonal' => array(
                    'className' => 'EmployeePersonal',
                    'foreignKey' => 'employee_id',
                    'dependent' => true,
        ))));
        $this->GeneratedSalary->bindModel(array('hasOne' => array(
                'GeneratedDeduction' => array(
                    'className' => 'GeneratedDeduction',
                    'foreignKey' => 'generated_salary_id',
                    'dependent' => true,
        ))));
        $salaries = $this->GeneratedSalary->find("all", array("conditions" => $conditions));
		/*$log = $this->GeneratedSalary->getDataSource()->getLog(false, false); debug($log);
        pr($salaries);exit;*/
        $i = 0;
        $loans = NULL;
        $deputations = NULL;
        foreach ($salaries as $salary) {
            $temp = $this->PayScale->find("first", array("conditions" => "PayScale.grade =" . $salary["GeneratedSalary"]["grade"]));
            $salaries[$i]["PayScale"] = $temp["PayScale"];
            if ($salary["GeneratedDeduction"]["status"] == 1) {
                $this->Loan->bindModel(array('hasOne' => array(
                        'Refund' => array(
                            'className' => 'Refund',
                            'foreignKey' => 'loan_id',
                            'dependent' => true,
                ))));
                $loans = $this->Loan->find("all", array("conditions" => "Loan.employee_id = " . $salary["Employee"]["id"]));
                $salaries[$i]["Loans"] = $loans;
            }
            if (isset($salary["Employee"]["status"]) && $salary["Employee"]["status"] == 4) {
                $deputations[$salary["Employee"]["id"]] = $this->Deputation->find("first", array("conditions" => "Deputation.employee_id = $id", "fields" => array("id", "released", "ctype", "percentage", "percentage2", "type", "house_rent_deduct")));
            } else {
                $deputations[$salary["Employee"]["id"]] = NULL;
            }
            $i++;
        }
		//pr($salaries); die();
        $this->set("deputations", $deputations);
        //pr($salaries); die(); pr($deputations); pr($loans); die();
        $this->set("salaries", $salaries);
        $this->set("loans", $loans);
		/*pr($salaries);
		pr($loans);exit;*/
        $_html = $this->_getViewObject()->element('previoussalaryusergenerate_pdf', array('salaries'=>$salaries,'deputations'=>$deputations,'loans'=>$loans));
        $this->create_pdf($_html);
    }
    
    public function create_pdf($_html){
//        $_html = "<h2>This is page test test</h2>";
        $this->autoRender = FALSE;
        set_time_limit(0);
//        define("MPDF_ENABLE_REMOTE",true);
        $this->Mpdf->init();
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
			'format' => 'A2-L',
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

    public function fix() {
        $fixations = $this->Fixation->find("all", array("fields" => array("id", "status", "salary_id")));
        foreach ($fixations as $fixation) {
            $temp = NULL;
            if ($fixation["Fixation"]["status"] == 2) {
                $temp = $this->Increment->find("first", array("conditions" => "Increment.employee_id = " . $fixation["Fixation"]["salary_id"], "fields" => array("increment_date")));
                if (!empty($temp)) {
                    $data["Fixation"]["id"] = $fixation["Fixation"]["id"];
                    $data["Fixation"]["execution_date"] = $temp["Increment"]["increment_date"];
                    $datas[] = $data;
                    pr(date("d-m-Y", $data["Fixation"]["execution_date"]));
                }
            } elseif ($fixation["Fixation"]["status"] == 3) {
                $temp = $this->Promotion->find("first", array("conditions" => "Promotion.employee_id = " . $fixation["Fixation"]["salary_id"], "fields" => array("promotion_date")));
                if (!empty($temp)) {
                    $data["Fixation"]["id"] = $fixation["Fixation"]["id"];
                    $data["Fixation"]["execution_date"] = $temp["Promotion"]["promotion_date"];
                    $datas[] = $data;
                    pr(date("d-m-Y", $data["Fixation"]["execution_date"]));
                }
            } elseif ($fixation["Fixation"]["status"] == 4 OR $fixation["Fixation"]["status"] == 5 OR $fixation["Fixation"]["status"] == 9) {
                $settingInfo = $this->Session->read("SETTING_INFO");
                $currentTime = $settingInfo["execution_date"];
                $start = mktime(0, 0, 0, date('m', $currentTime), 1, date('Y', $currentTime));
                $data["Fixation"]["id"] = $fixation["Fixation"]["id"];
                $data["Fixation"]["execution_date"] = $start;
                $datas[] = $data;
                pr(date("d-m-Y", $data["Fixation"]["execution_date"]));
            }
        }
        echo count($datas);
        pr($datas);
        pr($fixations);
        $this->Fixation->saveMany($datas);
    }

    public function fixation($type) {
        $this->adminCheck();
        $this->designations($type);
        $userInfo = $this->Session->read("ADMIN_INFO");
        if (!empty($this->data) AND ! $this->dataCheck($this->data, 3)) {
            if (empty($this->request->data["Fixation"]["job_status"]) AND ! empty($this->request->data["job_status"]))
                $this->request->data["Fixation"]["job_status"] = $this->request->data["job_status"];
            if (!empty($this->data["Fixation"]["job_status"])) {
                if ($this->data["Fixation"]["job_status"] == 2) {
                    $employeeId = $this->data["employee_id"];
                    $this->Employee->bindModel(array('belongsTo' => array(
                            'PayScale' => array(
                                'className' => 'PayScale',
                                'foreignKey' => 'pay_scale_id',
                                'conditions' => array('Employee.status' => "1"),
                                'dependent' => true
                    ))));
                    $this->Employee->bindModel(array('hasOne' => array(
                            'Salary' => array(
                                'className' => 'Salary',
                                'foreignKey' => 'employee_id',
                                'conditions' => array("Employee.status != 0"),
                                'dependent' => true
                    ))));
                    $employee = $this->Employee->find("first", array("conditions" => "Employee.id = $employeeId", "fields" => array("id", "total_increment", "increment_number", "Employee.grade", "Employee.designation_id", "Salary.id", "Employee.type", "pay_scale_id")));
                    $payScale = $this->PayScale->find("first", array("conditions" => "PayScale.id = " . $employee["Employee"]["pay_scale_id"], "fields" => array("scale", "increment", "increment_iteration", "eb", "eb_iteration")));
                    $employee["PayScale"] = $payScale["PayScale"];
                    //pr($employee); die();
                    $data["employee_id"] = $this->data["employee_id"];
                    $date = explode('-', $this->data["Fixation"]["execution_date"]);
                    $data["increment_date"] = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
                    $data["previous_total"] = $employee["Employee"]["total_increment"];
                    $data["previous_number"] = $employee["Employee"]["increment_number"];
                    $data["created"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                    $data["updated"] = $data["created"];
                    $data['terminal'] = $_SERVER['REMOTE_ADDR'];
                    $data["user_id"] = $userInfo["id"];
                    $endDate = date('d-m-Y', mktime(0, 0, 0, date('m', $data["increment_date"]) + 1, 0, date('Y', $data["increment_date"])));
                    $endDate = explode("-", $endDate);
                    $days = $endDate[0] - $date[0] + 1;
                    $prev = $endDate[0] - $days;
                    $data["status"] = 1;
                    if ($employee["PayScale"]["increment_iteration"] - $employee["Employee"]["increment_number"] >= 0) {
                        $amount = round($employee["PayScale"]["increment"] / $endDate[0] * $days, 0);
                        if (!empty($this->data["inc"])) {
                            $amount = $amount * $this->data["num"];
                            $data["status"] = 2;
                        }
                        $data["amount"] = $employee["Employee"]["total_increment"] + $amount;
                        if (!empty($this->data["inc"])) {
                            $employee["Employee"]["total_increment"] = $employee["Employee"]["total_increment"] + ($employee["PayScale"]["increment"] * $this->data["num"]);
                        } else {
                            $employee["Employee"]["total_increment"] = $employee["Employee"]["total_increment"] + $employee["PayScale"]["increment"];
                            $employee["Employee"]["increment_number"] += 1;
                        }
                    } elseif ($employee["PayScale"]["increment_iteration"] - $employee["Employee"]["increment_number"] < 0) {
                        $amount = round($employee["PayScale"]["eb"] / $endDate[0] * $days, 0);
                        if (!empty($this->data["inc"])) {
                            $amount = $amount * $this->data["num"];
                            $data["status"] = 2;
                        }
                        $data["amount"] = $employee["Employee"]["total_increment"] + $amount;
                        if (!empty($this->data["inc"])) {
                            $employee["Employee"]["total_increment"] = $employee["Employee"]["total_increment"] + ($employee["PayScale"]["eb"] * $this->data["num"]);
                        } else {
                            $employee["Employee"]["total_increment"] = $employee["Employee"]["total_increment"] + $employee["PayScale"]["eb"];
                            $employee["Employee"]["increment_number"] += 1;
                        }
                    }
                    $data["days"] = $days;
                    $employee["Employee"]["updated"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                    $employee["Employee"]['terminal'] = $_SERVER['REMOTE_ADDR'];
                    $employee["Salary"]["basic"] = $employee["PayScale"]["scale"] + $employee["Employee"]["total_increment"];
                    //pr($employee["Salary"]["basic"]); die();
                    $employee["Salary"]["updated"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                    $employee["Salary"]["terminal"] = $employee["Employee"]["terminal"];
                    $employee["Salary"]["status"] = 2; //2 = increment;
                    $fixation["salary_id"] = $employee["Salary"]["id"];
                    $fixation["status"] = $employee["Salary"]["status"];
                    $date = explode('-', $this->data["Fixation"]["execution_date"]);
                    $fixation["execution_date"] = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
                    $fixation["created"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                    $fixation["updated"] = $data["updated"];
                    $fixation["terminal"] = $data["terminal"];
                    $this->Fixation->validator()->remove("execution_date");
                    if ($this->Increment->save($data) AND $this->Employee->save($employee["Employee"]) AND $this->Salary->save($employee["Salary"]) AND $this->Fixation->save($fixation)) {
                        $this->redirect("/salaryManagements/editSalary/" . $employee["Employee"]["type"] . "/" . $employee["Employee"]["id"]);
                    }
                } elseif ($this->data["Fixation"]["job_status"] == 1) {
                    $employeeId = $this->data["employee_id"];
                    $this->Employee->bindModel(array('belongsTo' => array(
                            'PayScale' => array(
                                'className' => 'PayScale',
                                'foreignKey' => 'pay_scale_id',
                                'conditions' => array('Employee.status' => "1"),
                                'dependent' => true
                    ))));
                    $this->Employee->bindModel(array('hasOne' => array(
                            'Salary' => array(
                                'className' => 'Salary',
                                'foreignKey' => 'employee_id',
                                'conditions' => array('Employee.status' => "1"),
                                'dependent' => true
                    ))));
                    $employee = $this->Employee->find("first", array("conditions" => "Employee.id = $employeeId", "fields" => array("Employee.id", "Employee.total_increment", "Employee.increment_number", "PayScale.scale", "PayScale.increment", "PayScale.increment_iteration", "PayScale.eb", "PayScale.eb_iteration", "Employee.grade", "Employee.designation_id", "Salary.id", "Salary.basic", "Employee.type")));
                    //pr($employee);
                    $data["employee_id"] = $this->data["employee_id"];
                    $date = explode('-', $this->data["Fixation"]["execution_date"]);
                    //echo "promotion:"; pr($date);
                    $data["promotion_date"] = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
                    $data["previous_grade"] = $employee["Employee"]["grade"];
                    $data["previous_total_increment"] = $employee["Employee"]["total_increment"];
                    $data["previous_increment_number"] = $employee["Employee"]["increment_number"];
                    $data["previous_designation"] = $employee["Employee"]["designation_id"];
                    $data["created"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                    $data["updated"] = $data["created"];
                    $data['terminal'] = $_SERVER['REMOTE_ADDR'];
                    $data["user_id"] = $userInfo["id"];
                    $data["status"] = 1;
                    $payScale = $this->PayScale->find("first", array("conditions" => "PayScale.grade = " . $this->data["Fixation"]["grade"]));
                    $employee["Employee"]["grade"] = $this->data["Fixation"]["grade"];
                    $employee["Employee"]["designation_id"] = $this->data["new_designation_id"];
                    $employee["Employee"]["increment_number"] = 0;
                    $employee["Employee"]["pay_scale_id"] = $payScale["PayScale"]["id"];
                    $employee["Employee"]["updated"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                    $employee["Employee"]["terminal"] = $_SERVER["REMOTE_ADDR"];
                    $employee["Salary"]["updated"] = $employee["Employee"]["updated"];
                    $employee["Salary"]["terminal"] = $employee["Employee"]["terminal"];
                    $basic = $employee["Salary"]["basic"];
                    //echo "basic:"; pr($basic);  pr($payScale);
                    if ($basic > $payScale["PayScale"]["scale"]) {
                        $newBasic = $payScale["PayScale"]["scale"];
                        $i = 1;
                        while ($newBasic <= $basic) {
                            if ($i <= $payScale["PayScale"]["increment_iteration"] AND $payScale["PayScale"]["increment_iteration"] != 0) {
                                $newBasic = $newBasic + $payScale["PayScale"]["increment"];
                            } elseif ($i > $payScale["PayScale"]["increment_iteration"] AND $payScale["PayScale"]["increment_iteration"] != 0) {
                                if ($payScale["PayScale"]["eb"] == 0)
                                    break;
                                else
                                    $newBasic = $newBasic + $payScale["PayScale"]["eb"];
                            }else {
                                $employee["Salary"]["pp"] = $employee["Salary"]["basic"] - $payScale["PayScale"]["scale"];
                                $newBasic = $payScale["PayScale"]["scale"];
                                break;
                            }
                            $i++;
                        }
                    } else {
                        $newBasic = $payScale["PayScale"]["scale"];
                    }
                    //echo "new basic"; pr($newBasic);
                    $endDate = date('d-m-Y', mktime(0, 0, 0, date('m', $data["promotion_date"]) + 1, 0, date('Y', $data["promotion_date"])));
                    $endDate = explode("-", $endDate);
                    $days = $endDate[0] - $date[0] + 1;
                    $prev = $endDate[0] - $days;
                    //pr($days); pr($prev); pr($endDate); pr($payScale["PayScale"]["scale"]); // die();
                    $employee["Employee"]["total_increment"] = $newBasic - $payScale["PayScale"]["scale"];
                    //pr($data["previous_total_increment"]); die();
                    $employee["Salary"]["basic"] = $newBasic;
                    $employee["Salary"]["status"] = 3; //3 = promotion;
                    $employee["Salary"]["grade"] = $this->data["Fixation"]["grade"];
                    $employee["Salary"]["designation_id"] = $this->data["new_designation_id"];
                    $scale = $this->PayScale->find("first", array("conditions" => "PayScale.id = " . $employee["Employee"]["pay_scale_id"], "fields" => "scale"));
                    $data["amount"] = round(($employee["PayScale"]["scale"] + $data["previous_total_increment"]) / $endDate[0] * $prev + ($payScale["PayScale"]["scale"] + $employee["Employee"]["total_increment"]) / $endDate[0] * $days, 0);
                    //pr(($employee["PayScale"]["scale"] + $data["previous_total_increment"])/$endDate[0]*$prev);
                    $fixation["salary_id"] = $employee["Salary"]["id"];
                    $fixation["status"] = $employee["Salary"]["status"];
                    $date = explode('-', $this->data["Fixation"]["execution_date"]);
                    $fixation["execution_date"] = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
                    $fixation["created"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                    $fixation["updated"] = $employee["Salary"]["updated"];
                    $fixation["terminal"] = $employee["Salary"]["terminal"];
                    $this->Fixation->validator()->remove("execution_date");
                    //pr($this->data); pr($data); pr($employee); die();
                    if ($this->Promotion->save($data) AND $this->Fixation->save($fixation) AND $this->Employee->save($employee["Employee"]) AND $this->Salary->save($employee["Salary"])) {
                        $this->redirect("/salaryManagements/editSalary/" . $employee["Employee"]["type"] . "/" . $employee["Employee"]["id"]);
                    }
                } elseif ($this->data["Fixation"]["job_status"] == 3 OR $this->data["Fixation"]["job_status"] == 4) {
                    $employeeId = $this->data["employee_id"];
                    $this->Employee->bindModel(array('belongsTo' => array(
                            'PayScale' => array(
                                'className' => 'PayScale',
                                'foreignKey' => 'pay_scale_id',
                                'conditions' => array("Employee.status != 0"),
                                'dependent' => true
                    ))));
                    $this->Employee->bindModel(array('hasOne' => array(
                            'Salary' => array(
                                'className' => 'Salary',
                                'foreignKey' => 'employee_id',
                                'conditions' => array("Employee.status != 0"),
                                'dependent' => true
                    ))));
                    $this->Employee->bindModel(array('hasOne' => array(
                            'Deduction' => array(
                                'className' => 'Deduction',
                                'foreignKey' => 'employee_id',
                                'conditions' => array("Employee.status != 0"),
                                'dependent' => true
                    ))));
                    $employee = $this->Employee->find("first", array("conditions" => "Employee.id = $employeeId", "fields" => array("Employee.id", "Employee.total_increment", "Employee.increment_number", "PayScale.scale", "PayScale.increment", "PayScale.increment_iteration", "PayScale.eb", "PayScale.eb_iteration", "Employee.grade", "Employee.designation_id", "Salary.id", "Salary.basic", "Salary.charge", "Deduction.id", "Deduction.overdrawn", "type")));
                    $data["employee_id"] = $this->data["employee_id"];
                    $data["status"] = 0;
                    $date = explode('-', $this->data["Fixation"]["execution_date"]);
                    if (!empty($this->data["activeStatus"]) AND $this->data["activeStatus"] == 1) {
                        $data["taken"] = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
                        // 1 = Aditional Charge, 2 = Current Charge
                        if ($this->data["Fixation"]["job_status"] == 3)
                            $data["type"] = 1;
                        elseif ($this->data["Fixation"]["job_status"] == 4)
                            $data["type"] = 2;
                        $data["charged_grade"] = $this->data["Fixation"]["grade"];
                        $data["charged_designation"] = $this->data["new_designation_id"];
                        $data["created"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                        $data["updated"] = $data["created"];
                        $data['terminal'] = $_SERVER['REMOTE_ADDR'];
                        $data["user_id"] = $userInfo["id"];
                    }else {
                        $data["released"] = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
                        //$data["status"] = 0; // 0 = Regular, 1 = Aditional Charge, 2 = Current Charge
                        $data["updated"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                    }
                    $conditions[] = "Charge.charged_grade = " . $this->data["Fixation"]["grade"];
                    $conditions[] = "Charge.charged_designation = " . $this->data["new_designation_id"];
                    $conditions[] = "Charge.status = 0";
                    $charge = $this->Charge->find("first", array("conditions" => $conditions, "fields" => array("id", "taken", "released", "amount", "basic", "on_charge", "updated"), "order" => "Charge.updated DESC"));
                    if (empty($data["released"])) {
                        $onCharge = cal_days_in_month(CAL_GREGORIAN, $date[1], $date[2]) - $date[0];
                        $amount = round(($employee["Salary"]["basic"] / cal_days_in_month(CAL_GREGORIAN, $date[1], $date[2]) * $onCharge) * .1);
                        if ($amount > 1500) {
                            $data["amount"] = 1500;
                            //$employee["Salary"]["charge"] = 1500;
                        } else {
                            $data["amount"] = $amount;
                            //$employee["Salary"]["charge"] = $amount;
                        }
                        $data["released"] = NULL;
                        $data["basic"] = $employee["Salary"]["basic"] . "(" . $onCharge . ")";
                        $data["on_charge"] = $onCharge;
                    } else {
                        $released = NULL;
                        $taken = explode("-", date("d-m-Y", $charge["Charge"]["taken"]));
                        $endDate = date('d-m-Y', mktime(0, 0, 0, date('m', $data["released"]) + 1, 0, date('Y', $data["released"])));
                        $endDate = explode("-", $endDate);
                        if ($taken[1] == $date[1]) { // same month
                            $onCharge = floor(($data["released"] - $charge["Charge"]["taken"]) / (60 * 60 * 24)) + 1;
                            pr($onCharge);
                            if ($onCharge >= 21)
                                $amount = round(($employee["Salary"]["basic"] / $endDate[0] * $onCharge) * .1);
                            else
                                $amount = 0;
                        }else { // next month
                            $onCharge = floor(($data["released"] - mktime(0, 0, 0, date('m', $data["released"]), 01, date('Y', $data["released"]))) / (60 * 60 * 24)) + 1;
                            $amount = round(($employee["Salary"]["basic"] / $endDate[0] * $onCharge) * .1);
                        }
                        $endDate = mktime(0, 0, 0, $endDate[1], $endDate[0], $endDate[2]);
                        if ($taken[1] == $date[1] AND $amount < $charge["Charge"]["amount"]) {
                            $data["amount"] = $amount;
                        } elseif ($data["released"] <= $data["updated"] AND $taken[1] != $date[1]) {
                            $data["amount"] = $charge["Charge"]["amount"] + $amount;
                        }
                        $data["on_charge"] = $onCharge;
                        $data["id"] = $charge["Charge"]["id"];
                    }
                    if ($this->data["Fixation"]["job_status"] == 3) {
                        $employee["Salary"]["status"] = 4;
                        $employee["Employee"]["status"] = 2; // Aditional Charge
                    } elseif ($this->data["Fixation"]["job_status"] == 4) {
                        $employee["Salary"]["status"] = 5;
                        $employee["Employee"]["status"] = 3; // Current Charge
                    }
                    $fixation["salary_id"] = $employee["Salary"]["id"];
                    $fixation["status"] = $employee["Salary"]["status"];
                    $date = explode('-', $this->data["Fixation"]["execution_date"]);
                    $fixation["execution_date"] = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
                    $fixation["created"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                    $fixation["updated"] = $data["updated"];
                    $fixation["terminal"] = $data["terminal"];
                    $this->Fixation->validator()->remove("execution_date");
                    if ($this->Charge->save($data) AND $this->Fixation->save($fixation) AND $this->Employee->save($employee["Employee"]) AND $this->Salary->save($employee["Salary"]) AND $this->Deduction->save($employee["Deduction"])) {
                        if ($data["type"] == 1)
                            $this->redirect("/salaryManagements/charges/" . $employee["Employee"]["type"] . "/1");
                        elseif ($data["type"] == 2)
                            $this->redirect("/salaryManagements/charges/" . $employee["Employee"]["type"] . "/2");
                    }
                }elseif ($this->data["Fixation"]["job_status"] == 5 OR $this->data["Fixation"]["job_status"] == 6) {
                    $employeeId = $this->data["employee_id"];
                    $this->Employee->bindModel(array('belongsTo' => array(
                            'PayScale' => array(
                                'className' => 'PayScale',
                                'foreignKey' => 'pay_scale_id',
                                'conditions' => array('Employee.status' => "1"),
                                'dependent' => true
                    ))));
                    $this->Employee->bindModel(array('hasOne' => array(
                            'Salary' => array(
                                'className' => 'Salary',
                                'foreignKey' => 'employee_id',
                                'conditions' => array('Employee.status' => "1"),
                                'dependent' => true
                    ))));
                    $employee = $this->Employee->find("first", array("conditions" => "Employee.id = $employeeId", "fields" => array("id", "total_increment", "increment_number", "PayScale.scale", "PayScale.increment", "PayScale.increment_iteration", "PayScale.eb", "PayScale.eb_iteration", "grade", "designation_id", "Salary.id", "Salary.basic", "type", "time_scale")));
                    //pr($employee);
                    $data["employee_id"] = $this->data["employee_id"];
                    $date = explode('-', $this->data["Fixation"]["execution_date"]);
                    $data["execution_date"] = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
                    $data["previous_grade"] = $employee["Employee"]["grade"];
                    $data["previous_total_increment"] = $employee["Employee"]["total_increment"];
                    $data["previous_increment_number"] = $employee["Employee"]["increment_number"];
                    //$data["previous_designation"] = $employee["Employee"]["designation_id"];
                    $data["created"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                    $data["updated"] = $data["created"];
                    $data['terminal'] = $_SERVER['REMOTE_ADDR'];
                    $data["user_id"] = $userInfo["id"];
                    if ($this->data["Fixation"]["job_status"] == 5) {
                        if ($employee["Employee"]["grade"] == 16 AND $employee["Employee"]["time_scale"] == 0) {
                            $employee["Employee"]["grade"] = 14;
                            $employee["Salary"]["grade"] = 14;
                        } elseif ($employee["Employee"]["grade"] == 13 AND $employee["Employee"]["time_scale"] == 0) {
                            $employee["Employee"]["grade"] = 11;
                            $employee["Salary"]["grade"] = 11;
                        } elseif ($employee["Employee"]["grade"] == 16 AND $employee["Employee"]["time_scale"] != 0) {
                            $employee["Employee"]["grade"] = 15;
                            $employee["Salary"]["grade"] = 15;
                        } elseif ($employee["Employee"]["grade"] == 13 AND $employee["Employee"]["time_scale"] != 0) {
                            $employee["Employee"]["grade"] = 12;
                            $employee["Salary"]["grade"] = 12;
                        } elseif ($employee["Employee"]["grade"] == 10) {
                            $employee["Employee"]["grade"] = 9;
                            $employee["Salary"]["grade"] = 9;
                        } elseif ($employee["Employee"]["grade"] == 9) {
                            $employee["Employee"]["grade"] = 7;
                            $employee["Salary"]["grade"] = 7;
                        } elseif ($employee["Employee"]["grade"] == 6) {
                            $employee["Employee"]["grade"] = 5;
                            $employee["Salary"]["grade"] = 5;
                        } elseif ($employee["Employee"]["grade"] == 5) {
                            $employee["Employee"]["grade"] = 4;
                            $employee["Salary"]["grade"] = 4;
                        }
                    } elseif ($this->data["Fixation"]["job_status"] == 6) {
                        $employee["Employee"]["grade"] = $employee["Employee"]["grade"] - 1;
                        $employee["Salary"]["grade"] = $employee["Employee"]["grade"];
                    }
                    $payScale = $this->PayScale->find("first", array("conditions" => "PayScale.grade = " . $employee["Employee"]["grade"]));
                    $basic = $employee["Salary"]["basic"];
                    //$basic = $payScale["PayScale"]["scale"]; // + $employee["Employee"]["total_increment"];
                    //pr($oldBasic);
                    //pr($basic);
                    //pr($payScale);
                    //$employee["Employee"]["designation_id"] = $this->data["new_designation_id"];
                    //$employee["Employee"]["increment_number"] = 0;
                    $employee["Employee"]["pay_scale_id"] = $payScale["PayScale"]["id"];
                    $employee["Employee"]["updated"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                    $employee["Employee"]['terminal'] = $_SERVER['REMOTE_ADDR'];
                    //pr($basic); die();
                    if ($basic > $payScale["PayScale"]["scale"]) {
                        $newBasic = $payScale["PayScale"]["scale"];
                        $i = 1;
                        while ($newBasic <= $basic) {
                            if ($i <= $payScale["PayScale"]["increment_iteration"])
                                $newBasic = $newBasic + $payScale["PayScale"]["increment"];
                            else
                                $newBasic = $newBasic + $payScale["PayScale"]["eb"];
                            $i++;
                        }
                    }else {
                        $newBasic = $payScale["PayScale"]["scale"];
                    }
                    //pr($newBasic);
                    $employee["Employee"]["total_increment"] = $newBasic - $payScale["PayScale"]["scale"];
                    $employee["Employee"]["increment_number"] = $i - 1;
                    $employee["Salary"]["basic"] = $newBasic;
                    //pr($employee["Employee"]["total_increment"]);
                    //pr($employee["Salary"]["basic"]); 
                    if ($this->data["Fixation"]["job_status"] == 5) {
                        $employee["Salary"]["status"] = 6; // selection grade
                        $data["status"] = 1; // selection grade
                    } elseif ($this->data["Fixation"]["job_status"] == 6) {
                        $employee["Salary"]["status"] = 7; // time scale 
                        $data["status"] = 2; // time scale
                    }
                    $fixation["salary_id"] = $employee["Salary"]["id"];
                    $fixation["status"] = $employee["Salary"]["status"];
                    $date = explode('-', $this->data["Fixation"]["execution_date"]);
                    $fixation["execution_date"] = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
                    $fixation["created"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                    $fixation["updated"] = $employee["Employee"]["updated"];
                    $fixation["terminal"] = $employee["Employee"]["terminal"];
                    //pr($employee); die();
                    $this->Fixation->validator()->remove("execution_date");
                    if ($this->SelectionTime->save($data) AND $this->Fixation->save($fixation) AND $this->Employee->save($employee["Employee"]) AND $this->Salary->save($employee["Salary"])) {
                        $this->redirect("/salaryManagements/editSalary/" . $employee["Employee"]["type"] . "/" . $employee["Employee"]["id"]);
                    }
                }
            } elseif (empty($this->data["Fixation"]["job_status"]) AND $this->data["Fixation"]["service_status"] == 5) {
                $this->Employee->bindModel(array('hasOne' => array(
                        'Salary' => array(
                            'className' => 'Salary',
                            'foreignKey' => 'employee_id',
                            'conditions' => array("Employee.status != 0"),
                            'dependent' => true
                ))));
                $this->Employee->bindModel(array('hasOne' => array(
                        'Deduction' => array(
                            'className' => 'Deduction',
                            'foreignKey' => 'employee_id',
                            'conditions' => array("Employee.status != 0"),
                            'dependent' => true
                ))));

                $employee = $this->Employee->find("first", array("conditions" => "Employee.id = " . $this->data["employee_id"], "fields" => array("Employee.id", "Salary.id", "Salary.basic", "Salary.charge", "Deduction.id", "type")));
                $employee["Employee"]["status"] = 13;
                $employee["Salary"]["status"] = 9;
                $employee["Deduction"]["status"] = 13;
                $conditions[] = "Charge.employee_id = " . $employee["Employee"]["id"];
                $conditions[] = "Charge.status != 0";
                $charges = $this->Charge->find("all", array("conditions" => $conditions, "fields" => array("id", "taken", "released", "on_charge", "basic", "amount")));
                $date = explode('-', $this->data["Fixation"]["execution_date"]);
                $endDate = $date;
                //pr($endDate);
                $date = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
                $total = 0;
                foreach ($charges as $charge) {
                    $charge["Charge"]["status"] = 0;
                    $charge["Charge"]["released"] = $date;
                    $taken = explode("-", date("d-m-Y", $charge["Charge"]["taken"]));
                    //pr($taken);
                    if ($taken[1] == $endDate[1]) { // same month
                        $onCharge = floor(($date - $charge["Charge"]["taken"]) / (60 * 60 * 24)) + 1;
                        //pr($onCharge); 
                        $lastDate = date("t", strtotime("+0 month"));
                        if ($onCharge + $charge["Charge"]["on_charge"] >= 21)
                            $amount = round(($employee["Salary"]["basic"] / $lastDate * $onCharge) * .1);
                        else
                            $amount = 0;
                    }else { // next month
                        $onCharge = floor(($date - mktime(0, 0, 0, date('m', $date), 01, date('Y', $date))) / (60 * 60 * 24)) + 1;
                        $amount = round(($employee["Salary"]["basic"] / $endDate[0] * $onCharge) * .1);
                    }
                    $charge["Charge"]["on_charge"] = $charge["Charge"]["on_charge"] + $onCharge;
                    //pr($amount); pr($charge["Charge"]["amount"]); //die();
                    $charge["Charge"]["amount"] = $charge["Charge"]["amount"] + $amount;
                    if ($charge["Charge"]["on_charge"] != $onCharge) {
                        $basic = explode("(", $charge["Charge"]["basic"]);
                        $temp = explode(")", $basic[1]);
                        $basic[1] = $temp[0];
                        //pr($basic);
                        $onCharge = $onCharge + $basic[1];
                        //pr($onCharge);
                        $charge["Charge"]["basic"] = $basic[0] . "(" . $onCharge . ")";
                    }
                    $total = $total + $amount;
                    $datas[] = $charge;
                    //pr($total); 
                }
                //echo $total;
                $employee["Salary"]["charge"] = $employee["Salary"]["charge"] + $total;
                $fixation["salary_id"] = $employee["Salary"]["id"];
                $fixation["status"] = "13"; // resign
                $date = explode('-', $this->data["Fixation"]["execution_date"]);
                $fixation["execution_date"] = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
                $fixation["created"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                $fixation["updated"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                $fixation["terminal"] = $_SERVER["REMOTE_ADDR"];
                $this->Fixation->validator()->remove("execution_date");
                if ($this->Charge->saveAll($datas) AND $this->Fixation->save($fixation) AND $this->Employee->save($employee["Employee"]) AND $this->Salary->save($employee["Salary"]) AND $this->Deduction->save($employee["Deduction"])) {
                    $this->redirect("/salaryManagements/editSalary/" . $employee["Employee"]["type"] . "/" . $employee["Employee"]["id"]);
                }
            } elseif (empty($this->data["Fixation"]["job_status"]) AND $this->data["Fixation"]["service_status"] == 2) {
                $employeeId = $this->data["employee_id"];
                $this->Employee->bindModel(array('belongsTo' => array(
                        'PayScale' => array(
                            'className' => 'PayScale',
                            'foreignKey' => 'pay_scale_id',
                            'conditions' => array("Employee.status != 0"),
                            'dependent' => true
                ))));
                $this->Employee->bindModel(array('hasOne' => array(
                        'Salary' => array(
                            'className' => 'Salary',
                            'foreignKey' => 'employee_id',
                            'conditions' => array("Employee.status != 0"),
                            'dependent' => true
                ))));
                $this->Employee->bindModel(array('hasOne' => array(
                        'Deduction' => array(
                            'className' => 'Deduction',
                            'foreignKey' => 'employee_id',
                            'conditions' => array("Employee.status != 0"),
                            'dependent' => true
                ))));
                $employee = $this->Employee->find("first", array("conditions" => "Employee.id = $employeeId", "fields" => array("Employee.id", "Employee.total_increment", "Employee.increment_number", "PayScale.scale", "PayScale.increment", "PayScale.increment_iteration", "PayScale.eb", "PayScale.eb_iteration", "Employee.grade", "Employee.designation_id", "Salary.id", "Salary.basic", "Salary.charge", "Deduction.id", "Deduction.overdrawn", "type")));
                $data["employee_id"] = $this->data["employee_id"];
                $data["status"] = 1;
                $date = explode('-', $this->data["Fixation"]["execution_date"]);
                //pr($this->data); pr($employee); 
                if (!empty($this->data["activeStatus"]) AND $this->data["activeStatus"] == 1) {
                    $data["taken"] = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
                    $data["type"] = $this->data["Fixation"]["deputation_type"];
                    //pr($this->data); die();
                    if (!empty($this->data["Fixation"]["grade"]))
                        $data["deputate_grade"] = $this->data["Fixation"]["grade"];
                    else
                        $data["deputate_grade"] = $employee["Employee"]["grade"];
                    if (!empty($this->data["new_designation_id"]))
                        $data["deputate_designation"] = $this->data["new_designation_id"];
                    else
                        $data["deputate_designation"] = $this->data["Fixation"]["designation_id"];
                    $data["created"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                    $data["updated"] = $data["created"];
                    $data['terminal'] = $_SERVER['REMOTE_ADDR'];
                    $data["user_id"] = $userInfo["id"];
                    $data["organization"] = $this->data["Fixation"]["organization"];
                    $data["ctype"] = $this->data["Fixation"]["ctype"];
                    $data["percentage"] = $this->data["Fixation"]["percentage"];
                    $data["percentage2"] = $this->data["Fixation"]["percentage2"];
                    $data["group_insurance"] = $this->data["Fixation"]["group_insurance"];
                    $data["benevolent_fund"] = $this->data["Fixation"]["benevolent_fund"];
                    $data["house_rent_deduct"] = $this->data["Fixation"]["house_rent_deduct"];
                }else {
                    $data["released"] = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
                    //$data["status"] = 0; // 0 = Regular, 1 = Aditional Charge, 2 = Current Charge
                    $data["updated"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                }
                //pr($data); die();
                $conditions[] = "Deputation.employee_id = " . $this->data["employee_id"];
                $conditions[] = "Deputation.status = 0";
                $deputation = $this->Deputation->find("first", array("conditions" => $conditions, "fields" => array("id", "taken", "released", "amount", "basic", "on_charge", "updated"), "order" => "Deputation.updated DESC"));
                if (empty($data["released"])) {
                    $onCharge = cal_days_in_month(CAL_GREGORIAN, $date[1], $date[2]) - $date[0];
                    $amount = round(($employee["Salary"]["basic"] / cal_days_in_month(CAL_GREGORIAN, $date[1], $date[2]) * $onCharge) * .2);
                    $data["amount"] = $amount;
                    $data["released"] = NULL;
                    $data["basic"] = $employee["Salary"]["basic"] . "(" . $onCharge . ")";
                    $data["on_charge"] = $onCharge;
                } else {
                    $released = NULL;
                    $taken = explode("-", date("d-m-Y", $deputation["Deputation"]["taken"]));
                    $endDate = date('d-m-Y', mktime(0, 0, 0, date('m', $data["released"]) + 1, 0, date('Y', $data["released"])));
                    $endDate = explode("-", $endDate);
                    if ($taken[1] == $date[1]) { // same month
                        $onCharge = floor(($data["released"] - $deputation["Deputation"]["taken"]) / (60 * 60 * 24)) + 1;
                        $amount = round(($employee["Salary"]["basic"] / $endDate[0] * $onCharge) * .2);
                    } else { // next month
                        $onCharge = floor(($data["released"] - mktime(0, 0, 0, date('m', $data["released"]), 01, date('Y', $data["released"]))) / (60 * 60 * 24)) + 1;
                        $amount = round(($employee["Salary"]["basic"] / $endDate[0] * $onCharge) * .2);
                    }
                    //pr($onCharge);
                    $endDate = mktime(0, 0, 0, $endDate[1], $endDate[0], $endDate[2]);
                    if ($taken[1] == $date[1] AND $amount < $deputation["Deputation"]["amount"]) {
                        $data["amount"] = $amount;
                    } elseif ($data["released"] <= $data["updated"] AND $taken[1] != $date[1]) {
                        $data["amount"] = $deputation["Deputation"] + $amount;
                    }
                    $data["on_charge"] = $onCharge;
                    $data["id"] = $deputation["Deputation"]["id"];
                }
                if ($this->data["Fixation"]["deputation_type"] == 2) {
                    $employee["Salary"]["status"] = 8; // Deputated to other
                    $employee["Employee"]["status"] = 4; // Deputation
                } else {
                    $employee["Salary"]["status"] = 9; // deputated from other
                    $employee["Employee"]["status"] = 4; // Deputation
                }
                $fixation["salary_id"] = (int) $employee["Salary"]["id"];
                $fixation["status"] = $employee["Salary"]["status"];
                $date = explode('-', $this->data["Fixation"]["execution_date"]);
                $fixation["execution_date"] = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
                $fixation["created"] = $data["created"];
                $fixation["updated"] = $data["created"];
                $fixation["terminal"] = $data["terminal"];
                //echo "<br/>basic: ",$employee["Salary"]["basic"]; echo "<br/>on charge: ".$onCharge; 
                //pr($employee); pr($data); pr($fixation); //die();
                $this->Fixation->validator()->remove("execution_date");
                if ($this->Deputation->save($data) AND $this->Fixation->save($fixation) AND $this->Employee->save($employee["Employee"]) AND $this->Salary->save($employee["Salary"]) AND $this->Deduction->save($employee["Deduction"])) {
                    $this->redirect("/salaryManagements/deputations/" . $this->data["Fixation"]["deputation_type"]);
                }
            } elseif (empty($this->data["Fixation"]["job_status"]) AND $this->data["Fixation"]["service_status"] == 4) {
                $employeeId = $this->data["employee_id"];
                $this->Employee->bindModel(array("hasOne" => array(
                        "Salary" => array(
                            "className" => "Salary",
                            "foreignKey" => "employee_id",
                            "conditions" => array("Employee.status != 0"),
                            "dependent" => true
                ))));
                $this->Employee->bindModel(array('hasOne' => array(
                        'Deduction' => array(
                            'className' => 'Deduction',
                            'foreignKey' => 'employee_id',
                            'conditions' => array("Employee.status != 0"),
                            'dependent' => true
                ))));
                $employee = $this->Employee->find("first", array("conditions" => "Employee.id = $employeeId", "fields" => array("Employee.id", "Salary.id", "Deduction.id", "Employee.grade", "type")));
                $data["employee_id"] = $this->data["employee_id"];
                $data["status"] = 1; // goes to lien
                $date = explode('-', $this->data["Fixation"]["execution_date"]);
                $conditions[] = "Lien.employee_id = " . $this->data["employee_id"];
                $conditions[] = "Lien.status = 1";
                $lien = $this->Lien->find("first", array("conditions" => $conditions, "fields" => array("id", "taken", "released", "updated"), "order" => "Lien.id DESC"));
                if (empty($lien)) {
                    $data["taken"] = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
                    $data["created"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                    $data["updated"] = $data["created"];
                    $data['terminal'] = $_SERVER['REMOTE_ADDR'];
                    $data["user_id"] = $userInfo["id"];
                    $data["organization"] = $this->data["Fixation"]["organization"];
                } else {
                    $data["released"] = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
                    //$data["status"] = 0; // 0 = Regular, 1 = Aditional Charge, 2 = Current Charge
                    $data["updated"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                    $data['terminal'] = $_SERVER['REMOTE_ADDR'];
                }
                if (empty($data["released"])) {
                    $data["released"] = NULL;
                } else {
                    $data["id"] = $lien["Lien"]["id"];
                }
                $employee["Salary"]["status"] = 10;
                $employee["Employee"]["status"] = 5;  // Lien
                $employee["Deduction"]["status"] = 10;
                $fixation["salary_id"] = $employee["Salary"]["id"];
                $fixation["status"] = $employee["Salary"]["status"];
                $date = explode('-', $this->data["Fixation"]["execution_date"]);
                $fixation["execution_date"] = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
                $fixation["created"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                $fixation["updated"] = $fixation["created"];
                $fixation["terminal"] = $data["terminal"];
                //echo "<br/>basic: ",$employee["Salary"]["basic"]; echo "<br/>on charge: ".$onCharge; 
                //pr($this->data); pr($employee); pr($data); die();
                $this->Fixation->validator()->remove("execution_date");
                if ($this->Lien->save($data) AND $this->Fixation->save($fixation) AND $this->Employee->save($employee["Employee"]) AND $this->Salary->save($employee["Salary"]) AND $this->Deduction->save($employee["Deduction"])) {
                    $this->redirect("/salaryManagements/fixation/" . $employee["Employee"]["type"]);
                }
            } elseif (empty($this->data["Fixation"]["job_status"]) AND $this->data["Fixation"]["service_status"] == 3) {
                $employeeId = $this->data["employee_id"];
                $this->Employee->bindModel(array('hasOne' => array(
                        'Salary' => array(
                            'className' => 'Salary',
                            'foreignKey' => 'employee_id',
                            'conditions' => array("Employee.status != 0"),
                            'dependent' => true
                ))));
                $this->Employee->bindModel(array('hasOne' => array(
                        'Deduction' => array(
                            'className' => 'Deduction',
                            'foreignKey' => 'employee_id',
                            'conditions' => array("Employee.status != 0"),
                            'dependent' => true
                ))));
                $employee = $this->Employee->find("first", array("conditions" => "Employee.id = $employeeId", "fields" => array("Employee.id", "Salary.id", "Deduction.id", "Employee.grade", "type")));
                //pr($employee);
                $lastFixation = $this->Fixation->find("first", array("conditions" => "Fixation.salary_id = " . $employee["Salary"]["id"], "fields" => array("id", "status"), "order" => "Fixation.id DESC"));
                //pr($lastFixation);
                $data["employee_id"] = $this->data["employee_id"];
                $data["status"] = 1; // goes to prl
                $date = explode('-', $this->data["Fixation"]["execution_date"]);
                $conditions[] = "Prl.employee_id = " . $this->data["employee_id"];
                $conditions[] = "Prl.status = 1";
                $prl = $this->Prl->find("first", array("conditions" => $conditions, "fields" => array("id", "execution_date", "updated")));
                if (empty($prl)) {
                    $data["execution_date"] = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
                    $data["created"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                    $data["updated"] = $data["created"];
                    $data['terminal'] = $_SERVER['REMOTE_ADDR'];
                    $data["user_id"] = $userInfo["id"];
                    $employee["Salary"]["status"] = 11;
                    $employee["Employee"]["status"] = 6;  // PRL
                    $employee["Deduction"]["status"] = 11;
                    $fixation["salary_id"] = $employee["Salary"]["id"];
                    $fixation["status"] = $employee["Salary"]["status"];
                    $date = explode('-', $this->data["Fixation"]["execution_date"]);
                    $fixation["execution_date"] = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
                    $fixation["created"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                    $fixation["updated"] = $fixation["created"];
                    $fixation["terminal"] = $data["terminal"];
                }

                //echo "<br/>basic: ",$employee["Salary"]["basic"]; echo "<br/>on charge: ".$onCharge; 
                //pr($this->data); pr($employee); pr($data); die();
                $this->Fixation->validator()->remove("execution_date");
                if ($this->Prl->save($data) AND $this->Fixation->save($fixation) AND $this->Employee->save($employee["Employee"]) AND $this->Salary->save($employee["Salary"]) AND $this->Deduction->save($employee["Deduction"])) {
                    $this->redirect("/salaryManagements/fixation/" . $employee["Employee"]["type"]);
                }
            } elseif (empty($this->data["Fixation"]["job_status"]) AND ( $this->data["Fixation"]["service_status"] == 0 OR $this->data["Fixation"]["service_status"] == 6)) {
                $employeeId = $this->data["employee_id"];
                $this->Employee->bindModel(array('hasOne' => array(
                        'Salary' => array(
                            'className' => 'Salary',
                            'foreignKey' => 'employee_id',
                            'conditions' => array("Employee.status != 0"),
                            'dependent' => true
                ))));
                $this->Employee->bindModel(array('hasOne' => array(
                        'Deduction' => array(
                            'className' => 'Deduction',
                            'foreignKey' => 'employee_id',
                            'conditions' => array("Employee.status != 0"),
                            'dependent' => true
                ))));
                $employee = $this->Employee->find("first", array("conditions" => "Employee.id = $employeeId", "fields" => array("Employee.id", "Salary.id", "Deduction.id", "Employee.grade", "type", "Salary.basic")));
                $data["employee_id"] = $this->data["employee_id"];
                if ($this->data["Fixation"]["service_status"] == 0)
                    $data["status"] = 1; // goes to retirement
                elseif ($this->data["Fixation"]["service_status"] == 6)
                    $data["status"] = 0; // died
                $date = explode('-', $this->data["Fixation"]["execution_date"]);
                $data["execution_date"] = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
                $conditions[] = "Prl.employee_id = " . $this->data["employee_id"];
                $conditions[] = "Prl.status = 1";
                $prl = $this->Prl->find("first", array("conditions" => $conditions, "fields" => array("id", "execution_date"), "order" => "Prl.id DESC"));
                $retired = $this->Retirement->find("first", array("conditions" => "Retirement.employee_id = $employeeId", "fields" => array("id", "execution_date")));
                $date = explode('-', $this->data["Fixation"]["execution_date"]);
                //$data["execution_date"] = mktime(0,0,0,$date[1],$date[0],$date[2]);
                $data["created"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                $data["updated"] = $data["created"];
                $data['terminal'] = $_SERVER['REMOTE_ADDR'];
                $data["user_id"] = $userInfo["id"];
                if (!empty($prl) AND empty($retired) AND $this->data["Fixation"]["service_status"] == 0) {
                    $employee["Salary"]["status"] = 8;
                    $employee["Employee"]["status"] = 7;  // Retired
                    $employee["Deduction"]["status"] = 8;
                    $data["status"] = 1;
                    $prl["Prl"]["status"] = 0;
                    $fixation["salary_id"] = $employee["Salary"]["id"];
                    $fixation["status"] = "8";
                    $date = explode('-', $this->data["Fixation"]["execution_date"]);
                    $fixation["execution_date"] = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
                    $fixation["created"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                    $fixation["updated"] = $fixation["created"];
                    $fixation["terminal"] = $data["terminal"];
                    $this->Prl->save($prl);
                } elseif (!empty($prl) AND empty($retired) AND $this->data["Fixation"]["service_status"] == 6) {
                    $employee["Salary"]["status"] = 12;
                    $employee["Employee"]["status"] = 8;  // Retired then died
                    $employee["Deduction"]["status"] = 12;
                    $data["status"] = 0;
                    $prl["Prl"]["status"] = 0;
                    $fixation["salary_id"] = $employee["Salary"]["id"];
                    $fixation["status"] = "12";
                    $date = explode('-', $this->data["Fixation"]["execution_date"]);
                    $fixation["execution_date"] = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
                    $fixation["created"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                    $fixation["updated"] = $fixation["created"];
                    $fixation["terminal"] = $data["terminal"];
                    $this->Prl->save($prl);
                } elseif (empty($prl) AND empty($retired) AND $this->data["Fixation"]["service_status"] == 6) {
                    $employee["Salary"]["status"] = 12;
                    $employee["Employee"]["status"] = 8;  // Died on job
                    $employee["Deduction"]["status"] = 12;
                    $data["status"] = 0;
                    $fixation["salary_id"] = $employee["Salary"]["id"];
                    $fixation["status"] = "12";
                    $date = explode('-', $this->data["Fixation"]["execution_date"]);
                    $fixation["execution_date"] = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
                    $fixation["created"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                    $fixation["updated"] = $fixation["created"];
                    $fixation["terminal"] = $data["terminal"];
                }
                //echo "<br/>basic: ",$employee["Salary"]["basic"]; echo "<br/>on charge: ".$onCharge; 
                //pr($fixation); pr($employee); pr($data); die();
                $this->Fixation->validator()->remove("execution_date");
                if ($this->Retirement->save($data) AND $this->Fixation->save($fixation) AND $this->Employee->save($employee["Employee"]) AND $this->Salary->save($employee["Salary"]) AND $this->Deduction->save($employee["Deduction"])) {
                    $this->redirect("/salaryManagements/editSalary/" . $employee["Employee"]["type"] . "/" . $employee["Employee"]["id"]);
                }
            }
        }
        $this->set("type", $type);
        //pr($salaries); 
    }

    public function chargeRelease($id) {
        $this->designations();
        if (!empty($this->data)) {
            $date = explode('-', $this->data["Fixation"]["execution_date"]);
            $releaseDate = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
            $data["released"] = $releaseDate;
            $charge = $this->Charge->find("first", array("conditions" => "Charge.id = $id", "fields" => array("id", "taken", "released", "amount", "basic", "on_charge", "type", "status", "employee_id")));
            $this->Salary->bindModel(array('belongsTo' => array(
                    'Employee' => array(
                        'className' => 'Employee',
                        'foreignKey' => 'employee_id',
                        'conditions' => array("Employee.status != 0"),
                        'dependent' => true
            ))));
            $salary = $this->Salary->find("first", array("conditions" => "Salary.employee_id = " . $charge["Charge"]["employee_id"], "fields" => array("id", "basic", "charge", "updated", "grade", "employee_id", "Employee.type")));
            $deduction = $this->Deduction->find("first", array("conditions" => "Deduction.salary_id = " . $salary["Salary"]["id"], "fields" => array("id", "overdrawn")));
            $settingInfo = $this->Session->read("SETTING_INFO");
            //$currentTime = $settingInfo["execution_date"];
            //pr($this->data); pr($charge); pr($salary); pr($deduction); die();
            $currentTime = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
            //echo date("d-m-Y",$charge["Charge"]["taken"]);
            //pr($charge); pr($salary); //die();
            if (!empty($charge) AND $releaseDate <= $currentTime AND $releaseDate >= $charge["Charge"]["taken"]) {
                $taken = explode("-", date("d-m-Y", $charge["Charge"]["taken"]));
                $endDate = date('d-m-Y', mktime(0, 0, 0, date('m', $releaseDate) + 1, 0, date('Y', $releaseDate)));
                $endDate = explode("-", $endDate);
                if ($taken[1] == $date[1]) { // same month
                    $onCharge = floor(($releaseDate - $charge["Charge"]["taken"]) / (60 * 60 * 24)) + 1;
                    if ($onCharge >= 21)
                        $amount = round(($salary["Salary"]["basic"] / $endDate[0] * $onCharge) * .1);
                    else
                        $amount = 0;
                }else { // next month
                    $onCharge = floor(($releaseDate - mktime(0, 0, 0, date('m', $releaseDate), 01, date('Y', $releaseDate))) / (60 * 60 * 24)) + 1;
                    $amount = round(($salary["Salary"]["basic"] / $endDate[0] * $onCharge) * .1);
                }
                //pr($onCharge); pr($amount); pr($taken); pr($date);
                $endDate = mktime(0, 0, 0, $endDate[1], $endDate[0], $endDate[2]);
                if ($taken[1] == $date[1] AND $amount < $charge["Charge"]["amount"] AND $charge["Charge"]["status"] == 0) {
                    $data["amount"] = $amount;
                    $data["on_charge"] = $onCharge;
                    $basic = explode("(", $charge["Charge"]["basic"]);
                    if ($salary["Salary"]["basic"] == $basic[0] AND $onCharge != $charge["Charge"]["on_charge"]) {
                        $data["basic"] = $basic[0] . "(" . $onCharge . ")";
                    } elseif ($salary["Salary"]["basic"] != $basic[0]) {
                        $data["basic"] = $charge["Charge"]["basic"] . "-" . $salary["Salary"]["basic"] . "(" . $onCharge . ")";
                    }
                } elseif ($releaseDate <= $salary["Salary"]["updated"] AND $taken[1] != $date[1] AND $charge["Charge"]["status"] == 0) {
                    $data["amount"] = $charge["Charge"]["amount"] + $amount;
                    $data["on_charge"] = $charge["Charge"]["on_charge"] + $onCharge;
                    $basic = explode("(", $charge["Charge"]["basic"]);
                    if ($salary["Salary"]["basic"] == $basic[0] AND $data["on_charge"] != $charge["Charge"]["on_charge"]) {
                        $data["basic"] = $basic[0] . "(" . $data["on_charge"] . ")";
                    } elseif ($salary["Salary"]["basic"] != $basic[0]) {
                        $data["basic"] = $charge["Charge"]["basic"] . "-" . $salary["Salary"]["basic"] . "(" . $data["on_charge"] . ")";
                    }
                } elseif ($releaseDate <= $salary["Salary"]["updated"] AND $taken[1] != $date[1] AND $charge["Charge"]["status"] == 2) {
                    $endDate = date('d-m-Y', mktime(0, 0, 0, date('m', $releaseDate) + 1, 0, date('Y', $releaseDate)));
                    $endDate = explode("-", $endDate);
                    //pr($endDate);
                    $prevAmount = round(($salary["Salary"]["basic"]) * .1);
                    //pr($prevAmount);
                    if ($prevAmount > 1500)
                        $prevAmount = 1500;
                    $data["amount"] = $charge["Charge"]["amount"] - $prevAmount + $amount; // 
                    $data["on_charge"] = $charge["Charge"]["on_charge"] - $endDate[0] + $onCharge; //
                    $basic = explode("(", $charge["Charge"]["basic"]); //
                    if ($salary["Salary"]["basic"] == $basic[0] AND $data["on_charge"] != $charge["Charge"]["on_charge"]) {
                        $data["basic"] = $basic[0] . "(" . $data["on_charge"] . ")";
                    } elseif ($salary["Salary"]["basic"] != $basic[0]) {
                        $data["basic"] = $charge["Charge"]["basic"] . "-" . $salary["Salary"]["basic"] . "(" . $data["on_charge"] . ")";
                    }
                    $salary["Salary"]["charge"] = $salary["Salary"]["charge"] + $amount;
                    $data["status"] = 1;
                }
                //$salary["Salary"]["charge"] = $salary["Salary"]["charge"] - $charge["Charge"]["amount"] + $amount; 
                if ($charge["Charge"]["type"] == 1) {
                    $employee["id"] = $charge["Charge"]["employee_id"];
                    $employee["status"] = 2; // aditional charge
                } elseif ($charge["Charge"]["type"] == 2) {
                    $employee["id"] = $charge["Charge"]["employee_id"];
                    $employee["status"] = 3; //current charge
                }
                $data["id"] = $charge["Charge"]["id"];
            }

            /* $fixations = $this->Fixation->find("all",array("conditions"=>array("Fixation.salary_id = ".$salary["Salary"]["id"]),"fields"=>array("status"),"order"=>"Fixation.id DESC","limit"=>"2"));
              pr($fixations);
              $employee = $this->Employee->find("first",array("conditions"=>array("Employee.id = ".$salary["Salary"]["employee_id"]),"fields"=>array("status")));
              pr($employee);
              if(!empty($fixations[1]["Fixation"]["status"]) AND $fixations[1]["Fixation"]["status"] != $salary["Salary"]["status"])
              $salary["Salary"]["status"] = $fixations[1]["Fixation"]["status"];
              elseif(empty($fixations[1]["Fixation"]["status"]) AND $employee["Employee"]["status"] == 4)
              $salary["Salary"]["status"] = 9;
              elseif(empty($fixations[1]["Fixation"]["status"]) AND $employee["Employee"]["status"] != 4)
              $salary["Salary"]["status"] = 1;
              else
              $salary["Salary"]["status"] = 1;
             */
            //pr($this->data); pr($data); pr($salary); pr($charge); pr($amount); echo "current:".date("d-m-Y",$currentTime);  echo "charged:".date("d-m-Y",$releaseDate); echo "</br/>taken".date("d-m-Y",$charge["Charge"]["taken"]); die();
            if ($this->Charge->save($data) AND $this->Employee->save($employee) AND $this->Salary->save($salary)) {
                $this->redirect("/salaryManagements/charges/" . $salary["Employee"]["type"] . "/" . $charge["Charge"]["type"]);
            }
        }
        $this->Charge->bindModel(array('belongsTo' => array(
                'Employee' => array(
                    'className' => 'Employee',
                    'foreignKey' => 'employee_id',
                    'conditions' => array("Employee.status != 0"),
                    "fields" => array("first_name", "middle_name", "last_name", "designation_id"),
                    'dependent' => true
        ))));
        $this->data = $this->Charge->find("first", array("conditions" => "Charge.id = $id"));
        $this->set("id", $id);
    }

    public function charges($empType, $chargeType) {
        $this->adminCheck();
        $this->designations($empType);
        if ($empType == 1)
            $conditions[] = "Charge.charged_grade<=10";
        elseif ($empType == 2)
            $conditions[] = "Charge.charged_grade>7";
        else
            $charges = NULL;
        $conditions[] = "Charge.type = $chargeType";
        $this->Charge->bindModel(array('belongsTo' => array(
                'Employee' => array(
                    'className' => 'Employee',
                    'foreignKey' => 'employee_id',
                    'conditions' => array("Employee.status != 0"),
                    "fields" => array("first_name", "middle_name", "last_name", "designation_id", "type"),
                    'dependent' => true
        ))));
        $charges = $this->Charge->find('all', array("conditions" => $conditions, "order" => array("Charge.taken DESC", "Charge.charged_grade ASC")));
        $this->set('charges', $charges);
        $this->set("empType", $empType);
        $this->set("chargeType", $chargeType);
        //pr($charges); 
        $this->Session->delete("Message");
    }

    public function changeAlowance($id) {
        $charge = $this->Charge->find('first', array("conditions" => "Charge.id = $id", "fields" => array("id", "taken", "released", "on_charge", "amount", "employee_id", "type", "status")));
        $this->Salary->bindModel(array('belongsTo' => array(
                'Employee' => array(
                    'className' => 'Employee',
                    'foreignKey' => 'employee_id',
                    'conditions' => array("Employee.status != 0"),
                    'dependent' => true
        ))));
        $salary = $this->Salary->find("first", array("conditions" => "Salary.employee_id = " . $charge["Charge"]["employee_id"], "fields" => array("id", "charge", "basic", "total_add", "Employee.type")));
        if (!empty($charge["Charge"]["released"])) {
            $salary["Salary"]["charge"] = $salary["Salary"]["charge"] + $charge["Charge"]["amount"];
            $charge["Charge"]["status"] = 1;
        } else { //echo "released empty";
            $settingInfo = $this->Session->read("SETTING_INFO");
            $current = $settingInfo["execution_date"];
            //$current = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y")); 
            $taken = date("d-m-Y", $charge["Charge"]["taken"]);
            $taken = explode("-", $taken);
            if ($charge["Charge"]["taken"] < $current) {
                $endDate = date('d-m-Y', mktime(0, 0, 0, date('m', $current) + 1, 0, date('Y', $current)));
                $endDate = explode("-", $endDate);
                if ($taken[1] == $endDate[1] AND $charge["Charge"]["status"] == 0) { // same month and not payment yet
                    $salary["Salary"]["charge"] = $salary["Salary"]["charge"] + $charge["Charge"]["amount"];
                    $salary["Salary"]["total_add"] = $salary["Salary"]["total_add"] + $charge["Charge"]["amount"];
                    $charge["Charge"]["status"] = 2;
                } elseif ($taken[1] != $endDate[1] AND $charge["Charge"]["status"] == 2) { // next month and payment continued
                    $onCharge = $endDate[0];
                    $amount = round(($salary["Salary"]["basic"] / $endDate[0] * $onCharge) * .1);
                    if ($amount > 1500)
                        $amount = 1500;
                    $salary["Salary"]["charge"] = $salary["Salary"]["charge"] + $amount;
                    $salary["Salary"]["total_add"] = $salary["Salary"]["total_add"] + $amount;
                    $charge["Charge"]["amount"] = $charge["Charge"]["amount"] + $amount;
                    $charge["Charge"]["on_charge"] = $charge["Charge"]["on_charge"] + $onCharge;
                }elseif ($taken[1] != $endDate[1] AND $charge["Charge"]["status"] == 0) { // prev month and payment continued
                    $onCharge = $endDate[0];
                    $amount = round(($salary["Salary"]["basic"] / $endDate[0] * $onCharge) * .1);
                    if ($amount > 1500)
                        $amount = 1500;
                    $salary["Salary"]["charge"] = $salary["Salary"]["charge"] + $amount;
                    $salary["Salary"]["total_add"] = $salary["Salary"]["total_add"] + $amount;
                    $charge["Charge"]["status"] = 2;
                    $charge["Charge"]["amount"] = $charge["Charge"]["amount"] + $amount;
                    $charge["Charge"]["on_charge"] = $charge["Charge"]["on_charge"] + $onCharge;
                }
            }
        }
        if ($this->Salary->save($salary) AND $this->Charge->save($charge)) {
            $this->redirect("/salaryManagements/charges/" . $salary["Employee"]["type"] . "/" . $charge["Charge"]["type"]);
        }
    }

    public function deputationRelease($id) {
        $this->designations();
        if (!empty($this->data)) {
            $date = explode('-', $this->data["Fixation"]["execution_date"]);
            $releaseDate = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
            $data["released"] = $releaseDate;
            $deputation = $this->Deputation->find("first", array("conditions" => "Deputation.id = $id", "fields" => array("id", "taken", "released", "amount", "basic", "on_charge", "type", "status", "employee_id")));
            $salary = $this->Salary->find("first", array("conditions" => "Salary.employee_id = " . $deputation["Deputation"]["employee_id"], "fields" => array("id", "basic", "charge", "updated", "grade")));
            $deduction = $this->Deduction->find("first", array("conditions" => "Deduction.salary_id = " . $salary["Salary"]["id"], "fields" => array("id", "overdrawn")));
            $settingInfo = $this->Session->read("SETTING_INFO");
            $currentTime = $settingInfo["execution_date"];
            $currentTime = mktime(0, 0, 0, date('m', $currentTime), date("d"), date('Y', $currentTime));
            //$currentTime = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
            if (!empty($deputation) AND $releaseDate <= $currentTime AND $releaseDate > $deputation["Deputation"]["taken"]) {
                $taken = explode("-", date("d-m-Y", $deputation["Deputation"]["taken"]));
                $endDate = date('d-m-Y', mktime(0, 0, 0, date('m', $releaseDate) + 1, 0, date('Y', $releaseDate)));
                $endDate = explode("-", $endDate);
                if ($taken[1] == $date[1]) { // same month
                    $onCharge = floor(($releaseDate - $deputation["Deputation"]["taken"]) / (60 * 60 * 24)) + 1;
                    $amount = round(($salary["Salary"]["basic"] / $endDate[0] * $onCharge) * .1);
                } else { // next month
                    $onCharge = floor(($releaseDate - mktime(0, 0, 0, date('m', $releaseDate), 01, date('Y', $releaseDate))) / (60 * 60 * 24)) + 1;
                    $amount = round(($salary["Salary"]["basic"] / $endDate[0] * $onCharge) * .1);
                }
                $endDate = mktime(0, 0, 0, $endDate[1], $endDate[0], $endDate[2]);
                if ($taken[1] == $date[1] AND $amount < $deputation["Deputation"]["amount"]) {
                    $data["amount"] = $amount;
                    $data["on_charge"] = $onCharge;
                    $basic = explode("(", $deputation["Deputation"]["basic"]);
                    if ($salary["Salary"]["basic"] == $basic[0] AND $onCharge != $deputation["Deputation"]["on_charge"]) {
                        $data["basic"] = $basic[0] . "(" . $onCharge . ")";
                    } elseif ($salary["Salary"]["basic"] != $basic[0]) {
                        $data["basic"] = $deputation["Deputation"]["basic"] . "-" . $salary["Salary"]["basic"] . "(" . $onCharge . ")";
                    }
                } elseif ($releaseDate <= $salary["Salary"]["updated"] AND $taken[1] != $date[1]) {
                    $data["amount"] = $deputation["Deputation"]["amount"] + $amount;
                    $data["on_charge"] = $deputation["Deputation"]["on_charge"] + $onCharge;
                    $basic = explode("(", $deputation["Deputation"]["basic"]);
                    if ($salary["Salary"]["basic"] == $basic[0] AND $data["on_charge"] != $deputation["Deputation"]["on_charge"]) {
                        $data["basic"] = $basic[0] . "(" . $data["on_charge"] . ")";
                    } elseif ($salary["Salary"]["basic"] != $basic[0]) {
                        $data["basic"] = $deputation["Deputation"]["basic"] . "-" . $salary["Salary"]["basic"] . "(" . $data["on_charge"] . ")";
                    }
                }
                $employee["Employee"]["id"] = $deputation["Deputation"]["employee_id"];
                $employee["Employee"]["status"] = 1; // aditional charge
                $employee["Employee"]["id"] = $salary["Salary"]["id"];
                $employee["Salary"]["status"] = 1; // aditional charge
                $data["id"] = $deputation["Deputation"]["id"];
                if ($deputation["Deputation"]["status"] == 1 OR $deputation["Deputation"]["status"] == 2)
                    $data["status"] = 0;
                else
                    $data["status"] = 3;
            }

            //pr($this->data); pr($data); pr($employee); echo "current:".date("d-m-Y",$currentTime);  echo "charged:".date("d-m-Y",$releaseDate); echo "</br/>taken".date("d-m-Y",$deputation["Deputation"]["taken"]); die();
            if ($this->Deputation->save($data) AND $this->Employee->save($employee["Employee"]) AND $this->Salary->save($employee["Salary"])) {
                $this->redirect("/salaryManagements/deputations/" . $deputation["Deputation"]["type"]);
            }
        }
        $this->Deputation->bindModel(array('belongsTo' => array(
                'Employee' => array(
                    'className' => 'Employee',
                    'foreignKey' => 'employee_id',
                    'conditions' => array("Employee.status != 0"),
                    "fields" => array("first_name", "middle_name", "last_name", "designation_id"),
                    'dependent' => true
        ))));
        $this->data = $this->Deputation->find("first", array("conditions" => "Deputation.id = $id"));
        $this->set("id", $id);
    }

    public function deputations($type = NULL) {
        $this->adminCheck();
        $this->designations($type);
        $conditions[] = "Deputation.deputate_grade<=10";
        if (!empty($type))
            $conditions[] = "Deputation.type = $type";
        $this->Deputation->bindModel(array('belongsTo' => array(
                'Employee' => array(
                    'className' => 'Employee',
                    'foreignKey' => 'employee_id',
                    'conditions' => array("Employee.status != 0"),
                    "fields" => array("first_name", "middle_name", "last_name", "designation_id"),
                    'dependent' => true
        ))));
        $deputations = $this->Deputation->find('all', array("conditions" => $conditions, "order" => array("Deputation.taken DESC", "Deputation.deputate_grade ASC")));
        $this->set('deputations', $deputations);
        $this->set("type", $type);
        $this->Session->delete("Message");
    }

    public function deputationAlowance($id) {
        $deputation = $this->Deputation->find('first', array("conditions" => "Deputation.id = $id", "fields" => array("id", "taken", "released", "on_charge", "amount", "employee_id", "type", "status", "percentage", "percentage2")));
        $this->Salary->bindModel(array('hasOne' => array(
                'Deduction' => array(
                    'className' => 'Deduction',
                    'foreignKey' => 'salary_id',
                    'conditions' => array("Salary.status != 0"),
                    'dependent' => true
        ))));
        $salary = $this->Salary->find("first", array("conditions" => "Salary.employee_id = " . $deputation["Deputation"]["employee_id"], "fields" => array("id", "charge", "basic", "payable", "in_word", "Deduction.cpf1", "Deduction.cpf2", "Deduction.total_sub")));
        if (!empty($deputation["Deputation"]["released"])) {
            $salary["Salary"]["charge"] = $salary["Salary"]["charge"] + $deputation["Deputation"]["amount"];
            $deputation["Deputation"]["status"] = 0;
        } else {
            // need check
            $settingInfo = $this->Session->read("SETTING_INFO");
            $exD = $settingInfo["execution_date"];
            $current = mktime(0, 0, 0, date('m', $exD), date("d"), date('Y', $exD));
            //pr(date("d-m-Y",$exD)); die();
            //$current = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y")); 
            $taken = date("d-m-Y", $deputation["Deputation"]["taken"]);
            $taken = explode("-", $taken);
            if ($deputation["Deputation"]["taken"] < $current) {
                $endDate = date('d-m-Y', mktime(0, 0, 0, date('m', $current) + 1, 0, date('Y', $current)));
                $endDate = explode("-", $endDate);
                if ($taken[1] == $endDate[1] AND $deputation["Deputation"]["status"] == 0) { // same month
                    $salary["Salary"]["charge"] = $salary["Salary"]["charge"] + $deputation["Deputation"]["amount"];
                    $deputation["Deputation"]["status"] = 2;
                } elseif ($taken[1] != $endDate[1] AND $deputation["Deputation"]["status"] == 2) { // next month
                    $onCharge = $endDate[0];
                    $amount = round(($salary["Salary"]["basic"] / $endDate[0] * $onCharge) * .1);
                    $salary["Salary"]["charge"] = $salary["Salary"]["charge"] + $amount;
                    //$charge["Charge"]["status"] = 1;
                    $deputation["Deputation"]["amount"] = $deputation["Deputation"]["amount"] + $amount;
                    $deputation["Deputation"]["on_charge"] = $deputation["Deputation"]["on_charge"] + $onCharge;
                }
            }
            $deputation["Deputation"]["status"] = 2; // payment continued
        }
        //pr($salary);
        $p1 = $salary["Salary"]["basic"] * $deputation["Deputation"]["percentage"] / 100;
        $salary["Deduction"]["total_sub"] = $salary["Deduction"]["total_sub"] - $salary["Deduction"]["cpf1"] + $p1;
        $salary["Salary"]["payable"] = $salary["Salary"]["payable"] + $salary["Deduction"]["cpf1"] - $p1;
        $salary["Deduction"]["cpf1"] = $p1;
        //pr($deputation);
        if (isset($deputation["Deputation"]["percentage2"])) {
            $p2 = $salary["Salary"]["basic"] * $deputation["Deputation"]["percentage2"] / 100;
            $salary["Deduction"]["total_sub"] = $salary["Deduction"]["total_sub"] - $salary["Deduction"]["cpf2"] + $p2;
            $salary["Salary"]["payable"] = $salary["Salary"]["payable"] + $salary["Deduction"]["cpf2"] - $p2;
            $salary["Deduction"]["cpf2"] = $p2;
        }
        $salary["Salary"]["in_word"] = "Tk. " . $this->translateToWords($salary["Salary"]["payable"]) . " only";
        //pr($salary); pr($deputation); die();
        if ($this->Salary->save($salary) AND $this->Deputation->save($deputation)) {
            $this->redirect("/salaryManagements/deputations/" . $deputation["Deputation"]["type"]);
        }
    }

    public function generatedSalaries($type, $val = NULL, $l = NULL) {
        $this->adminCheck();
        $this->designations();
        $userInfo = $this->Session->read("ADMIN_INFO");
        $settingInfo = $this->Session->read("SETTING_INFO");
        $currentTime = $settingInfo["execution_date"];
		
        $start = mktime(0, 0, 0, date('m', $currentTime), 1, date('Y', $currentTime));
        $end = mktime(0, 0, 0, date('m', $currentTime) + 1, 0, date('Y', $currentTime));
		
        if (!empty($val) AND $val == 1) {
            $conditions = NULL;
            $fix = NULL;
            $exM = explode("-", date("d-m-Y", $currentTime)); // execution
            $lM = explode("-", date("d-m-Y", $settingInfo["launch"])); // launch
            if ($lM[1] != $exM[1])
                $fix[] = "Fixation.execution_date >= $start AND Fixation.execution_date < $end"; // changed
            else
                $fix[] = "Fixation.execution_date < $end"; // changed
            $fix[] = "Fixation.status != 0";
            $fixations = $this->Fixation->find("all", array("conditions" => $fix, "order" => "Fixation.updated DESC"));
            $this->Salary->bindModel(array('belongsTo' => array(
                    'Employee' => array(
                        'className' => 'Employee',
                        'foreignKey' => 'employee_id',
                        "fields" => array("id", "total_increment", "status", "type"),
                        'dependent' => true,
                        "conditions" => "Employee.type = $type"
            ))));
            $this->Salary->bindModel(array('hasOne' => array(
                    'Deduction' => array(
                        'className' => 'Deduction',
                        'foreignKey' => 'salary_id',
                        'dependent' => true,
                        "conditions" => "Deduction.status != 0"
            ))));
            $conditions[] = "Salary.status != 0";
            $conditions[] = "Employee.type = $type";
            $salaries = $this->Salary->find("all", array("conditions" => $conditions));
            $this->GeneratedSalary->bindModel(array('hasOne' => array(
                    'GeneratedDeduction' => array(
                        'className' => 'GeneratedDeduction',
                        'foreignKey' => 'generated_salary_id',
                        'dependent' => true
            ))));
            $gs = $this->GeneratedSalary->find("all", array("conditions" => "GeneratedSalary.execution_date >= $start AND GeneratedSalary.execution_date < $end AND GeneratedSalary.status != 0 AND GeneratedSalary.type = $type"));
			//pr($salaries);
			foreach ($salaries as $salary) {
                if (empty($gs)) {
                    $salary["Salary"]["salary_id"] = $salary["Salary"]["id"];
                    $salary["Salary"]["type"] = $salary["Employee"]["type"];
                    $salary["Deduction"]["deduction_id"] = $salary["Deduction"]["id"];
                    $salary["Deduction"]["type"] = $salary["Employee"]["type"];
                    $sId = $salary["Salary"]["id"];
                    unset($salary["Salary"]["id"]);
                    unset($salary["Deduction"]["id"]);
                    if (empty($l))
                        $salary["Salary"]["updated"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                    else
                        $salary["Salary"]["updated"] = $l;
                    $salary["Deduction"]["updated"] = $salary["Salary"]["updated"];
                    $salary["Salary"]["terminal"] = $_SERVER['REMOTE_ADDR'];
                    $salary["Deduction"]["terminal"] = $salary["Salary"]["terminal"];
                }
                if (!empty($fixations)) {
                    foreach ($fixations as $fixation) {
                        if (!empty($gs) AND ! empty($fixation["Fixation"]["salary_id"]) AND $salary["Salary"]["id"] == $fixation["Fixation"]["salary_id"] AND $salary["Employee"]["status"] != 4) { //4 = Deputation
                            //1 = Regular, 2 = Increment, 3 = Promotion, 4 = Ad Ch, 5 = CC, 6 = Selection Grade, 
                            //7 = Time Scale, 8 = Deputate to other, 9 = Deputate from other/ Edu, 10 = Lien, 11 = PRL, 
                            //12 = Died, 13 = Resign 
                            //0 = Not Genereated(Retired, Resign)
                            if ($fixation["Fixation"]["status"] == 2) { // increment
                                $increment = $this->Increment->find("first", array("conditions" => "Increment.employee_id = " . $salary["Salary"]["employee_id"]));
                                $salary["Salary"]["basic"] = $salary["Salary"]["basic"] - $salary["Employee"]["total_increment"] + $increment["Increment"]["amount"];
                            } elseif ($fixation["Fixation"]["status"] == 3) { // Promotion
                                $promotion = $this->Promotion->find("first", array("conditions" => "Promotion.employee_id = " . $salary["Salary"]["employee_id"]));
                                $salary["Salary"]["basic"] = $salary["Salary"]["basic"] - $salary["Employee"]["total_increment"] + $promotion["Promotion"]["amount"];
                            }
                            $salary["Salary"]["updated"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                            $salary["Deduction"]["updated"] = $salary["Salary"]["updated"];
                        } elseif (!empty($gs) AND ! empty($fixation["Fixation"]["salary_id"]) AND $salary["Salary"]["id"] == $fixation["Fixation"]["salary_id"] AND $salary["Employee"]["status"] == 4) {
                            //1 = Regular, 2 = Increment, 3 = Promotion, 4 = Ad Ch, 5 = CC, 6 = Selection Grade, 
                            //7 = Time Scale, 8 = Deputate to other, 9 = Deputate from other/ Edu, 10 = Lien, 11 = PRL,
                            //12 = Died, 13 = Resign  
                            //0 = Not Genereated(Retired, Resign)
                            $deputation = $this->Deputation->find("first", array("conditions" => "Deputation.employee_id = " . $salary["Salary"]["employee_id"], "fields" => array("id", "type"))); //2 = Deputate to other org.
                            if ($deputation["Deputation"]["type"] != 2 AND $fixation["Fixation"]["status"] == 2) { // increment
                                $increment = $this->Increment->find("first", array("conditions" => "Increment.employee_id = " . $salary["Salary"]["employee_id"]));
                                $salary["Salary"]["basic"] = $salary["Salary"]["basic"] - $salary["Employee"]["total_increment"] + $increment["Increment"]["amount"];
                            } elseif ($deputation["Deputation"]["type"] != 2 AND $fixation["Fixation"]["status"] == 3) { // Promotion
                                $promotion = $this->Promotion->find("first", array("conditions" => "Promotion.employee_id = " . $salary["Salary"]["employee_id"]));
                                $salary["Salary"]["basic"] = $salary["Salary"]["basic"] - $salary["Employee"]["total_increment"] + $promotion["Promotion"]["amount"];
                            }
                            $salary["Salary"]["updated"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                            $salary["Deduction"]["updated"] = $salary["Salary"]["updated"];
                        } else {
                            $salary["Salary"]["updated"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                            $salary["Deduction"]["updated"] = $salary["Salary"]["updated"];
                        }
                        if ($fixation["Fixation"]["status"] == 8) { // Retired
                            $retirement = $this->Retirement->find("first", array("conditions" => "Retirement.employee_id = " . $salary["Salary"]["employee_id"]));
                            if (!empty($retirement)) {
                                $date = explode("-", date("d-m-Y", $retirement["Retirement"]["execution_date"]));
                                $end = explode("-", date('d-m-Y', mktime(0, 0, 0, date('m', $retirement["Retirement"]["execution_date"]) + 1, 0, date('Y', $retirement["Retirement"]["execution_date"]))));
                                $salary["Salary"]["total_add"] = $salary["Salary"]["total_add"] - $salary["Salary"]["basic"] - $salary["Salary"]["house_rent"] - $salary["Salary"]["medical"] - $salary["Salary"]["edu"] - $salary["Salary"]["dearness"] - $salary["Salary"]["conveyance"] - $salary["Salary"]["tiffin"] - $salary["Salary"]["washing"] - $salary["Salary"]["aid"] - $salary["Salary"]["sumptuary"];
                                $salary["Deduction"]["total_sub"] = $salary["Deduction"]["total_sub"] - $salary["Deduction"]["cpf1"] - $salary["Deduction"]["cpf2"];
                                $salary["Salary"]["basic"] = round($salary["Salary"]["basic"] / $end[0] * $date [0], 0);
                                $salary["Salary"]["house_rent"] = round($salary["Salary"]["house_rent"] / $end[0] * $date [0], 0);
                                $salary["Salary"]["medical"] = round($salary["Salary"]["medical"] / $end[0] * $date [0], 0);
                                $salary["Salary"]["edu"] = round($salary["Salary"]["edu"] / $end[0] * $date [0], 0);
                                $salary["Salary"]["dearness"] = round($salary["Salary"]["dearness"] / $end[0] * $date [0], 0);
                                $salary["Salary"]["conveyance"] = round($salary["Salary"]["conveyance"] / $end[0] * $date [0], 0);
                                $salary["Salary"]["tiffin"] = round($salary["Salary"]["tiffin"] / $end[0] * $date [0], 0);
                                $salary["Salary"]["washing"] = round($salary["Salary"]["washing"] / $end[0] * $date [0], 0);
                                $salary["Salary"]["aid"] = round($salary["Salary"]["aid"] / $end[0] * $date [0], 0);
                                $salary["Salary"]["sumptuary"] = round($salary["Salary"]["sumptuary"] / $end[0] * $date [0], 0);
                                $salary["Deduction"]["cpf1"] = round($salary["Deduction"]["cpf1"] / $end[0] * $date [0], 0);
                                $salary["Deduction"]["cpf2"] = round($salary["Deduction"]["cpf2"] / $end[0] * $date [0], 0);
                                $salary["Salary"]["total_add"] = $salary["Salary"]["total_add"] + $salary["Salary"]["basic"] + $salary["Salary"]["house_rent"] + $salary["Salary"]["medical"] + $salary["Salary"]["edu"] + $salary["Salary"]["dearness"] + $salary["Salary"]["conveyance"] + $salary["Salary"]["tiffin"] + $salary["Salary"]["washing"] + $salary["Salary"]["aid"] + $salary["Salary"]["sumptuary"];
                                $salary["Deduction"]["total_sub"] = $salary["Deduction"]["total_sub"] + $salary["Deduction"]["cpf1"] + $salary["Deduction"]["cpf2"];
                                $salary["Salary"]["payable"] = $salary["Salary"]["total_add"] - $salary["Deduction"]["total_sub"];
                                $salary["Salary"]["in_word"] = $this->translateToWords($salary["Salary"]["payable"]);
                            }
                        } elseif ($fixation["Fixation"]["status"] == 12) { // Died
                            $retirement = $this->Retirement->find("first", array("conditions" => "Retirement.employee_id = " . $salary["Salary"]["employee_id"]));
                            if (!empty($retirement)) {
                                //pr($salary); die();
                                $date = explode("-", date("d-m-Y", $retirement["Retirement"]["execution_date"]));
                                $end = explode("-", date('d-m-Y', mktime(0, 0, 0, date('m', $retirement["Retirement"]["execution_date"]) + 1, 0, date('Y', $retirement["Retirement"]["execution_date"]))));
                                $salary["Salary"]["total_add"] = $salary["Salary"]["total_add"] - $salary["Salary"]["basic"] - $salary["Salary"]["house_rent"] - $salary["Salary"]["medical"] - $salary["Salary"]["edu"] - $salary["Salary"]["dearness"] - $salary["Salary"]["conveyance"] - $salary["Salary"]["tiffin"] - $salary["Salary"]["washing"] - $salary["Salary"]["aid"] - $salary["Salary"]["sumptuary"];
                                $salary["Deduction"]["total_sub"] = $salary["Deduction"]["total_sub"] - $salary["Deduction"]["cpf1"] - $salary["Deduction"]["cpf2"];
                                $salary["Salary"]["basic"] = round($salary["Salary"]["basic"] / $end[0] * $date [0], 0);
                                $salary["Salary"]["house_rent"] = round($salary["Salary"]["house_rent"] / $end[0] * $date [0], 0);
                                $salary["Salary"]["medical"] = round($salary["Salary"]["medical"] / $end[0] * $date [0], 0);
                                $salary["Salary"]["edu"] = round($salary["Salary"]["edu"] / $end[0] * $date [0], 0);
                                $salary["Salary"]["dearness"] = round($salary["Salary"]["dearness"] / $end[0] * $date [0], 0);
                                $salary["Salary"]["conveyance"] = round($salary["Salary"]["conveyance"] / $end[0] * $date [0], 0);
                                $salary["Salary"]["tiffin"] = round($salary["Salary"]["tiffin"] / $end[0] * $date [0], 0);
                                $salary["Salary"]["washing"] = round($salary["Salary"]["washing"] / $end[0] * $date [0], 0);
                                $salary["Salary"]["aid"] = round($salary["Salary"]["aid"] / $end[0] * $date [0], 0);
                                $salary["Salary"]["sumptuary"] = round($salary["Salary"]["sumptuary"] / $end[0] * $date [0], 0);
                                $salary["Deduction"]["cpf1"] = round($salary["Deduction"]["cpf1"] / $end[0] * $date [0], 0);
                                $salary["Deduction"]["cpf2"] = round($salary["Deduction"]["cpf2"] / $end[0] * $date [0], 0);
                                $salary["Salary"]["total_add"] = $salary["Salary"]["total_add"] + $salary["Salary"]["basic"] + $salary["Salary"]["house_rent"] + $salary["Salary"]["medical"] + $salary["Salary"]["edu"] + $salary["Salary"]["dearness"] + $salary["Salary"]["conveyance"] + $salary["Salary"]["tiffin"] + $salary["Salary"]["washing"] + $salary["Salary"]["aid"] + $salary["Salary"]["sumptuary"];
                                $salary["Deduction"]["total_sub"] = $salary["Deduction"]["total_sub"] + $salary["Deduction"]["cpf1"] + $salary["Deduction"]["cpf2"];
                                $salary["Salary"]["payable"] = $salary["Salary"]["total_add"] - $salary["Deduction"]["total_sub"];
                                $salary["Salary"]["in_word"] = $this->translateToWords($salary["Salary"]["payable"]);
                            }
                        } elseif ($fixation["Fixation"]["status"] == 13) { // Resign
                            $retirement = $this->Retirement->find("first", array("conditions" => "Retirement.employee_id = " . $salary["Salary"]["employee_id"]));
                            if (!empty($retirement)) {
                                $date = explode("-", date("d-m-Y", $retirement["Retirement"]["execution_date"]));
                                $end = explode("-", date('d-m-Y', mktime(0, 0, 0, date('m', $retirement["Retirement"]["execution_date"]) + 1, 0, date('Y', $retirement["Retirement"]["execution_date"]))));
                                $salary["Salary"]["total_add"] = $salary["Salary"]["total_add"] - $salary["Salary"]["basic"] - $salary["Salary"]["house_rent"] - $salary["Salary"]["medical"] - $salary["Salary"]["edu"] - $salary["Salary"]["dearness"] - $salary["Salary"]["conveyance"] - $salary["Salary"]["tiffin"] - $salary["Salary"]["washing"] - $salary["Salary"]["aid"] - $salary["Salary"]["sumptuary"];
                                $salary["Deduction"]["total_sub"] = $salary["Deduction"]["total_sub"] - $salary["Deduction"]["cpf1"] - $salary["Deduction"]["cpf2"];
                                $salary["Salary"]["basic"] = round($salary["Salary"]["basic"] / $end[0] * $date [0], 0);
                                $salary["Salary"]["house_rent"] = round($salary["Salary"]["house_rent"] / $end[0] * $date [0], 0);
                                $salary["Salary"]["medical"] = round($salary["Salary"]["medical"] / $end[0] * $date [0], 0);
                                $salary["Salary"]["edu"] = round($salary["Salary"]["edu"] / $end[0] * $date [0], 0);
                                $salary["Salary"]["dearness"] = round($salary["Salary"]["dearness"] / $end[0] * $date [0], 0);
                                $salary["Salary"]["conveyance"] = round($salary["Salary"]["conveyance"] / $end[0] * $date [0], 0);
                                $salary["Salary"]["tiffin"] = round($salary["Salary"]["tiffin"] / $end[0] * $date [0], 0);
                                $salary["Salary"]["washing"] = round($salary["Salary"]["washing"] / $end[0] * $date [0], 0);
                                $salary["Salary"]["aid"] = round($salary["Salary"]["aid"] / $end[0] * $date [0], 0);
                                $salary["Salary"]["sumptuary"] = round($salary["Salary"]["sumptuary"] / $end[0] * $date [0], 0);
                                $salary["Deduction"]["cpf1"] = round($salary["Deduction"]["cpf1"] / $end[0] * $date [0], 0);
                                $salary["Deduction"]["cpf2"] = round($salary["Deduction"]["cpf2"] / $end[0] * $date [0], 0);
                                $salary["Salary"]["total_add"] = $salary["Salary"]["total_add"] + $salary["Salary"]["basic"] + $salary["Salary"]["house_rent"] + $salary["Salary"]["medical"] + $salary["Salary"]["edu"] + $salary["Salary"]["dearness"] + $salary["Salary"]["conveyance"] + $salary["Salary"]["tiffin"] + $salary["Salary"]["washing"] + $salary["Salary"]["aid"] + $salary["Salary"]["sumptuary"];
                                $salary["Deduction"]["total_sub"] = $salary["Deduction"]["total_sub"] + $salary["Deduction"]["cpf1"] + $salary["Deduction"]["cpf2"];
                                $salary["Salary"]["payable"] = $salary["Salary"]["total_add"] - $salary["Deduction"]["total_sub"];
                                $salary["Salary"]["in_word"] = $this->translateToWords($salary["Salary"]["payable"]);
                            }
                        }
                    }
                } else {
                    if (empty($sId))
                        $sId = $salary["Salary"]["id"];
                    $salary["Salary"]["updated"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                    $salary["Deduction"]["updated"] = $salary["Salary"]["updated"];
                    $gId = $this->GeneratedSalary->find("first", array("conditions" => "GeneratedSalary.salary_id = " . $sId . " AND GeneratedSalary.status != 0", "fields" => array("id")));
                    if (!empty($gId)) {
                        $salary["Salary"]["id"] = $gId["GeneratedSalary"]["id"];
                        $salary["Deduction"]["id"] = $gId["GeneratedSalary"]["id"];
                    }
                }
                $toDate = explode("-", date("d-m-Y", mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"))));
                $ct = $exM;
                $ct[0] = $toDate[0];
                $ct = mktime(0, 0, 0, $ct[1], $ct[0], $ct[2]);
                if (!empty($l)) {
                    $salary["Salary"]["updated"] = $l;
                    $salary["Deduction"]["updated"] = $salary["Salary"]["updated"];
                    $salary["Salary"]["execution_date"] = $ct;
                    $salary["Deduction"]["execution_date"] = $salary["Salary"]["updated"];
                    $this->Session->write("prev", "1");
                }
                $salary["Salary"]["execution_date"] = $ct;
                $generated[] = $salary;
            }
            $i = 0;
            $cpfs = NULL;
            $gs = NULL;
            $gsId = $gs;

            foreach ($generated as $salary) {
                unset($salary["Salary"]["id"]);
                unset($salary["Deduction"]["id"]);
                if (!empty($gsId)) {
                    $salary["Salary"]["id"] = $gsId[$i]["GeneratedSalary"]["id"];
                    $salary["Deduction"]["user_id"] = $gsId[$i]["GeneratedDeduction"]["id"];
                }
                $salary["Salary"]["user_id"] = $userInfo["id"];
                $salary["Deduction"]["user_id"] = $userInfo["id"];
                $gs[]["GeneratedSalary"] = $salary["Salary"];
                $gd[]["GeneratedDeduction"] = $salary["Deduction"];
                $cpf = $this->Cpf->find("first", array("conditions" => "Cpf.employee_id = " . $salary["Employee"]["id"], "fields" => array("id", "cpf1", "cpf2", "arrear_cpf", "updated")));
                if (empty($cpf["Cpf"]["cpf1"]))
                    $cpf["Cpf"]["cpf1"] = 0;
                if (empty($cpf["Cpf"]["cpf2"]))
                    $cpf["Cpf"]["cpf2"] = 0;
                if (empty($cpf["Cpf"]["arrear_cpf"]))
                    $cpf["Cpf"]["arrear_cpf"] = 0;
                $cpf["Cpf"]["cpf1"] = $cpf["Cpf"]["cpf1"] + $salary["Deduction"]["cpf1"];
                $cpf["Cpf"]["cpf2"] = $cpf["Cpf"]["cpf2"] + $salary["Deduction"]["cpf2"];
                $cpf["Cpf"]["arrear_cpf"] = $cpf["Cpf"]["arrear_cpf"] + $salary["Deduction"]["arrear_cpf"];
                $cpf["Cpf"]["user_id"] = $salary["Deduction"]["user_id"];
                $cpf["Cpf"]["employee_id"] = $salary["Deduction"]["employee_id"];
                $cpf["Cpf"]["salary_id"] = $salary["Deduction"]["salary_id"];
                if (empty($cpf["Cpf"]["created"]))
                    $cpf["Cpf"]["created"] = $currentTime;
                $cpf["Cpf"]["updated"] = $currentTime;
                $cpf["Cpf"]["terminal"] = $salary["Deduction"]["terminal"];
                $cpfs[] = $cpf;
                $i++;
            }
            $count = count($gs);
			//pr($gs);exit;
			//test sujon
			$conditions_del = NULL;
			$conditions_del[] = "GeneratedSalary.execution_date between $start AND $end";
			//echo date('m/d/Y', $start); echo date('m/d/Y', $end); echo '---' . date('m/d/Y', 1445065200);
			$this->GeneratedSalary->query("DELETE FROM generated_salaries WHERE  ((execution_date between $start AND $end)  AND (type=$type OR type=0 ))");
			$this->GeneratedDeduction->query("DELETE FROM generated_deductions WHERE  ((execution_date between $start AND $end) AND (type=$type OR type=0 ))");
			//exit;
			//$salariestest = $this->GeneratedSalary->deleteAll(array("GeneratedSalary.type" => $type));
			//$this->GeneratedSalary->query("DELETE FROM generated_salaries WHERE  ((execution_date between $start AND $end) AND type=$type) OR type=0");
			//echo "DELETE FROM generated_salaries WHERE  (execution_date between $start AND $end) AND type=$type";exit;
            $this->GeneratedSalary->saveMany($gs);
            $last = $this->GeneratedSalary->getLastInsertID();
			//echo $last;
            if (!empty($last)) {
                $i = 1;
                foreach ($gd as $g) {
                    $g["GeneratedDeduction"]["generated_salary_id"] = $last - $count + $i;
                    $g["GeneratedDeduction"]["execution_date"] = $ct;
                    $temp[] = $g;
                    $i++;
                }
            }
            //pr($temp);exit;
			$temp[0]['GeneratedDeduction']['total_sub'] = $temp[0]['GeneratedDeduction']['cpf1'] + $temp[0]['GeneratedDeduction']['cpf2'] + $temp[0]['GeneratedDeduction']['cpf_loan1'] + $temp[0]['GeneratedDeduction']['cpf_loan2'] + $temp[0]['GeneratedDeduction']['house_loan'] + $temp[0]['GeneratedDeduction']['vehicle_loan'] + $temp[0]['GeneratedDeduction']['cpf_interest'] + $temp[0]['GeneratedDeduction']['benevolent_fund'] + $temp[0]['GeneratedDeduction']['house_rent_deduct'] + $temp[0]['GeneratedDeduction']['transport_bill'] + $temp[0]['GeneratedDeduction']['personal_vehicle'] + $temp[0]['GeneratedDeduction']['group_insurance'] + $temp[0]['GeneratedDeduction']['phone_bill'] + $temp[0]['GeneratedDeduction']['association']+ $temp[0]['GeneratedDeduction']["w_s"] + $temp[0]['GeneratedDeduction']["fuel"] + $temp[0]['GeneratedDeduction']["arrear_cpf"] + $temp[0]['GeneratedDeduction']["overdrawn"];
            //pr($temp);exit;
			if (!empty($temp)) {
                $i = 0;
                foreach ($temp AS $tmp) {
                    if ($tmp['GeneratedDeduction']['designation_id'] == '') {
                        unset($temp[$i]);
                    }
                    //pr($tmp);
                    $i++;
                }

                $this->GeneratedDeduction->saveMany($temp);
            }

            $i = 0;
            foreach ($cpfs AS $cpf) {
                if ($cpf['Cpf']['employee_id'] == '') {
                    unset($cpfs[$i]);
                }
                $i++;
            }
            //pr($cpfs);exit;
            $this->Cpf->saveAll($cpfs);
            $this->redirect("/salaryManagements/generatedSalaries/" . $type);
            $this->Session->setFlash(array('Data saved successfully.', "Thank you."), 'default', array('class' => 'alert-success'));
        }
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
                    "fields" => array("employee_code", "first_name", "middle_name", "last_name"),
                    'dependent' => true
        ))));
        $this->GeneratedSalary->bindModel(array('hasOne' => array(
                'GeneratedDeduction' => array(
                    'className' => 'GeneratedDeduction',
                    'foreignKey' => 'generated_salary_id',
                    'dependent' => true
        ))));
        //echo $start.'--'.$end;pr($conditions);
        //echo date('m/d/Y', $start);echo date('m/d/Y', $end);
        $salaries = $this->GeneratedSalary->find("all", array("conditions" => $conditions, "order" => array("GeneratedSalary.id ASC", "GeneratedSalary.grade ASC", "GeneratedSalary.designation_id ASC")));
        //pr($salaries);
		 /*echo 'Salary';
          $log = $this->Salary->getDataSource()->getLog(false, false); debug($log);
          echo 'Increment';
          $log = $this->Increment->getDataSource()->getLog(false, false); debug($log);
          echo 'Deputation';
          $log = $this->Deputation->getDataSource()->getLog(false, false); debug($log);
          echo 'Promotion';
          $log = $this->Promotion->getDataSource()->getLog(false, false); debug($log);
          echo 'Retirement';
          $log = $this->Retirement->getDataSource()->getLog(false, false); debug($log);
          echo 'GeneratedDeduction';
          $log = $this->GeneratedDeduction->getDataSource()->getLog(false, false); debug($log);
          echo 'Cpf';
          $log = $this->Cpf->getDataSource()->getLog(false, false); debug($log);
          echo 'GeneratedSalary';
          $log = $this->GeneratedSalary->getDataSource()->getLog(false, false); debug($log);exit; */
        //pr($salaries);exit;
		
        $this->set("salaries", $salaries);
        $this->set("type", $type);
        $this->set("currentTime", $currentTime);
    }

    function previousSalaries($type) {
        $this->adminCheck();
        $this->designations();
        $settingInfo = $this->Session->read("SETTING_INFO");
        $currentTime = $settingInfo["execution_date"];
        $salaries = NULL;
        $this->set("currentTime", $currentTime);
		$enter_date = '';
        if (!empty($this->data["GeneratedSalary"]["start"])) {
			$enter_date = $this->data["GeneratedSalary"]["start"];
			$date = explode('-', $this->data["GeneratedSalary"]["start"]);
			$start1 = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
			
			$start2 = mktime(0, 0, 0, date('m', $start1), 1, date('Y', $start1));
			$end2 = mktime(0, 0, 0, date('m', $start1) + 1, 0, date('Y', $start1));
			
            //pr($this->data); die();
            /*$date = explode('-', $this->data["GeneratedSalary"]["start"]);
            $start = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
            $date = explode('-', $this->data["GeneratedSalary"]["end"]);
            $end = mktime(0, 0, 0, $date[1], $date[0], $date[2]);*/
            $conditions = NULL;
            $conditions[] = "GeneratedSalary.status = 0";
            $conditions[] = "GeneratedDeduction.status = 0";
            $conditions[] = "GeneratedSalary.execution_date >= $start2";
            $conditions[] = "GeneratedSalary.execution_date <= $end2";
            $conditions[] = "Employee.type = $type";
            $this->GeneratedSalary->bindModel(array('belongsTo' => array(
                    'Employee' => array(
                        'className' => 'Employee',
                        'foreignKey' => 'employee_id',
                        "fields" => array("first_name", "middle_name", "last_name", "employee_code"),
                        'dependent' => true
            ))));
            $this->GeneratedSalary->bindModel(array('hasOne' => array(
                    'GeneratedDeduction' => array(
                        'className' => 'GeneratedDeduction',
                        'foreignKey' => 'generated_salary_id',
                        'dependent' => true
            ))));
            $salaries = $this->GeneratedSalary->find("all", array("conditions" => $conditions, "order" => array("GeneratedSalary.id ASC", "GeneratedSalary.grade ASC", "GeneratedSalary.designation_id ASC")));
            $this->set("currentTime", $start2);
        }
        $this->set("salaries", $salaries);
        $this->set("salary_date", $enter_date);
        $this->set("type", $type);
    }
	
	function previoussalaryUsers($type) {
        $this->adminCheck();
        $this->designations();
        $settingInfo = $this->Session->read("SETTING_INFO");
        $currentTime = $settingInfo["execution_date"];
        $salaries = NULL;
        $this->set("currentTime", $currentTime);
		$empp_id = '';
        $start = '';
        $end = '';
		
        if (!empty($this->data["GeneratedSalary"]["start"]) AND ! empty($this->data["GeneratedSalary"]["end"]) AND !empty($this->data["GeneratedSalary"]["employee_id"])) {
			/*$date = explode('-', $this->data["GeneratedSalary"]["start"]);
			echo $start1 = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
			
			$start2 = mktime(0, 0, 0, date('m', $start1), 1, date('Y', $start1));
			$end2 = mktime(0, 0, 0, date('m', $start1) + 1, 0, date('Y', $start1));
			echo date('d-m-Y',$start2);
			echo date('d-m-Y',$end2);exit;*/
            //pr($this->data); die();
			$empp_id = $this->data["GeneratedSalary"]["employee_id"];
            $date = explode('-', $this->data["GeneratedSalary"]["start"]);
            $start = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
            $date = explode('-', $this->data["GeneratedSalary"]["end"]);
            $end = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
            $conditions = NULL;
            $conditions[] = "GeneratedSalary.status = 0";
            $conditions[] = "GeneratedSalary.employee_id = $empp_id";
            $conditions[] = "GeneratedDeduction.status = 0";
            $conditions[] = "GeneratedSalary.execution_date >= $start";
            $conditions[] = "GeneratedSalary.execution_date <= $end";
            $conditions[] = "Employee.type = $type";
            $this->GeneratedSalary->bindModel(array('belongsTo' => array(
                    'Employee' => array(
                        'className' => 'Employee',
                        'foreignKey' => 'employee_id',
                        "fields" => array("first_name", "middle_name", "last_name", "employee_code"),
                        'dependent' => true
            ))));
            $this->GeneratedSalary->bindModel(array('hasOne' => array(
                    'GeneratedDeduction' => array(
                        'className' => 'GeneratedDeduction',
                        'foreignKey' => 'generated_salary_id',
                        'dependent' => true
            ))));
            $salaries = $this->GeneratedSalary->find("all", array("conditions" => $conditions, "order" => array("GeneratedSalary.id ASC", "GeneratedSalary.grade ASC", "GeneratedSalary.designation_id ASC")));
            $this->set("currentTime", $start);
        }
		
		$all_emp = $this->Employee->find("all", array("conditions" => "Employee.type=$type","order" => "Employee.id ASC"));
		$employees = array();
		foreach($all_emp AS $emp){
			$emp_id = $emp['Employee']['id'];
			$name = $emp['Employee']['first_name'] .' '. $emp['Employee']['middle_name'] .' '. $emp['Employee']['last_name'];
			$employees[$emp_id] = $name;
		}
		
		$this->set("employees", $employees);
        $this->set("salaries", $salaries);
        $this->set("type", $type);
        $this->set("start", $start);
        $this->set("end", $end);
        $this->set("empp_id", $empp_id);
    }

	
	function grosstotalYear($type){
		$this->designations();
		$settingInfo = $this->Session->read("SETTING_INFO");
		$currentTime = $settingInfo["execution_date"];
		//$start = mktime(0,0,0,date ('m',$currentTime),1,date ('Y',$currentTime));
		//$end = mktime(0,0,0,date ('m',$currentTime) + 1,0,date ('Y',$currentTime));
		
		if (!empty($this->data["GeneratedSalary"]["start"]) AND ! empty($this->data["GeneratedSalary"]["end"])) {
			
			$this->set("startdate",$this->data["GeneratedSalary"]["start"]);
			$this->set("enddate",$this->data["GeneratedSalary"]["end"]);
			
			$date = explode('-', $this->data["GeneratedSalary"]["start"]);
            $start = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
            $date = explode('-', $this->data["GeneratedSalary"]["end"]);
            $end = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
			
			//Get all the employee id for the TYPE
			$condition1[] = "Employee.type = $type";
			$employees = $this->Employee->find("all",array("conditions"=>$condition1,"fields"=>array("id"),"order"=>array("Employee.id ASC")));
			//pr($employees);
			$total_net_salary = array();
			foreach($employees AS $emp){
				$emp_id = $emp["Employee"]["id"];
				$conditions = NULL;
				$conditions[] = "GeneratedSalary.execution_date between $start AND $end";
				$conditions[] = "Employee.id = $emp_id";
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
				$singlesalary = $this->GeneratedSalary->find("all", array("conditions" => $conditions, "order" => array("GeneratedSalary.id ASC", "GeneratedSalary.grade ASC", "GeneratedSalary.designation_id ASC")));
				//pr($singlesalary);
				//$log = $this->GeneratedSalary->getDataSource()->getLog(false, false); debug($log);exit;
				$emp_net_salary = array();
				$net_salary = array();
				$net_salary['basic'] = $net_salary['house_rent'] = $net_salary['medical'] = $net_salary['pp'] = $net_salary['edu'] = $net_salary['charge'] = $net_salary['dearness'] = $net_salary['conveyance'] = $net_salary['tiffin'] = $net_salary['washing'] = $net_salary['aid'] = $net_salary['sumptuary'] = $net_salary['arrear'] = $net_salary['miscellaneous'] = $net_salary['fraction_increment'] = $net_salary['total_add'] = 0;
				
				$net_deduction = array();
				$net_deduction['cpf1'] = $net_deduction['cpf2'] = $net_deduction['arrear_cpf'] = $net_deduction['cpf_loan1'] = $net_deduction['cpf_loan2'] = $net_deduction['house_loan'] = $net_deduction['vehicle_loan'] = $net_deduction['cpf_interest'] = $net_deduction['h_interest'] = $net_deduction['v_interest'] = $net_deduction['benevolent_fund'] = $net_deduction['house_rent_deduct'] = $net_deduction['transport_bill'] = $net_deduction['personal_vehicle'] = $net_deduction['group_insurance'] = $net_deduction['w_s'] = $net_deduction['fuel'] = $net_deduction['overdrawn'] = $net_deduction['phone_bill'] = $net_deduction['association'] = $net_deduction['tax'] = $net_deduction['miscellaneous_deduct'] = $net_deduction['total_sub'] = 0;
				
				foreach($singlesalary AS $sal){
					$net_salary['basic'] = $net_salary['basic'] + $sal['GeneratedSalary']['basic'];
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
					
					$emp_net_salary = array(
											'employee_code'=>$sal["Employee"]["employee_code"],
											'e_name'=>$sal["Employee"]["first_name"] .' '. $sal["Employee"]["middle_name"] .' '. $sal["Employee"]["last_name"],
											'basic'=>round($net_salary['basic']),
											'house_rent'=>round($net_salary['house_rent']),
											'medical'=>round($net_salary['medical']),
											'pp'=>round($net_salary['pp']),
											'edu'=>round($net_salary['edu']),
											'charge'=>round($net_salary['charge']),
											'dearness'=>round($net_salary['dearness']),
											'conveyance'=>round($net_salary['conveyance']),
											'tiffin'=>round($net_salary['tiffin']),
											'washing'=>round($net_salary['washing']),
											'aid'=>round($net_salary['aid']),
											'sumptuary'=>round($net_salary['sumptuary']),
											'arrear'=>round($net_salary['arrear']),
											'miscellaneous'=>round($net_salary['miscellaneous']),
											'fraction_increment'=>round($net_salary['fraction_increment']),
											'total_add'=>round($net_salary['total_add']),
											'cpf1'=>round($net_deduction['cpf1']),
											'cpf2'=>round($net_deduction['cpf2']),
											'arrear_cpf'=>round($net_deduction['arrear_cpf']),
											'cpf_loan1'=>round($net_deduction['cpf_loan1']),
											'cpf_loan2'=>round($net_deduction['cpf_loan2']),
											'house_loan'=>round($net_deduction['house_loan']),
											'vehicle_loan'=>round($net_deduction['vehicle_loan']),
											'cpf_interest'=>round($net_deduction['cpf_interest']),
											'h_interest'=>round($net_deduction['h_interest']),
											'v_interest'=>round($net_deduction['v_interest']),
											'benevolent_fund'=>round($net_deduction['benevolent_fund']),
											'house_rent_deduct'=>round($net_deduction['house_rent_deduct']),
											'transport_bill'=>round($net_deduction['transport_bill']),
											'personal_vehicle'=>round($net_deduction['personal_vehicle']),
											'group_insurance'=>round($net_deduction['group_insurance']),
											'w_s'=>round($net_deduction['w_s']),
											'fuel'=>round($net_deduction['fuel']),
											'overdrawn'=>round($net_deduction['overdrawn']),
											'phone_bill'=>round($net_deduction['phone_bill']),
											'association'=>round($net_deduction['association']),
											'tax'=>round($net_deduction['tax']),
											'miscellaneous_deduct'=>round($net_deduction['miscellaneous_deduct']),
											'total_sub'=>round($net_deduction['total_sub']),
											);
				}
				array_push($total_net_salary,$emp_net_salary);
			}	
			//pr($total_net_salary);
			$conditions = NULL;
			//$conditions[] = "GeneratedSalary.status != 0";
			//$conditions[] = "GeneratedDeduction.status != 0";
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
			//pr($salaries);
			$net_salary = array();
			$net_salary['basic'] = $net_salary['house_rent'] = $net_salary['medical'] = $net_salary['pp'] = $net_salary['edu'] = $net_salary['charge'] = $net_salary['dearness'] = $net_salary['conveyance'] = $net_salary['tiffin'] = $net_salary['washing'] = $net_salary['aid'] = $net_salary['sumptuary'] = $net_salary['arrear'] = $net_salary['miscellaneous'] = $net_salary['fraction_increment'] = $net_salary['total_add'] = 0;
			
			$net_deduction = array();
			$net_deduction['cpf1'] = $net_deduction['cpf2'] = $net_deduction['arrear_cpf'] = $net_deduction['cpf_loan1'] = $net_deduction['cpf_loan2'] = $net_deduction['house_loan'] = $net_deduction['vehicle_loan'] = $net_deduction['cpf_interest'] = $net_deduction['h_interest'] = $net_deduction['v_interest'] = $net_deduction['benevolent_fund'] = $net_deduction['house_rent_deduct'] = $net_deduction['transport_bill'] = $net_deduction['personal_vehicle'] = $net_deduction['group_insurance'] = $net_deduction['w_s'] = $net_deduction['fuel'] = $net_deduction['overdrawn'] = $net_deduction['phone_bill'] = $net_deduction['association'] = $net_deduction['tax'] = $net_deduction['miscellaneous_deduct'] = $net_deduction['total_sub'] = 0;
			
			$reg_deduction = array();
			$reg_deduction['cpf1'] = $reg_deduction['cpf2'] = $reg_deduction['arrear_cpf'] = $reg_deduction['cpf_loan1'] = $reg_deduction['cpf_loan2'] = $reg_deduction['house_loan'] = $reg_deduction['vehicle_loan'] = $reg_deduction['cpf_interest'] = $reg_deduction['h_interest'] = $reg_deduction['v_interest'] = $reg_deduction['benevolent_fund'] = $reg_deduction['house_rent_deduct'] = $reg_deduction['transport_bill'] = $reg_deduction['personal_vehicle'] = $reg_deduction['group_insurance'] = $reg_deduction['w_s'] = $reg_deduction['fuel'] = $reg_deduction['overdrawn'] = $reg_deduction['phone_bill'] = $reg_deduction['association'] = $reg_deduction['tax'] = $reg_deduction['miscellaneous_deduct'] = $reg_deduction['total_sub'] = 0;
			
			foreach($salaries AS $sal){
				$net_salary['basic'] = $net_salary['basic'] + $sal['GeneratedSalary']['basic'] ;
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
				
			}
			
			$this->set("curdate",$currentTime);
			$this->set("net_salaries",$net_salary);
			$this->set("net_deductions",$net_deduction);		
			$this->set("total_net_salary",$total_net_salary);
			
		}
		$this->set("type",$type);
		
	}
	
	function grosstotalyearPdf($type,$startdate,$enddate,$fileName){
		$this->designations();
		$this->layout="pdf";
		$settingInfo = $this->Session->read("SETTING_INFO");
		$currentTime = $settingInfo["execution_date"];
		//$start = mktime(0,0,0,date ('m',$currentTime),1,date ('Y',$currentTime));
		//$end = mktime(0,0,0,date ('m',$currentTime) + 1,0,date ('Y',$currentTime));
		
			
		$this->set("startdate",$startdate);
		$this->set("enddate",$enddate);
			
		$date = explode('-', $startdate);
        $start = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
        $date = explode('-', $enddate);
        $end = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
		
		
		//Get all the employee id for the TYPE
			$condition1[] = "Employee.type = $type";
			$employees = $this->Employee->find("all",array("conditions"=>$condition1,"fields"=>array("id"),"order"=>array("Employee.id ASC")));
			//pr($employees);
			$total_net_salary = array();
			foreach($employees AS $emp){
				$emp_id = $emp["Employee"]["id"];
				$conditions = NULL;
				$conditions[] = "GeneratedSalary.execution_date between $start AND $end";
				$conditions[] = "Employee.id = $emp_id";
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
				$singlesalary = $this->GeneratedSalary->find("all", array("conditions" => $conditions, "order" => array("GeneratedSalary.id ASC", "GeneratedSalary.grade ASC", "GeneratedSalary.designation_id ASC")));
				//pr($singlesalary);
				
				$emp_net_salary = array();
				$net_salary = array();
				$net_salary['basic'] = $net_salary['house_rent'] = $net_salary['medical'] = $net_salary['pp'] = $net_salary['edu'] = $net_salary['charge'] = $net_salary['dearness'] = $net_salary['conveyance'] = $net_salary['tiffin'] = $net_salary['washing'] = $net_salary['aid'] = $net_salary['sumptuary'] = $net_salary['arrear'] = $net_salary['miscellaneous'] = $net_salary['fraction_increment'] = $net_salary['total_add'] = 0;
				
				$net_deduction = array();
				$net_deduction['cpf1'] = $net_deduction['cpf2'] = $net_deduction['arrear_cpf'] = $net_deduction['cpf_loan1'] = $net_deduction['cpf_loan2'] = $net_deduction['house_loan'] = $net_deduction['vehicle_loan'] = $net_deduction['cpf_interest'] = $net_deduction['h_interest'] = $net_deduction['v_interest'] = $net_deduction['benevolent_fund'] = $net_deduction['house_rent_deduct'] = $net_deduction['transport_bill'] = $net_deduction['personal_vehicle'] = $net_deduction['group_insurance'] = $net_deduction['w_s'] = $net_deduction['fuel'] = $net_deduction['overdrawn'] = $net_deduction['phone_bill'] = $net_deduction['association'] = $net_deduction['tax'] = $net_deduction['miscellaneous_deduct'] = $net_deduction['total_sub'] = 0;
				
				foreach($singlesalary AS $sal){
					$net_salary['basic'] = $net_salary['basic'] + $sal['GeneratedSalary']['basic'];
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
					
					$emp_net_salary = array(
											'employee_code'=>$sal["Employee"]["employee_code"],
											'e_name'=>$sal["Employee"]["first_name"] .' '. $sal["Employee"]["middle_name"] .' '. $sal["Employee"]["last_name"],
											'basic'=>round($net_salary['basic']),
											'house_rent'=>round($net_salary['house_rent']),
											'medical'=>round($net_salary['medical']),
											'pp'=>round($net_salary['pp']),
											'edu'=>round($net_salary['edu']),
											'charge'=>round($net_salary['charge']),
											'dearness'=>round($net_salary['dearness']),
											'conveyance'=>round($net_salary['conveyance']),
											'tiffin'=>round($net_salary['tiffin']),
											'washing'=>round($net_salary['washing']),
											'aid'=>round($net_salary['aid']),
											'sumptuary'=>round($net_salary['sumptuary']),
											'arrear'=>round($net_salary['arrear']),
											'miscellaneous'=>round($net_salary['miscellaneous']),
											'fraction_increment'=>round($net_salary['fraction_increment']),
											'total_add'=>round($net_salary['total_add']),
											'cpf1'=>round($net_deduction['cpf1']),
											'cpf2'=>round($net_deduction['cpf2']),
											'arrear_cpf'=>round($net_deduction['arrear_cpf']),
											'cpf_loan1'=>round($net_deduction['cpf_loan1']),
											'cpf_loan2'=>round($net_deduction['cpf_loan2']),
											'house_loan'=>round($net_deduction['house_loan']),
											'vehicle_loan'=>round($net_deduction['vehicle_loan']),
											'cpf_interest'=>round($net_deduction['cpf_interest']),
											'h_interest'=>round($net_deduction['h_interest']),
											'v_interest'=>round($net_deduction['v_interest']),
											'benevolent_fund'=>round($net_deduction['benevolent_fund']),
											'house_rent_deduct'=>round($net_deduction['house_rent_deduct']),
											'transport_bill'=>round($net_deduction['transport_bill']),
											'personal_vehicle'=>round($net_deduction['personal_vehicle']),
											'group_insurance'=>round($net_deduction['group_insurance']),
											'w_s'=>round($net_deduction['w_s']),
											'fuel'=>round($net_deduction['fuel']),
											'overdrawn'=>round($net_deduction['overdrawn']),
											'phone_bill'=>round($net_deduction['phone_bill']),
											'association'=>round($net_deduction['association']),
											'tax'=>round($net_deduction['tax']),
											'miscellaneous_deduct'=>round($net_deduction['miscellaneous_deduct']),
											'total_sub'=>round($net_deduction['total_sub']),
											);
				}
				array_push($total_net_salary,$emp_net_salary);
			}	
				
		$conditions = NULL;
		$conditions[] = "GeneratedSalary.execution_date between $start AND $end";
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
		$net_salary['basic'] = $net_salary['house_rent'] = $net_salary['medical'] = $net_salary['pp'] = $net_salary['edu'] = $net_salary['charge'] = $net_salary['dearness'] = $net_salary['conveyance'] = $net_salary['tiffin'] = $net_salary['washing'] = $net_salary['aid'] = $net_salary['sumptuary'] = $net_salary['arrear'] = $net_salary['miscellaneous'] = $net_salary['fraction_increment'] = $net_salary['total_add'] = 0;
			
		$net_deduction = array();
		$net_deduction['cpf1'] = $net_deduction['cpf2'] = $net_deduction['arrear_cpf'] = $net_deduction['cpf_loan1'] = $net_deduction['cpf_loan2'] = $net_deduction['house_loan'] = $net_deduction['vehicle_loan'] = $net_deduction['cpf_interest'] = $net_deduction['h_interest'] = $net_deduction['v_interest'] = $net_deduction['benevolent_fund'] = $net_deduction['house_rent_deduct'] = $net_deduction['transport_bill'] = $net_deduction['personal_vehicle'] = $net_deduction['group_insurance'] = $net_deduction['w_s'] = $net_deduction['fuel'] = $net_deduction['overdrawn'] = $net_deduction['phone_bill'] = $net_deduction['association'] = $net_deduction['tax'] = $net_deduction['miscellaneous_deduct'] = $net_deduction['total_sub'] = 0;
		
		foreach($salaries AS $sal){
				$net_salary['basic'] = $net_salary['basic'] + $sal['GeneratedSalary']['basic'] ;
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
				
		}
			
		$this->set("curdate",$currentTime);
		$this->set("net_salaries",$net_salary);
		$this->set("net_deductions",$net_deduction);		
		$this->set("type",$type);
		$this->set("total_net_salary",$total_net_salary);
		
		$_html = $this->_getViewObject()->element('grosstotalyear_pdf');
        $this->create_landscape_pdf($_html);
		
	}
    // checked

    function generatedDetail($id) {
        $salary = NULL;
        $this->designations();
        $settingInfo = $this->Session->read("SETTING_INFO");
        $exTime = $settingInfo["execution_date"];
        $this->set("exTime", $exTime);
        $this->GeneratedSalary->bindModel(array('belongsTo' => array(
                'Employee' => array(
                    'className' => 'Employee',
                    'foreignKey' => 'employee_id',
                    'conditions' => array(),
                    'dependent' => true,
                    "fields" => array("Employee.id","Employee.designation_id", "Employee.first_name", "Employee.middle_name", "Employee.last_name", "Employee.employee_code", "Employee.type")
        ))));
        $this->GeneratedSalary->bindModel(array('belongsTo' => array(
                'EmployeePersonal' => array(
                    'className' => 'EmployeePersonal',
                    'foreignKey' => 'employee_id',
                    'dependent' => true,
        ))));
        $this->GeneratedSalary->bindModel(array('hasOne' => array(
                'GeneratedDeduction' => array(
                    'className' => 'GeneratedDeduction',
                    'foreignKey' => 'generated_salary_id',
                    'dependent' => true,
        ))));
        $salary = $this->GeneratedSalary->find("first", array("conditions" => "GeneratedSalary.id = $id"));
		//$dect = $this->Deduction->find("first", array("conditions" => "Deduction.employee_id = ". $salary['GeneratedSalary']['employee_id']));
		$degig = $this->Designation->find("first", array("conditions" => "Designation.id = ". $salary['Employee']['designation_id']));
		$salary['GeneratedSalary']['grade'] = $degig['Designation']['grade'];
			
        $this->set("salary", $salary);
        //$this->set("deduction", $dect);
        if (!empty($salary)) {
            $payScale = $this->PayScale->find("first", array("conditions" => "PayScale.grade =" . $salary["GeneratedSalary"]["grade"]));
            $this->set("payScale", $payScale["PayScale"]);
            if ($salary["GeneratedDeduction"]["status"] == 1) {
                $this->Loan->bindModel(array('hasOne' => array(
                        'Refund' => array(
                            'className' => 'Refund',
                            'foreignKey' => 'loan_id',
                            'dependent' => true,
                ))));
				$loans = $this->Loan->find("all", array("conditions" => "Loan.employee_id =" . $salary["GeneratedSalary"]["employee_id"] ));
                $this->set("loans", $loans);
            }
        }
		 
    }

    function monthClose($type) {
        $conditions = NULL;
        $settingInfo = $this->Session->read("SETTING_INFO");
        $currentTime = $settingInfo["execution_date"];
        //echo date('m/d/Y', $currentTime);
        $start = mktime(0, 0, 0, date('m', $currentTime), 1, date('Y', $currentTime));
        $end = mktime(0, 0, 0, date('m', $currentTime) + 1, 0, date('Y', $currentTime));
        $next = mktime(0, 0, 0, date('m', $currentTime) + 1, 1, date('Y', $currentTime));
        $settingInfo = $this->Session->read("SETTING_INFO");
        $currentTime = $settingInfo["execution_date"];
        $start = mktime(0, 0, 0, date('m', $currentTime), 1, date('Y', $currentTime));
        $end = mktime(0, 0, 0, date('m', $currentTime) + 1, 0, date('Y', $currentTime));
        //$start = mktime(0,0,0,date ('m'),1,date ('Y'));
        //$end = mktime(0,0,0,date ('m') + 1,0,date ('Y'));
        $fix[] = "Fixation.execution_date >= $start AND Fixation.execution_date < $end"; // changed
        $fix[] = "(Fixation.status = 8 OR Fixation.status  = 12 OR Fixation.status = 13)";
        $fixations = $this->Fixation->find("all", array("conditions" => $fix, "order" => "Fixation.updated DESC"));
        //pr($fixations); die(); /// adjust fixation
        //pr(date("d-m-Y",$start)); pr(date("d-m-Y",$end)); pr(date("d-m-Y",$next)); die();
        //$start = mktime(0,0,0,date ('m'),1,date ('Y'));
        //$end = mktime(0,0,0,date ('m') + 1,0,date ('Y'));
        /* $this->GeneratedSalary->bindModel( array('belongsTo' => array(
          'Employee' => array(
          'className'     => 'Employee',
          'foreignKey'    => 'employee_id',
          'dependent'     => true
          )))); */
        $conditions[] = "GeneratedSalary.execution_date >= $start";
        $conditions[] = "GeneratedSalary.execution_date < $end";
        $conditions[] = "GeneratedSalary.status != 0";
        $this->GeneratedSalary->bindModel(array('hasOne' => array(
                'GeneratedDeduction' => array(
                    'className' => 'GeneratedDeduction',
                    'foreignKey' => 'generated_salary_id',
                    'dependent' => true
        ))));
        // $conditions[] = "Employee.type = $type";
        //pr($conditions);
        $generatedSalaries = $this->GeneratedSalary->find("all", array("conditions" => $conditions, "fields" => array("id", "salary_id", "status", "GeneratedDeduction.id", "GeneratedDeduction.deduction_id", "GeneratedDeduction.status")));
        //$log = $this->GeneratedSalary->getDataSource()->getLog(false, false); debug($log);exit;
        //pr($generatedSalaries); exit;
        $conditions = NULL;
        $gs = NULL;
        $gd = NULL;
        $i = 0;
        $salaries = NULL;
        $this->Salary->bindModel(array('hasOne' => array(
                'Deduction' => array(
                    'className' => 'Deduction',
                    'foreignKey' => 'salary_id',
                    'dependent' => true
        ))));
        $conditions = NULL;
        //$conditions = "Salary.id = ".$generated["GeneratedSalary"]["salary_id"];
        $allSalary = $this->Salary->find("all", array("conditions" => $conditions, "fields" => array("id", "basic", "edu", "status", "house_rent", "medical", "pp", "charge", "dearness", "conveyance", "tiffin", "washing", "arrear", "miscellaneous", "deputation", "fraction_increment", "aid", "sumptuary", "Deduction.cpf1", "Deduction.cpf2", "Deduction.arrear_cpf", "Deduction.cpf_loan1", "Deduction.cpf_loan2", "Deduction.house_loan", "Deduction.vehicle_loan", "Deduction.cpf_interest", "Deduction.h_interest", "Deduction.v_interest", "Deduction.benevolent_fund", "Deduction.house_rent_deduct", "Deduction.transport_bill", "Deduction.personal_vehicle","Deduction.group_insurance", "Deduction.w_s", "Deduction.fuel", "Deduction.overdrawn", "Deduction.phone_bill", "Deduction.association" , "Deduction.miscellaneous_deduct", "Deduction.tax", "Deduction.id", "employee_id")));
        //pr($generatedSalaries); exit;//pr($allSalary); 
        //die();
		/*foreach($allSalary AS $sal){
			pr($sal['Salary']['id']);
		}
        pr($allSalary);exit;*/
		//pr($allSalary);exit;
        if (!empty($generatedSalaries)) {

            foreach ($generatedSalaries as $generated) { //pr($generated);
                $salary = $allSalary[$i];
                $generated["GeneratedSalary"]["status"] = 0;
                $generated["GeneratedDeduction"]["status"] = 0;
                //$salary["Salary"]["conveyance"] = 0; 
                //$salary["Salary"]["tiffin"] = 0;
                //$salary["Salary"]["washing"] = 0;
                //$salary["Salary"]["arrear"] = 0;
                //$salary["Salary"]["miscellaneous"] = 0;
                //$salary["Salary"]["fraction_increment"] = 0;
                $salary["Salary"]["total_add"] = $salary["Salary"]["basic"] + $salary["Salary"]["house_rent"] + $salary["Salary"]["medical"] + $salary["Salary"]["pp"] + $salary["Salary"]["edu"] + $salary["Salary"]["charge"] + $salary["Salary"]["dearness"] + $salary["Salary"]["deputation"] + $salary["Salary"]["aid"] + $salary["Salary"]["sumptuary"] + $salary["Salary"]["conveyance"] + $salary["Salary"]["tiffin"] + $salary["Salary"]["washing"] + $salary["Salary"]["arrear"] + $salary["Salary"]["miscellaneous"] + $salary["Salary"]["fraction_increment"];
                //$salary["Deduction"]["arrear_cpf"] = 0; 
                //$salary["Deduction"]["transport_bill"] = 0;
                //$salary["Deduction"]["personal_vehicle"] = 0;
                //$salary["Deduction"]["overdrawn"] = 0;
                //$salary["Deduction"]["phone_bill"] = 0;
                //$salary["Deduction"]["tax"] = 0;
                //$salary["Deduction"]["miscellaneous_deduct"] = 0;
                $salary["Deduction"]["total_sub"] = $salary['Deduction']['cpf1'] + $salary['Deduction']['cpf2'] + $salary["Deduction"]["cpf_loan1"] + $salary["Deduction"]["cpf_loan2"] + $salary["Deduction"]["house_loan"] + $salary["Deduction"]["vehicle_loan"] + $salary["Deduction"]["cpf_interest"] + $salary["Deduction"]["h_interest"] + $salary["Deduction"]["v_interest"] + $salary["Deduction"]["benevolent_fund"] + $salary["Deduction"]["house_rent_deduct"] + $salary["Deduction"]["group_insurance"] + $salary["Deduction"]["w_s"] + $salary["Deduction"]["fuel"] + $salary["Deduction"]["association"] + $salary["Deduction"]["arrear_cpf"] + $salary["Deduction"]["transport_bill"] + $salary["Deduction"]["personal_vehicle"] + $salary["Deduction"]["overdrawn"] + $salary["Deduction"]["phone_bill"] + $salary["Deduction"]["miscellaneous_deduct"] + $salary["Deduction"]["tax"];
                $salary["Salary"]["payable"] = $salary["Salary"]["total_add"] - $salary["Deduction"]["total_sub"];
                //echo $salary["Salary"]["total_add"] .'--'. $salary["Deduction"]["total_sub"] .'--'. $salary["Salary"]["payable"];exit;
				$gs[]["GeneratedSalary"] = $generated["GeneratedSalary"];
                $gd[]["GeneratedDeduction"] = $generated["GeneratedDeduction"];
                //pr($gs); pr($gd); die();
                // status update
                if ($salary["Salary"]["status"] == 2 OR $salary["Salary"]["status"] = 3) { // increment or promotion
                    $salary["Salary"]["status"] = 1;
                }
                //pr($fixations); die();
                if (!empty($fixations)) {
                    foreach ($fixations as $fixation) {
                        if ($fixation["Fixation"]["salary_id"] == $salary["Salary"]["id"]) {
                            $this->Employee->bindModel(array('hasOne' => array(
                                    'EmployeePersonal' => array(
                                        'className' => 'EmployeePersonal',
                                        'foreignKey' => 'employee_id',
                                        'dependent' => true
                            ))));
                            $employee = $this->Employee->find("first", array("conditions" => "Employee.id = " . $salary["Salary"]["employee_id"], "fields" => array("id", "status", "EmployeePersonal.id", "EmployeePersonal.status")));
                            $employee["Employee"]["status"] = 0;
                            $employee["EmployeePersonal"]["status"] = 0;
                            $this->Employee->save($employee["Employee"]);
                            $this->EmployeePersonal->save($employee["EmployeePersonal"]);
                            //pr($employee);
                            $salary["Salary"]["status"] = 0;
                            $salary["Deduction"]["status"] = 0;
                            //pr($employee); pr($salary); die();
                        }
                    }
                }
                $salaries[$i]["Salary"] = $salary["Salary"];
                $deductions[$i]["Deduction"] = $salary["Deduction"];
                $i++;
            }
        }
		//pr($salaries);echo'--------------------------';pr($deductions);exit;
        //pr($salaries); pr($deductions);
        //die();
        //pr($salaries); //die();
		
        $temp = $salaries;
        $salaries = NULL;
        $generatedSalaries = NULL;
        foreach ($temp as $salary) {
            $salary["Salary"]["in_word"] = "Tk. " . $this->translateToWords($salary["Salary"]["payable"]) . " only";
            $salaries[] = $salary;
        }
        //pr($gs); pr($gd); die();
        $conditions = NULL;
        $conditions[] = "FestivalAllowance.execution_date >= $start";
        $conditions[] = "FestivalAllowance.execution_date < $end";
        $temps = $this->FestivalAllowance->find("all", array("conditions" => $conditions, "fields" => array("id")));
        $fas = NULL;
        if (!empty($temps)) {
            foreach ($temps as $fa) {
                $fa["FestivalAllowance"]["status"] = 0;
                $fas[]["FestivalAllowance"] = $fa;
            }
        }
        //pr($next); die();
        $setting["Setting"]["id"] = "1";
        $setting["Setting"]["execution_date"] = $next;
        //pr($salaries);echo '-------------'; pr($deductions);echo '-------------'; pr($gs); echo '-------------';pr($gd);exit;
        $i = 0;
        foreach ($gd AS $gds) {
            if ($gds['GeneratedDeduction']['deduction_id'] == '') {
                unset($gd[$i]);
            }
            $i++;
        }
		
		//unset the values when employee status is not active
		$s = 0;
		foreach($deductions AS $duct){
			if($duct['Deduction']['cpf1'] == ''){
				unset($salaries[$s]);
				unset($deductions[$s]);
			}
			
			$s++;
		}
		 
		if ($this->Salary->saveMany($salaries) AND $this->Deduction->saveMany($deductions) AND $this->GeneratedSalary->saveMany($gs) AND $this->GeneratedDeduction->saveMany($gd) AND $this->FestivalAllowance->saveMany($fas) AND $this->Setting->save($setting)) {
			
			//Auto update the loan and refund
			foreach($allSalary AS $sal){
				$ep_id = $sal['Salary']['employee_id'];
				//Get the loan id
				$ln_id = $this->Loan->find('all', array('conditions' => array('Loan.employee_id' => $ep_id)));
				if(!empty($ln_id)){
					//pr($ln_id);
					foreach($ln_id AS $ln){
						if($ln['Loan']['status'] == 0){
							$this->Deduction->query("UPDATE deductions SET cpf_loan1='0' WHERE employee_id='". $ln['Loan']['employee_id'] ."'");
						}
						else{
							$refunds = $this->Refund->find('first', array('conditions' => array('Refund.loan_id' => $ln['Loan']['id'])));
							$paid_amount = $refunds['Refund']['paid_amount'];
							$paid_installment = $refunds['Refund']['paid_installment'];
							$balance = $refunds['Refund']['balance'];
							if($balance == 0){
								$balance = $ln['Loan']['total'];
							}
							else{
								$balance = $refunds['Refund']['balance'];
							}
							
							$interest_installment = $ln['Loan']['interest_installment'];
							$total_interest = $ln['Loan']['total_interest'];
							$paid_interest = $refunds['Refund']['paid_interest'];
							$paid_interest_installment = $refunds['Refund']['paid_interest_installment'];
							$interest_balance = $refunds['Refund']['interest_balance'];
							if($interest_installment > 0)
								$interest_balance1 = $total_interest/$interest_installment;
							
							if($ln['Loan']['total_installment'] == $paid_installment){
								if($interest_installment==$paid_interest_installment){
									if($ln['Loan']['type'] == 1){
										$this->Deduction->query("UPDATE deductions SET cpf_loan1='0' WHERE employee_id='". $ln['Loan']['employee_id'] ."'");
										$this->Loan->query("UPDATE loans SET status='0' WHERE employee_id='". $ln['Loan']['employee_id'] ."' AND type='1'");
									}
									elseif($ln['Loan']['type'] == 2){
										$this->Deduction->query("UPDATE deductions SET cpf_loan2='0' WHERE employee_id='". $ln['Loan']['employee_id'] ."'");
										$this->Loan->query("UPDATE loans SET status='0' WHERE employee_id='". $ln['Loan']['employee_id'] ."' AND type='2'");
									}
									else{
										
									}
								}
								else{
									
									if($paid_interest_installment !=0){
										if($ln['Loan']['type'] == 1){
											$this->Deduction->query("UPDATE deductions SET cpf_loan1='". $interest_balance1 ."' WHERE employee_id='". $ln['Loan']['employee_id'] ."'");
										}
										elseif($ln['Loan']['type'] == 2){
											$this->Deduction->query("UPDATE deductions SET cpf_loan2='". $interest_balance1 ."' WHERE employee_id='". $ln['Loan']['employee_id'] ."'");
										}
										else{
											
										}
									}
									
									$this->Refund->query("UPDATE refunds
													SET paid_interest_installment='". ($paid_interest_installment + 1) ."',paid_interest='". ($paid_interest+$interest_balance1) ."',interest_balance='". ($interest_balance - $interest_balance1)."'
													WHERE loan_id=". $ln['Loan']['id'] .";");
													
									if($paid_interest_installment +1 ==1){
										if($ln['Loan']['type'] == 1){
											$this->Deduction->query("UPDATE deductions SET cpf_loan1='". $interest_balance1 ."' WHERE employee_id='". $ln['Loan']['employee_id'] ."'");
										}
										elseif($ln['Loan']['type'] == 2){
											$this->Deduction->query("UPDATE deductions SET cpf_loan2='". $interest_balance1 ."' WHERE employee_id='". $ln['Loan']['employee_id'] ."'");
										}
										else{
											
										}
									}				
								}
							}
							else{
								//echo "UPDATE Refund SET paid_amount=". $paid_amount + $ln['Loan']['amount'] .",paid_installment=". $paid_installment+1 .",balance=". $balance - $ln['Loan']['amount']." WHERE loan_id=". $ln['Loan']['id'] ;
								$this->Refund->query("UPDATE refunds
													SET paid_amount='". ($paid_amount + $ln['Loan']['amount']) ."',paid_installment='". ($paid_installment+1) ."',balance='". ($balance - $ln['Loan']['amount'])."'
													WHERE loan_id=". $ln['Loan']['id'] .";");
								
								/*if($paid_installment +1 == $ln['Loan']['total_installment']){
									if($ln['Loan']['type'] == 1){
										$this->Deduction->query("UPDATE deductions SET cpf_loan1='". $interest_balance1 ."' WHERE employee_id='". $ln['Loan']['employee_id'] ."'");
									}
									elseif($ln['Loan']['type'] == 2){
										$this->Deduction->query("UPDATE deductions SET cpf_loan2='". $interest_balance1 ."' WHERE employee_id='". $ln['Loan']['employee_id'] ."'");
									}
									else{
										
									}
								}*/
							}
							//pr($refunds['Refund']);
						}
						
					}
				}
				
			}
			
			//End of Auto update the loan and refund
			
            $this->Session->setFlash(array('Data saved successfully.', "Thank you."), 'default', array('class' => 'alert-success'));
            $this->redirect("/salaryManagements/generatedSalaries/" . $type);
        } else {
            $this->Session->setFlash(array('Saving failed.', "Please try again."), 'default', array('class' => 'alert-error'));
        }
    }
	
	
	function closeMonth(){
		
		if(!empty($this->data)){
			$this->monthClose(1);
			$this->monthClose(2);
		}
		$settingInfo = $this->Session->read("SETTING_INFO");
        $currentTime = $settingInfo["execution_date"];
        $this->set("currentTime", $currentTime);
	}

    function closeAll() {
        $this->GeneratedSalary->bindModel(array('hasOne' => array(
                'GeneratedDeduction' => array(
                    'className' => 'GeneratedDeduction',
                    'foreignKey' => 'generated_salary_id',
                    'dependent' => true
        ))));
        $gss = $this->GeneratedSalary->find("all", array("conditions" => "GeneratedSalary.status = 1 OR GeneratedDeduction.status = 1", "fields" => array("id", "status", "GeneratedDeduction.id", "GeneratedDeduction.status")));
        //pr(count($gss));
        //pr($gss);	
        foreach ($gss as $gs) {
            $gs["GeneratedSalary"]["status"] = 0;
            $gs["GeneratedDeduction"]["status"] = 0;
            $generatedSalaries[] = $gs["GeneratedSalary"];
            $generatedDeductions[] = $gs["GeneratedDeduction"];
        }
        //pr($generatedSalaries); pr($generatedDeductions);
        if ($this->GeneratedSalary->saveMany($generatedSalaries) AND $this->GeneratedDeduction->saveMany($generatedDeductions)) {
            $this->Session->setFlash(array('Data saved successfully.', "Thank you."), 'default', array('class' => 'alert-success'));
            $this->redirect("/salaryManagements/generatedSalaries/1");
        } else {
            $this->Session->setFlash(array('Saving failed.', "Please try again."), 'default', array('class' => 'alert-error'));
        }
    }

    function increments($type) {
        $this->designations();
        $increments = NULL;
        $settingInfo = $this->Session->read("SETTING_INFO");
        $launch = $settingInfo["launch"];
        $currentTime = $settingInfo["execution_date"];
        $this->set("currentTime", $currentTime);
        $start = mktime(0, 0, 0, date('m', $currentTime), 1, date('Y', $currentTime));
        $end = mktime(0, 0, 0, date('m', $currentTime) + 1, 0, date('Y', $currentTime));
        if ($launch != $currentTime AND $currentTime > $launch)
            $conditions[] = "Increment.increment_date >= $start";
        $conditions[] = "Increment.increment_date < $end";
        $conditions[] = "Employee.type = $type";
        $conditions[] = "Increment.status = 1";
        $this->Increment->bindModel(array('belongsTo' => array(
                'Employee' => array(
                    'className' => 'Employee',
                    'foreignKey' => 'employee_id',
                    'dependent' => true
        ))));
        $this->Increment->bindModel(array('belongsTo' => array(
                'Salary' => array(
                    'className' => 'Salary',
                    'foreignKey' => 'employee_id',
                    'dependent' => true
        ))));
        //pr($conditions);
        $temp = $this->Increment->find("all", array("conditions" => $conditions));
        foreach ($temp as $increment) {
            $payScale = $this->getScale($increment["Employee"]["pay_scale_id"]);
            $increment["PayScale"] = $payScale["PayScale"];
            $increments[] = $increment;
        }
        //pr($increments); die();
        $this->set("increments", $increments);
        $this->set("type", $type);
    }

    function getScale($grade) {
        $payScale = $this->PayScale->find("first", array("conditions" => "PayScale.grade = $grade", "fields" => array("id", "scale", "increment", "increment_iteration", "eb", "eb_iteration")));
        return $payScale;
    }

    function updateIncrement($employeeId, $type, $id) {
        $this->designations();
        if (!empty($this->data)) {
            $prevInc = $this->Increment->find("first", array("conditions" => "Increment.id = $id"));
            $data = $this->data;
            $date = explode('-', $data["Increment"]["increment_date"]);
            $data["Increment"]["increment_date"] = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
            $data["Increment"]["updated"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
            $data["Increment"]["terminal"] = $_SERVER["REMOTE_ADDR"];
            $endDate = date('d-m-Y', mktime(0, 0, 0, date('m', $data["Increment"]["increment_date"]) + 1, 0, date('Y', $data["Increment"]["increment_date"])));
            $endDate = explode("-", $endDate);
            $days = $endDate[0] - $date[0] + 1;
            $prev = $endDate[0] - $days;
            //pr($date); pr($endDate); pr($prev); pr($days); die();
            $this->Employee->bindModel(array('belongsTo' => array(
                    'PayScale' => array(
                        'className' => 'PayScale',
                        'foreignKey' => 'pay_scale_id',
                        'conditions' => array('Employee.status' => "1"),
                        'dependent' => true
            ))));
            $this->Employee->bindModel(array('hasOne' => array(
                    'Salary' => array(
                        'className' => 'Salary',
                        'foreignKey' => 'employee_id',
                        'conditions' => array("Employee.status != 0"),
                        'dependent' => true
            ))));
            $employee = $this->Employee->find("first", array("conditions" => "Employee.id = $employeeId", "fields" => array("Employee.id", "Employee.total_increment", "Employee.increment_number", "PayScale.scale", "PayScale.increment", "PayScale.increment_iteration", "PayScale.eb", "PayScale.eb_iteration", "Employee.grade", "Employee.designation_id", "Salary.id", "Employee.type")));
            if ($employee["PayScale"]["increment_iteration"] - $employee["Employee"]["increment_number"] >= 0) {
                $amount = round($employee["PayScale"]["increment"] / $endDate[0] * $days, 0);
                $data["Increment"]["amount"] = $employee["Employee"]["total_increment"] - $employee["PayScale"]["increment"] + $amount;
            } elseif ($employee["PayScale"]["increment_iteration"] - $employee["Employee"]["increment_number"] < 0) {
                $amount = round($employee["PayScale"]["eb"] / $endDate[0] * $days, 0);
                $data["Increment"]["amount"] = $employee["Employee"]["total_increment"] - $employee["PayScale"]["eb"] + $amount;
            }
            $data["Increment"]["days"] = $days;
            $data["Increment"]["employee_id"] = $employeeId;
            if ($this->Increment->save($data)) {
                $this->redirect("/salaryManagements/increments/" . $type);
            }
        }
        $this->Increment->bindModel(array('belongsTo' => array(
                'Employee' => array(
                    'className' => 'Employee',
                    'foreignKey' => 'employee_id',
                    'dependent' => true
        ))));
        $this->Increment->bindModel(array('belongsTo' => array(
                'Salary' => array(
                    'className' => 'Salary',
                    'foreignKey' => 'employee_id',
                    'dependent' => true
        ))));
        $this->data = $this->Increment->find("first", array("conditions" => "Increment.id = $id"));
        $this->set("type", $type);
        $this->set("id", $id);
        $this->set("employeeId", $employeeId);
    }

    function statusChange($id, $type) { //2 = Promotion, 3 = Increment, 4 = Aditional Charge, 5 = Current Charge, 6 = Selection Grade, 7 = Time Scale, 9 = Deputation 
    }

    function promotions($type) {
        $this->designations();
        $settingInfo = $this->Session->read("SETTING_INFO");
        $launch = $settingInfo["launch"];
        $currentTime = $settingInfo["execution_date"];
        $start = mktime(0, 0, 0, date('m', $currentTime), 1, date('Y', $currentTime));
        $end = mktime(0, 0, 0, date('m', $currentTime) + 1, 0, date('Y', $currentTime));
        if ($launch != $currentTime AND $currentTime > $launch)
            $conditions[] = "Promotion.promotion_date >= $start";
        $conditions[] = "Promotion.promotion_date < $end";
        $conditions[] = "Employee.type = $type";
        $this->Promotion->bindModel(array('belongsTo' => array(
                'Employee' => array(
                    'className' => 'Employee',
                    'foreignKey' => 'employee_id',
                    'dependent' => true
        ))));
        $promotions = $this->Promotion->find("all", array("conditions" => $conditions));
        $this->set("promotions", $promotions);
        $this->set("type", $type);
    }

    function updatePromotion($employeeId, $type, $id) {
        $this->designations($type);
        if (!empty($this->data)) {
            $prevPro = $this->Promotion->find("first", array("conditions" => "Promotion.id = $id"));
            $data = $this->data;
            $date = explode('-', $data["Promotion"]["promotion_date"]);
            $data["Promotion"]["promotion_date"] = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
            $data["Promotion"]["updated"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
            $data["Promotion"]["terminal"] = $_SERVER["REMOTE_ADDR"];
            $endDate = date('d-m-Y', mktime(0, 0, 0, date('m', $data["Promotion"]["promotion_date"]) + 1, 0, date('Y', $data["Promotion"]["promotion_date"])));
            $endDate = explode("-", $endDate);
            $days = $endDate[0] - $date[0] + 1;
            $prev = $endDate[0] - $days;
            $this->Employee->bindModel(array('belongsTo' => array(
                    'PayScale' => array(
                        'className' => 'PayScale',
                        'foreignKey' => 'pay_scale_id',
                        'conditions' => array('Employee.status' => "1"),
                        'dependent' => true
            ))));
            $this->Employee->bindModel(array('hasOne' => array(
                    'Salary' => array(
                        'className' => 'Salary',
                        'foreignKey' => 'employee_id',
                        'conditions' => array('Employee.status' => "1"),
                        'dependent' => true
            ))));
            $employee = $this->Employee->find("first", array("conditions" => "Employee.id = $employeeId", "fields" => array("Employee.id", "Employee.total_increment", "Employee.increment_number", "PayScale.scale", "PayScale.increment", "PayScale.increment_iteration", "PayScale.eb", "PayScale.eb_iteration", "Employee.grade", "Employee.designation_id", "Salary.id", "Salary.basic", "Employee.type")));

            $data["Promotion"]["updated"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
            $data["Promotion"]['terminal'] = $_SERVER['REMOTE_ADDR'];
            $payScale = $this->PayScale->find("first", array("conditions" => "PayScale.grade = " . $data["Promotion"]["grade"]));
            $employee["Employee"]["grade"] = $data["Promotion"]["grade"];
            if (empty($data["Promotion"]["new_designation_id"]))
                $employee["Employee"]["designation_id"] = $data["new_designation_id"];
            else
                $employee["Employee"]["designation_id"] = $data["Promotion"]["new_designation_id"];
            $employee["Employee"]["increment_number"] = 0;
            $employee["Employee"]["pay_scale_id"] = $payScale["PayScale"]["id"];
            $employee["Employee"]["updated"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
            $employee["Employee"]["terminal"] = $_SERVER["REMOTE_ADDR"];
            $employee["Salary"]["updated"] = $employee["Employee"]["updated"];
            $employee["Salary"]["terminal"] = $employee["Employee"]["terminal"];
            $basic = $employee["Salary"]["basic"];
            if ($basic > $payScale["PayScale"]["scale"]) {
                $newBasic = $payScale["PayScale"]["scale"];
                $i = 1;
                while ($newBasic <= $basic) {
                    if ($i <= $payScale["PayScale"]["increment_iteration"] AND $payScale["PayScale"]["increment_iteration"] != 0) {
                        $newBasic = $newBasic + $payScale["PayScale"]["increment"];
                    } elseif ($i > $payScale["PayScale"]["increment_iteration"] AND $payScale["PayScale"]["increment_iteration"] != 0) {
                        if ($payScale["PayScale"]["eb"] == 0)
                            break;
                        else
                            $newBasic = $newBasic + $payScale["PayScale"]["eb"];
                    }else {
                        $employee["Salary"]["pp"] = $employee["Salary"]["basic"] - $payScale["PayScale"]["scale"];
                        $newBasic = $payScale["PayScale"]["scale"];
                        break;
                    }
                    $i++;
                }
            } else {
                $newBasic = $payScale["PayScale"]["scale"];
            }
            $endDate = date('d-m-Y', mktime(0, 0, 0, date('m', $data["Promotion"]["promotion_date"]) + 1, 0, date('Y', $data["Promotion"]["promotion_date"])));
            $endDate = explode("-", $endDate);
            $days = $endDate[0] - $date[0] + 1;
            $prev = $endDate[0] - $days;
            $employee["Employee"]["total_increment"] = $newBasic - $payScale["PayScale"]["scale"];
            $employee["Salary"]["basic"] = $newBasic;
            $employee["Salary"]["status"] = 3; //3 = promotion;
            $employee["Salary"]["grade"] = $data["Promotion"]["grade"];
            if (empty($data["Promotion"]["new_designation_id"]))
                $employee["Salary"]["designation_id"] = $data["new_designation_id"];
            else
                $employee["Salary"]["designation_id"] = $data["Promotion"]["new_designation_id"];
            $scale = $this->PayScale->find("first", array("conditions" => "PayScale.id = " . $employee["Employee"]["pay_scale_id"], "fields" => "scale"));
            $data["Promotion"]["amount"] = round(($employee["PayScale"]["scale"] + $prevPro["Promotion"]["previous_total_increment"]) / $endDate[0] * $prev + ($payScale["PayScale"]["scale"] + $employee["Employee"]["total_increment"]) / $endDate[0] * $days, 0);
            $settingInfo = $this->Session->read("SETTING_INFO");
            $launch = $settingInfo["launch"];
            $currentTime = $settingInfo["execution_date"];
            $start = mktime(0, 0, 0, date('m', $currentTime), 1, date('Y', $currentTime));
            $end = mktime(0, 0, 0, date('m', $currentTime) + 1, 0, date('Y', $currentTime));
            if ($launch != $currentTime AND $currentTime > $launch)
                $conditions[] = "Fixation.execution_date >= $start";
            $conditions[] = "Fixation.execution_date < $end";
            $conditions[] = "Fixation.status = " . $employee["Salary"]["status"];
            $fixation = $this->Fixation->find("first", array("conditions" => $conditions, "fields" => "id"));
            $date = explode('-', $data["Promotion"]["promotion_date"]);
            $fixation["Fixation"]["execution_date"] = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
            $fixation["Fixation"]["updated"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
            $fixation["Fixation"]["terminal"] = $employee["Salary"]["terminal"];
            if ($this->Promotion->save($data) AND $this->Employee->save($employee["Employee"]) AND $this->Salary->save($employee["Salary"]) AND $this->Fixation->save($fixation)) {
                $this->redirect("/salaryManagements/promotions/" . $type);
            }
        }
        $this->Promotion->bindModel(array('belongsTo' => array(
                'Employee' => array(
                    'className' => 'Employee',
                    'foreignKey' => 'employee_id',
                    'dependent' => true
        ))));
        $this->Promotion->bindModel(array('belongsTo' => array(
                'Salary' => array(
                    'className' => 'Salary',
                    'foreignKey' => 'employee_id',
                    'dependent' => true
        ))));
        $this->data = $this->Promotion->find("first", array("conditions" => "Promotion.id = $id"));

        $this->set("type", $type);
        $this->set("id", $id);
        $this->set("employeeId", $employeeId);
    }

    function festivalAllowances($type) {
        $this->designations();
        $settingInfo = $this->Session->read("SETTING_INFO");
        $currentTime = $settingInfo["execution_date"];
        $start = mktime(0, 0, 0, date('m', $currentTime), 1, date('Y', $currentTime));
        $end = mktime(0, 0, 0, date('m', $currentTime) + 1, 0, date('Y', $currentTime));
        //$start = mktime(0,0,0,date ('m'),1,date ('Y'));
        //$end = mktime(0,0,0,date ('m') + 1,0,date ('Y'));
        $conditions[] = "FestivalAllowance.payment_date >= $start";
    	$conditions[] = "FestivalAllowance.payment_date <= $end";
    	$conditions[] = "Employee.type = $type";
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
		
        $this->set("fas", $fas);
        $this->set("type", $type);
    }

    function approveFa($type) {
        $userInfo = $this->Session->read("ADMIN_INFO");
        if (!empty($this->data["FestivalAllowance"]["execution_date"])) {
		
			$timess = strtotime($this->data["FestivalAllowance"]["execution_date"]);
			$start2 = mktime(0, 0, 0, date('m', $timess), 1, date('Y', $timess));
            $end2 = mktime(0, 0, 0, date('m', $timess) + 1, 0, date('Y', $timess));
			$festi = $this->data["FestivalAllowance"]["festival"];
			$allsametypeemp = $this->Employee->find("all", array("conditions" => "Employee.type = $type"));
			foreach($allsametypeemp AS $tyemp){
				$tyempid = $tyemp['Employee']['id'];
				$this->FestivalAllowance->query("DELETE FROM festival_allowances WHERE  ((approve_date between $start2 AND $end2)  AND (festival=$festi) AND ( employee_id=$tyempid ))");
			}
			
            $settingInfo = $this->Session->read("SETTING_INFO");
            $currentTime = $settingInfo["execution_date"];
            $start = mktime(0, 0, 0, date('m', $currentTime), 1, date('Y', $currentTime));
            $end = mktime(0, 0, 0, date('m', $currentTime) + 1, 0, date('Y', $currentTime));
            
            $yStart = mktime(0, 0, 0, 1, 1, date('Y'));
            $yEnd = mktime(0, 0, 0, 13, 0, date('Y'));
            //pr(date("d-m-Y",$start)); pr(date("d-m-Y",$end)); pr(date("d-m-Y",$yStart)); pr(date("d-m-Y",$yEnd)); die();
            $conditions[] = "FestivalAllowance.execution_date >= $yStart";
            $conditions[] = "FestivalAllowance.execution_date < $start";
            $conditions[] = "FestivalAllowance.festival = " . $this->data["FestivalAllowance"]["festival"];
            $prevFas = $this->FestivalAllowance->find("count", array("conditions" => $conditions));
            if ($prevFas == 0) {
                $conditions = NULL;
                $conditions[] = "FestivalAllowance.payment_date >= $start";
                $conditions[] = "FestivalAllowance.payment_date <= $end";
                $conditions[] = "Employee.type = $type";
                if ($this->data["FestivalAllowance"]["festival"] == 1 OR $this->data["FestivalAllowance"]["festival"] == 2)
                    $religion = 1;
                elseif ($this->data["FestivalAllowance"]["festival"] == 3)
                    $religion = 2;
                elseif ($this->data["FestivalAllowance"]["festival"] == 4)
                    $religion = 3;
                elseif ($this->data["FestivalAllowance"]["festival"] == 5)
                    $religion = 4;
                elseif ($this->data["FestivalAllowance"]["festival"] == 6)
                    $religion = 0;
					
                $conditions[] = "FestivalAllowance.festival = " . $this->data["FestivalAllowance"]["festival"];
                $this->FestivalAllowance->bindModel(array('belongsTo' => array(
                        'Employee' => array(
                            'className' => 'Employee',
                            'foreignKey' => 'employee_id',
                            'dependent' => true
                ))));
                $fas = $this->FestivalAllowance->find("all", array("conditions" => $conditions));
                $conditions = NULL;
                $conditions[] = "Salary.status != 0";
				if($religion !=0){
					$conditions[] = "EmployeePersonal.religion = " . $religion;
				}
                $conditions[] = "Employee.type = $type";
                $this->Salary->bindModel(array('belongsTo' => array(
                        'Employee' => array(
                            'className' => 'Employee',
                            'foreignKey' => 'employee_id',
                            'dependent' => true
                ))));
                $this->Salary->bindModel(array('belongsTo' => array(
                        'EmployeePersonal' => array(
                            'className' => 'EmployeePersonal',
                            'foreignKey' => 'employee_id',
                            'dependent' => true
                ))));
                $temps = $this->Salary->find("all", array("conditions" => $conditions, "fields" => array("id", "employee_id", "designation_id", "basic", "grade", "Employee.type", "EmployeePersonal.religion")));
                //pr($temps);
				if (!empty($temps)) {
                    $i = 0;
                    foreach ($temps as $salary) {
                        if (count($fas) != 0)
                            $salary["FestivalAllowance"]["id"] = $fas[$i]["FestivalAllowance"]["id"];
							$salary["FestivalAllowance"]["allowance"] = $salary["Salary"]["basic"];
							$salary["FestivalAllowance"]["employee_id"] = $salary["Salary"]["employee_id"];
							$salary["FestivalAllowance"]["designation_id"] = $salary["Salary"]["designation_id"];
							$salary["FestivalAllowance"]["grade"] = $salary["Salary"]["grade"];
							$salary["FestivalAllowance"]["basic"] = $salary["Salary"]["basic"];
							if ($religion == 1)
								$salary["FestivalAllowance"]["payable"] = $salary["Salary"]["basic"];
							elseif ($religion == 0)
								$salary["FestivalAllowance"]["payable"] = $salary["Salary"]["basic"] * .20;
							else
								$salary["FestivalAllowance"]["payable"] = $salary["Salary"]["basic"] * 2;
								$salary["FestivalAllowance"]["religion"] = $salary["EmployeePersonal"]["religion"];//$religion;
								$salary["FestivalAllowance"]["in_word"] = "Tk. " . $this->translateToWords($salary["FestivalAllowance"]["payable"]) . " only";
								if (count($fas) == 0) {
									$salary["FestivalAllowance"]["created"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
									$salary["FestivalAllowance"]["updated"] = $salary["FestivalAllowance"]["created"];
								} else {
									$salary["FestivalAllowance"]["updated"] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
								}
								$salary["FestivalAllowance"]["festival"] = $this->data["FestivalAllowance"]["festival"];
								$salary["FestivalAllowance"]["status"] = 1;
								$date = explode('-', $this->data["FestivalAllowance"]["execution_date"]);
								$salary["FestivalAllowance"]["approve_date"] = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
								$date = explode('-', $this->data["FestivalAllowance"]["payment_date"]);
								$salary["FestivalAllowance"]["payment_date"] = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
								$salary["FestivalAllowance"]["terminal"] = $_SERVER["REMOTE_ADDR"];
								$salary["FestivalAllowance"]["user_id"] = $userInfo["id"];
								$salaries[] = $salary;
								$i++;
                    }
                }
                if ($this->FestivalAllowance->saveAll($salaries)) {
                    $this->Session->setFlash(array('Data saved successfully.', "Thank you."), 'default', array('class' => 'alert-success'));
                    $this->redirect("/salaryManagements/festivalAllowances/" . $type);
                } else {
                    $this->Session->setFlash(array('Saving failed.', "Please try again."), 'default', array('class' => 'alert-error'));
                }
            }
        }
        $this->set("type", $type);
    }

    function detailFa($id) {
        $this->designations();
        $settingInfo = $this->Session->read("SETTING_INFO");
        $exTime = $settingInfo["execution_date"];
        $this->set("exTime", $exTime);
        $this->FestivalAllowance->bindModel(array('belongsTo' => array(
                'Employee' => array(
                    'className' => 'Employee',
                    'foreignKey' => 'employee_id',
                    'dependent' => true,
                    "fields" => array("Employee.first_name", "Employee.middle_name", "Employee.last_name", "Employee.id", "Employee.employee_code", "Employee.grade", "Employee.type", "Employee.status")
        ))));
        $this->FestivalAllowance->bindModel(array('belongsTo' => array(
                'EmployeePersonal' => array(
                    'className' => 'EmployeePersonal',
                    'foreignKey' => 'employee_id',
                    'dependent' => true,
                    "fields" => array("EmployeePersonal.bank", "EmployeePersonal.account", "EmployeePersonal.etin")
        ))));
        $this->FestivalAllowance->bindModel(array('belongsTo' => array(
                'Salary' => array(
                    'className' => 'Salary',
                    'foreignKey' => 'employee_id',
                    'dependent' => true,
                    "fields" => array("Salary.status")
        ))));
        $fa = $this->FestivalAllowance->find("first", array("conditions" => "FestivalAllowance.id = $id"));
		
        if (!empty($fa)) {
            $payScale = $this->PayScale->find("first", array("conditions" => "PayScale.grade =" . $fa["Employee"]["grade"]));
            $this->set("payScale", $payScale["PayScale"]);
            /*if ($fa["Deduction"]["status"] == 2) {
                $this->Loan->bindModel(array('hasOne' => array(
                        'Refund' => array(
                            'className' => 'Refund',
                            'foreignKey' => 'loan_id',
                            'dependent' => true,
                ))));
                $loans = $this->Loan->find("all", array("conditions" => "Loan.employee_id = $id"));
                $this->set("loans", $loans);
            }*/
            $deputation = NULL;
            if ($fa["Employee"]["status"] == 4) {
                $deputation = $this->Deputation->find("first", array("conditions" => "Deputation.employee_id = $id", "fields" => array("id", "released", "ctype", "percentage", "percentage2", "type", "house_rent_deduct")));
                $this->set("deputation", $deputation);
            } else {
                $this->set("deputation", $deputation);
            }
        }
        //$this->set("type", $salary["Employee"]["type"]);
        $this->set("fa", $fa);
        $this->set("type", $fa["Employee"]["type"]);
    }

    function detailFaPdf($file, $fileName) {

        $id = explode(".", $file);
        $id = $id[0];
        $this->layout = "pdf";
        $this->designations();
        $settingInfo = $this->Session->read("SETTING_INFO");
        $exTime = $settingInfo["execution_date"];
        $this->set("exTime", $exTime);
        $this->FestivalAllowance->bindModel(array('belongsTo' => array(
                'Employee' => array(
                    'className' => 'Employee',
                    'foreignKey' => 'employee_id',
                    'dependent' => true,
                    "fields" => array("Employee.first_name", "Employee.middle_name", "Employee.last_name", "Employee.id", "Employee.employee_code", "Employee.grade", "Employee.type","Employee.status")
        ))));
        $this->FestivalAllowance->bindModel(array('belongsTo' => array(
                'EmployeePersonal' => array(
                    'className' => 'EmployeePersonal',
                    'foreignKey' => 'employee_id',
                    'dependent' => true,
                    "fields" => array("EmployeePersonal.bank", "EmployeePersonal.account", "EmployeePersonal.etin")
        ))));
        $this->FestivalAllowance->bindModel(array('belongsTo' => array(
                'Salary' => array(
                    'className' => 'Salary',
                    'foreignKey' => 'employee_id',
                    'dependent' => true,
                    "fields" => array("Salary.status")
        ))));
        $fa = $this->FestivalAllowance->find("first", array("conditions" => "FestivalAllowance.id = $id"));
        if (!empty($fa)) {
            $payScale = $this->PayScale->find("first", array("conditions" => "PayScale.grade =" . $fa["Employee"]["grade"]));
            $this->set("payScale", $payScale["PayScale"]);
            /*if ($fa["Deduction"]["status"] == 2) {
                $this->Loan->bindModel(array('hasOne' => array(
                        'Refund' => array(
                            'className' => 'Refund',
                            'foreignKey' => 'loan_id',
                            'dependent' => true,
                ))));
                $loans = $this->Loan->find("all", array("conditions" => "Loan.employee_id = $id"));
                $this->set("loans", $loans);
            }*/
            $deputation = NULL;
            if ($fa["Employee"]["status"] == 4) {
                $deputation = $this->Deputation->find("first", array("conditions" => "Deputation.employee_id = $id", "fields" => array("id", "released", "ctype", "percentage", "percentage2", "type", "house_rent_deduct")));
                $this->set("deputation", $deputation);
            } else {
                $this->set("deputation", $deputation);
            }
        }
        $this->set("fa", $fa);
        $this->set("type", $fa["Employee"]["type"]);
        Configure::write('debug', 0);
        ini_set("magic_quotes_runtime", 0); // only use for Mpdf
        $_html = $this->_getViewObject()->element('detail_fa_pdf');
        $this->create_pdf($_html);
    }

    function generateFa($type,$fileName) {
        $this->layout = "pdf";
        $this->designations();
        $settingInfo = $this->Session->read("SETTING_INFO");
        $currentTime = $settingInfo["execution_date"];
        $start = mktime(0, 0, 0, date('m', $currentTime), 1, date('Y', $currentTime));
        $end = mktime(0, 0, 0, date('m', $currentTime) + 1, 0, date('Y', $currentTime));
        //$start = mktime(0,0,0,date ('m'),1,date ('Y'));
        //$end = mktime(0,0,0,date ('m') + 1,0,date ('Y'));
        $conditions = NULL;
        $conditions[] = "FestivalAllowance.payment_date >= $start";
    	$conditions[] = "FestivalAllowance.payment_date <= $end";
    	$conditions[] = "Employee.type = $type";
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
        $i = 0;
        if (!empty($fas)) {
            foreach ($fas as $fa) {
                $temp = $this->PayScale->find("first", array("conditions" => "PayScale.grade =" . $fa["Employee"]["grade"]));
                $fas[$i]["PayScale"] = $temp["PayScale"];
                $i++;
            }
        }
		//pr($fas);
        $this->set("fas", $fas);
        $this->set("type", $type);
		$this->set("curdate",$currentTime);
        $_html = $this->_getViewObject()->element('generate_fa');
        $this->create_pdf($_html);	
    }

    function testDate($date) {
        pr(date("d-m-Y", $date));
        pr(mktime(0, 0, 0, date('m', $date) - 1, 1, date('Y', $date)));
        /*
          $this->EmployeePersonal->bindModel( array('belongsTo' => array(
          'Employee' => array(
          'className'     => 'Employee',
          'foreignKey'    => 'employee_id',
          'dependent'     => true,
          ))));
          $temp = $this->EmployeePersonal->find("all",array("conditions"=>"Employee.type = 2","fields"=>array("id","association")));
          foreach($temp as $employee){
          $employee["EmployeePersonal"]["association"] = 0;
          $employees[] = $employee;
          }
          pr($employees);
          echo count($employees);
          $this->EmployeePersonal->saveMany($employees);
         */
    }

}
