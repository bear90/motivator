<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Мотиватор - туроператорам</title>
    <meta content="Motivator" name='description'>
    <meta content="Motivator" name='keywords'>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/plugins/slidebars.css">
    <link rel="stylesheet" href="css/tourist.css">
    <link rel="stylesheet" href="css/contacts.css">
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
                <img src="img/logo.png" alt="Motivator">
                <h1 class="text-uppercase text-right text-logo">Для турагентов – это система, облегчающая привлечение новых клиентов
</h1>
            </a>
        </header>

        <section id="blank" class="container-fluid">
            <!--Menu-->
            <div class="row" id="main-menu">
                <div class="col-md-12 col-lg-11 col-lg-offset-1">
                    <?php $this->widget('zii.widgets.CMenu',array(
                        'items' => [
                            [
                                'label' => 'Туристам',
                                'url' => '/'
                            ],
                            [
                                'label' => 'Турагентам',
                                'url' => ['/turagentam'],
                                'active' => true
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
                <ul class="contact-gallery hidden-xs">
                    <li><img src="img/contact-1.png" alt="1"></li>
                    <li><img src="img/contact-2.png" alt="2"></li>
                    <li><img src="img/contact-3-new.png" alt="3"></li>
                    <li><img src="img/contact-4.png" alt="4"></li>
                    <li><img src="img/contact-5-new.png" alt="5"></li>
                </ul>
            </div>
            <!--Slider-->
            <div class="row" id="slider">
                <ul class="contact-slider visible-xs-block">
                    <li><img src="img/contact-1.png" alt="1"></li>
                    <li><img src="img/contact-2.png" alt="2"></li>
                    <li><img src="img/contact-3-new.png" alt="3"></li>
                    <li><img src="img/contact-4.png" alt="4"></li>
                    <li><img src="img/contact-5-new.png" alt="5"></li>
                </ul>
            </div>

            <!--Privet cabinet tourist-->
<div class="center-block" id="discount-attraction"></div>
            <div class="center-block" id="privet-cabinet">
                <a href="/kabunet-touragenta/lk-touragent.html" >рабочие кабинеты турагентов</a>
               <div class="block-login">
                    <form action="/" class="clearfix">
                        <label class="title">Введите пароль:</label>
                        <input type="password" placeholder="Пароль">
                       <div class="submit-block">
                         <input type="submit" value="Войти">
                        </div>
                    </form>
                </div>
            </div>               
<!--Rule tab-->
            <div id="rule-tab" class="center-block">
                <div id="wrapper" class="tab1 ">
                    <a href="#" class="tab1">Как работает система МОТИВАТОР</a>
                    <a href="#" class="tab2" id="secondTab">Правила работы</a>
                    <a href="#" class="tab3" id="threeTab">Статьи, Аналитика</a>

                    <div class="tab1 tabs-block">
                       <h4>Инструкция 1</h4>
                       <p>Как я уже писал Вам ранее,я предлагаю до сделать некоторые заготовки двух вкладок планируемых к работе (кстати, Вы можете кое что взять из ранее сделанных нами вкладок.</p>
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

        <footer class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-xs-offset-0 col-sm-4 col-sm-offset-4 col-lg-3 col-lg-offset-0">
                    <a class="logo" href="../index.html">
                        <img src="img/logo.png" alt="Motivator">
                    </a>
                </div>
                <div class="col-md-6" id="footer-menu">
                    <?php $this->widget('zii.widgets.CMenu',array(
                        'items' => [
                            [
                                'label' => 'Туристам',
                                'url' => '/'
                            ],
                            [
                                'label' => 'Турагентам',
                                'url' => ['/turagentam'],
                                'active' => true
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
            <li  class="active"><a href="#" class="text-uppercase text-center">Турагентам</a></li>
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
    <script src="js/slidebars.js" type="text/javascript"></script>

    <!-- Main bxSlider -->
    <script src="js/jquery.bxslider.min.js" type="text/javascript"></script>
    <!--Local settings-->
    <script src="js/settings-contacts.js"></script>

    <!--Local settings-->
    <script src="js/settings-tourist.js"></script>

</body>
</html>