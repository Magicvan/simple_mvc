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
                  <li><a href="<?php echo $helper->url("Home", "index"); ?>">Home</a></li>              
                  <li class="active"><a href="<?php echo $helper->url("Entradas", "index"); ?>">Entradas</a></li>
                  <li><a href="<?php echo $helper->url("Tags", "index"); ?>">Tags</a></li>
                  <li><a href="<?php echo $helper->url("Home", "about"); ?>">Sobre m&iacute;</a></li>
                  <li><a href="<?php echo $helper->url("Home", "contact"); ?>">Contacto</a></li>
                </ul>
              </div><!--/.nav-collapse -->
            </div><!--/.container -->
          </nav>
        </div><!--navbar-default-->
      </section>
    </header>
    <main role="main">
      <section id="entradas">
        <div class="container">
          <h2>Entradas</h2>
          <?php
          if (!empty($entradas)){ ?>
          <ul class="listado-entradas"> 
            <li class="row first"><div class="col-xs-12 col-sm-3">NAME</div><div class="col-xs-12 col-sm-3">DESCRIPTION</div><div class="col-xs-12 col-sm-3">UPDATE</div><div class="col-xs-12 col-sm-3">DELETE</div></li>         
            <?php foreach ($entradas as $key => $value){ ?>
            <li class="row">
              <div class="col-xs-12 col-sm-3"><?php print $value->NAME;?></div>
              <div class="col-xs-12 col-sm-3"><?php print $value->DESCRIPTION;?></div>
              <div class="col-xs-12 col-sm-3"><a href="<?php echo $helper->url("Entradas", "edit"); ?>&id=<?php print $value->ID;?>">Edit</a></div>
              <div class="col-xs-12 col-sm-3"><a href="<?php echo $helper->url("Entradas", "delete");?>&id=<?php print $value->ID;?>">Delete</a></div>
            </li>
            <?php } ?>
          </ul>
          <?php 
          }else{ ?>
            <p>No hay entradas creadas.</p>            
          <?php 
          }?>
          <div class="btn-group btn-group-lg">
            <span class="btn new-entry">Crear nueva entrada</span>
          </div>
          <div id="newEntry" class="hidden">
            <form action="<?php echo $helper->url("Entradas", "create"); ?>" method="post">
              <input class="col-xs-12 col-sm-5" type="text" placeholder="Name" name="name"/>
              <input class="col-xs-12 col-sm-5" type="text" placeholder="Description" name="description" />
              <input class="col-xs-12 col-sm-5 btn" type="submit" value="Crear" />
            </form>
          </div>
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