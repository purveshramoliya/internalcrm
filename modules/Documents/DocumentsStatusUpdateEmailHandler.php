<?php

class DocumentsStatusUpdateEmailHandler extends VTEventHandler
{

	function handleEvent($eventName, $entityData)
	{

		global $log, $adb;

		if ($eventName == 'vtiger.entity.aftersave') {

			$moduleName = $entityData->getModuleName();
			$entityId = $entityData->getId();
			$status = $entityData->get('cf_1338');

			$rpquery = $adb->pquery("SELECT crmid FROM `vtiger_senotesrel` where notesid=".$entityId);
			$recordId=$adb->query_result($rpquery,0,'crmid');
			
			if ($moduleName == 'Documents') {

				// update joinee verifed document field on doc status update
		       //status update in joinee
				$Docres = $adb->pquery("SELECT title FROM `vtiger_notes` n INNER JOIN `vtiger_notescf` nc on n.notesid=nc.notesid INNER JOIN `vtiger_senotesrel` s on n.notesid=s.notesid WHERE s.crmid=".$recordId);
				$totalNoOfDoc=$adb->num_rows($Docres);

				$AppDocres = $adb->pquery("SELECT title FROM `vtiger_notes` n INNER JOIN `vtiger_notescf` nc on n.notesid=nc.notesid INNER JOIN `vtiger_senotesrel` s on n.notesid=s.notesid WHERE s.crmid=? and nc.cf_1338=?", array($recordId,'Approved'));
				$totalNoOfAppDoc=$adb->num_rows($AppDocres);

				if($status != "Approved")
				{
					$adb->pquery("update vtiger_joineecf set cf_1346=0 where joineeid=".$recordId);
				}

				if ($totalNoOfAppDoc == $totalNoOfDoc ) {
					$adb->pquery("update vtiger_joineecf set cf_1346=1 where joineeid=".$recordId);
				} 

				if($status == 'Rejected')
				{
					require_once("vtlib/Vtiger/Mailer.php");

					global $site_URL,$HELPDESK_SUPPORT_EMAIL_ID,$HELPDESK_SUPPORT_NAME;
					$from=$HELPDESK_SUPPORT_EMAIL_ID;
					$fromName=$HELPDESK_SUPPORT_NAME;

					$query=$adb->pquery("select joineeno,joinee_tks_firstname,joinee_tks_lastname,joinee_tks_emailid,joinee_tks_positiontitle from vtiger_Joinee inner join vtiger_crmentity on vtiger_crmentity.crmid=vtiger_Joinee.joineeid where vtiger_crmentity.deleted=0 and vtiger_Joinee.joineeid=".$recordId);
					$joineeno=$adb->query_result($query,0,'joineeno');
					$firstname=$adb->query_result($query,0,'joinee_tks_firstname');
					$lastname=$adb->query_result($query,0,'joinee_tks_lastname');
					$toemail=$adb->query_result($query,0,'joinee_tks_emailid');

					$contents='<html>
					<head>
					<title></title>
					</head>
					<body>
					<table>
					<tr><td>
					<p>Dear '.$firstname.' '.$lastname.',<p>
					</td></tr>
					<tr><td>
					<p>Document has been Rejected by HR,Please update documents.</p>
					</td></tr>
					<br/>
					</table>
					</body>
					</html>';
					$subject='Documents Rejected By - HR';
					$description = $contents;
					$mailer = new Vtiger_Mailer();
					$mailer->IsHTML(true);
					$mailer->ConfigSenderInfo($from,$fromName);
					$mailer->Subject =$subject;
					$mailer->Body = $description;
					$mailer->AddAddress($toemail);
				 //$mailer->AddAttachment('attatchments/yourattachment.docx', decode_html('yourattachment.docx'));
					$status = $mailer->Send(true);
				}

				if($status == 'Pending')
				{
					require_once("vtlib/Vtiger/Mailer.php");

					global $site_URL,$HELPDESK_SUPPORT_EMAIL_ID,$HELPDESK_SUPPORT_NAME;
					$from=$HELPDESK_SUPPORT_EMAIL_ID;
					$fromName=$HELPDESK_SUPPORT_NAME;

					$query=$adb->pquery("select joineeno,joinee_tks_firstname,joinee_tks_lastname,joinee_tks_emailid,joinee_tks_positiontitle from vtiger_Joinee inner join vtiger_crmentity on vtiger_crmentity.crmid=vtiger_Joinee.joineeid where vtiger_crmentity.deleted=0 and vtiger_Joinee.joineeid=".$recordId);
					$joineeno=$adb->query_result($query,0,'joineeno');
					$firstname=$adb->query_result($query,0,'joinee_tks_firstname');
					$lastname=$adb->query_result($query,0,'joinee_tks_lastname');
					$toemail=$adb->query_result($query,0,'joinee_tks_emailid');

					$contents='<html>
					<head>
					<title></title>
					</head>
					<body>
					<table>
					<tr><td>
					<p>Dear '.$firstname.' '.$lastname.',<p>
					</td></tr>
					<tr><td>
					<p>Document has been Pending by HR,Please wait for update.</p>
					</td></tr>
					<br/>
					</table>
					</body>
					</html>';
					$subject='Documents Pending By - HR';
					$description = $contents;
					$mailer = new Vtiger_Mailer();
					$mailer->IsHTML(true);
					$mailer->ConfigSenderInfo($from,$fromName);
					$mailer->Subject =$subject;
					$mailer->Body = $description;
					$mailer->AddAddress($toemail);
				}
			}
		}
	}
}
