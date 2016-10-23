<!doctype html>

<?php
session_start();
session_destroy();
?>

<html>
<head>
  <title>wRITEaLLyOUwANT</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../estilos/base.css">
</head>
<body>
  <!-- El encabezado -->
  <div class="row menu">
    <div class="col-offset-1 col-4">
      <h1 class="titulo"><a href="/wayw">wayw</a></h1>
    </div>
  </div>

  <!-- El título de la página -->
  <div class="row">
    <div class="col-offset-1 col-9">
      <h1>Hasta la próxima</h1>
    </div>
  </div>

  <!--Hasta luego -->
  <div class="row">
    <div class="col-offset-1 col-9">
      <p>
        Se ha cerrado la sesión correctamente, ¡hasta pronto!
      </p>
      <p>
        <a href="../index.php">Ir al inicio</a>
      </p>
    </div>
  </div>
</body>
</html>
