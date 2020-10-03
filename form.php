<!DOCTYPE html>
<html>
<head>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/form.css" rel="stylesheet" type="text/css">

</head>

<body
<?php
session_start();
if(isset($_POST['filter']))
{
	$_SESSION['filter']=$_POST['filter'];
	echo $_SESSION['filter'];
}
else
	echo "some error choosing your filter";
?>

<body>
<div>
	<div id="home">
	<a href="index.html"><img src="images/home.png"/></a>
	</div>
	<div>
	<img src="images/fake_m.jpg"/ id="img">
	<img src="<?php echo $_SESSION['filter'] ?>" id="fil" />
	</div>

	<div id="form">
	<form action="upload.php" method="post" enctype="multipart/form-data">
		Select image to upload:
		<input type="file" name="fileToUpload" id="fileToUpload">
		<input type="submit" value="Upload Image" name="submit">
	</form>

	</div>
</div>

</body>
</html>