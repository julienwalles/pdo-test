<?php 
include 'functions_custom.php';

$conn = pdo_connect_mysql();

$id = $_GET['id'];

$sql = "DELETE FROM students WHERE id=$id";
$stmt_del = $conn->prepare($sql);
$stmt_del->execute();

if($stmt_del) {
	echo '<script type="text/javascript">alert("student deleted");
			window.location.href = "read.php";
		  </script>';
	// header('Location: http://localhost/pdo-test/read.php');

	exit();
}
	else {
		echo '<script>alert("there is an error")</script';
	}
?>

<?php echo template_header('Delete'); ?>
<div class="content delete">
	<h2>Delete Student</h2>
</div>

<?php 
/**
 * ajouter le php necessaire
 */
?>

<?php echo template_footer(); ?>