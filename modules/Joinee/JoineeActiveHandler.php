<?php

class VendorsSupplierActiveHandler extends VTEventHandler
{

	function handleEvent($eventName, $entityData)
	{
// 		ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

		global $log, $adb;

		if ($eventName == 'vtiger.entity.aftersave') {

			$moduleName = $entityData->getModuleName();
			
			if ($moduleName == 'Vendors') {

				$active=$_REQUEST['active'];
				$crmid=$_REQUEST['record'];
				$currentid=$_REQUEST['currentid'];
				$suppliername=$_REQUEST['vendorname'];
				$email=$_REQUEST['email'];

				require_once 'config.inc.php';
				global $site_URL,$HELPDESK_SUPPORT_EMAIL_ID,$HELPDESK_SUPPORT_NAME;
				$from=$HELPDESK_SUPPORT_EMAIL_ID;
				$fromName=$HELPDESK_SUPPORT_NAME;
				
				if(empty($crmid))
				{
					$crmid=$currentid;
				}

				$prjquery=$adb->pquery("SELECT * FROM `vtiger_users` where first_name='$suppliername' and email1='$email'");
			    $userid=$adb->query_result($prjquery,0,'id');
			    $status=$adb->query_result($prjquery,0,'status');
			    if(isset($userid))
			    {
			    $adb->pquery("UPDATE `vtiger_crmentity` SET `smownerid` = '$userid' WHERE `vtiger_crmentity`.`crmid` =".$crmid); 
                
                if($active == 'on' && $status == 'Inactive')
                {
			    $adb->pquery("update `vtiger_users` set status='Active' where id=".$userid); 

			    $subject = "Joining Request Approved by Basico"; 
 
				$htmlContent = ' 
				    <html> 
				    <head> 
				        <title>('.$username.') supplier login has been Approved</title> 
				    </head> 
				    <body> 
				    <p>Hi There!</p>
				        <p>Thank you for Joining basico as Supplier,<br>
				         Your request has been approved and now you can login with the username and password you have added at the time of Sign up by clicking on the link provided.</p>
				         <a href="'.$site_URL.'">Login</a><br><br>
				    Thanks<br>
				     </body> 
				    </html>'; 
 
				// Set content-type header for sending HTML email 
				$headers = "MIME-Version: 1.0" . "\r\n"; 
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
				 
				// Additional headers 
				$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 

				mail($email, $subject, $htmlContent, $headers);
			    }
			  }	
			}
		}
	}
}
