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

			$nombre = $archivo["name"];
			$nombre = preg_replace("/[^a-zA-Z0-9._-]/", "", $nombre);
			echo "<br>Nombre limpio: $nombre <br>";
			$directorio = "uploads/";
			$nombre = time()."-".$nombre;
			$newFile=$directorio.$nombre;
			if(@move_uploaded_file($archivo["tmp_name"],$newFile))
			{
				echo "Guardado en: $newFile <br>";
				echo "Contenido del archivo: <i><br><br>";
				readfile($newFile);
				echo "</i>";
			}
			else
				echo "Error al escribir en $newFile<br>";
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
         <input type="submit" name="enviar" value="Enviar" />
</form>

</BODY>
</HTML>