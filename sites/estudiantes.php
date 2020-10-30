<?php
include '../layout/layout.php';
include '../helpers/utilities.php';

session_start();

$_SESSION['estudiantes'] = isset($_SESSION['estudiantes']) ? $_SESSION['estudiantes'] : array();

$listadoEstudiantes = $_SESSION['estudiantes'];

if(!empty($listadoEstudiantes)){

  if(isset($_GET['carreraid'])){

    $listadoEstudiantes = searchProperty($listadoEstudiantes,'carrera',$_GET['carreraid']);

  }

};

?>

<?php printHeader(true); ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Estudiantes</h1>
  </div>

  <h2></h2>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Carrera</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>

        <?php if (empty($listadoEstudiantes)) : ?>

          <h3>No hay estudiantes registrados, registra aqui: <a href="nuevoEstudiante.php" class="btn btn-primary">nuevo estudiante</a> </h3>

        <?php else : ?>

          <div class="float-right dropdown-menu-right">

            <a id="mi-dropdown" href="#" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">Filtrar</a>
            <ul class="dropdown-menu text-dark">
              <li><a class="text-dark" href="estudiantes.php" >Todos</a></li>
              <li><a class="text-dark" href="estudiantes.php?carreraid=1" >Redes</a></li>
              <li><a class="text-dark" href="estudiantes.php?carreraid=2" >Mecatronica</a></li>
              <li><a class="text-dark" href="estudiantes.php?carreraid=3" >Manufactura</a></li>
              <li><a class="text-dark" href="estudiantes.php?carreraid=4" >Multimedia</a></li>
              <li><a class="text-dark" href="estudiantes.php?carreraid=5" >Software</a></li>
              </ul>

          </div>
          <?php foreach ($listadoEstudiantes as $estudiant) : ?>

            <tr>
              <td><?php echo $estudiant['nombre'] ?></td>
              <td><?php echo $estudiant['apellido'] ?></td>
              <td><?php echo getCarrera($estudiant['carrera']) ?></td>
              <td><?php echo $estudiant['status'] ?></td>
              <td><a href="editar.php?codigo=<?php echo $estudiant['codigo'] ?>" class="link">Editar</a></td>
              <td><a href="eliminar.php?codigo=<?php echo $estudiant['codigo'] ?>" class="link">Eliminar</a></td>
            </tr>

          <?php endforeach; ?>

        <?php endif; ?>
      </tbody>
    </table>
  </div>
</main>

<?php printFooter(true); ?>