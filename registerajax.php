<?php
require_once 'includes/HTTP_Client/HTTP_Client/Client.php';
require_once ('include/database/PearDatabase.php');
require_once ("vtlib/Vtiger/Mailer.php");

global $site_URL,$HR_SUPPORT_EMAIL_ID,$HR_SUPPORT_NAME;
$from=$HR_SUPPORT_EMAIL_ID;
$fromName=$HR_SUPPORT_NAME;
$adb = PearDatabase::getInstance();

$endpointUrl =$site_URL."webservice.php";
$userName="admin";

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

    $username=$_REQUEST['user_name'];
    $lastname=$_REQUEST['last_name'];
    $email=$_REQUEST['email1'];
    $roleid=$_REQUEST['roleid'];
    $assignedto=$_REQUEST['assigned_user_id'];
    $reportsto=$_REQUEST['reports_to_id'];
    $password=randomPassword();
    $recordId=$_REQUEST['record'];

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
    'first_name'=>'Employee',
    'last_name'=>$lastname,
    'status'=>'Active',
    'is_admin'=>'off',
    'user_password'=>$password,
    'confirm_password'=>$password,
    'email1'=>$email,
    'roleid'=>$roleid,
    'tz' => 'Asia/Kolkata',
    'title' => $lastname,
    "reminder_interval"=>'5 Minutes',
    'assigned_user_id'=> $assignedto,
    'reports_to_id'=> $reportsto
);
$objectJson = Zend_JSON::encode($params);
$moduleName = 'Users';

$params = array("sessionName"=>$sessionId, "operation"=>'create', "element"=>$objectJson, "elementType"=>$moduleName);
$httpc->post($endpointUrl.$urlArgs, $params, true);
$response = $httpc->currentResponse();
$jsonResponse = Zend_JSON::decode($response['body']);
$savedObject = $jsonResponse['result']; 
$setuserid = $jsonResponse['result']['id'];
$adb->pquery("UPDATE `vtiger_crmentity` SET `smownerid` = '$setuserid' WHERE `vtiger_crmentity`.`crmid` =".$recordId); 

//sendmail on create profile
$query=$adb->pquery("select joineeno,joinee_tks_firstname from vtiger_joinee inner join vtiger_crmentity on vtiger_crmentity.crmid=vtiger_joinee.joineeid where vtiger_crmentity.deleted=0 and vtiger_joinee.joineeid=".$recordId);
$joineeno=$adb->query_result($query,0,'joineeno');
$firstname=$adb->query_result($query,0,'joinee_tks_firstname');

$subject = "User login has been created by BizTechnoSys"; 

$contents = ' 
<html> 
<head> 
<title>('.$username.') User login has been created</title> 
</head> 
<body> 
<p>Dear '.$firstname.' '.$lastname.',<p>
<p>Thank you for Joining BizTechnoSys,<br>
Your Joining request has been approved and now you can login with the username and password by clicking on the link provided.</p>
<p>Username : '.$username.' </p>
<p>Password : '.$password.' </p>
<a href="'.$site_URL.'">Login</a><br>
Thanks<br>
</body> 
</html>'; 

$description = $contents;
$mailer = new Vtiger_Mailer();
$mailer->IsHTML(true);
$mailer->ConfigSenderInfo($from,$fromName);
$mailer->Subject =$subject;
$mailer->Body = $description;
$mailer->AddAddress($email);
$status = $mailer->Send(true);

// send the email
if(!$mailer->Send()) {
    echo "Message was not sent <br />PHPMailer Error: " . $mailer->ErrorInfo;
    die();
}
else{
     $referer = $_SERVER['HTTP_REFERER'];
     header("Location: $referer");
}

die(); 
?>