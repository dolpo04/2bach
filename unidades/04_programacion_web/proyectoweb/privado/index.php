<!doctype html>

<?php
session_start();

require_once("../php/funciones.php");

// Si el usuario no está logeado lo echamos de aquí para que lo haga.
if(!$_SESSION['id']) {
  header('Location: ../paginas/login.php');
}

// Obtenemos el usuario logeado.
$usuario = cargar_usuario($_SESSION['id']);

// Obtenemos todos los mensajes.
$mensajes = cargar_mensajes();
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

  <!-- Los contenidos -->
  <div class="row">
    <!-- Información lateral del usuario -->
    <div class="col-offset-1 col-2">
      <div class="usuario">
        <img src="../img/avatar.png" width="50px" />
        <div>
          <?php
          echo $usuario->getNombre();
          echo " " . $usuario->getApellidos();
          ?>
          <div class="texto-peque">
            <?php
            echo "@".$usuario->getNombreUsuario();
            ?>
          </div>
        </div>
        <div class="margen-arriba alinear-derecha">
          <a href="../privado/perfil.php" class="peque">Mi perfil</a>
        </div>
        <div class="alinear-derecha">
          <a href="../paginas/logout.php" class="peque">Cerrar sesión</a>
        </div>
      </div>
    </div>

    <!-- El formulario para escribir post -->
    <div class="col-6">
      <form action="post.php" method="post">
        <div class="row">
          <div class="pull-right">
            <textarea name="post" rows="3" cols="80" placeholder="Escribe lo que quieras"></textarea>
          </div>
        </div>
        <div class="row">
          <div class="pull-right">
            <input class="peque" type="submit" name="submit" value="Enviar">
          </div>
        </div>
      </form>
    </div>

    <!-- Los posts -->
    <div class="col-6">
      <?php foreach ($mensajes as $mensaje) { ?>
      <div class="post">
        <div class="texto-post">
          <strong>@<?= $mensaje->getUsuario()->getNombreUsuario(); ?> dice: </strong><?= $mensaje->getMensaje(); ?>
        </div>
        <div class="fin-post">
          <div class="row">
            <div class="col-6">
              <div class="izquierda">
                <div>
                  <a href="megusta.php?id=<?= $mensaje->getId(); ?>">
                    <img src="../img/megusta.png" width="20px" style="vertical-align: middle;" />
                  </a>
                  <span>
                    <?= $mensaje->getMegusta(); ?>
                  </span>
                </div>
              </div>
            </div>
            <?php if ($mensaje->getUsuario()->getId() == $usuario->getId()) { ?>
            <div class="col-6">
              <div class="derecha">
                <a href="eliminar.php?id=<?= $mensaje->getId(); ?>">
                  <img src="../img/eliminar.png" width="20px" style="vertical-align: middle;" />
                </a>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</body>
</html>
