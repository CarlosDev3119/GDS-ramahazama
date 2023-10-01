<?php
// Incluir el archivo de configuración de la base de datos
include('dbconfig.php');

// Conectar a la base de datos
$conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Consulta SQL
$query = "SELECT p.*, h.*, l.*, e.*, m.*, s.*
FROM (
    SELECT DISTINCT id_paciente
    FROM pacientes
) pacientes_filtrados
JOIN pacientes p ON pacientes_filtrados.id_paciente = p.id_paciente
JOIN hospitalizacion h ON pacientes_filtrados.id_paciente = h.id_paciente
JOIN laboratorio l ON pacientes_filtrados.id_paciente = l.id_paciente
JOIN estudios e ON pacientes_filtrados.id_paciente = e.id_paciente
JOIN materiales m ON pacientes_filtrados.id_paciente = m.id_paciente
JOIN seguimiento s ON pacientes_filtrados.id_paciente = s.id_paciente;
";

// Ejecutar la consulta
$result = mysqli_query($conn, $query);

// Verificar si se obtuvieron resultados
if ($result) {
    // Importar la biblioteca PhpSpreadsheet
    require '../../vendor/autoload.php';

    // Crear un nuevo objeto de hoja de cálculo
    $spreadsheet = new PhpOffice\PhpSpreadsheet\Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Agregar los encabezados de las columnas
    $columns = array(
        'Id',
        'Fecha Registro',
        'Nombre Paciente',
        'Curp',
        'Fecha Nacimiento',
        'Edad',
        'Sexo',
        'Diagnóstico',
        'Cama',
        'Días EIH',
        'Hb',
        'Hcto',
        'Plaquetas',
        'INR',
        'Cultivo',
        'Procedimiento',
        'Prioridad',
        'Médico Endo',
        'Estatus Solicitud',
        'Fecha Programada',
        'Pinza Biopsia',
        'Kit Ligadura Micro',
        'Aguja Escleroterapia',
        'Argon Plasma',
        'Sonda FiAPC',
        'Prótesis Esofágica Wallflex',
        'Sistema Ovesco',
        'Guía Hidrofílica',
        'Kit Gastrotomía Endoscópica Pull',
        'Hemoclips',
        'Ovesco',
        'Kit Ligadura',
        'Sonda de Gastrotomía',
        'Asa de Polipectomía',
        'Balón Cre',
        'Fecha Pre Programada',
        'Fecha Estudio',
        'Defunción'
    );
        
    $sheet->fromArray([$columns], null, 'A1');

    // Agregar los datos desde la base de datos
    $row = 2;
    while ($fila = mysqli_fetch_assoc($result)) {
        $sheet->fromArray([$fila], null, 'A' . $row);
        $row++;
    }

    // Crear un objeto Writer para guardar el archivo Excel
    $writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);

    // Definir la ubicación del archivo Excel
    $excel_file = 'Datos Endoscopia.xlsx';

    // Guardar el archivo Excel
    $writer->save($excel_file);

    // Descargar el archivo Excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $excel_file . '"');
    header('Cache-Control: max-age=0');

    $file_path = realpath($excel_file);
    readfile($file_path);
    unlink($file_path); // Eliminar el archivo temporal

    exit();
} else {
    echo "Error al ejecutar la consulta SQL: " . mysqli_error($conn);
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>
