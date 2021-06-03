<?php
session_start();

if($_SESSION['username']){
    
    require_once('db-connect.php');
    $sql = 'SELECT * FROM `projects`';
    $query = $db->prepare($sql);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    /*var_dump ($result);*/ //pour lecture du tableau
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>

<?php
    foreach ($result as $project) {
        # code...
        echo '<div class="color">' . $project['project_title'].' ' . $project['project_context'] .'<div>';
    }



?>
    <a href="add-form.php"><button>Ajouter un Projet</button></a>
   

</body>
</html>