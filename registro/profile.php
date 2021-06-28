<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Registro the whiskers</title>            
    <?php
    include_once('./src/router.php');
    ?>
    <script src="./js/hello.all.js"></script>
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
            background-color: #000;
            padding: 0;
            margin: 0;
        }

        #completo{
            background-color: #fdfdfd;

            margin-top: 5%;
            width: 50%;
            height: 70%;
            min-width: 300px;
            min-height: 450px;
        }

        #logo{
            text-align: center;
        }

    </style>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <div id="mensaje correcto" style="margin-top: 10%; background: #fff; width: 60%; max-width: 300px; margin: 0%; color: #000; font-family: Source Sans Pro-Light 300/Semi-bold600 ; ;
        text-align: center; vertical-align: center; min-width: 250px; min-height: 460px; border-radius: 5%; position: absolute; -webkit-box-shadow: -6px 6px 15px 2px rgba(0, 0, 0,0.25), inset 0px 0px 1px 1px rgba(0, 0, 0, 0.0);
            -moz-box-shadow: -6px 6px 15px 2px rgba(0, 0, 0,0.25), inset 0px 0px 1px 1px rgba(0, 0, 0, 0.0); box-shadow: -6px 6px 15px 2px rgba(0,0,0,0.25), inset 0px 0px 1px 1px rgba(0, 0, 0, 0.0);
            display:  ; font-size: 20px; ">
            <div id="cerrar" style="text-align: end;"> <a href="javascript:cerrar()"><img src="Assets\cancelar.png" width="50vw" height="50vw"></a></div> 
             <div id="logo">
            <img src="img\Logo_Mailing.png" width="180vh" height="50vh">
            </div>
            <div id="mensaje" style="text-align: center;">
                Su registro se realizo<br> correctamente
            </div>
            <p>Hola <?php echo $_SESSION['nombre'];?></p>
            <p>Email <?php echo $_SESSION['correo'];?></p>
            <div id="imagen">
                <img src="<?php echo $_SESSION['thumbnail'];?>" style="width: 100px; height: 100px;">
            </div>

            <button id="logout">logout</button>
        </div>

        <script src="../js/jquery.js"></script>
        <script src="./js/main.js"></script>
</body>

</html>