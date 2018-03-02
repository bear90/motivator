<?php

use application\modules\admin\models\Text;

?>

<section id="blank" class="container-fluid">
    <!--Menu-->
    <div class="row" id="main-menu">
        <div class="col-md-12 col-lg-11 col-lg-offset-1">
            <?php $this->widget('application\\components\\widgets\\MenuWidget', [
                'active' => 'turoperatoram'
            ]); ?>
        </div>
    </div>
    <!--Gallery-->
    <div class="row">
        <ul class="tourist-gallery hidden-xs">
            <li><img src="img/o-portale-1.jpg" alt="3"></li>
            <li><img src="img/o-portale-2.jpg" alt="5"></li>
            <li><img src="img/o-portale-3.jpg" alt="1"></li>
            <li><img src="img/o-portale-4.jpg" alt="2"></li>
            <li><img src="img/o-portale-5.jpg" alt="4"></li>
        </ul>
    </div>
    <!--Slider-->
    <div class="row" id="slider">
        <ul class="tourist-slider visible-xs-block">
            <li><img src="img/o-portale-1.jpg" alt="1"></li>
            <li><img src="img/o-portale-2.jpg" alt="2"></li>
            <li><img src="img/o-portale-3.jpg" alt="3"></li>
            <li><img src="img/o-portale-4.jpg" alt="5"></li>
            <li><img src="img/o-portale-5.jpg" alt="4"></li>
        </ul>
    </div>
    <!--Address-->
    <div class="address-block">
        <?php echo Text::get('turoperatoram'); ?>
    </div>

<div class="fixed-socseti">
        <a target="_blank" href="https://vk.com/portalpenkiby"><img src="/img/soc-vk.png" alt=""></a>
        <a target="_blank" href="https://www.facebook.com/penki.by/"><img src="/img/soc-fb.png" alt=""></a>
        <a target="_blank" href="https://ok.ru/group/53891158704331"><img src="/img/soc-od.png" alt=""></a>
        <a target="_blank" href="https://www.instagram.com/penkiby/"><img src="/img/soc-ig.png" alt=""></a>
    </div>
</section>