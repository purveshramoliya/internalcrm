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
		$total = count($_FILES['upload']['name']);


// Loop through each file
for($i=0; $i<$total; $i++) {

$filename=$_FILES['upload']['name'][$i];
$title=$_POST['name'][$i];

	if(!empty($filename))
	{
		$element = array(
			'notes_title'=>$title,
			'filelocationtype'=>'I',
			'filestatus'=>'1',
			//default folder
			'folderid'=>'22x1',
			'notecontent'=>'created by web services',
			'filename'=>$_FILES['upload']['name'][$i],
			'filetype'=>$_FILES['upload']['type'][$i],
			'filesize'=>$_FILES['upload']['size'][$i],
			'filestatus'=>'1',
			//assign to user admin, groups would have the prefix 20
			'assigned_user_id'=> '19x1',
		);
		$filepath = $_FILES['upload']['tmp_name'][$i];
		$result= $crmobject->create($type, $element, $filepath);
	}
	}
}
}

?>
<html>
<title></title>
<head>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<style>
.input-group
{
	margin-bottom: 5px;
}
</style>
</head>
<body>
	<h1>Upload Documents</h1>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<form name="Upload Documents" action="#" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			<input type="hidden" name="record_id" id="record" value="<?php echo $_REQUEST['record_id']; ?>"> 

		<div class="container">
			<div class="form-group" x-data="{ fileName: '' }">
				<div class="input-group shadow">
					<span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
					<input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="upload[]" class="d-none">
					<input type="text" class="form-control form-control-lg" placeholder="Upload One Passport Size Photograph" x-model="fileName">
					<button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fas fa-image"></i> Browse</button>
				</div>
			</div>
			<div class="form-group" x-data="{ fileName: '' }">
				<div class="input-group shadow">
					<span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
					<input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="upload[]" class="d-none">
					<input type="text" class="form-control form-control-lg" placeholder="Upload Aadhar Card*" x-model="fileName"  required="">
					<button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fas fa-image"></i> Browse</button>
				</div>
			</div>
			<div class="form-group" x-data="{ fileName: '' }">
				<div class="input-group shadow">
					<span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
					<input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="upload[]" class="d-none">
					<input type="text" class="form-control form-control-lg" placeholder="Upload Pan Card*" x-model="fileName"  required="">
					<button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fas fa-image"></i> Browse</button>
				</div>
			</div>
			<div class="form-group" x-data="{ fileName: '' }">
				<div class="input-group shadow">
					<span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
					<input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="upload[]" class="d-none">
					<input type="text" class="form-control form-control-lg" placeholder="Upload Passport" x-model="fileName">
					<button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fas fa-image"></i> Browse</button>
				</div>
			</div>
			<div class="form-group" x-data="{ fileName: '' }">
				<div class="input-group shadow">
					<span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
					<input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="upload[]" class="d-none">
					<input type="text" class="form-control form-control-lg" placeholder="Upload DL" x-model="fileName">
					<button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fas fa-image"></i> Browse</button>
				</div>
			</div>
			<div class="form-group" x-data="{ fileName: '' }">
				<div class="input-group shadow">
					<span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
					<input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="upload[]" class="d-none">
					<input type="text" class="form-control form-control-lg" placeholder="Upload 10th&12th  Certificates" x-model="fileName">
					<button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fas fa-image"></i> Browse</button>
				</div>
			</div>
			<div class="form-group" x-data="{ fileName: '' }">
				<div class="input-group shadow">
					<span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
					<input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="upload[]" class="d-none">
					<input type="text" class="form-control form-control-lg" placeholder="Upload Diploma Certificate" x-model="fileName">
					<button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fas fa-image"></i> Browse</button>
				</div>
			</div>
			<div class="form-group" x-data="{ fileName: '' }">
				<div class="input-group shadow">
					<span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
					<input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="upload[]" class="d-none">
					<input type="text" class="form-control form-control-lg" placeholder="Upload Graduation Certificate" x-model="fileName">
					<button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fas fa-image"></i> Browse</button>
				</div>
			</div>
			<div class="form-group" x-data="{ fileName: '' }">
				<div class="input-group shadow">
					<span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
					<input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="upload[]" class="d-none">
					<input type="text" class="form-control form-control-lg" placeholder="Upload Post-Graduation Certificate" x-model="fileName">
					<button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fas fa-image"></i> Browse</button>
				</div>
			</div>
			<div class="form-group" x-data="{ fileName: '' }">
				<div class="input-group shadow">
					<span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
					<input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="upload[]" class="d-none">
					<input type="text" class="form-control form-control-lg" placeholder="Upload Full set of score cards pertaining to all certificates" x-model="fileName">
					<button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fas fa-image"></i> Browse</button>
				</div>
			</div>
			<div class="form-group" x-data="{ fileName: '' }">
				<div class="input-group shadow">
					<span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
					<input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="upload[]" class="d-none">
					<input type="text" class="form-control form-control-lg" placeholder="Upload Technical Certifications" x-model="fileName">
					<button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fas fa-image"></i> Browse</button>
				</div>
			</div>
			<div class="form-group" x-data="{ fileName: '' }">
				<div class="input-group shadow">
					<span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
					<input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="upload[]" class="d-none">
					<input type="text" class="form-control form-control-lg" placeholder="Upload Non-Technical Certifications" x-model="fileName">
					<button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fas fa-image"></i> Browse</button>
				</div>
			</div>
			<div class="form-group" x-data="{ fileName: '' }">
				<div class="input-group shadow">
					<span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
					<input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="upload[]" class="d-none">
					<input type="text" class="form-control form-control-lg" placeholder="Upload Previous Organization Offer Letter*" x-model="fileName">
					<button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fas fa-image"></i> Browse</button>
				</div>
			</div>
			<div class="form-group" x-data="{ fileName: '' }">
				<div class="input-group shadow">
					<span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
					<input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="upload[]" class="d-none">
					<input type="text" class="form-control form-control-lg" placeholder="Upload Previous Organization Relieving Letter or Experience Letter or Service Letter*" x-model="fileName">
					<button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fas fa-image"></i> Browse</button>
				</div>
			</div>
			<div class="form-group" x-data="{ fileName: '' }">
				<div class="input-group shadow">
					<span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
					<input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="upload[]" class="d-none">
					<input type="text" class="form-control form-control-lg" placeholder="Upload Last Drawn Salary – 3 months Pay-Slip*" x-model="fileName">
					<button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fas fa-image"></i> Browse</button>
				</div>
			</div>
		</div>
	<div class="text-center">
      <input type="submit" value="Submit" class="btn btn-success">
    </div>
	</form>
	<script src="libraries/jquery/jquery.min.js"></script>
	 <script type="text/javascript">
	   $('#__vtigerWebForm').submit(function(event){
                        var record = $('#record').val();
                        $.ajax({
                            type : "POST",
                            cache:false,
                            url: "UploadDocumentsMail.php",
					        data: { record:record },
                            success: function (data) {
                            },
                            error: function (data) {
                                console.log(data);
                            }
                        });  
                });
	 </script>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js"></script> 
</body>
</html>