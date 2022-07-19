<h1 class="nombre-pagina">Olvidé Contraseña</h1>
<p class="descripcion-pagina">Reestablece tu password escribiendo tu email a continuación</p>
<?php 
    include_once __DIR__ . "/../templates/alertas.php";
?> 

<div class="contenedor-formulario">
    <form class="formulario" action="/olvide" method="POST">
        <div class="campo">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Ingresa tu email">
        </div>
        <div style="width: 100%; display: flex; justify-content: center">
            <input type="submit" class="boton" value="Enviar Instrucciones">
        </div>
    </form>
</div>
<div class="acciones">
    <a href="/">Inicia Sesión</a>
    <a href="/crear-cuenta">Crear una cuenta</a>
</div>