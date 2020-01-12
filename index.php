<!DOCTYPE html>


<?php 
include("include/models/header.php");
include("include/html/menu.php");

?>

        <div id="container">
            <h2>


            Hej och välkommen till admin!! USER - [<?php echo $_SESSION['user']; ?>], with rank - [<?php echo $_SESSION['rank']; ?>]
            </h2>


        </div>
    </body>
    <script src="assets/js/index.js"></script>
</html>
