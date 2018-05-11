<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Datos del cantante</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa|Roboto+Slab:100,300,400" rel="stylesheet">
</head>
<body>
    <section class="container">
        <article class="row">
            <aside class="col-10">
            <?php
            require 'conexion.php';
            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            if($id){
                $result = $conn->query("SELECT * FROM cantantes WHERE id=$id");
                $row = $result->fetch_assoc();
            ?>
                <form action="actualizar.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control" name="id" value="<?php echo !empty($id)?$id:'';?>">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="<?= $row['nombre']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="apellidoPaterno">Apellido Paterno</label>
                        <input type="text" class="form-control" name="apellidoPaterno" value="<?= $row['ap_paterno']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="apellidoMaterno">Apellido Materno</label>
                        <input type="text" class="form-control" name="apellidoMaterno" value="<?= $row['ap_materno']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="fechaNac">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" name="fechaNac" value="<?= $row['fecha_nacimiento']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="generoMusical">Genero Musical</label>
                        <input type="text" class="form-control" name="generoMusical" value="<?= $row['genero_musical']; ?>">
                    </div>
                    <button type="submit" name="update" value="actualizar"class="btn btn-primary">Modificar</button>
                </form>
                <?php } else {
                    echo '<h1>Invalid page</h1>';
                }
                ?>
            </aside>
            <div class="col-2">
                <a href="index.php" class="btn btn-outline-success btn-lg" role="button" aria-pressed="true">Regresar</a>    
            </div>
        </article>
    </section>
</body>
</html>
<?php
     if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }             
                     
    if(isset($_POST['update'])){
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_MAGIC_QUOTES);
        $apellido_paterno = filter_input(INPUT_POST, 'apellidoPaterno', FILTER_SANITIZE_MAGIC_QUOTES);
        $apellido_materno = filter_input(INPUT_POST, 'apellidoMaterno', FILTER_SANITIZE_MAGIC_QUOTES);
        $fecha_nac = filter_input(INPUT_POST, 'fechaNac', FILTER_SANITIZE_MAGIC_QUOTES);
        $generoMusical = filter_input(INPUT_POST, 'generoMusical', FILTER_SANITIZE_MAGIC_QUOTES);
                        
        $sql = $conn->query("UPDATE `cantantes` SET `nombre`='$nombre',`ap_paterno`='$apellido_paterno',`ap_materno`='$apellido_materno',`fecha_nacimiento`='$fecha_nac',`genero_musical`='$generoMusical' WHERE id=$id");
        if ($sql === TRUE) {
            header("location:index.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }  
?> 