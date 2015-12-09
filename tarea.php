<html lang="en">
    <head>
        <title>Tarea</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/tarea.css">
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="http://localhost/ProyectoFinal_BD/index.php">Softtek</a>
                </div>
                <div>
                    <ul class="nav navbar-nav">
                        <li ><a id="inicio" href="http://localhost/ProyectoFinal_BD/index.php">Home</a></li>
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
        <div id="contenedor">
            <h1>Crear Tarea</h1>
            <select id="departamentos" data-toggle="tooltip" title="Selecciones el departamento responsable" required="" class="form-control" name="departamentos" ></select>
            <input type="text" required="" class="form-control" name="nombreTarea" id="nombreTarea" placeholder="Nombre de la tarea">
            <textarea id="descripcionTarea" class="form-control" required="" placeholder="Descripción"></textarea>
            <select class="form-control" data-toggle="tooltip" title="Selecciones el orden" id="ordenTarea" required="">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            <select class="form-control" data-toggle="tooltip" title="Selecciones el suborden" id="subordenTarea" required="">
                <option value="a">a</option>
                <option value="b">b</option>
                <option value="c">c</option>
            </select>
            <input type="number" required="" class="form-control" id="tiempoTarea" name="tiempoTarea" placeholder="Tiempo estimado"><label>dias.</label>
            <center>
                <input type="button" class="btn btn-danger" name="nuevatarea" onclick="window.location.reload();" value="Crear nueva"/>
                <input type="button" class="btn btn-success" onclick="agregarTarea();" name="tareaBtn" value="Guardar"/>
            </center>
        
    </div>
    </body>
    <script>

        function agregarTarea() {
            var formData = {
                "nombre": $('#nombreTarea').val(),
                "orden": $('#ordenTarea').val(),
                "suborden": $('#subordenTarea').val(),
                "descripcion": $('#descripcionTarea').val(),
                "tiempo": $('#tiempoTarea').val(),
                "departamento": $('#departamentos').val()
            };
            console.log(formData);
            $.ajax({
                url: "http://localhost/ProyectoFinal_BD/api/agregarTarea",
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
        $.get('http://localhost/ProyectoFinal_BD/api/selectDpt', function (data) {
            var html_code = '<option value="ID">DEPA</option>';

            $.each(data, function (i, depa) {
                var current_html = html_code;
                current_html = current_html.replace('ID', depa['id_dpt']);
                current_html = current_html.replace('DEPA', depa['nombre']);
                $('#departamentos').append(current_html);
            });
        });
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</html>