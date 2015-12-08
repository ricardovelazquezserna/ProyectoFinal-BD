 <head>
        <title>Procedimiento</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/procedimiento.css">
    </head>
    <body>
       <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Softtek</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li ><a id="inicio" href="http://localhost/ProyectoFinal_BD/index.php">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Procedimientos<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a id="crear" href="http://localhost/ProyectoFinal_BD/procedimiento.php">Agregar</a></li>
            <li><a id="ver" href="http://localhost/ProyectoFinal_BD/ver.php">Ver</a></li>
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
<div id="contenedor" >
    <input type="text" required="" class="form-control" id="nombreProcedimiento" name="nombreProcedmiento" placeholder="Nombre del procedimiento">
    <textarea type="text" required="" class="form-control" id="descripcionProcedimiento" name="descripcionProcedimiento" placeholder="Descripcion"></textarea>
    <textarea type="text" required="" class="form-control" id="objetivoProcedimiento"  name="objetivoProcedimiento"  placeholder="Objetivo"></textarea>
    <center> <input type="button" class="btn btn-success" name="procedimientoBtn" onclick="agregarPdt();" value="Siguiente"></center>
</div>
<script>
    function agregarPdt() {
        var formData = {
            "nombreProcedimiento": $('#nombreProcedimiento').val(),
            "descripcionProcedimiento": $('#descripcionProcedimiento').val(),
            "objetivoProcedimiento": $('#objetivoProcedimiento').val()
        };
        $.ajax({
            url: "http://localhost/ProyectoFinal_BD/api/agregarProcedimiento",
            type: 'POST',
            data: JSON.stringify(formData),
            dataType: 'json',
            encode: true
        }).done(function (data) {
//            document.cookie=data;
            window.location = "http://localhost/ProyectoFinal_BD/departamento.php";
            console.log(data);
        }).fail(function (data) {
            console.log(data);
        });
    }
</script>
    </body>
  