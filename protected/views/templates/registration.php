<p>Уважаемый абонент системы «МОТИВАТОР»! <br>
Вы зарегистрировались на сайте мотиватор.бел или motivator-travel.by!</p>

<p>Вам присвоен статус соискателя скидки! </p>

<p>Ваш личный кабинет № <?php echo str_pad($tourist->id, 4, "0", STR_PAD_LEFT)?>; 
пароль для входа: <?php echo $tourist->user->password?>; 
код группы: <?php echo str_pad($tourist->id, 4, "0", STR_PAD_LEFT)?>.</p>

<p>Порядок  получения скидки описан в <a href="<?php echo \application\models\Configuration::get(\application\models\Configuration::SITE_DOMAIN); ?>/user/dashboard?tab=tab4">правилах работы</a> в вашем личном кабинете.</p>

<p>Для перехода в личный кабинет нажмите – <a href="<?php echo $tourist->user->getAutoLoginLink(); ?>">перейти в личный кабинет</a></p>

<p>Удивительного Вам отдыха и удачных  памятных покупок на сэкономленные деньги!</p>

<p>Система «МОТИВАТОР»</p>