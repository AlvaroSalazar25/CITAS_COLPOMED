<?php 
    foreach( $alertas as $key => $mensajes ){
        foreach($mensajes as $mensaje){
?> 
    <div class="alerta <?php echo $key;?> "  style="width:100%" >
        <?php echo $mensaje; ?> 
    </div>
    
<?php
    } 
}   
?> 

