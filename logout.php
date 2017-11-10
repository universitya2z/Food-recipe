<?php
session_start();

header("location: Index.php");

session_destroy();

?>