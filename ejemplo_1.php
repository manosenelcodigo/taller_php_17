<?php
$mensaje='';
if(isset($_POST["grabar"]) and $_POST["grabar"]=="si")
{
    //echo $_FILES["file"]["type"];
    if(empty($_FILES["file"]["name"]))
    {
        $mensaje.='Debe seleccionar un archivo';
    }else
    {
        if($_FILES["file"]["type"]=='image/jpeg' or $_FILES["file"]["type"]=='image/png')
        {
            copy($_FILES["file"]["tmp_name"],'public/upload/'.$_FILES["file"]["name"]);
            $mensaje.='Se ha subido 1 archivo exitosamente';
        }else
        {
            $mensaje.='El formato del archivo no es correcto';
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
                        <input type="file" name="file" />
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
