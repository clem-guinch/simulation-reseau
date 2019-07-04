<?php
require_once('../db.php');
deleteUser($_POST['id']);

header('Location: /index.php');die;
