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
                <form action="insertar.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="apellidoPaterno">Apellido Paterno</label>
                        <input type="text" class="form-control" name="apellidoPaterno" required>
                    </div>
                    <div class="form-group">
                        <label for="apellidoMaterno">Apellido Materno</label>
                        <input type="text" class="form-control" name="apellidoMaterno" required>
                    </div>
                    <div class="form-group">
                        <label for="fechaNac">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" name="fechaNac" required>
                    </div>
                    <div class="form-group">
                        <label for="generoMusical">Genero Musical</label>
                        <input type="text" class="form-control" name="generoMusical" required>
                    </div>
                    <div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input type="file" class="form-control-file" name="imagen" required>
                    </div>
                    <button type="submit" name=submit value="insertar"class="btn btn-primary">Insertar</button>
                </form>
                <script>
                // Example starter JavaScript for disabling form submissions if there are invalid fields
                (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                    });
                }, false);
                })();
                </script>
            </aside>
            <div class="col-2">
                <a href="index.php" class="btn btn-outline-success btn-lg" role="button" aria-pressed="true">Regresar</a>    
            </div>
        </article>
    </section>
</body>
</html>
    <?php
    require 'conexion.php';
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $target_dir = "imgs/";
    $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if(isset($_POST['submit'])){
            $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_MAGIC_QUOTES);
            $apellido_paterno = filter_input(INPUT_POST, 'apellidoPaterno', FILTER_SANITIZE_MAGIC_QUOTES);
            $apellido_materno = filter_input(INPUT_POST, 'apellidoMaterno', FILTER_SANITIZE_MAGIC_QUOTES);
            $fecha_nac = filter_input(INPUT_POST, 'fechaNac', FILTER_SANITIZE_MAGIC_QUOTES);
            $generoMusical = filter_input(INPUT_POST, 'generoMusical', FILTER_SANITIZE_MAGIC_QUOTES);
            if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["imagen"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
            
            $sql = $conn->query("INSERT INTO `cantantes`(`id`, `nombre`, `ap_paterno`, `ap_materno`, `fecha_nacimiento`, `genero_musical`, `imagen`) VALUES(null,'$nombre','$apellido_paterno','$apellido_materno','$fecha_nac','$generoMusical','$target_file')");
        }

        if ($sql) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);

    
    ?> 