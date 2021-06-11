<?php 
include 'functions_custom.php';

$conn = pdo_connect_mysql();

if(isset($_POST['create'])) {
	
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$query = "INSERT INTO students (firstname, lastname, age, email, phone) VALUES(:firstname, :lastname, :age, :email, :phone)";
$stmt = $conn->prepare($query); 
$stmt->execute(array(":firstname"=>$firstname,":lastname"=>$lastname, ":age"=>$age, ":email"=>$email, ":phone"=>$phone));


if($stmt) {
	echo '<script type="text/javascript">alert("student created");
			window.location.href = "read.php";
		  </script>';
	// header('Location: http://localhost/pdo-test/read.php');

	exit();
}
	else {
		echo '<script>alert("there is an error")</script';
	}

}
?>


<?php echo template_header('Create'); ?>
<div class="content update">
	<h2>Create Student</h2>
</div>

<form name="frmUser" method="post" action="#">

	First Name: <br>
	<input type="text" name="firstname" class="txtField" placeholder="firstname" required value="">
	<br>

	Last Name :<br>
	<input type="text" name="lastname" class="txtField" placeholder="lastname" required value="">
	<br>

	Age:<br>
	<input type="int" name="age" class="txtField" placeholder="age" required value="">
	<br>

	Email:<br>
	<input type="email" name="email" class="txtField" placeholder="email" required value="">
	<br>

	Phone:<br>
	<input type="int" name="phone" class="txtField" placeholder="phone" required value="">
	<br>
	<input type="submit" name="create" value="Create" class="buttom">

</form>

<?php 
/**
 * ajouter le php necessaire
 */
?>

<?php echo template_footer(); ?>