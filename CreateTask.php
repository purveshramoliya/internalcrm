<?php
// Turn off error reporting
  error_reporting(0);

  // Report runtime errors
  //error_reporting(E_ERROR | E_WARNING | E_PARSE);

  // Report all errors
  // error_reporting(E_ALL);

  // Same as error_reporting(E_ALL);
  //ini_set("error_reporting", E_ALL);

  // Report all errors except E_NOTICE
  //error_reporting(E_ALL & ~E_NOTICE);
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
echo 'challengeToken is ' .$challengeToken;

$userAccessKey = '7k5oPdIA5OWAPGsJ'; //web services acess key for user admin
$generatedKey = md5($challengeToken.$userAccessKey);
$httpc->post("$endpointUrl",
array('operation'=>'login', 'username'=>$userName,
'accessKey'=>$generatedKey), true);
$response = $httpc->currentResponse();

$jsonResponse = Zend_JSON::decode($response['body']);

if($jsonResponse['success']==false)
die('login failed:'.$jsonResponse['error']['errorMsg']);
echo 'login success';
$sessionId = $jsonResponse['result']['sessionName'];
$userId = $jsonResponse['result']['userId'];
echo 'user id is ' . $userId;

$today=date("Y-m-d");

$params= Array(
 'subject'=>'Call',
 'activitytype'=>'Task',
 'date_start'=>$today,
 'due_date'=>$today,
 'assigned_user_id'=>$userId,
 'time_start'=>'09:00:00',
 'time_end'=>'17:00:00',
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


//$id=vtws_getWebserviceEntityId($moduleName, $id);

$params = array("sessionName"=>$sessionId, "operation"=>'create', "element"=>$objectJson, "elementType"=>$moduleName);
$httpc->post($endpointUrl.$urlArgs, $params, true);
$response = $httpc->currentResponse();

$jsonResponse = Zend_JSON::decode($response['body']);
$savedObject = $jsonResponse['result']; 

print_r($response);
exit();
 
?>