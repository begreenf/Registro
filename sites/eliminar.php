<?php 

include '../layout/layout.php';
include '../helpers/utilities.php';

session_start();

$estudiantes = $_SESSION['estudiantes'];

if(isset($_GET['codigo'])){
    $estudianteid = $_GET['codigo'];

    $elementIndex = getIndexElement($estudiantes, 'codigo', $estudianteid);

    unset($estudiantes[$elementIndex]);

    $_SESSION['estudiantes'] = $estudiantes;

}

header('Location: estudiantes.php');
exit();

?>