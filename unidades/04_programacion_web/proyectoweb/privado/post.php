<!doctype html>

<?php
session_start();

require_once("../php/funciones.php");

// Si el usuario no está logeado lo echamos de aquí para que lo haga.
if(!$_SESSION['id']) {
  header('Location: ../paginas/login.php');
}

$usuario = cargar_usuario($_SESSION['id']);

// Si hay POST guardamos el post.
if($_POST && $_POST['post']) {
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

  // Ejecutamos el insert.
  $sql = "insert into mensaje (mensaje, usuario) values ('" . $_POST['post'] . "', " . $_SESSION['id'] . ")";
  if(mysqli_query($mysqli, $sql)) {
    mysqli_close($mysqli);
    header('Location: index.php');
  }

  mysqli_close($mysqli);
}

// Si llegamos hasta aquí es porque estamos ante un error y lo mostramos al usuario.
?>

<html>
<head>
  <title>wRITEaLLyOUwANT</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../estilos/base.css">
</head>
<body>
  <!-- La parte del menú con el título de la web -->
  <div class="row menu">
    <div class="col-offset-1 col-4">
      <h1 class="titulo"><a href="/wayw/privado/index.php">wayw</a></h1>
    </div>
    <div class="col-6">
      <div class="pull-right">
        <a href="#" class="login">
          <?php echo "@".$usuario->getNombreUsuario() ?>
        </a>
      </div>
    </div>
  </div>

  <!-- Los posibles mensajes -->
  <div class="row">
    <div class="col-offset-1 col-10">
      <div class="error">
        Error al crear el post, no ha sido posible insertarlo en la base de datos. Contacta con el sysadmin.
      </div>
    </div>
  </div>
</body>
</html>

