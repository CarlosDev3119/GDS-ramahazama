<?php
    include('dbconfig.php');
    $conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    $query = "SELECT id_procedimiento,nombre FROM catalogo";

    $dataCatalogo= mysqli_query($conn,$query);
?>