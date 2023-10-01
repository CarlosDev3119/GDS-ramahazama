<?php
    include('dbconfig.php');
    $conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if (!$conn) {
        die("Error en la conexion a la base de datos" . mysqli_connect_error());
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $id_cirugia  = $_POST["id_cirugia"];

        $medico = trim($_POST['medico']);
        $cirugia = trim($_POST['cirugia']);
        $sala = trim($_POST['sala']);
        $diagnostico = trim($_POST['diagnostico']);
        $fecha_solicitud = trim($_POST['fecha_solicitud']);
        $fecha_programada = trim($_POST['fecha_programada']);
        $fecha_realizada = trim($_POST['fecha_realizada']);


        $insertar = "UPDATE datos_cirugia 
        SET medico = '$medico',
            cirugia = '$cirugia',
            sala = '$sala',
            diagnostico = '$diagnostico',
            fecha_solicitud = '$fecha_solicitud',
            fecha_programada = '$fecha_programada',
            fecha_realizada = '$fecha_realizada'
        WHERE id_cirugia = '$id_cirugia'";

        mysqli_query($conn,$insertar);

        $programada = $_POST['programado'];
        $ingreso = $_POST['ingreso'];
        $anestesia = $_POST['anestesia'];
        $inicio = $_POST['inicio'];
        $fin = $_POST['fin'];
        $egreso = $_POST['egreso'];

        $pro_ingreso = $_POST['pro_ingreso'];
        $pro_inicio = $_POST['pro_inicio'];
        $ingreso_egreso = $_POST['ingreso_egreso'];
        $ingreso_anestesia = $_POST['ingreso_anestesia'];
        $ingreso_inicio = $_POST['ingreso_inicio'];
        $inicio_fin = $_POST['inicio_fin'];

        $horas =  "UPDATE tiempos 
        SET programada = '$programada',
            ingreso = '$ingreso',
            anestesia = '$anestesia',
            inicio = '$inicio',
            fin = '$fin',
            egreso = '$egreso',
            programada_ingreso = '$pro_ingreso',
            programada_inicio = '$pro_inicio',
            ingreso_egreso = '$ingreso_egreso',
            ingreso_anestesia = '$ingreso_anestesia',
            ingreso_inicio = '$ingreso_inicio',
            inicio_fin = '$inicio_fin'
        WHERE id_cirugia = '$id_cirugia'";        
        mysqli_query($conn,$horas);


        $suspendida = trim($_POST['suspendida']);
        $S_medico = trim($_POST['S_medico']);
        $motivo = trim($_POST['motivo']); 

        $suspenciones = "UPDATE cancelaciones 
        SET suspencion = '$suspendida',
            S_medico = '$S_medico',
            motivo = '$motivo'
        WHERE id_cirugia = '$id_cirugia'";
        mysqli_query($conn,$suspenciones);

        echo 'success'; // Éxito en la inserción

        mysqli_close($conn);
    }
?>