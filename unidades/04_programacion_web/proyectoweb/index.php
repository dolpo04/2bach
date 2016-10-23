<!doctype html>

<?php
require_once("php/funciones.php");

// Obtenemos todos los mensajes.
$mensajes = cargar_mensajes();
?>

<html>
<head>
  <title>wRITEaLLyOUwANT</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="estilos/base.css">
</head>
<body>
  <!-- La parte del menú con el título de la web -->
  <div class="row menu">
    <div class="col-offset-1 col-4">
      <h1 class="titulo"><a href="/wayw">wayw</a></h1>
    </div>
    <div class="col-6">
      <div class="pull-right">
        <a href="paginas/registro.php" class="login">Registro</a> |
        <a href="paginas/login.php" class="login">Iniciar sesión</a>
      </div>
    </div>
  </div>

  <!-- Los contenidos -->
  <div class="row">
    <div class="col-offset-3 col-6">
      <?php foreach ($mensajes as $mensaje) { ?>
      <div class="post">
        <div class="texto-post">
          <strong>@<?= $mensaje->getUsuario()->getNombreUsuario(); ?> dice: </strong><?= $mensaje->getMensaje(); ?>
        </div>
        <div class="fin-post">
          <div class="row">
            <div class="col-12">
              <div class="izquierda">
                Regístrate o inicia sesión para interactuar
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</body>
</html>
