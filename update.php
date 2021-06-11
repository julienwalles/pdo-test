
<?php 
include 'functions_custom.php';

$conn = pdo_connect_mysql();

// request GET for recup value to modify
$id = $_GET['id'];

$request = "SELECT * FROM students WHERE id=$id";
$stmt_get = $conn->prepare($request);
$stmt_get->execute();
$rows = $stmt_get->fetch(PDO::FETCH_ASSOC);


if(isset($_POST['update'])) {

$id = $_GET['id'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// update  request POST
$query = "UPDATE students SET lastname=:lastname, firstname=:firstname, age=:age, email=:email, phone=:phone WHERE id=:id";
$stmt = $conn->prepare($query);
$stmt_exec = $stmt->execute(array("lastname"=>$lastname, "firstname"=>$firstname, "age"=>$age, "email"=>$email, "phone"=>$phone, "id"=>$id));


if($stmt_exec) {
	echo '<script type="text/javascript">alert("data updated");
			window.location.href = "read.php";
		  </script>';
	// header('Location: http://localhost/pdo-test/read.php');

	exit();
}
	else {
		echo '<script>alert("data no updated")</script';
	}
}
?>

<?php echo template_header('Update'); ?>

<div class="content update">
	<h2>Update Student</h2>

	<form name="frmUser" method="post" action="#">

		First Name: <br>
		<input type="text" name="firstname" class="txtField" placeholder="firstname" required value="<?php echo $rows["firstname"]; ?>">
		<br> 

		Last Name :<br>
		<input type="text" name="lastname" class="txtField" placeholder="lastname" required value="<?php echo $rows["lastname"]; ?>">
		<br>

		Age:<br>
		<input type="int" name="age" class="txtField" placeholder="age" required value="<?php echo $rows["age"]; ?>">
		<br>

		Email:<br>
		<input type="EMAIL" name="email" class="txtField" placeholder="email" required value="<?php echo $rows["email"]; ?>">
		<br>

		Phone:<br>
		<input type="text" name="phone" class="txtField" placeholder="phone" required value="<?php echo $rows["phone"]; ?>">
		<br>
		<input type="submit" name="update" value="Update" class="buttom">

	</form>
</div>


<?php echo template_footer(); ?>