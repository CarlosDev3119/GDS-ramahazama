<?php
    include('php/diagnosticos.php');
    include('php/edit.php');
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
    <title>Editar Paciente</title>
</head>
<body>
    <header>
        <a href="https://hraei.gob.mx/" target="_blank">HRAEI</a>
        <p style="color:#DDC9A3; margin-top: 15px;">Editar Registro</p>
        <br>
    </header>
<br>
<form id="edit_form">
    <div class="container"  width="100%" height="800px" style="margin-bottom: 100px;">
        <div class="row">
            <div class="col col-2">
                <!--botones-->
                <a href="index.php">
                    <button type="button" class="btn btn-warning">Volver</button>
                </a>
                
            </div> <!-- se cierra div <div class="col col-2">-->
        
            <div class="col col-10">
            <div style="background-color: rgb(70, 130, 180,0.5);
                        color: aliceblue;
                        text-align: center;
                        margin-top: 20px;">
                        <h6>Datos de la cirugia</h6> 
            </div>
            <input type="hidden" id="id_cirugia" name="id_cirugia" value="<?php echo $id_cirugia; ?>">
            <div class="row">

                <div class="col-md-4" for="medico">
                    <strong style="font-size: 14px;">Médico</strong>
                    <select name="medico" id="medico" class="form-control" style="font-size: 14px;">
                        <option value="">Seleccione...</option>
                        <option value="Adair Buendia Martinez"<?php if ($medico == 'Adair Buendia Martinez') echo 'selected'; ?>>Adair Buendia Martinez</option>
                        <option value="Alba Hortencia Sandoval Sanchez"<?php if ($medico == 'Alba Hortencia Sandoval Sanchez') echo 'selected'; ?>>Alba Hortencia Sandoval Sanchez</option>
                        <option value="Alejandra Isabel Ortiz Zuñiga"<?php if ($medico == 'Alejandra Isabel Ortiz Zuñiga') echo 'selected'; ?>>Alejandra Isabel Ortiz Zuñiga</option>
                        <option value="Alin Villalobos Castillejos"<?php if ($medico == 'Alin Villalobos Castillejos') echo 'selected'; ?>>Alin Villalobos Castillejos</option>
                        <option value="Ana Lilia Cruz Arroyo"<?php if ($medico == 'Ana Lilia Cruz Arroyo') echo 'selected'; ?>>Ana Lilia Cruz Arroyo</option>
                        <option value="Angelica Julian Castrejon"<?php if ($medico == 'Angelica Julian Castrejon') echo 'selected'; ?>>Angelica Julian Castrejon</option>
                        <option value="Carlos Eduardo Antonio Romero"<?php if ($medico == 'Carlos Eduardo Antonio Romero') echo 'selected'; ?>>Carlos Eduardo Antonio Romero</option>
                        <option value="Cecilia Henriquez Avalos"<?php if ($medico == 'Cecilia Henriquez Avalos') echo 'selected'; ?>>Cecilia Henriquez Avalos</option>
                        <option value="Cristina Grado Limas"<?php if ($medico == 'Cristina Grado Limas') echo 'selected'; ?>>Cristina Grado Limas</option>
                        <option value="Daniel Nazario Cruz"<?php if ($medico == 'Daniel Nazario Cruz') echo 'selected'; ?>>Daniel Nazario Cruz</option>
                        <option value="Diana Rivero Mendez"<?php if ($medico == 'Diana Rivero Mendez') echo 'selected'; ?>>Diana Rivero Mendez</option>
                        <option value="Ernesto Amador Romero Rivera"<?php if ($medico == 'Ernesto Amador Romero Rivera') echo 'selected'; ?>>Ernesto Amador Romero Rivera</option>
                        <option value="Leopoldo Enrique Gatica Galina"<?php if ($medico == 'Leopoldo Enrique Gatica Galina') echo 'selected'; ?>>Leopoldo Enrique Gatica Galina</option>
                        <option value="Gerardo Garza Sainz"<?php if ($medico == 'Gerardo Garza Sainz') echo 'selected'; ?>>Gerardo Garza Sainz</option>
                        <option value="Janet Miriam Galicia Del Castillo"<?php if ($medico == 'Janet Miriam Galicia Del Castillo') echo 'selected'; ?>>Janet Miriam Galicia Del Castillo</option>
                        <option value="Jazmín Rodríguez Tapia <?php if ($medico == 'Jazmín Rodríguez Tapia') echo 'selected'; ?>">Jazmín Rodríguez Tapia </option>
                        <option value="Jocelyn  Gonzalez Falcón"<?php if ($medico == 'Jocelyn  Gonzalez Falcón') echo 'selected'; ?>>Jocelyn González Falcón</option>
                        <option value="Juan Antonio Maldonado Moreno"<?php if ($medico == 'Juan Antonio Maldonado Moreno') echo 'selected'; ?>>Juan Antonio Maldonado Moreno</option>
                        <option value="Juan Luis Angeles Montoya"<?php if ($medico == 'Juan Luis Angeles Montoya') echo 'selected'; ?>>Juan Luis Angeles Montoya</option>
                        <option value="Luis Antonio Ortiz Morales"<?php if ($medico == 'Luis Antonio Ortiz Morales') echo 'selected'; ?>>Luis Antonio Ortiz Morales</option>
                        <option value="Luis Licona Vite"<?php if ($medico == 'Luis Licona Vite') echo 'selected'; ?>>Luis Licona Vite</option>
                        <option value="Luis Trujillo Ortiz"<?php if ($medico == 'Luis Trujillo Ortiz') echo 'selected'; ?>>Luis Trujillo Ortiz</option>
                        <option value="Marisol Cuan Contreras"<?php if ($medico == 'Marisol Cuan Contreras') echo 'selected'; ?>>Marisol Cuan Contreras</option>
                        <option value="Misael Silva Gonzalez"<?php if ($medico == 'Misael Silva Gonzalez') echo 'selected'; ?>>Misael Silva González</option>
                        <option value="Mónica Mier Cabrera"<?php if ($medico == 'Mónica Mier Cabrera') echo 'selected'; ?>>Mónica Mier Cabrera</option>
                        <option value="Roberto Albavera Gutierrez"<?php if ($medico == 'Roberto Albavera Gutierrez') echo 'selected'; ?>>Roberto Albavera Gutiérrez</option>
                        <option value="Roberto Patricio Lopez M<?php if ($medico == 'Roberto Patricio Lopez ') echo 'selected'; ?>aguey">Roberto Patricio López Maguey</option>
                        <option value="Rodrigo Perez Becerra"<?php if ($medico == 'Rodrigo Perez Becerra') echo 'selected'; ?>>Rodrigo Pérez Becerra</option>
                        <option value="Sebastian Rueda Mujica"<?php if ($medico == 'Sebastian Rueda Mujica') echo 'selected'; ?>>Sebastian Rueda Mujica</option>
                        <option value="Tania Villagra Sanjurjo"<?php if ($medico == 'Tania Villagra Sanjurjo') echo 'selected'; ?>>Tania Villagra Sanjurjo</option>
                        <option value="Teresa Margarita Cacares Bran"<?php if ($medico == 'Teresa Margarita Cacares Bran') echo 'selected'; ?>>Teresa Margarita Cacares Bran</option>
                        <option value="Victor Osornio Sanchez"<?php if ($medico == 'Victor Osornio Sanchez') echo 'selected'; ?>>Víctor Osornio Sanchez</option>
                        <option value="Xochitl Ramirez Magaña"<?php if ($medico == 'Xochitl Ramirez Magaña') echo 'selected'; ?>>Xóchitl Ramirez Magaña</option>
                    </select>
                </div>

                <div class="col-md-4" id="cirugia" for="cirugia">
                        <strong style="font-size: 14px;">Cirugía</strong>
                        <input type="text" id="cirugia" name="cirugia" class="form-control" placeholder="Ingrese cirugía..." style="font-size: 14px;" value="<?php echo $cirugia; ?>"required>
                </div>

                <div class="col-md-4" for="sala">
                    <strong style="font-size: 14px;">Sala</strong>
                    <select name="sala" id="sala" class="form-control" style="font-size: 14px;">
                        <option value=""<?php if ($sala == '') echo 'selected'; ?>>Seleccione...</option>
                        <option value="Sala 1"<?php if ($sala == 'Sala 1') echo 'selected'; ?>>Sala 1</option>
                        <option value="Sala 2"<?php if ($sala == 'Sala 2') echo 'selected'; ?>>Sala 2</option>
                        <option value="Sala 3"<?php if ($sala == 'Sala 3') echo 'selected'; ?>>Sala 3</option>
                        <option value="Endosuite"<?php if ($sala == 'Endosuit') echo 'selected'; ?>>Endosuite</option>
                    </select>
                </div>

                <div class="col-md-4" id="diagnostico" for="diagnostico">
                    <strong style="font-size: 14px;">Diagnóstico</strong>
                    <select name="diagnostico" id="diagnostico" class="form-control" style="font-size: 14px;" required>
                        <option value=""> </option>
                        <?php
                        if ($dataCatalogo->num_rows > 0) {
                            while ($row = $dataCatalogo->fetch_assoc()) {
                                $selected = ($row["nombre"] == $diagnostico) ? 'selected' : '';
                                echo "<option value='" . $row["id_procedimiento"] . "' $selected>" . $row["nombre"] . "</option>";
                            }
                        } else {
                            echo "<option value=''>No hay datos disponibles</option>";
                        }
                        ?>
                    </select>
                </div>



                <div class="col-md-4" for="fecha">
                    <strong style="font-size: 14px;">Fecha solicitud de cirugía</strong>
                    <input type="date" id="fecha_solicitud" name="fecha_solicitud" class="form-control" style="font-size: 14px;" value="<?php echo $fecha_solicitud; ?>" required>
                </div>

                <div class="col-md-4" for="fecha">
                    <strong style="font-size: 14px;">Fecha programación cirugía</strong>
                    <input type="date" id="fecha_programada" name="fecha_programada" class="form-control" style="font-size: 14px;" value="<?php echo $fecha_programada; ?>" required>
                </div>

                <div class="col-md-4" for="fecha">
                    <strong style="font-size: 14px;">Fecha realización de cirugía</strong>
                    <input type="date" id="fecha_realizada" name="fecha_realizada" class="form-control" style="font-size: 14px;" value="<?php echo $fecha_realizada; ?>" required>
                </div>

                <!-- datos de ingreso-egreso -->
                <div class="col-md-4" for="programado">
                    <strong style="font-size: 14px;">Hora Programada de Cirugía</strong>
                    <input type="time" name="programado" id="programado" class="form-control" style="font-size: 14px;" value="<?php echo $programada; ?>" required >
                </div>

                <div class="col-md-4" for="ingreso">
                    <strong style="font-size: 14px;">Hora Ingreso a Sala</strong>
                    <input type="time" name="ingreso" id="ingreso" class="form-control" style="font-size: 14px;" value="<?php echo $ingreso; ?>" required>
                </div>

                <div class="col-md-4" for="anestesia">
                    <strong style="font-size: 14px;">Hora Anestesia</strong>
                    <input type="time" name="anestesia" id="anestesia" class="form-control" style="font-size: 14px;" value="<?php echo $anestesia; ?>" required>
                </div>

                <div class="col-md-4" for="inicio">
                    <strong style="font-size: 14px;">Hora Inicio Cirugía</strong>
                    <input type="time" name="inicio" id="inicio" class="form-control" style="font-size: 14px;" value="<?php echo $inicio; ?>" required>
                </div>

                <div class="col-md-4" for="fin">
                    <strong style="font-size: 14px;">Hora Fin Cirugía</strong>
                    <input type="time" name="fin" id="fin" class="form-control" style="font-size: 14px;" value="<?php echo $fin; ?>" required>
                </div>

                <div class="col-md-4" for="egreso">
                    <strong style="font-size: 14px;">Hora Egreso Sala</strong>
                    <input type="time" name="egreso" id="egreso" class="form-control" style="font-size: 14px;" value="<?php echo $egreso; ?>" required>
                </div>

                <div class="col-md-4" for="suspendida">
                    <strong style="font-size: 14px;">¿Cirugía Suspendida?</strong>
                    <select name="suspendida" id="suspendida" class="form-control" style="font-size: 14px;">
                    <option value=""<?php if ($suspencion == '') echo 'selected'; ?>>Seleccione...</option>
                    <option value="Si"<?php if ($suspencion == 'Si') echo 'selected'; ?>>Sí</option>
                    <option value="No"<?php if ($suspencion == 'No') echo 'selected'; ?>>No</option>
                    </select>
                </div>

                <!-- si se selecciona que la cirugía sí ha sido suspendida -->
                <div class="col-md-4" id="divMedico">
                    <strong style="font-size: 14px;">Médico</strong>
                    <input type="text" name="S_medico" id="S_medico" class="form-control" style="font-size: 14px;"value="<?php echo $S_medico; ?>">
                </div>
                
                <div class="col-md-4" id="divMotivo">
                    <strong style="font-size: 14px;">Motivo</strong>
                    <input type="text" name="motivo" id="motivo" class="form-control" style="font-size: 14px;"value="<?php echo $motivo; ?>">
                </div>
<!-- ***********************************ATENCIÓN MÉDICA*********************************** -->

<div class="col-md-12">
                    <div class="form-header">
                        <h5 class="form-title"
                        style="text-align: center;
                        background-color: rgb(70, 130, 180,0.5);
                        color: aliceblue;
                        margin-top:5px;
                        font-size: 13px;">
                        Tiempo</h5>
                    </div>
                </div>



                <div class="row">

                    <div class="col-md-4" for="pro_ingreso">
                        <strong style="font-size: 14px;">Programada - Ingreso Sala</strong>
                        <input type="text" name="pro_ingreso" id="pro_ingreso" class="form-control" style="font-size: 14px;"value="<?php echo $pro_ingreso; ?>" readonly>
                    </div>

                    <div class="col-md-4" for="pro_inicio">
                        <strong style="font-size: 14px;">Programada - Inicio Cirugía</strong>
                        <input type="text" name="pro_inicio" id="pro_inicio" class="form-control" style="font-size: 14px;"value="<?php echo $pro_inicio; ?>" readonly>
                    </div>

                    <div class="col-md-4" for="ingreso_egreso">
                        <strong style="font-size: 14px;">Ingreso - Egreso Sala</strong>
                        <input type="text" name="ingreso_egreso" id="ingreso_egreso" class="form-control" style="font-size: 14px;"value="<?php echo $ingreso_egreso; ?>" readonly>
                    </div>

                    <div class="col-md-4" for="ingreso_anestesia">
                        <strong style="font-size: 14px;">Ingreso - Inicio Anestesia</strong>
                        <input type="text" name="ingreso_anestesia" id="ingreso_anestesia" class="form-control" style="font-size: 14px;"value="<?php echo $ingreso_anestesia; ?>" readonly>
                    </div>

                    <div class="col-md-4" for="ingreso_inicio">
                        <strong style="font-size: 14px;">Ingreso Sala - Inicio Cirugía</strong>
                        <input type="text" name="ingreso_inicio" id="ingreso_inicio" class="form-control" style="font-size: 14px;"value="<?php echo $ingreso_inicio; ?>" readonly>
                    </div>

                    <div class="col-md-4" for="inicio_fin">
                        <strong style="font-size: 14px;">Ingreso Inicio - Fin Cirugía</strong>
                        <input type="text" name="inicio_fin" id="inicio_fin" class="form-control" style="font-size: 14px;"value="<?php echo $inicio_fin; ?>" readonly>
                    </div>

                </div>


            </div>
<br>

        <div class="container" style="text-align: right;">
            <button type="submit" class="btn btn-success">Guardar Cambios</button>
        </div>

        </div>
        </div>
       



            </div> <!-- se cierra div de <div class="col col-10">-->
        </div> <!-- se cierra <div class="row">-->
    </div> <!-- se cierra div de <div class="container"  width="100%" height="800px" style="margin-bottom: 100px;">-->
</form>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/calculohoras.js"></script>
<script src="js/update.js"></script>
<!-- se agrega el footer-->
    <footer>Hospital Regional de Alta Especialidad de Ixtapaluca<p style="font-size: 10px">
            Dirección de Operaciones - Subdirección de Tecnologías de la Información 
            <br> Gestión Digital en Salud - 2023</p> 
    </footer>
</body>
</html>