<?php
include("include/models/header.php");
include("include/models/users_model.php");

$connection = connect();
$all = "SELECT * FROM Users";
$result = $connection->query($all);
$connection = disconnect();
?>

<?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row["ID"] ?></td>
    </tr>
<?php } ?>
