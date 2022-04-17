<?php
/*
if(isset($_SESSION["usuario"])){
    echo "hola";
}else{
    session_start();
}
*/
session_start();
if(isset($_SESSION["usuario"])==null ||isset($_SESSION["usuario"])==''){
    header("location:index.html");
}
/*
$varsession=$_SESSION["usuario"];
if($varsession==null || $varsession=''){
    echo "hola";
    die();
}
*/
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
        table{
            margin:auto;
            text-align: center;
            align-items: center;
        }
        th, td{
            padding:10px;
        }
        body{
            margin-top:75px;
            background-image: url('images/fondo2.png');
            background-size: cover;
            background-attachment: fixed;
            font-family: 'Open Sans', sans-serif;
        }
        a{
            color:black;
            text-decoration: none;
        }
        a:visited{
            color:black;
        }
        button{
            background-color: bisque;
            border:1px ;
            border-radius: 5px;
            font-family: 'Open Sans', sans-serif;
            font-size: 16px;
            padding:10px;
        }
        button:hover{
            background-color: rgba(85, 85, 85, 0.938);
        }
        .contenido{
            margin:auto;
            width: 600px;
        }
        .form{
            padding:15px;
            background-color: white;
            margin:auto;
            width: 600px;
            border-radius: 15px;
        }
        ul{
            padding:0;
            top:0;
            left:0;
            right:0;
            position: fixed;
            width: 100%;
            background-color:rgba(53, 52, 52);
            list-style-type: none;
            margin: 0;
        }
        li {
            float: left;
        }
        li a{
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
            <li><a style="color: white;" class="active" href="FormConsultarPerro.php">Consultar perro</a></li>
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
        <li><a style="color: white;" class="active" href="FormConsultarPerro.php">Consultar perro</a></li>
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
    
    <section class="form">
        <div class="contenido">
            <p style="text-shadow: 2px 2px 5px rgb(236, 190, 134);text-align:center;font-size:40px;margin:2px;color: rgb(53, 52, 52);">Registro local canino</9>
            
            <hr style="color:rgb(53, 52, 52);">
        </div>
        <div>
            <table>
                <tr>
                    <th>
                        <img src="images/fondo.jpg" style="width:230px;height:330px">
                    </th>
                    <th>
                        <img src="images/levi.jpg" style="width:230px;height:330px">
                    </th>
                </tr>
                <tr>
                    <td>
                        <button>
                            <a href="FormConsultarPerro.php">Consultar perro</a>
                        </button>
                    </td>
                    <td>
                        <button>
                            <a href="FormRegistrarPerro.php">Registrar perro</a>
                        </button>
                    </td>
                </tr>
            </table>
        </div> 
    </section>
</body>
</html>

