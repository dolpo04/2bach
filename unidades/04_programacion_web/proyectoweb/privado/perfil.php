<!doctype html>

<?php
session_start();

require_once("../php/funciones.php");

// Si el usuario no está logeado lo echamos de aquí para que lo haga.
if(!$_SESSION['id']) {
  header('Location: ../paginas/login.php');
}

// Si hay POST actualizamos los datos.
if($_POST) {
  // Creamos el usaurio con los datos del post.
  $usuario = new Usuario();
  $usuario->setId($_SESSION['id']);
  $usuario->setNombre($_POST['nombre']);
  $usuario->setApellidos($_POST['apellidos']);
  $usuario->setNombreUsuario($_POST['nombreUsuario']);
  $usuario->setEmail($_POST['email']);

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

  // Ejecutamos el update.
  $sql = "update usuario set nombre='" . $usuario->getNombre() . "', apellidos='" . $usuario->getApellidos() . "', nombreUsuario='" . $usuario->getNombreUsuario() . "', email='" . $usuario->getEmail() . "' where id=" . $usuario->getId();
  if(mysqli_query($mysqli, $sql)) {
    $update = 1;
  }
  else {
    $update = 0;
  }

  mysqli_close($mysqli);
}
// Sino, cargamos el usuario con los datos actuales.
else {
  $usuario = cargar_usuario($_SESSION['id']);
}
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
  <?php
  if($_POST) {
  ?>
    <div class="row">
      <div class="col-offset-1 col-10">
        <?php
        if($update) {
        ?>
        <div class="ok">
          Información actualizada correctamente.
        </div>
        <?php
        }
        else {
        ?>
        <div class="error">
          Error al actualizar la información.
        </div>
        <?php
        }
        ?>
      </div>
    </div>
  <?php
  }
  ?>

  <!-- Los contenidos -->
  <form action="perfil.php" method="post">
    <div class="row">
      <!-- Información lateral del usuario -->
      <div class="col-offset-3 col-6">
        <img src="../img/avatar.png" width="100px" />
      </div>
    </div>
    <div class="row">
      <div class="col-offset-3 col-3">
        <input type="text" name="nombre" value="<?= $usuario->getNombre(); ?>">
      </div>
      <div class="col-3">
        <input type="text" name="apellidos" value="<?= $usuario->getApellidos(); ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-offset-3 col-6">
        <input type="text" name="nombreUsuario" value="<?= $usuario->getNombreUsuario(); ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-offset-3 col-6">
        <input type="text" name="email" value="<?= $usuario->getEmail(); ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-offset-3 col-6">
        <div class="pull-right margen-arriba">
          <input type="submit" name="submit" value="Modificar">
        </div>
      </div>
    </div>
  </form>
</body>
</html>
