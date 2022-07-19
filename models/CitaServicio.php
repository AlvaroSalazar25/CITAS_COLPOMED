<?php 

namespace Model;

class CitaServicio extends ActiveRecord{
    protected static $tabla = 'citasservicios';
    protected static $columnasDB = ['id','citaId','servicioId'];

    public $id ;
    public $citaId ;
    public $servicioId ;

    public function __construct($args = []){
        $this->id  = $args['id'] ?? null;
        $this->citaId  =  $args['citaId'] ?? '';
        $this->servicioId = $args['servicioId'] ?? '';
        //creo que no hace falta hacer este modelo, como es un servicio, tranquilamente se puede hacer
        //  en una sola tabla
    }
}