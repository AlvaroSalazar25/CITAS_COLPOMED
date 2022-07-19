<h1 class="nombre-pagina" style="margin-bottom:1rem;">Crear servicios</h1>
<p class="descripcion-pagina" style="margin-top: 4px;text-align:center">Panel de administración para crear los servicios</p>

<?php
@include_once __DIR__ . "/../templates/barra.php";
?>

<?php
include_once __DIR__ . "/../templates/alertas.php";
?>
<div class=" contenedor-formulario" style="width:100%">
    <form action="/servicios/crear" method="POST" class="formulario">

        <?php 
            @include_once __DIR__ . "/formulario.php"
        ?> 
        <div style="display:flex; justify-content:center">
            <input type="submit" class="boton" value="Guardar Servicio">
        </div>
    </form>
</div>