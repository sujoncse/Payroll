<style>
    html, body, div, span, applet, object, iframe,
    h1, h2, h3, h4, h5, h6, p, blockquote, pre,
    a, abbr, acronym, address, big, cite, code,
    del, dfn, em, font, img, ins, kbd, q, s, samp,
    small, strike, strong, sub, sup, tt, var,
    b, u, i, center, ol, ul, li,
    fieldset, form, label, legend,
    table, caption, tbody, tfoot, thead, tr, th, td {
        background: transparent;
        border: 0;
        margin: 0;
        padding: 0;
        vertical-align: baseline;
    }
    body { 
        background: #ffffff; 
        font-family: 'HelveticaNeue', Arial, Helvetica, sans-serif; 
        font-size: 12px; 
        line-height: 13px; 
        color: #000000; 
    }
    img {
        display: block;
        max-width: 95%;
        margin-left: 15%;
        margin-right: 15%;
        vertical-align: middle;
        border: 0;
    }
    .img {
        display: block;
        max-width: 95%;
        margin-left: 25%;
        margin-right: 25%;
        vertical-align: middle;
        border: 0;
    }
    h1,h2,h3,h4 { color: #000; font-weight: normal; }
    h1 { font-size: 15px; line-height: 20px; }
    h2 { font-size: 14px; line-height: 15px; }
    h3 { font-size: 13px; line-height: 12px; }
    h4 { font-size: 12px; line-height: 11px; }
    .maincontent { position: relative; padding: 1px; }
    .contentinner { padding: 1px; float: left; width: 100%; }
    .container {
        margin-right: auto;
        margin-left: auto;
        *zoom: 1;
    }
    .row-fluid { width: 100%; *zoom: 1; }
    .row-fluid .span12 {
        width: 100%;
        *width: 99.94680851063829%;
    }

    .row-fluid .span11 {
        width: 91.48936170212765%;
        *width: 91.43617021276594%;
    }

    .row-fluid .span10 {
        width: 82.97872340425532%;
        *width: 82.92553191489361%;
    }

    .row-fluid .span9 {
        width: 74.46808510638297%;
        *width: 74.41489361702126%;
    }

    .row-fluid .span8 {
        width: 65.95744680851064%;
        *width: 65.90425531914893%;
    }

    .row-fluid .span7 {
        width: 57.44680851063829%;
        *width: 57.39361702127659%;
    }

    .row-fluid .span6 {
        width: 48.93617021276595%;
        *width: 48.88297872340425%;
    }

    .row-fluid .span5 {
        width: 40.42553191489362%;
        *width: 40.37234042553192%;
    }

    .row-fluid .span4 {
        width: 31.914893617021278%;
        *width: 31.861702127659576%;
    }

    .row-fluid .span3 {
        width: 23.404255319148934%;
        *width: 23.351063829787233%;
    }

    .row-fluid .span2 {
        width: 14.893617021276595%;
        *width: 14.840425531914894%;
    }

    .row-fluid .span1 {
        width: 6.382978723404255%;
        *width: 6.329787234042553%;
    }

    h1,h2,h3,h4,h5,h6 { margin: 1px 0; font-family: inherit; font-weight: bold; line-height: 12px; color: inherit; text-rendering: optimizelegibility; }
    .width1 { width: 1%; }
    .width2 { width: 2%; }
    .width4 { width: 4%; }
    .width5 { width: 5%; }
    .width10 { width: 10%; }
    .width15 { width: 15%; }
    .width20 { width: 20%; }
    .width25 { width: 25%; }
    .width30 { width: 30%; }
    .width35 { width: 35%; }
    .width40 { width: 40%; }
    .width45 { width: 45%; }
    .width50 { width: 50%; }
    .width55 { width: 55%; }
    .width60 { width: 60%; }
    .width63 { width: 63%; }
    .width70 { width: 70%; }
    .width80 { width: 80%; }

    .span12 { width: 98%; }
    .span11 { width: 90%; }
    .span10 { width: 80%; }
    .span9 { width: 70%; }
    .span8 { width: 60%; }
    .span7 { width: 50%; }
    .span6 { width: 40%; }
    .span5 { width: 35%; }
    .span4 { width: 30%; }
    .span3 { width: 20%; }
    .span2 { width: 15%; }
    .span1 { width: 5%; }

    .img-polaroid {
        padding: 1px;
        background-color: #ffffff;
    }
    .table {
        width: 100%;
        margin: 1px;
    }
    .table .table { background-color: #ffffff; }
    .table th,.table td {
        padding: 1px;
        line-height: 12px;
        text-align: left;
        vertical-align: top;
        border: 1px #000000;
    }
    .table th { font-weight: bold; }
    .table thead th { vertical-align: middle; text-align:center; }
    th { background: #fcfcfc;}
    thead { border-bottom: 1px solid #000000;}
    .table tfoot tr { border-bottom: 1px solid #000000; }
    .table-bordered {
        border: 1px solid #000000;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
    }

    .table-bordered th,.table-bordered td { border-left: 1px #000000; }

    .table-invoice-full { border-color: #000000; }
    .table-invoice-full tr td { border-color: #000000; border: 1px #000000; }
    .table-invoice-full tr td { background: #ffffff; }
    .table-invoice-full th.right, .table-invoice-full td.right { text-align: right; }

    .msg-invoice { padding: 0 !important; }
    .msg-invoice h4 { font-size: 12px; text-transform: uppercase; font-weight: bold; }
    .msg-invoice p { font-size: 12px; line-height: 13px; }
    .amountdue { text-align: center; margin-left:70%}
    .amountdue h4 { 
        text-align: center; line-height: normal; border: 1px solid #000000; background: #ffffff; 
        display: inline-block; padding: 10px 10px; width: 175px;
    }
    .amountdue h4 span { display: block; font-size: 12px; text-transform: uppercase; color: #000000; }
    .footer { position: absolute; bottom: 0; left: 0; font-size: 5px; background: #ffffff; color: #000000; width: 100%; }
    .footer a { color: #f7f7f7; }
    .footer .footerleft { width: 230px; float: left; background: #ffffff; }
    .footer .footerright { margin-left: 260px; text-align: right; }

</style>
<?php 
$i = 1;
$count = count($salaries); $i = 0; foreach($salaries as $salary){ //if($i==30){ return false; }?>
<div class="maincontent" <?php if($i>=1) echo 'style="page-break-before: always;"'; ?>>
    <div class="contentinner">
        <div class="row-fluid">
            <div class="span12">
                <div class="invoice_logo"><!--<img class="" src="<?php echo $this->webroot;?>img/logo_t.jpg" alt="BARC" width="20%"/>--><img class="" src="<?php echo $this->webroot;?>img/logo.png" alt="BARC" width="90%"/></div>
                <div style="text-align:center"><h1><?php if($salary["Employee"]["type"] == 1) echo "Employee's Salary Bill"; else echo "Employee's Salary Bill";?></h1></div>
            </div><!--span6-->
        </div>
        <div class="row-fluid">
            <div class="span12">
                <table class="table table-bordered table-invoice-full" style="font-size:11px">
                    <tr>
                        <td class="width20">Name:</td>
                        <td class="width30">
                            <strong>
		          			<?php 
		      					if(!empty($salary["Employee"]["middle_name"])) 
		      						$name = $salary["Employee"]["first_name"]." ".$salary["Employee"]["middle_name"]." ".$salary["Employee"]["last_name"];
		      					else
		      						$name = $salary["Employee"]["first_name"]." ".$salary["Employee"]["last_name"];
		      					echo $name;
		      				?>
                            </strong>
                        </td>
                        <td class="width10">Status:</td>
                        <td class="width30"><strong>Revenue - BARC</strong></td>
                    </tr>
                    <tr>
                        <td>Designation:</td>
                        <td><?php echo $designations[$salary["GeneratedSalary"]["designation_id"]]; if($salary["GeneratedSalary"]["status"] == 4) echo " (AC)"; elseif($salary["GeneratedSalary"]["status"] == 5) echo " (CC)";?></td>
                        <td>Pay Scale</td>
						<?php $scales= explode('-',$salary["PayScale"]["scale"]);?>
                        <td><strong><?php echo $scales[0] .'-'. $scales[count($scales) -1]; ?></strong></td>
                    </tr>
                    <tr>
                        <td>Employee ID:</td>
                        <td><?php echo $salary["Employee"]["employee_code"];?></td>
                        <td>Bank A/C #</td>
                        <td><strong><?php echo $salary["EmployeePersonal"]["bank"]." <strong>[".$salary["EmployeePersonal"]["account"]."], Farmgate";?></strong></td>
                    </tr>
                    <tr>
                        <td>Month:</td>
                        <td><strong> <?php echo date('F Y', strtotime(date('Y-m',$start1)."+0 month")); ?></strong></td>
                        <td>E-TIN:</td>
                        <td> <?php echo $salary["EmployeePersonal"]["etin"]; ?></td>
                    </tr>
                </table>
                <div class="clearfix">&nbsp;<br /></div>
                <table class="table table-bordered table-invoice-full" style="font-size:13px;">
                    <thead>
                        <tr>
                            <th class="head0 left" style="width:20%">Payable</th>
                            <th class="head1 right" style="width:20%">Amount</th>
                            <th style="width:1%">&nbsp;</th>
                            <th class="head0 left" style="width:20%">Deduction</th>
                            <th class="head1" style="width:10%">Loan</th>
                            <th class="head0" style="width:5%">Total<br/> Installment</th>
                            <th class="head1" style="width:5%">Paid<br/> Installment</th>
                            <th class="head0" style="width:9%">Balance</th>
                            <th class="head1 right" style="width:10%">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="width:19%">Basic Salary</td>
                            <td class="right"><?php echo number_format($salary["GeneratedSalary"]["basic"])."/-";?></td>
                            <td class="width2">|</td>
                            <td><?php if(empty($deputations[$i])) echo "CPF - 1 (10%)"; elseif(!empty($deputations[$i]) AND key($deputations[$i]) == $salary["Employee"]["id"] AND $deputations[$i]["Deputation"]["ctype"] == 1) echo "CPF - 1 (".$deputations[$i]["Deputation"]["percentage"]."%)"; elseif(!empty($deputations[$i])  AND key($deputations[$i]) == $salary["Employee"]["id"] AND $deputations[$i]["Deputation"]["ctype"] == 2) echo "GPF - 1 (".$deputations[$i]["Deputation"]["percentage"]."%)"; ?></td>
                            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                            <td class="right"><?php echo number_format($salary["GeneratedDeduction"]["cpf1"])."/-";?></td>
                        </tr>
                        <tr>
                            <td>Personal Pay</td>
                            <td class="right"><?php if(!empty($salary["GeneratedSalary"]["pp"])) echo number_format($salary["GeneratedSalary"]["pp"])."/-"; else echo "-";?></td>
                            <td>|</td>
                            <td><?php if(empty($deputations[$i])) echo "CPF - 2 (2.50%)"; elseif(!empty($deputations[$i])  AND key($deputations[$i]) == $salary["Employee"]["id"] AND $deputations[$i]["Deputation"]["ctype"] == 1) echo "CPF - 2 (".$deputations[$i]["Deputation"]["percentage2"]."%)"; elseif(!empty($deputations[$i])  AND key($deputations[$i]) == $salary["Employee"]["id"] AND $deputations[$i]["Deputation"]["ctype"] == 2) echo "GPF - 2 (".$deputations[$i]["Deputation"]["percentage2"]."%)"; ?></td>
                            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                            <td class="right"><?php if(!empty($salary["GeneratedDeduction"]["cpf2"])) echo number_format($salary["GeneratedDeduction"]["cpf2"])."/-"; else echo "-";?></td>
                        </tr>
						<tr>
                            <td>Festival Bonus</td>
                            <td class="right">-</td>
                            <td>|</td>
                            <td>Arrear CPF</td>
                            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                            <td class="right"><?php if(!empty($salary["GeneratedDeduction"]["arrear_cpf"])) echo number_format($salary["GeneratedDeduction"]["arrear_cpf"])."/-"; else echo "-";?></td>
                        </tr>
                        <tr>
                            <td>Dearness Allowance</td>
                            <td class="right"><?php if(!empty($salary["GeneratedSalary"]["dearness"])) echo number_format($salary["GeneratedSalary"]["dearness"])."/-"; else echo "-";?></td>
                            <td>|</td>
                            <td>1st CPF Loan</td>
							<td class="right">-</td>
							<td style="text-align:center">-</td>
							<td style="text-align:center">-</td>
							<td class="right">-</td>
							<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["cpf_loan1"])) echo number_format($salary["GeneratedDeduction"]["cpf_loan1"])."/-"; else echo "-"; ?></td>	
						</tr>
                        <tr>
                            <td>House Rent</td>
                            <td class="right"><?php echo number_format($salary["GeneratedSalary"]["house_rent"])."/-";?></td>
                            <td>|</td>
                            <td>2nd CPF Loan</td>
							<td class="right">-</td>
							<td style="text-align:center">-</td>
							<td style="text-align:center">-</td>
							<td class="right">-</td>
							<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["cpf_loan2"])) echo number_format($salary["GeneratedDeduction"]["cpf_loan2"])."/-"; else echo "-";?></td>
						</tr>
                        <tr>
                            <td>Medical Allowance</td>
                            <td class="right"><?php echo number_format($salary["GeneratedSalary"]["medical"])."/-";?></td>
                            <td>|</td>
                            <td>Total CPF Interest</td>
                            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php echo "-"; ?></td>
						</tr>
                        <tr>
                            <td>Charge Allowance</td>
                            <td class="right"><?php if(!empty($salary["GeneratedSalary"]["charge"])) echo number_format($salary["GeneratedSalary"]["charge"])."/-"; else echo "-";?></td>
                            <td>|</td>
							<td>Benevolent Fund</td>
                            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                            <td class="right"><?php if(!empty($salary["GeneratedDeduction"]["benevolent_fund"])) echo number_format($salary["GeneratedDeduction"]["benevolent_fund"])."/-"; else echo "-";?></td>
                        
                        </tr>
                        <tr>
                            <td>Children Allowance</td>
                            <td class="right"><?php if(!empty($salary["GeneratedSalary"]["edu"])) echo number_format($salary["GeneratedSalary"]["edu"])."/-"; else echo "-";?></td>
                            <td>|</td>
							<td>Group Insurance</td>
                            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                            <td class="right"><?php if(!empty($salary["GeneratedDeduction"]["group_insurance"])) echo number_format($salary["GeneratedDeduction"]["group_insurance"])."/-"; else echo "-";?></td>
                        
                        </tr>
                        <tr>
                            <td>Deputation Allowance</td>
                            <td class="right"><?php if(!empty($salary["GeneratedSalary"]["deputation"])) echo number_format($salary["GeneratedSalary"]["deputation"])."/-"; else echo "-";?></td>
                            <td>|</td>
							<td>House Rent</td>
                            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                            <td class="right"><?php if(!empty($salary["GeneratedDeduction"]["house_rent_deduct"])) echo number_format($salary["GeneratedDeduction"]["house_rent_deduct"])."/-"; else echo "-";?></td>
                        
                        </tr>
                        <tr>
                            <td>Domestic Aid</td>
                            <td class="right"><?php if(!empty($salary["GeneratedSalary"]["fraction_increment"])) echo number_format($salary["GeneratedSalary"]["fraction_increment"])."/-"; else echo "-";?></td>
                             <td>|</td>
							 <td>Land Used</td>
                            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                            <td class="right"><?php if(!empty($salary["GeneratedDeduction"]["fuel"])) echo number_format($salary["GeneratedDeduction"]["fuel"])."/-"; else echo "-";?></td>
                        
                        </tr>
                        <tr>
                            <td>Sumptuary</td>
                            <td class="right"><?php if(!empty($salary["GeneratedSalary"]["sumptuary"])) echo number_format($salary["GeneratedSalary"]["sumptuary"])."/-"; else echo "-";?></td>
                            <td>|</td>
							<td>Telephone Used</td>
                            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                            <td class="right"><?php if(!empty($salary["GeneratedDeduction"]["phone_bill"])) echo number_format($salary["GeneratedDeduction"]["phone_bill"])."/-"; else echo "-";?></td>
                        
                        </tr>
                        <tr>
                            <td>Washing Allowance</td>
                            <td class="right"><?php if(!empty($salary["GeneratedSalary"]["washing"])) echo number_format($salary["GeneratedSalary"]["washing"])."/-"; else echo "-";?></td>
                            <td>|</td>
							<td>Transport Used</td>
                            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                            <td class="right"><?php if(!empty($salary["GeneratedDeduction"]["transport_bill"])) echo number_format($salary["GeneratedDeduction"]["transport_bill"])."/-"; else echo "-";?></td>
                        
                        </tr>
                        <tr>
                            <td>Conveyance Allow.</td>
                            <td class="right"><?php if(!empty($salary["GeneratedSalary"]["conveyance"])) echo number_format($salary["GeneratedSalary"]["conveyance"])."/-"; else echo "-";?></td>
                            <td>|</td>
							<td>Personal Vehicle Used</td>
                            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                            <td class="right"><?php if(!empty($salary["GeneratedDeduction"]["personal_vehicle"])) echo number_format($salary["GeneratedDeduction"]["personal_vehicle"])."/-"; else echo "-";?></td>
                       
                        </tr>
                        <tr>
                            <td>Tiffin Allowance</td>
                            <td class="right"><?php if(!empty($salary["GeneratedSalary"]["tiffin"])) echo number_format($salary["GeneratedSalary"]["tiffin"])."/-"; else echo "-";?></td>
                            <td>|</td>
							<td>One day Salary</td>
                            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                            <td class="right"><?php if(!empty($salary["GeneratedDeduction"]["w_s"])) echo number_format($salary["GeneratedDeduction"]["w_s"])."/-"; else echo "-";?></td>
                        
                        </tr>
                        <tr>
                            <td>Arrear</td>
                            <td class="right"><?php if(!empty($salary["GeneratedSalary"]["arrear"])) echo number_format($salary["GeneratedSalary"]["arrear"])."/-"; else echo "-";?></td>
                            <td>|</td>
							<td>Overdrawn</td>
                            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                            <td class="right"><?php if(!empty($salary["GeneratedDeduction"]["overdrawn"])) echo number_format($salary["GeneratedDeduction"]["overdrawn"])."/-"; else echo "-";?></td>
                       
                        </tr>
                        <tr>
                            <td>Miscellaneous</td>
                            <td class="right"><?php if(!empty($salary["GeneratedSalary"]["miscellaneous"])) echo number_format($salary["GeneratedSalary"]["miscellaneous"])."/-"; else echo "-";?></td>
                            <td>|</td>
							<td>Asso. Subscription</td>
                            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                            <td class="right"><?php if(!empty($salary["GeneratedDeduction"]["association"])) echo number_format($salary["GeneratedDeduction"]["association"])."/-"; else echo "-";?></td>
                       
                        </tr>
                        <tr>
                           <td>&nbsp;</td>
                            <td class="right">&nbsp;</td>
							<td>|</td>
							<td>Income TAX</td>
                            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                            <td class="right"><?php if(!empty($salary["GeneratedDeduction"]["tax"])) echo number_format($salary["GeneratedDeduction"]["tax"])."/-"; else echo "-";?></td>
                        
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td class="right">&nbsp;</td>
                            <td>|</td>
							 <td>House Loan</td>
							
								<td class="right">-</td>
								<td style="text-align:center">-</td>
								<td style="text-align:center">-</td>
								<td class="right">-</td>
							
                            <td class="right"><?php if(!empty($salary["GeneratedDeduction"]["house_loan"])) echo number_format($salary["GeneratedDeduction"]["house_loan"])."/-"; else echo "-";?></td>
                        
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td class="right">&nbsp;</td>
                            <td>|</td>
							<td>Vehicle Loan</td>
							
								<td class="right">-</td>
								<td style="text-align:center">-</td>
								<td style="text-align:center">-</td>
								<td class="right">-</td>
							
                            <td class="right"><?php if(!empty($salary["GeneratedDeduction"]["vehicle_loan"])) echo number_format($salary["GeneratedDeduction"]["vehicle_loan"])."/-"; else echo "-";?></td>
                        
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td class="right">&nbsp;</td>
                            <td>|</td>
							<td>House Loan Interest</td>
                            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                            <td class="right"><?php if(!empty($salary["GeneratedDeduction"]["h_interest"])) echo number_format($salary["GeneratedDeduction"]["h_interest"])."/-"; else echo "-";?></td>
                        
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td class="right">&nbsp;</td>
                            <td>|</td>
							<td>Vehicle Loan Interest</td>
                            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                            <td class="right"><?php if(!empty($salary["GeneratedDeduction"]["v_interest"])) echo number_format($salary["GeneratedDeduction"]["v_interest"])."/-"; else echo "-";?></td>
                        
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td class="right">&nbsp;</td>
                            <td>|</td>
                            <td>Miscellaneous</td>
                            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                            <td class="right"><?php if(!empty($salary["GeneratedDeduction"]["miscellaneous_deduct"])) echo number_format($salary["GeneratedDeduction"]["miscellaneous_deduct"])."/-"; else echo "-";?></td>
                        </tr>
						
                    </tbody>
                </table>
               
				<table class="table table-bordered table-invoice-full">
                    <tbody>
                        <tr>
                            <td class="left width15"><strong>Gross Salary:</strong></td>
                            <td class="right width20" style="text-align:right;"><strong><?php echo number_format($salary["GeneratedSalary"]["total_add"])."/-";?></strong></td>
                            <td colspan="2" class="right"><strong>Total Deduction:</strong></td>
                            <td class="left width15" style="text-align:right"><strong><?php echo number_format($salary["GeneratedDeduction"]["total_sub"])."/-";?></strong></td>
                        </tr>
                        <tr>
                            <td class="msg-invoice" colspan="3"><h4><p><?php echo "IN WORD: ";?><?php echo strtoupper($salary["GeneratedSalary"]["in_word"]);?></p></h4></td>
                            <td class="right width15" style="text-align:right"><strong>Net Payable:</strong></td>
                            <td class="left width15" style="text-align:right"><strong><?php echo number_format($salary["GeneratedSalary"]["payable"])."/-";?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
		<div class="row-fluid">
            <div class="span12">
                <table class="table table-bordered table-invoice-full" style="font-size:13px">
                    <tr>
                        <td colspan="5"><strong>Passed for payment &nbsp;<?php echo $salary["GeneratedSalary"]["payable"]."/-";?></strong></td>
                    </tr>
                    <tr>
                        <td colspan="2"><strong><?php echo $salary["GeneratedSalary"]["in_word"];?></strong></td>
                        <td class="width1">&nbsp;</td>
                        <td colspan="2" style="align:center"><img class="img" src="<?php echo $this->webroot."img/stamp.jpg"?>" width="50px" height="50px"/></td>
                    </tr>
                    <tr>
                        <td style="width: 25%;"><strong>Cheque/Bank Advise:</strong></td>
                        <td style="width: 30%;"><strong>-------------------------------------------------</strong></td>
                        <td class="width1">&nbsp;</td>
                        <td class="width1">&nbsp;</td>
                        <td style="width: 44%; text-align:center">&nbsp;</td>	
                    </tr>
                    <tr>
                        <td style="width: 25%;">&nbsp;</td>
                        <td style="width: 30%;">&nbsp;</td>
                        <td class="width1">&nbsp;</td>
                        <td class="width1">&nbsp;</td>
                        <td style="width:44%;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="width: 25%;"><strong>Date:</strong></td>
                        <td style="width: 30%;"><strong>-------------------------------------------------</strong></td>
                        <td class="width1">&nbsp;</td>
                        <td colspan="2" style="text-align:center"><strong>---------------------------------------------------</strong></td>
                    </tr>
                    <tr>
                        <td style="width: 25%;">&nbsp;</td>
                        <td style="width: 30%;">&nbsp;</td>
                        <td class="width1">&nbsp;</td>
                        <td class="width1">&nbsp;</td>
                        <td style="width:44%; text-align:center"><strong>Signature</strong></td>
                    </tr>
                    <tr>
                        <td style="width: 25%;">&nbsp;</td>
                        <td style="width: 30%;">&nbsp;</td>
                        <td class="width1">&nbsp;</td>
                        <td class="width1">&nbsp;</td>
                        <td style="width:44%;">&nbsp;</td>
                    </tr>
                    <tr style="text-align:center">
                        <td style="width: 25%;"><strong>Checked By:</strong></td>
                        <td style="width: 30%;"><strong>-------------------------------------------------</strong></td>
                        <td class="width1">&nbsp;</td>
                        <td class="width1">&nbsp;</td>
                        <td style="width:44%;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="width: 25%;">&nbsp;</td>
                        <td style="width: 30%;">&nbsp;</td>
                        <td class="width1">&nbsp;</td>
                        <td class="width1">&nbsp;</td>
                        <td style="width:44%;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="width: 25%;">&nbsp;</td>
                        <td style="width: 30%;">&nbsp;</td>
                        <td class="width1">&nbsp;</td>
                        <td class="width1">&nbsp;</td>
                        <td style="width:44%; text-align:center"><strong>----------------------------------------------------------------------------</strong></td>
                    </tr>
                    <tr>
                        <td style="width: 25%;">&nbsp;</td>
                        <td style="width: 30%;">&nbsp;</td>
                        <td class="width1">&nbsp;</td>
                        <td colspan="2" style="text-align:center"><strong>Signature of Drawing & Disbursing officer (DDO)</strong></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row-fluid" style="line-height:5px">
            <div class="span12">
                <div class="footer">
                    <div class="footerleft">Developed By: <a href="http://barc.gov.bd/" target="new"><strong>Bangladesh Agricultural Research Council</strong></a></div>
                    <div class="footerleft" style="margin-left: 260px;">Copyright © 2013 <a href="http://www.barc.gov.bd" target="new"><strong>Bangladesh Agricultural Research Council</strong></a></div>
                </div>
            </div>
        </div>	
    </div>
</div>
<?php /* if($i < $count){ ?><p style="page-break-before: always">&nbsp;</p> <?php } */ ?>
<?php $i++;} ?>