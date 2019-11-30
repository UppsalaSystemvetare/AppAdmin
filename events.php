<!DOCTYPE html>
<?php 
include("include/header.php");

$connection = connect();
$all = "SELECT * FROM Events";
$result = $connection->query($all);
$connection = disconnect();
//Hello Hannes här!

//BACKEND:
// Lägga till formulärdatan i databasen			*** Fungerar ***
// Radera en rad i databasen givet ett ID		*** Bör fungera ***
// Ändra en rad i databasen givet ett ID
// Hämta id och namn på alla faddrar från tabellen "Faddrar"

//FRONTEND:
// Stil
// Tabellen ska presentera namn på nykterfaddrar och inte ID?




?>

<html lang="en">
    <head>
        <title>Admin Inspark</title>
        <meta http-equiv="content-type" content="text/html" charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="include/events.css">
        <script src="https://kit.fontawesome.com/62782ec40b.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="events.js"></script>
        
    </head>
    <body>
    <h3 class= "text-center">Nytt event:</h3>
        <div class="nytt_event container">
            <form id="add-event" action="event_actions.php">
                Titel:<br>
                <input style="color:black" type="text" id="title" size=30 >
                <br>
                Beskrivning:<br>
                <textarea style="color:black; resize:none" type="text" id="description" Rows=2 Cols= 35></textarea>
                <br>
                <input type="checkbox" name="pubrunda" value="is_pubrunda"> Detta är en pubrunda
                <br>
                <br>
                <span>
                Datum: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                Tid:<br>           
                <input style="color:black" type="date" id="datetime">
                <input style="color:black" type="time" id="starttime">
                </span>
                <br>
                Plats:<br>
                <input style="color:black" type="text" id="location">
                <br>
                <span>
                Nykterfaddrar: <br>
                <select name="Patron1">
                    <option value="" selected>Nykterfadder 1</option>
                    <option value="fadderID1">Aragorn</option>
                    <option value="fadderID2">Legolas</option>
                    <option value="fadderID3">Gimli</option>
                    <option value="fadderID4">Boromir</option>
                </select>
                
                <select name="Patron2">
                    <option value="" selected>Nykterfadder 2</option>
                    <option value="fadderID1">Aragorn</option>
                    <option value="fadderID2">Legolas</option>
                    <option value="fadderID3">Gimli</option>
                    <option value="fadderID4">Boromir</option>
                </select>
                <br>
                <br>
                <button type="button" class="btn-default btn-sm">Skapa</button>
                </span>
            </form>

        </div>
        <br>
        <h3 class= "text-center">Planerade event:</h3>
        <div class="container" style="width: 100%">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Namn</th>
                    <th>Dag</th>
                    <th>Starttid</th>
                    <th>Plats</th>
                    <th>Beskrivning</th>
                    <th>Nykterfadd.1</th>
                    <th>Nykterfadd.2</th>
                    <th></th>
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
                    <td style="Width:120px;"><?php echo $row["Patron1"]?></td>
                    <td style="Width:120px;"><?php echo $row["Patron2"]?></td>  
                    <td style="Width:90px;">
                        <?php echo 
                        "<button id=" . $row["Id"] .  " class='btn btn_edit'><i class='fas fa-cog'></i></button>" ?>
                    </td>

                </tr>
            <?php }?>
            </tbody>
            </table>
            </div>
        </div>
        <div class="edit_window">
            HELLO WORLD    
        </div>
    </body>
</html>


<?php
	/* function Add($title, $dateTime, $startTime, $location, $description, $patron1, $patron2)
	{	

			  if($connection->connect_error)
			{
				die("Connection failed: ".$connection.connect_error); // fixa connection.connect_error.
			}
		
		$title = mysqli_real_escape_string($connection, $_POST['title']);
		$dateTime = mysqli_real_escape_string($connection, $_POST['dateTime']);
		$startTime = mysqli_real_escape_string($connection, $_POST['startTime']);
		$location = mysqli_real_escape_string($connection, $_POST['location']);
		$description = mysqli_real_escape_string($connection, $_POST['description']);
		$patron1 = mysqli_real_escape_string($connection, $_POST['patron1']);
		$patron2 = mysqli_real_escape_string($connection, $_POST['patron2']);
		$sql = "INSERT INTO events(Title, DateTime, StartTime, Location, Description, Patron1, Patron2) VALUES ('$title', '$dateTime', '$startTime' , '$location', '$description', '$patron1', '$patron2')";

	}

echo "<div id= $row['id']>" . "<$row['id']" .  >
*/
?> 
