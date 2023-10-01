<?php
// Incluir el archivo de configuración de la base de datos
include('dbconfig.php');

// Conectar a la base de datos
$conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Consulta SQL
$query = "SELECT dp.*, c.*, am.*, ph.*, rp.*, pq.*, phi.*, rpo.*
FROM (
    SELECT DISTINCT id_paciente
    FROM datos_paciente
) pacientes
JOIN datos_paciente dp ON pacientes.id_paciente = dp.id_paciente
JOIN conmorbilidades c ON pacientes.id_paciente = c.id_paciente
JOIN atencion_medica am ON pacientes.id_paciente = am.id_paciente
JOIN pre_hierro ph ON pacientes.id_paciente = ph.id_paciente
JOIN reacciones_previas rp ON pacientes.id_paciente = rp.id_paciente
JOIN procedimiento_qx pq ON pacientes.id_paciente = pq.id_paciente
JOIN post_hierro phi ON pacientes.id_paciente = phi.id_paciente
JOIN reacciones_posteriores rpo ON pacientes.id_paciente = rpo.id_paciente;
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
        'Curp',
        'Nombre Paciente',
        'Fecha Nacimiento',
        'Edad',
        'Sexo',
        'Asnm',
        'Talla',
        'Peso',
        'Imc',
        'Resultadoimc',
        'Tip',
        'Cancer',
        'Neumonia',
        'Drogas IV',
        'Eclampsia',
        'Artropatia',
        'Les Activo',
        'Miomatosis',
        'Nefropatia',
        'Colelitiasis',
        'Sx Hellp',
        'Sx Nefrotico',
        'Drepanocitica',
        'Hipotiroidismo',
        'Miastenia Gravis',
        'Ruptura Esplenica',
        'Lesion Renal',
        'Enferemedades Graves',
        'Diabetes Gestacional',
        'Condilomatosis Vulvar',
        'Hipertension Gestacional',
        'Falla Cardiaca',
        'Infeccion Vias',
        'Desequilibrio Hidro',
        'Ninguna',
        'Embarazo',
        'Puerperio',
        'Pre Hemoglobina',
        'Pre B12',
        'Pre Ferretina',
        'Pre Calculo Deficiencia',
        'Pre Tratamiento',
        'Pre Sacarato',
        'Dosis Sacarato',
        'Numero Dosis Sacarato',
        'Pre Carboximaltosa',
        'Dosis Carboximaltosa',
        'Numero Dosis Carboximaltosa',
        'Pre Dextrano',
        'Dosis Dextrano',
        'Numero Dosis Dextrano',
        'Premeditacion',
        'Medicamento',
        'Solucion Infundida',
        'Pre Cefalea',
        'Pre Nauseas',
        'Pre Hipertension',
        'Pre Hipotension',
        'Pre Taquicardia',
        'Pre Bradicardia',
        'Pre Otro',
        'Pre Ninguna',
        'Pre Grado Reaccion',
        'Cirugia',
        'Fecha Cirugia',
        'Pre Qx Hemoglobina',
        'Cesarea',
        'Fecha Cesarea',
        'Hemorragia Masiva',
        'Cantidad Sangrado',
        'Hemorragia',
        'Complicasiones',
        'Transfusiones',
        'Ninguna Transfusion',
        'Plasma',
        'No Plasma',
        'Plaquetas',
        'No Plaquetas',
        'Crioprecipitado',
        'No Crioprecipitado',
        'Plaqueta Globular',
        'No Plaqueta Globular',
        'Post Hemoglobina',
        'Post B12',
        'Post Ferretina',
        'Post Calculo Deficiencia',
        'Post Tratamiento',
        'Tratamiento Oral',
        'Post Sacarato',
        'Post Dosis Sacarato',
        'Post Numero Dosis Sacarato',
        'Post Carboximaltosa',
        'Post Dosis Carboximaltosa',
        'Post Numero Dosis Carboximaltosa',
        'Post Dextrano',
        'Post Dosis Dextrano',
        'Post Numero Dosis Dextrano',
        'Post Premeditacion',
        'Post Medicamento',
        'Post Solucion Infundida',
        'Post Cefalea',
        'Post Nauseas',
        'Post Hipertension',
        'Post Hipotension',
        'Post Taquicardia',
        'Post Bradicardia',
        'Post Otro',
        'Post Ninguna',
        'Post Grado Reaccion'
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
    $excel_file = 'Datos Anemia.xlsx';

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
