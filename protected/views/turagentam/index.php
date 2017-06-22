<?php

use application\modules\admin\models\Text;
use application\models\Configuration;

    $domain = Configuration::get(Configuration::SITE_DOMAIN);
?>
<section id="blank" class="container-fluid" data-structure="turagentam">
  <!--Menu-->
  <div class="row" id="main-menu">
      <div class="col-md-12 col-lg-11 col-lg-offset-1">
          <?php $this->widget('application\\components\\widgets\\MenuWidget', [
            'active' => 'turagentam'
          ]); ?>
      </div>
  </div>
  <!--Gallery-->
  <div class="row">
      <ul class="contact-gallery hidden-xs">
          <li><img src="img/turagentam-1.png" alt="1"></li>
          <li><img src="img/turagentam-2.png" alt="2"></li>
          <li><img src="img/turagentam-3.png" alt="3"></li>
          <li><img src="img/turagentam-4.png" alt="4"></li>
          <li><img src="img/turagentam-5.png" alt="5"></li>
      </ul>
  </div>
  <!--Slider-->
  <div class="row" id="slider">
      <ul class="contact-slider visible-xs-block">
          <li><img src="img/turagentam-1.png" alt="1"></li>
          <li><img src="img/turagentam-2.png" alt="2"></li>
          <li><img src="img/turagentam-3.png" alt="3"></li>
          <li><img src="img/turagentam-4.png" alt="4"></li>
          <li><img src="img/turagentam-5.png" alt="5"></li>
      </ul>
  </div>

    <div class="row" id="manager-login-form">
        <div class="col-md-12 button">
            <a href="#login-form" data-toggle="collapse"  id="btn-privet-cabinet" class="btn btn-default">ОЗНАКОМИТЬСЯ СО ВСЕМИ ПРЕДЛОЖЕНИЯМИ / РАЗМЕСТИТЬ ПРЕДЛОЖЕНИЕ</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="block-login collapse<?php if ($loginError): ?> in<?php endif; ?>" id="login-form">
                <?php echo $loginForm->renderBegin(); ?>
                    <div class="form-group">
                        <?php echo $loginForm['submit']; ?>
                    </div>

                    <div class="form-group">
                        <?php echo $loginForm['password']; ?>
                    </div>

                    <div class="form-group">
                        <?php echo $loginForm['code']; ?>
                    </div>
                    <?php if ($loginError): ?>
                        <small class="help-block" ><?php echo $loginError; ?></small>
                    <?php endif; ?>

                    <div class="form-block button">
                        <button type="submit" class="btn btn-default btn-green">Войти</button>
                    </div>
                <?php echo $loginForm->renderEnd(); ?>
            </div>
        </div>
    </div>

  <div class="address-block">
    <?php echo Text::get('turagentam'); ?>
  </div>
  

  
</section>
