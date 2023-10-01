<?php
    define('DB_HOST','localhost');
    define('DB_NAME','ambulatoria');
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
    $queryusoSalas = "SELECT s.sala, IFNULL(COUNT(d.id_cirugia), 0) as usosalas 
    FROM (SELECT DISTINCT sala FROM datos_cirugia)s
    LEFT JOIN datos_cirugia d ON s.sala = d.sala AND d.fecha_realizada BETWEEN '$fechaInicio' AND '$fechaFin'
    GROUP BY s.sala";
    $result_usoSalas= mysqli_query($conn,$queryusoSalas);
    $data_usoSalas=array();
        if ($result_usoSalas->num_rows > 0){
            while ($row = $result_usoSalas->fetch_assoc()) {
                $data_usoSalas[] = array(
                    "Sala" => $row["sala"],
                    "UsoSalas" => $row["usosalas"]
                );
            }
    };

    // consulta para la obtencion del promedio de horas en el campo de programada_inicio
    $queryprogramdoInicio = "SELECT d.medico, SEC_TO_TIME(AVG(TIME_TO_SEC(t.programada_inicio))) AS promedioInicio_horas 
    FROM datos_cirugia d LEFT JOIN tiempos t ON d.id_cirugia = t.id_cirugia 
    AND d.fecha_realizada BETWEEN '$fechaInicio' AND '$fechaFin'
    GROUP BY d.medico";

    $result_programadoInicio = mysqli_query($conn, $queryprogramdoInicio);
    $data_ProgIni = array();

    if ($result_programadoInicio->num_rows > 0) {
        while ($row = $result_programadoInicio->fetch_assoc()) {
    
            $tiempo_formato = $row["promedioInicio_horas"];
            
            // Verificar si $tiempo_formato no es NULL antes de usar explode
            if ($tiempo_formato !== null) {
                list($horas, $minutos, $segundos) = explode(":", $tiempo_formato);
                $horas = (int)$horas;
                $minutos = (int)$minutos;
                
                $tiempo_total_decimal = $horas + ($minutos / 60);
                
                $data_ProgIni[] = array(
                    "Medico" => $row["medico"],
                    "PromedioInicio horas" => doubleval(number_format($tiempo_total_decimal, 2))
                );
            } else {
                // Si $tiempo_formato es NULL, asignar un valor predeterminado de 0
                $data_ProgIni[] = array(
                    "Medico" => $row["medico"],
                    "PromedioInicio horas" => 0
                );
            }
        }
    }
    

    // consulta para la obtencion del promedio de horas en el campo de ingreso_egreso
    $queryPromedio="SELECT datos_cirugia.medico,SEC_TO_TIME(AVG(TIME_TO_SEC(t.ingreso_egreso))) AS promedio_horas
    FROM datos_cirugia 
    LEFT JOIN tiempos t ON datos_cirugia.id_cirugia = t.id_cirugia  AND datos_cirugia.fecha_realizada BETWEEN '$fechaInicio' AND '$fechaFin'
    GROUP BY datos_cirugia.medico";

    $result_promedio = mysqli_query($conn, $queryPromedio);
    $data_Promedio = array();

    if ($result_promedio->num_rows > 0) {
        while ($row = $result_promedio->fetch_assoc()) {

            $tiempo_formato = $row["promedio_horas"];
            
            // Verificar si $tiempo_formato no es NULL antes de usar explode
            if ($tiempo_formato !== null) {
                list($horas, $minutos, $segundos) = explode(":", $tiempo_formato);
                $horas = (int)$horas;
                $minutos = (int)$minutos;
                
                $tiempo_total_decimal = $horas + ($minutos / 60);
                
                $data_Promedio[] = array(
                    "Medico" => $row["medico"],
                    "Promedio horas" => doubleval(number_format($tiempo_total_decimal, 2))
                );
            } else {
                // Si $tiempo_formato es NULL, asignar un valor predeterminado de 0
                $data_Promedio[] = array(
                    "Medico" => $row["medico"],
                    "Promedio horas" => 0
                );
            }
        }
    }

// aqui son para la 4ta en adelante 
    // consulta para la obtencion del promedio de horas en el campo de ingreso_anestesia
    $queryPromedioAnes="SELECT datos_cirugia.medico,SEC_TO_TIME(AVG(TIME_TO_SEC(t.ingreso_anestesia))) AS promedio_anestesia
    FROM datos_cirugia 
    LEFT JOIN tiempos t ON datos_cirugia.id_cirugia = t.id_cirugia  AND datos_cirugia.fecha_realizada BETWEEN '$fechaInicio' AND '$fechaFin'
    GROUP BY datos_cirugia.medico";

    $result_promAnest = mysqli_query($conn, $queryPromedioAnes);
    $data_PromAnestecia = array();

    if ($result_promAnest->num_rows > 0) {
        while ($row = $result_promAnest->fetch_assoc()) {

            $tiempo_formato = $row["promedio_anestesia"];

            // Verificar si $tiempo_formato no es NULL antes de usar explode
            if ($tiempo_formato !== null) {
                list($horas, $minutos, $segundos) = explode(":", $tiempo_formato);
                $horas = (int)$horas;
                $minutos = (int)$minutos;
                $tiempo_total_decimal = $horas + ($minutos / 60);

                $data_PromAnestecia[] = array(
                    "Medico" => $row["medico"],
                    "Promedio Anestesia" => doubleval(number_format($tiempo_total_decimal, 2))
                );
            } else {
                // Si $tiempo_formato es NULL, asignar un valor predeterminado de 0
                $data_PromAnestecia[] = array(
                    "Medico" => $row["medico"],
                    "Promedio Anestesia" => 0
                );
            }
        }
    }


    // consulta para la obtencion del promedio de horas en el campo de ingreso_inicio
    $queryPromedioInicio="SELECT datos_cirugia.medico,SEC_TO_TIME(AVG(TIME_TO_SEC(t.ingreso_inicio))) AS promedio_inicio
    FROM datos_cirugia 
    LEFT JOIN tiempos t ON datos_cirugia.id_cirugia = t.id_cirugia  AND datos_cirugia.fecha_realizada BETWEEN '$fechaInicio' AND '$fechaFin'
    GROUP BY datos_cirugia.medico";

    $result_promInicio = mysqli_query($conn, $queryPromedioInicio);
    $data_PromInicio = array();

    if ($result_promInicio->num_rows > 0) {
        while ($row = $result_promInicio->fetch_assoc()) {

            $tiempo_formato = $row["promedio_inicio"];

            // Verificar si $tiempo_formato no es NULL antes de usar explode
            if ($tiempo_formato !== null) {
                list($horas, $minutos, $segundos) = explode(":", $tiempo_formato);
                $horas = (int)$horas;
                $minutos = (int)$minutos;
                $tiempo_total_decimal = $horas + ($minutos / 60);

                $data_PromInicio[] = array(
                    "Medico" => $row["medico"],
                    "Promedio Inicio" => doubleval(number_format($tiempo_total_decimal, 2))
                );
            } else {
                // Si $tiempo_formato es NULL, asignar un valor predeterminado de 0
                $data_PromInicio[] = array(
                    "Medico" => $row["medico"],
                    "Promedio Inicio" => 0
                );
            }
        }
    }


    // consulta para la obtencion del promedio de horas en el campo de inicio_fin
    $queryPromedioIniFin="SELECT datos_cirugia.medico,SEC_TO_TIME(AVG(TIME_TO_SEC(t.inicio_fin))) AS promedio_inicio_fin
    FROM datos_cirugia 
    LEFT JOIN tiempos t ON datos_cirugia.id_cirugia = t.id_cirugia  AND datos_cirugia.fecha_realizada BETWEEN '$fechaInicio' AND '$fechaFin'
    GROUP BY datos_cirugia.medico";

    $result_promIniFin = mysqli_query($conn, $queryPromedioIniFin);
    $data_PromIniFin = array();

    if ($result_promIniFin->num_rows > 0) {
        while ($row = $result_promIniFin->fetch_assoc()) {

            $tiempo_formato = $row["promedio_inicio_fin"];

            // Verificar si $tiempo_formato no es NULL antes de usar explode
            if ($tiempo_formato !== null) {
                list($horas, $minutos, $segundos) = explode(":", $tiempo_formato);
                $horas = (int)$horas;
                $minutos = (int)$minutos;
                $tiempo_total_decimal = $horas + ($minutos / 60);

                $data_PromIniFin[] = array(
                    "Medico" => $row["medico"],
                    "Promedio Inicio-Fin" => doubleval(number_format($tiempo_total_decimal, 2))
                );
            } else {
                // Si $tiempo_formato es NULL, asignar un valor predeterminado de 0
                $data_PromIniFin[] = array(
                    "Medico" => $row["medico"],
                    "Promedio Inicio-Fin" => 0
                );
            }
        }
    }


    // consulta para la obtencion del total de cirugias hechas por el medico
    $queyTotalCirug= "SELECT dc.medico, COUNT(dc.id_cirugia) AS total_cirugias
    FROM datos_cirugia dc WHERE dc.fecha_realizada BETWEEN '$fechaInicio' AND '$fechaFin'
    GROUP BY dc.medico";

    $result_TotalCirug = mysqli_query($conn, $queyTotalCirug);
    $data_TotalCirug = array();


    if ($result_TotalCirug->num_rows > 0) {
        while ($row = $result_TotalCirug->fetch_assoc()) {


            $data_TotalCirug[] = array(
                "Medico" => $row["medico"],
                "Total Cirugias" => intval($row["total_cirugias"])
            );
            }
    }
    

    // consulta para la obtencion del total de cirugias suspendidas para el medico
    $querySuspenciones= "SELECT dc.medico, COUNT(c.suspencion) AS suspenciones FROM datos_cirugia dc LEFT JOIN cancelaciones c 
    ON dc.id_cirugia = c.id_cirugia AND c.suspencion = 'si' AND dc.fecha_realizada BETWEEN '$fechaInicio' AND '$fechaFin'
    GROUP BY dc.medico";

    $result_Suspenciones = mysqli_query($conn, $querySuspenciones);
    $data_suspenciones = array();


    if ($result_Suspenciones->num_rows > 0) {
        while ($row = $result_Suspenciones->fetch_assoc()) {


            $data_suspenciones[] = array(
                "Medico" => $row["medico"],
                "Suspenciones" => intval($row["suspenciones"])
            );
            }
    }
    






    


?>