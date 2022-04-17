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
        p{
            line-height:1.8;
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
        h1:hover{
            color:dodgerblue;
        }
        .enfermedad{
            padding:15px 30px;
            background-color: white;
            margin:auto;
            width: 720px;
            border-radius: 15px;
        }
    </style>
    <?php
    if($_SESSION["rol"]==0){
        ?>
        <section>
        <ul>
            <li><a style="color: white;" class="active" href="Menu.php">Home</a></li>
            <li><a style="color: white;" class="active" href="FormConsultarPerro.php">Consultar perro</a></li>
            <li><a style="color: white;" href="FormRegistrarPerro.php">Registrar perro</a></li>
            <li><a style="color: white;" href="Consultar_Perro.php">Mis perros</a></li>
            <li><a style="color: white;" href="Debt.php">Pagos</a></li>
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
            <li><a style="color: white;" href="FormRegistrarConsulta.php">Registrar consultas</a></li>
            <li style="float:right; background-color: rgb(134, 188, 243)"><a style="color: white;" href="cerrar_sesion.php">Cerrar sesión</a></li>
            <li style="float:right;margin-right:10px;"><p style="margin:0;margin-top:14px;color:white"><?php echo $_SESSION["nombre"];?></p></li>
        </ul>
        </section>
        <?php
    }
    ?>
    <section>
        <div class="enfermedad">
            <h1 style="font-size:30px">OJO SECO, MOLESTIA OCULAR RECURRENTE</h1>
            <img src="images/Ojo_seco.jpg" alt="Ojo seco">
            <p>Muchas veces llegan pacientes a consulta que presentan constantemente legañas o mucosidad 
                en ambos ojos, y que son tratados por sus propietarios con algodón húmedo o lavados caseros 
                con agua de infusión de manzanilla. Pero realmente no se llega a fondo de la posible causa 
                que origina este síntoma y que es común en la práctica veterinaria diaria.</p>
            <p>Debemos de conocer antes que la enfermedad del Síndrome del ojo seco o queratoconjuntivis seca,
                se produce por la falta o disminución en la producción de lágrimas o por una alteración en la 
                composición de la película lagrimal. Generando muchas veces la afección en ambos ojos que 
                suele ser progresivo.</p>
            <img src="images/Ojo_seco_chequeo.jpg" alt="Ojo seco chequeo" style="float:left;margin-right:20px">
            <h3>Síntomas</h3>
            <p>Los síntomas más habituales que podemos observar con frecuencia son las legañas persistentes o la mayor
                producción de moco, conjuntiva enrojecida, vasos sanguíneos corneales congestivos, pigmentación de la 
                superficie corneal y en casos más graves complicarse con ulceras profundas o ceguera.</p>
            <h3>Causas comunes</h3>
            <p>Tener en cuenta que las causas comunes pueden empezar con procesos inflamatorios de tipo autoinmune, 
                predisposición racial, genéticas o secundarias a otras enfermedades como alergias alimentarias, 
                atopia, endocrinas, virales, etc.</p>
            <img src="images/Ojo_seco_chequeo2.jpg" alt="Ojo seco chequeo 2" style="width:230px;height:280px;float:right;margin-left:20px;margin-top:15px">
            <h3>Diagnóstico y tratamiento</h3>
            <p>El diagnóstico y tratamiento consiste en evaluar la superficie ocular, realizar el test de medición 
                lagrimal y conocer sus antecedentes; una vez realizado los exámenes complementarios y definida la 
                causa primaria se debe aportar lágrimas artificiales, colirios o ungüentos tópicos, todo esto para 
                minimizar la sequedad ocular. Lamentablemente suele ser una enfermedad progresiva, tediosa de tratar 
                y con cura no definitiva por la que el plan terapéutico debe ser muchas veces de por vida.</p>
            <h3>Importante</h3>
            <p>Es importante que ante la sospecha de los síntomas o si la mascota ya presentara estas molestias debe 
                ser evaluado inmediatamente para que se determine si la evolución de la enfermedad es por un evento 
                secundario o primario, y de ser el caso sea tratado de manera paralela a enfermedad que padece en ese 
                momento. En todo caso si su origen es netamente oftalmológico, reciba un tratamiento temprano y a 
                largo plazo de manera preventiva.</p>
            <p>MSc. Mv. Enrique J. Ferreyra Poicón CMVP: 7029</p>
        </div>
        <br>
        <div class="enfermedad">
            <h1 style="font-size:30px">PRIMERA CONSULTA EN TU CACHORRO RECIÉN ADOPTADO</h1>
            <div style="text-align:center">
                <img src="images/Adoptado.jpg" alt="Adoptado">
            </div>
            <h3>¿Es importante la primera consulta de mi cachorro?</h3>
            <p>Si, es muy importante la primera consulta en tu cachorro, debido a que se evaluará 
            su estado de salud mediante un examen físico.</p>
            <h3>¿En qué consiste la primera consulta?</h3>
            <p>El Médico Veterinario realizará una anamnesis, que consiste en una breve información 
            sobre estado actual de tu mascota. Luego, el examen físico, que consiste en: evaluación
            de las mucosas orales, observar si hay deshidratación, auscultación cardiaca y pulmonar,
            dolor abdominal y temperatura, entre otros.</p>
            <h3>¿Por qué debo llevar a mi cachorro recién adoptado a la clínica veterinaria?</h3>
            <p>Además de revisar el estado de salud de tu cachorro, el Médico Veterinario te elaborará
                un protocolo de vacunación y desparasitación, así mismo te dará las recomendaciones 
                sobre el tipo de alimentación que requerirá y los cuidados que debes tener con el recién 
                llegado.</p>
            <img src="images/Adoptado2.jpg" alt="Ojo seco chequeo 2" style="height:280px;float:right;margin-left:20px;margin-top:15px">
            <h3>Observación</h3>
            <p>Si el estado de salud de tu cachorro no es el ideal para iniciar el protocolo de vacunación y 
                desparasitación, el Médico Veterinario te recomendará realizar exámenes complementarios.</p>
            <h3>Recomendaciones</h3>
            <p>Si tu cachorro presenta signos clínicos cómo, por ejemplo: inapetencia, vómitos y diarreas, no debes medicarlo, 
                llévalo rápidamente a una veterinaria. No saques a tu cachorro al parque/calle si no ha culminado
                 el protocolo de vacunación. Mientras tanto, socialízalo con otros perros conocidos, que sabes 
                 están sanos.</p>
            <p>M.V. Dipl. Rolando Edilberto Campos Layos CMVP: 12022</p> 
        </div>
    </section>
</body>
</html>