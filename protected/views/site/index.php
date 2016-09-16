<?php
/**
 * @var \CForm $loginForm
 * @var \CForm $registerForm
 * @var string $loginError
 * @author soza.mihail@gmail.com
 */

use application\modules\admin\models\Text;

?>
<section id="blank" class="container-fluid" data-structure="index">
    <!--Menu-->
    <div class="row" id="main-menu">
        <div class="col-md-12 col-lg-11 col-lg-offset-1">
            <?php $this->widget('zii.widgets.CMenu',array(
                'items' => [
                    [
                        'label' => 'Туристам',
                        'url' => ['/'],
                        'active' => true
                    ],
                    [
                        'label' => 'Турагентам',
                        'url' => ['/turagentam'],
                    ],
                    [
                        'label' => 'Туроператорам',
                        'url' => ['/turoperatoram'],
                    ],
                    [
                        'label' => 'Контакты',
                        'url' => ['/kontakty'],
                    ]
                ],
                'htmlOptions' => ['class' => 'nav navbar-nav'],
                'itemCssClass' => 'text-uppercase'
            )); ?>
        </div>
    </div>
    <!--Gallery-->
    <div class="row">
        <ul class="tourist-gallery hidden-xs">
            <li><img src="img/slide-4.jpg" alt="1"></li>
            <li><img src="img/slide-7.jpg" alt="2"></li>
            <li><img src="img/slide-8.jpg" alt="3"></li>
            <li><img src="img/slide-2.jpg" alt="4"></li>
            <li><img src="img/slide-6.jpg" alt="5"></li>
        </ul>
    </div>
    <!--Slider-->
    <div class="row" id="slider">
        <ul class="tourist-slider visible-xs-block">
            <li><img src="img/slide-4.jpg" alt="1"></li>
            <li><img src="img/slide-7.jpg" alt="2"></li>
            <li><img src="img/slide-8.jpg" alt="3"></li>
            <li><img src="img/slide-2.jpg" alt="4"></li>
            <li><img src="img/slide-6.jpg" alt="5"></li>
        </ul>
    </div>
    <!--Privet cabinet tourist-->
    <div class="center-block" id="privet-cabinet">
        <?php if (Yii::app()->user->isUser()):?>
            <a href="<?php echo Yii::app()->createUrl('user/dashboard'); ?>" id="btn-privet-cabinet" class="btn btn-default">Личные кабинеты абонентов</a>
        <?php else: ?>
            <a href="#login-form" data-toggle="collapse"  id="btn-privet-cabinet" class="btn btn-default">Личные кабинеты абонентов</a>
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
    <div id="rule-tab" class="center-block clearfix">
        <div id="wrapper" class="ms_tabs" data-selected="" data-collapse="1">
            <a href="#tab1" class="tab" id="tabAbout">О СЕРВИСЕ «МОТИВАТОР»</a>
            <a href="#tab-rules" class="tab" id="tabRules">Правила работы</a>
            <a href="#tab-partners" class="tab" id="tabPartners">Партнёры СЕРВИСА «МОТИВАТОР»</a>

            <div class="tab1 tabs-block">
                <?php echo Text::get('turistam-about'); ?>
            </div>
            <div class="tab-rules tabs-block">
                <?php echo Text::get('turistam-rules'); ?>
            </div>

            <div class="tab-partners tabs-block">
                <?php echo Text::get('turistam-partners'); ?>
            </div>
        </div>​
    </div>


    <!--Discounts-->
    <div class="center-block" id="discount-attraction">
        <p>Получите <span class="text-orange">скидку <span class="big_11">11%</span>  и более</span><br>
        на  полную  стоимость  любых  туров<br>  от  сервиса  «мотиватор»
        </p>
    </div>
    
    <!--Accordion-->
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title text-center text-uppercase">
                    <a data-toggle="collapse" href="#collapseOne">
                        <div class="panel-text marginTop">Что для этого нужно сделать?</div>
                        <div class="panel-direction pull-right"></div>
                    </a>
                </h4>

            </div>
            <div id="collapseOne" class="panel-collapse collapse">
                <div class="panel-body">
                    <?php echo Text::get('question1'); ?>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title text-center text-uppercase">
                    <a data-toggle="collapse" href="#collapseTwo">
                        <div class="panel-text marginTop">Что включает в себя общая скидка и от чего зависит её размер?</div>
                        <div class="panel-direction pull-right"></div>
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                    <?php echo Text::get('question2'); ?>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title text-center text-uppercase">
                    <a data-toggle="collapse" href="#collapse3">
                        <div class="panel-text marginTop marginTopFive">Порядок начисления общей скидки</div>
                        <div class="panel-direction pull-right"></div>
                    </a>
                </h4>
            </div>
            <div id="collapse3" class="panel-collapse collapse" style="margin-top: 5px;">
                <div class="panel-body container-fluid">
                    <?php echo Text::get('question3'); ?>
                </div>
            </div><!--/3rd panel-body-->
            
            <!-- <div class="hideButton">Скрыть</div>-->
        </div><!--/3rd panel-->

        <div class="panel panel-default">
            <div class="panel-heading threeHead">
                <h4 class="panel-title text-center text-uppercase">
                    <a data-toggle="collapse" href="#collapseThree">
                        <div class="panel-text marginTop">Чем сервис «МОТИВАТОР» отличается от раннего бронирования?</div>
                        <div class="panel-direction pull-right"></div>
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body container-fluid">
                    <?php echo Text::get('question4'); ?>
                </div>
            </div><!--/3rd panel-body-->
        </div><!--/3rd panel-->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title text-center text-uppercase">
                    <a data-toggle="collapse" href="#collapseFour">
                        <div class="panel-text marginTop">На какие туры предоставляется скидка?  </div>
                        <div class="panel-direction pull-right"></div>
                    </a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse" style="margin-top: 5px;">
                <div class="panel-body container-fluid">
                    <?php echo Text::get('question5'); ?>
                </div>
            </div><!--/3rd panel-body-->
        </div><!--/3rd panel-->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title text-center text-uppercase">
                    <a data-toggle="collapse" href="#collapseFive">
                        <div class="panel-text marginTop marginTopFive">Исходная стоимость туров от партнёров сервиса «мотиватор»</div>
                        <div class="panel-direction pull-right"></div>
                    </a>
                </h4>
            </div>
            <div id="collapseFive" class="panel-collapse collapse" style="margin-top: 5px;">
                <div class="panel-body container-fluid">
                    <?php echo Text::get('question6'); ?>
                </div>
            </div><!--/3rd panel-body-->

            <!-- <div class="hideButton">Скрыть</div>-->
        </div><!--/3rd panel-->

    </div><!--/accordion -->
    
    <?php $this->renderPartial('partials/registration')?>

    <div class="fixed-socseti">
        <a target="_blank" href="https://vk.com/motivatortravel"><img src="/img/soc-vk.png" alt=""></a>
        <a target="_blank" href="https://www.facebook.com/%D0%9C%D0%BE%D1%82%D0%B8%D0%B2%D0%B0%D1%82%D0%BE%D1%80-203321533372476/?__mref=message"><img src="/img/soc-fb.png" alt=""></a>
        <a target="_blank" href="http://m.ok.ru/group/52925620093131"><img src="/img/soc-od.png" alt=""></a>
    </div>
</section>
