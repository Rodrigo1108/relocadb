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
        body{
            margin-top: 200px;
            background-image: url('images/fondo2.png');
            font-family: 'Open Sans', sans-serif;
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
        a{
            font-family: 'Open Sans', sans-serif;
            text-decoration: none;
        }
        a:visited{
            color:black;
        }
        .respuesta{
            background-color: white;
            border-radius: 15px;
            width: 330px;
            margin:auto;
            padding:15px;
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
            padding: 0;
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
    //conexion a la Base de datos (Servidor,usuario,password)
    $conn = mysqli_connect("localhost", "root","", "relocadb");
    if (!$conn) {
        die("Error de conexion: " . mysqli_connect_error());
    }
    //(nombre de la base de datos, $enlace) mysql_select_db("Relocadb",$link);
    //capturando datos
    $v1 = $_REQUEST['Codigo'];
    $v2 = $_REQUEST['Nombre'];
    $v3 = $_REQUEST['FechNac'];
    $v4 = $_REQUEST['Raza'];
    $v5 = $_REQUEST['Genero'];
    //$v6 = $_REQUEST['Foto'];
    $v7 = $_SESSION["id"]; 

    $nombreimg = $_FILES['Foto']['name']; //nombre del archivo
    $archivo = $_FILES['Foto']['tmp_name']; //contiene el archivo
    $carpeta = "images";
    $ruta = $carpeta."/".$nombreimg; //images/nombre.jpg

    move_uploaded_file($archivo,$carpeta.'/'.$nombreimg);

    //consulta SQL
    $sql = "INSERT INTO Perro (DNI, Nombre, Raza, Genero, FechaNacimiento, Foto, Id_own) ";
    $sql .= "VALUES ('$v1', '$v2', '$v4', '$v5', '$v3', '$ruta','$v7')";
    if($_SESSION["rol"]==0){
        ?>
        <section>
        <ul>
            <li><a style="color: white;" class="active" href="FormConsultarPerro.php">Consultar perro</a></li>
            <li><a style="color: white;" href="FormRegistrarPerro.php">Registrar perro</a></li>
            <li><a style="color: white;" href="Consultar_Perro.php">Mis perros</a></li>
            <li><a style="color: white;" href="Debt.php">Pagos</a></li>
            <li><a style="color: white;" href="Blog.php">Blog</a></li>
            <li style="float:right; background-color: rgb(134, 188, 243)"><a style="color: white;" href="cerrar_sesion.php">Cerrar sesi??n</a></li>
            <li style="float:right;margin-right:10px;"><p style="margin:0;margin-top:14px;color:white"><?php echo $_SESSION["nombre"];?></p></li>
        </ul>
        </section>
        <?php
    }else{
        ?>
        <section>
        <ul>
        <li><a style="color: white;" class="active" href="FormConsultarPerro.php">Consultar perro</a></li>
            <li><a style="color: white;" href="FormRegistrarPerro.php">Registrar perro</a></li>
            <li><a style="color: white;" href="Consultar_Perro.php">Perros registrados</a></li>
            <li><a style="color: white;" href="FormRegistrarConsulta.php">Registrar consultas</a></li>
            <li><a style="color: white;" href="Blog.php">Blog</a></li>
            <li style="float:right; background-color: rgb(134, 188, 243)"><a style="color: white;" href="cerrar_sesion.php">Cerrar sesi??n</a></li>
            <li style="float:right;margin-right:10px;"><p style="margin:0;margin-top:14px;color:white"><?php echo $_SESSION["nombre"];?></p></li>
        </ul>
        </section>
        <?php
    }
    if (mysqli_query($conn, $sql)) {
        ?>
        <div class="respuesta">
        <h1 style="text-align:center">Datos ingresados correctamente!</h1>
            <div style="text-align:center">
                <button class="buttonI">
                    <a href="FormRegistrarPerro.php">Atras</a>
                </button>
                <button class="buttonD">
                    <a href="Menu.php">Men?? principal</a>
                </button>
            </div>
        </div>
        
        <?php
    } else {
        header("location:FormRegistrarPerro.php");
        
    }
    mysqli_close($conn);
    //Mensaje de conformidad
?>
</body>
</html>
