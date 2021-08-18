<?php
session_start();
//include_once('./src/router.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro the whiskers</title>
    <!-- CDN BOOTSTRAP AND JQUERY
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="./js/hello.all.js"></script>
    <script src="../js/jquery.js"></script>

    <style>
        @media screen and (max-width: 800px) {
         #Contenedor{
                         width:100%;
                         }
        }
        @media screen and (max-device-width : 480px) {

            #sidebar{
                display:none;
                }

                    #menu{
                text-align:center;
                }
        }
        @media screen and (min-device-width : 768px) and (max-device-width : 1024px) and (orientation : landscape){
            .entry, .entry-content
            {
                font-size:1.2em;
                line-height:1.5em;
            }
        }
        *{
            box-sizing: border-box;
        }

        body{
            padding: 0;
            margin: 0;
        }
        .text-box
        {
            text-transform: uppercase;
        }

        #verificacion{
            background-color: #fdfdfd;
            border-radius: 10%;
            margin-top: 5%;
            width: 50%;
            height: 70%;
            min-width: 300px;
            min-height: 450px;
            margin: 5% auto;
            border: 4px solid ;
            border-color: #AF9898 ;
        }

        #logo{
            text-align: center;
        }

        #codigo{
        text-align: center;
        }

        
    </style>

</head>

<body>


    <div id="correo" style="margin: auto; text-align: center; border: 4px solid; border-color: #AF9898; width: 40%; height: 60%; display: none;">
        <div id="contenido">
            <img src="img\The Whiskers S.png" width="60" height="50" style="margin-top: 5%;">
            <p>Introduce tu dirección de correo electronico y da clic en reenviar</p><br>
            <p><input type="email" placeholder="karen@thewhiskers"></p>
            <button id="reg" style="width: 40%; height: 6vh; background-color: #AF9898; border-color: #AF9898; color: white; min-height: 40px; margin-top: 5%; margin-bottom: 5%;">Registrate</button>
        </div>
    </div>

    <div id="verificacion">
        <div id="logo" style="margin-top: 5%;">
            <img src="img\TheWhiskers L.png" width="240" height="65">
        </div>
        <!-- Verification code -->
        <div id="codigo">
            <p>Ingresa el código que aparece en el correo electronico</p>
            <form id="verification-form" method="POST">
                <label>Confirma que esta dirección de correo electrónico te pertenece</label><br>
                <input type="text" minlength="1" maxlength="1" class="text-box" id="input-box-1" style="width: 10%; text-align: center" placeholder="-">
                <input type="text" minlength="1" maxlength="1" class="text-box" id="input-box-2" style="width: 10%; text-align: center" placeholder="-">
                <input type="text" minlength="1" maxlength="1" class="text-box" id="input-box-3" style="width: 10%; text-align: center" placeholder="-">
                <input type="text" minlength="1" maxlength="1" class="text-box" id="input-box-4" style="width: 10%; text-align: center" placeholder="-">
                <input type="text" minlength="1" maxlength="1" class="text-box" id="input-box-5" style="width: 10%; text-align: center" placeholder="-">
                <input type="text" minlength="1" maxlength="1" class="text-box" id="input-box-6" style="width: 10%; text-align: center" placeholder="-">
                <p><a id="resend-code" href="#">Reenviar código</a></p>
                <div>
                <input type="button" id="verify-button" value="Siguiente" style="width: 40%; height: 6vh; background-color:#AF9898; border-color: #AF9898; color: white; min-height: 40px;">
                </div>
                <!-- <p><a href="">Volver</a></p> -->
            </form>
        </div>
       
    </div>

    <!-- Used to show messages from the server -->
    <div id="script"></div>    
    <!-- Main SCRIPT -->
    <script src="./js/main.js"></script>
</body>

</html>