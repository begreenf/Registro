<?php
include '../layout/layout.php';
include '../helpers/utilities.php';

session_start();

if (isset($_GET['codigo'])) {

  $estudianteid = $_GET['codigo'];

  $_SESSION['estudiantes'] = isset($_SESSION['estudiantes']) ? $_SESSION['estudiantes'] : array();

  $estudiantes = $_SESSION['estudiantes'];

  $element = searchProperty($estudiantes, 'codigo', $estudianteid)[0];
  $elementIndex = getIndexElement($estudiantes, 'codigo', $estudianteid);

  if (/*isset($_POST['codigo']) &&*/isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['carrera'])) {

    $status = $_POST['status'];
    if ($status != 'Activo') {
      $status = 'No activo';
    };

    $updateEstudiante = 
      [
        'codigo' => $estudianteid /*$_POST['codigo']*/,
        'nombre' => $_POST['nombre'],
        'apellido' => $_POST['apellido'],
        'carrera' => $_POST['carrera'],
        'status' => $status,
      ];

      $estudiantes[$elementIndex] = $updateEstudiante;

    $_SESSION['estudiantes'] = $estudiantes;

    header("Location: estudiantes.php");
    exit();
  };
} else {

  header("Location: estudiantes.php");
  exit();
}





?>

<?php printHeader(true); ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Nuevo estudiante</h1>
  </div>
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          Crear nuevo estudiante
        </div>
        <div class="card-body">
          <form action="editar.php?codigo=<?php echo $element['codigo'] ?>" method="POST">
            <div class="">
              <div class="form-group">
                <label for="codigo">Codigo</label>
                <input type="numfmt_create" class="form-control" value="<?php echo $element['codigo'] ?>" placeholder="<?php echo $estudianteid; ?>" readonly>
              </div>

              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" value="<?php echo $element['nombre'] ?>" placeholder="Nombre de estudiante" name="nombre" required>
              </div>
              <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" id="apellido" value="<?php echo $element['apellido'] ?>" placeholder="Apellido de estudiante" name="apellido" required>
              </div><br>
              <div class="form-group">
                <label for="carrera">Carrera</label>
                <select id="carrera" class="form-control" name="carrera" required>
                  <?php foreach ($carrera as $carrera => $text) : ?>
                    <?php if($carrera == $element['carrera']): ?>
                      <option selected value="<?php echo $carrera ?>"> <?php echo $text; ?> </option>
                    <?php else: ?>
                      <option value="<?php echo $carrera ?>"> <?php echo $text; ?> </option>
                    <?php endif; ?>
                    
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="status" name="status" value="<?php echo $element['status'] ?>" value="Activo">
                  <label class="form-check-label" for="status">
                    ¿Activo?
                  </label>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary float-right">Guardar</button>&nbsp;&nbsp;
            <a href="estudiantes.php" class="btn btn-secondary float-right" role="button" aria-pressed="true">Volver atras</a>

          </form>
        </div>
      </div>
    </div>
    <div class="col-md-3"></div>
  </div>


  </div>
</main>

<?php printFooter(true); ?>