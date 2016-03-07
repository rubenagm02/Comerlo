<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 06/03/2016
 * Time: 11:05 PM
 */

class DaoUsuario {

    public function insertar (Usuario $usuario) {
        $query = "INSERT INTO Usuario VALUES (DEFAULT,
                      '{$usuario->getNombre()}',
                      '{$usuario->getIdCliente()}',
                      '{$usuario->getDescripcion()}');";

        $consulta = $this->conexion->query($query);

        if ($query) {

            return true;
        } else {

            return false;
        }
    }

    public function actualizar (Usuario $usuario) {
        $query = "UPDATE Usuario SET
                      Nombre = {$usuario->getNombre()},
                      Password = {$usuario->getPassword()}
                      WHERE Id = {$usuario->getId()};";

        $consulta = $this->conexion->query($query);

        if ($consulta) {

            return true;
        } else {

            return false;
        }
    }

    public function consultar ($id) {
        $query = "SELECT * FROM Usuario WHERE Id = $id";

        $consulta = $this->conexion->query($query);

        if ($consulta) {

            return $this->crearObjeto($consulta->fetch_assoc());
        } else {

            return false;
        }
    }

    private function crearObjeto ($fila) {
        $usuario = new Usuario();

        $usuario->setId($fila['Id']);
        $usuario->setNombre($fila['Nombre']);
        $usuario->setPassword($fila['Password']);
        $usuario->setPuesto($fila['Puesto']);

        return $usuario;
    }
}

class Usuario {
    private $id;
    private $nombre;
    private $puesto;
    private $password;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getPuesto()
    {
        return $this->puesto;
    }

    /**
     * @param mixed $puesto
     */
    public function setPuesto($puesto)
    {
        $this->puesto = $puesto;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

}