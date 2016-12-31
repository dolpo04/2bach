<?php
require_once("usuario.php");
require_once("mensaje.php");

/**
 * Carga el usuario identificado por el $id para lo cual lo busca en la base de
 * datos.
 *
 * Devuelve null en caso de error o el usario si todo fue bien.
 */
function cargar_usuario($id) {
  // Conexión a la base de datos.
  $mysqli = mysqli_connect("localhost", "roman", "roman", "wayw");
  if (mysqli_connect_errno($mysqli)) {
      echo "Fallo al conectar a MySQL: " . mysqli_connect_error();
      return null;
  }

  // Configuracción del tipo de codificación para evitar problemas con carateres
  // españoles.
  $mysqli->set_charset('utf8');

  // Consultamos la base de datos en busca del usuario con identificador $id.
  $query = "select id, avatar, nombre, apellidos, email, nombreUsuario, clave" .
           " from usuario" .
           " where id='$id'";
  $resultado = $mysqli->query($query);
  if(mysqli_num_rows($resultado) == 1) {
    $fila = $resultado->fetch_assoc();
    $usuario = new Usuario();
    $usuario->setId($fila['id']);
    $usuario->setAvatar($fila['avatar']);
    $usuario->setNombre($fila['nombre']);
    $usuario->setApellidos($fila['apellidos']);
    $usuario->setEmail($fila['email']);
    $usuario->setNombreUsuario($fila['nombreUsuario']);
    $usuario->setClave($fila['clave']);

    $mysqli->close();

    return $usuario;
  }
  else {
    $mysqli->close();
    return null;
  }
}

/**
 * Carga todos los mensajes que hay en la base de datos.
 *
 * Devuelve un array con todos estos mensajes.
 */
function cargar_mensajes() {
  $mensajes = array();

  // Conexión a la base de datos.
  $mysqli = mysqli_connect("localhost", "roman", "roman", "wayw");
  if (mysqli_connect_errno($mysqli)) {
      echo "Fallo al conectar a MySQL: " . mysqli_connect_error();
      return null;
  }

  // Configuracción del tipo de codificación para evitar problemas con carateres
  // españoles.
  $mysqli->set_charset('utf8');

  // Consultamos la base de datos en busca del usuario con identificador $id.
  $query = "select id, mensaje, fecha, privado, megusta, usuario " .
           "from mensaje " .
           "order by fecha desc";
  $resultado = $mysqli->query($query);
  while($fila = $resultado->fetch_assoc()) {
    $mensaje = new Mensaje();
    $mensaje->setId($fila['id']);
    $mensaje->setMensaje($fila['mensaje']);
    $mensaje->setFecha($fila['fecha']);
    $mensaje->setPrivado($fila['privado']);
    $mensaje->setMegusta($fila['megusta']);
    $mensaje->setUsuario(cargar_usuario($fila['usuario']));

    $mensajes[] = $mensaje;
  }

  // Cerramos la conexión con la base de datos.
  $mysqli->close();

  // Devolvemos los resultados.
  return $mensajes;
}
?>
