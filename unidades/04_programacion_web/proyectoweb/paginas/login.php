<!doctype html>

<?php
session_start();

// Definimos la variable resultado que tomará un valor cuando se tenga POST.
$resultado = null;

if($_POST) {
  // Recoge los datos del formulario.
  $usuario = $_POST['usuario'];
  $clave = $_POST['clave'];

  // Conexión a MySQL (Hay que instalar php-mysql y mysqli. Además, hay que
  // abrir php.ini y descomentar la línea donde pone "extensions mysql.so" o
  // algo así para que funcione msyqli_connect).
  $mysqli = mysqli_connect("localhost", "roman", "roman", "wayw");
  if (mysqli_connect_errno($mysqli)) {
      echo "Fallo al conectar a MySQL: " . mysqli_connect_error();
  }

  // Configuracción del tipo de codificación para evitar problemas con carateres
  // españoles.
  $mysqli->set_charset('utf8');

  // Consultamos la base de datos en busca del usuario que intenta entrar.
  $query = "select id, nombre, apellidos, nombreUsuario, clave " .
           "from usuario " .
           "where nombreUsuario='$usuario' and clave='$clave'";

  $resultado =  $mysqli->query($query);
  if(mysqli_num_rows($resultado) == 1) {
    $fila = $resultado->fetch_assoc();
    $_SESSION['id'] = $fila['id'];
    header('Location: ../privado/index.php');
  }
}
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
      <h1>Introduce tu cuenta de usuario</h1>
    </div>
  </div>

  <!-- Los posibles errores -->
  <?php
  if($resultado && mysqli_num_rows($resultado) == 0) {
  ?>
    <div class="row">
      <div class="col-offset-1 col-10">
        <div class="error">
          El usuario y/o la contraseña son incorrectas
        </div>
      </div>
    </div>
  <?php
  }
  ?>

  <!-- El formulario de login -->
  <form action="login.php" method="post">
    <div class="row">
      <div class="col-offset-1 col-3">
        <input type="text" name="usuario" placeholder="Usuario">
      </div>
      <div class="col-3">
        <input class="margen-izquierda" type="password" name="clave"
               placeholder="Contraseña">
      </div>
    </div>
    <div class="row">
      <div class="col-offset-1 col-6">
        <div class="pull-right margen-arriba">
          <input type="submit" name="submit" value="Entrar">
        </div>
      </div>
    </div>
  </form>
</body>
</html>
