
<?php 
include_once '../email-templates/subscribe-newsletter.php';
include_once '../db/registro.php';
include_once '../slack/slack.php';

$emails = new MailTo();
$registry = new Registry();

  if (isset($_POST['email']) && isset($_POST['name']) && isset($_POST['michis']))
  {
    $name   = $_POST["name"];
    $from   = $_POST["email"];
    $michis = $_POST["michis"];
	// $comment=$_POST["comment"];
  
	$reg = $registry->regnewMichi($name, $from, $michis);
    if ($reg == 2)
    {
      echo '
      <script type="text/JavaScript">
      document.getElementById("correo-duplicado").style.display="block";
      const element = document.querySelector("#popup-duplicated");
      element.classList.add("animate__animated", "animate__rollIn");
      </script>'; // Shows the duplicated user Popup
    return;
    }
    else if ($reg == 1)
    {
      echo '
      <script type="text/JavaScript">
      document.getElementById("mensaje-incorrecto").style.display="block";
      const element = document.querySelector("#popup-fail");
      element.classList.add("animate__animated", "animate__rollIn");
      </script>'; // Shows the unsuccessfull message Popup
      return;
    }
    else
    {
      echo '
      <script type="text/JavaScript">
      document.getElementById("mensaje-correcto").style.display="block";
      const element = document.querySelector("#popup-success");
      element.classList.add("animate__animated", "animate__rollIn");
      </script>'; // Shows the successfull message Popup
      
      $emails->sendConfMail($from, $name, $michis); // Sends confirmation email
  
	// Email Receiver Address
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
   if (mail($receiver,$subject,$message,$headers))  
   {
	   //Success Message
      //echo "Gracias! hemos guardado tus datos!";
     
   }
   else
   {	
   	 //Fail Message
      //echo "Oh oh! No hemos podido guardar tus datos, por favor intenta de nuevo.";
      
   }
   
   // Post to webhook stored in access object
   $hook = 'https://hooks.slack.com/services/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';
   $slack = new Slack($hook);
   $slack->setDefaultUsername("SlackBot");
   $slack->setDefaultChannel("#nuevos-registros");
   
   // Creates a new instance of message object
   $message = new SlackMessage($slack);
   $message->setChannel("#nuevos-registros");
   $message->setUsername("El Jefe Michi");
   $message->setText(":smirk_cat: ¡Tenemos un nuevo esclavo! :smirk_cat:\n\nSu nombre es: $name,\nsu correo: $from y \nobedece a: $michis Michis!");
   $slack->send($message); // sends the message to slack channel
    }
}
?>
