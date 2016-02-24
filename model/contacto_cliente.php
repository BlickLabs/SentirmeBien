<?php error_reporting(E_ALL);
include("../model/conexion.php");
use Mailgun\Mailgun;

require '../vendor/autoload.php';
$name = $name2;
$email = $email2;


/*JDB */
$api_key = 'key-eb656047b090ea091ef7c5d2fbd83dc5';
$api_domain = 'sandbox3bfa1334fbee4dcca5b08a9b34b46337.mailgun.org';
$send_to = $email;

////# Include the Autoloader (see "Libraries" for install instructions)
//    require '../vendor/autoload.php';
//    use Mailgun\Mailgun;

//# Instantiate the client.
    $mgClient = new Mailgun('key-eb656047b090ea091ef7c5d2fbd83dc5');
    $domain = "sandbox3bfa1334fbee4dcca5b08a9b34b46337.mailgun.org";

//
//# Make the call to the client.
    $result = $mgClient->sendMessage($domain, array(
        'from' => 'Blick <postmaster@sandbox3bfa1334fbee4dcca5b08a9b34b46337.mailgun.org>',
        'to' => $send_to,
        'subject' => 'Gracias por ponerte en contacto con nosotros',
        'text' => 
        
        'Hola ' . $name . '
            
            
        Gracias por Confiar en nosotros
        
        pronto un representante de nuestro equipo se pondra en contacto contigo'
    ));
    
    
    

?>