<?php 

namespace Controllers;

use Model\Cita;
use Model\CitaServicio;
use Model\Servicio;

class APIController{

    public static function index(){
        $servicios = Servicio::all();
        echo json_encode($servicios);
    }
    public static function guardar(){
        // Instacio un objeto del modelo Cita para guardar los datos del request aqui
        $cita = new Cita($_POST); //almacena la cita 
        //metodo de active record para guardar el resultado en la BD
        $resultado = $cita->guardar(); //y devuelve el id de la cita en un arreglo

        $id = $resultado['id'];
        // //para poder ver en la vista lo que me llega
        // //   Almacena la cita y el servicio
        $serviciosCliente = [
            'citaId' => $id,
            'servicioId' => $_POST['servicios']
        ];
        $citaServicio = new CitaServicio($serviciosCliente);
        $citaServicio->guardar();
        
        $response = [
            'resultado' => $resultado
        ];
        echo json_encode($response);
        // $cita->servicios;
    }
     
    public static function eliminar(){
       if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_POST['id'];
        
        $cita = Cita::find($id);
        //dd($cita); //instancia de la cita
        $cita->eliminar();
       
        header('Location:' . $_SERVER['HTTP_REFERER']);
        
       }
    }
}