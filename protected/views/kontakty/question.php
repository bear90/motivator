<?php

use application\modules\admin\models\Text;

?>

<section id="blank" class="container-fluid" data-structure="ask-question">
    <!--Menu-->
    <div class="row" id="main-menu">
        <div class="col-md-12 col-lg-11 col-lg-offset-1">
            <?php $this->widget('application\\components\\widgets\\MenuWidget', [
                'active' => 'question'
            ]); ?>
        </div>
    </div>
    <!--Gallery-->
    <div class="row">
        <ul class="contact-gallery hidden-xs">
            <li><img src="/img/contact-1.png" alt="1"></li>
            <li><img src="/img/contact-2.png" alt="2"></li>
            <li><img src="/img/contact-3.png" alt="3"></li>
            <li><img src="/img/contact-4.png" alt="4"></li>
            <li><img src="/img/contact-6.png" alt="5"></li>
        </ul>
    </div>
    <!--Slider-->
    <div class="row" id="slider">
        <ul class="contact-slider visible-xs-block">
            <li><img src="/img/contact-1.png" alt="1"></li>
            <li><img src="/img/contact-2.png" alt="2"></li>
            <li><img src="/img/contact-3.png" alt="3"></li>
            <li><img src="/img/contact-4.png" alt="4"></li>
            <li><img src="/img/contact-6.png" alt="5"></li>
        </ul>
    </div>
    <!--Address-->
    <div class="address-block">
        <?php $this->renderPartial('partials/ask-question', ['email' => $email]); ?>
    </div>

    <div class="fixed-socseti">
        <a target="_blank" href="https://vk.com/motivatortravel"><img src="/img/soc-vk.png" alt=""></a>
        <a target="_blank" href="https://www.facebook.com/%D0%9C%D0%BE%D1%82%D0%B8%D0%B2%D0%B0%D1%82%D0%BE%D1%80-203321533372476/?__mref=message"><img src="/img/soc-fb.png" alt=""></a>
        <a target="_blank" href="http://m.ok.ru/group/52925620093131"><img src="/img/soc-od.png" alt=""></a>
    </div>
    
</section>

