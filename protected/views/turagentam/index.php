<?php

use application\modules\admin\models\Text;
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
        <?php if (!\Yii::app()->user->isManager() || Yii::app()->user->getState('viewOnly')): ?>
            <a href="#login-form1" data-toggle="collapse"  id="btn-privet-cabinet" class="btn btn-default">РАБОЧИЕ КАБИНЕТЫ ТУРАГЕНТСТВ</a>
        <?php else: ?>
            <a href="/#block-main-table" id="btn-privet-cabinet" class="btn btn-default">РАБОЧИЕ КАБИНЕТЫ ТУРАГЕНТСТВ</a>
        <?php endif; ?>
        </div>
    </div>

    
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <?php if (!\Yii::app()->user->isManager() || !Yii::app()->user->getState('viewOnly')): ?>
          <div class="block-login collapse<?php if ($errorLoginView && $loginFormView->submitted()): ?> in<?php endif; ?>" id="login-form1">
              <?php echo $loginFormView->renderBegin(); ?>

                  <div class="form-group">
                      <?php echo $loginFormView['submit']; ?>
                  </div>

                  <div class="form-group">
                      <?php echo $loginFormView['password']; ?>
                  </div>

                  <?php if ($errorLoginView): ?>
                    <div class="alert alert-danger" role="alert"><?php echo $errorLoginView; ?></div>
                  <?php endif; ?>

                  <div class="form-block button">
                      <button type="submit" class="btn btn-default btn-green">Войти</button>
                  </div>
              <?php echo $loginFormView->renderEnd(); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>

  <div class="address-block">
    <?php echo Text::get('turagentam'); ?>
  </div>
  

  
</section>
