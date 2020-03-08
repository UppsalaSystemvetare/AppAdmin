<!DOCTYPE html>
<?php 
include("include/models/menuheader.php");
include("include/html/menu.php");
include("include/models/users_model.php");

$user = new Users();
?>

        <div class="container">
            <div class="row">
                <h2>Välkommen till admin - <?php echo $user->get_user_rank_text($_SESSION['rank']); ?> <?php echo $user->get_wp_name($_SESSION['user']); ?> -</h2>
            </div>
            <div class="row">
                Ladda ner mallarna! Byt ut exempelvärderna och lägg till så många rader som ni vill ha. OBS är känsligt för vart raderna ligger, 
                så följ exakt samma som mallen anger. Uppdragsmallen används för både "Uppdrag" och "Veckouppdrag". Det går att lägga in enskilda uppdrag/faddrar/events också.
            </div>
            <div class="row">
                    <a href="assets/files/events.xlsx" download><i class="fas fa-file-excel"> Mall för Events</i></a>
            </div>
            <div class="row">
                <a href="assets/files/patrons.xlsx" download><i class="fas fa-file-excel"> Mall för Faddrar</i></a>
            </div>
            <div class="row">
                <a href="assets/files/missions.xlsx" download><i class="fas fa-file-excel"> Mall för Uppdrag</i></a>
            </div>
            <div class="row">
                Uppdrag syns i appen om ni har ett event samma dag som är markerat som pubrunda. Veckouppdrag syns hela tiden, 
                så ladda endast upp dom de veckor de ska synas. Användare läggs in automatiskt första gången man loggar in i appen, 
                så ni kan bara hantera (ändra lag och rank) dom här! 
            </div>
        </div>
    </body>
    <script src="assets/js/index.js"></script>
</html>
