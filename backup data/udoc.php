<?php
$record_id=$_REQUEST['record_id'];
if(!isset($record_id))
{
echo "Record not found";
}
?>
<html>
<title></title>
<head>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
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
		<form id="__vtigerWebForm" name="Upload Documents" action="http://localhost/internalcrm/modules/Webforms/capture.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			<input type="hidden" name="__vtrftk" value="sid:0c2ac94ff3a68e8d3abf731969c951da9653635a,1645421973">
			<input type="hidden" name="publicid" value="376e511d2d1f8f2040ae82723e075689">
			<input type="hidden" name="urlencodeenable" value="1">
			<input type="hidden" name="record_id" value="<?php echo $record_id; ?>"> 
			<input type="hidden" name="name" value="Upload Documents">
			<input type="hidden" name="notes_title" value="purvesh">
			<input type="hidden" name="notecontent" value="purvesh">
		<div class="container">
			<div class="form-group" x-data="{ fileName: '' }">
				<div class="input-group shadow">
					<span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
					<input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="file_2_1" class="d-none">
					<input type="text" class="form-control form-control-lg" placeholder="Upload One Passport Size Photograph" x-model="fileName">
					<button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fas fa-image"></i> Browse</button>
				</div>
			</div>
			<div class="form-group" x-data="{ fileName: '' }">
				<div class="input-group shadow">
					<span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
					<input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="file_2_2" class="d-none">
					<input type="text" class="form-control form-control-lg" placeholder="Upload Aadhar Card*" x-model="fileName"  required="">
					<button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fas fa-image"></i> Browse</button>
				</div>
			</div>
			<div class="form-group" x-data="{ fileName: '' }">
				<div class="input-group shadow">
					<span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
					<input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="file_2_3" class="d-none">
					<input type="text" class="form-control form-control-lg" placeholder="Upload Pan Card*" x-model="fileName"  required="">
					<button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fas fa-image"></i> Browse</button>
				</div>
			</div>
			<div class="form-group" x-data="{ fileName: '' }">
				<div class="input-group shadow">
					<span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
					<input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="file_2_4" class="d-none">
					<input type="text" class="form-control form-control-lg" placeholder="Upload Passport" x-model="fileName">
					<button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fas fa-image"></i> Browse</button>
				</div>
			</div>
			<div class="form-group" x-data="{ fileName: '' }">
				<div class="input-group shadow">
					<span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
					<input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="file_2_5" class="d-none">
					<input type="text" class="form-control form-control-lg" placeholder="Upload DL" x-model="fileName">
					<button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fas fa-image"></i> Browse</button>
				</div>
			</div>
			<div class="form-group" x-data="{ fileName: '' }">
				<div class="input-group shadow">
					<span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
					<input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="file_2_6" class="d-none">
					<input type="text" class="form-control form-control-lg" placeholder="Upload 10th&12th  Certificates" x-model="fileName">
					<button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fas fa-image"></i> Browse</button>
				</div>
			</div>
			<div class="form-group" x-data="{ fileName: '' }">
				<div class="input-group shadow">
					<span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
					<input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="file_2_7" class="d-none">
					<input type="text" class="form-control form-control-lg" placeholder="Upload Diploma Certificate" x-model="fileName">
					<button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fas fa-image"></i> Browse</button>
				</div>
			</div>
			<div class="form-group" x-data="{ fileName: '' }">
				<div class="input-group shadow">
					<span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
					<input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="file_2_8" class="d-none">
					<input type="text" class="form-control form-control-lg" placeholder="Upload Graduation Certificate" x-model="fileName">
					<button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fas fa-image"></i> Browse</button>
				</div>
			</div>
			<div class="form-group" x-data="{ fileName: '' }">
				<div class="input-group shadow">
					<span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
					<input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="file_2_9" class="d-none">
					<input type="text" class="form-control form-control-lg" placeholder="Upload Post-Graduation Certificate" x-model="fileName">
					<button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fas fa-image"></i> Browse</button>
				</div>
			</div>
			<div class="form-group" x-data="{ fileName: '' }">
				<div class="input-group shadow">
					<span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
					<input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="file_2_10" class="d-none">
					<input type="text" class="form-control form-control-lg" placeholder="Upload Full set of score cards pertaining to all certificates" x-model="fileName">
					<button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fas fa-image"></i> Browse</button>
				</div>
			</div>
			<div class="form-group" x-data="{ fileName: '' }">
				<div class="input-group shadow">
					<span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
					<input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="file_2_11" class="d-none">
					<input type="text" class="form-control form-control-lg" placeholder="Upload Technical Certifications" x-model="fileName">
					<button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fas fa-image"></i> Browse</button>
				</div>
			</div>
			<div class="form-group" x-data="{ fileName: '' }">
				<div class="input-group shadow">
					<span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
					<input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="file_2_12" class="d-none">
					<input type="text" class="form-control form-control-lg" placeholder="Upload Non-Technical Certifications" x-model="fileName">
					<button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fas fa-image"></i> Browse</button>
				</div>
			</div>
			<div class="form-group" x-data="{ fileName: '' }">
				<div class="input-group shadow">
					<span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
					<input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="file_2_13" class="d-none">
					<input type="text" class="form-control form-control-lg" placeholder="Upload Previous Organization Offer Letter*" x-model="fileName" required="">
					<button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fas fa-image"></i> Browse</button>
				</div>
			</div>
			<div class="form-group" x-data="{ fileName: '' }">
				<div class="input-group shadow">
					<span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
					<input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="file_2_14" class="d-none" required="">
					<input type="text" class="form-control form-control-lg" placeholder="Upload Previous Organization Relieving Letter or Experience Letter or Service Letter*" x-model="fileName">
					<button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fas fa-image"></i> Browse</button>
				</div>
			</div>
			<div class="form-group" x-data="{ fileName: '' }">
				<div class="input-group shadow">
					<span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
					<input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="file_2_15" class="d-none" required="">
					<input type="text" class="form-control form-control-lg" placeholder="Upload Last Drawn Salary – 3 months Pay-Slip*" x-model="fileName">
					<button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fas fa-image"></i> Browse</button>
				</div>
			</div>
			<!-- <div class="form-group" x-data="{ fileName: '' }">
				<div class="input-group shadow">
					<span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
					<input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="file_2_16" class="d-none">
					<input type="text" class="form-control form-control-lg" placeholder="Upload Ohter Documents" x-model="fileName">
					<button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fas fa-image"></i> Browse</button>
				</div>
			</div> -->
		</div>
	<div class="text-center">
      <input type="submit" value="Submit" class="btn btn-success">
    </div>
	</form>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js"></script>
</body>
</html>