
<?php
include ("conexion_bd.php");

$id_a=$_GET['id_a'];
$nombre=$_GET['nombre'];
$b_alias=$_GET['alias'];

$sql= "SELECT * FROM usuarios WHERE alias ='".$b_alias."'";

	$resultado= mysqli_query($con,$sql);
	$fila=mysqli_fetch_array($resultado);

if (!($fila['id'])) {
	echo "no se encontro usuario";
}else{


$sql = "INSERT INTO albumes_compartidos (id_usuario,id_album,permisos)
  VALUES ('".$fila['id']."','".$id_a."',1)";


  if ($con->query($sql) === TRUE) {

		print "<script>alert(\"Usuarios Agregado\");</script>";
		header("location:../vistas/agregar_albumc.php?nombre=".$nombre."&id_album=".$id_a);
  

			
		
	
    } else {
      echo "Error: " . $sql . "<br>" . $con->error;
    }
}
?>