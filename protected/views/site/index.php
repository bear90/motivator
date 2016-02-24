<?php
/**
 * @author soza.mihail@gmail.com
 */
?>
<section id="blank" class="container-fluid">
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
        <a href="/kabunet-turista/lk-turista.html" id="btn-privet-cabinet" class="btn btn-default text-uppercase text-center" style="font-size: 1.2em;">Личные кабинеты туристов</a>
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

    <!--Info board -->
    <div class="row center-block text-center">
        <a href="#info-board-issue" data-toggle="collapse" data-parent="#info-board-issue" id="btn-info-board-issue" class="btn btn-default text-uppercase text-center">Зарегистрироваться</a>
        <!--Info board (hide block) -->
        <div class="collapse" id="info-board-issue">
            <!--Form3-->
            <form class="motivator-form" id="info-board-form" name="info-board-form" method="post" action="php_file" data-bv-message="This value is not valid"
                  data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
                  data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
                  data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                <div class="row fld-group">
                    <div class="input-fld col-xs-12">
                        <label class="text-uppercase" for="last_name">Фамилия:</label>
                        <input placeholder="Фамилия" type="text" name="last_name" id="last_name" data-bv-notempty data-bv-notempty-message="Введите фамилию!">
                    </div>
                    <div class="input-fld col-xs-12">
                        <label class="text-uppercase" for="first_name">Имя:</label>
                        <input placeholder="Имя" type="text" name="first_name" id="first_name" data-bv-notempty data-bv-notempty-message="Введите имя!">
                    </div>
                    <div class="input-fld col-xs-12">
                        <label class="text-uppercase" for="email">E-mail:</label>
                        <input placeholder="e-mail" type="email" name="email" id="email" data-bv-notempty data-bv-notempty-message="E-mail адрес обязателен!">
                    </div>
                </div>
                <div class="row">
                    <a style="width: 250px;" class="btn btn-default btn-continue text-uppercase btn-continue" id="btn-continue-1">Продолжить</a>
                </div>
            </form>
            <!--Result on submit form3 (hidden)-->
            <div class="row hidden" id="form-result">
                <!-- BEGIN: ReCAPTCHA implementation. -->
                <div class="g-recaptcha" data-sitekey="6LfzgAoTAAAAAM1tzq2tBzRXBgy9HxWSN_BDqEGp"></div>
                <!-- END: ReCAPTCHA implementation. -->
                <div class="info-result">
                            <span style="font-size: 1.5em;">В случае привлечения вас абонентом системы «МОТИВАТОР»<br>
                            введите сообщенный им код группы<br></span>
                    <div class="groupCode center-block">
                        <div class="input-fld">
                            <label class="text-uppercase" for="first_name">Введите код группы:</label>
                            <input placeholder="Код" type="text" name="Code_group" id="Code_group" data-bv-notempty data-bv-notempty-message="Введите имя!">
                        </div>
                    </div>
                </div>
                <div class="row center-block" id="issue-btns">
                    <a style="width: 250px;" class="btn btn-default btn-continue text-uppercase btn-continue" id="btn-continue-1">Продолжить</a>
                </div>
                <div class="UserGaide">
                    <input type="checkbox"><label style="font-size: 1.3em; padding-left: 10px;">Я подтверждаю свое согласие с условиями <a href="#" style="text-decoration: underline;">пользовательского соглашения</a></label>
                </div>

                <div class="row center-block text-center" style="margin-bottom: 30px;">
                    <a href="#info-board-issue" data-toggle="collapse" data-parent="#info-board-issue" id="btn-info-board-issue-2" class="btn btn-default text-uppercase text-center">Зарегистрироваться</a>
                </div>

                <div class="info-result" style="font-size: 1.4em;">
                    На ваш адрес отправлено сообщение <br>о присвоении вам статуса абонента системы
                    «МОТИВАТОР»,<br> а также инструкция и пароль для вашего личного кабинета
                </div>
            </div><!--/form-result -->
        </div><!--/info-board-issue -->
    </div><!--/info board block-->
</section>
