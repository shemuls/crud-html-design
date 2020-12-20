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

	/**
	 * Get id for edit
	 */
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		// show value in input tag as value=""
		$showValue = $student -> editSingleStudentData($id);
	}

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
			$oldPhoto = $_POST['oldPhoto'];
			$photo = $_FILES['photo'];

			if (empty($name) || empty($email) || empty($cell) ) {
				$message = '<p class="alert alert-danger">All field are requireds! <button class="close" data-dismiss="alert">&times;</button></p>';
			}elseif(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
				$message = '<p class="alert alert-danger">Invalid email address! <button class="close" data-dismiss="alert">&times;</button></p>';
			}else{

				// if (empty($_FILES['photo'])) {
				// 	echo 'photo nai';
				// }else{
				// 	echo $message = 'photo ace';
				// }
				$message = $student -> updateSingleStudentData($id, $name, $email, $cell, $photo, $oldPhoto);
				header('Location:edit.php?id='.$id);
				
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
				<h2>Update Student data</h2>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" value="<?php echo $showValue['name'] ?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" value="<?php echo $showValue['email'] ?>" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" type="text" value="<?php echo $showValue['cell'] ?>">
					</div>
					<div class="form-group">
						<img style="width: 200px;" src="media/students/img/<?php echo $showValue['photo'] ?>" alt="">
						<input name="oldPhoto" class="form-control" type="hidden" value="<?php echo $showValue['photo'] ?>">
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