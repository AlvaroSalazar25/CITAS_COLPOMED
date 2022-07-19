<?php 

    namespace Model;

    class Servicio extends ActiveRecord{

        //base de datos
        protected static $tabla = 'servicios';
        protected static $columnasDB = ['id','nombre','descripcion','imagen'];

        public $id;
        public $nombre;
        public $descripcion;
        public $imagen;

        public function __construct($args = [])
        {
            $this->id = $args['id'] ?? null;
            $this->nombre = $args['nombre'] ?? null;
            $this->descripcion = $args['descripcion'] ?? null;
            $this->imagen = $args['imagen'] ?? null;
        }

        public function validar(){
            if(!$this->nombre){
                self::$alertas['error'][] = 'El nombre del servicio es obligatorio';
            }
            if(!$this->descripcion){
                self::$alertas['error'][] = 'La descripción del servicio es obligatoria';
            }
            if(strlen($this->descripcion) < 20 ){
                self::$alertas['error'][] = 'La descripción del servicio debe ser mayor a 20 palabras';
            }
            if(!$this->imagen){
                self::$alertas['error'][] = 'La Url de imagen del servicio es obligatoria';
            }
            return self::$alertas;
        }
    }
 