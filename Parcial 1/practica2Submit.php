<!-- Nosotros declaramos que hemos hecho este trabajo con estricto apego al Código de Honor de la UDEM  -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Submit Form Práctica 2</title>
  </head>
  <body>
    <?php

    if($_SERVER["REQUEST_METHOD"] == "POST")
     {
      echo "<h2>Conversión</h2>";

    if(!empty($_POST['cantidad']))
    {
      $cantidad=$_POST['cantidad'];
    }

    $tipoMoneda=$_POST['tipoMoneda'];
    //echo @$tipoMoneda."<br/>";
    //echo @$cantidad;

    $url="https://www.google.com/finance/converter?a=".$cantidad."&from=MXN&to=".$tipoMoneda;
    $conversion=file_get_contents($url);

    $dom = new DOMDocument();
    libxml_use_internal_errors(true);
    $dom->loadHTML($conversion);
    libxml_clear_errors();
    $xpath = new DOMXpath($dom);
    $tags = $xpath->query('//span[@class="bld"]');
    /*foreach ($tags as $tag) {
        var_dump($tag->textContent);
    }*/
    echo "<br/> ". number_format((float)$cantidad, 2, '.', '') ." MXN son ". @$tags[0]->textContent;

    }
    else {
      @$error=$cantidad["error"];

      echo @$error;

    }



    ?>

<form>
  <br />
  <input Type="button" VALUE="Volver" onClick="history.go(-1);return true;">
</form>
  </body>
</html>
