<?php

// Get database config
require_once 'database.php';

function agregarProcedimiento() {

    $request = \Slim\Slim::getInstance()->request();
    $payload = json_decode($request->getBody());
    $sql = "
        INSERT INTO procedimiento (
            nombre,
            descripcion,
            objetivo
        ) VALUES (
            :nombreProcedimiento,
            :descripcionProcedimiento,
            :objetivoProcedimiento
        );";
    try {
        $db = getConnection();
        $stmt = $db->prepare($sql);
        $stmt->bindParam("nombreProcedimiento", $payload->nombreProcedimiento);
        $stmt->bindParam("descripcionProcedimiento", $payload->descripcionProcedimiento);
        $stmt->bindParam("objetivoProcedimiento", $payload->objetivoProcedimiento);
        $stmt->execute();
        $last_id = $db->lastInsertId();
//       
        $response = array(
            "last_id" => $last_id
        );
    } catch (PDOException $e) {
        $response = array(
            "error" => $e->getmessage()
        );
    }
    return json_encode($response);
}

function agregarTarea() {

    $request = \Slim\Slim::getInstance()->request();
    $payload = json_decode($request->getBody());

    $sql = "
        INSERT INTO tarea (
            nombre,
            orden,
            suborden,
            descripcion,
            tiempo_aprox,
            id_dpt
            
        ) VALUES (
            :nombreTarea,
            :ordenTarea,
            :subordenTarea,
            :descripcionTarea,
            :tiempoTarea,
            :departamento
           
        );";

    try {
        $db = getConnection();
        $stmt = $db->prepare($sql);
        $stmt->bindParam("nombreTarea", $payload->nombre);
        $stmt->bindParam("ordenTarea", $payload->orden);
        $stmt->bindParam("subordenTarea", $payload->suborden);
        $stmt->bindParam("descripcionTarea", $payload->descripcion);
        $stmt->bindParam("tiempoTarea", $payload->tiempo);
        $stmt->bindParam("departamento", $payload->departamento);
        $stmt->execute();
        $response = array(
            "success" => "ok"
        );
    } catch (PDOException $e) {
        $response = array(
            "error" => $e->getmessage()
        );
    }

    return json_encode($response);
}

function ligarValores() {
    $request = \Slim\Slim::getInstance()->request();
    $payload = json_decode($request->getBody());
    $cookie = 5;
    $sql = "
        INSERT INTO proced_depart(
            id_pdt,
            id_dpt
          ) VALUES (
            :id_procedimiento,
            :id_departamento
           );";
    try {
        $db = getConnection();
        foreach ($payload->arreglo as $value) {
            $stmt = $db->prepare($sql);
            $stmt->bindParam("id_procedimiento", $cookie);
            $stmt->bindParam("id_departamento", $value);
            $stmt->execute();
        }
        $response = array(
            "success" => "OK",
            "imprimir"=> $payload->arreglo
        );
    } catch (PDOException $e) {
        $response = array(
            "error" => $payload->arreglo
        );
    }
    return json_encode($response);
}
function selectDpt() {

    $sql = "
            SELECT
                *
            FROM
                departamento
                    
        ";

    try {

        $db = getConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);

        if (count($result)) {
            $response = $result;
        } else {
            $response = array(
                "error" => 'No rows found'
            );
        }
    } catch (PDOException $e) {
        $response = array(
            "error" => $e->getMessage()
        );
    }

    return json_encode($response);
}
function selectPdt() {
    $sql = "
            SELECT
               *
            FROM
                procedimiento           
        ";
    try {

        $db = getConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);

        if (count($result)) {
            $response = $result;
        } else {
            $response = array(
                "error" => 'No rows found'
            );
        }
    } catch (PDOException $e) {
        $response = array(
            "error" => $e->getMessage()
        );
    }
    return json_encode($response);
}
function buscarProcedimiento(){
     $request = \Slim\Slim::getInstance()->request();
    $payload = json_decode($request->getBody());
     $sql = ("SELECT * FROM procedimeinto WHERE id_pdt='$payload->procedimiento'");
        $resultado = mysql_query($sql);
        echo "<tr> <th>Nombre</th><th>Descripcion</th><th>Objetivo</th>";
        while ($fila = mysql_fetch_array($resultado)) {
            echo "<tr>";
            echo "<td>$fila[nombre] </td><td> $fila[descripcion] </td><td>$fila[objetivo]</td> <br>";
            echo "</tr>";
           
}}
