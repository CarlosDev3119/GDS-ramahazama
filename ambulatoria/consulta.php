<?php
    include('php/visualizacion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>

    <table class="table table-striped table-hover table-bordered tabla-consulta">
        <thead>
            
            <tr>
                <th scope="col"> Datos de la cirugia</th>
                <th scope="col"> </th>
            </tr>
        </thead>

        <tbody style="font-size:13px;" class="table-bordered">
            <tr>
                <td class="estilo-celda">Médico</td>
                <td><?php echo $medico; ?></td>
            </tr>

            <tr>
                <td class="estilo-celda">Cirugía</td>
                <td><?php echo $cirugia; ?></td>
            </tr>

            <tr>
                <td class="estilo-celda">Sala</td>
                <td><?php echo $sala; ?></td>
            </tr>

            <tr>
                <td class="estilo-celda">Diagnóstico</td>
                <td><?php echo $diagnostico; ?></td>
            </tr>

            <tr>
                <td class="estilo-celda">Fecha solicitud de cirugía</td>
                <td><?php echo $fecha_solicitud; ?></td>
            </tr>

            <tr>
                <td class="estilo-celda">Fecha programación cirugía</td>
                <td><?php echo $fecha_programada; ?></td>
            </tr>

            <tr>
                <td class="estilo-celda">Fecha realización de cirugía</td>
                <td><?php echo $fecha_realizada; ?></td>
            </tr>

            <tr>
                <td class="estilo-celda">Hora Programada de Cirugía</td>
                <td><?php echo $programada; ?></td>
            </tr>

            <tr>
                <td class="estilo-celda">Hora Ingreso a Sala</td>
                <td><?php echo $ingreso; ?></td>
            </tr>
            
            <tr>
                <td class="estilo-celda">Hora Anestesia</td>
                <td><?php echo $anestesia; ?></td>
            </tr>

            <tr>
                <td class="estilo-celda">Hora Inicio Cirugía</td>
                <td><?php echo $inicio; ?></td>
            </tr>

            <tr>
                <td class="estilo-celda">Hora Fin Cirugía</td>
                <td><?php echo $fin; ?></td>
            </tr>

            <tr>
                <td class="estilo-celda">Hora Egreso Sala</td>
                <td><?php echo $egreso; ?></td>
            </tr>

          <!--CONMORBILIDADES-->
            

            <tr>
                <th scope="col"  style="background-color: rgb(70, 130, 180, 0.5)"> ¿Cirugía Suspendida?</th>
                <th scope="col" style="background-color: rgb(70, 130, 180, 0.5);"> </th>
            </tr>


            <tr>
                <td class="estilo-celda">Médico</td>
                <td><?php echo $S_medico; ?></td>
            </tr>
            
            <tr>
                <td class="estilo-celda">Motivo</td>
                <td><?php echo $motivo; ?></td>
            </tr>
            

            <tr>
                <th scope="col"  style="background-color: rgb(70, 130, 180, 0.5)"> Cálculo de Tiempos</th>
                <th scope="col" style="background-color: rgb(70, 130, 180, 0.5);"> </th>
            </tr>

            <tr>
                <td class="estilo-celda">Programada - Ingreso Sala</td>
                <td><?php echo $pro_ingreso; ?></td>
            </tr>

            <tr>
                <td class="estilo-celda">Programada - Inicio Cirugía</td>
                <td><?php echo $pro_inicio; ?></td>
            </tr>

            <tr>
                <td class="estilo-celda">Ingreso - Egreso Sala</td>
                <td><?php echo $ingreso_egreso; ?></td>
            </tr>

            <tr>
                <td class="estilo-celda">Ingreso - Inicio Anestesia</td>
                <td><?php echo $ingreso_anestesia; ?></td>
            </tr>

            <tr>
                <td class="estilo-celda">Ingreso Sala - Inicio Cirugía</td>
                <td><?php echo $ingreso_inicio; ?></td>
            </tr>
            
            <tr>
                <td class="estilo-celda">Ingreso Inicio - Fin Cirugía</td>
                <td><?php echo $inicio_fin; ?></td>
            </tr>
            
            
        </tbody>
    </table>





</body>
</html>
       