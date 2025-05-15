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
    $sql = "CALL dias_semana2()";
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

    $sql2 = ""

    <center><h2><?php echo $mensaje_hoy; ?></h2></center>
    <center><h2><?php// echo $nuevoMensaje?></h2></center>

    <center>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>DÍA</th>
            <th>CURSADA</th>
            <th>DIA DE CLASE</th>
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
        <!--
            PROCEDIMIENTO:
            BEGIN
            -- Crea la tabla temporaria
            CREATE TEMPORARY TABLE dias_de_la_semana(
                                                    id INT,
                                                    nombredia VARCHAR(100),
                                                    disweb VARCHAR(100)
                                                    );
            -- Insertar datos
            INSERT INTO dias_de_la_semana(id,nombredia,disweb)
            VALUES(1,'Domingo','Hoy no cursas diseño web'),
                (2,'Lunes','Hoy no cursas diseño web'),
                (3,'Martes','Hoy si cursas diseño web'),
                (4,'Miercoles','Hoy no cursas diseño web'),
                (5,'Jueves','Hoy si cursas diseño web'),
                (6,'Viernes','Hoy no cursas diseño web'),
                (7,'Sábado','Hoy no cursas diseño web');

            -- Mostrar si se cursa o no diseño web
            SELECT disweb as CURSADA FROM dias_de_la_semana WHERE dayofweek(now())=id;
                
            -- Consultar los dias de la semna
            SELECT * FROM dias_de_la_semana;
            -- Al finalizar el proceso de la consulta, se puede borrar de la memoria RAM
            DROP TEMPORARY TABLE dias_de_la_semana;
            END
        -->
</html>
