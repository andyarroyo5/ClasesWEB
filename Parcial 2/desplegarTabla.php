<HTML>

<head>
<!-- <meta charset="UTF-8"> -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Practica 1 - Parcial 2</title>
	<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
<!-- <script>
	function actualizarPagina(){
		i = document.forms.miForm.miVehiculo.selectedIndex;
		tipo = document.forms.miForm.miVehiculo.options[i].value;
		window.location = '<?php echo $_SERVER['PHP_SELF']?>?tipo='+tipo;
	}
</script> -->
</head>
<body>
<!-- <form name="miForm">
	<p>Mostra vehículos tipos</p>
	<select name="miVehiculo" onchange='actualizarPagina()'>
        <option value="">Todos</option>
        <option value="auto">auto</option>
        <option value="camioneta">camioneta</option>
        <option value="Monterrey">motocicleta</option>
        <option value="San Pedro">bicicleta</option>
        <option value="Santa Catarina">otros</option>
    </select>
</form> -->
</body>
<?php
$server = "localhost";
$user= "root";
$pass = "";
$bd= "web";
$conexion = mysqli_connect($server, $user, $pass, $bd) or die("Error de conexión: ".mysqli_connect_error());

$busqueda = $_POST['busqueda'];
$instruccion = "SELECT * FROM vehiculos WHERE titulo like '%$busqueda%' OR descripcion like '%$busqueda%' ORDER BY fecha DESC";

echo $instruccion;

//$query = "SELECT * FROM vehiculos ORDER BY titulo";

$resultado = mysqli_query($conexion, $instruccion) or die("Error de consulta: ".mysqli_error());

$nfilas = mysqli_num_rows($resultado);

echo "<BR>Consulta realizada correctamente<BR><BR>";

echo "<table style='border: 1px solid black;width:100%;'><tr><th>Título</th> <th>Tipo</th> <th>Descripción</th> <th>Precio</th> <th>Fecha</th> <th>Imagen</th></tr>";
//var_dump($resultado);
$n = mysqli_num_rows($resultado);
//echo date_format($date, 'Y-m-d H:i:s');
// echo "<BR> hay $n tuplas<BR>";
for($i = 0; $i<$n; $i++){
	$tupla=mysqli_fetch_array($resultado, MYSQLI_ASSOC);
	$date = date_create($tupla['fecha']);
	$fecha = date_format($date, 'd/F/Y');

	$number = $tupla['precio'];

	// $formatter = new NumberFormatter('en_US', NumberFormatter::CURRENCY);
	// echo $formatter->formatCurrency($tupla, 'USD'), PHP_EOL;
	$english_format_number = number_format($number);
	// 1,235


	$directory = "content/".$tupla['foto'];
	if(isset($tupla['foto'])){
		$foto = "content/".$tupla['foto'];
		echo "<tr> <td>".$tupla['titulo']."</td> <td>".$tupla['tipo']."</td>  <td>".$tupla['descripcion']."</td> <td>$".$english_format_number."</td> <td>".$fecha."</td> <td><a href='".$foto."' target='blank'>Ver foto</a></td></tr>";
	}else{
		echo "<tr> <td>".$tupla['titulo']."</td> <td>".$tupla['tipo']."</td>  <td>".$tupla['descripcion']."</td> <td>$".$english_format_number."</td> <td>".$fecha."</td> <td>Sin Foto</td></tr>";
	}
	//print_r($tupla);



}

//	mysqli_free_result($resultado);
echo "</table>";
mysqli_close($conexion); //Cerrar la conexión manualmente
?>
</HTML>
