<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class Joinee_BondLetter_Action extends Vtiger_Action_Controller {

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
        $empno = $JoineeRecordModel->get('joineeno');
        $firstname = $JoineeRecordModel->get('joinee_tks_firstname');
        $lastname = $JoineeRecordModel->get('joinee_tks_lastname');
        $position = $JoineeRecordModel->get('joinee_tks_positiontitle');
        $ctcdigit = $JoineeRecordModel->get('cf_1330');
        $thsdigit = $JoineeRecordModel->get('cf_1332');
        $ctc = number_format($ctcdigit, 2);
        $ths = number_format($thsdigit, 2);
        $Joiningdate = $JoineeRecordModel->get('cf_1334');  


        $body='<html>
        <head>
        <title></title>
        </head>
        <body>
        <div>
        <div>
        <img  class="logo" src="includes/mpdf/bondheader.png" alt="header">
        </div>
        <div>          
        <div class="a bondheader">
        <h2><u>EMPLOYMENT BOND OR CONTRACT</u></h2>
        </div>
        <table>
        <tr>
        <td>
        <p>THIS AGREEMENT is made on the Date between <b>Biztechnosys Infotech Pvt. Ltd.</b>, a company registered under the Companies Act 1956 year and having its registered office at Bangalore office address <b>#722/1, Raj Arcade, 1st Floor,Above Bank of Maharashtra, 24th Main Rd, 6th Phase, J.P. Nagar -560078 </b>(here in after called the “company”) of the one part and <b>'.$firstname.' '.$lastname.'</b> residing at '.$address.'(Here in after called the “Employee”) of the other part.
        </p>
        </td>
        </tr>
        <tr>
        <td>
        <div class="div-left">
        <p style="color:green;"><b>WHERE AS</b><p>
        </div>
        </td>
        </tr>
        <tr>
        <td>
        <p>The company is desirous making an agreement with '.$firstname.' '.$lastname.' (Emp. No. '.$empno.') joined with Company in '.$Joiningdate.' as its '.$position.' and the Employee has agreed to do the terms and condition soutlined here below.
        </p>
        </td>
        </tr>
        <tr>
        <td>
        <div class="div-left bondtitle">
        <p style="color:green;"><b>NOW THIS AGREEMENT WITNESSES AS FOLLOW:</b><p>
        </div>
        </td>
        </tr>
        <tr>
        <td>
        <p>1.  The said '.$firstname.' '.$lastname.' is here by appointed as the '.$position.' of the company and he/she will hold the said office, subject to the provisions made here in after, for the term of (Duration with theorganization) of TWO YEARS from the date of this agreement. If the Appointee fails to complete the bond agreement period of TWO Years will be liable to pay bond amount of rupees 50,000/-, will face the jurisdictional actions as per Karnataka Court Act.
        </p>
        </td>
        </tr>
        <tr>
        <td>
        <p>2. Your monthly salary package will be as per the appointment. Based on the periodic reviews your compensation package may differ as per the compensation Policy applicable to all employees of your category in respective department.
        </p>
        </td>
        </tr>
        <tr>
        <td>
        <p>3. The Employee shall perform such duties and exercises such powers as may from time to time be assigned to orvested in him by the reporting manager or Board of Directors of the company.
        </td>
        </tr>
        <tr>
        <td>
        <p>
        4.  The Employee shall obey the orders from time to time of the Board of  Directors of the company andin all respect conform to and comply with the directions given and regulation made by the Board.He/she shall well and faithfully serve the company to the best of his abilities and shall make his utmost endeavors to promote interests of the company.
        </p>
        </td>
        </tr>
        <tr>
        <td>
        <p>
        5.  The said Employee shall not resign until the end of this contract period.
        </p>
        </td>
        </tr>
        <tr>
        <td>
        <p>
        6.  The company may terminate this agreement at any time before the expiry of the stipulated term by giving one month´s notice in writing to him. The company can terminate your contract any time if you-
        </p>
        </td>
        </tr>
        <tr>
        <td>
        <p>
        • Commit any material or persistent breach of any of the provisions contained.
        </p>
        </td>
        </tr>
        <tr>
        <td>
        <p>
        • Be guilty of any default, misconduct or neglecting the discharge of your duties affecting the business of the company.
        </p>
        </td>
        </tr>
        <tr>
        <td>
        <p>
        • Any of the employee’s performance  issues. This is completely at the discretion of the organization.
        </p>
        </td>
        </tr>
        <br/>
        </table>
        <div>
        <div class="leftDiv">
        <p>Signature of the Employee:</p>
        <p>Name of the Employee:  </p>
        </div>
        <div class="rightDiv">
        <p style="padding-left:150px;">Date:</p>
        <p style="padding-left:150px;">Place:</p>
        </div>
        <div style="clear: both;"></div>
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
        $xfile=$mpdf->Output('BondLetter-'.$empno.'.pdf','D');

        echo $xfile;

        return $xfile;
    }
}
