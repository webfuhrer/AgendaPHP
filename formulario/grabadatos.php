<?php
$nombre=$_POST['nombre'];
$telefono=$_POST['telefono'];
grabarContacto($nombre, $telefono);

function grabarContacto($nombre, $telefono)
{
	global $nombre, $telefono;
	$servername="localhost";
	$username="root";
	$password="";
	
	try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
	$sql="CREATE DATABASE IF NOT EXISTS mi_agenda";
	$conn->exec($sql);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
	
	$conn = new PDO("mysql:host=$servername;dbname=mi_agenda", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//$conn->$dbname="mi_agenda";
	$sql="CREATE TABLE if not exists contactos (id  int NOT NULL AUTO_INCREMENT , nombre varchar(50), telefono varchar(15), PRIMARY KEY (id))";
	$conn->exec($sql);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql="INSERT INTO contactos(nombre, telefono) VALUES('$nombre', '$telefono')";
	$conn->exec($sql);
	echo "El contacto $nombre $telefono ha sido insertado";
	
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
	
}
?>