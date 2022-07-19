<?php 

namespace Model;

class AdminCita extends ActiveRecord{

        //base de datos
        protected static $tabla = 'citasservicios';
        protected static $columnasDB = ['id','hora','cliente','email','telefono','servicio','imagen'];
    
        public $id;
        public $hora;
        public $cliente;
        public $email;
        public $telefono;
        public $servicio;
        public $imagen;

        public  function __construct($args = [])
        {
            $this->id = $args['id'] ?? null;
            $this->hora = $args['hora'] ?? '';
            $this->cliente = $args['cliente'] ?? '';
            $this->email = $args['email'] ?? '';
            $this->telefono = $args['telefono'] ?? '';
            $this->servicio = $args['servicio'] ?? '';
            $this->imagen = $args['imagen'] ?? '';

        }


}