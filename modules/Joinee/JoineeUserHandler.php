<?php

class JoineeUserHandler extends VTEventHandler
{

	function handleEvent($eventName, $entityData)
	{

		if ($eventName == 'vtiger.entity.aftersave') {

			global $site_URL;

			$moduleName = $entityData->getModuleName();
			$entityId = $entityData->getId();
			$status = $entityData->get('cf_1340');
			
			if ($moduleName == 'Joinee') {

				if($status == 'Active')
				{

			//require_once 'vtwsclib/third-party/Zend/Json.php';
					require_once 'includes/HTTP_Client/HTTP_Client/Client.php';
			//require_once 'modules/Emails/class.smtp.php';
					require_once('include/database/PearDatabase.php');
			//require_once 'modules/Emails/class.phpmailer.php';
			//include_once 'include/Webservices/Utils.php';

					$endpointUrl = $site_URL."webservice.php";
					$userName="admin";
					global $site_URL,$HELPDESK_SUPPORT_EMAIL_ID,$HELPDESK_SUPPORT_NAME;
					$from=$HELPDESK_SUPPORT_EMAIL_ID;
					$fromName=$HELPDESK_SUPPORT_NAME;
					$adb = PearDatabase::getInstance();
					global $log;

			//user details
					$record=$_REQUEST['record'];


					if(empty($record))
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

			$params= Array(
				'user_name'=>$username,
				'first_name'=>$username,
				'last_name'=>$username,
				'status'=>'Inactive',
				'is_admin'=>'off',
				'user_password'=>$password,
				'confirm_password'=>$password,
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
		}
	}
}
}
}
}
