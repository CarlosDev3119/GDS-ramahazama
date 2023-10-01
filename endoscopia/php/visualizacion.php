<?php
        include('dbconfig.php');
        $conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

        $id_paciente = null;
        if (isset($_GET['idPaciente']) && is_numeric($_GET['idPaciente'])) {
                $id_paciente = $_GET['idPaciente'];

                $query= "SELECT p.*,h.*,l.*,e.*,m.*,s.* FROM pacientes p
                JOIN hospitalizacion h ON p.id_paciente = h.id_paciente
                JOIN laboratorio l ON p.id_paciente = l.id_paciente
                JOIN estudios e ON p.id_paciente = e.id_paciente
                JOIN materiales m ON p.id_paciente = m.id_paciente
                JOIN seguimiento s ON p.id_paciente = s.id_paciente WHERE p.id_paciente='$id_paciente';";
        
                $data= mysqli_query($conn,$query);
        
                if ($data->num_rows > 0) {
                        $row = $data -> fetch_assoc();
                        $fecha_registro = $row['fecha_registro'];
                        $curp = $row['curp'];
                        $nombre_paciente = $row['nombre_paciente'];
                        $fecha = $row['fecha_nacimiento'];
                        $edad = $row['edad'];
                        $sexo = $row['sexo'];

                        $diagnostico = $row['diagnostico'];
                        $cama = $row['cama'];
                        $dias_eih = $row['dias_eih'];

                        $hb = $row['hb'];
                        $hcto = $row['hcto'];
                        $inr = $row['inr'];
                        $plaquetas = $row['plaquetas'];
                        $cultivo = $row['cultivo'];

                        $procedimiento = $row['procedimiento'];
                        $prioridad = $row['prioridad'];
                        $medico_endo = $row['medico_endo'];
                        $estatus_solicitud = $row['estatus_solicitud'];
                        $fecha_programada = $row['fecha_programada'];

                        $Pinza_Biopsia = $row['Pinza_Biopsia'];
                        $Kit_Ligadura_microtech = $row['Kit_Ligadura_microtech'];
                        $Aguja_Escleroterapia = $row['Aguja_Escleroterapia'];
                        $Argon_Plasma = $row['Argon_Plasma'];
                        $Sonda_FiAPC = $row['Sonda_FiAPC'];
                        $Protesis_Esofagica_Wallflex = $row['Protesis_Esofagica_Wallflex'];
                        $Sistema_Ovesco = $row['Sistema_Ovesco'];
                        $Guia_Hidrofilica = $row['Guia_Hidrofilica'];
                        $Kit_Gastrotomia_Endoscopica_Pull = $row['Kit_Gastrotomia_Endoscopica_Pull'];
                        $Hemoclips = $row['Hemoclips'];
                        $Ovesco = $row['Ovesco'];
                        $Kit_Ligadura = $row['Kit_Ligadura'];
                        $Sonda_de_Gastrotomia = $row['Sonda_de_Gastrotomia'];
                        $Asa_de_Polipectomia = $row['Asa_de_Polipectomia'];
                        $Balon_Cre = $row['Balon_Cre'];

                        $fecha_pre_programada = $row['fecha_pre_programada'];
                        $fecha_estudio = $row['fecha_estudio'];
                        $defuncion = $row['defuncion'];
                        
                        $conn ->close();
                }else {
                        echo "No se ando podido encontrar los datos del paciente";
                        exit;
                }
        }else {
                echo $id_paciente;
                exit;
        }


?>
