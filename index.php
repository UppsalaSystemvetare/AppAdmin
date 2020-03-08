<!DOCTYPE html>

<?php 
include("include/models/menuheader.php");
include("include/html/menu.php");

?>

        <div id="container">
            <h2>


            Hej och välkommen till admin!! USER - [<?php echo $_SESSION['user']; ?>], with rank - [<?php echo $_SESSION['rank']; ?>]
            </h2>
           
            <?php

            
        
            function connect2()
            {
                $host = 'mysql531.loopia.se';
                $db_name = 'uppsalasystemvetare_se';
                $username = 'it@u169008';
                $password = 'ITUtskottet2017';
        
                $connection = new mysqli ( $host , $username , $password , $db_name );
                $connection -> set_charset("utf8");

                if ( $connection -> connect_error )
                {
                    die ("Connection failed:". $connection . connect_error ) ;
                }
                
                return $connection;
            }

            $connection = connect2();
            $query = "SELECT a.id, b1.meta_value AS first_name, b2.meta_value as last_name
                        FROM wp_users a
                        INNER JOIN wp_usermeta b1 ON b1.user_id = a.ID AND b1.meta_key = 'first_name' 
                        INNER JOIN wp_usermeta b2 ON b2.user_id = a.ID AND b2.meta_key = 'last_name'";
            $result = $connection->query($query);
            $connection = disconnect();

            while ($row = $result->fetch_assoc()) {
                var_dump($row);
            }

        ?>

        </div>
    </body>
    <script src="assets/js/index.js"></script>
</html>
