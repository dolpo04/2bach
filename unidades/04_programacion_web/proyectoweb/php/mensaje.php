<?php
class Mensaje {
  // El identificador.
  private $id;
  // El mensaje en sí.
  private $mensaje;
  // Fecha.
  private $fecha;
  // ¿Es el mensaje privado? Si no es privado lo podrá ver todo el mundo.
  private $privado;
  // Número de "Me gusta".
  private $megusta;
  // El usuario del cual es este mensaje.
  private $usuario;

  /**
   * Construtor por defecto. Crea un mensaje vacío público.
   */
  function __construct() {
  }

  public function getId() {
    return $this->id;
  }

  public function getMensaje() {
    return $this->mensaje;
  }

  public function getFecha() {
    return $this->fecha;
  }

  public function getPrivado() {
    return $this->privado;
  }

  public function getMegusta() {
    return $this->megusta;
  }

  public function getUsuario() {
    return $this->usuario;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function setMensaje($mensaje) {
    $this->mensaje = $mensaje;
  }

  public function setFecha($fecha) {
    $this->fecha = $fecha;
  }

  public function setPrivado($privado) {
    $this->privado = $privado;
  }

  public function setMegusta($megusta) {
    $this->megusta = $megusta;
  }

  public function setUsuario($usuario) {
    $this->usuario = $usuario;
  }
}
?>
