
<?php
include ("conexion_bd.php");

$id_usuar=$_GET['id_usuario'];
$nombre=$_GET['nombre'];



  $sql= "SELECT nombre, id FROM album WHERE nombre ='".$nombre."'";

  $resultado= mysqli_query($con,$sql);
  $fila=mysqli_fetch_array($resultado);

    if (!($fila['id'])) {
      echo "no se encontro album";
    }else{
      echo $id_al=$fila['id'];
      
      $sql2= "SELECT * FROM albumes_compartidos WHERE id_album =".$id_al;
      $resultado2= mysqli_query($con,$sql2);
      $fila2=mysqli_fetch_array($resultado2);
      echo $fila2['id'];
      
      if (!($fila2['id'])) {
        echo "no se encontro usuario";
      }else{
        if ($con->query($sql2) == TRUE) {
          header("location:../php/modificarPrivilegios.php?nombre=".$nombre."&id_album=".$id_al);
        }else{
          echo "no";
        }

      }

  }

  

/*$sql= "SELECT nombre, id FROM album WHERE nombre = ".$nombre;

		$resultado= mysqli_query($con,$sql);
		$fila=mysqli_fetch_array($resultado);

			if (!($fila['id'])) {
				echo "no se encontro album";
			}else{
      $id_al=$fila['id'];

  $sql2= "SELECT * FROM albumes_compartidos WHERE id_album =$id_al";
	$resultado2= mysqli_query($con,$sql2);
	$fila2=mysqli_fetch_array($resultado2);
  
if (!($fila2['id'])) {
	echo "no se encontro usuario";
}else{


  if ($con->query($sql2) === TRUE) {

		print "<script>alert(\"Usuarios Agregado\");</script>";
		header("location:../php/modificarPrivilegios.php?nombre=".$nombre."&id_album=".$id_al);
  

			
		
	
    } else {
      echo "Error: " . $sql . "<br>" . $con->error;
    }}
}*/
?>