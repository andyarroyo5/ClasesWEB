<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form id="myform" method="post" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>>
      <div style="float:left; width:45%">
        Cantidad cántidad en pesos mexicanos: <input type="text" name="money" style="margin-bottom:30px;"><br>
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
          //echo $_POST['money'];
          function convertCurrency($amount, $from, $to){
            $data = file_get_contents("https://www.google.com/finance/converter?a=$amount&from=$from&to=$to");
            preg_match("/<span class=bld>(.*)<\/span>/",$data, $converted);
            $converted = preg_replace("/[^0-9.]/", "", $converted[1]);
            return number_format(round($converted, 3),2);
          }

          $currency = $_POST['currency'];
          $last = "";
          if(empty($currency)){
            echo("You didn't select any currency.");
          }else{
              $N = count($currency);
              for($i=0; $i < $N; $i++){
                $last = $currency[$i];
              }
          }
          echo(number_format(round($_POST['money'], 3),2)." MXN to $last : ");
          echo convertCurrency($_POST['money'], "MXN", $last);
        }
        ?>
      </div>
      <div style="float:right; width:45%">
        <input type="checkbox" name="currency[]" value="EUR">Euro<br>
        <input type="checkbox" name="currency[]" value="USD">Dólar USA<br>
        <input type="checkbox" name="currency[]" value="GBP">Libra Esterlina<br>
        <input type="checkbox" name="currency[]" value="JPY">Yen<br>
        <input type="checkbox" name="currency[]" value="CHF">Franco<br>
        <input type="submit" value="Submit" style="margin-top:20px;">
      </div>
    </form>
  </body>
</html>
