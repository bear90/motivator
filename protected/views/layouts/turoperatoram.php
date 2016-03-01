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
                <h1 class="text-uppercase text-right text-logo">Для туроператоров - это система, позволяющая наращивать продажи туров</h1>
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
                            ],
                            [
                                'label' => 'Туроператорам',
                                'url' => ['/turoperatoram'],
                                'active' => true
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
            <!--Address-->
            <div class="address-block">
                <p class="text-uppercase">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                <p class="text-uppercase">Contrary to popular belief, Lorem Ipsum is not simply random text.</p>
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
                            ],
                            [
                                'label' => 'Туроператорам',
                                'url' => ['/turoperatoram'],
                                'active' => true
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
        <?php $this->widget('zii.widgets.CMenu',array(
            'items' => [
                [
                    'label' => 'Туристам',
                    'url' => '/'
                ],
                [
                    'label' => 'Турагентам',
                    'url' => ['/turagentam'],
                ],
                [
                    'label' => 'Туроператорам',
                    'url' => ['/turoperatoram'],
                    'active' => true
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



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!--SlideBars plugin-->
    <script src="js/slidebars.js" type="text/javascript"></script>

    <!-- Main bxSlider -->
    <script src="js/jquery.bxslider.min.js" type="text/javascript"></script>
    <!--Local settings-->
    <script src="js/settings-contacts.js"></script>

</body>
</html>