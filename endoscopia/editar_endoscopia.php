<?php
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
    <title>Editar - Endoscopia</title>
</head>
<body>

    <header>
        <a href="https://hraei.gob.mx/" target="_blank">HRAEI</a>
        <p style="color:#DDC9A3; margin-top: 15px;">Editar Paciente</p>
        <br>
    </header>
    <br><br>

    <form id="edit_endoscopia">
        <div class="container"  width="100%" height="800px" style="margin-bottom: 100px;">
            <div class="row">
                <div class="col col-2">
                    <!--botones-->
                    <a href="index.php">
                        <button type="button" class="btn btn-warning">Volver</button>
                    </a>
                </div> <!-- se cierra div <div class="col col-2">-->

                <div class="col col-10">
                <div style="background-color: rgb(0, 139, 139,0.7);
                        color: aliceblue;
                        text-align: center;
                        margin-top: 20px;">
                <h6>Procedimientos Endoscopicos</h6> 
            </div> 
            <input type="hidden" id="id_paciente" name="id_paciente" value="<?php echo $id_paciente; ?>">

            <div class="row">
                <div class="col-md-3">
                    <strong style="font-size:14px;">Fecha</strong>
                    <input type="date" id="fecha_registro" name="fecha_registro" class="form-control" value="<?php echo $fecha_registro; ?>" style="font-size:14px;" readonly>
                </div>

                <div class="col-md-3" id="idcurp">
                    <strong style="font-size:14px;">CURP</strong>
                    <input type="text" class="form-control" id="curp" name="curp" placeholder="CURP" value="<?php echo $curp; ?>" style="font-size:14px;">
                </div>

                <div class="col-md-3" id="idnombre_paciente">
                    <strong style="font-size:14px;">Nombre Completo</strong>
                    <input id="nombre_paciente" name="nombre_paciente" type="text" class="control form-control" style="font-size:14px;" required value="<?php echo $nombre_paciente; ?>">
                </div>

                <div class="col-md-3">
                    <strong style="font-size:14px;">Fecha de Nacimiento</strong>
                    <input id="fecha" name="fecha" type="date"  onblur="curp2date();" class="control form-control" style="font-size:14px;" readonly value="<?php echo $fecha; ?>">
                </div>

                <div class="col-md-3">
                    <strong style="font-size:14px;">Edad</strong>
                    <input id="edad" name="edad" type="text" class="control form-control" style="font-size:14px;" readonly value="<?php echo $edad; ?>">
                </div>

                <div class="col-md-3">
                    <strong style="font-size:14px;">Sexo</strong>
                    <input type="text" class="control form-control" id="sexo" onclick="curp2date();" name="sexo" style="font-size:14px;" readonly value="<?php echo $sexo; ?>">
                </div>
            </div> <!-- div row-->

<!-- ***********************************ATENCIÓN MÉDICA*********************************** -->

            <div class="col-md-12">
                <div class="form-header">
                    <h5 class="form-title"
                        style="text-align: center;
                        background-color: rgb(0, 139, 139, 0.7);
                        color: aliceblue;
                        margin-top:5px;
                        font-size: 14px;">
                        Datos de hospitalización</h5>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <strong style="font-size:14px;">Diagnóstico</strong>
                    <select name="diagnostico" id="diagnostico" class="form-control" style="font-size:14px;">
                        <option value="0">Seleccione...</option>
                        <option value="Angioectasia Vascular"<?php if ($diagnostico == 'Angioectasia Vascular') echo 'selected'; ?>>Angioectasia Vascular</option>
                        <option value="Bulbo Duodenitis"<?php if ($diagnostico == 'Bulbo Duodenitis') echo 'selected'; ?>>Bulbo Duodenitis</option>
                        <option value="Candidiasis Esofágica"<?php if ($diagnostico == 'Candidiasis Esofágica') echo 'selected'; ?>>Candidiasis Esofágica</option>
                        <option value="Chron"<?php if ($diagnostico == 'Chron') echo 'selected'; ?>>Chron</option>
                        <option value="Colitis Inespecífica"<?php if ($diagnostico == 'Colitis Inespecífica') echo 'selected'; ?>>Colitis Inespecífica</option>
                        <option value="Desgarro Union  Esófago Gástrica"<?php if ($diagnostico == 'Desgarro Union  Esófago Gástrica') echo 'selected'; ?>>Desgarro Unión  Esófago Gástrica</option>
                        <option value="Diverticulosos Colonica"<?php if ($diagnostico == 'Diverticulosos Colonica') echo 'selected'; ?>>Diverticulosos Colonica</option>
                        <option value="Esofagitis"<?php if ($diagnostico == 'Esofagitis') echo 'selected'; ?>>Esofagitis</option>
                        <option value="Esófago De Barrett"<?php if ($diagnostico == 'Esófago De Barrett') echo 'selected'; ?>>Esófago De Barrett</option>
                        <option value="Estómago Retencionista No Obstructivo"<?php if ($diagnostico == 'Estómago Retencionista No Obstructivo') echo 'selected'; ?>>Estómago Retencionista No Obstructivo</option>
                        <option value="Fístula Colo Vaginal"<?php if ($diagnostico == 'Fístula Colo Vaginal') echo 'selected'; ?>>Fístula Coló Vaginal</option>
                        <option value="Fístula Colo Vesical"<?php if ($diagnostico == 'Fístula Colo Vesical') echo 'selected'; ?>>Fístula Coló Vesical</option>
                        <option value="Gastritis Alcalina"<?php if ($diagnostico == 'Gastritis Alcalina') echo 'selected'; ?>>Gastritis Alcalina</option>
                        <option value="Gastritis Cronica Erosiva"<?php if ($diagnostico == 'Gastritis Cronica Erosiva') echo 'selected'; ?>>Gastritis Cronica Erosiva</option>
                        <option value="Gastritis Folicular"<?php if ($diagnostico == 'Gastritis Folicular') echo 'selected'; ?>>Gastritis Folicular</option>
                        <option value="Hernia Hiatal"<?php if ($diagnostico == 'Hernia Hiatal') echo 'selected'; ?>>Hernia Hiatal</option>
                        <option value="Ileitis"<?php if ($diagnostico == 'Ileitis') echo 'selected'; ?>>Ileitis</option>
                        <option value="Metaplasia Intestinal"<?php if ($diagnostico == 'Metaplasia Intestinal') echo 'selected'; ?>>Metaplasia Intestinal</option>
                        <option value="Polipo Colonico"<?php if ($diagnostico == 'Polipo Colonico') echo 'selected'; ?>>Pólipo Colonico</option>
                        <option value="Polipo Gastrico"<?php if ($diagnostico == 'Polipo Gastrico') echo 'selected'; ?>>Pólipo Gástrico</option>
                        <option value="Porctitis Post Radiacion"<?php if ($diagnostico == 'Porctitis Post Radiacion') echo 'selected'; ?>>Porctitis Post Radiación</option>
                        <option value="Reflujo Duodeno Gastrico"<?php if ($diagnostico == 'Reflujo Duodeno Gastrico') echo 'selected'; ?>>Reflujo Duodeno Gástrico</option>
                        <option value="Transtorno Motor Esofagico"<?php if ($diagnostico == 'Transtorno Motor Esofagico') echo 'selected'; ?>>Transtorno Motor Esofagico</option>
                        <option value="Tumor De Colon"<?php if ($diagnostico == 'Tumor De Colon') echo 'selected'; ?>>Tumor De Colon</option>
                        <option value="Tumor De Estomago"<?php if ($diagnostico == 'Tumor De Estomago') echo 'selected'; ?>>Tumor De Estómago</option>
                        <option value="Tumor Esofagico"<?php if ($diagnostico == 'Tumor Esofagico') echo 'selected'; ?>>Tumor Esofágico</option>
                        <option value="Ulcera Duodenal"<?php if ($diagnostico == 'Ulcera Duodenal') echo 'selected'; ?>>Úlcera Duodenal</option>
                        <option value="Ulcera Gastrica"<?php if ($diagnostico == 'Ulcera Gastrica') echo 'selected'; ?>>Úlcera Gastrica</option>
                        <option value="Varices Esofagicas"<?php if ($diagnostico == 'Varices Esofagicas') echo 'selected'; ?>>Varices Esofagicas</option>
                        <option value="Varices Gastricas"<?php if ($diagnostico == 'Varices Gastricas') echo 'selected'; ?>>Varices Gastricas</option>     
                    </select>
                </div>

                <div class="col-md-4">
                    <strong style="font-size:14px;">Cama</strong>
                    <input type="number" name="cama" id="cama" class="form-control" style="font-size:14px;" value="<?php echo $cama; ?>">
                </div>

                <div class="col-md-4">
                    <strong style="font-size:14px;">Días de EIH</strong>
                    <input type="number" name="dias_eih" id="dias_eih" class="form-control" style="font-size:14px;" value="<?php echo $dias_eih; ?>">
                </div>
            </div> <!-- div row-->

<!-- ***********************************LABORATORIOS*********************************** -->

            <div class="col-md-12">
                <div class="form-header">
                    <h5 class="form-title"
                        style="text-align: center;
                        background-color: rgb(0, 139, 139, 0.7);
                        color: aliceblue;
                        margin-top:5px;
                        font-size: 14px;">
                        Laboratorios</h5>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <strong style="font-size:14px;">HB</strong>
                    <input type="number" name="hb" id="hb" class="form-control" style="font-size:14px;" value="<?php echo $hb; ?>">
                </div>

                <div class="col-md-2">
                    <strong style="font-size:14px;">HCTO</strong>
                    <input type="number" name="hcto" id="hcto" class="form-control" style="font-size:14px;" value="<?php echo $hcto; ?>">
                </div>

                <div class="col-md-2">
                    <strong style="font-size:14px;">INR</strong>
                    <input type="number" name="inr" id="inr" class="form-control" style="font-size:14px;" value="<?php echo $inr; ?>">
                </div>

                <div class="col-md-3">
                    <strong style="font-size:14px;" >Plaquetas</strong>
                    <input type="number" name="plaquetas" id="plaquetas" class="form-control" style="font-size:14px;" value="<?php echo $plaquetas; ?>">
                </div>

                <div class="col-md-3">
                    <strong style="font-size:14px;">Cultivo</strong>
                    <select name="cultivo" id="cultivo" class="form-control" style="font-size:14px;">
                        <option value="0"<?php if ($cultivo == '0') echo 'selected'; ?>>Selecciones</option>
                        <option value="Si"<?php if ($cultivo == 'Si') echo 'selected'; ?>>Sí</option>
                        <option value="No"<?php if ($cultivo == 'No') echo 'selected'; ?>>No</option>
                    </select>
                </div>
            </div> <!-- div row-->


<!-- **********************************ESTUDIO SOLICITADO*********************************** -->
            <div class="col-md-12">
                <div class="form-header">
                    <h5 class="form-title"
                        style="text-align: center;
                        background-color: rgb(0, 139, 139, 0.7);
                        color: aliceblue;
                        margin-top:5px;
                        font-size: 14px;">
                        Estudio Solicitado</h5>
                </div>
            </div>

            <div class="row">

            
                <div class="col-md-4">
                    <strong style="font-size:14px;">Prioridad</strong>
                    <select name="prioridad" id="prioridad" class="form-control" style="font-size:14px;">
                        <option value="0"<?php if ($prioridad == '0') echo 'selected'; ?>>Seleccione...</option>
                        <option value="Alta"<?php if ($prioridad == 'Alta') echo 'selected'; ?>>Alta</option>
                        <option value="Media"<?php if ($prioridad == 'Media') echo 'selected'; ?>>Media</option>
                        <option value="Baja"<?php if ($prioridad == 'Baja') echo 'selected'; ?>>Baja</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <strong style="font-size:14px;">Servicio</strong>
                    <select name="medico_endo" id="medico_endo" class="form-control" style="font-size:14px;">
                        <option value="0"<?php if ($medico_endo == '0') echo 'selected'; ?>>Seleccione...</option>
                        <option value="Medicina interna"<?php if ($medico_endo == 'Medicina interna') echo 'selected'; ?>>Medicina Interna</option>
                        <option value="UCIA"<?php if ($medico_endo == 'UCIA') echo 'selected'; ?>>UCIA</option>
                        <option value="UTIA"<?php if ($medico_endo == 'UTIA') echo 'selected'; ?>>UTIA</option>
                        <option value="Urgencias"<?php if ($medico_endo == 'Urgencias') echo 'selected'; ?>>Urgencias</option>
                        <option value="Cirugia General"<?php if ($medico_endo == 'Cirugia General') echo 'selected'; ?>>Cirugía General</option>
                    </select>
                </div>


                <div class="col-md-4">
                    <strong style="font-size:14px;">Estatus de Solicitud</strong>
                    <select name="estatus_solicitud" id="estatus_solicitud" class="form-control" style="font-size:14px;">
                        <option value="0"<?php if ($estatus_solicitud == '0') echo 'selected'; ?>>Seleccione...</option>
                        <option value="Programada"<?php if ($estatus_solicitud == 'Programada') echo 'selected'; ?>>Programada</option>
                        <option value="Sin programar"<?php if ($estatus_solicitud == 'Sin programar') echo 'selected'; ?>>Sin Programar</option>
                        <option value="Urgencia"<?php if ($estatus_solicitud == 'Urgencia') echo 'selected'; ?>>Urgencia</option>
                        <option value="Realizada"<?php if ($estatus_solicitud == 'Realizada') echo 'selected'; ?>>Realizada</option>
                        <option value="Pospuesta"<?php if ($estatus_solicitud == 'Pospuesta') echo 'selected'; ?>>Pospuesta</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <strong style="font-size:14px;">Fecha Programada</strong>
                    <input type="date" name="fecha_programada" id="fecha_programada" class="form-control" style="font-size:14px;" value="<?php echo $fecha_programada; ?>">
                </div>

                <!-- se agrega procedimiento realizado-->
                <div class="col-md-8">
                    <strong style="font-size:14px;">Procedimiento</strong>
                    <select name="procedimiento_realizado" id="procedimiento_realizado" class="form-control" style="font-size:14px;">
                        <option value="0"<?php if ($procedimiento == '0') echo 'selected'; ?>>Seleccione...</option>
                        <option value="Cápsula Endoscópica"<?php if ($procedimiento == 'Cápsula Endoscópica') echo 'selected'; ?>>Cápsula Endoscópica</option>
                        <option value="Colangiopancreatografia Retrograda Endoscópica "<?php if ($procedimiento == 'Colangiopancreatografia Retrograda Endoscópica') echo 'selected'; ?>>Colangiopancreatografia Retrograda Endoscópica </option>
                        <option value="Colangiopancreatografia Retrograda Endoscópíca Con  Spyglass Y Toma De Biopsias"<?php if ($procedimiento == 'Colangiopancreatografia Retrograda Endoscópíca Con  Spyglass Y Toma De Biopsias') echo 'selected'; ?>>Colangiopancreatografia Retrograda Endoscópíca Con  Spyglass Y Toma De Biopsias</option>
                        <option value="Colangiopancreatografia Retrograda Endoscópíca Con Ablación Por Radiofrecuencia En Colédoco"<?php if ($procedimiento == 'Colangiopancreatografia Retrograda Endoscópíca Con Ablación Por Radiofrecuencia En Colédoco') echo 'selected'; ?>>Colangiopancreatografia Retrograda Endoscópíca Con Ablación Por Radiofrecuencia En Colédoco</option>
                        <option value="Colangiopancreatografia Retrograda Endoscópíca Con Cepillado Biliar"<?php if ($procedimiento == 'Colangiopancreatografia Retrograda Endoscópíca Con Cepillado Biliar') echo 'selected'; ?>>Colangiopancreatografia Retrograda Endoscópíca Con Cepillado Biliar</option>
                        <option value="Colangiopancreatografia Retrograda Endoscópíca Con Colocación De Endoprótesis"<?php if ($procedimiento == 'Colangiopancreatografia Retrograda Endoscópíca Con Colocación De Endoprótesis') echo 'selected'; ?>>Colangiopancreatografia Retrograda Endoscópíca Con Colocación De Endoprótesis</option>
                        <option value="Colangiopancreatografia Retrograda Endoscópíca Con Colocacion De Prótesis Metálica Biliar"<?php if ($procedimiento == 'Colangiopancreatografia Retrograda Endoscópíca Con Colocacion De Prótesis Metálica Biliar') echo 'selected'; ?>>Colangiopancreatografia Retrograda Endoscópíca Con Colocacion De Prótesis Metálica Biliar</option>
                        <option value="Colangiopancreatografia Retrograda Endoscópíca Con Colocación De Prótesis Pancreática"<?php if ($procedimiento == 'Colangiopancreatografia Retrograda Endoscópíca Con Colocación De Prótesis Pancreática') echo 'selected'; ?>>Colangiopancreatografia Retrograda Endoscópíca Con Colocación De Prótesis Pancreática</option>
                        <option value="Colangiopancreatografia Retrograda Endoscópíca Con Dilatación De Via Biliar"<?php if ($procedimiento == 'Colangiopancreatografia Retrograda Endoscópíca Con Dilatación De Via Biliar') echo 'selected'; ?>>Colangiopancreatografia Retrograda Endoscópíca Con Dilatación De Via Biliar</option>
                        <option value="Colangiopancreatografia Retrograda Endoscópíca Con Esfinteroplastia"<?php if ($procedimiento == 'Colangiopancreatografia Retrograda Endoscópíca Con Esfinteroplastia') echo 'selected'; ?>>Colangiopancreatografia Retrograda Endoscópíca Con Esfinteroplastia</option>
                        <option value="Colangiopancreatografia Retrograda Endoscópíca Con Esfinterotomia"<?php if ($procedimiento == 'Colangiopancreatografia Retrograda Endoscópíca Con Esfinterotomia') echo 'selected'; ?>>Colangiopancreatografia Retrograda Endoscópíca Con Esfinterotomia</option>
                        <option value="Colangiopancreatografia Retrograda Endoscópíca Con Esfinterotomia Corta Y Esfinteroplastia"<?php if ($procedimiento == 'Colangiopancreatografia Retrograda Endoscópíca Con Esfinterotomia Corta Y Esfinteroplastia') echo 'selected'; ?>>Colangiopancreatografia Retrograda Endoscópíca Con Esfinterotomia Corta Y Esfinteroplastia</option>
                        <option value="Colangiopancreatografia Retrograda Endoscópíca Con Litoextracción"<?php if ($procedimiento == 'Colangiopancreatografia Retrograda Endoscópíca Con Litoextracción') echo 'selected'; ?>>Colangiopancreatografia Retrograda Endoscópíca Con Litoextracción</option>
                        <option value="Colangiopancreatografia Retrograda Endoscópíca Con Spyglass Y Litotripsia Con Autolith"<?php if ($procedimiento == 'Colangiopancreatografia Retrograda Endoscópíca Con Spyglass Y Litotripsia Con Autolith') echo 'selected'; ?>>Colangiopancreatografia Retrograda Endoscópíca Con Spyglass Y Litotripsia Con Autolith</option>
                        <option value="Colonoscopia Diagnostica"<?php if ($procedimiento == 'Colonoscopia Diagnostica') echo 'selected'; ?>>Colonoscopia Diagnostica</option>
                        <option value="Colonoscopia Diagnostica Con Toma De Biopsias"<?php if ($procedimiento == 'Colonoscopia Diagnostica Con Toma De Biopsias') echo 'selected'; ?>>Colonoscopia Diagnostica Con Toma De Biopsias</option>
                        <option value="Colonoscopia Terapeutica"<?php if ($procedimiento == 'Colonoscopia Terapeutica') echo 'selected'; ?>>Colonoscopia Terapeutica</option>
                        <option value="Colonoscopia Terapeutica Con Cierre Primario De Fístula"<?php if ($procedimiento == 'Colonoscopia Terapeutica Con Cierre Primario De Fístula') echo 'selected'; ?>>Colonoscopia Terapeutica Con Cierre Primario De Fístula</option>
                        <option value="Colonoscopia Terapeutica Con Coagulación Argón Plasma"<?php if ($procedimiento == 'Colonoscopia Terapeutica Con Coagulación Argón Plasma') echo 'selected'; ?>>Colonoscopia Terapeutica Con Coagulación Argón Plasma</option>
                        <option value="Colonoscopia Terapeutica Con Colocación De Prótesis Metálica"<?php if ($procedimiento == 'Colonoscopia Terapeutica Con Colocación De Prótesis Metálica') echo 'selected'; ?>>Colonoscopia Terapeutica Con Colocación De Prótesis Metálica</option>
                        <option value="Colonoscopia Terapeutica Con Control De Hemorragia Con Escleroterapia Con Adrenalina"<?php if ($procedimiento == 'Colonoscopia Terapeutica Con Control De Hemorragia Con Escleroterapia Con Adrenalina') echo 'selected'; ?>>Colonoscopia Terapeutica Con Control De Hemorragia Con Escleroterapia Con Adrenalina</option>
                        <option value="Colonoscopia Terapeutica Con Control De Hemorragia Con Hemoclip"<?php if ($procedimiento == 'Colonoscopia Terapeutica Con Control De Hemorragia Con Hemoclip') echo 'selected'; ?>>Colonoscopia Terapeutica Con Control De Hemorragia Con Hemoclip</option>
                        <option value="Colonoscopia Terapeutica Con Control De Hemorragia Con Ovesco"<?php if ($procedimiento == 'Colonoscopia Terapeutica Con Control De Hemorragia Con Ovesco') echo 'selected'; ?>>Colonoscopia Terapeutica Con Control De Hemorragia Con Ovesco</option>
                        <option value="Colonoscopia Terapeutica Con Dilatación Colónica"<?php if ($procedimiento == 'Colonoscopia Terapeutica Con Dilatación Colónica') echo 'selected'; ?>>Colonoscopia Terapeutica Con Dilatación Colónica</option>
                        <option value="Colonoscopia Terapeutica Con Polipectomia"<?php if ($procedimiento == 'Colonoscopia Terapeutica Con Polipectomia') echo 'selected'; ?>>Colonoscopia Terapeutica Con Polipectomia</option>
                        <option value="Enteroscopia De Doble Balón Con Toma De Biopsias"<?php if ($procedimiento == 'Enteroscopia De Doble Balón Con Toma De Biopsias') echo 'selected'; ?>>Enteroscopia De Doble Balón Con Toma De Biopsias</option>
                        <option value="Enteroscopia De Doble Balón Terapéutica Con Argón Plasma"<?php if ($procedimiento == 'Enteroscopia De Doble Balón Terapéutica Con Argón Plasma') echo 'selected'; ?>>Enteroscopia De Doble Balón Terapéutica Con Argón Plasma</option>
                        <option value="Enteroscopia De Doble Balón Terapéutica Con Polipectomia"<?php if ($procedimiento == 'Enteroscopia De Doble Balón Terapéutica Con Polipectomia') echo 'selected'; ?>>Enteroscopia De Doble Balón Terapéutica Con Polipectomia</option>
                        <option value="Gastrostomia Endsocópica Percutánea"<?php if ($procedimiento == 'Gastrostomia Endsocópica Percutánea') echo 'selected'; ?>>Gastrostomia Endsocópica Percutánea</option>
                        <option value="Panendoscopia Diagnostica"<?php if ($procedimiento == 'Panendoscopia Diagnostica') echo 'selected'; ?>>Panendoscopia Diagnóstica</option>
                        <option value="Panendoscopia Diagnostica Con Toma De Biopsias"<?php if ($procedimiento == 'Panendoscopia Diagnostica Con Toma De Biopsias') echo 'selected'; ?>>Panendoscopia Diagnóstica Con Toma De Biopsias</option>
                        <option value="Panendoscopia Terapeutica"<?php if ($procedimiento == 'Panendoscopia Terapeutica') echo 'selected'; ?>>Panendoscopia Terapeutica</option>
                        <option value="Panendoscopia Terapeutica Con Ablacion Por Radiofrecuencia"<?php if ($procedimiento == 'Panendoscopia Terapeutica Con Ablacion Por Radiofrecuencia') echo 'selected'; ?>>Panendoscopia Terapeutica Con Ablacion Por Radiofrecuencia</option>
                        <option value="Panendoscopia Terapéutica Con Cierre De Fístula Duodenal"<?php if ($procedimiento == 'Panendoscopia Terapéutica Con Cierre De Fístula Duodenal') echo 'selected'; ?>>Panendoscopia Terapéutica Con Cierre De Fístula Duodenal</option>
                        <option value="Panendoscopia Terapeutica Con Cierre Primario De Fístula Esofágica"<?php if ($procedimiento == 'Panendoscopia Terapeutica Con Cierre Primario De Fístula Esofágica') echo 'selected'; ?>>Panendoscopia Terapeutica Con Cierre Primario De Fístula Esofágica</option>
                        <option value="Panendoscopia Terapéutica Con Coagulación Argón Plasma"<?php if ($procedimiento == 'Panendoscopia Terapéutica Con Coagulación Argón Plasma') echo 'selected'; ?>>Panendoscopia Terapéutica Con Coagulación Argón Plasma</option>
                        <option value="Panendoscopia Terapeutica Con Colocacion De Prótesis Esofágica"<?php if ($procedimiento == 'Panendoscopia Terapeutica Con Colocacion De Prótesis Esofágica') echo 'selected'; ?>>Panendoscopia Terapeutica Con Colocacion De Prótesis Esofágica</option>
                        <option value="Panendoscopia Terapeutica Con Colocacion De Prótesis Pilórica"<?php if ($procedimiento == 'Panendoscopia Terapeutica Con Colocacion De Prótesis Pilórica') echo 'selected'; ?>>Panendoscopia Terapeutica Con Colocacion De Prótesis Pilórica</option>
                        <option value="Panendoscopia Terapeutica Con Colocación De Prótesis Tipo Axios"<?php if ($procedimiento == 'Panendoscopia Terapeutica Con Colocación De Prótesis Tipo Axios') echo 'selected'; ?>>Panendoscopia Terapeutica Con Colocación De Prótesis Tipo Axios</option>
                        <option value="Panendoscopia Terapéutica Con Control De Hemorragia Con Hemoclip"<?php if ($procedimiento == 'Panendoscopia Terapéutica Con Control De Hemorragia Con Hemoclip') echo 'selected'; ?>>Panendoscopia Terapéutica Con Control De Hemorragia Con Hemoclip</option>
                        <option value="Panendoscopia Terapéutica Con Control De Hemorragia Con Sistema Ovesco"<?php if ($procedimiento == 'Panendoscopia Terapéutica Con Control De Hemorragia Con Sistema Ovesco') echo 'selected'; ?>>Panendoscopia Terapéutica Con Control De Hemorragia Con Sistema Ovesco</option>
                        <option value="Panendoscopia Terapéutica Con Control De Sangrado Con Escleroterapia Con Adrenalina"<?php if ($procedimiento == 'Panendoscopia Terapéutica Con Control De Sangrado Con Escleroterapia Con Adrenalina') echo 'selected'; ?>>Panendoscopia Terapéutica Con Control De Sangrado Con Escleroterapia Con Adrenalina</option>
                        <option value="Panendoscopia Terapéutica Con Control De Sangrado Con Hemospray"<?php if ($procedimiento == 'Panendoscopia Terapéutica Con Control De Sangrado Con Hemospray') echo 'selected'; ?>>Panendoscopia Terapéutica Con Control De Sangrado Con Hemospray</option>
                        <option value="Panendoscopia Terapeutica Con Dilatación Duodenal"<?php if ($procedimiento == 'Panendoscopia Terapeutica Con Dilatación Duodenal') echo 'selected'; ?>>Panendoscopia Terapeutica Con Dilatación Duodenal</option>
                        <option value="Panendoscopia Terapeutica Con Dilatación Esofágica"<?php if ($procedimiento == 'Panendoscopia Terapeutica Con Dilatación Esofágica') echo 'selected'; ?>>Panendoscopia Terapeutica Con Dilatación Esofágica</option>
                        <option value="Panendoscopia Terapeutica Con Dilatación Pilórica"<?php if ($procedimiento == 'Panendoscopia Terapeutica Con Dilatación Pilórica') echo 'selected'; ?>>Panendoscopia Terapeutica Con Dilatación Pilórica</option>
                        <option value="Panendoscopia Terapéutica Con Escleroterapia Con Cianocrilato"<?php if ($procedimiento == 'Panendoscopia Terapéutica Con Escleroterapia Con Cianocrilato') echo 'selected'; ?>>Panendoscopia Terapéutica Con Escleroterapia Con Cianocrilato</option>
                        <option value="Panendoscopia Terapeutica Con Extracción De Cuerpo Extraño"<?php if ($procedimiento == 'Panendoscopia Terapeutica Con Extracción De Cuerpo Extraño') echo 'selected'; ?>>Panendoscopia Terapeutica Con Extracción De Cuerpo Extraño</option>
                        <option value="Panendoscopia Terapéutica Con Ligadura De Várices Esofágicas"<?php if ($procedimiento == 'Panendoscopia Terapéutica Con Ligadura De Várices Esofágicas') echo 'selected'; ?>>Panendoscopia Terapéutica Con Ligadura De Várices Esofágicas</option>
                        <option value="Panendoscopia Terapéutica Con Polipectomia"<?php if ($procedimiento == 'Panendoscopia Terapéutica Con Polipectomia') echo 'selected'; ?>>Panendoscopia Terapéutica Con Polipectomia</option>
                        <option value="Panendoscopia Terapeutica Con Resección Endoscópica De La Mucosa"<?php if ($procedimiento == 'Panendoscopia Terapeutica Con Resección Endoscópica De La Mucosa') echo 'selected'; ?>>Panendoscopia Terapeutica Con Resección Endoscópica De La Mucosa</option>
                        <option value="Panendoscopia Terapéutica Con Retiro De Endoprótesis Biliar"<?php if ($procedimiento == 'Panendoscopia Terapéutica Con Retiro De Endoprótesis Biliar') echo 'selected'; ?>>Panendoscopia Terapéutica Con Retiro De Endoprótesis Biliar</option>
                        <option value="Panendoscopia Terapéutica Con Retiro De Gastrostomia"<?php if ($procedimiento == 'Panendoscopia Terapéutica Con Retiro De Gastrostomia') echo 'selected'; ?>>Panendoscopia Terapéutica Con Retiro De Gastrostomia</option>
                        <option value="Panendoscopia Terapeutica Z-Poem"<?php if ($procedimiento == 'Panendoscopia Terapeutica Z-Poem') echo 'selected'; ?>>Panendoscopia Terapeutica Z-Poem</option>
                    </select>
                </div> <!-- <div class="row">-->

<!--******************************************************* MATERIALES *****************************************-->
                <div class="col-md-12">
                    <div class="form-header">
                        <h5 class="form-title"
                                style="text-align: center;
                                background-color: rgb(0, 139, 139, 0.7);
                                color: aliceblue;
                                margin-top:5px;
                                font-size: 14px;">
                                Materiales</h5>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="Pinza_Biopsia" name="Pinza_Biopsia" value="Pinza_Biopsia"<?php if ($Pinza_Biopsia == 1) echo "checked"; ?>>
                        <label class="form-check-label" for="Pinza_Biopsia" style="font-size:14px;">Pinza de Biopsia</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="Kit_Ligadura_micro" name="Kit_Ligadura_micro" value="Kit_Ligadura_micro"<?php if ($Kit_Ligadura_microtech == 1) echo "checked"; ?>>
                        <label class="form-check-label" for="Kit_Ligadura_micro" style="font-size:14px;">Kit de Ligadura Microtech</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="Aguja_Escleroterapia" name="Aguja_Escleroterapia" value="Aguja_Escleroterapia"<?php if ($Aguja_Escleroterapia == 1) echo "checked"; ?>>
                        <label class="form-check-label" for="Aguja_Escleroterapia" style="font-size:14px;">Aguja de Escleroterapia</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="Argon_Plasma" name="Argon_Plasma" value="Argon_Plasma"<?php if ($Argon_Plasma == 1) echo "checked"; ?>>
                        <label class="form-check-label" for="Argon_Plasma" style="font-size:14px;">Argon Plasma</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="Sonda_FiAPC" name="Sonda_FiAPC" value="Sonda_FiAPC"<?php if ($Sonda_FiAPC == 1) echo "checked"; ?>>
                        <label class="form-check-label" for="Sonda_FiAPC" style="font-size:14px;">Sonda FiAPC</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="Protesis_Esofagica_Wallflex" name="Protesis_Esofagica_Wallflex" value="Protesis_Esofagica_Wallflex"<?php if ($Protesis_Esofagica_Wallflex == 1) echo "checked"; ?>>
                        <label class="form-check-label" for="Protesis_Esofagica_Wallflex" style="font-size:14px;">Protesis Esofágica Wallflex Parcialmente Cubierta</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="Sistema_Ovesco" name="Sistema_Ovesco" value="Sistema_Ovesco"<?php if ($Sistema_Ovesco == 1) echo "checked"; ?>>
                        <label class="form-check-label" for="Sistema_Ovesco" style="font-size:14px;">Sistema Ovesco</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="Guia_Hidrofilica" name="Guia_Hidrofilica" value="Guia_Hidrofilica"<?php if ($Guia_Hidrofilica == 1) echo "checked"; ?>>
                        <label class="form-check-label" for="Guia_Hidrofilica" style="font-size:14px;">Guia Hidrofilica</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="Kit_Gastrotomia_Endoscopica_Pull" name="Kit_Gastrotomia_Endoscopica_Pull" value="Kit_Gastrotomia_Endoscopica_Pull"<?php if ($Kit_Gastrotomia_Endoscopica_Pull == 1) echo "checked"; ?>>
                        <label class="form-check-label" for="Kit_Gastrotomia_Endoscopica_Pull" style="font-size:14px;">Kit de Gastrotomia Endoscopica Pull</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="Hemoclips" name="Hemoclips" value="Hemoclips"<?php if ($Hemoclips == 1) echo "checked"; ?>>
                        <label class="form-check-label" for="Hemoclips" style="font-size:14px;">Hemoclips</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="Ovesco" name="Ovesco" value="Ovesco"<?php if ($Ovesco == 1) echo "checked"; ?>>
                        <label class="form-check-label" for="Ovesco" style="font-size:14px;">Ovesco</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="Kit_Ligadura" name="Kit_Ligadura" value="Kit_Ligadura"<?php if ($Kit_Ligadura == 1) echo "checked"; ?>>
                        <label class="form-check-label" for="Kit_Ligadura" style="font-size:14px;">Kit de Ligadura</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="Sonda_de_Gastrotomia" name="Sonda_de_Gastrotomia" value="Sonda_de_Gastrotomia"<?php if ($Sonda_de_Gastrotomia == 1) echo "checked"; ?>>
                        <label class="form-check-label" for="Sonda_de_Gastrotomia" style="font-size:14px;">Sonda de Gastrotomia</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="Asa_de_Polipectomia" name="Asa_de_Polipectomia" value="Asa_de_Polipectomia"<?php if ($Asa_de_Polipectomia == 1) echo "checked"; ?>>
                        <label class="form-check-label" for="Asa_de_Polipectomia" style="font-size:14px;">Asa de Polipectomia</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="Balon_Cre" name="Balon_Cre" value="Balon_Cre"<?php if ($Balon_Cre == 1) echo "checked"; ?>>
                        <label class="form-check-label" for="Balon_Cre" style="font-size:14px;">Balon Cre</label>
                    </div>
                </div>
<!--*********************************SEGUIMIENTO********************************-->
                    <div class="col-md-12">
                        <div class="form-header">
                            <h5 class="form-title"
                                    style="text-align: center;
                                    background-color: rgb(0, 139, 139, 0.7);
                                    color: aliceblue;
                                    margin-top:5px;
                                    font-size: 14px;">
                                Seguimiento</h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <strong style="font-size:14px;">Fecha de Preprogramacion y/o programacion</strong>
                            <input type="date" name="fecha_pre_programada" id="fecha_pre_programada" class="form-control" style="font-size:14px;"value="<?php echo $fecha_pre_programada; ?>">
                        </div>
                        
                        <div class="col-md-6">
                            <strong style="font-size:14px;">Fecha de realización de estudios</strong>
                            <input type="date" name="fecha_estudio" id="fecha_estudio"class="form-control" style="font-size:14px;"value="<?php echo $fecha_estudio; ?>">
                        </div>

                        <div class="col-md-12">
                            <strong style="font-size:14px;">Defunción</strong>
                            <select name="defuncion" id="defuncion" class="form-control" style="font-size:14px;">
                                <option value="0"<?php if ($defuncion == '0') echo 'selected'; ?>>Seleccione</option>
                                <option value="Si"<?php if ($defuncion == 'Si') echo 'selected'; ?>>Si</option>
                                <option value="No"<?php if ($defuncion == 'No') echo 'selected'; ?>>No</option>
                            </select>
                        </div>
                    </div> <!-- div del row-->

</div>
<br>
        <div class="container" style="text-align: right;">
            <button type="submit" class="btn btn-success">Guardar Cambios</button>
        </div>
                </div> <!--<div class="col col-10">-->
            </div> <!--<div class="row">-->
        </div> <!--  <div class="container"  width="100%" height="800px" style="margin-bottom: 100px;">-->
    </form>



    <footer>
        Hospital Regional de Alta Especialidad de Ixtapaluca
        <p style="font-size: 10px">
            Dirección de Operaciones - Gestión Digital en Salud 2023
        </p> 
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/update.js"></script>
    
</body>
</html>