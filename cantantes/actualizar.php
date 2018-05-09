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
                <form action="insertar.php" method="post">
                    <div class="form-group">
                        <label for="id">Id</label>
                        <input type="text" class="form-control" name="Id" disabled>
                    </div>
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
                    <button type="submit" class="btn btn-primary">Insertar</button>
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
$result = $conn->query("SELECT * FROM cantantes");

$sql = "UPDATE `cantantes` SET `id`=?,`nombre`=?,`ap_paterno`=?,`ap_materno`=?,`fecha_nacimiento`=?,`genero_musical`=[value-6],`imagen`=? WHERE id=?";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}