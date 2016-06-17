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

  <!--Privet cabinet tourist-->
<div class="center-block" id="discount-attraction"></div>
  <div class="center-block" id="privet-cabinet">
      <?php if (Yii::app()->user->isManager()):?>
            <a href="#" id="btn-privet-cabinet" class="btn btn-default show-list">Рабочие кабинеты турагентов</a>
            <ul>
              <?php foreach($managers as $manager):?>
                <li><a href="<?php echo Yii::app()->createUrl("turagentam/dashboard/{$manager->id}"); ?>"><?php echo $manager->name; ?></a></li>
              <?php endforeach;?>
            </ul>
        <?php else: ?>
            <a href="#login-form" data-toggle="collapse"  id="btn-privet-cabinet" class="btn btn-default">Рабочие кабинеты турагентов</a>
            <div class="block-login collapse<?php if ($loginError): ?> in<?php endif; ?>" id="login-form">
                <?php echo $loginForm->renderBegin(); ?>
                <?php echo $loginForm['submit']; ?>
                <?php echo $loginForm['password']; ?>
                <?php if ($loginError): ?>
                    <small class="help-block" ><?php echo $loginError; ?></small>
                <?php endif; ?>

                <?php echo $loginForm->renderButtons(); ?>
                <?php echo $loginForm->renderEnd(); ?>
            </div>
        <?php endif; ?>
  </div>               
<!--Rule tab-->
  <div id="rule-tab" class="center-block">
      <div id="wrapper" class="tab1 ms_tabs" data-selected="tab1" data-collapse="0">
          <a href="#tab1" class="tab active">О СЕРВИСЕ «МОТИВАТОР»</a>
          <a href="#tab2" class="tab" id="secondTab">Правила работы</a>
          <a href="#tab3" class="tab" id="threeTab">Статьи, Аналитика</a>

          <div class="tab1 tabs-block">
              <?php echo Text::get('turagentam-about'); ?>
          </div>
          <div class="tab2 tabs-block">
              <?php echo Text::get('turagentam-rules'); ?>
          </div>
          <div class="tab3 tabs-block">
              <?php echo Text::get('turagentam-articles'); ?>
          </div>
      </div>​
  </div>
  <?php echo Text::get('turagentam'); ?>

  <div class="fixed-socseti">
        <a href="https://vk.com/motivatortravel"><img src="/img/soc-vk.png" alt=""></a>
        <a href="https://www.facebook.com/%D0%9C%D0%BE%D1%82%D0%B8%D0%B2%D0%B0%D1%82%D0%BE%D1%80-203321533372476/?__mref=message"><img src="/img/soc-fb.png" alt=""></a>
        <a href="http://m.ok.ru/group/52925620093131"><img src="/img/soc-od.png" alt=""></a>
        <a href="#"><img src="/img/soc-vb.png" alt=""></a>
    </div>
</section>