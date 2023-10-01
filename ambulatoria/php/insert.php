<?php
    // conexion para la base de datos
    include('dbconfig.php');
    $conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // insercion de los datos, la insercion se realiza si es que los primeros datos estan llenos correctamente
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        if(strlen($_POST['medico'])>=1 && strlen($_POST['cirugia'])>=1 && strlen($_POST['sala'])>=1
        && strlen($_POST['diagnostico'])>=1){

                $medico = trim($_POST['medico']);
                $cirugia = trim($_POST['cirugia']);
                $sala = trim($_POST['sala']);
                $diagnostico = trim($_POST['diagnostico']);
                $fecha_solicitud = trim($_POST['fecha_solicitud']);
                $fecha_programada = trim($_POST['fecha_programada']);
                $fecha_realizada = trim($_POST['fecha_realizada']);


                $insertar = "INSERT INTO datos_cirugia (medico,cirugia,sala,diagnostico,fecha_solicitud,fecha_programada,fecha_realizada) 
                VALUES ('$medico','$cirugia','$sala','$diagnostico','$fecha_solicitud','$fecha_programada','$fecha_realizada')";

                mysqli_query($conn,$insertar);
                $ultimoId = mysqli_insert_id($conn);

                $programada = trim($_POST['programado']);
                $ingreso = trim($_POST['ingreso']);
                $anestesia = trim($_POST['anestesia']);
                $inicio = trim($_POST['inicio']);
                $fin = trim($_POST['fin']);
                $egreso = trim($_POST['egreso']);

                $pro_ingreso = trim($_POST['pro_ingreso']);
                $pro_inicio = trim($_POST['pro_inicio']);
                $ingreso_egreso = trim($_POST['ingreso_egreso']);
                $ingreso_anestesia = trim($_POST['ingreso_anestesia']);
                $ingreso_inicio = trim($_POST['ingreso_inicio']);
                $inicio_fin = trim($_POST['inicio_fin']);

                $horas =  "INSERT INTO tiempos 
                VALUES ('$programada', '$ingreso', '$anestesia', '$inicio', '$fin', '$egreso', '$pro_ingreso','$pro_inicio', '$ingreso_egreso', '$ingreso_anestesia', '$ingreso_inicio', '$inicio_fin','$ultimoId')";
                
                mysqli_query($conn,$horas);


                $suspendida = trim($_POST['suspendida']);
                $S_medico = trim($_POST['S_medico']);
                $motivo = trim($_POST['motivo']); 

                $suspenciones = "INSERT INTO cancelaciones VALUES ('$suspendida','$S_medico','$motivo','$ultimoId')";
                mysqli_query($conn,$suspenciones);

                echo 'success'; // Éxito en la inserción

                mysqli_close($conn);

    }
}
?>