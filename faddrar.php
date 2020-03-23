<!DOCTYPE html>
<?php
include("include/models/header.php");
include("include/html/menu.php");
include("include/models/faddrar_model.php");
?>

    <div class="btn-group" role="group" aria-label="Basic example">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                Change Rank
            </button>
            <div class="dropdown-menu">
                <button id="change-rank-general" class="dropdown-item" type="button">General</button>
                <button id="change-rank-kapten" class="dropdown-item" type="button">Kapten</button>
                <button id="change-rank-fadder" class="dropdown-item" type="button">Fadder</button>
                <button id="change-rank-recce" class="dropdown-item" type="button">Recce</button>
            </div>
        </div>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                Change Team
            </button>
            <div class="dropdown-menu">
                <button id="change-team-red" class="dropdown-item" type="button">Röd</button>
                <button id="change-team-green" class="dropdown-item" type="button">Grön</button>
                <button id="change-team-yellow" class="dropdown-item" type="button">Gul</button>
                <button id="change-team-blue" class="dropdown-item" type="button">Blå</button>
            </div>
        </div>
        <button id="delete" type="button" class="btn btn-danger">Delete  <i class="fas fa-trash-alt"></i></button>
        <input type="text" class="" placeholder="Search">
        <button type="button" id="search" class="btn btn-secondary">Search <i class="fas fa-search"></i></button>
    </div>

    <table class="table table-striped table-bordered table-sm" id="user-table">
        <thead id="table-header">
            <tr>
                <th scope="col">Select</th>
                <th id="sort-bild" scope="col">Bild</th>
                <th id="sort-name" scope="col">Name</th>
                <th id="sort-rank" scope="col">Rank</th>
                <th id="sort-team" scope="col">Team</th>
                <th id="sort-number" scope="col">Number</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $result = Faddrar::get_users();
            while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><input type="checkbox" aria-label="Checkbox for following text input"></td>
                    <input class="ID" type="hidden" value="<?php echo $row["id"] ?>">
                    <td> <img height="100px" src="<?php echo $row["imgURL"] ?>"/></td>
                    <td> <?php echo $row["name"]; ?></td>
                    <td><?php
                            switch ($row["rank"]) {
                                case "1":
                                    echo '<i class="fas fa-chess-pawn"></i> Recce';
                                    break;
                                case "2":
                                    echo '<i class="fas fa-chess-knight"></i> Fadder';
                                    break;
                                case "3":
                                    echo '<i class="fas fa-chess-king"></i> Kapten';
                                    break;
                                case "4":
                                    echo '<i class="fas fa-crown"></i> General';
                                    break;
                                default:
                                    echo "Ingen rank vald";
                            }
                            ?></td>
                    <td><?php
                            switch ($row["team"]) {
                                case "1":
                                    echo '<i id="icon-red" class="fas fa-square"></i> Röd';
                                    break;
                                case "2":
                                    echo '<i id="icon-green" class="fas fa-square"></i> Grön';
                                    break;
                                case "3":
                                    echo '<i id="icon-yellow" class="fas fa-square"></i> Gul';
                                    break;
                                case "4":
                                    echo '<i id="icon-blue" class="fas fa-square"></i> Blå';
                                    break;
                                default:
                                    echo ' <i class="fas fa-square"></i> Inget lag valt';
                            }
                            ?></td>
                    <td> <?php echo $row["Number"] . ' <button class="change-number" class="btn btn-secondary btn-sm" type="button">Change</button>'; ?></td>
                </tr>
            <?php } ?>

        </tbody>
    </table>

    <div class="content" id="create-missions">
        <h2>Create new fadder:</h2>
        <form action="include/functions/createMissionsDB.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="desc">Description</label>
                <input id="desc" name="DESC" type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" placeholder="Description of the mission">
            </div>
            <div class="form-group">
                <label for="point">Point Value</label>
                <input id="point" name="POINTS" type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" placeholder="Poängvärde...">
            </div> 
            <input class="btn btn-primary" type="submit" value="Submit">
        </form>
        <h1> - OR - </h1>
        <h2>Create multiple new fadders: (.xls, .xlsx)</h2>
        <form action="include/functions/createMissionsDB.php" method="post" enctype="multipart/form-data">
            <div class="form-group input-group-lg">
                <input name="FILE" type="file">
            </div> 
            <input class="btn btn-primary" type="submit" value="Submit">
        </form>
    </div>     

</body>
<script src="assets/js/user.js"></script>
<script src="assets/js/faddrar.js"></script>
</html>
