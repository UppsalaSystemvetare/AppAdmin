<?php
	include("include/header.php");

	//Add("PubRundan", "1995-09-11", "17:00", "Uppsala", "PubRundan med uppsala", "30", "0");   // Fungerar för att lägga till i databasen.
	
	function Add($title, $dateTime, $startTime, $location, $description, $patron1, $patron2)
	{	
		$connection = connect();
		$all = "SELECT * FROM Events";
		$result = $connection->query($all);
		//$connection = disconnect();
		  if($connection->connect_error)
		{
			die("Connection failed: ".$connection.connect_error);
		}
		$title = mysqli_real_escape_string($connection, $_POST['title']);
		$dateTime = mysqli_real_escape_string($connection, $_POST['datetime']);
		$startTime = mysqli_real_escape_string($connection, $_POST['starttime']);
		$location = mysqli_real_escape_string($connection, $_POST['location']);
		$description = mysqli_real_escape_string($connection, $_POST['description']);
		$patron1 = mysqli_real_escape_string($connection, $_POST['Patron1']);
		$patron2 = mysqli_real_escape_string($connection, $_POST['Patron2']); 
		$sql = "INSERT INTO Events(Title, DateTime, StartTime, Location, Description, Patron1, Patron2) VALUES ('$title', '$dateTime', '$startTime' , '$location', '$description', '$patron1', '$patron2')";
			
		if(mysqli_query($connection, $sql))
		{
			echo "Success"; //Denna rad kan raderas
			header('location: events.php');
		}
		else
		{
			echo("Error description: " . mysqli_error($connection));
		} 
	}

	//remove($Id);
	function Remove($Id)
	{	
		$connection = connect();
		$all = "SELECT * FROM Events";
		$result = $connection->query($all);
		//$connection = disconnect();
		  if($connection->connect_error)
		{
			die("Connection failed: ".$connection.connect_error); 
		}
		
		$Id = mysqli_real_escape_string($connection, $_POST['Id']); 
		$sql = "DELETE FROM Events WHERE Id=$Id";
		
		if(mysqli_query($connection, $sql))
		{
			echo ("Success/deleted"); //Kan raderas om funktionen fungerar utan problem.
			header('location: events.php');
		}
		else
		{
			echo("Error description/error when trying to delete: " . mysqli_error($connection));
		} 

	}
	


	/* function Update(($id, $title, $dateTime, $startTime, $location, $description, $patron1, $patron2)
	{	
	    if($connection->connect_error)
		{
			die("Connection failed: ".$connection.connect_error); // fixa connection.connect_error.
		}
		
		$id = mysqli_real_escape_string($connection, $_POST['id']);
		$title = mysqli_real_escape_string($connection, $_POST['title']);
		$dateTime = mysqli_real_escape_string($connection, $_POST['datetime']);
		$startTime = mysqli_real_escape_string($connection, $_POST['starttime']);
		$location = mysqli_real_escape_string($connection, $_POST['location']);
		$description = mysqli_real_escape_string($connection, $_POST['description']);
		$patron1 = mysqli_real_escape_string($connection, $_POST['Patron1']);
		$patron2 = mysqli_real_escape_string($connection, $_POST['Patron2']);
		
		$sql = "UPDATE events SET Title='$title', dateTime='$datetime', startTime='$starttime', location='$location', description='$description', patron1='$Patron1', patron2='$Patron2' where Id='$id'";
		
		if(mysqli_query($connection, $sql))
		{
			echo "Success/Updated";
			header('location: events.php');
		}
		else
		{
			echo "Insertion/edit error";
		} 	

	}
	
//echo "<div id= $row['id']>" . "<$row['id']" .  >
*/

?> 

