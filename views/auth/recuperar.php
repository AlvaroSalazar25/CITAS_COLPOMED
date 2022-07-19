<h1 class="nombre-pagina">Recuperar contraseña</h1>
<p class="descripcion-pagina"> Ingresa tu nueva contraseña</p>
<?php 
    include_once __DIR__ . "/../templates/alertas.php";
?> 
    <?php 
    if(!$error){
        ?> 
        <div class="contenedor-formulario">
        <form class="formulario" method="POST">
            <div class="campo">
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" placeholder="Ingrese su nueva contraseña">
            </div>
            <div style="width: 100%; display: flex; justify-content: center">
                <input type="submit" class="boton" value="Inciar Sesión">
                </div>
            </form>
        </div>
        <div class="acciones">
    <a href="/"> <i style="margin-right: 5px;" class="fas fa-user"></i> Inicia Sesión</a>
    <a href="//crear-cuenta"><i style="margin-right: 5px;" class="fa-solid fa-user-plus"></i>Crear cuenta</a>
</div>

    <?php 
    }
    ?> 



<script src="https://kit.fontawesome.com/50e215d7ac.js" crossorigin="anonymous"></script>