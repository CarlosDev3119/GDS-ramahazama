<?php 

    require_once('../models/database.model.php');
    include('../dbconfig_users.php');

    $user     = $_POST['username'];
    $password = $_POST['password'];

    $connectionDb = new Database(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);

    $query = "SELECT permiso.typetoken FROM users INNER JOIN permiso ON permiso.id_token = users.id_token WHERE username='$user' AND  password='$password' ";

    $data = $connectionDb->getRows($query);



    if( $connectionDb->numberRows == 0 ){

        echo 0;

    }else {
        
        session_start();
        $_SESSION['valid_user'] = $user;

        echo json_encode($data);

    }

?>