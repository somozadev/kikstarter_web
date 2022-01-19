<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="./js/funcionalidad.js"></script>

<br><br><br>
<hr>

<footer class="bg-white">
  <div class="container py-5">
    <div class="row py-4">
      <div class="col-lg-4 col-md-6 mb-4 mb-lg-0"><img src="img/logo.png" alt="" width="180" class="mb-3">
        <p class="font-italic text-muted">El pasado no puede ser cambiado. El futuro está aún en tu poder.</p>
        <style>
          @import url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css);

          .social-icons li {
            vertical-align: top;
            display: inline;
            font-size: 1.2em;
            padding: 0.5em;
          }
        </style>
        <ul class="social-icons">
          <li><a href="https://es-es.facebook.com/" class="social-icon"> <i class="fa fa-facebook"></i></a></li>
          <li><a href="https://twitter.com/i/flow/login" class="social-icon"> <i class="fa fa-twitter"></i></a></li>
          <li><a href="https://www.instagram.com/" class="social-icon"> <i class="fa fa-instagram"></i></a></li>
          <!-- <li><a href="" class="social-icon"> <i class="fa fa-youtube"></i></a></li>
          <li><a href="" class="social-icon"> <i class="fa fa-google-plus"></i></a></li> -->
        </ul>

      </div>
      <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
        <h6 class="text-uppercase font-weight-bold mb-4">Sobre nosotros</h6>
        <ul class="list-unstyled mb-0">
          <li class="mb-2"><a href="#" class="text-muted" style="text-decoration:none;">Apostamos por el futuro</a></li>
          <li class="mb-2"><a href="#" class="text-muted" style="text-decoration:none;">Evolución del transporte</a></li>
          <li class="mb-2"><a href="#" class="text-muted" style="text-decoration:none;">Próxima generación de vehículos</a></li>
          <li class="mb-2"><a href="#" class="text-muted" style="text-decoration:none;">Futuro cada vez más cerca</a></li>
        </ul>
      </div>
      <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
        <h6 class="text-uppercase font-weight-bold mb-4">Somcas Crowdfunding</h6>
        <ul class="list-unstyled mb-0">
          <li class="mb-2"><a href="login.php" class="text-muted">Login</a></li>
          <li class="mb-2"><a href="register.php" class="text-muted">Register</a></li>
        </ul>
      </div>
      <div class="col-lg-4 col-md-6 mb-lg-0">
        <h6 class="text-uppercase font-weight-bold mb-4">Newsletter</h6>
        <p class="text-muted mb-4">Si desea estar informado con las últimas noticias, proyectos y prototipos, suscríbase <b>gratuitamente</b> a nuestra Newsletter:</p>
        <div class="p-1 rounded border">
          <div class="input-group" style="align-items: center; display: flex; flex-direction: row; justify-content: space-around; ">
            <?php

            if (array_key_exists('mail_button', $_POST)) {
              require 'PHPMailer.php';
              require 'SMTP.php';
              $mail = new PHPMailer(true);
              try {
              $mail_to = $_POST["mail_to"];
              $mail->CharSet = 'UTF-8';
              $body = 'Al suscribirte gratuitamente a nuestra newsletter tendrás acceso a toda la información de última hora sobre los proyectos que vayamos incorporando.';
              $mail->IsSMTP();
              $mail->Host       = 'smtp.gmail.com';
              $mail->SMTPSecure = 'tls';
              $mail->Port       = 587;
              $mail->SMTPDebug  = 0;
              $mail->SMTPAuth   = true;
              $mail->Username   = 'somcas99@gmail.com';
              $mail->Password   = 'uem12345';
              $mail->SetFrom('somcas99@gmail.com', "Somcas");
              $mail->AddReplyTo('no-reply@mycomp.com', 'no-reply');
              $mail->Subject    = 'Confirmación de suscripción a nuestra newsletter!!';
              $mail->MsgHTML($body);
              $mail->AddAddress($mail_to, 'Zark');
              $mail->send();
            }catch (Exception $e) {
          }
          }

            ?>
            <form method="POST" style="align-items: center;display: flex;flex-direction: row;justify-content: center; ">
              <input type="email" name='mail_to' placeholder="Enter your email address" aria-describedby="button-addon1" id='mail' class="form-control border-0 shadow-0">
              <div class="input-group-append">
                <button id="button-addon1" name='mail_button' type="submit" class="btn btn-link"><i class="fa fa-paper-plane"></i></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Copyrights -->
  <div class="bg-light py-4">
    <div class="container text-center">
      <p class="text-muted mb-0 py-2">© 2022 Somcas All rights reserved.</p>
    </div>
  </div>
</footer>
</body>

</html>