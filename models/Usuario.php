<?php 

namespace Model;

class Usuario extends ActiveRecord{
    //Base de datos
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id','nombre','apellido','email','password','telefono','admin','confirmado','token'];

    public $id;
    public $nombre ;
    public $apellido ;
    public $email ;
    public $password ;
    public $telefono ;
    public $admin ;
    public $confirmado ;
    public $token ;
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null ;
        $this->nombre = $args['nombre'] ?? '' ;
        $this->apellido = $args['apellido'] ?? '' ;
        $this->telefono = $args['telefono'] ?? '' ;
        $this->email = $args['email'] ?? '' ;
        $this->password = $args['password'] ?? '' ;
        $this->admin = $args['admin'] ?? "0" ;
        $this->confirmado = $args['confirmado'] ?? "0" ;
        $this->token = $args['token'] ?? '' ;
    }

    //Funcion para mensajes de validacion para crear una cuenta
    public function validarCuenta(){
        if(!$this->nombre){
            self::$alertas['error'][] = 'El campo Nombre es Obligatorio';
        }
        if(!$this->apellido){
            self::$alertas['error'][] = 'El campo apellido es Obligatorio';
        }
        if(!$this->telefono){
            self::$alertas['error'][] = 'El campo telefono es Obligatorio';
        }
        if(!$this->email){
            self::$alertas['error'][] = 'El campo Correo es Obligatorio';
        }
        if(!$this->password){
            self::$alertas['error'][] = 'El campo Contraseña es Obligatorio';
        }
        // Controlar el ingreso de la cotraseña
        if(strlen($this->password) < 6 ){
            self::$alertas['error'][] = 'El campo Contraseña debe contener al menos 6 caracteres';
        }
        // envio el array de alertas por medio del metodo al controlador
        return self::$alertas;
    }
    
    //Revisa que se agerguen los datos de iniciar sesion
    public function validarLogin(){
        if(!$this->email){
            self::$alertas['error'][] = 'El email es Obligatorio';
        }
        if(!$this->password){
            self::$alertas['error'][] = 'El pasworld es Obligatorio';
        }
        return self::$alertas;
    }

    public function validarEmail(){
        if(!$this->email){
            self::$alertas['error'][] = 'El email es Obligatorio';
        }
        return self::$alertas;
    }

    public function validarPassword(){
        if(!$this->password){
            self::$alertas['error'][] = 'El campo Contraseña es Obligatorio';
        }
        // Controlar el ingreso de la cotraseña
        if(strlen($this->password) < 6 ){
            self::$alertas['error'][] = 'El campo Contraseña debe contener al menos 6 caracteres';
        }
        // envio el array de alertas por medio del metodo al controlador
        return self::$alertas;
    }
    // Revisa si el usuario existe
    public function existeUsuario(){
        $query = " SELECT * FROM ". self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";

        $resultado = self::$db->query($query);

        if($resultado->num_rows){
            self::$alertas['error'][] = 'El Usuario ya esta registrado';
        }
        return $resultado;
    }

    // Funcion para crear el hasheo al password del usuario 
    public function hashPassword(){
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }
    // Funcion para crear un token aleatorio
    public function crearToken(){
        $this->token = uniqid();
    }

    public function comprobarPasswordAndVerificado($password){
        $resultado = password_verify($password,$this->password);

        if(!$resultado || !$this->confirmado){
            self::$alertas['error'][] = 'Contraseña incorrecta o la cuenta no a sido confirmada';
        } else{
            return true;
        }
    }
}