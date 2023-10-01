<?php
// este php es el que nos proporciona la funcionalidad de exportar en excel al tabla de los batos mostrada en los registros
//esto mediante phpspreaddsheets

// Ruta al archivo autoload.php de PhpSpreadsheet
require '../../vendor/autoload.php'; 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Incluir el código de conexión a la base de datos y la consulta SQL para buscar los datos

include('dbconfig.php');
$conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

$query = "SELECT dc.id_cirugia, dc.medico, dc.cirugia, dc.sala,c.catalogo_key ,c.nombre AS diagnostico,
dc.fecha_solicitud,dc.fecha_programada,dc.fecha_realizada,tiempos.*,cancelaciones.*
FROM datos_cirugia dc
LEFT JOIN catalogo c ON dc.diagnostico = c.id_procedimiento
JOIN tiempos ON tiempos.id_cirugia=dc.id_cirugia
JOIN cancelaciones ON cancelaciones.id_cirugia=dc.id_cirugia";
$resultado = mysqli_query($conn, $query);

// Crear un nuevo libro de Excel y seleccionar la hoja de cálculo activa
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Definir los encabezados de las columnas en la hoja de cálculo
$columnas = array(
    'IDcirugia',
    'Médico',
    'Cirugía',
    'Sala',
    'Catalogo Key',
    'Diagnóstico',
    'Fecha Solicitud',
    'Fecha Programada',
    'Fecha Realizada',
    'Hora Programada',
    'Hora Ingreso a Sala',
    'Hora Anestesia',
    'Hora Inicio Cirugía',
    'Hora Fin Cirugía',
    'Hora Egreso Sala',
    'Programada - Ingreso',
    'Programada - Inicio',
    'Ingreso - Egreso Sala',
    'Ingreso - Inicio Anestesia',
    'Ingreso Sala - Inicio Cirugía',
    'Ingreso Inicio - Fin Cirugía',
    'Cirugía Suspendida',
    'S medico',
    'Motivo'
);

// Agregar los encabezados de las columnas a la hoja de cálculo
$columnIndex = 1;
foreach ($columnas as $columna) {
    $sheet->setCellValueByColumnAndRow($columnIndex, 1, $columna);
    $columnIndex++;
}

// Agregar los datos a la hoja de cálculo
$fila = 2;
while ($datos = mysqli_fetch_assoc($resultado)) {
    $columnIndex = 1;
    foreach ($datos as $valor) {
        $sheet->setCellValueByColumnAndRow($columnIndex, $fila, $valor);
        $columnIndex++;
    }
    $fila++;
}

// Configurar el encabezado HTTP para descargar el archivo Excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="datos_cirugia.xlsx"');
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
    
?>