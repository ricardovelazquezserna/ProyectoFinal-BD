<html lang="en">
    <head>
        <title>Departamento</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/departamento.css">
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
        <li class="dropdown" >
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
<div id="contenedor">
    <div>
            <h1>Departamentos</h1>
        <select id="departamentos"  data-toggle="tooltip" title="Selecciones los departamentos requeridos" class="form-control" required="" name="departamentos" multiple></select>
        <center>
            <input type="button" onclick="test();" class="btn btn-success" name="departamentoBtn" value="Siguiente">
        </center>

    </div>
</div>
<script>
   
    function test() {
        var options = $('#departamentos').val(); 
        
        var diccionario ={
            "arreglo": options
        };
        
       console.log (options);
        $.ajax({
            url: "http://localhost/ProyectoFinal_BD/api/ligarValores",
            type: 'POST',
            data: JSON.stringify(diccionario),
            dataType: 'json',
            encode: true
        }).done(function (data) {
            window.location="http://localhost/ProyectoFinal_BD/tarea.php";
            console.log(data);
        }).fail(function (data) {
            console.log("Error" + data );
        });      
       
    }
//      
    $.get('http://localhost/ProyectoFinal_BD/api/selectDpt', function (data) {
        var html_code = '<option value="ID">DEPA</option>';

        $.each(data, function (i, depa) {
            var current_html = html_code;
            current_html = current_html.replace("ID", depa['id_dpt']);
            current_html = current_html.replace("DEPA", depa['nombre']);
            $('#departamentos').append(current_html);
        });
    });
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
    </body>
</html>

