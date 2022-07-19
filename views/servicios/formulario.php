
<div class="campo">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" placeholder="Nuevo servicio" value="<?php echo $servicio->nombre ?>" >
</div>
<div class="campo" style="align-items:flex-start ;">
    <label for="nombre" >Descripción:</label>
   <?php 
    if(isset($descripcion)){
   ?> 
 <textarea type="text" rows="5" id="descripcion" name="descripcion" placeholder="Descripción del nuevo servicio" style="border-radius:10px;width:100%"><?php echo $servicio->descripcion ?></textarea>
    <?php } else { ?>
        <textarea type="text" rows="5" id="descripcion" name="descripcion" placeholder="Descripción del nuevo servicio" style="border-radius:10px;width:100%" value="<?php echo $servicio->descripcion ?>"></textarea>
        <?php } ?> 
</div>
<div class="campo">
    <label for="nombre">Imagen:</label>
    <input type="text" id="imagen" name="imagen" placeholder="Url de imagen del nuevo servicio" value="<?php echo $servicio->imagen ?>">
</div>