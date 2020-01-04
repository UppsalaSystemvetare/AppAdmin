<?php
include("include/models/missions_model.php");
?>

<html lang="en">
    <head>
        <title>Admin Inspark Missions</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/mission_style.css" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div id="container">
            <div class="header">
                <div class="section-button selected" id="all_missions_button">
                    <h1 onclick="change_tab('table')">All Missions</h1>
                </div>
                <div class="section-button" id="create_missions_button">
                    <h1 onclick="change_tab('create')">Create Missions</h1>
                </div>
            </div>        
            <div class="content">
                <table class="table" id="all_missions">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Beskrivning</th>
                        <th>Poängvärde (0 om användaren själv ska skriva in)</th>
                        <th>Ändra</th>
                        <th>Ta bort</th>
                        <th>Markera</th>
                    </tr>
                    </thead>
                    <tbody id="all_missions_body">
                    <?php 
                        $result = Missions::get_missions();
                        while($row = $result->fetch_assoc()) { 
                    ?>
                        <tr>
                            
                            <td><?php echo $row["Id"]?></td>
                            <td><?php echo $row["Description"]?></td>
                            <td><?php echo $row["PointValue"]?></td>
                            <td><button class="btn btn-secondary" id="<?php echo $row['Id'] ?>" onclick="change_mission(<?php echo $row['Id'] ?>)">Ändra</button></td>
                            <td><button class="btn btn-danger" id="<?php echo $row['Id'] ?>" onclick="delete_mission(<?php echo $row['Id'] ?>)">Ta bort</button></td>
                            <td><input type="checkbox"></td>
                            <input class="Id" type="hidden" value="<?php echo $row["Id"] ?>">
                        </tr>
                       
                    <?php }?>
                    <button class="btn btn-primary" type="button" id="delete" >Ta bort markerade</button>
                    </tbody>
                </table>
                <div id="create_missions" class="table hidden">
                    <h2>Create new mission:</h2>
                    <form action="createMissionsDB.php" method="get">
                        <div class="input-group input-group-lg">
                            <input name="DESC" type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" placeholder="Beskrivning...">
                            <input name="POINTS" type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" placeholder="Poängvärde...">
                        </div> 
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </form> 
                    <h2>Add excel file: (funkar ej)</h2>
                    <form action="createMissionsDB.php" method="post">
                        <input type="file" name="FILE">
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script src="js/mission_js.js"></script>
</html>