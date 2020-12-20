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
	 * Data Delete
	 */
	if (isset($_GET['delete'])) {
		$deletId = $_GET['delete'];
		$deleteDone = $student -> deleteStudentData($deletId);
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
	
	

	<div class="wrap-table ">
		<a href="index.php" class="btn btn-primary">Add Student</a>
		<div class="card shadow">
			<div class="card-body">
				<?php 
					if (isset($deleteDone)) {
						echo $deleteDone;
					}
				?>
				<h2>All Data</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>


						<?php 
							$allData = $student -> showAllstudent();

						if (!empty($allData->num_rows)) {
							$i = 1;
							while ($singleData = $allData -> fetch_assoc()) :
						?>
							<tr>
								<td><?php echo $i; $i++; ?></td>
								<td><?php echo $singleData['name']; ?></td>
								<td><?php echo $singleData['email']; ?></td>
								<td><?php echo $singleData['cell']; ?></td>
								<td><img src="media/students/img/<?php echo $singleData['photo']; ?>" alt=""></td>
								<td>
									<a class="btn btn-sm btn-info" href="show.php?id=<?php echo $singleData['id']; ?>">View</a>
									<a class="btn btn-sm btn-warning" href="#">Edit</a>
									<a class="btn btn-sm btn-danger" href="?delete=<?php echo $singleData['id']; ?>">Delete</a>
								</td>
							</tr>

						<?php 
							endwhile;
						}else{
							echo 'No result Found';
						}		
						?>


						
						

					</tbody>
				</table>
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