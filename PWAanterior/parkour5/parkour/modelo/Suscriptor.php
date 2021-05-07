<?php
class Suscriptor
{
    private $nombre;
    private $empresa;
    private $telefono;
    private $objProvincia;
    private $comentarios;
    private $mensajeoperacion;

    public function __construct()
    {
        $this->nombre = "";
        $this->empresa = "";
        $this->telefono = 0;
        $this->objProvincia = new Provincia();
        $this->comentarios = [];
        $this->mensajeoperacion = "";
    }

    /**
     * @param string $nombr
     * @param string $empres
     * @param int $tel
     * @param Provincia $objProv
     */
    public function setear($name, $empres, $tel, $objProv)
    {
        $this->setNombre($name);
        $this->setEmpresa($empres);
        $this->setTelefono($tel);
        $this->setObjProvincia($objProv);
    }

    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }
    /**
     * @return string
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }
    /**
     * @return int
     */
    public function getTelefono()
    {
        return $this->telefono;
    }
    /**
     * @return Provincia
     */
    public function getObjProvincia()
    {
        return $this->objProvincia;
    }
    /**
     * @return array
     */
    public function getComentarios()
    {
        return $this->comentarios;
    }
    /**
     * @return string
     */
    public function getmensajeoperacion()
    {
        return $this->mensajeoperacion;
    }
    /**
     * @param string $nombr
     */
    public function setNombre($nombr)
    {
        $this->nombre = $nombr;
    }
    /**
     * @param string $empres
     */
    public function setEmpresa($empres)
    {
        $this->empresa = $empres;
    }
    /**
     * @param int $tel
     */
    public function setTelefono($tel)
    {
        $this->telefono = $tel;
    }
    /**
     * @param Provincia $objProv
     */
    public function setObjProvincia($objProv)
    {
        $this->objProvincia = $objProv;
    }
    /**
     * @param array $colComentario
     */
    public function setComentarios($colComentario)
    {
        $this->comentarios = $colComentario;
    }
    /**
     * @param string $valorMensaje
     */
    public function setmensajeoperacion($valorMensaje)
    {
        $this->mensajeoperacion = $valorMensaje;
    }

    /**
     * solo necesitamos que el Suscriptor tenga su id seteado para cargar todos los demas valores
     * @return boolean
     */
    public function cargar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM suscriptor WHERE nombre_suscriptor = '" . $this->getNombre() . "'";
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $fila = $base->Registro();
                    $objProv = new Provincia();
                    $objProv->setIdProvincia($fila['id_provincia']);
                    $objProv->cargar();
                    $this->setear($fila['nombre_suscriptor'], $fila['empresa_suscriptor'], $fila['telefono_suscriptor'], $objProv);
                }
            }
        } else {
            $this->setmensajeoperacion("Suscriptor->listar: " . $base->getError());
        }
        return $resp;
    }

    /**
     * una vez que el Suscriptor tenga sus valores seteados insertamos un nuevo Suscriptor
     * con estos valores en la base de datos
     * @return boolean
     */
    public function insertar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO suscriptor (nombre_suscriptor, empresa_suscriptor, telefono_suscriptor, id_provincia)  VALUES ('" . $this->getNombre() . "','" . $this->getEmpresa() . "'," . $this->getTelefono() . " , '" . $this->getObjProvincia()->getIdProvincia() . "');";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Suscriptor->insertar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("Suscriptor->insertar: " . $base->getError());
        }
        return $resp;
    }

    /**
     * si seteamos nuevos datos no nos alcanza utilizar un metodo set sobre Suscriptor
     * sino que debemos reflejar los nuevos cambios sobre la base de datos
     * @return boolean
     */
    public function modificar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE suscriptor SET empresa_suscriptor='" . $this->getEmpresa() . "' , telefono_suscriptor=" . $this->getTelefono() . ", id_provincia=" . $this->getObjProvincia()->getIdProvincia() . " WHERE nombre_suscriptor='" . $this->getNombre() . "'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Suscriptor->modificar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("Suscriptor->modificar: " . $base->getError());
        }
        return $resp;
    }

    /**
     * para borrar el Suscriptor de manera permanente lo debemos hacer en la base de datos
     * entonces al estar seteada el id, nos basta para buscarlos y realizar un DELETE
     * @return boolean
     */
    public function eliminar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM suscriptor WHERE nombre_suscriptor='" . $this->getNombre() . "'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Suscriptor->eliminar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("Suscriptor->eliminar: " . $base->getError());
        }
        return $resp;
    }

    /**
     * guardamos los Suscriptores en un arreglo para poder manipular sobre ellos,
     * tenemos el parametro para cualquier especificacion sobre la busqueda de los Suscriptores
     * pero si el parametro es vacio solamente mostrarmos a los objTraceurs sin restricciones
     * @param string $parametro
     * @return array
     */
    public static function listar($parametro = "")
    {
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM suscriptor ";
        if ($parametro != "") {
            $sql .= 'WHERE ' . $parametro;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {
                while ($fila = $base->Registro()) {
                    $obj = new Suscriptor();
                    $objProv = new Provincia();
                    $objProv->setIdProvincia($fila['id_provincia']);
                    $objProv->cargar();
                    $obj->setear($fila['nombre_suscriptor'], $fila['empresa_Suscriptor'], $fila['telefono_suscriptor'], $objProv);
                    $obj->cargarComentarios();
                    array_push($arreglo, $obj);
                }
            }
        } else {
            Suscriptor::setmensajeoperacion("Suscriptor->listar: " . $base->getError());
        }
        return $arreglo;
    }

    public function cargarComentarios()
    {
        $this->setComentarios(Comentario::listar("nombre_suscriptor='" . $this->getNombre() . "'"));
    }
}
