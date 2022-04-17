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
    $conn = mysqli_connect("localhost", "root","", "relocadb");
    if (!$conn) {
        die("Error de conexion: " . mysqli_connect_error());
    }
    $v1 = $_REQUEST['pago'];
    $v2 = $_SESSION['id'];

    if($v1==1){
        $v3 = $_REQUEST['Codigo'];
        $v4 = $_REQUEST['FechCons'];
        if($v3==null || $v4==null){
            header("location:Debt.php");
        }else{
            $sql1 = "UPDATE consulta SET Estado = 1 WHERE Id_user = '$v2' and Id = '$v3' and FechaConsulta = '$v4'";
            $result = mysqli_query($conn, $sql1);
            ?>
            <section class="consulta2">
                <h1 style="text-align:center">Pago realizado exitosamente</h1>
                <div style="text-align:center">
                    <button class="buttonI">
                        <a href="Debt.php">Atrás</a>
                    </button>
                    <button class="buttonD">
                        <a href="Menu.php">Menú principal</a>
                    </button>
                </div>
            </section>
            <?php
        }
    }else{
        $sql2 = "UPDATE consulta SET Estado = 1 WHERE Id_user = '$v2'";
        $result = mysqli_query($conn, $sql2);
        ?>
            <section class="consulta2">
                <h1 style="text-align:center">Pago realizado exitosamente</h1>
                <div style="text-align:center">
                    <button class="buttonI">
                        <a href="Debt.php">Atrás</a>
                    </button>
                    <button class="buttonD">
                        <a href="Menu.php">Menú principal</a>
                    </button>
                </div>
            </section>
            <?php
    }
    ?>
</body>
</html>
