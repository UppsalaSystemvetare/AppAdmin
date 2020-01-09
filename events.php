<!DOCTYPE html>
<?php 
include("include/models/header.php");

$connection = connect();
$all = "SELECT * FROM Events";
$result = $connection->query($all);
$connection = disconnect();
//Hello Hannes här!
?>

<html lang="en">
    <head>
        <title>Admin Inspark</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div id="conatiner">
            <table class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Namn</th>
                    <th>Dag</th>
                    <th>Starttid</th>
                    <th>Plats</th>
                    <th>Beskrivning</th>
                    <th>Nykterfadder 1</th>
                    <th>Nykterfadder 2</th>
                </tr>
                </thead>
                <tbody>
            <?php while($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row["Id"]?></td>
                    <td><?php echo $row["Title"]?></td>
                    <td><?php echo $row["DateTime"]?></td>
                    <td><?php echo $row["StartTime"]?></td>
                    <td><?php echo $row["Location"]?></td>
                    <td><?php echo $row["Description"]?></td>
                    <td style="Width:130px;"><?php echo $row["Patron1"]?></td>
                    <td style="Width:130px;"><?php echo $row["Patron2"]?></td>        
                </tr>
            <?php }?>
            </tbody>
            </table>
            </div>
        </div>
    </body>
</html>