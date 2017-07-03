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
        <ul class="contact-gallery hidden-xs">
            <li><img src="img/turoperatoram-1.png" alt="1"></li>
            <li><img src="img/turoperatoram-2.png" alt="2"></li>
            <li><img src="img/turoperatoram-3.png" alt="3"></li>
            <li><img src="img/turoperatoram-4.png" alt="4"></li>
            <li><img src="img/turoperatoram-5.png" alt="5"></li>
        </ul>
    </div>
    <!--Slider-->
    <div class="row" id="slider">
        <ul class="contact-slider visible-xs-block">
            <li><img src="img/turoperatoram-1.png" alt="1"></li>
            <li><img src="img/turoperatoram-2.png" alt="2"></li>
            <li><img src="img/turoperatoram-3.png" alt="3"></li>
            <li><img src="img/turoperatoram-4.png" alt="4"></li>
            <li><img src="img/turoperatoram-5.png" alt="5"></li>
        </ul>
    </div>
    <!--Address-->
    <div class="address-block">
        <?php echo Text::get('turoperatoram'); ?>
    </div>

</section>