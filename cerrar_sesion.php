<?php
if(isset($_SESSION["usuario"])){
    echo "hola";
}else{
    session_start();
    session_destroy();
    header("location:index.html");
}
?>