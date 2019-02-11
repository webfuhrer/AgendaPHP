<html>
<head>

</head>
<body>
<?php
listarContactos();

function listarContactos()
{
	
	$servername="localhost";
	$username="root";
	$password="";
	
	try {
   
	
	$conn = new PDO("mysql:host=$servername;dbname=mi_agenda", $username, $password);
	
	$sql="SELECT * FROM contactos";
	//PDOStatement
	$resultado=$conn->query($sql);//$resultado es un PDOStatement
	$lista_filas=$resultado->fetchAll();
	for ($i=0; $i<count($lista_filas); $i++)
		{
			$fila=$lista_filas[$i];
			echo($fila['nombre']."-".$fila['telefono'].'<br>');
		}
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
	
}
?>
</body>
</html>