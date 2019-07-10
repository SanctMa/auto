<!DocType html>
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
            <h1>Administrador</h1>
        </header>
        <?php
            if(isset($_SESSION['user'])){
        ?>
        <main>
            <section>
                <?php
                    $query = "select * from autos";
                    $res = mysqli_query($conne,$query) or die("No hay conexion");
                ?>
                <div class="second">
                    <h1>Autom&oacute;viles</h1>
                    <table class="table">
                        <tr>
                            <th>id</th>
                            <th># Serie</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>A&ntilde;o</th>
                            <th>Color</th>
                            <th>Acci&oacute;n</th>
                        </tr>
                        <?php
                            if(mysqli_num_rows($res) > 0){
                                while($row = mysqli_fetch_array($res)) {
                                    $id = $row['aid'];
                                    $nserie = $row['nserie'];
                                    $marca = $row['marca'];
                                    $modelo = $row['modelo'];
                                    $color = $row['color'];
                                    $anio = $row['anio'];
                        ?>
                        <tr>
                            <td><?php echo $id ?></td>
                            <td><?php echo $nserie ?></td>
                            <td><?php echo $marca ?></td>
                            <td><?php echo $modelo ?></td>
                            <td><?php echo $anio ?></td>
                            <td><?php echo $color ?></td>
                            <td><a href="mod.php?id=<?php echo $id ?>" class="btn btn-primary" title="Modificar">E</a> <a href="del.php?id=<?php echo $id ?>" class="btn btn-danger" title="Borrar">D</a></td>
                        </tr>
                        <?php
                                }
                            } else {
                        ?>
                        <tr>
                            <td colspan="7"><h3>No hay Registros en la tabla!</h3></td>
                        </tr>
                        <?php
                            }
                        ?>
                        <tr>
                            <td colspan="7"><a href="add.php?aid=''" class="btn btn-success" title="Agegar registro">+</a></td>
                        </tr>
                    </table>
                </div>
            </section>
        </main>
        <?php
            } else {
        ?>
        <main class="container">
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