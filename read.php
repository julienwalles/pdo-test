<?php
include 'functions_custom.php';


$conn = pdo_connect_mysql();

        //recuperer les noms dans la database

        $reponse = $conn->query("SELECT * FROM students");
 
?>

<?php echo template_header('Read'); ?>

<div class="content read">
	<h2>STUDENTS</h2>

<a href="create.php" class="create-contact">Créer un étudiant</a>
	<table>
        <thead>
            <tr>
                <td>#</td>
                <td>Nom</td>
                <td>Prénom</td>
                <td>Age</td>
                <td>Email</td>
                <td>Phone</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
<?php
        foreach ($reponse as $rows) {
?>
            <tr>
                <td><?php echo $rows["id"]; ?></td>
                <td><?php echo $rows["firstname"]; ?></td>
                <td><?php echo $rows["lastname"]; ?></td>
                <td><?php echo $rows["age"]; ?></td>
                <td><?php echo $rows["email"]; ?></td>
                <td><?php echo $rows["phone"]; ?></td>
                
                <td class="actions">
                    <a href="update.php?id=<?php echo $rows["id"]; ?> " class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete.php?id=<?php echo $rows["id"]; ?> " class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
<?php
        }
?>
        </tbody>
    </table>
</div>

<?php echo template_footer(); ?>