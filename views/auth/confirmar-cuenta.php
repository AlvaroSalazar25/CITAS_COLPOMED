<h1 class="nombre-pagina">Confirmar Cuenta</h1>

<?php include_once __DIR__ . '/../templates/alertas.php'; ?>

<div class="acciones">

    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center">
        <?php if ($confirmado === "1") {  ?>
            <p>
                Ahora puedes iniciar sesión haciendo clic en el botón de abajo para redirigirte al formulario.
            </p>
            <a href="/" style="width: 40%; color:white" type="submit" class="boton">Inicia Sesión</a>
        <?php } else { ?>
            <p>
                No encotramos tu token para confirmar tu cuenta, por favor intenta registrarte otra vez y sigue los pasos a detalle para confirmar tu cuenta correctamente.
            </p>
            <a href="/crear-cuenta" style="width: 40%; color:white" type="submit" class="boton">Crear cuenta</a>
        <?php } ?>

    </div>
</div>