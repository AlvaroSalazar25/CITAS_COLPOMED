<?php

function dd($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

function isAuth() : void {
    if(!isset($_SESSION['login'])){
        header('Location: /');
    }
}

//funcion para validar si el usuario es admin y dar permiso
function isAdmin() : void {
    if(!isset($_SESSION['admin'])){
        header('Location: /');
    }
}