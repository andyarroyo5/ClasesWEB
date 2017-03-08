<!-- Nosotros declaramos que hemos hecho este trabajo con estricto apego al Código de Honor de la UDEM  -->

<HTML>
   <meta http-equiv = "Content-Type" content = "text/html; charset=utf-8" />
   <HEAD>
      <TITLE>Práctica 1 WEB</TITLE>
   </HEAD>
   <BODY>
      <h2> Práctica 1 </h2>
      <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">

         <div style="float:left;">
           Introduce una palabra a buscar <input type="text" name="palabra" style="margin-bottom:30px;" required><br>
           <span>Selecciona método de búsqueda: </span>
           <input type="radio" name="tipo" value="web" required> Página web
           <input type="radio" name="tipo" value="archivo"> Archivo<br><br>

          Selecciona un archivo (Max 2 MB):
          <input type="hidden" name="MAX_FILE_SIZE" VALUE="2000000">
          <!-- accept: filtra archivos con esas características -->
          <input type="file" name="archivo" accept="text/plain, .rtf" >ó
          &nbsp; Página Web <input placeholder="URL" type="text" name="sitio" style="margin-bottom:30px;">  <br>
          <input type="submit" value="Buscar" style="margin-top:20px;">
           <br>
          </div>

       </form>
       <pre style="float:left;">
          <hr />

          <?php
            if($_SERVER["REQUEST_METHOD"] == "POST")
            {

                //checamos si dio click en archivo o en sitio web
                switch ($_POST['tipo']) {

                   //Seleccionó de archivo
                   case 'archivo':
                     echo '<br><h2>Búsqueda por Archivo</h2>';
                     //print_r($_FILES['archivo']);
                     @$archivo=$_FILES['archivo'];

                     //Validar que el archivo se cargo correctamente
                     if(is_uploaded_file($archivo["tmp_name"]))
                     {
                        //Validar que haya cargado un archivo de texto
                        if($_FILES['archivo']['type']!='text/plain' && $_FILES['archivo']['type']!='application/rtf')
                        {
                           echo 'Archivo no válido';
                           return;
                        }

                        $nombre = $archivo["name"];
                        //Eliminar símbolos en nombre de archivo
                        //$nombre = preg_replace("/[^a-zA-Z0-9._-]/", "", $nombre);
                        //echo "<br>Nombre limpio: $nombre <br>";

                        $contenido=file_get_contents($_FILES['archivo']['tmp_name']);
                        //Eliminar símbolos en contenido
                        $contenido=preg_replace("/(?![=$'€%])\p{P}/u", "", $contenido);

                      }
                      else{
                           @$error=$archivo["error"];
                           if($error==UPLOAD_ERR_INI_SIZE)
                              echo "Tamaño de php.ini excedido";
                          else if($error==UPLOAD_ERR_FORM_SIZE)
                              echo "Tamaño de formulario excedido";
                           else
                              echo "Posiblemente no se cargó el archivo <BR>";
                           return;
                        }

                      break;

                  //Seleccionó Página WEB
                   case 'web':

                     $sitio = $_POST["sitio"];

                     echo '<br><h2>Búsqueda por Página Web</h2>';

                     //Validar que input no este vacío
                     if(!isset($sitio) || trim($sitio) == '')
                     {
                        echo "No incluiste liga de una página web";
                        return;
                     }
                     //Validar si el sitio web existe
                    $existe = true;
                    $file_headers = @get_headers($sitio);
                    if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
                        $existe = false;
                        echo 'No se encontró el sitio: '. $sitio;
                        return;
                    }else {
                        $existe = true;
                    }

                     $contenido=file_get_contents($sitio);
                     echo "<br><br>Búsqueda por Sitio<br>";
                     echo "Nombre del sitio : $sitio<br>";

                     //limpia el contenido de tags html
                     $contenido=strip_tags($contenido);
                     //limpia el string de símbolos
                     $contenido = preg_replace('/[^\p{L}\p{N}\s]/u', '', $contenido);

                     break;

                   default:
                      echo "Error en validar la búsqueda";
                      break;
                }


                //Quitar líneas o espacios extras

                $contenido=trim(preg_replace("/\s+/", " ",$contenido));
                //echo $contenido;
                //mayúsculas
                $contenido=strtoupper($contenido);
                // string a Array
                $palabrasArray= explode(" ", $contenido);
                //Contar valores dentro del array de palabras Repetidas, Array Asociativo
                $palabrasRepetidas= array_count_values($palabrasArray);
                //ordenar de mayor a menor
                arsort($palabrasRepetidas);
                //|print_r($palabrasRepetidas);

               echo "<br /><i> Resultado de Búsqueda</i> <br>";

               echo "<br>Palabra por buscar : ";
               $palabra=$_POST['palabra'];
               $palabra= preg_replace('/[^\p{L}\p{N}\s]/u', '', $palabra);
               $palabra=trim($palabra);
               echo $palabra. "<br>";

               //Buscar en el array la palabra de búsqueda
               $resultadoBusqueda=  @$palabrasRepetidas[strtoupper($palabra)]? : 0;
               if($resultadoBusqueda== 0){
                 echo "<br />La palabra <b>$palabra </b> no aparece";
               }
               else{
                 echo "<br />La palabra <b> ". $palabra ." </b> aparece ". ($resultadoBusqueda+1)." veces";
               }

                //Imprimir los primeros 10 resultados
                echo "<br /><br> <i>Palabras Repetidas</i> <br><br>";
                 $i=0;
                 foreach ($palabrasRepetidas as $palabra => $numRepeticion) {
                    $i++;
                    if($i==11)
                   {
                      break;
                   }
                   echo $i. '. '. $palabra. ":". ($numRepeticion+1). "<br />";

                 }
             }
         ?>
       </pre>
   </BODY>
</HTML>
