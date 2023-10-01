<?php
    include('dbconfig.php');
    $conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if (!$conn) {
        die("Error en la conexion a la base de datos" . mysqli_connect_error());
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $fecha_registro = $_POST['fecha_registro'];
        $nombre_paciente = $_POST['nombre_paciente'];
        $curp = $_POST['curp'];
        $fecha_nacimiento = $_POST['fecha'];
        $edad = $_POST['edad'];
        $sexo = $_POST['sexo'];

        $data_paciente = "INSERT INTO pacientes(fecha_registro,nombre_paciente,curp,fecha_nacimiento,edad,sexo) 
        VALUES ('$fecha_registro','$nombre_paciente','$curp','$fecha_nacimiento','$edad','$sexo')";

        mysqli_query($conn,$data_paciente);
        $lastId = mysqli_insert_id($conn);

        $diagnostico = $_POST['diagnostico'];
        $cama = $_POST['cama'];
        $dias_eih = $_POST['dias_eih'];

        $data_hosp = "INSERT INTO hospitalizacion VALUES('$diagnostico','$cama','$dias_eih','$lastId')";
        mysqli_query($conn,$data_hosp);

        $hb = $_POST['hb'];
        $hcto = $_POST['hcto'];
        $plaquetas = $_POST['plaquetas'];
        $inr = $_POST['inr'];
        $cultivo = $_POST['cultivo'];

        $data_lab = "INSERT INTO laboratorio VALUES ('$hb','$hcto','$plaquetas','$inr','$cultivo','$lastId')";
        mysqli_query($conn,$data_lab);

        $procedimiento = $_POST['procedimiento_realizado'];
        $prioridad = $_POST['prioridad'];
        $medico_endo = $_POST['medico_endo'];
        $estatus_solicitud = $_POST['estatus_solicitud'];
        $fecha_programada = $_POST['fecha_programada'];

        $data_estudio = "INSERT INTO estudios VALUES ('$procedimiento','$prioridad','$medico_endo','$estatus_solicitud',
        '$fecha_programada',$lastId)";
        mysqli_query($conn,$data_estudio);

        $Pinza_Biopsia = isset($_POST['Pinza_Biopsia']) ? 1 : 0;
        $Kit_Ligadura_micro = isset($_POST['Kit_Ligadura_micro']) ? 1 : 0; 
        $Aguja_Escleroterapia = isset($_POST['Aguja_Escleroterapia']) ? 1 : 0; 
        $Argon_Plasma = isset($_POST['Argon_Plasma']) ? 1 : 0; 
        $Sonda_FiAPC = isset($_POST['Sonda_FiAPC']) ? 1 : 0; 
        $Protesis_Esofagica_Wallflex = isset($_POST['Protesis_Esofagica_Wallflex']) ? 1 : 0; 
        $Sistema_Ovesco = isset($_POST['Sistema_Ovesco']) ? 1 : 0; 
        $Guia_Hidrofilica = isset($_POST['Guia_Hidrofilica']) ? 1 : 0; 
        $Kit_Gastrotomia_Endoscopica_Pull = isset($_POST['Kit_Gastrotomia_Endoscopica_Pull']) ? 1 : 0; 
        $Hemoclips = isset($_POST['Hemoclips']) ? 1 : 0; 
        $Ovesco = isset($_POST['Ovesco']) ? 1 : 0; 
        $Kit_Ligadura = isset($_POST['Kit_Ligadura']) ? 1 : 0; 
        $Sonda_de_Gastrotomia = isset($_POST['Sonda_de_Gastrotomia']) ? 1 : 0; 
        $Asa_de_Polipectomia = isset($_POST['Asa_de_Polipectomia']) ? 1 : 0; 
        $Balon_Cre = isset($_POST['Balon_Cre']) ? 1 : 0; 

        $data_materiales = "INSERT INTO materiales VALUES ('$Pinza_Biopsia','$Kit_Ligadura_micro','$Aguja_Escleroterapia','$Argon_Plasma',
        '$Sonda_FiAPC','$Protesis_Esofagica_Wallflex','$Sistema_Ovesco','$Guia_Hidrofilica','$Kit_Gastrotomia_Endoscopica_Pull',
        '$Hemoclips','$Ovesco','$Kit_Ligadura','$Sonda_de_Gastrotomia','$Asa_de_Polipectomia','$Balon_Cre','$lastId')";

        mysqli_query($conn,$data_materiales);


        $fecha_pre_programada = $_POST['fecha_pre_programada'];
        $fecha_estudio = $_POST['fecha_estudio'];
        $defuncion = $_POST['defuncion'];

        $data_seguimiento = "INSERT INTO seguimiento VALUES ('$fecha_pre_programada','$fecha_estudio','$defuncion','$lastId')";
        mysqli_query($conn,$data_seguimiento);
        echo 'success'; // Éxito en la inserción

        mysqli_close($conn);

    }
?>