<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form id="myform" method="post" enctype="multipart/form-data" action="pracUnoCarl.php">
      <div style="float:left; width:45%">
        Introduce una palabra a buscar <input type="text" name="palabra" value="" style="margin-bottom:30px;"><br>
        <span>Introduce el método de búsqueda</span><br>
        <input type="checkbox" name="tipo[]" value="web">Página Web<br>
        <input type="checkbox" name="tipo[]" value="arc">Archivo<br>
        <div>
          Selecciona un archivo (Max 2 MB):
          <input type="hidden" name="MAX_FILE_SIZE" VALUE="2000000">
          <input type="file" name="archivo"><br>
        </div>
        Página Web <input type="text" name="sitio" style="margin-bottom:30px;"><br>
        <input type="submit" value="Submit" style="margin-top:20px;">
        <br>
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){

          //checamos si dio click en archivo o en sitio web
          $checkbox = $_POST['tipo'];
          if(empty($checkbox)){
            echo "You didn't select any type";
          }else{
            $N = count($checkbox);
            for($i=0; $i < $N; $i++){
              $last = $checkbox[$i];
            }
          }

          if($last == "arc"){
            //si es archivo
            echo "<h2>Datos del archivo cargado</h2>";
        		@$archivo=$_FILES["archivo"];
        		if(is_uploaded_file($archivo["tmp_name"])){
        		  echo '<b>Datos en $FILES["archivo"]:</b> <br>';
        			foreach ($_FILES["archivo"] as $i => $e){
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
                echo "<br>Palabra : ";
                $palabra=$_POST['palabra'];
                echo $palabra;

                $contenido=file_get_contents($_FILES['archivo']['tmp_name']);
              	echo "<br><br>Búsqueda<br>";

                //strip_tags($contenido);   //limpia el contenido de tags html
                $contenido = preg_replace('/[^\p{L}\p{N}\s]/u', '', $contenido);  //limpia el string de símbolos
                //echo "$contenido<br>";
                $patron =  "/^.*$palabra.*\$/m";

                // Get file contents
                //$text = file_get_contents($_FILES['archivo']['tmp_name']);
                //$text = file_get_contents("https://www.amazon.com.mx/gp/cart/view.html/ref=nav_cart");

                // break text to array of words
                $words = str_word_count($contenido, 1);

                // and every word with it's length
                $cont = 0;
                foreach ($words as $word) {
                    if(strcasecmp($word, $palabra) == 0){
                      $cont++;
                    }
                }

                if($cont == 0){
                  echo "La palabra $palabra no aparece";
                }else{
                  echo "La palabra $palabra aparece $cont veces";
                }
        	 	}else{
           		@$error=$archivo["error"];
           		if($error==UPLOAD_ERR_INI_SIZE)echo "Tamaño de php.ini excedido";
           		 elseif($error==UPLOAD_ERR_FORM_SIZE)echo "Tamaño de formulario excedido";
                else echo "Posiblemente no se cargó el archivo <BR>";
        	   }
          }else{
            if($last == "web"){
              $sitio = $_POST["sitio"];

              //checamos si el sitio web existe
              $exists = true;
              $file_headers = @get_headers($sitio);
              if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
                  $exists = false;
              }else {
                  $exists = true;
              }

              //si existe el sitio
              if($exists == true){
                $contenido=file_get_contents($sitio);
                echo "<br><br>Búsqueda por Sitio<br>";

                echo "<br>Palabra : ";
                $palabra=$_POST['palabra'];
                echo "$palabra<br>";
                echo "Nombre del sitio : $sitio<br>";

                strip_tags($contenido);   //limpia el contenido de tags html
                $contenido = preg_replace('/[^\p{L}\p{N}\s]/u', '', $contenido);  //limpia el string de símbolos

                $patron =  "/^.*$palabra.*\$/m";

                // Get file contents
                //$text = file_get_contents($_FILES['archivo']['tmp_name']);
                //$text = file_get_contents("https://www.amazon.com.mx/gp/cart/view.html/ref=nav_cart");

                // break text to array of words
                $words = str_word_count($contenido, 1);

                // and every word with it's length
                $cont = 0;
                foreach ($words as $word) {
                    if(strcasecmp($word, $palabra) == 0){
                      $cont++;
                    }
                }

                if($cont == 0){
                  echo "La palabra $palabra no aparece";
                }else{
                  echo "La palabra $palabra aparece $cont veces";
                }
              }else{
                echo "El sitio $sitio no es válido<br>";
              }
            }
          }
        }
        ?>
      </div>
    </form>
  </body>
</html>
