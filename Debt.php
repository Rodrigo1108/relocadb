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
        #opcionU{
            display:none;
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
            width: 280px;
            height: 30px;
            border-radius: 5px;
            border:1px;
        }
        .form{
            background-color: white;
            border-radius: 15px;
            width: 330px;
            margin:auto;
            
        }
    </style>
    <section>
        <ul>
        <li><a style="color: white;" class="active" href="Menu.php">Home</a></li>
        <li><a style="color: white;" href="FormConsultarPerro.php">Consultar perro</a></li>
            <li><a style="color: white;" href="FormRegistrarPerro.php">Registrar perro</a></li>
            <li><a style="color: white;" href="Consultar_Perro.php">Mis perros</a></li>
            <li><a style="color: white;" href="Debt.php">Pagos</a></li>
            <li><a style="color: white;" href="Blog.php">Blog</a></li>
            <li style="float:right; background-color: rgb(134, 188, 243)"><a style="color: white;" href="cerrar_sesion.php">Cerrar sesión</a></li>
            <li style="float:right;margin-right:10px;"><p style="margin:0;margin-top:14px;color:white"><?php echo $_SESSION["nombre"];?></p></li>
        </ul>
    </section>
    <section class="consulta">
        <?php
        $conn = mysqli_connect("localhost", "root","", "relocadb");
        if (!$conn) {
            die("Error de conexion: " . mysqli_connect_error());
        }
        if($_SESSION["rol"]==0){
            $usuario = $_SESSION["id"];
            //Suma de las consultas
            $sql = "SELECT SUM(CostoConsulta) FROM consulta WHERE Id_user='$usuario' and Estado = 0";
            $result = mysqli_query($conn, $sql);
            $row=mysqli_fetch_array($result);
            //echo $row[0];

            $sql1 = "select * from Consulta where Id_user = '$usuario' and Estado = 0";
            $result1 = mysqli_query($conn, $sql1);
            //$row1 = mysqli_fetch_array($result1);

            $num_resultados = mysqli_num_rows($result1);
            /*
            if($num_resultados==0){
                ?>
                <p>No existe</p>
                <?php
            }
            */
            ?>
            
            <h1 style="text-align:center">Pagos pendientes</h1>
            <p>Número de consultas: <?php echo $num_resultados;?></p>
            <?php
            $i=0;
            //mostrando informacion de los perros y detalle
            while($row1=mysqli_fetch_array($result1)){
                ?>
                <h4>Consulta N°<?php echo $i+1?></h4>
                <table>
                    <tr>
                        <th>DNI</th>
                        <td><?php echo $row1["Id"];?></td>
                    </tr>
                    <tr>
                        <th>Veterinario</th>
                        <td><?php echo $row1["Veterinario"];?></td>
                    </tr>
                    <tr>
                        <th>Fecha Consulta</th>
                        <td><?php echo $row1["FechaConsulta"];?></td>
                    </tr>
                    <tr>
                        <th>Costo Consulta</th>
                        <td><?php echo $row1["CostoConsulta"];?></td>
                    </tr>       
                </table>
                <?php
                $i=$i+1;
                ?>
                <?php
            }
            ?>
            <br>
            <hr>
            <h4 style="text-align:center">La suma total a pagar es: <?php echo $row[0];?></h4>
            <?php
            if($row[0]>0){
                ?>
                <section class="form">
                <form action="Pagar_debt.php" method="POST" enctype="multipart/form-data">
                    <p class="input-box" style="text-align:center">Método de pago</p>
                    <p style="font-size:14px;text-align:center">Unitario <input id="unitario" name="pago" type = "Radio" value=1 required>
                        Total <input id="total" name="pago" type = "Radio" value=0 required></p>
                    <div id="opcionU">
                        <p class="input-box">DNI</p>
                        <input class="input-box-content" name = "Codigo" type text placeholder="Ingresar DNI"  
                        minlength="8" maxlength="8" title='Ingrese codigo de 8 caracteres'>
                        <p class="input-box">Fecha de consulta</p> 
                        <input class="input-box-content" name= "FechCons" type = "Date" placeholder="Fecha de consulta" >
                    </div>
                    <br>
                    <div style="text-align:center;">
                        <button class="buttonI" style="cursor:pointer" name="Registrar" type="submit">Pagar</button>
                    </div>
                </form>
            </section>
            <?php
            }
            ?>
            
            <br>
            <section style="text-align:center">
                <button class="buttonD">
                    <a href="Menu.php">Menú principal</a>
                </button>
            </section>
        <?php
        }
        ?>
    </section>
    <script>
        document.getElementById("unitario").addEventListener("click", mostrar);
        function mostrar(){
            document.getElementById('opcionU').style.display='block';
        }
        document.getElementById("total").addEventListener("click", ocultar);
        function ocultar(){
            document.getElementById('opcionU').style.display='none';
        }
    </script>   
</body>
</html>
