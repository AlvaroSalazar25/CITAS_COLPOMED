<h1 class="nombre-pagina">Agenda tu cita médica</h1>
<p class="descripcion-pagina"> Inicia sesión con tus datos</p>
<?php 
    include_once __DIR__ . "/../templates/alertas.php";
?> 

<div class="contenedor-formulario">
<form class="formulario" action="/" method="POST">
    <div class="campo">
        <label for="email"> <strong> Email: </strong></label>
        <input type="email" id="email" name="email" placeholder="Escribe tu email " value="<?php echo s($auth->email) ?>"  >
    </div>
    <div class="campo">
        <label for="password"> <strong>Contraseña:</strong></label>
        <input type="password" id="password" name="password" placeholder="Escribe tu contraseña">
    </div>
    <div style="width: 100%; display: flex; justify-content: center">
    <input type="submit" class="boton" value="Inciar Sesión">
    </div>
</form>
</div>
<div class="acciones">
    <a href="/crear-cuenta">Crear una cuenta</a>
    <a href="/olvide">¿ Olvidé mi contraseña ?</a>
</div>
