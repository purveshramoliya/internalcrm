<?php
class JoineeUserHandler extends VTEventHandler
{
	function randomPassword() {
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		    for ($i = 0; $i < 8; $i++) {
			    $n = rand(0, $alphaLength);
			    $pass[] = $alphabet[$n];
			}
		return implode($pass); //turn the array into a string
	}

	function handleEvent($eventName, $entityData)
	{
		if ($eventName == 'vtiger.entity.aftersave') {

			global $site_URL;
			$moduleName = $entityData->getModuleName();
			$entityId = $entityData->getId();
			$status = $entityData->get('cf_1340');
			$username = $entityData->get('joinee_tks_lastname');
			$email = $entityData->get('joinee_tks_emailid');

			if ($moduleName == 'Joinee') {

				if($status == 'Active')
				{
					require_once 'includes/HTTP_Client/HTTP_Client/Client.php';
					require_once('include/database/PearDatabase.php');
					$endpointUrl = $site_URL."webservice.php";
					$userName="admin";
					global $log,$site_URL,$HELPDESK_SUPPORT_EMAIL_ID,$HELPDESK_SUPPORT_NAME;
					$from=$HELPDESK_SUPPORT_EMAIL_ID;
					$fromName=$HELPDESK_SUPPORT_NAME;
					$adb = PearDatabase::getInstance();

			        //user details
					if(isset($entityId))
					{
						$username=$entityData->get('joinee_tks_lastname');
						$password=$entityData->get('joinee_tks_reportto');
						$email=$entityData->get('joinee_tks_emailid');
						$role=$entityData->get('cf_1328');
						$roleid=substr($role, strpos($role, '-') + 1);

						$httpc = new HTTP_CLIENT();

						$httpc->get("$endpointUrl?operation=getchallenge&username=$userName");
						$response = $httpc->currentResponse();
						$jsonResponse = Zend_JSON::decode($response['body']);
						if($jsonResponse['success']==false) die('getchallenge failed:'.$jsonResponse['error']['errorMsg']);
						$challengeToken = $jsonResponse['result']['token'];
						echo 'challengeToken is ' .$challengeToken;

						$userAccessKey = '7k5oPdIA5OWAPGsJ'; //web services acess key for user admin
						$generatedKey = md5($challengeToken.$userAccessKey);
						$httpc->post("$endpointUrl",array('operation'=>'login', 'username'=>$userName,'accessKey'=>$generatedKey), true);
						$response = $httpc->currentResponse();
						$jsonResponse = Zend_JSON::decode($response['body']);

						if($jsonResponse['success']==false)
							die('login failed:'.$jsonResponse['error']['errorMsg']);
						echo 'login success';
						$sessionId = $jsonResponse['result']['sessionName'];
						$userId = $jsonResponse['result']['userId'];
						echo 'user id is ' . $userId;

						$counter = new JoineeUserHandler();
                        $pass = $counter->randomPassword();

						$params= Array(
							'user_name'=>$username,
							'first_name'=>$username,
							'last_name'=>$username,
							'status'=>'Inactive',
							'is_admin'=>'off',
							'user_password'=>$pass,
							'confirm_password'=>$pass,
							'email1'=>$email,
							'roleid'=>$roleid,
							'tz' => 'Asia/Kolkata',
							'title' => 'Asia',
							"reminder_interval"=>'5 Minutes',
							'assigned_user_id'=> $userId
							);
						$objectJson = Zend_JSON::encode($params);
						$moduleName = 'Users';

						$params = array("sessionName"=>$sessionId, "operation"=>'create', "element"=>$objectJson, "elementType"=>$moduleName);
						$httpc->post($endpointUrl.$urlArgs, $params, true);
						$response = $httpc->currentResponse();
						$jsonResponse = Zend_JSON::decode($response['body']);
						$savedObject = $jsonResponse['result'];
						$log->debug("Enteringvalueof".$jsonResponse);

						$prjquery=$adb->pquery("SELECT * FROM `vtiger_users` where last_name='$username' and email1='$email'");
						$userid=$adb->query_result($prjquery,0,'id');
						$status=$adb->query_result($prjquery,0,'status');
						if(isset($userid) && $status == 'Inactive')
						{
							$adb->pquery("UPDATE `vtiger_crmentity` SET `smownerid` = '$userid' WHERE `vtiger_crmentity`.`crmid` =".$entityId); 
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
							<p>Password : '.$pass.' </p>
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
}
