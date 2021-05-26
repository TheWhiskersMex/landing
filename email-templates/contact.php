
<?php 
include_once '../email-templates/subscribe-newsletter.php';
include_once '../db/registry.php';

$emails = new MailTo();
$registry = new Registry();

  if(isset($_POST['email'])){
	  
	$name =$_POST["name"];
	$from =$_POST["email"];
	$michis=$_POST["michis"];
	// $comment=$_POST["comment"];

	$registry->regnewMichi($name, $from, $michis);
	//if (!$reg) return;
	$emails->sendConfMail($from, $name, $michis);
	
	// Email Receiver Address
	//$receiver="isaac@thewhiskers.club";
	$receiver="elmichi@thewhiskers.club";
	$subject="Nuevo suscriptor";

	$message = "
	<html>
	<head>
	<title>HTML email</title>
	</head>
	<body>
	<table width='50%' border='0' align='center' cellpadding='0' cellspacing='0'>
	<tr>
	<td colspan='2' align='center' valign='top'><img style=' margin-top: 50px; ' src='http://www.thewhiskers.club/images/logo-2x.png' ></td>
	</tr>
	<tr>
	<td width='50%' align='right'>&nbsp;</td>
	<td align='left'>&nbsp;</td>
	</tr>
	<tr>
	<td align='right' valign='top' style='border-top:1px solid #dfdfdf; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; padding:7px 5px 7px 0;'>Nombre:</td>
	<td align='left' valign='top' style='border-top:1px solid #dfdfdf; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; padding:7px 0 7px 5px;'>".$name."</td>
	</tr>
	<tr>
	<td align='right' valign='top' style='border-top:1px solid #dfdfdf; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; padding:7px 5px 7px 0;'>Correo:</td>
	<td align='left' valign='top' style='border-top:1px solid #dfdfdf; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; padding:7px 0 7px 5px;'>".$from."</td>
	</tr>
		<tr>
	<td align='right' valign='top' style='border-top:1px solid #dfdfdf; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; padding:7px 5px 7px 0;'>Número de Michis:</td>
	<td align='left' valign='top' style='border-top:1px solid #dfdfdf; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; padding:7px 0 7px 5px;'>".$michis."</td>
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
      echo "Gracias! Hemos guardado tus datos!";
   }
   else
   {	
   	 //Fail Message
      echo "Oh oh! No hemos podido guardar tus datos, por favor intenta de nnuevo.";
   }

}
?>
