<!DOCTYPE html>
<?php
include("include/models/header.php");
include("include/html/menu.php");
include("include/models/users_model.php");
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
                <button id="change-team-none" class="dropdown-item" type="button">Inget</button>
            </div>
        </div>
        <button class="btn btn-secondary" type="button" onclick="scrollToTop()">Back To Top</button>
        <button id="delete" type="button" class="btn btn-danger">Delete  <i class="fas fa-trash-alt"></i></button>
        <input type="text" class="" placeholder="Search">
        <button type="button" id="search" class="btn btn-secondary">Search <i class="fas fa-search"></i></button>
    </div>

    <table class="table table-striped table-bordered table-sm sortable" id="user-table">
        <thead id="table-header">
            <tr>
                <th scope="col">Select</th>
                <th id="sort-name" scope="col">Name</th>
                <th id="sort-rank" scope="col">Rank</th>
                <th id="sort-team" scope="col">Team</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $result = Users::get_users();
            while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><input type="checkbox" aria-label="Checkbox for following text input"></td>
                    <input class="ID" type="hidden" value="<?php echo $row["ID"] ?>">
                    <td>Firstname Lastname</td>
                    <td><?php
                            switch ($row["Rank"]) {
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
                            switch ($row["Team"]) {
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
                </tr>
            <?php } ?>

        </tbody>
    </table>

</body>

<script src="assets/js/user.js"></script>
</html>
