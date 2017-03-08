<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
      <span>Introduce una palabra a buscar: </span> <input placeholder="Palabra" required="true"></input>
      <br>
      <span>Selecciona en donde buscar: </span>
      <input type="radio" name="tipo" value="web"> Página web
      <input type="radio" name="tipo" value="archivo"> Archivo<br>
      <span>Selecciona un archivo </span><input type="file" name="file" value="1048576" required><br>
      <span hidden="archivo" show="web">Página Web: </span> <input hidden="archivo" placeholder="url" required="true"></input>
      <input type="submit" name="enviar" value="Enviar" />
    </form>

    <?php

    if($_SERVER["REQUEST_METHOD"] == "POST")
     {

       echo "<h2>Datos del archivo cargado</h2>";

       @$archivo=$_FILES["file"];
       if(is_uploaded_file($archivo["tmp_name"]))
       {
           echo '<b>Datos en $FILES["file"]:</b> <br>';
         foreach ($_FILES["file"] as $i => $e)
         {
           echo "<b>$i</b> = ";
           var_dump($e);
           echo "<br>";
         }



       if( $_FILES["file"]["type"] != "text/plain"&&
           $_FILES["file"]["type"] != "application/vnd.openxmlformats-officedocument.wordprocessingml.document" &&
           $_FILES["file"]["type"] != "application/msword" &&
           $_FILES["file"]["type"] != "application/vnd.oasis.opendocument.text")

            $error .= "No es un archivo txt<br />";

       echo $error;
     }
   }
     else {
       @$error=$archivo["error"];
    		if($error==UPLOAD_ERR_INI_SIZE)
 				echo "Tamaño de php.ini excedido";
    		elseif($error==UPLOAD_ERR_FORM_SIZE)
 				echo "Tamaño de formulario excedido";
 			else
 				echo "Posiblemente no se cargó el archivo <BR>";

        echo $_FILES["file"]["type"] ;

        if( $_FILES["file"]["type"] != "text/plain"&&
     			  $_FILES["file"]["type"] != "application/vnd.openxmlformats-officedocument.wordprocessingml.document" &&
     		   	$_FILES["file"]["type"] != "application/msword" &&
         		$_FILES["file"]["type"] != "application/vnd.oasis.opendocument.text")

             $error .= "No es un archivo txt<br />";

        echo $error;


     }
// $_FILES["file"]["type"] != "text/plain"
    /*if($_SERVER["REQUEST_METHOD"] == "POST")
     {
      echo "<h2>Datos del archivo cargado</h2>";

      @$archivo=$_FILES["file"];
      if(is_uploaded_file($archivo["tmp_name"]))
      {
          echo '<b>Datos en $FILES["archivo"]:</b> <br>';
        foreach ($_FILES["file"] as $i => $e)
        {
          echo "<b>$i</b> = ";
          var_dump($e);
          echo "<br>";
        }

        $nombre = $file["name"];
        $nombre = preg_replace("/[^a-zA-Z0-9._-]/", "", $nombre);
        echo "<br>Nombre limpio: $nombre <br>";
        $fp = fopen($nombre, "r");
        while(!feof($fp)) {
          $linea = fgets($fp);
          echo $linea . "<br />";
        }
        fclose($fp);
      }else{

        if(empty($_FILES)) {
          echo "subir archivo";
        }

        if($_FILES["file"]["error"] >0) {
          if (is_uploaded_file($_FILES['file']['tmp_name'])) {
             echo "Archivo ".$_FILES["file"]["type"] != "text/plain"." subido con éxtio.\n";
             echo "Monstrar contenido\n";
           }else {
             echo "no hay archivos";
           }
          }



        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
           echo "Archivo ". $_FILES['file']['name'] ." subido con éxtio.\n";
           echo "Monstrar contenido\n";
         }


       @$error=$archivo["error"];
       echo $error;



       if( $_FILES["file"]["type"] != "text/plain"&&
    			  $_FILES["file"]["type"] != "application/vnd.openxmlformats-officedocument.wordprocessingml.document" &&
    		   	$_FILES["file"]["type"] != "application/msword" &&
        		$_FILES["file"]["type"] != "application/vnd.oasis.opendocument.text")

            { $error .= "No es un archivo txt<br />";
               echo "No archivo txt";
             }

        elseif($error==UPLOAD_ERR_INI_SIZE)
            echo "Tamaño de php.ini excedido";
          elseif($error==UPLOAD_ERR_FORM_SIZE)
            echo "Tamaño de formulario excedido";
          else
            echo "Posiblemente no se cargó el archivo <BR>";


       }
      return;
    }*/


    if(isset($_FILES['file'])){
      echo "Is set";
    }
    ?>
  </body>
</html>
