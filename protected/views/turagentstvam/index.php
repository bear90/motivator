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
      <ul class="tourist-gallery hidden-xs">
          <li><img src="img/turagentam-11.png" alt="1"></li>
          <li><img src="img/turagentam-33.png" alt="3"></li>
          <li><img src="img/turagentam-22.png" alt="2"></li>
          <li><img src="img/turagentam-44.png" alt="4"></li>
          <li><img src="img/turagentam-55.png" alt="5"></li>
      </ul>
  </div>
  <!--Slider-->
  <div class="row" id="slider">
      <ul class="tourist-slider visible-xs-block">
          <li><img src="img/turagentam-11.png" alt="1"></li>
          <li><img src="img/turagentam-33.png" alt="3"></li>
          <li><img src="img/turagentam-22.png" alt="2"></li>
          <li><img src="img/turagentam-44.png" alt="4"></li>
          <li><img src="img/turagentam-55.png" alt="5"></li>
      </ul>
  </div>

    <div class="row" id="manager-login-form">
        <div class="col-md-10 col-md-offset-1 button">
        <?php if (!\Yii::app()->user->isManager()): ?>
            <a href="#login-form1" data-toggle="collapse"  id="btn-privet-cabinet" class="btn btn-default">РАБОЧИЕ КАБИНЕТЫ ТУРАГЕНТСТВ</a>
        <?php else: ?>
            <?php $this->renderPartial('partials/dashboard', ['filterForm' => $filterForm])?>
        <?php endif; ?>
        </div>
    </div>

    
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <?php if (!\Yii::app()->user->isManager()): ?>
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
    <div class="user-gaide"><button type="button" class="btn btn-small btn-green add-offer">Пользовательское соглашение</button></div>
    
    <div class="terms hidden"><?php echo Text::get('gaide'); ?></div>

    <?php echo Text::get('turagentam'); ?>
  </div>
  

  
</section>
