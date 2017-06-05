<?php error_reporting(E_ALL);
header("Content-Type: text/html;charset=utf-8");


use Mailgun\Mailgun;

require '../vendor/autoload.php';
$name2 = $_POST['name'];
$email2 = $_POST['email'];
$mensaje = $_POST['msg'];
$phone = $_POST['phone'];
$asunto = 'Un cliente requiere de mayor información: ';

/* Desarrollo */
$api_key = 'key-eb656047b090ea091ef7c5d2fbd83dc5';
$api_domain = 'sandbox3bfa1334fbee4dcca5b08a9b34b46337.mailgun.org';
$send_to = 'hola@blick.mx';


$name = $name2;
$email = $email2;
$content = $mensaje;
$subject = $asunto;
$phoneNumber = $phone;



$messageBody = "De: $name ($email)\n\n $content \n\n Teléfono: $phoneNumber";

$config = array();
$config['api_key'] = $api_key;
$config['api_url'] = 'https://api.mailgun.net/v2/' . $api_domain . '/messages';

$message = array();
$message['from'] = $email;
$message['to'] = $send_to;
$message['h:Reply-To'] = $email;
$message['subject'] = $subject;
$message['text'] = $messageBody;

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, $config['api_url']);
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($curl, CURLOPT_USERPWD, "api:{$config['api_key']}");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $message);

$result = curl_exec($curl);

curl_close($curl);

$message = '<div class="alert alert-success" role="alert">¡Nos podremos en contacto contigo a la brevedad posible!</div>';
 echo $message;
?>