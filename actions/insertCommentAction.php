<?php

session_start();

require_once('../db.php');

insertComment($_POST["user_id"], $_POST['commentaire'], $_POST['image']);

header('Location: /home.php');die;
