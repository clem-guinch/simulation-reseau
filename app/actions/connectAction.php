<?php
require_once('../db.php');
getOneUser($_POST['email'], $_POST['password']);

header('Location: /home.php');die;
