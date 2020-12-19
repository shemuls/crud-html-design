<?php
/**
 * Autoload connection for all namespace auto load
 */
require_once "vendor/autoload.php";

	/**
	 * class Use 
	 */
	use App\Controller\Students; 


	/**
	 * Class Instance
	 */
	$student =  new Students;

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>

	<?php 

		/**
		 * Student Form data get and manage here by POST method
		 */
		if (isset($_POST['submit'])) {

			// value get
			$name = $_POST['name'];
			$email = $_POST['email'];
			$cell = $_POST['cell'];
			$photo = $_FILES['photo'];

			if (empty($name) || empty($email) || empty($cell) || empty($photo) ) {
				$message = '<p class="alert alert-danger">All field are requireds! <button class="close" data-dismiss="alert">&times;</button></p>';
			}elseif(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
				$message = '<p class="alert alert-danger">Invalid email address! <button class="close" data-dismiss="alert">&times;</button></p>';
			}else{
				$message = $student -> AddNewStudent($name, $email, $cell, $photo);
			}
		}

	?>

	<div class="wrap ">
		<a href="data.php" class="btn btn-primary">All Student</a>
		<div class="card shadow">
			<div class="card-body">
				<?php if (isset($message)) {
					echo $message;
				} ?>
				<h2>Sign Up</h2>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Photo</label>
						<input name="photo" class="form-control" type="file">
					</div>
					<div class="form-group">
						<input name="submit" class="btn btn-primary" type="submit" value="Sign Up">
					</div>
				</form>
			</div>
		</div>
	</div>
	







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>