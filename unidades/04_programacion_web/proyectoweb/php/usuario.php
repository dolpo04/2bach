<?php
/**
 * Clase que representa un usuario en la aplicación.
 */
class Usuario {
  private $id;
  private $avatar;
  private $nombre;
  private $apellidos;
  private $email;

  private $nombreUsuario;
  private $clave;

  private $mensajes;

  /**
   * Constructor que crea el usuario con los valores pasados.
   */
  public function __construct() {
  }

  public function getId() {
    return $this->id;
  }

  public function getAvatar() {
    return $this->avatar;
  }

  public function getNombre() {
    return $this->nombre;
  }

  public function getApellidos() {
    return $this->apellidos;
  }

  public function getEmail() {
    return $this->email;
  }

  public function getNombreUsuario() {
    return $this->nombreUsuario;
  }

  public function getClave() {
    return $this->clave;
  }

  public function getMensajes() {
    return $this->mensajes;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function setAvatar($avatar) {
    $this->avatar = $avatar;
  }

  public function setNombre($nombre) {
    $this->nombre = $nombre;
  }

  public function setApellidos($apellidos) {
    $this->apellidos = $apellidos;
  }

  public function setEmail($email) {
    $this->email = $email;
  }

  public function setNombreUsuario($nombreUsuario) {
    $this->nombreUsuario = $nombreUsuario;
  }

  public function setClave($clave) {
    $this->clave = $clave;
  }

  public function setMensajes($mensaje) {
    $this->mensajes[] = $mensaje;
  }
}
?>
