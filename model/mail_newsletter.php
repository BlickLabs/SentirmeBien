<?php
//PROCESS NEWSLETTER FORM HERE


if(!isset($_POST) || !isset($_POST['email']))
{ 
    $msg = 'No data has been received.';
    echo '<div class="alert alert-danger"><p><i class="fa fa-exclamation-triangle"></i> '.$msg.'</p></div>';
    return false;
}

if($_POST['email'] == '')
{
    //ERROR: FIELD "email" EMPTY
    $msg = 'Por favor,ingresa un correo valido.';
    echo '<div class="alert alert-danger"><p><i class="fa fa-exclamation-triangle"></i> '.$msg.'</p></div>';
    return false;
}

 $email = $_POST['email'];
//# Include the Autoloader (see "Libraries" for install instructions)
    require '../vendor/autoload.php';
    use Mailgun\Mailgun;

//# Instantiate the client.
    $mgClient = new Mailgun('key-eb656047b090ea091ef7c5d2fbd83dc5');
    $domain = "sandbox3bfa1334fbee4dcca5b08a9b34b46337.mailgun.org";
  
//
//# Make the call to the client.
    $result = $mgClient->sendMessage($domain, array(
        'from' => 'Blick <postmaster@sandbox3bfa1334fbee4dcca5b08a9b34b46337.mailgun.org>',
        'to' => $email,
        'subject' => 'Gracias por registrate.',
        'text' => 'Hola.

        ¡Gracias por registrarte con nosotros!

        a través del correo electrónico te enviaremos nuestro newsletter para 
        mantenerte informado sobre nuestras promociones y eventos'
    ));
    
   

 
//$pertence= 'newsletter';
////Change database 
//mysqli_select_db($con, "$dbname");
//
//$query = mysqli_query($con, "INSERT INTO Usuarios (email,pertenece_a) VALUES ('$email','$pertence')");
//mysqli_close($con);  


//And send success message:
$msg = '¡Gracias por Registrarte,estaremos en contacto contigo!';
echo '<div class="alert alert-success"><p><i class="fa fa-check"></i> '.$msg.'</p></div>';
return true;


?>
