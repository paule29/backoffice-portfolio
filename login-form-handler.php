<?php
require_once("db-connect.php");
//cherche une entrée dans la base de données (username) qui  correspond avec ce que l'utilisateur a passé comme renseignement
$sql = 'SELECT id,username,password FROM users WHERE username=:username';
$query = $db->prepare($sql);
$query->execute(array('username'=>$_POST['username']));
$result = $query->fetch();

if(!$result){
    echo'l\'identifiant et/ou le mot de passe sont incorrects';
} else{
    
    $verif = password_verify($_POST['password'],$result['password']);
   
        if(!$verif){
        echo'l\'identifiant et/ou le mot de passe sont incorrects';

    } else{
        session_start();
        $SESSION['id']=$result['id'];
        $SESSION['username']=$result['username'];
        $SESSION['success']='Connexion réussie';
        header('Location:home.php');
    }
} 