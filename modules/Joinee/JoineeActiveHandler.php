<?php

class JoineeActiveHandler extends VTEventHandler
{

	function handleEvent($eventName, $entityData)
	{

		global $log, $adb;

		if ($eventName == 'vtiger.entity.aftersave') {

			$moduleName = $entityData->getModuleName();
			
			if ($moduleName == 'Joinee') {

				$active=$_REQUEST['cf_1326'];
				$crmid=$_REQUEST['record'];
				$username=$_REQUEST['joinee_tks_lastname'];
			    $password=$_REQUEST['joinee_tks_reportto'];
			    $email=$_REQUEST['joinee_tks_emailid'];

				require_once 'config.inc.php';
				include_once 'modules/Emails/Models/Mailer.php';
				require_once("modules/Emails/mail.php");
				global $site_URL,$HELPDESK_SUPPORT_EMAIL_ID,$HELPDESK_SUPPORT_NAME;
				$from=$HELPDESK_SUPPORT_EMAIL_ID;
				$fromName=$HELPDESK_SUPPORT_NAME;
				
				if(empty($crmid))
				{
					$crmid=$currentid;
				}

				$prjquery=$adb->pquery("SELECT * FROM `vtiger_users` where last_name='$username' and email1='$email'");
			    $userid=$adb->query_result($prjquery,0,'id');
			    $status=$adb->query_result($prjquery,0,'status');
			    if(isset($userid))
			    {
			    $adb->pquery("UPDATE `vtiger_crmentity` SET `smownerid` = '$userid' WHERE `vtiger_crmentity`.`crmid` =".$crmid); 
                
                if($active == 'on' && $status == 'Inactive')
                {
			    $adb->pquery("update `vtiger_users` set status='Active' where id=".$userid); 

			    $subject = "Joining Request Approved by BizTechnoSys"; 
 
				$htmlContent = ' 
				    <html> 
				    <head> 
				        <title>('.$username.') User login has been Approved</title> 
				    </head> 
				    <body> 
				    <p>Hi There!</p>
				        <p>Thank you for Joining BizTechnoSys,<br>
				         Your Joining request has been approved and now you can login with the username and password by clicking on the link provided.</p>
				         <p>Username : '.$username.' </p>
				         <p>Password : '.$password.' </p>
				         <a href="'.$site_URL.'">Login</a><br><br>
				    Thanks<br>
				     </body> 
				    </html>'; 
 
				send_mail('Joinee',$email, $fromName, $from, $subject, $htmlContent,'','','','','',true);
			    }
			  }	
			}
		}
	}
}
