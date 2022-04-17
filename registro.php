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
            background-image: url('images/fondo2.png');
            font-family: 'Open Sans', sans-serif;
        }
        .panel2{
            margin-top: 200px;  
        }
        .form{
            background-color: white;
            border-radius: 15px;
            width: 330px;
            margin:auto;
            padding:15px;
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
            width: 320px;
            height: 30px;
            border-radius: 5px;
            border:1px;
        }
        .boton{
            border:1px;
            border-radius: 5px;
            font-family: 'Open Sans', sans-serif;
            font-size: 16px;
            padding:10px;
            justify-content: space-evenly;
        }
        .boton:hover{
            background-color: rgb(84, 168, 252);
        }
        .top{
            padding-left:15px;
            top:0;
            left:0;
            right:0;
            position: fixed;
            width: 100%;
            background-color: rgb(245, 117, 117,0.8);
            list-style-type: none;
            margin: 0;
        }
        .buttonI{
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
        .buttonI:hover{
            background-color: rgb(84, 168, 252);
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
    </style>
<?php
    //conexion a la Base de datos (Servidor,usuario,password)
    $conn = mysqli_connect("localhost", "root","", "relocadb");
    if (!$conn) {
        die("Error de conexion: " . mysqli_connect_error());
    }
    //(nombre de la base de datos, $enlace) mysql_select_db("Relocadb",$link);
    //capturando datos
    $v1 = $_REQUEST['Nombre'];
    $v2 = $_REQUEST['User'];
    $v3 = md5($_REQUEST['Contraseña']);

        $sql = "INSERT INTO Usuario (Nombre, User, Contra) ";
        $sql .= "VALUES ('$v1', '$v2', '$v3')";
        if (mysqli_query($conn, $sql)) {
            ?>
            <section class="panel2">
                <div class="respuesta">
                <h1 style="text-align:center">Datos ingresados correctamente!</h1>
                    <div style="text-align:center">
                        <button class="buttonI">
                            <a href="FormRegistrarPerro.php">Atras</a>
                        </button>
                    </div>
                </div>
            </section>
            <?php
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    

    //consulta SQL
    
    mysqli_close($conn);
    //Mensaje de conformidad
?>
</body>
</html>