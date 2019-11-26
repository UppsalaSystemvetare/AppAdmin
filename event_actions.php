<?php
	//include("include/header.php");
	
	function Add($title, $dateTime, $startTime, $location, $description, $patron1, $patron2)
	{	

			  if($connection->connect_error)
			{
				die("Connection failed: ".$connection.connect_error); // fixa connection.connect_error.
			}
			
				$title = mysqli_real_escape_string($connection, $_POST['title']);
				$dateTime = mysqli_real_escape_string($connection, $_POST['datetime']);
				$startTime = mysqli_real_escape_string($connection, $_POST['starttime']);
				$location = mysqli_real_escape_string($connection, $_POST['location']);
				$description = mysqli_real_escape_string($connection, $_POST['description']);
				$patron1 = mysqli_real_escape_string($connection, $_POST['Patron1']);
				$patron2 = mysqli_real_escape_string($connection, $_POST['Patron2']);
				$sql = "INSERT INTO events(Title, DateTime, StartTime, Location, Description, Patron1, Patron2) VALUES ('$title', '$dateTime', '$startTime' , '$location', '$description', '$patron1', '$patron2')";
				
			if(mysqli_query($connection, $sql))
			{
				echo "Success"
				header('location: events.php');
			}
			else
			{
				echo "Insertion error";
			} 

	}
	
	/* function Remove($Id)
	{	
	    if($connection->connect_error)
		{
			die("Connection failed: ".$connection.connect_error); // fixa connection.connect_error.
		}
		
		$Id = mysqli_real_escape_string($connection, $_POST['Id']); 
		$sql = "DELETE FROM events WHERE Id=$Id"
		
		if(mysqli_query($connection, $sql))
		{
			echo "Success/deleted"
			header('location: events.php');
		}
		else
		{
			echo "Insertion/delete error";
		} 	

	}
	
//echo "<div id= $row['id']>" . "<$row['id']" .  >
*/

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
			echo "Success/Updated"
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

