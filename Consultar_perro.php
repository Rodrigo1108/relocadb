<?php
session_start();
if(isset($_SESSION["usuario"])==null ||isset($_SESSION["usuario"])==''){
    header("location:index.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,330;0,700;1,800&display=swap" rel="stylesheet">
</head>
<body>
    <style>
        img{
            width:150px;
            height:150px;
        }
        a{
            text-decoration: none;
        }
        a:visited{
            color:black;
        }
        body{
            margin-top:80px;
            background-image: url('images/fondo2.png');
            font-family: 'Open Sans', sans-serif;
        }
        table, th, td{
            padding: 10px 40px;
            border-collapse: collapse;
        }
        tr:nth-child(even){
            background-color: bisque;}
        table{
            margin:auto;
            background-color: white;
        }
        .consulta{
            border-radius:15px;
            background-color: white;
            width: 500px;
            margin:auto;
            padding:15px;
        }
        .buttonI,.buttonD{
            border:1px;
            border-radius: 5px;
            font-family: 'Open Sans', sans-serif;
            font-size: 16px;
            padding:10px;
            justify-content: space-evenly;
        }
        .buttonI{
            background-color: rgb(142, 198, 255);
            margin-right: 10px;
        }
        .buttonD{
            background-color: rgba(119, 118, 118, 0.938);
            margin-left: 10px;
        }
        .buttonI:hover{
            background-color: rgb(84, 168, 252);
        }
        .buttonD:hover{
            background-color: rgba(85, 85, 85, 0.938);
        }
        ul{
            top:0;
            left:0;
            right:0;
            position: fixed;
            width: 100%;
            background-color:rgba(53, 52, 52);
            list-style-type: none;
            margin: 0;
            padding:0;
        }
        li {
            float: left;
        }

        li a {
            display: block;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: dodgerblue;
        }
    </style>
    <?php
    if($_SESSION["rol"]==0){
        ?>
        <section>
        <ul>
        <li><a style="color: white;" class="active" href="Menu.php">Home</a></li>
            <li><a style="color: white;" href="FormRegistrarPerro.php">Registrar perro</a></li>
            <li><a style="color: white;" href="Consultar_Perro.php">Mis perros</a></li>
            <li><a style="color: white;" href="Debt.php">Pagos</a></li>
            <li><a style="color: white;" href="Blog.php">Blog</a></li>
            <li style="float:right; background-color: rgb(134, 188, 243)"><a style="color: white;" href="cerrar_sesion.php">Cerrar sesión</a></li>
            <li style="float:right;margin-right:10px;"><p style="margin:0;margin-top:14px;color:white"><?php echo $_SESSION["nombre"];?></p></li>
        </ul>
        </section>
        <?php
    }else{
        ?>
        <section>
        <ul>
        <li><a style="color: white;" class="active" href="Menu.php">Home</a></li>
            <li><a style="color: white;" href="FormRegistrarPerro.php">Registrar perro</a></li>
            <li><a style="color: white;" href="Consultar_Perro.php">Perros registrados</a></li>
            <li><a style="color: white;" href="FormRegistrarConsulta.php">Registrar consultas</a></li>
            <li><a style="color: white;" href="Blog.php">Blog</a></li>
            <li style="float:right; background-color: rgb(134, 188, 243)"><a style="color: white;" href="cerrar_sesion.php">Cerrar sesión</a></li>
            <li style="float:right;margin-right:10px;"><p style="margin:0;margin-top:14px;color:white"><?php echo $_SESSION["nombre"];?></p></li>
        </ul>
        </section>
        <?php
    }
    ?>
    <section class="consulta">
        <?php
        //conexion a la Base de datos (Servidor,usuario,password)
        $conn = mysqli_connect("localhost", "root","", "relocadb");
        if (!$conn) {
            die("Error de conexion: " . mysqli_connect_error());
        }
        //(nombre de la base de datos, $enlace) mysql_select_db("RelocaDB",$link);
        if($_SESSION["rol"]==1){
            $sql0 = "select * from perro";
            $result = mysqli_query($conn, $sql0);
            //cuantos reultados hay en la busqueda
            $num_resultados = mysqli_num_rows($result);
            /*
            if($num_resultados==0){
                ?>
                <p>No existe</p>
                <?php
            }
            */
            ?>
            <h1 style="text-align:center">Registro de perros</h1>
            <p>Número de perros encontrados: <?php echo $num_resultados;?></p>
            <?php
                $i=0;
                //mostrando informacion de los perros y detalle
                while($row=mysqli_fetch_array($result)){
                    
                    ?>
                    <p>Amigo canino N°<?php echo $i+1?></p>
                    <table>
                        <tr>
                            <th>DNI</th>
                            <td><?php echo $row["DNI"];?></td>
                        </tr>
                        <tr>
                            <th>Nombre</th>
                            <td><?php echo $row["Nombre"];?></td>
                        </tr>
                        <tr>
                            <th>Raza</th>
                            <td><?php echo $row["Raza"];?></td>
                        </tr>
                        <tr>
                            <th>Genero</th>
                            <td><?php echo $row["Genero"];?></td>
                        </tr>
                        <tr>
                            <th>Fecha</th>
                            <td><?php echo $row["FechaNacimiento"];?></td>
                        </tr>
                        <tr>
                            <th>Foto</th>
                            <td><img src="<?php echo $row["Foto"];?>" alt=""></td>
                        </tr>
                    </table>
                    
                    
                    <?php
                    $i=$i+1;
                    ?>
                    <?php
                }
            ?>
            <br>
            <section style="text-align:center">
                <button class="buttonD">
                    <a href="Menu.php">Menú principal</a>
                </button>
            </section>
        </section>
        <?php
        }
        else{
            //capturando datos
            //$v2 = $_REQUEST['DNI'];
            $v3 = $_SESSION["id"];           
            //conuslta SQL
            $sql = "select * from Perro where Id_own = '$v3'";
            $result = mysqli_query($conn, $sql);
            //cuantos reultados hay en la busqueda
            $num_resultados = mysqli_num_rows($result);
            /*
            if($num_resultados==0){
                ?>
                <p>No existe</p>
                <?php
            }
            */
            ?>
            <h1 style="text-align:center">Registro de perros</h1>
            <p>Número de perros encontrados: <?php echo $num_resultados;?></p>
            <?php
                $i=0;
                //mostrando informacion de los perros y detalle
                while($row=mysqli_fetch_array($result)){
                    
                    ?>
                    <p>Amigo canino N°<?php echo $i+1?></p>
                    <table>
                        <tr>
                            <th>DNI</th>
                            <td><?php echo $row["DNI"];?></td>
                        </tr>
                        <tr>
                            <th>Nombre</th>
                            <td><?php echo $row["Nombre"];?></td>
                        </tr>
                        <tr>
                            <th>Raza</th>
                            <td><?php echo $row["Raza"];?></td>
                        </tr>
                        <tr>
                            <th>Genero</th>
                            <td><?php echo $row["Genero"];?></td>
                        </tr>
                        <tr>
                            <th>Fecha</th>
                            <td><?php echo $row["FechaNacimiento"];?></td>
                        </tr>
                        <tr>
                            <th>Foto</th>
                            <td><img src="<?php echo $row["Foto"];?>" alt=""></td>
                        </tr>
                    </table>
                    
                    
                    <?php
                    $i=$i+1;
                    ?>
                    <?php
                }
            ?>
            <br>
            <section style="text-align:center">
                <button class="buttonD">
                    <a href="Menu.php">Menú principal</a>
                </button>
            </section>
        </section>
        <?php
        }    
        ?>  
</body>
</html>
