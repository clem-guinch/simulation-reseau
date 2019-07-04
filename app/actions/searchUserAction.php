<?php

session_start();

require_once('../db.php');
$user = getOneUser($_SESSION['email'], $_SESSION['password']);
insertComment($_POST["user_id"], $_POST['commentaire']);
header('Location: /home.php');die;
