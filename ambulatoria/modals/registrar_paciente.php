<!-- Modal -->
<div class="modal fade" id="RegistrarPacienteAmbulatoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Registro Pacientes</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
        <form id="ambulatoria_form" autocomplete="off">

            <div style="background-color: rgb(70, 130, 180,0.5);
                        color: aliceblue;
                        text-align: center;
                        margin-top: 20px;">
                        <h6>Datos de la cirugia</h6> 
            </div>

            <div class="row">

                <div class="col-md-4" for="medico">
                    <strong style="font-size: 14px;">Médico</strong>
                    <select name="medico" id="medico" class="form-control" style="font-size: 14px;">
                        <option value="">Seleccione...</option>
                        <option value="Adair Buendia Martinez">Adair Buendia Martinez</option>
                        <option value="Alba Hortencia Sandoval Sanchez">Alba Hortencia Sandoval Sanchez</option>
                        <option value="Alejandra Isabel Ortiz Zuñiga">Alejandra Isabel Ortiz Zuñiga</option>
                        <option value="Alin Villalobos Castillejos">Alin Villalobos Castillejos</option>
                        <option value="Ana Lilia Cruz Arroyo">Ana Lilia Cruz Arroyo</option>
                        <option value="Angelica Julian Castrejon">Angelica Julian Castrejon</option>
                        <option value="Carlos Eduardo Antonio Romero">Carlos Eduardo Antonio Romero</option>
                        <option value="Cecilia Henriquez Avalos">Cecilia Henriquez Avalos</option>
                        <option value="Cristina Grado Limas">Cristina Grado Limas</option>
                        <option value="Daniel Nazario Cruz">Daniel Nazario Cruz</option>
                        <option value="Diana Rivero Mendez">Diana Rivero Mendez</option>
                        <option value="Ernesto Amador Romero Rivera">Ernesto Amador Romero Rivera</option>
                        <option value="Leopoldo Enrique Gatica Galina">Leopoldo Enrique Gatica Galina</option>
                        <option value="Gerardo Garza Sainz">Gerardo Garza Sainz</option>
                        <option value="Janet Miriam Galicia Del Castillo">Janet Miriam Galicia Del Castillo</option>
                        <option value="Jazmín Rodríguez Tapia ">Jazmín Rodríguez Tapia </option>
                        <option value="Jocelyn  Gonzalez Falcón">Jocelyn González Falcón</option>
                        <option value="Juan Antonio Maldonado Moreno">Juan Antonio Maldonado Moreno</option>
                        <option value="Juan Luis Angeles Montoya">Juan Luis Angeles Montoya</option>
                        <option value="Luis Antonio Ortiz Morales">Luis Antonio Ortiz Morales</option>
                        <option value="Luis Licona Vite">Luis Licona Vite</option>
                        <option value="Luis Trujillo Ortiz">Luis Trujillo Ortiz</option>
                        <option value="Marisol Cuan Contreras">Marisol Cuan Contreras</option>
                        <option value="Misael Silva Gonzalez">Misael Silva González</option>
                        <option value="Mónica Mier Cabrera">Mónica Mier Cabrera</option>
                        <option value="Roberto Albavera Gutierrez">Roberto Albavera Gutiérrez</option>
                        <option value="Roberto Patricio Lopez Maguey">Roberto Patricio López Maguey</option>
                        <option value="Rodrigo Perez Becerra">Rodrigo Pérez Becerra</option>
                        <option value="Sebastian Rueda Mujica">Sebastian Rueda Mujica</option>
                        <option value="Tania Villagra Sanjurjo">Tania Villagra Sanjurjo</option>
                        <option value="Teresa Margarita Cacares Bran">Teresa Margarita Cacares Bran</option>
                        <option value="Victor Osornio Sanchez">Víctor Osornio Sanchez</option>
                        <option value="Xochitl Ramirez Magaña">Xóchitl Ramirez Magaña</option>
                    </select>
                </div>

                <!--Input para ingresar el nombre de la cirugía-->
                <div class="col-md-4" id="cirugia" for="cirugia">
                        <strong style="font-size: 14px;">Cirugía</strong>
                        <input type="text" id="cirugia" name="cirugia" class="form-control" placeholder="Ingrese cirugía..." style="font-size: 14px;" required>
                </div>

                <div class="col-md-4" for="sala">
                    <strong style="font-size: 14px;">Sala</strong>
                    <select name="sala" id="sala" class="form-control" style="font-size: 14px;">
                        <option value="">Seleccione...</option>
                        <option value="Sala 1">Sala 1</option>
                        <option value="Sala 2">Sala 2</option>
                        <option value="Sala 3">Sala 3</option>
                        <option value="Endosuite">Endosuite</option>
                    </select>
                </div>

                <!--Catálogo de Dx-->
                <div class="col-md-4" id="diagnostico" for="diagnostico">
                    <strong style="font-size: 14px;"> Diagnóstico</strong>
                    <select name="diagnostico" id="diagnostico" class="form-control" style="font-size: 14px;" required>
                        <option value=""> </option>
                        <?php
                            if ($dataCatalogo->num_rows > 0) {
                                while ($row = $dataCatalogo->fetch_assoc()) {
                                echo "<option value='" . $row["id_procedimiento"] . "'>" . $row["nombre"] . "</option>";
                            }
                            }else {
                                echo "<option value=''>No hay datos disponibles</option>";
                            }
                        ?>
                    </select>
                </div>


                <div class="col-md-4" for="fecha">
                    <strong style="font-size: 14px;">Fecha solicitud de cirugía</strong>
                    <input type="date" id="fecha_solicitud" name="fecha_solicitud" class="form-control" style="font-size: 14px;" required>
                </div>

                <div class="col-md-4" for="fecha">
                    <strong style="font-size: 14px;">Fecha programación cirugía</strong>
                    <input type="date" id="fecha_programada" name="fecha_programada" class="form-control" style="font-size: 14px;" required>
                </div>

                <div class="col-md-4" for="fecha">
                    <strong style="font-size: 14px;">Fecha realización de cirugía</strong>
                    <input type="date" id="fecha_realizada" name="fecha_realizada" class="form-control" style="font-size: 14px;" required>
                </div>

                <!-- datos de ingreso-egreso -->
                <div class="col-md-4" for="programado">
                    <strong style="font-size: 14px;">Hora Programada de Cirugía</strong>
                    <input type="time" name="programado" id="programado" class="form-control" style="font-size: 14px;" required >
                </div>

                <div class="col-md-4" for="ingreso">
                    <strong style="font-size: 14px;">Hora Ingreso a Sala</strong>
                    <input type="time" name="ingreso" id="ingreso" class="form-control" style="font-size: 14px;" required>
                </div>

                <div class="col-md-4" for="anestesia">
                    <strong style="font-size: 14px;">Hora Anestesia</strong>
                    <input type="time" name="anestesia" id="anestesia" class="form-control" style="font-size: 14px;" required>
                </div>

                <div class="col-md-4" for="inicio">
                    <strong style="font-size: 14px;">Hora Inicio Cirugía</strong>
                    <input type="time" name="inicio" id="inicio" class="form-control" style="font-size: 14px;" required>
                </div>

                <div class="col-md-4" for="fin">
                    <strong style="font-size: 14px;">Hora Fin Cirugía</strong>
                    <input type="time" name="fin" id="fin" class="form-control" style="font-size: 14px;" required>
                </div>

                <div class="col-md-4" for="egreso">
                    <strong style="font-size: 14px;">Hora Egreso Sala</strong>
                    <input type="time" name="egreso" id="egreso" class="form-control" style="font-size: 14px;" required>
                </div>

                <div class="col-md-4" for="suspendida">
                    <strong style="font-size: 14px;">¿Cirugía Suspendida?</strong>
                    <select name="suspendida" id="suspendida" class="form-control" style="font-size: 14px;" onchange="mostrarCampos(this)">
                    <option value="">Seleccione...</option>
                    <option value="Si">Sí</option>
                    <option value="No">No</option>
                    </select>
                </div>

                <!-- si se selecciona que la cirugía sí ha sido suspendida -->
                <div class="col-md-4" id="divMedico" style="display: none;">
                    <strong style="font-size: 14px;">Médico</strong>
                    <input type="text" name="S_medico" id="S_medico" class="form-control" style="font-size: 14px;">
                </div>
                
                <div class="col-md-4" id="divMotivo" style="display: none;">
                    <strong style="font-size: 14px;">Motivo</strong>
                    <input type="text" name="motivo" id="motivo" class="form-control" style="font-size: 14px;">
                </div>

            </div> <!-- <div class="row">-->

        <!-- cálculo de tiempos-->
            <div style="background-color: rgb(70, 130, 180,0.5);
                        color: aliceblue;
                        text-align: center;
                        margin-top: 20px;">
                        <h6>Tiempo</h6> 
            </div>

             <!-- Calculo de los tiempos -->

                


            <div class="row">

                <div class="col-md-4" for="pro_ingreso">
                    <strong style="font-size: 14px;">Programada - Ingreso Sala</strong>
                    <input type="text" name="pro_ingreso" id="pro_ingreso" class="form-control" style="font-size: 14px;" readonly>
                </div>

                <div class="col-md-4" for="pro_inicio">
                    <strong style="font-size: 14px;">Programada - Inicio Cirugía</strong>
                    <input type="text" name="pro_inicio" id="pro_inicio" class="form-control" style="font-size: 14px;" readonly>
                </div>

                <div class="col-md-4" for="ingreso_egreso">
                    <strong style="font-size: 14px;">Ingreso - Egreso Sala</strong>
                    <input type="text" name="ingreso_egreso" id="ingreso_egreso" class="form-control" style="font-size: 14px;" readonly>
                </div>

                <div class="col-md-4" for="ingreso_anestesia">
                    <strong style="font-size: 14px;">Ingreso - Inicio Anestesia</strong>
                    <input type="text" name="ingreso_anestesia" id="ingreso_anestesia" class="form-control" style="font-size: 14px;" readonly>
                </div>

                <div class="col-md-4" for="ingreso_inicio">
                    <strong style="font-size: 14px;">Ingreso Sala - Inicio Cirugía</strong>
                    <input type="text" name="ingreso_inicio" id="ingreso_inicio" class="form-control" style="font-size: 14px;" readonly>
                </div>

                <div class="col-md-4" for="inicio_fin">
                    <strong style="font-size: 14px;">Ingreso Inicio - Fin Cirugía</strong>
                    <input type="text" name="inicio_fin" id="inicio_fin" class="form-control" style="font-size: 14px;" readonly>
                </div>

            </div>


      </div> <!-- modal body-->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success">Guardar</button>
      </div>
    </div>
  </div>
</div>