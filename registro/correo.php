<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro the whiskers</title>
    <?php
    session_start();
    //include_once('./src/router.php');
    ?>
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

        #correo{
            background-color: #fdfdfd;
            border-radius: 10%;
            width: 50%;
            height: 70%;
            min-width: 300px;
            min-height: 450px;
            margin: 5% auto;
            border: 4px solid ;
            border-color: #AF9898 ;
            max-height: 900px;
            max-width: 550px;
        }

        #logo{
            text-align: center;
            margin-top: 2.5%;
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
    <div id="correo">
        <div id="logo">
            <img src="img\TheWhiskers L.png" width="240" height="65">
        </div>
        <div id="datos">
           <form method="POST" id="form-2" class="needs-validation" novalidate>
                <div class="has-validation" >
                <label class="form-label"><b>Contraseña</b></label>
                <input required type="password" id="password" name="password" style="width: 90%;" class="form-control"/>
                <div class="invalid-feedback">
                Ingresa una combinación de al menos seis números, letras y signos de puntuación (como "!" y "&").
                </div>
                </div>
                
                <div class="has-validation" >
                <label class="form-label"><b>Fecha de nacimiento</b></label><br>
                <input required type="date" id="birthdate" name="birthdate" min="1980-01-01" max="2010-12-31" value="2010-12-31" style="width: 90%;" class="form-control" />
                <div class="invalid-feedback">
                Elige tu fecha de nacimiento.
                </div>
                </div>
                
                <div class="form-group">
                <div>
                <label class="form-label"><b>Sexo</b></label>
                </div>
                <input checked type="radio" id="gender-female" name="mh" class="form-check-input">
                <label class="form-check-label">Mujer</label>
                <span style="margin-left: 40px;">
                <input type="radio" id="gender-male" name="mh" class="form-check-input">
                <label class="form-check-label">Hombre</label>
                </span>
                </div>
                <p>
                <input required type="checkbox" id="privacy-policy" name="privacy-policy" class="form-check-input"><a href="#">Aviso de privacidad</a>
                </p>
                <p style="margin-right: 10%; text-align: right;">
                <input type="button" value="Siguiente" id="next-button" style="width: 35%; height: 6vh; background-color:#AF9898; border-color:#AF9898 ; color: white; min-height: 40px;"/>
                </p>
                <p style="text-align: end; margin-right: 20%;"><a href="./">Volver</a></p>
            </form>
        </div>
    </div>
    


<div id="script" style="display: none;"></div>
<script src="./js/main.js"></script>
</body>

</html>