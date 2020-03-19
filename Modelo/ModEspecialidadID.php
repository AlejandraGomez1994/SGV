<?php
class EspecialidadId
{
    private $idEspecialidad;
    private $descripcion;

    public function __construct($idEspecialidad,$descripcion)
    {
        $this->idEspecialidad=$idEspecialidad;
        $this->descripcion=$descripcion;
    }
    public function setIdEspecialidad($idEspecialidad)
    {
        $this->especialidad=$idEspecialidad;
    }
    public function setDescripcion($descripcion)
    {
        $this->descripcion=$descripcion;
    }
    public function getIdEspecialidad()
    {
        return $this->idEspecialidad;
    }
    public function getDescripcion()
    {
       return $this->descripcion;
    }
    public static function ListarEspecialidad()
    {
        $listaEspecialidad=[];
        $db=Db::getConnect();
        $sql=$db->query("SELECT * FROM especialidad");
        foreach ($sql->fetchAll() as $especialidad) {
            $listaEspecialidad[]=new EspecialidadId($especialidad['IdEspecialidad'],$especialidad["Descripcion"]);
        }
        return $listaEspecialidad;
    }
    public static function BuscarId($descripcion)
    {
        $listaEspecialidad=[];
        $db=Db::getConnect();
        $sql=$db->query("SELECT * FROM especialidad WHERE Descripcion='$descripcion'");
        $especialidadDb=$sql->fetch();
        $especialidad= new EspecialidadId($especialidadDb['IdEspecialidad'],$especialidadDb['Descripcion']);
        return $especialidad;
    }
}
?>
