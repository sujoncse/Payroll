<div class="leftmenu">        
	<ul class="nav nav-tabs nav-stacked">
		<li class="nav-header animate5 fadeInUp">Main Navigation</li>
		<li class="active animate6 fadeInUp"><a href="<?php echo $this->webroot."admins";?>"><span class="icon-align-justify"></span> Dashboard</a></li>
		<li class="dropdown animate7 fadeInUp"><a href="#"><span class="icon-briefcase"></span> Employee Management</a>
			<ul>
				<li><a href="<?php echo $this->webroot."employeeManagements/index/1";?>">Officer's Area</a></li>
				<li><a href="<?php echo $this->webroot."employeeManagements/index/2";?>">Staff's Area</a></li>
			</ul>
		</li>
		<li class="dropdown animate8 fadeInUp"><a href="#"><span class="icon-briefcase"></span> Officer's Salary Management</a>
			<ul>
				<li><a href="<?php echo $this->webroot."salaryManagements/index/1";?>">Salary Fixation</a></li>
				<!--<li><a href="<?php echo $this->webroot."salaryManagements/fixation/1";?>">Status Change</a></li>
				<li><a href="<?php echo $this->webroot."salaryManagements/increments/1";?>">Increment</a></li>
				<li><a href="<?php echo $this->webroot."salaryManagements/promotions/1";?>">Promotion</a></li>
				<li><a href="<?php echo $this->webroot."salaryManagements/charges/1/1";?>">Additional Charge</a></li>
				<li><a href="<?php echo $this->webroot."salaryManagements/charges/1/2";?>">Current Charge</a></li>
				<li><a href="<?php echo $this->webroot."salaryManagements/deputations";?>">Deputations</a></li>-->
				<li><a href="<?php echo $this->webroot."salaryManagements/generatedSalaries/1";?>">Generate Monthly Salary</a></li>
				<li><a href="<?php echo $this->webroot."salaryManagements/festivalAllowances/1";?>">Festival Allowances</a></li>
			</ul>
		</li>
		<li class="dropdown animate8 fadeInUp"><a href="#"><span class="icon-briefcase"></span> Staff's Salary Management</a>
			<ul>
				<li><a href="<?php echo $this->webroot."salaryManagements/index/2";?>">Salary Fixation</a></li>
				<!--<li><a href="<?php echo $this->webroot."salaryManagements/fixation/2";?>">Status Change</a></li>
				<li><a href="<?php echo $this->webroot."salaryManagements/increments/2";?>">Increment</a></li>
				<li><a href="<?php echo $this->webroot."salaryManagements/promotions/2";?>">Promotion</a></li>
				<li><a href="<?php echo $this->webroot."salaryManagements/charges/2/1";?>">Additional Charge</a></li>
				<li><a href="<?php echo $this->webroot."salaryManagements/charges/2/2";?>">Current Charge</a></li>
				<li><a href="<?php echo $this->webroot."salaryManagements/previousSalaries/2";?>">Previous Monthly Salary</a></li>-->
				<li><a href="<?php echo $this->webroot."salaryManagements/generatedSalaries/2";?>">Generate Monthly Salary</a></li>
				<li><a href="<?php echo $this->webroot."salaryManagements/festivalAllowances/2";?>">Festival Allowances</a></li>
			</ul>
		</li>
		<li class="dropdown animate8 fadeInUp"><a href="#"><span class="icon-briefcase"></span>Officer's Report Management</a>
			<ul>
				<li><a href="<?php echo $this->webroot."reportManagements/basic/1";?>">Basic</a></li>
				<li><a href="<?php echo $this->webroot."reportManagements/grossTotal/1";?>">Gross and Net Salary</a></li>
				<li><a href="<?php echo $this->webroot."reportManagements/bankAdvice/1";?>">Bank Advice</a></li>
				<!--<li><a href="<?php echo $this->webroot."reportManagements/index/";?>">Reports</a></li>-->
				<li><a href="<?php echo $this->webroot."reportManagements/cpfloanStatement/1";?>">CPF Loan Statement</a></li>
				<li><a href="<?php echo $this->webroot."reportManagements/scheduleCpf/1";?>">Schedule CPF</a></li>
				<li><a href="<?php echo $this->webroot."reportManagements/journalVoucher/1";?>">Journal Voucher</a></li>
				<li><a href="<?php echo $this->webroot."reportManagements/journalvoucherDeputation/1";?>">Journal Voucher Deputation</a></li>
				<li><a href="<?php echo $this->webroot."salaryManagements/previousSalaries/1";?>">Previous Monthly Salary</a></li>
				<li><a href="<?php echo $this->webroot."salaryManagements/previoussalaryUsers/1";?>">Single employee Previous Salary</a></li>
				<li><a href="<?php echo $this->webroot."salaryManagements/grosstotalYear/1";?>">Gross Total in a period</a></li>
				<li><a href="<?php echo $this->webroot."reportManagements/faBankAdvice/1";?>">Festival Allowance Bank Advice</a></li>
				
				<!--<li><a href="<?php echo $this->webroot."reportManagements/payable/1";?>">Net Payable</a></li>
				<li><a href="<?php echo $this->webroot."reportManagements/bf/1";?>">Benevolent Fund</a></li>
				<li><a href="<?php echo $this->webroot."reportManagements/preg/1";?>">Payroll Register</a></li>
				<li><a href="<?php echo $this->webroot."reportManagements/cpfs/1";?>">CPF Schedule</a></li>-->
			</ul>
		</li>
		<li class="dropdown animate8 fadeInUp"><a href="#"><span class="icon-briefcase"></span>Staff's Report Management</a>
			<ul>
				<li><a href="<?php echo $this->webroot."reportManagements/basic/2";?>">Basic</a></li>
				<li><a href="<?php echo $this->webroot."reportManagements/grossTotal/2";?>">Gross and Net Salary</a></li>
				<li><a href="<?php echo $this->webroot."reportManagements/bankAdvice/2";?>">Bank Advice</a></li>
				<!--<li><a href="<?php echo $this->webroot."reportManagements/index/";?>">Reports</a></li>-->
				<li><a href="<?php echo $this->webroot."reportManagements/cpfloanStatement/2";?>">CPF Loan Statement</a></li>
				<li><a href="<?php echo $this->webroot."reportManagements/scheduleCpf/2";?>">Schedule CPF</a></li>
				<li><a href="<?php echo $this->webroot."reportManagements/journalVoucher/2";?>">Journal Voucher</a></li>
				<li><a href="<?php echo $this->webroot."reportManagements/journalvoucherDeputation/2";?>">Journal Voucher Deputation</a></li>
				<li><a href="<?php echo $this->webroot."salaryManagements/previousSalaries/2";?>">Previous Monthly Salary</a></li>
				<li><a href="<?php echo $this->webroot."salaryManagements/previoussalaryUsers/2";?>">Single employee Previous Salary</a></li>
				<li><a href="<?php echo $this->webroot."salaryManagements/grosstotalYear/2";?>">Gross Total in a period</a></li>
				<li><a href="<?php echo $this->webroot."reportManagements/faBankAdvice/2";?>">Festival Allowance Bank Advice</a></li>
				
				<!--<li><a href="<?php echo $this->webroot."reportManagements/payable/2";?>">Net Payable</a></li>
				<li><a href="<?php echo $this->webroot."reportManagements/bf/2";?>">Benevolent Fund</a></li>
				<li><a href="<?php echo $this->webroot."reportManagements/preg/2";?>">Payroll Register</a></li>
				<li><a href="<?php echo $this->webroot."reportManagements/cpfs/2";?>">CPF Schedule</a></li>-->
			</ul>
		</li>
		<!--<li class="dropdown animate9 fadeInUp"><a href="#"><span class="icon-briefcase"></span> Benefit Management</a>
			<ul>
				<li><a href="<?php echo $this->webroot."employeeManagements/index/1#";?>">Officer's Area</a></li>
				<li><a href="<?php echo $this->webroot."employeeManagements/index/2#";?>">Staff's Area</a></li>
			</ul>
		</li>-->
		<li class="dropdown animate10 fadeInUp"><a href="#"><span class="icon-briefcase"></span> Loan Management</a>
			<ul>
				<li><a href="<?php echo $this->webroot."loanManagements/index/1";?>">Officer's Area</a></li>
				<li><a href="<?php echo $this->webroot."loanManagements/index/2";?>">Staff's Area</a></li>
			</ul>
		</li>
		<li class="animate11 fadeInUp"><a href="<?php echo $this->webroot."salaryManagements/closeMonth";?>"><span class="icon-briefcase"></span> Month Close</a></li>
		<li class="dropdown animate12 fadeInUp"><a href="#"><span class="icon-briefcase"></span> Settings</a>
			<ul>
				<li><a href="<?php echo $this->webroot."settings/";?>">Application Settings</a></li>
				<li><a href="<?php echo $this->webroot."settings/designationList";?>">Designations</a></li>
				<li><a href="<?php echo $this->webroot."settings/payScale";?>">Pay Scale</a></li>
				<li><a href="<?php echo $this->webroot."settings/commonSetting";?>">Common settings</a></li>
				<!--<li><a href="<?php echo $this->webroot."admins/users";?>">User Management</a></li>-->
			</ul>
		</li>
		<!--<li class="dropdown animate13 fadeInUp"><a href="#"><span class="icon-briefcase"></span> Template</a>
			<ul>
				<li><a href="<?php echo $this->webroot."admins/template/1";?>">Dashboard</a></li>
				<li><a href="<?php echo $this->webroot."admins/template/2";?>">File Management</a></li>
				<li><a href="<?php echo $this->webroot."admins/template/3";?>">UI Elements &amp; Widgets</a></li>
				<li><a href="<?php echo $this->webroot."admins/template/4";?>">Boostrap Components</a></li>
				<li><a href="<?php echo $this->webroot."admins/template/5";?>">Dynamic Table</a></li>
				<li><a href="<?php echo $this->webroot."admins/template/6";?>">Typography</a></li>
				<li><a href="<?php echo $this->webroot."admins/template/7";?>">Graph &amp; Charts</a></li>
				<li><a href="<?php echo $this->webroot."admins/template/8";?>">Messages</a></li>
				<li><a href="<?php echo $this->webroot."admins/template/9";?>">Buttons &amp; Icons</a></li>
				<li><a href="<?php echo $this->webroot."admins/template/10";?>">Input Form</a></li>
				<li><a href="<?php echo $this->webroot."admins/template/11";?>">Wizard Form</a></li>
				<li><a href="<?php echo $this->webroot."admins/template/12";?>">Text Editor</a></li>
				<li><a href="<?php echo $this->webroot."admins/template/13";?>">Inspections &amp; Events</a></li>
				<li><a href="<?php echo $this->webroot."admins/template/14";?>">Detail</a></li>
				<li><a href="<?php echo $this->webroot."admins/template/15";?>">Grid Styles</a></li>
				<li><a href="<?php echo $this->webroot."admins/template/16";?>">FAQ</a></li>
			</ul>
		</li>-->
	</ul>
</div><!--leftmenu-->