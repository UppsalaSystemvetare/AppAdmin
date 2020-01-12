<!DOCTYPE html>
<?php 
include("include/models/header.php");

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


include("include/html/menu.php");


?>

    <div class="btn-group" role="group" aria-label="Basic example">
        <button class="btn btn-secondary" type="button">Modify Selected Event</button>
        <button class="btn btn-secondary" type="button" onclick="scrollToCreateEvents()">Add New Events</button>
        <button class="btn btn-secondary" type="button" onclick="scrollToTop()">Back To Top</button>
        <button class="btn btn-danger" type="button" id="delete">Delete <i class="fas fa-trash-alt"></i></button>
    </div>
   
    <table class="table table-striped table-bordered table-sm sortable">
        
        <thead id="table-header">
            <tr>
                <th>Select</th>
                <th>Id</th>
                <th>Name Of Event</th>
                <th>Day</th>
                <th>Starting Time</th>
                <th>Location</th>
                <th>Description</th>
                <th>Patron 1</th>
                <th>Patron 2</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()) { ?>
                <tr> 
                    <td><input type="checkbox" aria-label="Checkbox for following text input"></td>
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
                        "<button id=" . $row["Id"] .  " class='btn-xs btn_edit'><i class='fas fa-cog'></i></button>" ?>
                    </td>

                </tr>
            <?php }?>
        </tbody>
    </table>

    <div class="content" id="create-events">
        <h2>Nytt event:</h2>
        <form id="add-event" action="event_actions.php">
            <div class="form-group">
                <label for="title">Name:</label>
                <input id="title" type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" placeholder="Name of the event">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="DESC" type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" placeholder="Description of the mission"></textarea>
            </div>
            <div class="form-check" style="margin-bottom: 15px;">
                <input type="checkbox" class="form-check-input" name="pubrunda" value="is_pubrunda">
                <label class="form-check-label" for="exampleCheck1">This is a pubrunda.</label>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="datetime">Date:</label>
                        <input class="form-control" type="date" id="datetime">
                    </div>
                    <div class="col">
                        <label for="starttime">Time:</label>
                        <input class="form-control" type="time" id="starttime">
                    </div>
                </div>
            </div>
            <label for="patron1">Patrons:</label>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <select name="Patron1" class="form-control" id="patron1">
                            <option value="" selected>Nykterfadder 1</option>
                            <option value="fadderID1">Aragorn</option>
                            <option value="fadderID2">Legolas</option>
                            <option value="fadderID3">Gimli</option>
                            <option value="fadderID4">Boromir</option>
                        </select>
                    </div>
                    <div class="col">
                        <select name="Patron2" class="form-control">
                            <option value="" selected>Nykterfadder 2</option>
                            <option value="fadderID1">Aragorn</option>
                            <option value="fadderID2">Legolas</option>
                            <option value="fadderID3">Gimli</option>
                            <option value="fadderID4">Boromir</option>
                        </select>
                    </div>
                </div>
            </div>
            <input class="btn btn-primary" type="submit" value="Submit">
        </form>
    </div>
</body>
    
<script src="assets/js/events.js"></script>
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
