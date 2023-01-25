<!DOCTYPE html>
<html lang="en">

<head>


</head>
<body>

<?php 

  $Saludos = 'Hola';//las variables empiezan por $
  $msj = "<br>$Saludos chicos/as";
  echo $msj;
  $msj = '<br>'.$Saludos.' chicos/as';//. para concatenar cadenas son los puntos, si entre comillo la variable con comillas simples me saca el valor de la variable
  echo $msj;
  $msj = '<br>$Saludos chicos/as';
  echo $msj;

  $matriz = array();//array vacio

  $matriz = array('a','b','c',6);
  $matriz[] = 'Pepe';
  $matriz[0] = 'aaa';
  $matriz [5] = array('1','5','9');
  echo '<br>';
  echo $matriz[5][2];
  echo '<pre>';// para visializar mas comodamente un array
  print_r($matriz);
  echo '</pre>';

  var_dump($matriz);//otra forma de visialicacion

  $nombres = array('Javier','Ivan','Pablo');

   echo '<br>';
  for ($x=0;$x<sizeof($nombres);$x++){
     echo '<br>'.$nombres[$x];
  }

  $nombres ='';

  if(!empty($nombres)){

  foreach ($nombres as $indice => $elnombre) {
    echo '<br>En la posicion '.$indice.
               ' esta :'.$nombres[$indice];
  }
  }
 
  define('CENTRO','San Valero');//constante

?>
<br>(c)<?php echo CENTRO; ?>
<br>(c)<?= CENTRO; ?>


</body>
</html>