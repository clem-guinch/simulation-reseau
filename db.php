<?php

const DB_ID = "root";
const DB_PASSWORD = "0000";

function getAllUsers(){
  $connec = new PDO("mysql:dbname=bdd_facebook", DB_ID, DB_PASSWORD);
  $request = $connec->prepare("SELECT users.id, email, prenom, nom, comments.text FROM users INNER JOIN comments ON comments.user_id=users.id;");
  $request->execute();
  return $request->fetchAll(PDO::FETCH_ASSOC);
}
function getAllComments(){
  $connec = new PDO("mysql:dbname=bdd_facebook", DB_ID, DB_PASSWORD);
  $request = $connec->prepare("SELECT * FROM users INNER JOIN comments ON comments.user_id=users.id;");
  $request->execute();
  return $request->fetchAll(PDO::FETCH_ASSOC);
}
function insertUser($prenom, $nom, $email, $password, $birthday, $gender, $mobile){
  $connec = new PDO("mysql:dbname=bdd_facebook", DB_ID, DB_PASSWORD);
  $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $request = $connec->prepare("INSERT INTO users(prenom, nom, email, password, birthday, gender, mobile) VALUES (:prenom, :nom, :email, :password, :birthday, :gender, :mobile);");

  $request->execute([
    ":prenom" => $prenom,
    ":nom" => $nom,
    ":email" => $email,
    ":password" => $password,
    ":birthday" => $birthday,
    ":gender" => $gender,
    ":mobile" => $mobile,
  ]);
}

function getOneUser($email, $password) {

  $connec = new PDO('mysql:dbname=bdd_facebook', DB_ID, DB_PASSWORD);
  $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $request = $connec->prepare("SELECT id, nom, prenom, role_id FROM users WHERE email = :email AND password = :password;");
  $request->bindParam(":email", $email);
  $request->bindParam(":password", $password);
  $request->execute();
  $user = $request->fetch(PDO::FETCH_ASSOC);
  if($user) {
    session_start();
    $_SESSION['user'] = $user;
    return $user;
  } else {
    header('Location: /404.php');die;
  }
}

function insertComment( $user_id, $commentaire, $image){
  $connec = new PDO("mysql:dbname=bdd_facebook", DB_ID, DB_PASSWORD);
  $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $request = $connec->prepare("INSERT INTO comments(text, user_id, image) VALUES (:text, :user_id, :url);");
  $request->bindParam(":text", $commentaire);
  $request->bindParam(":user_id", $user_id);
  $request->bindParam(":url", $image);
  $request->execute();
  return;
}

function updateComment($updateText, $id, $image) {
  $connec = new PDO("mysql:dbname=bdd_facebook", DB_ID, DB_PASSWORD);
  $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $request = $connec->prepare("UPDATE comments SET text = :updateText, image = :image WHERE id = :id;");
  $request->bindParam(":updateText", $updateText);
  $request->bindParam(":id", $id);
  $request->bindParam(":image", $image);
  $request->execute();
}
function findOneUser($nom) {
  $connec = new PDO('mysql:dbname=bdd_facebook', DB_ID, DB_PASSWORD);
  $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $request = $connec->prepare("SELECT nom, prenom, birthday FROM users WHERE nom = :nom;");
  $request->execute([
    ":nom" => $nom,
  ]);
  return $request->fetchAll(PDO::FETCH_ASSOC);
}
function deleteComment($id){
  $connec = new PDO("mysql:dbname=bdd_facebook", DB_ID, DB_PASSWORD);
  $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// cette ligne de code permet d'fficher les erreurs PDO
  $request = $connec->prepare("DELETE FROM comments WHERE id = :id ;");
  $request->execute([
    ":id" => $id,
  ]);
}
function getUsers(){
  $connec = new PDO("mysql:dbname=bdd_facebook", DB_ID, DB_PASSWORD);
  $request = $connec->prepare("SELECT users.id, prenom, nom, birthday FROM users;");
  $request->execute();
  return $request->fetchAll(PDO::FETCH_ASSOC);
}
function deleteUser($id){
  $connec = new PDO("mysql:dbname=bdd_facebook", DB_ID, DB_PASSWORD);
  $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// cette ligne de code permet d'fficher les erreurs PDO
  $request = $connec->prepare("DELETE FROM users WHERE id = :id ;");
  $request->execute([
    ":id" => $id,
  ]);
}
