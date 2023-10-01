<?php
include('dbconfig.php');
$conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if (!$conn) {
    die("Error en la conexión a la base de datos" . mysqli_connect_error());
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_paciente = $_POST['id_paciente']; // Debes proporcionar el id_paciente del registro a actualizar

    $fecha_registro = $_POST['fecha_registro'];
    $nombre_paciente = $_POST['nombre_paciente'];
    $curp = $_POST['curp'];
    $fecha_nacimiento = $_POST['fecha'];
    $edad = $_POST['edad'];
    $sexo = $_POST['sexo'];

    $update_paciente = "UPDATE pacientes 
                        SET fecha_registro='$fecha_registro',
                            nombre_paciente='$nombre_paciente',
                            curp='$curp',
                            fecha_nacimiento='$fecha_nacimiento',
                            edad='$edad',
                            sexo='$sexo'
                        WHERE id_paciente = $id_paciente";

    mysqli_query($conn, $update_paciente);

    $diagnostico = $_POST['diagnostico'];
    $cama = $_POST['cama'];
    $dias_eih = $_POST['dias_eih'];

    $update_hosp = "UPDATE hospitalizacion 
                    SET diagnostico='$diagnostico',
                        cama='$cama',
                        dias_eih='$dias_eih'
                    WHERE id_paciente = $id_paciente";

    mysqli_query($conn, $update_hosp);

    $hb = $_POST['hb'];
    $hcto = $_POST['hcto'];
    $plaquetas = $_POST['plaquetas'];
    $inr = $_POST['inr'];
    $cultivo = $_POST['cultivo'];

    $update_lab = "UPDATE laboratorio 
                    SET hb='$hb',
                        hcto='$hcto',
                        plaquetas='$plaquetas',
                        inr='$inr',
                        cultivo='$cultivo'
                    WHERE id_paciente = $id_paciente";

    mysqli_query($conn, $update_lab);

    $procedimiento = $_POST['procedimiento_realizado'];
    $prioridad = $_POST['prioridad'];
    $medico_endo = $_POST['medico_endo'];
    $estatus_solicitud = $_POST['estatus_solicitud'];
    $fecha_programada = $_POST['fecha_programada'];

    $update_estudio = "UPDATE estudios 
                        SET procedimiento='$procedimiento',
                            prioridad='$prioridad',
                            medico_endo='$medico_endo',
                            estatus_solicitud='$estatus_solicitud',
                            fecha_programada='$fecha_programada'
                        WHERE id_paciente = $id_paciente";

    mysqli_query($conn, $update_estudio);

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
    
    $update_materiales = "UPDATE materiales 
                            SET Pinza_Biopsia='$Pinza_Biopsia',
                                Kit_Ligadura_microtech='$Kit_Ligadura_micro',
                                Aguja_Escleroterapia='$Aguja_Escleroterapia',
                                Argon_Plasma='$Argon_Plasma',
                                Sonda_FiAPC='$Sonda_FiAPC',
                                Protesis_Esofagica_Wallflex='$Protesis_Esofagica_Wallflex',
                                Sistema_Ovesco='$Sistema_Ovesco',
                                Guia_Hidrofilica='$Guia_Hidrofilica',
                                Kit_Gastrotomia_Endoscopica_Pull='$Kit_Gastrotomia_Endoscopica_Pull',
                                Hemoclips='$Hemoclips',
                                Ovesco='$Ovesco',
                                Kit_Ligadura='$Kit_Ligadura',
                                Sonda_de_Gastrotomia='$Sonda_de_Gastrotomia',
                                Asa_de_Polipectomia='$Asa_de_Polipectomia',
                                Balon_Cre='$Balon_Cre'
                            WHERE id_paciente = $id_paciente";
    
    mysqli_query($conn, $update_materiales);


    $fecha_pre_programada = $_POST['fecha_pre_programada'];
    $fecha_estudio = $_POST['fecha_estudio'];
    $defuncion = $_POST['defuncion'];

    $update_seguimiento = "UPDATE seguimiento 
                            SET fecha_pre_programada='$fecha_pre_programada',
                                fecha_estudio='$fecha_estudio',
                                defuncion='$defuncion'
                            WHERE id_paciente = $id_paciente";

    mysqli_query($conn, $update_seguimiento);

    echo 'success'; // Éxito en la actualización

    mysqli_close($conn);
}
?>
