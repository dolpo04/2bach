<!doctype html>

<?php
session_start();

// Definimos la variable resultado que tomará un valor cuando se tenga POST.
$errroBd = null;
$errorClave = null;
$errorUsuario = null;

// Valores iniciales.
$nombre = '';
$apellidos = '';
$email = '';
$nombreUsuario = '';

if($_POST) {
  // Recoge los datos del formulario.
  $nombre = $_POST['nombre'];
  $apellidos = $_POST['apellidos'];
  $email = $_POST['email'];
  $nombreUsuario = $_POST['nombreUsuario'];
  $clave = $_POST['clave'];
  $clave2 = $_POST['clave2'];

  // Si las claves son distintas no seguimos y mostraremos el error.
  if ($clave != $clave2) {
    $errorClave = 1;
  }
  else {
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

    // Consultamos la base de datos para comprobar que está libre el nombre de
    // usuariio.
    $query = "select nombreUsuario " .
             "from usuario " .
             "where nombreUsuario='$nombreUsuario'";

    $resultado =  $mysqli->query($query);
    // Existe ese nombre de usuario así que acabamos para mostrar el error.
    if(mysqli_num_rows($resultado) == 1) {
      $errorUsuario = 1;
    }
    else {
      // Si se hace bien el insert vamos a login.
      $sql = "insert into usuario (nombre, apellidos, nombreUsuario, email, clave) " .
               "values ('$nombre', '$apellidos', '$nombreUsuario', '$email', '$clave');";
      if(mysqli_query($mysqli, $sql)) {
        $mysqli->close();
        header('Location: ../paginas/login.php');
      }
      else {
        $errorBd = 1;
      }
    }

    $mysqli->close();
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
      <h1>Registro de usuario</h1>
    </div>
  </div>

  <!-- Los posibles errores -->
  <?php
  if($errorBd) {
  ?>
    <div class="row">
      <div class="col-offset-1 col-10">
        <div class="error">
          Todos los campos son obligatorios
        </div>
      </div>
    </div>
  <?php
  }
  ?>
  <?php
  if($errorClave) {
  ?>
    <div class="row">
      <div class="col-offset-1 col-10">
        <div class="error">
          Las contraseñas no coinciden
        </div>
      </div>
    </div>
  <?php
  }
  ?>
  <?php
  if($errorUsuario) {
  ?>
    <div class="row">
      <div class="col-offset-1 col-10">
        <div class="error">
          El nombre de usuario no está disponible
        </div>
      </div>
    </div>
  <?php
  }
  ?>

  <!-- El formulario de login -->
  <form action="registro.php" method="post">
    <div class="row">
      <div class="col-offset-4 col-4">
        <input type="text" name="nombre" placeholder="Nombre"
               value="<?= $nombre ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-offset-4 col-4">
        <input type="text" name="apellidos" placeholder="Apellidos"
               value="<?= $apellidos ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-offset-4 col-4">
        <input type="text" name="email" placeholder="Email"
               value="<?= $email ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-offset-4 col-4">
        <input type="text" name="nombreUsuario" placeholder="Nombre de usuario"
               value="<?= $nombreUsuario ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-offset-4 col-4">
        <input type="password" name="clave" placeholder="Contraseña">
      </div>
    </div>
    <div class="row">
      <div class="col-offset-4 col-4">
        <input type="password" name="clave2" placeholder="Repetir contraseña">
      </div>
    </div>
    <div class="row">
      <div class="col-offset-4 col-4">
        <div class="pull-right margen-arriba">
          <input type="submit" name="submit" value="Aceptar">
        </div>
      </div>
    </div>
  </form>
</body>
</html>
