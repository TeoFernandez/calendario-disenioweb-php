<?php
$conexion = mysqli_connect('localhost', 'root', '', 'fravega', '3307');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Calendario</title>
</head>
<body>

    <center><u><h1>Calendario de Clases de DISEÑO WEB</h1></u></center>
    <br>

    <?php
    $sql = "CALL dias_semana()";
    $result = mysqli_query($conexion, $sql);

    $datos = [];
    while($row = mysqli_fetch_assoc($result)) {
        $datos[] = $row;
    }

    $hoy = date('w'); 
    $hoy_id = $hoy == 0 ? 1 : $hoy + 1; 

    $mensaje_hoy = '';
    foreach ($datos as $fila) {
        if ($fila['id'] == $hoy_id) {
            $mensaje_hoy = $fila['disweb'];
            break;
        }
    }
    ?>

    <center><h2><?php echo $mensaje_hoy; ?></h2></center>

    <center>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>DÍA</th>
            <th>CURSADA</th>
        </tr>

        <?php foreach($datos as $fila) { ?>
        <tr>
            <td><?php echo $fila['id']; ?></td>
            <td><?php echo $fila['nombredia']; ?></td>
            <td><?php echo $fila['disweb']; ?></td>
        </tr>
        <?php } ?>
    </table>
    </center>
    <br>
</body>
</html>
