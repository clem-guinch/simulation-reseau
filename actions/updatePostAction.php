<?php

session_start();

require_once('../db.php');


if($_POST["user_id"] == $_SESSION['user']['id']) {
    updateComment($_POST['commentaire'], $_POST['id'], $_POST['image']);
} else {
    echo "Vous ne pouvez pas modifier le commentaire d'un autre à moins d'etre un administrateur !";
}

header('Location: /home.php');die;