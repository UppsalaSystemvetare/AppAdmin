<!DOCTYPE html>
<?php 
include("include/header.php");

$connection = connect();
$all = "SELECT * FROM Events";
$result = $connection->query($all);
$connection = disconnect();
//Hello Hannes här!

//BACKEND:
// Lägga till formulärdatan i databasen
// Radera en rad i databasen givet ett ID
// Ändra en rad i databasen givet ett ID
// Hämta id och namn på alla faddrar från tabellen "Faddrar"

//FRONTEND:
// Stil
// Knappar för att ändra och ta bort
// Rullista för nykterfaddrar
// Tabellen ska presentera namn på nykterfaddrar och inte ID?




?>

<html lang="en">
    <head>
        <title>Admin Inspark</title>
        <meta http-equiv="content-type" content="text/html" charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div id="form-container">
            <form id="add-event" action="event_actions.php">
                <table>
                <tr><td>Titel: </td><td><input type="text" id="title"></td></tr>
                <tr><td>Beskrivning: </td><td><input type="text" id="description"></td></tr>
                <tr><td>Datum: </td><td><input type="date" id="datetime"></td></tr>
                <tr><td>Tid: </td><td><input type="time" id="starttime"></td></tr>
                <tr><td>Plats: </td><td><input type="text" id="location"></td></tr>
                <tr><td>Nykterfadder 1: </td><td><input type="text" id="patron1"></td></tr>
                <tr><td>Nykterfadder 2: </td><td><input type="text" id="patron2"></td></tr>
                </table>
                <input type="submit" value="Submit">
            </form>

        </div>

        <div id="table-container">
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


<?php

//echo "<div id= $row['id']>" . "<$row['id']" .  

?>