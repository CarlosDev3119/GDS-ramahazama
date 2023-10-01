<?php
    define('DB_HOST','localhost');
    define('DB_NAME','endoscopia');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');

    $conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    $fechaInicio = "2023-01-01";
    $fechaFin = "2024-12-31";
    
    if (isset($_POST['fechaInicio']) && isset($_POST['fechaFin'])) {
        $fechaInicio = date("Y-m-d", strtotime($_POST['fechaInicio']));
        $fechaFin = date("Y-m-d", strtotime($_POST['fechaFin']));
    }

    // consulta para la obtencion del numero de veces usados de una sala 
    $query_diagnoticos = "SELECT diagnostico, COUNT(diagnostico)as conteo FROM hospitalizacion JOIN pacientes 
    ON pacientes.id_paciente= hospitalizacion.id_paciente AND pacientes.fecha_registro BETWEEN '$fechaInicio' AND '$fechaFin' 
    GROUP BY diagnostico;";

    $result_diagnosticos= mysqli_query($conn,$query_diagnoticos);
    $data_diagnosticos=array();
        if ($result_diagnosticos->num_rows > 0){
            while ($row = $result_diagnosticos->fetch_assoc()) {
                $data_diagnosticos[] = array(
                    "Diagnostico" => $row["diagnostico"],
                    "Conteo" => $row["conteo"]
                );
            }
    };

    $query_procedimientos ="SELECT procedimiento, COUNT(procedimiento) as conteo FROM estudios 
    JOIN pacientes ON pacientes.id_paciente = estudios.id_paciente AND pacientes.fecha_registro BETWEEN '$fechaInicio' AND '$fechaFin'
    GROUP BY procedimiento;";

    $result_procedimientos = mysqli_query($conn,$query_procedimientos);
    $data_procedimientos=array();
        if ($result_procedimientos->num_rows > 0) {
            while ($row= $result_procedimientos ->fetch_assoc()) {
                $data_procedimientos[]=array(
                    "Procedimiento" => $row["procedimiento"],
                    "Conteo" => $row["conteo"]
                );
            }
            
        };


?>