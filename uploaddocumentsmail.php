<?php
require_once("vtlib/Vtiger/Mailer.php");
global $adb,$site_URL,$HELPDESK_SUPPORT_EMAIL_ID,$HELPDESK_SUPPORT_NAME,$HR_SUPPORT_EMAIL_ID,$HR_SUPPORT_NAME;
$from=$HELPDESK_SUPPORT_EMAIL_ID;
$fromName=$HELPDESK_SUPPORT_NAME;
$HRMail=$HR_SUPPORT_EMAIL_ID;

$record=$_POST['record'];

$query=$adb->pquery("select joineeno,joinee_tks_firstname,joinee_tks_lastname,joinee_tks_emailid,joinee_tks_positiontitle from vtiger_joinee inner join vtiger_crmentity on vtiger_crmentity.crmid=vtiger_joinee.joineeid where vtiger_crmentity.deleted=0 and vtiger_joinee.joineeid=".$record);
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
$mailer->AddAddress($HRMail);
$status = $mailer->Send(true);
?>