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
            margin-top:80px;
            background-image: url('images/fondo2.png');
            font-family: 'Open Sans', sans-serif;
        }
        .form{
            background-color: white;
            border-radius: 15px;
            width: 380px;
            margin:auto;
            padding:15px 30px;
        }
        input{
            background-color: bisque;
            font-family: 'Open Sans', sans-serif;
        }
        .input-box{
            font-size: 15px;
            font-weight:501;
        }
        .input-box-content{
            padding:5px;
            font-size: 14px;
            width: 360px;
            height: 30px;
            border-radius: 5px;
            border:1px;
        }
        .input-file{
            font-family: 'Open Sans', sans-serif;
        }
        .input-button{
            justify-content: space-evenly;
        }
        .buttonI,.buttonD{
            cursor: pointer;
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
            margin-top:8px;
            background-color: rgba(119, 118, 118, 0.938);
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
        select{
            background-color: bisque;
            font-size: 14px;
            font-family: 'Open Sans', sans-serif;
            height: 30px;
            border-radius: 5px;
            border:1px;
            margin-left: 15px; 
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
        <li><a style="color: white;" class="active" href="FormConsultarPerro.php">Consultar perro</a></li>
            <li><a style="color: white;" href="FormRegistrarPerro.php">Registrar perro</a></li>
            <li><a style="color: white;" href="Consultar_Perro.php">Perros registrados</a></li>
            <li><a style="color: white;" href="Blog.php">Blog</a></li>
            <li style="float:right; background-color: rgb(134, 188, 243)"><a style="color: white;" href="cerrar_sesion.php">Cerrar sesión</a></li>
            <li style="float:right;margin-right:10px;"><p style="margin:0;margin-top:14px;color:white"><?php echo $_SESSION["nombre"];?></p></li>
        </ul>
        </section>
        <?php
    }
    ?>
    <section class="form">
        <form action="Registrar_consulta.php" method="POST" enctype="multipart/form-data">
            <h1 style="text-align:center">Sistema de Identificación Perruno</h1>
            <p class="input-box">Ingresar código</p>
            <input class="input-box-content" name = "Codigo" type text placeholder="Ingresar codigo" required="" 
            minlength="8" maxlength="8" title='Ingrese codigo de 8 caracteres'>
            <p class="input-box">Fecha de consulta</p> 
            <input class="input-box-content" name= "FechCons" type = "Date" placeholder="Fecha de consulta" required>
            <p class="input-box">Ingresar sintomas</p>
            <input class="input-box-content" name = "Sintomas" type text placeholder="Ingresar sintomas" required>
            <p class="input-box">Subir foto</p> 
            <input class="input-file" type = "file" name = "Rayosx" id="Rayosx">
            <p class="input-box">Ingresar resultados del análisis de sangre</p>
            <input class="input-file" name = "BloodT" type="file" placeholder="Ingresar resultados">
            <p class="input-box">Ingresar diagnóstico</p>
            <input class="input-box-content" name = "Diagnosis" type text placeholder="Ingresar diagnóstico" required>
            <p class="input-box">Ingresar medicinas</p>
            <input class="input-box-content" name = "Medicina" type text placeholder="Ingresar medicinas" required>
            <p class="input-box">Ingresar costo consulta</p>
            <input class="input-box-content" name = "CostoConsulta" type text placeholder="Ingresar costo" required>
            
            
            <br><br>
            <center>
                <button class="buttonI" name="Registrar" type="submit">Registrar</button>
            </center>
        </form>
        <center>
            <button class="buttonD" type="submit"><a href="Menu.php">Atras</a></button>
        </center>
    </section>
</body>
</html>