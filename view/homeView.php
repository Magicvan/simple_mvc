<!DOCTYPE HTML>
<html lang="es">
  <head>
    <meta charset="utf-8"/>
    <meta author="Iv&aacute;n M&eacute;ndez L&oacute;pez"/>
    <meta description="pruebas desarrollador, procesos de selecci&oacute;n yunbit"/>
    <meta keywords="yunbit, pyme, madrid, acceso, prueba, 2016"/>
    <title>Iv&aacute;n ML|Yunbit Prueba</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="view/css/style.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="view/images/favicon.ico" type="image/x-icon">      
  </head>
  <body>
    <header>
      <section id="navigation">
        <div id="undefined-sticky-wrapper" class="sticky-wrapper is-sticky" style="height: 73px;">
          <nav class="navbar navbar-default navbar-static-top " role="navigation">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>
              <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right scrollto">
                  <li class="active"><a href="<?php echo $helper->url("Home","index"); ?>">Home</a></li>              
                  <li><a href="<?php echo $helper->url("Entradas","index"); ?>">Entradas</a></li>
                  <li><a href="<?php echo $helper->url("Tags","index"); ?>">Tags</a></li>
                  <li><a href="<?php echo $helper->url("Home","about"); ?>">Sobre m&iacute;</a></li>
                  <li><a href="<?php echo $helper->url("Home","contact"); ?>">Contacto</a></li>
                </ul>
              </div><!--/.nav-collapse -->
            </div><!--/.container -->
          </nav>
        </div><!--navbar-default-->
      </section>
      <?php if (!empty($video)){ ?>
      <iframe width="100%" height="600px" src="<?php print $video;?>?autoplay=1&loop=1"></iframe>
      <?php
      } ?>
    </header>
    <main role="main">
      <section id="sobre-mi">
        <div class="container">
          <h2>Sobre m&iacute;</h2>
          <div class="col-xs-12 col-sm-6">            
            <p><?php print $info;?></p>
          </div>
          <div class="col-xs-12 col-sm-6">
            <span class="ivan-picture"></span>
          </div>
        </div>
      </section>
      <section id="contacto">
        <div class="container">
          <h2>Contacto</h2>
          <?php if (empty($mensaje)){ ?>
          <p>Puedes usar este formulario para contactar conmigo.</p>
          <p>Si&eacute;ntente libre de escribir lo que desees.</p>
          <form id="contactForm" action="<?php echo $helper->url("Home","contact"); ?>" method="POST">
            <input class="col-xs-12 col-sm-6" type="text" placeholder="Nombre" name="nombre" required/>
            <input class="col-xs-12 col-sm-6" type="text" placeholder="Tel&eacute;fono" name="telefono" required/>
            <input class="col-xs-12 col-sm-6" type="text" placeholder="Email" name="email" required/>
            <textarea class="col-xs-12 col-sm-12" placeholder="Mensaje" name="mensaje" required></textarea>
            <input class="col-xs-12 col-sm-6" type="submit" value="Enviar" /> 
          </form>  
          <?php }else{ ?>
          <div class="alert alert-success">
            <strong><?php print $mensaje;?></strong> 
          </div>
          <?php } ?>         
        </div>
      </section>
    </main>
    <footer role="contentinfo">
      <div class="copyright">
        <p>Iv&aacute;n M&eacute;ndez L&oacute;pez &copy;<?php print date('Y');?> - Prueba Yunbit</p>
    </footer>
    
    <!--Load JS Files-->    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="view/js/custom.js"></script>
  </body>
</html>