<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Index</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>
    <body>
       <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="http://localhost/ProyectoFinal_BD/index.php">Softtek</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li class="active"><a id="inicio" href="http://localhost/ProyectoFinal_BD/index.php">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Procedimientos<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a id="crear" href="http://localhost/ProyectoFinal_BD/procedimiento.php">Agregar</a></li>
            <li><a id="ver" href="http://localhost/ProyectoFinal_BD/ver.php">Ver</a></li>
              <li><a id="ver" href="http://localhost/ProyectoFinal_BD/status.html">Status</a></li>
            </ul>
        </li>
       </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-wrench"></span> Configuración<span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li><a  href="">Crear Tabas</a></li>
            <li><a href="#">Borrar Tablas</a></li>
          </ul>
        </li>
       </ul>
    </div>
  </div>
</nav>
        <div>
            <div id="loader"></div>
            <script>
                
                $("#loader").load("main.php");
               

            </script>
        </div>
    </body>
</html>
