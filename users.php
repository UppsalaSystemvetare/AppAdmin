<?php
include("include/models/header.php");
include("include/models/users_model.php");
?>
<!DOCTYPE html>
<?php
include("include/models/header.php");
?>
<html lang="en">

<head>
    <title>Admin Inspark</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="assets/js/user.js"></script>
</head>

<body>

    <?php
    $result = User::get_users();

    while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row["ID"] ?></td>
            <td> Name</td>
            <td><?php echo $row["Rank"] ?></td>
            <td><?php echo $row["Team"] ?></td>
            <br>
        </tr>
    <?php } ?>

</body>

</html>