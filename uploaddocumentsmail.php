<?php
require_once("vtlib/Vtiger/Mailer.php");
require_once('include/utils/utils.php');
require_once('include/logging.php');
global $adb,$site_URL,$HELPDESK_SUPPORT_EMAIL_ID,$HELPDESK_SUPPORT_NAME;
$from=$HELPDESK_SUPPORT_EMAIL_ID;
$fromName=$HELPDESK_SUPPORT_NAME;

$record=$_POST['record'];
//$record=15523;

$query=$adb->pquery("select joineeno,joinee_tks_firstname,joinee_tks_lastname,joinee_tks_emailid,joinee_tks_positiontitle from vtiger_Joinee inner join vtiger_crmentity on vtiger_crmentity.crmid=vtiger_Joinee.joineeid where vtiger_crmentity.deleted=0 and vtiger_Joinee.joineeid=".$record);
$joineeno=$adb->query_result($query,0,'joineeno');
$firstname=$adb->query_result($query,0,'joinee_tks_firstname');
$lastname=$adb->query_result($query,0,'joinee_tks_lastname');

$contents='<html>
<head>
<title></title>
</head>
<body>
<table>
<tr><td>
<p>Dear HR,<p>
</td></tr>
<tr><td>
<p>Document has been Uploaded by candidate,Please update status of documents.</p>
</td></tr>
<br/>
</table>
</body>
</html>';
$subject='Documents Uploaded By -'.$firstname.' '.$lastname;
$description = $contents;
$mailer = new Vtiger_Mailer();
$mailer->IsHTML(true);
$mailer->ConfigSenderInfo($from,$fromName);
$mailer->Subject =$subject;
$mailer->Body = $description;
$mailer->AddAddress("purveshramoliya@gmail.com");
 //$mailer->AddAttachment('attatchments/yourattachment.docx', decode_html('yourattachment.docx'));
$status = $mailer->Send(true);

if ( !$mailer->Send() ){
	return false;
}
else{
	return true;
} 
?>