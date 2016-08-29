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
<div class="maincontent">
	<div class="contentinner">
    	<div class="row-fluid">
        	<div class="span12">
        		<div class="invoice_logo"><img class="" src="<?php echo $this->webroot;?>img/logo.png" alt="BARC" width="90%"/></div>
        		<div style="text-align:center"><h1><?php if($salary["Employee"]["type"] == 1) echo "Employee's "; else echo "Employee's ";?> Pay Slip</h1></div>
        	</div><!--span6-->
        </div>
        <div class="row-fluid">
        	<div class="span12">
		        <table class="table table-bordered table-invoice-full">
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
						<td><?php echo $designations[$salary["Salary"]["designation_id"]]; if($salary["Salary"]["status"] == 4) echo " (AC)"; elseif($salary["Salary"]["status"] == 5) echo " (CC)";?></td>
						<td>Pay Scale</td>
						<?php $scales= explode('-',$payScale["scale"]);?>
						<td><strong><?php echo $scales[0] .'-'. $scales[count($scales) -1]; ?></strong></td>
					</tr>
					<tr>
						<td>Employee ID:</td>
						<td><?php echo $salary["Employee"]["employee_code"];?></td>
						<td>Bank A/C #</td>
						<td><strong><?php echo $salary["EmployeePersonal"]["bank"]." <strong>[".$salary["EmployeePersonal"]["account"]."], Farmgate";?></strong></td>
					</tr>
					<tr>
						<td>Month</td>
						<td><strong> <?php echo date('F, Y',$exTime); ?></strong></td>
						<td>E-TIN:</td>
						<td> <?php echo $salary["EmployeePersonal"]["etin"]; ?></td>
					</tr>
				</table>
				<table class="table table-bordered table-invoice-full">
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
							<td>Basic Salary</td>
							<td class="right"><?php echo number_format($salary["Salary"]["basic"])."/-";?></td>
							<td>|</td>
							<td><?php if(empty($deputation)) echo "CPF - 1 (10%)"; elseif(!empty($deputation) AND $deputation["Deputation"]["ctype"] == 1) echo "CPF - 1 (".$deputation["Deputation"]["percentage"]."%)"; elseif(!empty($deputation) AND $deputation["Deputation"]["ctype"] == 2) echo "GPF - 1 (".$deputation["Deputation"]["percentage"]."%)"; ?></td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php echo number_format($salary["Deduction"]["cpf1"])."/-";?></td>
						</tr>
						<tr>
							<td>Personal Pay</td>
							<td class="right"><?php if(!empty($salary["Salary"]["pp"])) echo number_format($salary["Salary"]["pp"])."/-"; else echo "-";?></td>
							<td>|</td>
							<td><?php if(empty($deputation)) echo "CPF - 2 (2.50%)"; elseif(!empty($deputation) AND $deputation["Deputation"]["ctype"] == 1) echo "CPF - 2 (".$deputation["Deputation"]["percentage2"]."%)"; elseif(!empty($deputation) AND $deputation["Deputation"]["ctype"] == 2) echo "GPF - 2 (".$deputation["Deputation"]["percentage2"]."%)"; ?></td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["cpf2"])) echo number_format($salary["Deduction"]["cpf2"])."/-"; else echo "-";?></td>
						</tr>
						<tr>
                            <td>Festival Bonus</td>
                            <td class="right">-</td>
                            <td>|</td>
                            <td>Arrear CPF</td>
                            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                            <td class="right"><?php if(!empty($salary["Deduction"]["arrear_cpf"])) echo number_format($salary["Deduction"]["arrear_cpf"])."/-"; else echo "-";?></td>
                        </tr>
						<tr>
							<td>Dearness Allowance</td>
							<td class="right"><?php if(!empty($salary["Salary"]["dearness"])) echo number_format($salary["Salary"]["dearness"])."/-"; else echo "-";?></td>
							<td>|</td>
							<td>1st CPF Loan</td>
							<?php 
							if(!empty($loans)){
							$i = 0;
							foreach($loans as $loan){
								$p_installment = $loan["Refund"]["paid_interest_installment"];
								if($loan["Loan"]["type"] == 3){}
								elseif($loan["Loan"]["type"] == 2){}
								elseif($loan["Loan"]["type"] == 4){}
								elseif( ($loan["Loan"]["type"] == 1) && ($loan["Refund"]["paid_interest_installment"] <= 0)){ $i++;
							?>
							<td class="right"><i><?php echo number_format($loan["Loan"]["total"])."/-";?></i></td>
							<td style="text-align:center"><i><?php echo number_format($loan["Loan"]["total_installment"]);?></i></td>
							<td style="text-align:center"><i><?php echo number_format($loan["Refund"]["paid_installment"]);?></i></td>
							<td class="right"><i><?php echo number_format($loan["Refund"]["balance"])."/-";?></i></td>
							<?php }
								elseif($loan["Loan"]["type"] == 1){ $i++;
								?>
									<td class="right">-</td>
									<td style="text-align:center">-</td>
									<td style="text-align:center">-</td>
									<td class="right">-</td>
								<?php	
								}
								else{ ?>
							<td class="right">-</td>
							<td style="text-align:center">-</td>
							<td style="text-align:center">-</td>
							<td class="right">-</td>
							<?php } } }else{ $i =1; ?>
							<td class="right">-</td>
							<td style="text-align:center">-</td>
							<td style="text-align:center">-</td>
							<td class="right">-</td>
							<?php } ?>
							<?php 
							if($i==0){
							?>
								<td class="right">-</td>
								<td style="text-align:center">-</td>
								<td style="text-align:center">-</td>
								<td class="right">-</td>
							<?php	
							}
							?>
							<td class="right"><?php if(!empty($salary["Deduction"]["cpf_loan1"]) && $p_installment <=0) echo number_format($salary["Deduction"]["cpf_loan1"])."/-"; else echo "-"; ?></td>	
						</tr>
						<tr>
							<td>House Rent</td>
							<td class="right"><?php echo number_format($salary["Salary"]["house_rent"])."/-";?></td>
							<td>|</td>
							<td>2nd CPF Loan</td>
							<?php 
							if(!empty($loans)){
							$i = 0;	
							foreach($loans as $loan){
								$p_installment = $loan["Refund"]["paid_interest_installment"];
								if($loan["Loan"]["type"] == 1){}
								elseif($loan["Loan"]["type"] == 3){}
								elseif($loan["Loan"]["type"] == 4){}
								elseif(($loan["Loan"]["type"] == 2) && ($loan["Refund"]["paid_interest_installment"] <= 0)){ $i++;
								?>
								<td class="right"><i><?php echo number_format($loan["Loan"]["total"])."/-";?></i></td>
								<td style="text-align:center"><i><?php echo number_format($loan["Loan"]["total_installment"]);?></i></td>
								<td style="text-align:center"><i><?php echo number_format($loan["Refund"]["paid_installment"]);?></i></td>
								<td class="right"><i><?php echo number_format($loan["Refund"]["balance"])."/-";?></i></td>
								<?php }
									elseif($loan["Loan"]["type"] == 2){ $i++;
									?>
										<td class="right">-</td>
										<td style="text-align:center">-</td>
										<td style="text-align:center">-</td>
										<td class="right">-</td>
									<?php	
									}
									else{ ?>
								<td class="right">-</td>
								<td style="text-align:center">-</td>
								<td style="text-align:center">-</td>
								<td class="right">-</td>
								<?php } } }else{ $i =1;?>
								<td class="right">-</td>
								<td style="text-align:center">-</td>
								<td style="text-align:center">-</td>
								<td class="right">-</td> 
								<?php } ?>
								<?php
								if($i==0){
								?>
									<td class="right">-</td>
									<td style="text-align:center">-</td>
									<td style="text-align:center">-</td>
									<td class="right">-</td>
								<?php	
								}
								?>
								<td class="right"><?php if(!empty($salary["Deduction"]["cpf_loan2"]) && $p_installment <=0) echo number_format($salary["Deduction"]["cpf_loan2"])."/-"; else echo "-";?></td>
							</tr>
						<tr>
							<td>Medical Allow.</td>
							<td class="right"><?php echo number_format($salary["Salary"]["medical"])."/-";?></td>
							<td>|</td>
							<td>Total CPF Interest</td>
							<?php 
							if(!empty($loans)){ 
								$i = 0;	
								foreach($loans as $loan){
									$p_installment = $loan["Refund"]["paid_interest_installment"];
									if(($loan["Loan"]["type"] == 1) && ($p_installment >= 1) &&($loan["Loan"]["interest_installment"] != $p_installment) && ($loan["Loan"]["status"] == 1)){ $i++;
										?><td class="right"><?php echo $loan["Loan"]["total_interest"] .'-/';?></td><td style="text-align:center"><?php echo $loan["Loan"]["interest_installment"]; ?></td><td style="text-align:center" ><?php echo $loan["Refund"]["paid_interest_installment"];?></td><td class="right"><?php echo $loan["Refund"]["interest_balance"] .'-/';?></td><?php
									}
									elseif(($loan["Loan"]["type"] == 2) && ($p_installment >= 1) &&($loan["Loan"]["interest_installment"] != $p_installment ) && ($loan["Loan"]["status"] == 1)){ $i++;
										?><td class="right"><?php echo $loan["Loan"]["total_interest"] .'-/';?></td><td style="text-align:center"><?php echo $loan["Loan"]["interest_installment"]; ?></td><td style="text-align:center" ><?php echo $loan["Refund"]["paid_interest_installment"];?></td><td class="right"><?php echo $loan["Refund"]["interest_balance"] .'-/';?></td><?php
									}
									elseif(($loan["Loan"]["type"] == 3) && ($loan["Loan"]["status"] == 1) ){ $i++;
										?><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><?php
									}
									elseif(($loan["Loan"]["type"] == 4) && ($loan["Loan"]["status"] == 1)) { $i++;
										?><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><?php
									}
									else{
												
									}
								}
							}	
								?>
								<?php
								if($i==0){
									?><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><?php
								}
								?>
								<td class="right"><?php if(!empty($salary["Deduction"]["cpf_loan1"]) && ($p_installment >=1)) { echo number_format($salary["Deduction"]["cpf_loan1"])."/-"; }
														elseif(!empty($salary["Deduction"]["cpf_loan2"]) && ($p_installment >=1)) { echo number_format($salary["Deduction"]["cpf_loan2"])."/-"; }
														else{ echo "-"; }?></td>
							</tr>
						<tr>
							<td>Charge Allowance</td>
							<td class="right"><?php if(!empty($salary["Salary"]["charge"])) echo number_format($salary["Salary"]["charge"])."/-"; else echo "-";?></td>
							<td>|</td>
							<td>Benevolent Fund</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["benevolent_fund"])) echo number_format($salary["Deduction"]["benevolent_fund"])."/-"; else echo "-";?></td>
						
						</tr>
						<tr>
							<td>Children Allowance</td>
							<td class="right"><?php if(!empty($salary["Salary"]["edu"])) echo number_format($salary["Salary"]["edu"])."/-"; else echo "-";?></td>
							<td>|</td>
							<td>Group Insurance</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["group_insurance"])) echo number_format($salary["Deduction"]["group_insurance"])."/-"; else echo "-";?></td>
						
						</tr>
						<tr>
							<td>Deputation Allowance</td>
							<td class="right"><?php if(!empty($salary["Salary"]["deputation"])) echo number_format($salary["Salary"]["deputation"])."/-"; else echo "-";?></td>
							<td>|</td>
							<td>House Rent</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["house_rent_deduct"])) echo number_format($salary["Deduction"]["house_rent_deduct"])."/-"; else echo "-";?></td>
						
						</tr>
						<tr>
							<!--<td>Domestic Aid</td>
							<td class="right"><?php if(!empty($salary["Salary"]["aid"])) echo number_format($salary["Salary"]["aid"])."/-"; else echo "-";?></td>-->
							<td>Domestic Aid</td>
							<td class="right"><?php if(!empty($salary["Salary"]["fraction_increment"])) echo number_format($salary["Salary"]["fraction_increment"])."/-"; else echo "-";?></td>
							
							<td>|</td>
							<td>Land Used</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["fuel"])) echo number_format($salary["Deduction"]["fuel"])."/-"; else echo "-";?></td>
						
						</tr>
						<tr>
							<td>Sumptuary</td>
							<td class="right"><?php if(!empty($salary["Salary"]["sumptuary"])) echo number_format($salary["Salary"]["sumptuary"])."/-"; else echo "-";?></td>
							<td>|</td>
							<td>Telephone Used</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["phone_bill"])) echo number_format($salary["Deduction"]["phone_bill"])."/-"; else echo "-";?></td>
						
						</tr>
						<tr>
							<td>Washing Allowance</td>
							<td class="right"><?php if(!empty($salary["Salary"]["washing"])) echo number_format($salary["Salary"]["washing"])."/-"; else echo "-";?></td>
							<td>|</td>
							<td>Transport Used</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["transport_bill"])) echo number_format($salary["Deduction"]["transport_bill"])."/-"; else echo "-";?></td>							
						
						</tr>
						<tr>
							<td>Conveyance Allowance</td>
							<td class="right"><?php if(!empty($salary["Salary"]["conveyance"])) echo number_format($salary["Salary"]["conveyance"])."/-"; else echo "-";?></td>
							<td>|</td>
							<td>Personal Vehicle Used</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["personal_vehicle"])) echo number_format($salary["Deduction"]["personal_vehicle"])."/-"; else echo "-";?></td>
						
						</tr>
						<tr>
							<td>Tiffin Allowance</td>
							<td class="right"><?php if(!empty($salary["Salary"]["tiffin"])) echo number_format($salary["Salary"]["tiffin"])."/-"; else echo "-";?></td>
							<td>|</td>
							<td>One day Salary</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["w_s"])) echo number_format($salary["Deduction"]["w_s"])."/-"; else echo "-";?></td>
						
						</tr>
						<tr>
							<td>Arrear</td>
							<td class="right"><?php if(!empty($salary["Salary"]["arrear"])) echo number_format($salary["Salary"]["arrear"])."/-"; else echo "-";?></td>
							<td>|</td>
							<td>Overdrawn</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["overdrawn"])) echo number_format($salary["Deduction"]["overdrawn"])."/-"; else echo "-";?></td>
						
						</tr>
						<tr>
							<td>Miscellaneous</td>
							<td class="right"><?php if(!empty($salary["Salary"]["miscellaneous"])) echo number_format($salary["Salary"]["miscellaneous"])."/-"; else echo "-";?></td>
							<td>|</td>
							<td>Asso. Subscription</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["association"])) echo number_format($salary["Deduction"]["association"])."/-"; else echo "-";?></td>
						
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td class="right">&nbsp;</td>
							<td>|</td>
							<td>Income TAX</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["tax"])) echo number_format($salary["Deduction"]["tax"])."/-"; else echo "-";?></td>
						
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td class="right">&nbsp;</td>
							<td>|</td>
							<td>House Loan</td>
							<?php //pr($loans);
							if(!empty($salary['Loans'])){
							$i = 0;	
							foreach($salary['Loans'] as $loan){
								if($loan["Loan"]["type"] == 1){}
								elseif($loan["Loan"]["type"] == 2){}
								elseif($loan["Loan"]["type"] == 4){}
								elseif($loan["Loan"]["type"] == 3){ $i++;
							?>
							<td class="right"><i><?php echo number_format($loan["Loan"]["total"])."/-";?></i></td>
							<td style="text-align:center"><i><?php echo number_format($loan["Loan"]["total_installment"]);?></i></td>
							<td style="text-align:center"><i><?php echo number_format($loan["Refund"]["paid_installment"]);?></i></td>
							<td class="right"><i><?php echo number_format($loan["Refund"]["balance"])."/-";?></i></td>
							<?php }else{ ?>
								<td class="right">-</td>
								<td style="text-align:center">-</td>
								<td style="text-align:center">-</td>
								<td class="right">-</td>
							<?php } } }else{ $i++; ?>
							<td class="right">-</td>
							<td style="text-align:center">-</td>
							<td style="text-align:center">-</td>
							<td class="right">-</td>
							<?php } ?>
							<?php
							if($i==0){
							?>
								<td class="right">-</td>
								<td style="text-align:center">-</td>
								<td style="text-align:center">-</td>
								<td class="right">-</td>
							<?php	
							}
							?>
                            <td class="right"><?php if(!empty($salary["Deduction"]["house_loan"])) echo number_format($salary["Deduction"]["house_loan"])."/-"; else echo "-";?></td>
                        
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td class="right">&nbsp;</td>
							<td>|</td>
							<td>Vehicle Loan</td>
							<?php 
							if(!empty($salary['Loans'])){
								$i=0;
							foreach($salary['Loans'] as $loan){
								if($loan["Loan"]["type"] == 1){}
								elseif($loan["Loan"]["type"] == 2){}
								elseif($loan["Loan"]["type"] == 3){}
								elseif($loan["Loan"]["type"] == 4){ $i++;
							?>
							<td class="right"><i><?php echo number_format($loan["Loan"]["total"])."/-";?></i></td>
							<td style="text-align:center"><i><?php echo number_format($loan["Loan"]["total_installment"]);?></i></td>
							<td style="text-align:center"><i><?php echo number_format($loan["Refund"]["paid_installment"]);?></i></td>
							<td class="right"><i><?php echo number_format($loan["Refund"]["balance"])."/-";?></i></td>
							<?php }else{ $i++; ?>
							<td class="right">-</td>
							<td style="text-align:center">-</td>
							<td style="text-align:center">-</td>
							<td class="right">-</td>
							<?php } } }else{ $i++;?>
							<td class="right">-</td>
							<td style="text-align:center">-</td>
							<td style="text-align:center">-</td>
							<td class="right">-</td> 
							<?php  } ?>
							<?php
							if($i==0){
							?>
								<td class="right">-</td>
								<td style="text-align:center">-</td>
								<td style="text-align:center">-</td>
								<td class="right">-</td>
							<?php	
							}
							?>
                            <td class="right"><?php if(!empty($salary["Deduction"]["vehicle_loan"])) echo number_format($salary["Deduction"]["vehicle_loan"])."/-"; else echo "-";?></td>
                        
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td class="right">&nbsp;</td>
							<td>|</td>
							<td>House Loan Interest</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["h_interest"])) echo number_format($salary["Deduction"]["h_interest"])."/-"; else echo "-";?></td>
						
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td class="right">&nbsp;</td>
							<td>|</td>
							<td>Vehicle Loan Interest</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["v_interest"])) echo number_format($salary["Deduction"]["v_interest"])."/-"; else echo "-";?></td>
						
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td class="right">&nbsp;</td>
							<td>|</td>
							<td>Miscellaneous</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["miscellaneous_deduct"])) echo number_format($salary["Deduction"]["miscellaneous_deduct"])."/-"; else echo "-";?></td>
						</tr>
					</tbody>
				</table>
				
				<table class="table table-bordered table-invoice-full">
                    <tbody>
                        <tr>
                            <td class="left width15"><strong>Gross Salary:</strong></td>
                            <td class="right width20" style="text-align:right;"><strong><?php echo number_format($salary["Salary"]["total_add"])."/-";?></strong></td>
                            <td colspan="2" class="right"><strong>Total Deduction:</strong></td>
                            <td class="left width15" style="text-align:right"><strong><?php echo number_format($salary["Deduction"]["total_sub"])."/-";?></strong></td>
                        </tr>
                        <tr>
                            <td class="msg-invoice" colspan="3"><h4><p><?php echo "IN WORD: ";?><?php echo strtoupper($salary["Salary"]["in_word"]);?></p></h4></td>
                            <td class="right width15" style="text-align:right"><strong>Net Payable:</strong></td>
                            <td class="left width15" style="text-align:right"><strong><?php echo number_format($salary["Salary"]["payable"])."/-";?></strong></td>
                        </tr>
                    </tbody>
                </table>
			</div>
		</div>
		
		<div class="row-fluid">
            <div class="span12">
                <table class="table table-bordered table-invoice-full" style="font-size:13px">
                    <tr>
                        <td colspan="5"><strong>Passed for payment &nbsp;<?php echo $salary["Salary"]["payable"]."/-";?></strong></td>
                    </tr>
                    <tr>
                        <td colspan="2"><strong><?php echo $salary["Salary"]["in_word"];?></strong></td>
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
					<div class="footerleft">Developed By: <a href="http://mahmudit.com" target="new"><strong>Engr. Rajib Mahmud</strong></a></div>
					<div class="footerleft" style="margin-left: 260px;">Copyright © 2013 <a href="http://www.barc.gov.bd" target="new"><strong>Bangladesh Agricultural Research Council</strong></a></div>
				</div>
			</div>
		</div>				
	</div>
</div>