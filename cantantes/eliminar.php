<?php
require 'conexion.php';

$id = filter_input(INPUT_GET,'id', FILTER_VALIDATE_INT);

if($id){
    if($conn->query("DELETE FROM cantantes WHERE id= $id")){
        header("location:index.php");
    }
}
$conn->close();

?>