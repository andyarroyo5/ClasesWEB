<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

    <style>
         .error {color: #FF0000;}
      </style>

  </head>
  <body>


 <h1>Captura de vivienda</h1>



            <?php
            /*
            Andrea Arroyo 344956
            yo andrea arroyo declaro que he hecho este examen con estricto apego al código de honor de la udem*/



            if($_SERVER["REQUEST_METHOD"] == "POST")
            {

              $dirError = "";
              $precioError="";
              $tamErr="";
            //  print_r($_REQUEST);

              @$foto=$_FILES["foto"];
            //  @$error=$["error"];

            $dir=$_POST['dir'];
            $precio=$_POST['precio'];
            $tam=$_POST['tam'];


            if(is_uploaded_file($_FILES["foto"]["tmp_name"]))
            {
              @$foto=$_FILES["foto"];
            }
            else {

              @$error=$foto["error"];
              if($error==UPLOAD_ERR_INI_SIZE)
                $tamErr= "Tamaño de php.ini excedido";
            }



                //$sizekb=($_FILES["foto"]['size'] *.0009765625);
              //  echo $sizekb;

              if (empty($_POST["dir"]))
              {
                $dirError="Es necesario la dirección de la vivienda";
              }else if ( is_uploaded_file($_FILES["foto"]["tmp_name"]) && ($_FILES["foto"]['size'] *.0009765625)>256)
              {
                $tamErr = "El tamaño del archivo excede el límite de 256 kb";
                @$error=$_FILES["foto"]["error"];
                if($error==UPLOAD_ERR_INI_SIZE)
                  $tamErr= "Tamaño de php.ini excedido";
              }
              else {

                    echo "<div class='float:left'>
                    <br>Tipo de vivienda: ".$_POST["vivienda"]."
                    <br>Zona:". $_POST["zona"]. "
                    <br>Dirección: ". $_POST["dir"]. "
                    <br>Número de dormitorios:  ". $_POST["dormitorios"]. "
                    <br>Precio: $ ". $_POST["precio"]. "
                    <br>Tamaño:". $_POST["tam"];

                    //Opcionales

                    if (isset($_POST["extras"]))
                    {
                      echo "
                      <br>Extras con los que cuenta la vivienda:". $_POST["extras"];
                    }

                    if (is_uploaded_file($_FILES["foto"]["tmp_name"]))
                    {
                      echo "<br>Foto:<br> <a href='fotos/". $_FILES["foto"]['name'] ."'>Ver Foto</a>";
                    }
                    else
                    {
                      echo "<br>SIN FOTO";
                    }

                    if (isset($_POST["observaciones"]))
                    {
                      echo "<br>Observaciones: ". $_POST["observaciones"];
                    }

                    echo "</div>";
             }
            }
            ?>

           <h2>Introduce los datos de la vivienda</h2>
               <div class="container" style="float:left">

                 <br>Tipo de vivienda:  <br>
                 <br>Zona:<br>
                 <br>Dirección:<br>
                 <br>Número de dormitorios<br>
                 <br>Precio $ :<br>
                 <br>Tamaño:<br>
                 <br>Extras con los que cuenta la vivienda:<br>
                 <br>Foto (Max 256 Kb):<br><br>
                 <br>Observaciones:<br>

               </div>



                            <div class="container" >
                              <form class="" action="parcial1.php" method="post" style="margin=10" enctype="multipart/form-data">
                                  <br>
                                    <select name="vivienda">
                                      <option selected="selected" value="Ático">Ático</option>
                                      <option value="Casa">Casa</option>
                                      <option value="Departamento">Departamento</option>
                                      <option value="Loft">Loft</option>
                                    </select><br>
                                  <br>
                                    <select name="zona">
                                      <option selected="selected" value="Apodaca">Apodaca</option>
                                      <option value="Guadalupe">Guadalupe</option>
                                      <option value="Monterrey">Monterrey</option>
                                      <option value="San Pedro Garza">San Pedro Garza</option>
                                      <option value="Santa Catarina">Santa Catarina</option>
                                    </select><br>

                                  <br><input type="text" name="dir" value='<?php echo $dir; ?>' style="margin-bottom:30px;"> <span class="error"> * <?php echo @$dirError;?></span><br>



                                    <input type="radio" name="dormitorios" value="1" checked="checked" required> 1
                                    <input type="radio" name="dormitorios" value="2"> 2
                                    <input type="radio" name="dormitorios" value="3"> 3
                                    <input type="radio" name="dormitorios" value="4"> 4
                                    <input type="radio" name="dormitorios" value="5"> 5
                                    <input type="radio" name="dormitorios" value="6"> 6
                                    <input type="radio" name="dormitorios" value="7"> 7
                                    <br>
                                  <input type="number" name="precio" style="margin-bottom:30px;" value='<?php echo $precio; ?>'required >MX  <span class="error"> * <?php echo @$precioError;?></span>

                                  <br><input type="number" name="tam" style="margin-bottom:30px;" value='<?php echo $tam; ?>' required > metros cuadrados  <span class="error"> * <?php echo @$tamErr;?></span>

                                  <br>
                                  <input type="radio" name="extras" value="estacionamiento" > Estacionamiento
                                  <input type="radio" name="extras" value="piscina"> Piscina
                                  <input type="radio" name="extras" value="jardin"> Jardín

                                  <br>
                                  <br>
                                  <input type="hidden" name="MAX_FILE_SIZE" VALUE="0.256">

                                  <input type="file" name="foto" accept="img/png, image/jpeg" ><span class="error"><?php echo @$tamErr;?></span>

                                  <br>
                                  <br><textarea name="observaciones" rows="8" cols="40"></textarea>

                                  <br>
                                  <input type="submit" name="Guarda" value="Guardar Vivienda">
                                </form>

                            </div>



  </body>
</html>
