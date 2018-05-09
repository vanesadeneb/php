<?php
  require 'conexion.php';

  $id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);

  if($id){
    $result = $conn->query('SELECT * FROM alumnos WHERE id='.$id);
    
    while($row = $result->fetch_assoc()){
        echo 'ID: '.$row['id'].'<br>';
        echo 'Nombre: '.$row['nombre'].'<br>'; 
        echo 'Ap. Paterno: '.$row['apellido_paterno'].'<br>'; 
        echo 'Ap. Materno: '.$row['apellido_materno'].'<br>';
        echo 'Fecha nacimiento: '.$row['fecha_nacimiento'].'<br>'; 
    }
  }else{
    echo "0 resultados";
    $conn->close();
  }