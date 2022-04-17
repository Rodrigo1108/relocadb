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
            width: 700px;
            margin:auto;
            padding:15px 40px;
        }
        .consulta2{
            border-radius:15px;
            background-color: white;
            width: 300px;
            margin:auto;
            padding:15px 40px;
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
            
        }
        .buttonD{
            background-color: rgba(119, 118, 118, 0.938);
            
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
    <?php
    //conexion a la Base de datos (Servidor,usuario,password)
    $conn = mysqli_connect("localhost", "root","", "relocadb");
    if (!$conn) {
        die("Error de conexion: " . mysqli_connect_error());
    }
    //(nombre de la base de datos, $enlace) mysql_select_db("RelocaDB",$link);
    //capturando datos
    //$v2 = $_REQUEST['DNI'];
    
    $v3 = $_SESSION["id_perro"];           
    //conuslta SQL
    $sql = "select * from consulta where Id = '$v3'";
    $result = mysqli_query($conn, $sql);
    //cuantos reultados hay en la busqueda
    $num_resultados = mysqli_num_rows($result);

    if($num_resultados==0){
        ?>
        <section class="consulta2">
            <h1 style="text-align:center">No existen registros de consultas</h1>
            <div style="text-align:center">
                <button class="buttonI">
                    <a href="FormConsultarPerro.php">Atrás</a>
                </button>
                <button class="buttonD">
                    <a href="Menu.php">Menú principal</a>
                </button>
            </div>
        </section>
        <?php
    }else{
        ?>
        <section class="consulta">
        <h1 style="text-align:center">Registro de consultas</h1>
        <?php
            $i=0;
            //mostrando informacion de los perros y detalle
            while($row=mysqli_fetch_array($result)){
                ?>
                <h4>Consulta N° <?php echo $i+1?></h4>
                <?php
        ?>
        
        <table>
            <tr>
                <th>Id</th>
                <td><?php echo $row["Id"];?></td>
            </tr>
            <tr>
                <th>Veterinario</th>
                <td><?php echo $row["Veterinario"];?></td>
            </tr>
            <tr>
                <th>Fecha consulta</th>
                <td><?php echo $row["FechaConsulta"];?></td>
            </tr>
            <tr>
                <th>Síntomas</th>
                <td><?php echo $row["Sintoma"];?></td>
            </tr>
            <tr>
                <th>Rayos X</th>
                <?php
                $rayos=$row["Rayosx"];
                if($rayos=="images/"){
                    ?>
                    <td>No se hicieron tomas de Rayos X</td>
                    <?php
                }else{
                    ?>
                    <td><img src="<?php echo $row["Rayosx"];?>" alt=""></td>
                    <?php
                }
                ?>
            </tr>
            <tr>
                <th>Resultados de sangre</th>
                <?php
                $blood=$row["BloodT"];
                if($blood=="images/"){
                    ?>
                    <td>No se hicieron pruebas de sangre</td>
                    <?php
                }else{
                    ?>
                    <td><iframe src="<?php echo $row["BloodT"];?>" alt="" style="height:400px;width:400px"></iframe></td>
                    <?php
                }
                ?>
                
            </tr>
            <tr>
                <th>Diagnóstico</th>
                <td><?php echo $row["Diagnostico"];?></td>
            </tr>
            <tr>
                <th>Medicinas</th>
                <td><?php echo $row["Medicina"];?></td>
            </tr>
            <tr>
                <th>Costo consulta</th>
                <td><?php echo $row["CostoConsulta"];?></td>
            </tr>
            <tr>
                <th>Pago <br>1: realizado <br>0: pendiente</th>
                <td><?php echo $row["Estado"];?></td>
            </tr>
        </table>                
        <br>
    <?php
        $i=$i+1;
        ?>
        <hr>
        <?php
        }
        ?>
        <div style="text-align:center">
            <button class="buttonI">
                <a href="FormConsultarPerro.php">Atrás</a>
            </button>
            <button class="buttonD">
                <a href="Menu.php">Menú principal</a>
            </button>
        </div>
    <?php
    }
    ?>
    </section>
</body>
</html>
