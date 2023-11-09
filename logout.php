<?php include_once "./resource/session.php";

session_destroy();
header("Location:index.php");
