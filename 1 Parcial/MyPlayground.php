<HTML>
<meta charset="UTF-8">
<HEAD>
   <TITLE>Formulario Único</TITLE>
</HEAD>
<BODY>

<?php
	if($_SERVER["REQUEST_METHOD"] == "POST")
   {
      if(strlen(trim($_POST["texto"]))<4)
			$errores["texto"] = "La palabra debe ser de 4 a 8 caracteres";
 		if(!isset($errores)) //No hay errores
		{
			echo "<h2>Formulario único: Datos leidos</h2>";
			foreach ($_REQUEST as $i => $e)
			{
				echo "<b>$i</b> = ";
				var_dump($e);
				echo "<br>";
			}
			echo "<br> [ <a href= ".htmlspecialchars($_SERVER['PHP_SELF'])."> Nuevo formulario</a> ]\n";
			return;
		}
   }
?>
   <h2>Formulario único: Captura y validación</h2>
   <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
   Escribe una palabra de 4 a 8 caracteres: <input type="text" name="texto" value="" placeholder="Algo" size="10" maxlength="8" required>
   <font color="red"> <?php echo @$errores["texto"]?></font> <br>
   Selecciona una opcion:<br>
   <input type="radio" name="opc" value="1" required> Radio 1
   <input type="radio" name="opc" value="2"> Radio 2
   <input type="radio" name="opc" value="3"> Radio 3 <br>
   Selecciona una opcion:<br>
   <select name="opc2" required>
	<option selected="true"> </option>
   <option value="1"> Opción 1
   <option value="2"> Opción 2
   <option value="3"> Opción 3
   <option value="4"> Opción 4
   </SELECT><BR>
	<input type="submit" value="Enviar">
   </form>
</BODY>
</HTML>
