<?php
include("include/models/weekmissions_model.php");
include("include/html/menu.php");
?>


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
                        $result = WeekMissions::get_missions();
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
    <script src="assets/js/weekmission.js"></script>
</html>