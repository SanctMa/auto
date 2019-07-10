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
            if(isset($_SESSION['user'])){
        ?>
        <?php
            if( !empty($_POST['add']) ) {
                $nserie = $_POST['nserie'];
                $marca = $_POST['marca'];
                $modelo = $_POST['modelo'];
                $anio = $_POST['anio'];
                $color = $_POST['color'];

                $in = "insert into autos value('', '$nserie', '$marca', '$modelo', '$color', '$anio')";
                $res = mysqli_query($conne,$in) or die("No hay conexion");
        ?>
        <main>
            <header>
                <h1>Registro Agregado</h1>
                <h3><a href="main.php" class="btn btn-info"><<</a></h3>
            </header>
            <section class="dow">
                <div class="second">
                    <table style="padding-left: 30%; padding-rigth: 35%;" class="table">
                        <tr>
                            <th># Serie</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>A&ntilde;o</th>
                            <th>Color</th>
                        </tr>
                        <tr>
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
        ?>
        <main>
            <header>
                <h1>Registro de Autom&oacute;viles</h1>
            </header>
            <div class="login">
                <form id="reg" method="post" action="add.php">
                    <div id="dg">
                        <input type="text" id="nserie" name="nserie" placeholder="N&uacute;mero de Serie" required title="# Serie" /><br />
                        <input type="text" name="marca" id="marca" placeholder="Marca" required /><br />
                        <input type="text" id="modelo" name="modelo" required placeholder="Modelo" /><br />
                        <input type="number" name="anio" id="anio" min="1900" max="2099" step="1" placeholder="Año" required /><br />
                        <input type="text" id="color" name="color" placeholder="Color"/>
                    </div>
                    <button name="add" type="submit" value="1" class="btn btn-success">Guardar</button><button type="reset" class="btn btn-danger">Borrar</button>
                </form>
            </div>
            </main>
        <?php
                }
            } else {
        ?>
        <main>
            <h1>Inicia Sesi&oacute;n para poder acceder</h1>
            <a href="index.php">Inicio</a>
        </main>
        <?php
            }
        ?>
        <footer>
            <p>Created by Magnus</p>
        </footer>
    </body>
</html>