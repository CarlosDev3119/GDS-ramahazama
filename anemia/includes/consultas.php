<?php
    define('DB_HOST','localhost');
    define('DB_NAME','anemia');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');

    $conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    $querySexo= "SELECT sexo, count(*) as conteo FROM datos_paciente GROUP BY sexo";
    $resultSex = mysqli_query($conn,$querySexo);

    $dataSexo = array();
    if ($resultSex->num_rows > 0) {
        while ($row = $resultSex->fetch_assoc()) {
            $dataSexo[] = array(
                "Sexo" => $row["sexo"],
                "Conteo" => $row["conteo"]
            );
        }
    }

    $queryResImc= "SELECT resultadoimc,COUNT(*) as conteo FROM `datos_paciente` GROUP BY resultadoimc;";
    $resultResImc = mysqli_query($conn,$queryResImc);

    $dataResImc = array();
    if ($resultResImc->num_rows > 0) {
        while ($row = $resultResImc->fetch_assoc()) {
            $dataResImc[] = array(
                "Resultado IMC" => $row["resultadoimc"],
                "Conteo" => $row["conteo"]
            );
        }
    }
    $conn->close();
?>