<?php
class MailTo
{
	public function sendConfMail($email, $name, $michis)
    {
        $from     = "elmichi@thewhiskers.club";
        $subject  = "😸 Bienvenido a The Whiskers.";
        $receiver = $email;
        $date = date('Y-m-d');
        
        /**
         * Email Template to be send to the user
         */
        $message = '
        <html>
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Template</title>
            <link rel="stylesheet" href="https://thewhiskers.club/css/bootstrap.min.css">
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
                @media screen and (min-device-width : 768px) and (max-device-width : 1024px) and (orientation : landscape)
                {
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
                #contenedor{
                    background: #fff;
                    max-width: 550px;
                    width: 100%;
                    margin: 0 auto;
                    overflow: hidden;
                    height: 100%;
                }
                #contenido{
                    margin-left: 1%;
                    margin-right: 1%;
                    font-size: 1.3em;
                }
                #bienvenida{
                    text-align: center;
                    align-items: center;
                }
                #footer{
                    background-image: url("https://thewhiskers.club/assets/mailing/bienvenida/v2/Footer.png");
                    font-size: 1.1em;
                    min-height: 275px;
                }
                #footer-c{
                    margin-left: 1%;
                    margin-right: 1%;
                }
                #texto
                {
                    font-family: "Source Serif Pro", serif;
                    font-size: 1.1em;
                    text-align: center;
                }
                @import url("https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap");
                /*font-family: Dosis, sans-serif;*/
                @import url("https://fonts.googleapis.com/css2?family=Dosis:wght@200&family=Source+Serif+Pro:wght@600&display=swap");
                /* font-family: "Source Serif Pro", serif;*/
                
            </style>
        <body>
            <div id="contenedor">
                <div id="header">
                    <img src="https://thewhiskers.club/assets/mailing/bienvenida/v2/Header.png" width="100%">
                </div>
                <div id="contenido">
                    <div id="fecha">
                        <p style="font-size:0.5em; font-family: Dosis, sans-serif;">
                            '.$date.'
                        </p>
                    </div>
                    <div id="bienvenida" style="text-align: center; align-items: center;">
                        <p style=" font-size: 1.2em; font-family: Dosis, sans-serif;">Hola <b>'.$name.'</b>,<br>
                        ¡Te damos la bienvenida!</p>
                        <p id="texto">Ya eres un esclavo más... perdón, 
                            un humano más que se registra en nuestro <b>Club social para 
                            amantes de nosotros los gatos.</b></p>
                    </div>
                    <div id="datos">
                        <img src="https://thewhiskers.club/assets/mailing/bienvenida/v2/Quots.png" width="100%" height="10%">
                    </div>
                </div>
                <div id="footer">
                    <div id="footer-c">
                        <div id="frase" style="text-align: center; align-items: center;">
                            <p style="font-family: Dosis, sans-serif; font-size: 1em;">"Entendemos que ser <b>La Karen no es fácil,</b> involucra
                            mucho más tiempo del que yo dedico a lamerme todo
                            el día, además de mucho amor y paciencia".</p>
                        </div>
                        <p style="text-align: center; font-family: Dosis, sans-serif; font-size: 1.1em;"><b><i>El Jefe Michi.</i></b></p>
                        <p style="text-align: center;"><img src="https://thewhiskers.club/assets/mailing/bienvenida/v2/The_Whiskers_S.png" height="60vw"></p>
                        <p style="font-size: 0.8em; font-family: Dosis, sans-serif;">
                        <b>The whiskers México 2021.</b>
                        <a href="https://web.facebook.com/thewhiskersclub"><img src="https://thewhiskers.club/assets/mailing/bienvenida/v2/Fb_icon.png" width="30%"  align="right"></a>
                        <br>
                        </p>
                    </div>
                </div>
            </div> 
        </body>
        </html>
        ';
         //Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // More headers
        $headers .= 'From: <'.$from.'>' . "\r\n";
        if(mail($receiver, $subject, $message, $headers))  
        {
            //Success Message
            // echo "El correo ha sido guardado!";
        }
        else
        {	
            //Fail Message
            // echo "El mensaje no ha sido guardado";
        }
   }
}

?>
