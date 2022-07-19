<h1 class="nombre-pagina" style="margin-bottom:1rem;">Servicios</h1>
<p class="descripcion-pagina" style="margin-top: 4px;text-align:center">Administración de todos los servicios creados</p>
<?php
include_once __DIR__ . "/../templates/alertas.php";
?>

<?php
@include_once __DIR__ . "/../templates/barra.php";
?>
<div class="admin-servicio">
<div class="listado-servicios" style="width:100%">
<?php foreach($servicios as $servicio){ ?> 
    <div class="servicio">
        <div class="contenedor-nombre">
            <p class="nombre-servicio"> <?php echo $servicio->nombre ?> </p>
        </div>
        <div class="contenedor-descripcion">
            <p class="descripcion-servicio">
            <?php  echo $servicio->descripcion ?>
            </p>
        </div><img class="imagen-servicio" src="<?php  echo $servicio->imagen ?>">
        <div class="botones"> 
            <a href="/servicios/actualizar?id=<?php echo $servicio->id;  ?>" class="boton editar">Editar</a>
            <form action="/servicios/eliminar" method="POST">
                <input type="hidden"name="id" value="<?php echo $servicio->id;  ?>" >
                <input type="submit" class="boton eliminar" value="Eliminar"> 
            </form>
        </div>
    </div>
    <?php } ?> 
</div>
</div>
