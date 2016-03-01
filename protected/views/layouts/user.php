<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Мотиватор - контакты</title>
    <meta content="Motivator" name='description'>
    <meta content="Motivator" name='keywords'>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="/img/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/user/plugins/slidebars.css">
    <link rel="stylesheet" href="/css/user/tourist.css">
    <link rel="stylesheet" href="/css/user/contacts.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="content" canvas="container" class="close-any">
        <header class="container-fluid">
            <div class="btn btn-default toggle-left">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </div>
            <a class="logo" href="../index.html">
                <img src="/img/logo.png" alt="Motivator">
            </a>
            <div class="breadcrumbs hidden-sm hidden-xs">
                <a href="../index.html">Туристам</a>
                <span>/</span>
                <a href="#" class="link-now">Личный кабинет туриста</a>
            </div>
            <div class="lk-block hidden-sm hidden-md hidden-lg">
                <span>ЛИЧНЫЙ КАБИНЕТ <b>№<?php echo Yii::app()->user->model->tourist->id; ?></b></span>
            </div>
        </header>

        <section id="blank" class="container-fluid">
            <div class="row">
                <div class="head">
                    <h1>
                    <?php echo Yii::app()->user->model->tourist->lastName; ?>
                    <?php echo Yii::app()->user->model->tourist->firstName; ?>
                    </h1>
                    <?php if(Yii::app()->user->model->tourist->phone): ?>
                        <span><?php echo Yii::app()->user->model->tourist->phone; ?></span><br>
                    <?php endif; ?>
                    <span class="mail"><?php echo Yii::app()->user->model->tourist->email; ?></span>
                    <?php if(Yii::app()->user->model->tourist->tourCity): ?>
                        <h1><b>Город покупки тура:</b> <span><?php echo Yii::app()->user->model->tourist->tourCity; ?></span></h1>
                    <?php endif; ?>
                    <h1><b>Статус:</b> <span><?php echo Yii::app()->user->model->tourist->status->description; ?></span></h1>
                   <!-- <a href="#" class="hide-block">Скрыть</a>-->
                    <a class="right-escape" href="<?php echo Yii::app()->createUrl('user/logout'); ?>">
                        <span>Вых</span>
                    </a>
                </div>
            </div>
            <div id="rule-tab" class="center-block">
                <div id="wrapper" class="tab6">
                    <div class="tabs-link clearfix">
                        <a href="#" class="tab1">ВЫБОР ТУРА</a>
                        <a href="#" class="tab5" id="fiveTab">ВАШ ТУР</a>
                        <a href="#" class="tab2" id="secondTab">ПРИЗ</a>
                        <a href="#" class="tab3" id="threeTab">ИНСТРУКЦИИ</a>
                        <a href="#" class="tab4" id="fourTab">ПРАВИЛА РАБОTЫ</a>
                        <a href="#" class="tab6" id="sixTab">ВАШ МЕНЕДЖЕР</a>
                    </div>

                    <div class="tab1 tabs-block clearfix">
                        <div class="tabs-block-inner">
                            <div class="head-inner-block">
                                <h4 class="title">Заполните и отправьте заявку на тур!</h4>
                                <span class="sub-title">Вы всегда сможете <br>сменить выбранный тур!</span>
                            </div>
                            
                            <div class="head-inner-block">
                                <h3>ЗАЯВКА НА ТУР</h3>
                                <form action="/" class="request-head-block clearfix">
                                    <div class="inner-block">
                                        <select>
                                            <option value="val1">Выберите турагента</option>
                                            <option value="val2">Выберите турагента</option>
                                            <option value="val3">Выберите турагента</option>
                                            <option value="val4">Выберите турагента</option>
                                            <option value="val5">Выберите турагента</option>
                                        </select>
                                    </div>
                                    <div class="inner-block second">
                                        <label>Укажите страну отдыха:</label>
                                        <input type="text">
                                        <a href="#" class="add">+ ещё страна</a>
                                    </div>
                                    <div class="inner-block">
                                        <label>Продолжительность тура:</label>
                                        <input type="text" class="days">
                                        <span>дней</span>
                                    </div>
                                    <div class="inner-block full clearfix">
                                        <label class="big">Ориентировочная <b>дата начала тура</b>:</label>
                                        <span class="little">от</span>
                                        <input class="little" type="text" value="20.12.2016">
                                        <span>до</span>
                                        <input class="little" type="text" value="30.12.2016">
                                    </div>
                        
                                    <div class="inner-block full">
                                        <input type="submit" value="ОТПРАВИТЬ ЗАЯВКУ НА ТУР">
                                    </div>
                                </form>
                            </div>
                            <a href="#" class="hide-block">Скрыть</a>
                        </div>

                        <div class="send-block center">
                            <span class="arrow-ok"></span>
                            <h2>ОТПРАВЛЕНО</h2>
                            <p>Ваша заявка отправлена турагенту.</p>
                            <p>Ждите звонок менеджера турагента.</p>
                            <p>На адрес личного кабинета и по электронному адресу вам будут  отправлены данные вашего менеджера,  а также предложения туров согласно заявке. Желаю вам удачного выбора тура!<br>Система «МОТИВАТОР».</p>
                        </div>
                    </div>
                    <div class="tab2 tabs-block">
                        <div class="inner-block">
                            <h4>Приз</h4>
                            <p>Розыграш призов будет производиться <span>с 01.03.2016</span></p>
                        </div>
                        <a href="#" class="hide-block">Скрыть</a>
                    </div>
                    <div class="tab3 tabs-block">
                        <div class="inner-block">
                            <h4>Инструкция</h4>
                            <p>Как я уже писал Вам ранее, я предлагаю до сделать некоторые заготовки двух вкладок, планируемых к работе (кстати, Вы можете кое что взять из ранее сделанных нами вкладок.</p>
                        </div>
                        <a href="#" class="hide-block">Скрыть</a>
                    </div>
                    <div class="tab4 tabs-block">
                        <div class="inner-block">
                            <h4>Текстовый блок</h4>
                            <p>Как я уже писал Вам ранее, я предлагаю до сделать некоторые заготовки двух вкладок, планируемых к работе (кстати, Вы можете кое что взять из ранее сделанных нами вкладок.</p>
                        </div>
                        <a href="#" class="hide-block">Скрыть</a>
                    </div>
                    <div class="tab5 tabs-block">
                        <div class="inner-block our-tour">
                            <h4>Ваш тур</h4>
                            <span>Страна: <span class="value">Турция</span></span>
                            <span>Город/Регион: <span class="value">Стамбул</span></span>
                            <span>Начало тура: <span class="value date">12.02.2016</span></span>
                            <span>Окончание тура: <span class="value date">22.02.2016</span></span>
                            <span>Исходная стоимость тура: <span class="value money">20 000 000 бел.руб.</span></span>
                            <span>Сумма аванса: <span class="value money">400 000 бел.руб.</span></span>
                            <span class="sell">Сумма скидки: <span class="value money">2 000 000 бел.руб.</span></span>
                            <span>Сумма к доплате: <span class="value money">17 600 000 бел.руб.</span></span>
                        </div>
                        <a href="#" class="hide-block">Скрыть</a>
                    </div>

                    <div class="tab6 tabs-block">
                        <div class="inner-block">
                            <h4>Иван Петрович</h4>
                            <h5>тел:</h5>
                            <span>+ 375 (29) 502 93 02</span>
                            <span>+ 375 (29) 502 93 02</span>
                            <span>+ 375 (29) 502 93 02</span>
                            <span>+ 375 (29) 502 93 02</span>
                            <span>+ 375 (29) 502 93 02</span>
                            <a href="#" class="link-to-touragent hidden-sm hidden-md hidden-lg">перейти на сайт турагента</a>
                        </div>
                        <a href="#" class="hide-block">Скрыть</a>
                    </div>

                    <div class="info-block">
                        <div class="inner-block">
                            <h4>Сообщение</h4>
                            <p>Как я уже писал Вам ранее, я предлагаю до сделать некоторые заготовки двух вкладок, планируемых к работе (кстати, Вы можете кое что взять из ранее сделанных нами вкладок.</p>
                        </div>

                        <a href="#" class="bottom-link hidden-sm hidden-md hidden-lg"></a>

                        <!--<div class="inner-block hidden-xs">
                            <form action="/" class="clearfix">
                                <h4>Новый клиент</h4>
                                <div class="form-block">
                                    <label>Страна отдыха:</label>
                                    <input type="text">
                                </div>
                                <input type="submit" value="ВОЙTИ В КАБИНЕT">
                            </form>
                        </div>-->
                    </div>

                    <a href="#" class="bottom-link hidden-xs"></a>

                    <div class="bottom-block tourists">
                        <div class="sell-block">
                            <h4>Сумма вашей скидки: <b>9 999 999 <small>бел.руб.</small></b> </h4>
                        </div>
                        <div class="end-sell">
                           <div class="bottom-container">
                                <div class="inner-block">
                                   <h4>До окончания срока внесения аванса осталось:</h4>
                               </div>
                               <div class="inner-block">
                                   <div class="countdown-time clearfix"></div>
                               </div>
                               <div class="bottom-inner-block">
                                   <h4>Конечная дата внесения аванса: <b>12.02.2016</b></h4>
                               </div>
                           </div>
                        </div>
                    </div>
                </div>​
            </div>
        </section>

        <footer class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-xs-offset-0 col-sm-4 col-sm-offset-4 col-lg-3 col-lg-offset-0">
                    <a class="logo" href="index.html">
                        <img src="/img/logo.png" alt="Motivator">
                    </a>
                </div>
                <div class="col-md-6" id="footer-menu">
                    <ul class="nav navbar-nav">
                        <li><a href="/index.html" class="text-uppercase">Туристам</a></li>
                        <li><a href="/turagentam/turagentam.html" class="text-uppercase">Турагентам</a></li>
                        <li><a href="/turoperatoram/turoperatoram.html" class="text-uppercase">Туроператорам</a></li>
                        <li><a href="/kontakty/contacts.html" class="text-uppercase">Контакты</a></li>
                    </ul>
                </div>
                <div class="col-md-3" id="creator">
                  
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 text-uppercase text-center" id="copyright">COPYRIGHT 2016 © 2016 ЛАЗАРЕВ Д.А. ВСЕ ПРАВА ЗАЩИЩЕНЫ.</div>
            </div>
        </footer>
    </div>


    <!-- Left Slidebar menu -->
    <div off-canvas="sb-1 left reveal">
        <ul class="nav navbar-nav" id="side-menu">
            <li><a href="/index.html" class="text-uppercase text-center">Туристам</a></li>
            <li><a href="/turagentam/turagentam.html" class="text-uppercase text-center">Турагентам</a></li>
            <li><a href="/turoperatoram/turoperatoram.html" class="text-uppercase text-center">Туроператорам</a></li>
            <li><a href="/kontakty/contacts.html" class="text-uppercase text-center">Контакты</a></li>
        </ul>
    </div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/js/bootstrapValidator.min.js" type="text/javascript"></script>
    <!--SlideBars plugin-->
    <script src="/js/slidebars.js" type="text/javascript"></script>

    <!-- Main bxSlider -->
    <script src="/js/jquery.bxslider.min.js" type="text/javascript"></script>
    <!--Local settings-->
    <script src="/js/jquery.plugin.js" type="text/javascript"></script>
    <script src="/js/jquery.countdown.js" type="text/javascript"></script>
    <script src="/js/jquery.countdown-ru.js" type="text/javascript"></script>
    <!-- // <script src="js/settings-contacts.js"></script> -->

    <!--Local settings-->
    <script src="/js/settings-contacts.js"></script>

    <!--Local settings-->
    <script src="/js/settings-tourist.js"></script>

</body>
</html>