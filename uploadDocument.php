<?php
/***********************************************************************************
* Sample for CRM File Upload
* Version: 1.0
* Copyright (C) crm-now GmbH
* All Rights Reserved
* www.crm-now.de
************************************************************************************/
include_once('WS_Curl_ClassADV.php');
// Web address to connect to 
define("CONFIG_URL", "http://localhost/internalcrm/");

// user name in CRM
define("CONFIG_NAME", "admin");

// Access Key for given user name (found under "My Preferences")
define("CONFIG_KEY", "7k5oPdIA5OWAPGsJ");
//start sending file to CRM 
if(isset($_POST['createdocument']) && $_POST['createdocument']=="Upload Datei") {
	$crmobject = new WS_Curl_Class(CONFIG_URL . "/webservice.php", CONFIG_NAME, CONFIG_KEY);
	$crmobject->login();
	if ($crmobject->Login()) {

		echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
		<html>
		 <head>
		   <title>
			*** create Document ***
		   </title>
		 </head>
		 <body>
		';

		$type = 'Documents';
		$element = array(
			'notes_title'=>'my new document',
			'filelocationtype'=>'I',
			'filestatus'=>'1',
			//default folder
			'folderid'=>'22x1',
			'notecontent'=>'created by web services',
			'filename'=>$_FILES['Datei']['name'],
			'filetype'=>$_FILES['Datei']['type'],
			'filesize'=>$_FILES['Datei']['size'],
			'filestatus'=>'1',
			//assign to user admin, groups would have the prefix 20
			'assigned_user_id'=> '19x1',
		);
		$filepath = $_FILES['Datei']['tmp_name'];
		
		$result= $crmobject->create($type, $element, $filepath);
		
	}
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<header>
   <title>
    *** Document Upload ***
   </title>
</header>
<body>
<form action="#" method="post" enctype="multipart/form-data"> 
	<p>Select a file on your computer:<br> 
		<input name="Datei" type="file" size="50"> 
	</p> 
	<input name="createdocument" type="submit" value="Upload Datei" />
</form>
</body>

</html>
