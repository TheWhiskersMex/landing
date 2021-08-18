<?php
session_start();
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
    <!-- 
    Hello JavaScript SDK for authenticating with OAuth2 (and OAuth1 with a oauth proxy)
     -->
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
                text-align: center;
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

        #registro{
            background-color: #fdfdfd;
            border-radius: 10%;
            width: 60%;
            height: 70%;
            min-width: 340px;
            min-height: 550px;
            max-width: 1000px;
            margin: 5% auto;
            border: 4px solid ;
            border-color: #AF9898 ;
        }

        #logo{
            text-align: center;
        }

        #datos{
        margin-left: 10%;
        }

        #botones{
            margin-left: 10%;
        }
    </style>
</head>

<body>
    <div id="registro">
        <div id="logo">
            <img src="img\TheWhiskers L.png" width="240" height="65" style="margin-top: 5%;">
        </div>
        <div id="datos">
            <form id="registry-form">
                <p><label><b>Nombre</b></label><br>
                <input required type="text" id="firstname" name="firstname" style="width:80%" class="form-control" placeholder="Karen"></p>
                <p><label><b>Apellido</b></label><br>
                <input required type="text" id="lastname" name="lastname" style="width: 80%;" class="form-control" placeholder="Perez"></p>
                <div class="has-validation">
                <p>
                <label id="email-label"><b>Correo</b></label>
                <label hidden id="phone-label"><b>Teléfono</b></label>
                </p>
                <input required type="email" id="email" name="email" style="width: 80%" class="form-control" placeholder="karen@thewhiskers">
                <input required hidden type="tel" id="phone" name="phone"  pattern="[0-9]{10}" style="width: 80%;" class="form-control" placeholder="0123456789">
                <div id="email-in-use" style="color: red; display: none; font-size:small;">
                </div>
                </div>
                <p>
                <a id="use-phone" class="phone" href="#">Usar teléfono</a>
                <a hidden id="use-email" href="#">Usar correo</a>
                </p>
                <p style="text-align: end; margin-right: 20%;">
                <input disabled type="button" id="registry-button" value="Registrate" style="width: 40%; height: 6vh; background-color: #AF9898; border-color: #AF9898; color: white; min-height: 40px;"/>
                </p>
            </form>
        </div>
        <!-- 
            Sign in using oauth authentication
         -->
        <div id="redes">
            <p style="text-align: center;">o Inicia sesion con</p>
            <div id="botones" style="margin-bottom: 5%;">
                <button id="facebook" style="width:35%; height: 6vh; margin-right: 5%; background-color: #3B5998; color: white; border-color: #3B5998; min-height: 40px">Facebook</button>
                <button id="google" style="width:35%; height: 6vh; margin-left: 5%; background-color: #DB4A39; color: white; border-color: #DB4A39 ; min-height: 40px;">Google</button>
            </div>
        </div>
    </div>

<script src="./js/main.js"></script>
</body>
</html>