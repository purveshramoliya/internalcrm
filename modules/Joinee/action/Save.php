<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/
class Joinee_Save_Action extends Vtiger_Save_Action {


	/**
	 * Function to get the record model based on the request parameters
	 * @param Vtiger_Request $request
	 * @return Vtiger_Record_Model or Module specific Record Model instance
	 */
	protected function getRecordModelFromRequest(Vtiger_Request $request) {
		$recordModel = parent::getRecordModelFromRequest($request);
		return $recordModel;
	}

	public function process(Vtiger_Request $request) {

		require_once 'vtwsclib/third-party/Zend/Json.php';
require_once 'includes/HTTP_Client/HTTP_Client/Client.php';
require_once 'modules/Emails/class.smtp.php';
require_once('include/database/PearDatabase.php');
require_once 'modules/Emails/class.phpmailer.php';
//include_once 'include/Webservices/Utils.php';

include('config.inc.php');
$host = $dbconfig['db_server'];
$user = $dbconfig['db_username'];
$pass = $dbconfig['db_password'];
$db = $dbconfig['db_name'];
$con = mysqli_connect($host, $user, $pass,$db);

$endpointUrl ="http://localhost/internalcrm/webservice.php";
$userName="admin";
global $site_URL,$HELPDESK_SUPPORT_EMAIL_ID,$HELPDESK_SUPPORT_NAME;
$from=$HELPDESK_SUPPORT_EMAIL_ID;
$fromName=$HELPDESK_SUPPORT_NAME;
$db = PearDatabase::getInstance();

//user details
  $username="parvp";
  $password="parvp";
  $suppliername="pinfo";
  $companyname='xyz cin';
  $email="purveshramoliya5159@gmail.com";

 // $username=$_POST['cf_1027'];
 // $password=$_POST['cf_1029'];
 // $suppliername=$_POST['vendorname'];
 // $companyname=$_POST['cf_1005'];
 // $email=$_POST['email'];
 
$roleid='H15';
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


//$id=vtws_getWebserviceEntityId($moduleName, $id);

$params = array("sessionName"=>$sessionId, "operation"=>'create', "element"=>$objectJson, "elementType"=>$moduleName);
$httpc->post($endpointUrl.$urlArgs, $params, true);
$response = $httpc->currentResponse();

$jsonResponse = Zend_JSON::decode($response['body']);
$savedObject = $jsonResponse['result']; 



		parent::process($request);
		}
}
