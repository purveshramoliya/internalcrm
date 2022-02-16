<?php
require_once 'vtwsclib/third-party/Zend/Json.php';
	require_once 'includes/HTTP_Client/HTTP_Client/Client.php';
		require_once('include/database/PearDatabase.php');

		$endpointUrl ="http://localhost/internalcrm/webservice.php";
		$userName="admin";

		$httpc = new HTTP_CLIENT();

		$httpc->get("$endpointUrl?operation=getchallenge&username=$userName");
		$response = $httpc->currentResponse();
		$jsonResponse = Zend_JSON::decode($response['body']);
		if($jsonResponse['success']==false) die('getchallenge failed:'.$jsonResponse['error']['errorMsg']);
		$challengeToken = $jsonResponse['result']['token'];
			$userAccessKey = '7k5oPdIA5OWAPGsJ'; //web services acess key for user admin
			$generatedKey = md5($challengeToken.$userAccessKey);
			$httpc->post("$endpointUrl",
				array('operation'=>'login', 'username'=>$userName,
					'accessKey'=>$generatedKey), true);
			$response = $httpc->currentResponse();

			$jsonResponse = Zend_JSON::decode($response['body']);

			if($jsonResponse['success']==false)
				die('login failed:'.$jsonResponse['error']['errorMsg']);
			$sessionId = $jsonResponse['result']['sessionName'];
			$userId = $jsonResponse['result']['userId'];
			date_default_timezone_set('asia/calcutta');

			$today=date("Y-m-d");
			$date = date('h:i:s A');
			$currentDate = strtotime($date);
			$futureDate = $currentDate+(60*10);
			$startTime = date("h:i:s A", $futureDate);
			$endTime = date("h:i:s A", $futureDate);

			$params= Array(
					'subject'=>'Task',
					'activitytype'=>'Task',
					'date_start'=>$today,
					'due_date'=>$today,
					'assigned_user_id'=>$userId,
					'time_start'=>$startTime,
					'time_end'=>$endTime,
					'sendnotification'=>'0',
					'status'=>'Not Started',
					'priority'=>'High',
					'notime'=>'0',
					'visibility'=>'Private',
					'taskstatus'=>'Not Started',
					'taskpriority'=>'High',
					);
				$objectJson = Zend_JSON::encode($params);
				$moduleName = 'Calendar';

				$params = array("sessionName"=>$sessionId, "operation"=>'create', "element"=>$objectJson, "elementType"=>$moduleName);
				$httpc->post($endpointUrl.$urlArgs, $params, true);
				$response = $httpc->currentResponse();
				$jsonResponse = Zend_JSON::decode($response['body']);
$savedObject = $jsonResponse['result'];

print_r($response);
die();

?>