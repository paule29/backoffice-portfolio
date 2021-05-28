<?php
require_once('db-connect.php');

// récupération des données form
$username = $_POST['username'];
$email =  $_POST['email'];
$password = $_POST['password'];
$confirmation = $_POST['confirmation'];

if ($password === $confirmation) {
    $passwordhash = password_hash($_POST['password'], PASSWORD_DEFAULT);
  //faire requête sql
  $sql = 'INSERT INTO users(username,email,password) VALUES(:username,:email,:password)';
  $query = $db->prepare($sql);
  $query->bindValue(':username', $username, PDO::PARAM_STR);
  $query->bindValue(':email', $email, PDO::PARAM_STR);
  $query->bindValue('password', $passwordhash, PDO::PARAM_STR);
  $query->execute();
  echo 'succes';
}else{
echo 'les mots de passes ne correspondent pas';
}