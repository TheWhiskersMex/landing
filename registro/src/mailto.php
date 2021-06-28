<?php
class MailTo
{
    public function send($codigo, $receiver)
    {
        $from ="elmichi@thewhiskers.club";
        $subject="Verificacion de Cuenta";
        $message = '
        <!doctype html>
        <html>
        <head>
        <title>HTML email</title>
        <style>
        footer
        {
        margin: 0 auto 0 auto;
        text-align: center;
        height: 50px;
        width: 50%;
        background: #b8c6d8;
        font-size: 12px;
        font-family: "Source Sans Pro";
        bottom: 0;
        line-height: 50px;
        }
        </style>
        </head>
        <body>
        <table width="50%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
        <td colspan="2" align="center" valign="top"><img alt="logo" style=" margin-top: 50px; " src="http://www.thewhiskers.club/images/logo-2x.png" ></td>
        </tr>
        <tr>
        <td width="50%" align="right">&nbsp;</td>
        <td align="left">&nbsp;</td>
        </tr>
        <tr>
        <td colspan="2" align="center" valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; padding:7px 5px 7px 0;">
        <h2>
        Confirme su correo electrónico
        </h2>
        <p>
        Acaba de crear una cuenta en <span style="font-weight: bold;"><a href="http://www.thewhiskers.club">The Whiskers</a></span>. Confirme su dirección de correo electrónico para informarnos que usted es el propietario legítimo de esta cuenta.
        </p>
        </td>
        </tr>
        <tr>
        <td colspan="2" align="center" valign="top" style="border-top:1px solid #dfdfdf; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; padding:7px 5px 7px 0;">
        <b style="font-size: 16px;">Codigo</b>
        </td>
        </tr>
        <tr>
        <td colspan="2" align="center" valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; padding:7px 5px 7px 0;">
        <h1>'. $codigo .'</h1>
        </td>
        </tr>
        </table>
        <footer>
        The whiskers México, 2021
        </footer>
        </body>
        </html>
	    ';
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <'.$from.'>' . "\r\n";
        // Send email
        return @mail($receiver,$subject,$message,$headers);
    }
}
?>