<?php
class MailTo
{
	public function sendConfMail($email, $name, $michis)
    {
        $from     = "elmichi@thewhiskers.club";
        $subject  = "Gracias!";
        $receiver = $email;
        $date = date('Y-m-d');
        
        $message = '
        <html>
        <head>
        <style>
        
        body
        {
            padding: 0;
            margin: 0;
            width: 100%;
            height: auto;
            font-size: 12px;
        }
        
        #Contenedor
        {
            background: #f4f4f4;
            overflow: hidden;
            width: 100%;
            max-width: 480px;
            margin: 0 auto 0 auto;
        }
        
        #Header
        {
        font-size: 18px;
        text-align: center;
        height: 310px;
        background: #d8d8d8;
        }
        
        #Contenido
        {
        position: relative;
        background: #ffffff;
        font-size: 14px;
        padding: 5px;
        height: 330px;
        margin-left: 25px;
        margin-right: 25px;
        margin-top: 10px;
        -webkit-box-shadow: 0px 6px 15px 2px rgba(0, 0, 0,0.25), inset 0px 0px 1px 1px rgba(0, 0, 0, 0.0);
        -moz-box-shadow: 0px 6px 15px 2px rgba(0, 0, 0,0.25), inset 0px 0px 1px 1px rgba(0, 0, 0, 0.0);
        box-shadow: 0px 6px 15px 2px rgba(0,0,0,0.25), inset 0px 0px 1px 1px rgba(0, 0, 0, 0.0);
        }
        
        #Preguntas{
        height: 180px;
        position: relative;
        text-align:center;
        background: #ffffff;
        border-radius: 5px;
        padding: 10px;
        font-size: 10px;
        margin-left: 50px;
        margin-right: 50px;
        margin-top: 200px;
        -webkit-box-shadow: 0px 6px 15px 2px rgba(0, 0, 0,0.25), inset 0px 0px 1px 1px rgba(0, 0, 0, 0.0);
        -moz-box-shadow: 0px 6px 15px 2px rgba(0, 0, 0,0.25), inset 0px 0px 1px 1px rgba(0, 0, 0, 0.0);
        box-shadow: 0px 6px 15px 2px rgba(0,0,0,0.25), inset 0px 0px 1px 1px rgba(0, 0, 0, 0.0);
        
        }
        
        #Slogan{
        margin-top: 20px;
        font-size: 18px;
        text-align: center;
        margin-left: 25px;
        margin-right: 25px;
        }
        
        #Equipo{
        margin-top: 5px;
        text-align: center;
        margin-left: 25px;
        margin-right: 25px;
        }
        
        footer{
        text-align: center;
        height: 50px;
        background: #b8c6d8;
        font-size: 10px;
        font-family: Source Sans Pro-Light 300/Semi-bold 600;
        left: 0;
        bottom: 0;
        line-height: 50px;
        }
        
        #Fecha
        {
        margin-top: 0px;
        text-align: right;
        }
        
        #Contenido1{
        margin-top: 0px;
        text-align: center;
        font-size: 18px;
        box-sizing: border-box;
        font-family: LibelSuit-Regular;
        }
        
        #Contenido2{
        margin-top: 0px;
        text-align: left;
        font-size: 10px;
        box-sizing: border-box;
        font-family: Source Pro-Light 300/Semi-bold 600;
        margin-left: 10px;
        }
        
        #Contenido3{
        margin-top: 0px;
        }
        #tex-info
        {
        font-family: Source Sans Pro-Light 300/Semi-bold 600;
        text-align: justify;
        text-justify: inter-word;
        font-size: 10px;
        box-sizing: border-box;
        }
        
        #Frase{
        text-align: center;
        border-bottom: 1px solid #000000 ;
        line-height: 50px;
        box-sizing: border-box;
        }
        
        #EqTrabajo{
        margin-top: 0px;
        font-size: 12px;
        
        }
        
        #RedSocial{
        margin-top: 15px;
        margin-bottom: 10px;
        justify-content: center;
        align-content: center;
        font-size: 16px;
        }
        </style>
        </head>
        <body>
        <div id="Contenedor">
        <div id="Header">
        <br>
        <img src="https://www.thewhiskers.club/Assets/Mailing/bienvenida/Logo_Mailing.png">
        <br><br>
        <b style="font-size: 24px;">'.$name.'</b>
        <div id="Contenido">
        
            <div id="Fecha">
            <b style="font-size: 12px;">'.$date.'</b>
            </div>
            <div id="Contenido1">
            <a>
            <b>¡Te damos la bienvenida!</b>
            </a>
            </div>
            <div id="Contenido2">
            <p>
            Ya eres un esclavo más... perdón un humano más que se registra en nuestro <b>Club Social para amantes de
            nosotros los gatos.</b>
            </p>
            </div>
            <!-- <Contenido3> -->
            <div id="Contenido3">
            <table>
            <tbody>
            <tr>
            <td>
            <img alt="Jefe Michi" src="https://www.thewhiskers.club/Assets/Mailing/bienvenida/Imagen_Gato.png" width="128px" height="128px">
            </td>
            <td>
            <div id="tex-info">
            <p><b>The whiskers</b> será la primera Red Social para nosotros los michis en toda Latinoamérica, Meow.</p>
            <p>Podrás subir fotos y contenido desde tu perfil, seguir a otros gatos y mucho más. ¡Yo había ponido mi posteo aquí, y ahora no ta!</p>
            <p>Espera próximamente más noticias, ya reservamos un lugar para esa reina o rey de tu casa.</p>
            </div>
            </td>
            </tr>
            </tbody>
            </table>
            </div>
            <!-- </Contenido3> -->
            </div>
            
        
        </div>
        
        
        
        <div id="Preguntas">
        <p>¿Te divierte llenar de <b>pelitos la ropa obscura de tu dueño?</b>
        <p>¿Cuándo te habla tu esclavo, ¿le maullas para quedar bien con el?</p>
        <p>¿<b>Te acarician sin que lo pidas</b> arruinando tu baño de sol?</p>
        <p>¿Te <b>inventan voces</b> y tu ni hablas así?</p>
        </div>
    
        <div id="Slogan">
        <i>"Ser La Karen no es fácil, involucra más tiempo que el que tu dedicas a lamerte todo el día, además de amor y mucha paciencia :D".</i>
        </div>
    
        <div id="Equipo">
            <div id="Frase">
            <a style="font-family: LibelSuit-Regular; font-size: 14px; color: #232323;">
            ¡Ya llegaste al lugar correcto!
            </a>
            </div>
            <div id="EqTrabajo">
            <a style="font-family: LibelSuit-Regular; font-size: 14px; color: #444038;">
            <b>El equipo esclavo de The whiskers®. </b>
            </a>
            </div>
            <div id="RedSocial">
            <a style="font-family: LibelSuit-Regular; color: #444038;">
            Síguenos por <a href="https://www.thewhiskers.club"><img src="https://www.thewhiskers.club/Assets/Mailing/bienvenida/Icono_Facebook.png"/></a>
            </a>
            </div>
            </div>
    
        
    
        <footer style="text-align: center; height: 50px; background: #b8c6d8; font-size: 10px; font-family: Source Sans Pro-Light 300/Semi-bold 600; left: 0; bottom: 0; line-height: 50px;">
        The whiskers México, 2021
        </footer>
        </div>
        
        </body>
        </html>
        ';
         //Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // More headers
        $headers .= 'From: <'.$from.'>' . "\r\n";
        if(mail($receiver,$subject,$message,$headers))  
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
