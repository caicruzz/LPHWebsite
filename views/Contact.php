<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
       $nameErr = $emailErr = $messageErr = "";
       $name = $email = $message= "";
       if($_SERVER["REQUEST_METHOD"] == "POST"){
         if (empty($_POST["name"])) {
           $nameErr = "*Nombre requerido";
         } else {
           $name = $_POST["name"];
           if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
               $nameErr = "*Solo letras y espacios permitidos";
          }
         }
       if (empty($_POST["email"])) {
           $emailErr = "*Email requerido";
         } else {
           $email= $_POST["email"];
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
               $emailErr = "*Formato invalido";
            }
         }
        if (empty($_POST["message"])) {
           $messageErr = "*Mensaje requerido";
         } else {
           $message= $_POST["message"];
         }

         if($nameErr == '' and $emailErr == '' and $messageErr == '') {
             $messageBody = '';
             unset($_POST['submit']);
             foreach($_POST as $key => $value) {
               $messageBody .= "$key: $value\n";
           }

              $to = "cai.nfcc@gmail.com";
              $subject = "Email enviado desde iglesialph.com";
              if(mail($to, $subject, $messageBody)) {
                  $success = "Gracias por contactarnos! Te responderemos muy pronto. Dios bendiga tu paciencia :)";
                  $name = $email = $message = '';
              }
         }
} ?>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/contactStyle.css">
    <title></title>
  </head>
  <body>

    <nav class="nav navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-nav-demo" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="index.html" class="navbar-brand"><i class="fa fa-home" aria-hidden="true"></i>LPH</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-nav-demo">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Discipulado <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="underConstruction.html">Discipulado Varones</a></li>
                <li><a href="underConstruction.html">Discipulado Mujeres</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Recursos Educativos <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="underConstruction.html">Estudio Biblico Niños</a></li>
                <li><a href="underConstruction.html">Devocionales</a></li>
              </ul>
            </li>

            <!-- <li><a href="underConstruction.html">Matrimonios</a></li> -->
            <li><a href="predicas.html">Predicas</a></li>
            <li><a href="Contact.php" class="active">Contáctanos</a></li>
            <li><a href="underConstruction.html">Admon</a></li>
          </ul>
        </div>
      </div>
    </nav> <!--end of navbar -->

    <div class="container" id="mainContainer">
      <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <h2>Contáctanos</h2>
          </div>
      </div>
      <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xs-offset-3">
              <form id="contact-form" class="form"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                  <div class="form-group">
                      <label class="form-label" for="name">Nombre completo</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" tabindex="1" value="<?php echo $name;?>">
                      <span class="error"><?php echo $nameErr;?></span>
                  </div>
                  <div class="form-group">
                      <label class="form-label" for="email">Email</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email" tabindex="2" value="<?php echo $email;?>">
                      <span class="error"><?php echo $emailErr;?></span>
                  </div>
                  <div class="form-group">
                      <label class="form-label" for="message">Mensaje</label>
                      <textarea rows="5" cols="50" name="message" class="form-control" id="message" placeholder="Mensaje..." tabindex="4"><?php echo $message;?></textarea>
                      <span class="error"><?php echo $messageErr;?></span>
                  </div>
                  <div class="text-center">
                      <button type="submit" class="btn btn-start-order">Enviar Mensaje</button>
                  </div>
                  <div class="success"><?php echo $success; ?></div>
              </form>
          </div>
      </div>
    </div>
  </body>
  <script
  src="https://code.jquery.com/jquery-3.1.1.js"
  integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
  crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>
