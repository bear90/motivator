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
             <p>
               <ul>
                 <li>В основу работы системы «МОТИВАТОР» положена математическая модель начисления скидок во взаимно-перекрывающихся покупательских группах туристов.</li>
                 <li>Для обслуживания системы на базе данного сайта создана специальная программа автоматического ступенчатого начисления скидок.</li>
                 <li>Партнёрами системы выделена дополнительная ценовая льгота на стоимость своих туров,которая  расходуется, как на начисление персональной стартовой скидки покупателя тура, так и на формирование общего бонусного фонда, распределяемого между абонентами системы.</li>
                 <li>Темп роста абонентской скидки туриста до её максимального значения зависит от стоимости туров и количества их покупателей, начавших участвовать в работе системы позже данного туриста.</li>
                 <li>Начисление скидки каждому абоненту системы в соответствующем статусе  происходит:
                  <ul>
                    <li>автоматически: при пассивном накоплении абонентской скидки в рамках личного кабинета на сайте;</li>
                    <li>при личном участии владельца кабинета: с привлечением им своих знакомых к участию в работе системы ;</li>
                  </ul>
                 </li>
               </ul>
             </p>
             <p class="text-center"><strong>Размер общей скидки от системы «МОТИВАТОР» не ограничен!</strong></p>
             <p>
               <ul>
                 <li>В случае внесения предоплаты  и последующего отмены покупки тура туристом для сохранения уже начисленной ему скидки,необходимо поставить менеджера турагента в известность,  предоплата будет использована при покупке нового тура.</li>
                 <li>Система «МОТИВАТОР» объединила в себе важные элементы надёжности и привлекательности,- такие как:
                  <ul>
                    <li>автоматическое управление, исключающее любые злоупотребления в связи с «человеческим фактором»;</li>
                    <li>гибкость и лояльность, не требующая от туриста больших предварительных оплат и отсутствием  штрафных санкций при замене тура.</li>
                  </ul>
                 </li>
               </ul>
             </p>

             <div class="block-links clearfix">
                 <a href="#" class="inner-link coral"><img src="img/logo_ct.png" alt=""></a>
                 <a href="#" class="inner-link"><img src="img/logo_vand.png"alt=""></a>
                 <a href="#" class="inner-link sunmar"><img src="img/logo_sm.png" alt=""></a>
                 <a href="#" class="inner-link tez"><img src="img/logo_tt.png" alt=""></a>
             </div>
          </div>
          <div class="tab2 tabs-block">
              <h4>Инструкция 2</h4>
             <p>Как я уже писал Вам ранее,я предлагаю до сделать некоторые заго</p>
             <div class="block-links clearfix">
                 <a href="#" class="inner-link coral"><img src="img/logo_ct.png" alt=""></a>
                 <a href="#" class="inner-link"><img src="img/logo_vand.png"alt=""></a>
                 <a href="#" class="inner-link sunmar"><img src="img/logo_sm.png" alt=""></a>
                 <a href="#" class="inner-link tez"><img src="img/logo_tt.png" alt=""></a>
             </div>
          </div>
          <div class="tab3 tabs-block">
              <h4>Инструкция 3</h4>
             <p>Как я уже писал Вам ранее,я предлагаю до сделать некоторые заго</p>
             <div class="block-links clearfix">
                 <a href="#" class="inner-link coral"><img src="img/logo_ct.png" alt=""></a>
                 <a href="#" class="inner-link"><img src="img/logo_vand.png"alt=""></a>
                 <a href="#" class="inner-link sunmar"><img src="img/logo_sm.png" alt=""></a>
                 <a href="#" class="inner-link tez"><img src="img/logo_tt.png" alt=""></a>
             </div>
          </div>
      </div>​
  </div>
</section>