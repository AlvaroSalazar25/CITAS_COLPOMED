<h1 class="nombre-pagina" style="margin-bottom:1rem;" >Crear nueva cita</h1>
<p class="descripcion-pagina" style="margin-top: 4px;text-align:center"> Elige tus servicios y coloca tus datos</p>
<?php 
    include_once __DIR__ . "/../templates/alertas.php";
?> 

<?php 
@include_once __DIR__ . "/../templates/barra.php";
?> 

<div id="app" style="margin-top: 3rem;width:100%">
    <nav class="tabs">
        <button class="" type="button" data-paso="1">Servicios</button>
        <button class="" type="button" data-paso="2">Información</button>
        <button class="" type="button" data-paso="3">Resumen</button>

    </nav>
    <div class="seccion " id="paso-1">
        <h2>Servicios</h2>
        <p class="text-center">Elige tus servicios a continuación</p>
        <div class="listado-servicios" id="servicios" >
        </div>
    </div>
    <div class="seccion" id="paso-2">
    <h2>Información</h2>
    <p class="text-center">Ingrese sus datos personales y fecha de cita</p>
        <div class="divi">
        
        </div>
        <div class="contenedor-formulario">

            <form action="" class="formulario">
                <div class="campo">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" placeholder="Ingrese su nombre" value="<?php echo $nombre ?>" disabled>
                </div>
                <div class="campo fecha">
                <label for="fecha">Fecha</label>
                    <input type="date" id="fecha" min="<?php echo date('Y-m-d',strtotime('+1 day')) ?>" placeholder="Ingrese fecha de consulta">
                </div> 
                <div class="campo">
                <label for="fecha">Hora</label>
                    <input type="time" id="hora" placeholder="Ingrese fecha de consulta">
                </div>
                <input type="hidden" id="id" value="<?php echo $id; ?>"> 

            </form>
        </div>
    </div>
    <div class="seccion contenido-resumen" id="paso-3">
    <h2>Resumen</h2>
        <p class="text-center" style="margin-bottom:5rem !important">Verifique que la información ingresada sea correcta</p>
    </div>

    <div class="paginacion">
        <button class="boton" id="anterior">&laquo;  Anterior</button>
        <button class="boton" id="siguiente">Siguiente &raquo;</button>
    </div>
</div>

<?php $script = "
<script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<script src='build/js/app.js'></script>

" ?> 