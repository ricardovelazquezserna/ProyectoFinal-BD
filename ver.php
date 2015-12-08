<html lang="en">
    <head>
        <title>Departamento</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/ver.css">
    </head>
    <style>  
        table{
            border-collapse: collapse;
            width: 90%;
            font-family: "Trebuchet MS",Arial,Helvetica,sans-serif;
            border-collapse: collapse;
        }
        th,td{
            padding:5px;
            text-align: center;
            font-size: .9em;
            border: 1px solid #98bf21;
            padding:1px 5px 1px 5px;
            color:#000;
            background-color:#EAF2D3;
        } 
        th{
            font-size:1.0em;
            text-align:left;
            padding-top:5px;
            padding-bottom:4px;
            background-color:#A7C942;
            color:#fff;
        }
    </style> 
   
    <body>
       <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Softtek</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li ><a id="inicio" href="#">Home</a></li>
        <li class="dropdown" >
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Procedimientos<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a id="crear" href="#">Agregar</a></li>
            <li><a id="ver" href="#">Ver</a></li>
           
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
    
    <body>
        <div id="contenedor">
      <select id="procedimientos" data-toggle="tooltip" title="Selecciones el procedimieto" required="" class="form-control" name="departamentos" ></select>
      <input type="button" class="btn btn-info" value="Listo" onclick="mostrarProcedimiento();">
    
        </div>
          <center> <table  >
                        <?php
                     
                        
                        ?>
                    </table></center>
                </center>
        </body>
<script>
    
    function mostrarProcedimiento(){
        var procedimiento = $('#procedimientos').val();
         var formData = {
            "procedimiento": procedimiento
        };
        $.ajax({
            url: "http://localhost/ProyectoFinal_BD/api/buscarProcedimiento",
            type: 'POST',
            data: JSON.stringify(formData),
            dataType: 'json',
            encode: true
        }).done(function (data) {
          console.log(data);
        }).fail(function (data) {
            console.log(data);
        });
        
    }
  $.get('http://localhost/ProyectoFinal_BD/api/selectPdt', function (data) {
            var html_code = '<option value="ID">Pdt</option>';

            $.each(data, function (i, proce) {
                var current_html = html_code;
                current_html = current_html.replace('ID', proce['id_pdt']);
                current_html = current_html.replace('Pdt', proce['nombre']);
                $('#procedimientos').append(current_html);
            });
        });
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
</script>
</html>
