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

    <div class="graficas" id="chartdiv"></div>
    <div class="graficas" id="example"></div>

    
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
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<?php
    include('includes/graficas.php');
    include('includes/ejemplo2.php');    
    
?>

</html>