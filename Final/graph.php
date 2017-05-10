<?php
 
  php.gd_info();
  php.info();
   echo "<div>";

  /* echo count($_SESSION['porciento']);
    foreach ($_SESSION['porciento'] as $key => $value) {
      echo $key." votos: ". $value;
    
    } */  
      
   
    echo "<br>";
    $Randomized = rand(1,20); 
    //for($i=0;$i<=$Randomized;$i++){$data[$i]=\rand(2,20);};//full array with garbage. 
    $imgx='600';$imgy='400';//Set Image Size. ImageX,ImageY 
    $cx = '300';$cy ='150'; //Set Pie Postition. CenterX,CenterY 
    $sx = '300';$sy='300';$sz ='100';// Set Size-dimensions. SizeX,SizeY,SizeZ 
   // $data_sum = array_sum($data); 
    $im=imagecreatetruecolor(100,100);
    $color1 = imagecolorallocate($im,0,0,255); 
     imagefilledarc($im,$cx,$cy,$sx,$sy,0 ,.43, $color1, IMG_ARC_PIE); 
   
    imagestring($im, 10, 1,0, 'Hello world!', $color1); 
    //Output. 
    header('Content-type: image/png'); 
    imagepng($im); 
    imagedestroy($im); 

?>