<HTML>
<meta charset="UTF-8">
<HEAD>
   <TITLE>Subir Archivo</TITLE>
</HEAD>
<BODY>

<?php
	if($_SERVER["REQUEST_METHOD"] == "POST")
   {
		echo "<h2>Datos del archivo cargado</h2>";



		@$archivo=$_FILES["archivo"];
		if(is_uploaded_file($archivo["tmp_name"]))
		{
		  	echo '<b>Datos en $FILES["archivo"]:</b> <br>';
			foreach ($_FILES["archivo"] as $i => $e)
			{
				echo "<b>$i</b> = ";
				var_dump($e);
				echo "<br>";
			}

      if($_FILES["archivo"]['type']!="text/plain" && $_FILES["archivo"]['type']!="text/rtf" )
        echo "Error archivo no es Archivo de Texto";
        echo "<br>";

			$nombre = $archivo["name"];
			$nombre = preg_replace("/[^a-zA-Z0-9._-]/", "", $nombre);
			echo "<br>Nombre limpio: $nombre <br>";

      echo "<br>Palabra<br>";
      $palabra=$_POST['palabra'];
      echo $palabra;

      // Le dice al Browser que no parse en HTML
    //  header('Content-Type: text/plain');
    //  echo "<br>Contenido<br>";
      $contenido=file_get_contents($_FILES['archivo']['tmp_name']);
      //echo $contenido;
      		echo "<br><br>Búsqueda<br>";
  //    $patron = preg_quote($palabra, '/');
      $patron =  "/^.*$palabra.*\$/m";
      if(preg_match_all($patron, $contenido, $matches)){
         //separa datos de arreglo
         echo implode("<br>", $matches[0])."<br>";
      //   print_r($matches);
      }
      else{
         echo "No matches found";
      }

      $number =count($matches[0]);

      echo "<br> Se encontraron ".$number." instancias de ".$palabra;


	 	}
	  	else
	  	{
   		@$error=$archivo["error"];


   		if($error==UPLOAD_ERR_INI_SIZE)
				echo "Tamaño de php.ini excedido";
   		elseif($error==UPLOAD_ERR_FORM_SIZE)
				echo "Tamaño de formulario excedido";
      else
				echo "Posiblemente no se cargó el archivo <BR>";
	   }
	  return;
	}
?>
<h2> Subir Archivo </h2>
<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
         Selecciona un archivo (Max 1 MB):
         <input type="hidden" name="MAX_FILE_SIZE" VALUE="1048576">
			<input type="file" name="archivo" required> <br>
      <span>Introduce una palabra a buscar: </span>
       <input placeholder="Palabra" type="text" name="palabra" required="true"></input>
      <br>
      <!--<span>Selecciona en donde buscar: </span>
      <input type="radio" name="tipo" value="web"> Página web
      <input type="radio" name="tipo" value="archivo"> Archivo<br>
      <span>Selecciona un archivo </span><input type="file" name="file" value="1048576" required><br>
      <span hidden="archivo" show="web">Página Web: </span> <input hidden="archivo" placeholder="url" required="true"></input>-->
         <input type="submit" name="enviar" value="Enviar" />
</form>

</BODY>
</HTML>
