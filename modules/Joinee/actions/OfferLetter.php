<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class Joinee_OfferLetter_Action extends Vtiger_Action_Controller {

	public function requiresPermission(\Vtiger_Request $request) {
		$permissions = parent::requiresPermission($request);
		$permissions[] = array('module_parameter' => 'module', 'action' => 'DetailView', 'record_parameter' => 'record');
        $permissions[] = array('module_parameter' => 'module', 'action' => 'ConvertFAQ', 'record_parameter' => 'record');
        $permissions[] = array('module_parameter' => 'custom_module', 'action' => 'CreateView');
        $request->set('custom_module', 'Joinee');
        return $permissions;
    }

    public function process(Vtiger_Request $request) {

        $moduleName = $request->getModule();

        $JoineeRecordModel = Vtiger_Record_Model::getInstanceById($request->get('record'), $moduleName);
        
        $todaydate = date('d-m-Y');
        $empno = $JoineeRecordModel->get('joinee_no');
        $firstname = $JoineeRecordModel->get('joinee_tks_firstname');
        $lastname = $JoineeRecordModel->get('joinee_tks_lastname');
        $position = $JoineeRecordModel->get('joinee_tks_positiontitle');
        $ctcdigit = $JoineeRecordModel->get('cf_1330');
        $thsdigit = $JoineeRecordModel->get('cf_1332');
        $ctc = number_format($ctcdigit, 2);
        $ths = number_format($thsdigit, 2);
        $Joiningdate = $JoineeRecordModel->get('cf_1334');

        if(isset($ctc))
        {
            $number = number_format($ctc,2,',','');
            $no = floor($number);
            $point = round($number - $no, 2) * 100;
            $hundred = null;
            $digits_1 = strlen($no);
            $i = 0;
            $str = array();
            $words = array('0' => '', '1' => 'one', '2' => 'two',
                '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
                '7' => 'seven', '8' => 'eight', '9' => 'nine',
                '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
                '13' => 'thirteen', '14' => 'fourteen',
                '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
                '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
                '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
                '60' => 'sixty', '70' => 'seventy',
                '80' => 'eighty', '90' => 'ninety');
            $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
            while ($i < $digits_1) {
             $divider = ($i == 2) ? 10 : 100;
             $number = floor($no % $divider);
             $no = floor($no / $divider);
             $i += ($divider == 10) ? 1 : 2;
             if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str [] = ($number < 21) ? $words[$number] .
                " " . $digits[$counter] . $plural . " " . $hundred
                :
                $words[floor($number / 10) * 10]
                . " " . $words[$number % 10] . " "
                . $digits[$counter] . $plural . " " . $hundred;
            } else $str[] = null;
        }
        $str = array_reverse($str);
        $result = implode('', $str);
        $ctcword=$result . "Rupees";
    }

    if(isset($ths))
    {
        $number = number_format($ths,2,',','');
        $no = floor($number);
        $point = round($number - $no, 2) * 100;
        $hundred = null;
        $digits_1 = strlen($no);
        $i = 0;
        $str = array();
        $words = array('0' => '', '1' => 'one', '2' => 'two',
            '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
            '7' => 'seven', '8' => 'eight', '9' => 'nine',
            '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
            '13' => 'thirteen', '14' => 'fourteen',
            '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
            '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
            '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
            '60' => 'sixty', '70' => 'seventy',
            '80' => 'eighty', '90' => 'ninety');
        $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
        while ($i < $digits_1) {
         $divider = ($i == 2) ? 10 : 100;
         $number = floor($no % $divider);
         $no = floor($no / $divider);
         $i += ($divider == 10) ? 1 : 2;
         if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
        } else $str[] = null;
    }
    $str = array_reverse($str);
    $result = implode('', $str);
    $thsword=$result . "Rupees";
}


$body='<html>
<head>
<title></title>
</head>
<body>
<div>
<div>
<img  class="logo" src="includes/mpdf/header.png" alt="header">
</div>
<div>
<div class="div-left"><p>Date:'.$todaydate.'<p></div>           
<div class="a">
<h2><u>Offer Letter</u></h2>
</div>
<table>
<tr>
<td>
<div class="div-left">
<p>Dear '.$firstname.' '.$lastname.',<p>
</div>
</td>
</tr>
<tr>
<td>
<p>
With reference to your application and subsequent interview with us,we are pleased to extend an offer of employment to you in our organization at the position of “'.$position.'”, at a fixed Annual CTC of INR '.$ctc.'/- Per Annum ('.$ctcword.') with a take home salary of Rs.'.$ths.'/- ('.$thsword.') per month.
</p>
</td>
</tr>
<tr>
<td>
<p>
The first 3 months of your service will be on probation, at the end of which, the company may confirm your services, subject to your performance meeting our requisite standards. You will be on probation till the time you receive the confirmation letter. You have to serve 3 months’ notice period from the date of resignation submission.
</p>
</td>
</tr>
<tr>
<td>
<p>
We would expect you to join as early as possible confirming us on your date of joining to be 11/02/2022.
</p>
</td>
</tr>
<tr>
<td>
<p>
On the date of joining, you will receive your appointment letter. Please note that any false declaration of your documents mailed by you as a reply on Pre-Offer would result in cancellation of this offer.Kindlysign thecopy as atoken ofyouracceptanceoftheofferand returnus thesame.
</p>
</td>
</tr>
<tr>
<td>
<p>
We look forward to having a long-term association with you.
</p>
</td>
</tr>
<br/>
</table>
<div class="outerDiv">
<div class="leftDiv">
<p>Thanking You,</p>
<p>For Biztechnosys Infotech Pvt.Ltd.</p>
<img  class="sign" src="includes/mpdf/sign.png" alt="sign">
<p>Sathiaraj T</p>
<p>Manager - Human Resource & Admin<p>
</div>
<div class="rightDiv">
<p style="padding-left:150px;">Accepted the Offer</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p style="padding-left:150px;">_____________________</p>
<p style="padding-left:150px;">Signature of the candidate</p>
</div>
<div style="clear: both;"></div>
</div>
</div>
</div>
</body>
</html>';

ob_start();
$body = iconv("UTF-8","UTF-8//IGNORE",$body);

include("includes/mpdf/mpdf/mpdf.php");

$mpdf=new mPDF('c','A4','','',15,15,15,15,15,15);  
$stylesheet = file_get_contents('includes/mpdf/mpdfstyletables.css');
$mpdf->WriteHTML($stylesheet,1);
         //write html to PDF
$m=$mpdf->WriteHTML($body,2);
         //output pdf
$xfile=$mpdf->Output('Offerlatter-'.$empno.'.pdf','D');

echo $xfile;

return $xfile;
}
}
