<!DOCTYPE html>
<?php
include("include/models/header.php");
include("include/models/users_model.php");
?>
<html lang="en">

<head>
    <title>Admin Inspark</title>
    <meta charset="utf-8">
    <link href="https://uppsalasystemvetare.se/wp-content/themes/uppsalasystemvetare/img/favicon.png" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/users.css">
    <script src="https://kit.fontawesome.com/9d81ab243e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="assets/js/user.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-blue">
        <a class="navbar-brand" href="#">
            <img src="https://uppsalasystemvetare.se/wp-content/themes/uppsalasystemvetare/img/favicon.png" width="30" height="30" alt=""></a>

        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="events.php">Events</a>
            <a class="nav-item nav-link" href="users.php">Users</a>
            <a class="nav-item nav-link" href="missions.php">Missions</a>
        </div>
    </nav>

    <div class="btn-group" role="group" aria-label="Basic example">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                Change Rank
            </button>
            <div class="dropdown-menu">
                <button class="dropdown-item" type="button">General</button>
                <button class="dropdown-item" type="button">Kapten</button>
                <button class="dropdown-item" type="button">Fadder</button>
                <button class="dropdown-item" type="button">Recce</button>
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
        <button type="button" class="btn btn-danger">Delete  <i class="fas fa-trash-alt"></i></button>
        <input type="text" class="" placeholder="Search">
        <button type="button" id="search" class="btn btn-secondary">Search <i class="fas fa-search"></i></button>
    </div>

    <table class="table table-striped table-bordered table-sm" id="user-table">
        <thead id="table-header">
            <tr>
                <th scope="col">Select</th>
                <th scope="col">Name</th>
                <th scope="col">Rank</th>
                <th scope="col">Team</th>
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

</html>
