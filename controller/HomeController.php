<?php
class HomeController extends BaseController{    
  public function __construct() {
  }    
  public function index(){   
    $video = '';
    $info = 'Analista PHP de profesi&oacute;n, cuerpo a la moda -Fosfiano-, con alma de corredor.';
    $email = 'iml385@gmail.com';
    //Cargamos la vista index y le pasamos valores
    $this->view("home", array(
      "video" => $video,
      "info" => $info,
      "email" => $email,
      "yunbit" => "Prueba de Iván Méndez López"
    ));
  }
  public function contact(){    
    if ($_POST['email'] && $_POST['mensaje']){
      $to = 'iml385@gmail.com';
      $subject = "Contacto Yunbit - Prueba Desarrollador";
      $msg = "<html>
        <head>
          <title>Email|Prueba Desarrollador</title>
        </head>
        <body>
          <p>Nombre:".$_POST['nombre']."</p>
          <p>Tel&eacute;fono:".$_POST['telefono']."</p>
          <p>Email:".$_POST['email']."</p>
          <p>Mensaje:".$_POST['mensaje']."</p>
          <p><a href='#pruebaivanmende'>Prueba Candidato IML</a></p>
        </body>
      </html>";
      // send email
      mail($to, $subject, $msg);
      $mensaje = "Gracias por contactar conmigo. Si es urgente +34 600 042 443 =)";
    } else {
      $mensaje = '';
    }
    //Email
    $email = 'iml385@gmail.com';
    $video = '';
    $info = 'Analista PHP de profesi&oacute;n, cuerpo a la moda -Fosfiano-, con alma de corredor.';
    //Cargamos la vista index y le pasamos valores
    $this->view("home", array(
      "video" => $video,
      "info" => $info,
      "email" => $email,
      "mensaje" => $mensaje,
      "yunbit" => "Prueba de Iván Méndez López"
    ));
  }
  public function about(){        
    //Info
    $info = 'Analista PHP de profesi&oacute;n, cuerpo a la moda -Fosfiano-, con alma de corredor. Padre de un peque de 2 a&ntilde;os que es un pedazo de artista de la cabeza a los pies, esposo de una mujer maravillosa, que tiene los ojos m&aacute;s lindos que haya visto. En resumen una persona feliz de vivir en mi vida.';
    $video = '';
    $email = 'iml385@gmail.com';
    //Cargamos la vista index y le pasamos valores
    $this->view("home", array(
      "video" => $video,
      "info" => $info,
      "email" => $email,
      "yunbit" => "Prueba de Iván Méndez López"
    ));
  }
}
?>