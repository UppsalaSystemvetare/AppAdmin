<?php
include("include/models/missions_model.php");
?>

<html lang="en">
    <head>
        <title>Admin Inspark Missions</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div id="container">
            <div id="container" class="header">
                <h1>All missions</h1>
            </div>        
            <div id="conatiner">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Beskrivning</th>
                        <th>Poängvärde (0 för användardefinierat)</th>
                    </tr>
                    </thead>
                    <tbody>
                <?php 
                    $all_missions = get_all_assoc();
                    while($row = $all_missions->fetch_assoc()) { 
                ?>
                    <tr>
                        <td><?php echo $row["Id"]?></td>
                        <td><?php echo $row["Description"]?></td>
                        <td><?php echo $row["PointValue"]?></td>
                    </tr>
                <?php }?>
                </tbody>
                </table>
                </div>
            </div>
        </div>
    </body>
</html>

