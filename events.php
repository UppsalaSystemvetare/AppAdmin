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
        <link rel="stylesheet" href="/include/events.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        
    </head>
    <body>
        <div class="container w-50">
            <form id="add-event" action="event_actions.php">
                
                <input type="text" id="title" placeholder="title">
                <br>
                <input type="text" id="description" placeholder="description">
                <br>                
                <input type="date" id="datetime">
                <br>
                <input type="time" id="starttime">
                <br>
                <input type="text" id="location" placeholder="location">
                <br>
                <select name="Patron1">
                    <option value="" selected>Nykterfadder 1</option>
                    <option value="fadderID1">Aragorn</option>
                    <option value="fadderID2">Legolas</option>
                    <option value="fadderID3">Gimli</option>
                    <option value="fadderID4">Boromir</option>
                </select>
                <br>
                <select name="Patron2">
                    <option value="" selected>Nykterfadder 2</option>
                    <option value="fadderID1">Aragorn</option>
                    <option value="fadderID2">Legolas</option>
                    <option value="fadderID3">Gimli</option>
                    <option value="fadderID4">Boromir</option>
                </select>
                <br>
                <input type="submit" value="Submit">
            </form>

        </div>
        <br>
        <h2 class= "text-center">Planerade event:</h2>
        <div class="container">
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