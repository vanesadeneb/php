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
            <?php
                require 'conexion.php';
              
                $id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
              
                if($id){
                  $result = $conn->query('SELECT * FROM cantantes WHERE id='.$id);

                  while($row = $result->fetch_assoc()){
                      $date = new DateTime($row['fecha_nacimiento']);
                      
                      echo '<figure class="col-4 img-fluid">';
                      echo '<img class="cantante-img" src="'.$row['imagen'].'" alt="'.$row['nombre'].'">';
                      echo '</figure>';
                      echo '<aside class="col-6">';
                      echo '<h2>INFORMACIÓN</h2>';
                      echo '<p>Nombre: <span>'.$row['nombre'].'</span></p>';
                      echo '<p>Apellido Paterno: <span>'.$row['ap_paterno'].'</span></p>';
                      echo '<p>Apellido Materno: <span>'.$row['ap_materno'].'</span></p>';
                      echo '<p>Fecha de Nacimiento: <span>'.date_format($date, 'd/m/y').'</span></p>';
                      echo '<p>Género Musical: <span>'.$row['genero_musical'].'</span></p>';
                      echo '</aside>'; 
                  }
                }else{
                  echo "0 resultados";
                  $conn->close();
                }
            ?>
            <div class="col-2">
                <a href="index.php" class="btn btn-outline-success btn-lg" role="button" aria-pressed="true">Regresar</a>    
            </div>
        </article>
    </section>
</body>
</html>