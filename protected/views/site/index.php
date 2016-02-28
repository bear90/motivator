<?php
/**
 * @var \CForm $loginForm
 * @var \CForm $registerForm
 * @author soza.mihail@gmail.com
 */
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
    <!--Discounts-->
    <div class="center-block" id="discount-attraction">
        <p>Честная <span class="text-orange">скидка <span class="big_11">11%</span></span><br> на стоимость любых туров<br> от системы «МОТИВАТОР»</p>
    </div>
    <!--Privet cabinet tourist-->
    <div class="center-block" id="discount-attraction"></div>
    <div class="center-block" id="privet-cabinet">
        <a href="#login-form" data-toggle="collapse"  id="btn-privet-cabinet" class="btn btn-default text-uppercase text-center" style="font-size: 1.2em;">Личные кабинеты туристов</a>
        <div class="block-login collapse" id="login-form">
            <?php echo $loginForm->renderBegin(); ?>
            <?php echo $loginForm['password']; ?>
            <?php echo $loginForm->renderButtons(); ?>
            <?php echo $loginForm->renderEnd(); ?>
        </div>
    </div>

    <!--Rule tab-->
    <div id="rule-tab" class="center-block">
        <div id="wrapper" class="tab1 ">
            <a href="#" class="tab1">Как работает система «МОТИВАТОР»</a>
            <a href="#" class="tab2" id="secondTab">Правила работы</a>
            <a href="#" class="tab3" id="threeTab">Партнёры системы «МОТИВАТОР»</a>

            <div class="tab1">
                <h4>Инструкция 1</h4>
                <p>Как я уже писал Вам ранее,я предлагаю до сделать некоторые заго</p>
                <h4>Инструкция</h4>
                <p>Как я уже писал Вам ранее,я предлагаю до сделать некоторые заго</p>
            </div>
            <div class="tab2">
                <h4>Инструкция 2</h4>
                <p>Как я уже писал Вам ранее,я предлагаю до сделать некоторые заго</p>
                <h4>Инструкция</h4>
                <p>Как я уже писал Вам ранее,я предлагаю до сделать некоторые заго</p>
            </div>
            <div class="tab3">
                <h4>Инструкция 3</h4>
                <p>Как я уже писал Вам ранее,я предлагаю до сделать некоторые заго</p>
                <h4>Инструкция</h4>
                <p>Как я уже писал Вам ранее,я предлагаю до сделать некоторые заго</p>
            </div>
        </div>​
    </div>
    <!--Discount calc (hide block)-->
    <div class="center-block discount-attraction-2" id="discount-attraction">
        <p>Получите честную <span class="text-orange">скидку <span class="big_11">5%-11%</span> и более</span> на стоимость любых туров от системы «МОТИВАТОР»</p>
    </div>
    <!--Accordion-->
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title text-center text-uppercase">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        <div class="panel-text marginTop">Что для этого нужно сделать?</div>
                        <div class="panel-direction pull-right"></div>
                    </a>
                </h4>

            </div>
            <div id="collapseOne" class="panel-collapse collapse">
                <div class="panel-body">

                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title text-center text-uppercase">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        <div class="panel-text marginTop">От чего зависит размер скидки?</div>
                        <div class="panel-direction pull-right"></div>
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">

                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading threeHead">
                <h4 class="panel-title text-center text-uppercase">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                        <div class="panel-text marginTop">Чем система «МОТИВАТОР» отличаеться от раннего бронирования?</div>
                        <div class="panel-direction pull-right"></div>
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body container-fluid">

                </div>
            </div><!--/3rd panel-body-->
        </div><!--/3rd panel-->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title text-center text-uppercase">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                        <div class="panel-text marginTop">На какие туры предоставляется скидка?  </div>
                        <div class="panel-direction pull-right"></div>
                    </a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse" style="margin-top: 5px;">
                <div class="panel-body container-fluid">

                </div>
            </div><!--/3rd panel-body-->
        </div><!--/3rd panel-->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title text-center text-uppercase">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                        <div class="panel-text marginTop marginTopFive">Вопрос №5</div>
                        <div class="panel-direction pull-right"></div>
                    </a>
                </h4>
            </div>
            <div id="collapseFive" class="panel-collapse collapse" style="margin-top: 5px;">
                <div class="panel-body container-fluid">

                </div>
            </div><!--/3rd panel-body-->
            <!-- <div class="hideButton">Скрыть</div>-->
        </div><!--/3rd panel-->

    </div><!--/accordion -->
    
    <?php $this->renderPartial('partials/registration')?>
</section>
