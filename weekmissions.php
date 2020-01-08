<?php
include("include/models/missions_model.php");
?>

<html lang="en">
    <head>
        <title>Admin Inspark Missions</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/mission_style.css" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
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
                    <form action="createMissionsDB.php" method="post" enctype="multipart/form-data">
                        <div class="input-group input-group-lg">
                            <input name="DESC" type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" placeholder="Beskrivning...">
                            <input name="POINTS" type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" placeholder="Poängvärde...">
                            <input class="btn btn-primary" type="submit" value="Submit">
                        </div> 
                    </form>
                </div>
                <div id="create_multiple_missions" class="table_hidden">
                    <h2>Create multiple new mission:</h2>
                    <form action="createMissionsDB.php" method="post" enctype="multipart/form-data">
                        <div class="input-group input-group-lg">
                            <input name="FILE" type="file">
                            <input class="btn btn-primary" type="submit" value="Submit">
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script src="js/mission_js.js"></script>
</html>