<h1 class="nombre-pagina" style="margin-bottom:1rem;">Panel de Administración</h1>
<p class="descripcion-pagina" style="margin-top: 4px;text-align:center"></p>
<?php
include_once __DIR__ . "/../templates/alertas.php";
?>
<?php 
include_once __DIR__ . "/../templates/barra.php";
?> 

<div class="contenedor-formulario" style="width: 100% ;">
    <h3 style="color:white;margin:2.5rem 0 0 0">Buscar citas</h3>
    <div class="busqueda">
        <form class="formulario" style="margin-top:0" action="">
            <div class="campo">
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha" value="<?php echo $fecha  ?>" >
            </div>
        </form>
    </div>

</div>



<h3 style="margin-top: 2rem;margin-bottom:1rem">Citas</h3>
<div style="width:100%;border-bottom:2px solid;margin-bottom:2rem"></div>

<?php if(count($citas) === 0){ ?>
        <div class="boton" style="width: 100%; background-color:brown;cursor:auto">
        <h style="color:white">No hay citas en esta fecha !</h3>
        </div>
    <?php } ?>  
<div class="citas-admin">
    <?php foreach ($citas as $cita) { ?>

        <div class="imagen-cita">
            <img class="" src="<?php echo $cita->imagen ?>" alt="">

            <div class="div-cita">
                <p style="text-align: center"> <strong><?php echo $cita->servicio ?></strong></p>
                <br>
                <p><strong>Hora: </strong><span style="margin-left:8px"> <?php echo $cita->hora ?> </span></p>
                <p><strong>Cliente:</strong> <span style="margin-left:8px"> <?php echo $cita->cliente ?> </span></p>
                <p><strong>Teléfono: </strong><span style="margin-left:8px"> <?php echo $cita->telefono ?> </span></p>
                <p><strong>Email: </strong><span style="margin-left:8px"> <?php echo $cita->email ?> </span></p>
                <form action="/api/eliminar" method="POST">
                    <input type="hidden" name="id" value=" <?php echo $cita->id; ?>" >
                    <input type="submit" class="boton" value="Eliminar cita" style="width:100%;background-color:brown">
                </form>
            </div>
        </div>
    <?php } ?>

</div>

<?php 
    $script = "<script src='build/js/buscador.js'></script>"
?> 