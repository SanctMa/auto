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
        <?php
            if( !empty($_POST['add']) ) {
                $aid = $_POST['aid'];
                $nserie = $_POST['nserie'];
                $marca = $_POST['marca'];
                $modelo = $_POST['modelo'];
                $anio = $_POST['anio'];
                $color = $_POST['color'];

                $in = "update  autos set nserie = '$nserie', marca = '$marca', modelo = '$modelo', color = '$color', anio = '$anio' where aid = '$aid'";
                $res = mysqli_query($conne,$in) or die("No hay conexion");
        ?>
        <main>
            <header>
                <h1>Registro Modificado</h1>
                <h3><a href="main.php" class="btn btn-info"><<</a></h3>
            </header>
            <section class="dow">
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
        </main>
        <?php
            } else {
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
        <main>
            <header>
                <h1>Registro de Autom&oacute;viles</h1>
            </header>
            <div class="login">
            <form id="reg" method="post" action="mod.php">
                <div id="dg">
                    <input type="text" id="nserie" name="nserie" placeholder="N&uacute;mero de Serie" required title="# Serie" value="<?php echo $nserie ?>" /><br />
                    <input type="text" name="marca" id="marca" value="<?php echo $marca ?>" placeholder="Marca" required /><br />
                    <input type="text" id="modelo" name="modelo" value="<?php echo $modelo ?>" required placeholder="Modelo" /><br />
                    <input type="number" name="anio" id="anio" value="<?php echo $anio ?>" min="1900" max="2099" step="1" placeholder="Año" required /><br />
                    <input type="text" id="color" name="color" value="<?php echo $nserie ?>" placeholder="Color"/>
                    <input type="hidden" name="aid" id="aid" value="<?php echo $aid ?>" />
                </div>
                <button name="add" type="submit" value="1" class="btn btn-success">Guardar</button><button type="reset" class="btn btn-danger">Borrar</button>
            </form>
        </div>
    </main>
    <?php
            }
        ?>
        <footer class="succe">
            Created by Magnus
        </footer>
    </body>
</html>