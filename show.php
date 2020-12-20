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

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$singleStudentData = $student -> showSingleStudent($id);
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
	
	

	<div class="wrap-table w-50">
		<a href="data.php" class="btn btn-primary">All Student</a>
		<div class="card shadow" style="width:">
			<img class="card-img-top shadow mt-5" style="height: 300px; width: 300px; margin:auto; border-radius: 50%; border:8px solid white;" src="media/students/img/<?php echo $singleStudentData['photo']; ?>" alt="Card image cap">
			<div class="card-body">
				<h3 class="card-title text-center"><strong><?php echo $singleStudentData['name']; ?></strong></h3>
			</div>
			<ul class="list-group list-group-flush">
				<li class="list-group-item"><strong>Email: </strong><?php echo $singleStudentData['email']; ?></li>
				<li class="list-group-item"><strong>Cell: </strong><?php echo $singleStudentData['cell']; ?></li>
			</ul>
		</div>
	</div>
	







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>