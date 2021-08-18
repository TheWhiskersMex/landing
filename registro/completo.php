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
        @media screen and (max-width: 800px)
        {
        #Contenedor
        {
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

        #mensajecorrecto{
            background-color: #fdfdfd;
            margin-top: 5%;
            width: 50%;
            height: 70%;
            min-width: 300px;
            min-height: 400px;
            margin: 5% auto;
            border: 4px solid ;
            border-color: #AF9898 ;
            max-width: 700px;
            max-height: 900px;
        }

        #logo{
            text-align: center;
        }

    </style>
</head>
<body>
<div id="mensajecorrecto">
    <div id="cerrar" style="text-align: end; margin-top: 2%; margin-right: 2%;"> <a href="javascript:cerrar()"><img src="Assets\cancelar.png" width="50vw" height="50vw"></a></div> 
    <div id="logo">
    <img src="img\TheWhiskers L.png" width="240" height="65">
    </div>
    <div id="mensaje" style="text-align: center; margin-top: 5%; margin-bottom: 5%;">
    Su registro se realizo<br> correctamente
    </div>
    <div id="imagen">
    <img src="img\pexels-anna-shvets-3846135.jpg" style="width: 90%; height: 90%; margin-left: 5%; margin-bottom: 5%; ">
    </div>
</div>
</body>
</html>