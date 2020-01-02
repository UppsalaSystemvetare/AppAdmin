<?php
session_start();
$_SESSION['user'] = $_POST['ID']; // använda ID till US databas för namn kanske?
?>