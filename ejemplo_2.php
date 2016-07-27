<?php
$mensaje='';
if(isset($_POST["grabar"]) and $_POST["grabar"]=="si")
{
    if(empty($_FILES["file"]["name"][0]))
    {
        $mensaje.='Debe seleccionar un archivo';
    }else
    {
        $total=count($_FILES["file"]["name"]);
        $contador=1;
        for($i=0;$i<$total;$i++)
        {
            if($_FILES["file"]["type"][$i]=='image/jpeg' or $_FILES["file"]["type"][$i]=='image/png')
            {
                copy($_FILES["file"]["tmp_name"][$i],'public/upload/'.$_FILES["file"]["name"][$i]);
                $mensaje.='La foto '.$contador.'  se ha subido exitosamente exitosamente<br />';
            }else
            {
                $mensaje.='La foto '.$contador.' no ha podido subirse debido al formato del archivo<br />';
            }
            $contador++;
        }
    }
    
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Upload simple</title>
        <link rel="stylesheet" href="public/css/bootstrap.min.css"  /> 
    </head>
    <body>
    
        <div class="container">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Upload simple</h3>
              </div>
              <div class="panel-body">
                <?php
                if(!empty($mensaje))
                {
                    ?>
                    <div class="alert alert-danger"><?php echo $mensaje?></div>
                    <?php
                }
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    
                    <p>
                        <input type="file" name="file[]" multiple="true" />
                    </p>
                    
                    <p>
                    <hr />
                    <input type="hidden" name="grabar" value="si" />
                    <input type="submit" value="Enviar" />
                    </p>
                    
                </form>
                
                
              </div>
            </div>
        </div>
        
    <script src="public/js/jquery-1.10.2.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/funciones.js"></script>
    </body>
</html>
