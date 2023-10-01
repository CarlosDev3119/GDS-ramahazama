<?php
// // // // conexion para la base de datos
    include ('dbconfig.php');

    // campo para las fechas, tiene ya un fecha definida para mostrar los datos generales del año en el que se encuentra
    // y aqui se hace la obtencion de la fecha para comenzar el filtrado
    $fechaInicio = "2023-01-01";
    $fechaFin = "2023-12-01";
    if (isset($_POST['fechaInicio']) && isset($_POST['fechaFin'])) {
        $fechaInicio = $_POST['fechaInicio'];
        $fechaFin = $_POST['fechaFin'] ;
    }

    // consulta para la obtencion de los posibles medicos
    $query = "SELECT medico FROM medicos GROUP BY medico";
    $result = $conexion->query($query);
    if ($result->num_rows > 0) {
        $medicos = array();
        while ($fila = $result->fetch_assoc()) {
            $medicos[] = $fila["medico"];
        }};

    // consulta para la obtencion de las posibles salas
    $sala = "SELECT sala FROM datos_cirugia GROUP BY sala";
    $result11 = $conexion->query($sala);
    if ($result11->num_rows > 0) {
        $salas = array();
        while ($fila = $result11->fetch_assoc()) {
            $salas[] = $fila["sala"];
        }};

    // consulta para la obtencion del numero de veces usados de una sala 
    $u_salas = "SELECT s.sala, IFNULL(COUNT(d.id_cirugia), 0) as usosalas 
    FROM (SELECT DISTINCT sala FROM datos_cirugia)s
    LEFT JOIN datos_cirugia d ON s.sala = d.sala AND d.fecha BETWEEN '$fechaInicio' AND '$fechaFin'
    GROUP BY s.sala";
    $result11 = $conexion->query($u_salas);
    if ($result11->num_rows > 0){
        $usoSalas = array();
        while ($fila = $result11->fetch_assoc()){
            $usoSalas[] = $fila["usosalas"];
        }
    };

    // consulta para la obtencion del promedio de horas en el campo de programada_inicio
    $programadoInicio="SELECT m.medico, COALESCE(SEC_TO_TIME(AVG(TIME_TO_SEC(t.programada_inicio))), '00:00:00') AS promedioInicio_horas
    FROM medicos m
    LEFT JOIN datos_cirugia dc ON m.medico = dc.medico
    LEFT JOIN tiempos t ON dc.id_cirugia = t.id_cirugia AND dc.fecha BETWEEN '$fechaInicio' AND '$fechaFin'
    GROUP BY m.medico";
    $result10 = $conexion ->query($programadoInicio);
    if($result10->num_rows > 0){
        $PIni = array();
        while($fila=$result10->fetch_assoc()){
            $PIni[]=$fila["promedioInicio_horas"];
        }
    };

    // consulta para la obtencion del promedio de horas en el campo de ingreso_egreso
    $ingresoEgreso= "SELECT m.medico, COALESCE(SEC_TO_TIME(AVG(TIME_TO_SEC(t.ingreso_egreso))), '00:00:00') AS promedio_horas
    FROM medicos m
    LEFT JOIN datos_cirugia dc ON m.medico = dc.medico
    LEFT JOIN tiempos t ON dc.id_cirugia = t.id_cirugia AND dc.fecha BETWEEN '$fechaInicio' AND '$fechaFin'
    GROUP BY m.medico";
    $result2 = $conexion->query($ingresoEgreso);
    if ($result2->num_rows > 0){
        $IE = array();
        while ($fila = $result2->fetch_assoc()){
            $IE[] = $fila["promedio_horas"];
        }
    };

    // consulta para la obtencion del promedio de horas en el campo de ingreso_anestesia
    $ingresoAnestecia="SELECT m.medico, COALESCE(SEC_TO_TIME(AVG(TIME_TO_SEC(t.ingreso_anestesia))), '00:00:00') AS promedio_anestesia
    FROM medicos m
    LEFT JOIN datos_cirugia dc ON m.medico = dc.medico
    LEFT JOIN tiempos t ON dc.id_cirugia = t.id_cirugia AND dc.fecha BETWEEN '$fechaInicio' AND '$fechaFin'
    GROUP BY m.medico";
    $result3 = $conexion ->query($ingresoAnestecia);
    if($result3->num_rows > 0){
        $IA = array();
        while($fila=$result3->fetch_assoc()){
            $IA[]=$fila["promedio_anestesia"];
        }
    };

    // consulta para la obtencion del promedio de horas en el campo de ingreso_inicio
    $ingresoInicio = "SELECT m.medico, COALESCE(SEC_TO_TIME(AVG(TIME_TO_SEC(t.ingreso_inicio))), '00:00:00') AS promedio_inicio
    FROM medicos m
    LEFT JOIN datos_cirugia dc ON m.medico = dc.medico
    LEFT JOIN tiempos t ON dc.id_cirugia = t.id_cirugia AND dc.fecha BETWEEN '$fechaInicio' AND '$fechaFin'
    GROUP BY m.medico";
    $result4 = $conexion ->query($ingresoInicio);
    if($result4->num_rows > 0){
        $II = array();
        while($fila=$result4->fetch_assoc()){
            $II[]=$fila["promedio_inicio"];
        }
    };

    // consulta para la obtencion del promedio de horas en el campo de inicio_fin
    $inicioFin ="SELECT m.medico, COALESCE(SEC_TO_TIME(AVG(TIME_TO_SEC(t.inicio_fin))), '00:00:00') AS promedio_inicio
    FROM medicos m
    LEFT JOIN datos_cirugia dc ON m.medico = dc.medico
    LEFT JOIN tiempos t ON dc.id_cirugia = t.id_cirugia AND dc.fecha BETWEEN '$fechaInicio' AND '$fechaFin'
    GROUP BY m.medico";
    $result5 = $conexion ->query($inicioFin);
    if($result5->num_rows > 0){
        $IF = array();
        while($fila=$result5->fetch_assoc()){
            $IF[]=$fila["promedio_inicio"];
        }
    };

    // consulta para la obtencion del total de cirugias hechas por el medico
    $contador= "SELECT m.medico, COUNT(dc.id_cirugia) AS total_cirugias
    FROM medicos m
    LEFT JOIN datos_cirugia dc ON m.medico = dc.medico AND dc.fecha BETWEEN '$fechaInicio' AND '$fechaFin'
    GROUP BY m.medico";
    $result6 = $conexion ->query($contador);
    if($result6->num_rows > 0){
        $cont = array();
        while($fila=$result6->fetch_assoc()){
            $cont[]=$fila["total_cirugias"];
        }
    };

    // consulta para la obtencion del total de cirugias suspendidas para el medico
    $suspenciones= "SELECT m.medico, COUNT(c.suspencion) AS suspenciones
    FROM medicos m
    LEFT JOIN datos_cirugia dc ON m.medico = dc.medico
    LEFT JOIN cancelaciones c ON dc.id_cirugia = c.id_cirugia AND c.suspencion = 'si' AND dc.fecha BETWEEN '$fechaInicio' AND '$fechaFin'
    GROUP BY m.medico";
    $result8 = $conexion->query($suspenciones);
    if ($result8->num_rows > 0){
        $susp = array();
        while ($fila = $result8->fetch_assoc()){
            $susp[] = $fila["suspenciones"];
        }
    };
    
    // importacion de los datos median json encode
    $medicos = json_encode($medicos);
    $salas = json_encode($salas);
    $usoSalas = json_encode($usoSalas);
    $PIni = json_encode($PIni);
    $IE = json_encode($IE);
    $IA = json_encode($IA);
    $II = json_encode($II);
    $IF = json_encode($IF);
    $cont = json_encode($cont);
    $susp = json_encode($susp);

    $conexion->close();
?>