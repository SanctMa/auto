<?php
    session_start();
    include "conect.php";

    $db = "auto";
    $sdb=mysqli_select_db($conne,$db) or die("la base de datos no existe");
?>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel=stylesheet href="bootstrap-4.0.0-dist/css/bootstrap.css"/>
        <link rel=stylesheet href="bootstrap-4.0.0-dist/css/bootstrap-grid.css"/>
        <link rel=stylesheet href="bootstrap-4.0.0-dist/css/bootstrap-reboot.css"/>
        <link rel="stylesheet" href="style.css" />
        <title>Registro de Automóviles</title>
    </head>
    <body>
        <header>
            <h1>Registro Eliminado <a href="main.php" class="btn btn-info"><<</a></h1>
        </header>
        <main>
            <?php
                $aid = $_GET['id'];
                $query = "select * from autos where aid = '$aid'";
                $res = mysqli_query($conne,$query) or die("No hay conexion");
                $row = mysqli_fetch_assoc($res);
                $nserie = $row['nserie'];
                $marca = $row['marca'];
                $modelo = $row['modelo'];
                $anio = $row['anio'];
                $color = $row['color'];
            ?>
            <section class="dow">
                <h2>Registro</h2>
                <div class="second">
                <table style="padding-left: 30%; padding-rigth: 35%;" class="table">
                    <tr>
                        <th>ID</th>
                        <th># Serie</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>A&ntilde;o</th>
                        <th>Color</th>
                    </tr>
                    <tr>
                        <td><?php echo $aid ?></td>
                        <td><?php echo $nserie ?></td>
                        <td><?php echo $marca ?></td>
                        <td><?php echo $modelo ?></td>
                        <td><?php echo $anio ?></td>
                        <td><?php echo $color ?></td>
                    </tr>
                </table>
                </div>
            </section>
            <?php
                $del = "delete from autos where autos.aid = $aid";
                $res = mysqli_query($conne,$del) or die("No hay conexion");
            ?>
        </main>
        <footer class="succe">
            Created by Magnus
        </footer>
    </body>
</html>