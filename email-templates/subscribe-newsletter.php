<?php
class MailTo
{
	public function sendConfMail($email, $name, $michis)
    {
        $from     = "elmichi@thewhiskers.club";
        $subject  = "Gracias!";
        $receiver = $email;
        
        $message = "
        <html>
        <head>
        <title>HTML email</title>
        </head>
        <body>
        <table width='50%' border='0' align='center' cellpadding='0' cellspacing='0'>
        <tr>
        <td colspan='2' align='center' valign='top'><img style=' margin-top: 15px; ' src='https://www.thewhiskers.club/images/logo.png' ></td>
        </tr>
        <tr>
        <td width='50%' align='right'>&nbsp;</td>
        <td align='left'>&nbsp;</td>
        </tr>
        <tr>
        <td align='right' valign='top' style='border-top:1px solid #dfdfdf; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; padding:7px 5px 7px 0;'>Email:</td>
        <td align='left' valign='top' style='border-top:1px solid #dfdfdf; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; padding:7px 0 7px 5px;'>".$from."</td>
        </tr>
        </table>
        </body>
        </html>
        ";
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // More headers
        $headers .= 'From: <'.$from.'>' . "\r\n";
        if(mail($receiver,$subject,$message,$headers))  
        {
            //Success Message
            echo "El correo ha sido guardado!";
        }
        else
        {	
            //Fail Message
            echo "El mensaje no ha sido guardado";
        }
   }
}

?>
