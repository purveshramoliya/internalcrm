<html>
	<title></title>
	<head>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

	</head>
	<body>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<form id="__vtigerWebForm" name="Upload Documents" action="http://localhost/internalcrm/modules/Webforms/capture.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	<input type="hidden" name="__vtrftk" value="sid:1de01a0d6e2064c2252ed5df3159b5a02202b1a5,1645074184">
	<input type="hidden" name="publicid" value="69a12af0167fd1f8c04a45e042a9c810">
	<input type="hidden" name="urlencodeenable" value="1">
	<input type="hidden" name="record_id" value="15531">
	<input type="hidden" name="name" value="Upload Documents">
	<input type="hidden" name="notes_title" value="purvesh">
	<input type="hidden" name="notecontent" value="purvesh">
	<div class="container">
	<table>
		<tbody>
			<label class="file">
  <input type="file" id="file" aria-label="File browser example">
  <span class="file-custom"></span>
</label>
			<tr><td><label>Lic </label></td><td><input type="file" name="file_2_1"></td></tr>
			<tr><td><label>Id </label></td><td><input type="file" name="file_2_2"></td></tr>
			<tr><td><label>ac </label></td><td><input type="file" name="file_2_3"></td></tr>
			<tr><td><label>Pas </label></td><td><input type="file" name="file_2_4"></td></tr>
		</tbody>
	</table>
	<input type="submit" value="Submit">
</form>

<h1>Bootstrap v5.0 Styled Browse Button</h1>

<div class="container">
  <div class="form-group" x-data="{ fileName: '' }">
    <div class="input-group shadow">
    	<tr>
    		<td>
    			 <span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
      <input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="img[]" class="d-none">
      <input type="text" class="form-control form-control-lg" placeholder="Upload Image" x-model="fileName">
      <button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fas fa-image"></i> Browse</button>
    		</td>
    	</tr>

     </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js"></script>
</body>
</html>
