

<?php if (isset($_SESSION['admin'])) { ?>

    <div class="barra">
    <p><strong>Admin:</strong><span style="text-transform: uppercase ;"><?php echo $nombre; ?></span></p>

    <a class="boton" href="/logout">Cerrar Sesión</a>
    </div>


    <div class="barra-servicios">
        <a class="boton servi" href="/admin">Ver Citas</a>
        <a class="boton servi" href="/servicios">Ver Servicios</a>
        <a class="boton servi" href="/servicios/crear">Crear Servicio</a>
    </div>
<?php } else { ?>
    <div class="barra">
    <p><strong>Paciente:</strong><span style="text-transform: uppercase ;"><?php echo $nombre; ?></span></p>

    <a class="boton" href="/logout">Cerrar Sesión</a>
</div>

    <?php } ?> 