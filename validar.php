<?php
$user=$_POST["usuario"];
$password=md5($_POST["contraseña"]);
session_start();
$_SESSION["usuario"]=$user;

$conn = mysqli_connect("localhost", "root","", "relocadb");
if (!$conn) {
    die("Error de conexion: " . mysqli_connect_error());
}

$sql = "select * from Usuario where User='$user' and Contra='$password'";
$resultado = mysqli_query($conn,$sql);

$total = mysqli_num_rows($resultado);

if($total){
    $total2 = mysqli_fetch_array($resultado);
    $_SESSION["rol"]=$total2["Id_rol"];
    
    
    $sql2 = "select Nombre from Usuario where User='$user' and Contra='$password'";
    $nombre = mysqli_query($conn,$sql2);
    $row=mysqli_fetch_array($nombre);
    $_SESSION["nombre"]=$row[0];
    
    $sql3 = "select Id from Usuario where User='$user' and Contra='$password'";
    $id = mysqli_query($conn,$sql3);
    $row2=mysqli_fetch_array($id);
    $_SESSION["id"]=$row2[0];
    
    if($total2["Id_rol"]==1 || $total2["Id_rol"==0]){
        
        header("location:Menu.php");
    
    }else{
        
        ?>
        <h1>Error en la autentificacion</h1>
        <?php
        header("location:index.html");
        ?>
        
        <?php
    }
}else{
    ?>
    <?php
    header("location:index.html");
    ?>
    <h1>Error en la autentificacion</h1>
    <?php
}



/*
if($total){
    header("location:Menu.php");
}else{
    
    ?>
    <?php
    header("location:index.html");
    ?>
    <h1>Error en la autentificacion</h1>
    <?php
}
*/
mysqli_free_result($resultado);
mysqli_free_result($nombre);
mysqli_free_result($id);
mysqli_close($conn);
?>