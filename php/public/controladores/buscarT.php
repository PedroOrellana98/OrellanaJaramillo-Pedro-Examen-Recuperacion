<?php
    //incluir conexión a la base de datos
    include '../../config/conexionBD.php';

    session_start();

    $cedula = $_GET['cedula'];
    $placa = $_GET['placa'];

    $sql = "SELECT u.cedula, u.nombre, u.direccion, u.telefono, v.placa, v.marca, v.modelo, t.numero, t.fecha_ingreso, t.hora_ingreso, t.fecha_salida, t.hora_salida FROM usuario u, vehiculo v, ticket t WHERE u.codigo = v.codigo_usuario AND v.codigo = t.codigo_vehiculo AND cedula = '$cedula' OR placa = '$placa'";

    $result = $conn->query($sql);
    echo "    <style>
                    table, th, td {
                        margin-top: 20px;
                        border: 1px solid white;
                    }
                </style>

                <table>
                <tr>
                    <th>Cedula</th>
                    <th>Nombres</th>  
                    <th>Direccion</th>        
                    <th>Telefono</th>
                    <th>Placa</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Numero</th>
                    <th>Fecha Ingreso</th>
                    <th>Hora Ingreso</th>
                    <th>Fecha Salida</th>
                    <th>Hora Salida</th>     
                </tr>";

    if ($result->num_rows > 0) {        
        while($row = $result->fetch_assoc()) {
            
            echo "<tr>";
            echo "   <td>" . $row['cedula'] . "</td>";
            echo "   <td>" . $row['nombre'] ."</td>";
            echo "   <td>" . $row['direccion'] ."</td>";
            echo "   <td>" . $row['telefono'] . "</td>";        
            echo "   <td>" . $row['placa'] . "</td>";    
            echo "   <td>" . $row['marca'] . "</td>";    
            echo "   <td>" . $row['modelo'] . "</td>";
            echo "   <td>" . $row['numero'] . "</td>"; 
            echo "   <td>" . $row['fecha_ingreso'] . "</td>";
            echo "   <td>" . $row['hora_ingreso'] . "</td>";
            echo "   <td>" . $row['fecha_salida'] . "</td>";
            echo "   <td>" . $row['hora_salida'] . "</td>";
            echo "</tr>";   
        }        
    } else {        
        echo "<tr>";
        echo "   <td colspan='7'> No existen datos ingresados en el sistema</td>";
        echo "</tr>";     
    }
    echo "</table>";
    $conn->close(); 
  
?> 