!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Insertar Ticket</title>
    <style type="text/css" rel="stylesheet">
        .error{
            color: red;
        }
    </style>
</head>
    <body>
    <?php
        //incluir conexión a la base de datos
        include '../../config/conexionBD.php';  

        $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
        $placa = isset($_POST["placa"]) ? mb_strtoupper(trim($_POST["placa"])) : null;
        $marca = isset($_POST["marca"]) ? mb_strtoupper(trim($_POST["marca"])) : null;
        $modelo = isset($_POST["modelo"]) ? mb_strtoupper(trim($_POST["modelo"])) : null;
        $numero = isset($_POST["numero"]) ? trim($_POST["numero"]) : null;
        $fecha = isset($_POST["fecha"]) ? trim($_POST["fecha"]) : null;
        $hora = isset($_POST["hora"]) ? trim($_POST["hora"]) : null;
            
        $sql = "SELECT codigo FROM usuario WHERE cedula = '$cedula'";
        $sql1 = "SELECT codigo FROM vehiculo WHERE codigo=(SELECT max(codigo) FROM vehiculo)";
        $result = $conn->query($sql);
        $result1 = $conn->query($sql1);
        
        if (!$result) {
            trigger_error('Invalid query: ' . $conn->error);
        }else {
            while ($fila = $result->fetch_assoc()) {
                $id = $fila["codigo"];
            }
        }

        $sql2 = "INSERT INTO `vehiculo`(`codigo`, `placa`, `marca`, `modelo`, `vehiculo_eliminado`, `codigo_usuario`) VALUES (0, '$placa', '$marca', '$modelo', 'n', '$id')";
        if ($conn->query($sql2) === TRUE) {
            while ($fila1 = $result1->fetch_assoc()) {
                $id1 = $fila1["codigo"];
            }
            $sql3 = "INSERT INTO `ticket`(`codigo`, `numero`, `fecha_ingreso`, `hora_ingreso` ,`codigo_vehiculo`) VALUES (0,'$numero','$fecha','$hora','$id1')";
            if ($conn->query($sql3) === TRUE) {
                echo('entro');
                header( "Location: ../vista/agregar.html");
            }
        } 

        /*if (!$result1) {
            trigger_error('Invalid query: ' . $conn->error);
        }else {
            while ($fila1 = $result1->fetch_assoc()) {
                $id1 = $fila1["codigo"];
                $sql3 = "INSERT INTO `ticket`(`codigo`, `numero`, `fecha_ingreso`, `codigo_vehiculo`) VALUES (0,'$numero','$fecha',$id1')";
                header( "Location: ../vista/agregar.html");
            }
        }*/

        $conn->close();

    ?>
    </body>
</html> 