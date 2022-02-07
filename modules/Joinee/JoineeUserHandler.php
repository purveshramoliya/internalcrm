<?php

class ProjectTaskAssignedSupplierHandler extends VTEventHandler
{

	function handleEvent($eventName, $entityData)
	{

		if ($eventName == 'vtiger.entity.aftersave') {

			$moduleName = $entityData->getModuleName();
			
			if ($moduleName == 'Joinee') {
				global $log,$adb;
				$supplierid=$_REQUEST['vendorid'];
				$crmid=$_REQUEST['record'];
				$currentid=$_REQUEST['currentid'];
				$taskname=$_REQUEST['projecttaskname'];
				$adminstatus=$_REQUEST['pt_adminstatus'];
				$notify=$_REQUEST['cf_2023'];
				$supervisorid=$entityData->get('selecteduser');
				$svquery=$adb->pquery("SELECT email1,last_name FROM `vtiger_users` where id=".$supervisorid);
				$svemail=$adb->query_result($svquery,0,'email1');
				$svname=$adb->query_result($svquery,0,'last_name');

				require_once 'config.inc.php';
				require_once("modules/Emails/mail.php");
				global $site_URL,$HELPDESK_SUPPORT_EMAIL_ID,$HELPDESK_SUPPORT_NAME;
				$from=$HELPDESK_SUPPORT_EMAIL_ID;
				$fromName=$HELPDESK_SUPPORT_NAME;
				
				if(empty($crmid))
				{
					$crmid=$currentid;
				}
			}
		}
	}
}
