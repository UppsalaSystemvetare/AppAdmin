<?php
include("include/models/header.php");
include("include/models/users_model.php");
?>

<?php 
$result = Users::get_users();
while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row["ID"] ?></td>
        <td> Name</td>
        <td><?php echo $row["Rank"] ?></td>
        <td><?php echo $row["Team"] ?></td>
        <br>
    </tr>
<?php } ?>