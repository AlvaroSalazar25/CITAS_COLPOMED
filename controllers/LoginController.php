<?php

namespace Controllers;

use Classes\Email;
use MVC\Router;
use Model\Usuario;

class LoginController
{
    public static function login(Router $router)
    {
        $alertas = [];

        $auth = new Usuario;
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new Usuario($_POST);
            $alertas = $auth->validarLogin();

            if(empty($alertas)){
                //se debe comprobar que el usuasrio exista (email)
                $usuario = Usuario::where('email',$auth->email);

                if($usuario){

                    if($usuario->comprobarPasswordAndVerificado($auth->password)){
                        session_start();
                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre. " ". $usuario->apellido;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['login'] = true;

                            if($usuario->admin === "1"){
                                $_SESSION['admin'] = $usuario->admin ?? null;
                                header('Location: /admin');

                            } else{
                                header('Location: /cita');
                            }
                    }

                } else{
                    Usuario::setAlerta('error','Usuario no existe, por favor revisar email y contraseña');
                }
            }
        }

        $alertas = Usuario::getAlertas();

            $router->render('auth/login',[
                'alertas' => $alertas,
                'auth' => $auth
            ]);
    }
    
    public static function logout()
    {
        session_start();
        $_SESSION = [];
        header('Location: /');
    }
    public static function olvide(Router $router)
    {
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new Usuario($_POST);
            $alertas = $auth->validarEmail();


            if(empty($alertas)){
                $usuario = Usuario::where('email',$auth->email);
              if($usuario && $usuario->confirmado == "1"){
              //Generar el token de un solo uso
                $usuario->crearToken();
                $usuario->guardar();

                //Enviar email con token e instrucciones
                $email = new Email($usuario->email,$usuario->nombre, $usuario->token);
                $email->enviarInstrucciones();

                Usuario::setAlerta('exito','Instrucciones enviadas con éxito al correo ');
                $alertas = Usuario::getAlertas();
              }
              else{
               Usuario::setAlerta('error', 'El usuario no existe o no esta confirmado');
               $alertas = Usuario::getAlertas();
              }
            }
        }
        $router->render('auth/olvide', [
            'alertas'=>  $alertas
        ]);
    }
    public static function recuperar(Router $router)
    {
        $error = false;
        $alertas = [];
        $token = s($_GET['token']);
        $usuario = Usuario::where('token',$token);

        if(empty($usuario)){
            Usuario::setAlerta('error','Token no válido');
            $error = true;
            $alertas = Usuario::getAlertas();
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //TODO leeer la nueva contraseña y guardarla
            $password = new Usuario($_POST);
            $alertas = $password->validarPassword();
            $alertas = Usuario::getAlertas();

            if (empty($alertas)){
                $alertas = [];
                $usuario->password = null;
                $usuario->password = $password->password;
                $usuario->hashpassword();
                $usuario->token = null;
                $resultado = $usuario->guardar();

                if($resultado) {
                    // Crear mensaje de exito
                    Usuario::setAlerta('exito', 'Contraseña Actualizado Correctamente');
                    //mostramos la alerta 
                    $alertas = Usuario::getAlertas();             
                    // Redireccionar al login tras 3 segundos
                    header('Refresh: 3; url=/');
                }
            }       
         }

        $router->render('auth/recuperar',[
            'alertas'=>  $alertas,
            'usuario'=> $usuario,
            'error' => $error
            
        ]);
    }
    public static function crear(Router $router)
    {
        //instancia del modelo Usuario
        $usuario = new Usuario;
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sincronizar el modelo vacio del usuario con el metodo POST
            $usuario->sincronizar($_POST);
            // Enviar alertas a la vista
            $alertas = $usuario->validarCuenta();
            // Revisar que alerta esté vacio 
            if(empty($alertas)){
                // Verificar que el usuario no este registrado
               $resultado = $usuario->existeUsuario();
               if($resultado->num_rows){
                   $alertas = Usuario::getAlertas();
                   // Si no esta registrado ocurre esto
               } else{
                   // Hashear Password
                    $usuario->hashPassword();
                    // Generar un token
                    $usuario->crearToken();
                    // Enviar un email
                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->enviarConfirmacion();

                    //crear el usuario
                    $resultado = $usuario->guardar();

                    if($resultado){
                        header('Location: /mensaje');
                    }
                   //debuguear($usuario);
               }
            }
            //debuguear($alertas);
        }
        $router->render(
            'auth/crear-cuenta',
            [
                'usuario' => $usuario,
                'alertas' => $alertas
            ]
        );
    }

    public static function mensaje(Router $router)
    {
        $router->render('auth/mensaje');
    }
    public static function confirmar(Router $router)
    {   $alertas = [];
        $token =  s($_GET['token']);
        
        $usuario = Usuario::where('token',$token);

        if(empty($usuario)){
            Usuario::setAlerta('error','Token NO Válido');
        } else {
            //si existe el token, modificamos el confirmado a 1 y limpiamos el token, 
            $usuario->confirmado = "1";
            $usuario->token = null;
            $usuario->guardar();
            Usuario::setAlerta('exito','Cuenta creada correctamente');
        }
        //debuguear($usuario);
        //Obtenemos las alertas
        $confirmado =$usuario->confirmado ;
        $alertas = Usuario::getAlertas();
        //Renderizamos la vista de confirmar cuenta aqui, se envian las alertas
        $router->render('auth/confirmar-cuenta',[
            'confirmado' => $confirmado,
            'alertas' => $alertas
        ]);
    }

}
