<?php

session_start();

if(!isset($_SESSION['user']) && !isset($_SESSION['rank'])){
    header("Location: login.php");
}

function connect(){
	
	$uname = "inspark@u237243";
	$pass = "20DBUSInspark!18";
	$host = "mysql687.loopia.se";
	$dbname = "uppsalasystemvetare_se_db_2";

	$connection = new mysqli ( $host , $uname , $pass , $dbname );
    $connection -> set_charset("utf8");
    
	if ( $connection -> connect_error )
	{
		die ("Connection failed:". $connection . connect_error ) ;
	}
	
	return $connection;

}

function connect2(){
    
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

function disconnect(){
	return null;
}
?>