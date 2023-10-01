<?php
    include('includes/consultas.php');
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
    <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- jQuery UI (Datepicker) -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <style>
        .graficas{

width: 75%;
height: 500px;

}

    </style>
    <title>Gráficas - Clinica de Anemias</title>
</head>
<body>
    <header>
        <a href="https://hraei.gob.mx/" target="_blank">HRAEI</a>
        <h5 style="color:#DDC9A3; margin-top: 15px;">Gráficas - Clínica de Anemias</h5>
        <br>
    </header>
    <br>
    <form action="" method="POST" autocomplete="off">
        <label for="fechaInicio">Fecha de inicio:</label>
        <input type="text" id="fechaInicio" name="fechaInicio">

        <label for="fechaFin">Fecha de fin:</label>
        <input type="text" id="fechaFin" name="fechaFin">

        <input type="submit" value="Filtrar">
        <?php
            echo "<br><br><h2>Resultados para el período " . $fechaInicio . " al " . $fechaFin . ":</h2>"; 
        ?>
    </form>

    <h1>uso de salas</h1>
    <div class="graficas" id="grafica1"></div>
    <h1>programada_inicio</h1>
    <div class="graficas" id="grafica2"></div>
    <h1>ingreso_egreso</h1>
    <div class="graficas" id="grafica3"></div>
    <h1>ingreso_anestesia</h1>
    <div class="graficas" id="grafica4"></div>
    <h1>ingreso_inicio</h1>
    <div class="graficas" id="grafica5"></div>
    <h1>inicio_fin</h1>
    <div class="graficas" id="grafica6"></div>
    <h1>total cirugias</h1>
    <div class="graficas" id="grafica7"></div>
    <h1>Suspenciones</h1>
    <div class="graficas" id="grafica8"></div>


    <footer>
        Hospital Regional de Alta Especialidad de Ixtapaluca
        <p style="font-size: 10px">
            Dirección de Operaciones - Subdirección de Tecnologías de la Información 
            <br> Gestión Digital en Salud - 2023
        </p> 
    </footer>

</body>
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<?php
    include('includes/grafica1.php');
    include('includes/grafica2.php');
    include('includes/grafica3.php');
    include('includes/grafica4.php');
    include('includes/grafica5.php');
    include('includes/grafica6.php');
    include('includes/grafica7.php');
    include('includes/grafica8.php');
?>
</html>