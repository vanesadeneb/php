<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Galeria de Cantantes</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa|Roboto+Slab:100,300,400" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Galeria de Cantantes</h1>
        <a href="guardar.php" class="btn btn-outline-success" role="button" aria-pressed="true">AGREGAR <i class="fas fa-plus"></i></a>
    </header>
    <section class="container">
        <div class="row">
        <?php
        require 'conexion.php';
      
        $result = $conn->query("SELECT * FROM cantantes");
          
        while($row = $result->fetch_assoc()){
            echo '<div class="col-4" id="cont-img">';
            echo '<a href="cantante.php?id='.$row['id'].'">';
            echo '<figure>
                      <img src="'.$row['imagen'].'" alt="'.$row['nombre'].'">
                      <h3>'.$row['nombre'].'</h3>
                  </figure></a>
                  <div class="" id="modificar">
                  <a href="eliminar.php"><i class="fas fa-trash-alt"></i></a>
                  <a href="guardar.php"><i class="fas fa-pencil-alt"></i></a>
                  </div>
                </div>';
        }
        $conn->close();
        ?>
        </div>
        
    </section>
</body>
</html>