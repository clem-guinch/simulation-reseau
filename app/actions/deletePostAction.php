<?php
require_once('../db.php');
deleteComment($_POST['id']);
header('Location: /home.php');die;
