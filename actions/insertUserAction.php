<?php

require_once('../db.php');
insertUser($_POST['prenom'], $_POST['nom'], $_POST['email'], $_POST['password'], $_POST['birthday'], $_POST['gender'], $_POST['mobile']);
header('Location: /index.php');die;
