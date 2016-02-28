<?php
/**
 * @author soza.mihail@gmail.com
 */
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Мотиватор - туристам</title>
    <meta content="Motivator" name='description'>
    <meta content="Motivator" name='keywords'>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="/img/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css">
    <link rel="stylesheet" href="/css/plugins/slidebars.css">
    <link rel="stylesheet" href="/css/tourist.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="/js/html5shiv.min.js"></script>
    <script src="/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="content" canvas="container" class="close-any" style="background-color: #E6EBF1;">
    <header class="container-fluid">
        <div class="btn btn-default toggle-left">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </div>
        <a class="logo" href="/">
            <img src="img/logo.png" alt="Motivator">
            <h1 class="text-uppercase text-right text-logo">Для туристов &ndash; это система, позволяющая экономить</h1>
        </a>
    </header>

    <?php echo $content; ?>

    <footer class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-xs-offset-0 col-sm-4 col-sm-offset-4 col-lg-3 col-lg-offset-0">
                <a class="logo" href="../index.html">
                    <img src="img/logo.png" alt="Motivator">
                    <h1 class="text-uppercase text-right text-logo visible-xs-inline-block">для туристов</h1>
                </a>
            </div>
            <div class="col-md-6" id="footer-menu">
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
                    'htmlOptions' => ['class' => 'nav navbar-nav', 'style' => 'margin-left: 55px;'],
                    'itemCssClass' => 'text-uppercase'
                )); ?>

            </div>
            <div class="col-md-3" id="creator"></div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 text-uppercase text-center" id="copyright">COPYRIGHT 2016  ©  2016  ЛАЗАРЕВ Д.А.  ВСЕ ПРАВА ЗАЩИЩЕНЫ.</div>
        </div>
    </footer>
</div>

<!-- Left Slidebar menu -->
<div off-canvas="sb-1 left reveal">
    <ul class="nav navbar-nav" id="side-menu">
        <li class="active"><a href="/index.html" class="text-uppercase text-center">Туристам</a></li>
        <li><a href="/turagentam/turagentam.html" class="text-uppercase text-center">Турагентам</a></li>
        <li><a href="/turoperatoram/turoperatoram.html" class="text-uppercase text-center">Туроператорам</a></li>
        <li><a href="/kontakty/contacts.html" class="text-uppercase text-center">Контакты</a></li>
    </ul>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <!-- BEGIN: ReCAPTCHA implementation. -->
            <div class="g-recaptcha" data-sitekey="6LfzgAoTAAAAAM1tzq2tBzRXBgy9HxWSN_BDqEGp"></div>
            <!-- END: ReCAPTCHA implementation. -->
            <div class="row text-center">
                <a class="btn btn-default btn-continue text-uppercase btn-continue"  data-dismiss="modal">Продолжить</a>
            </div>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<!--SlideBars plugin-->
<script src="js/slidebars.js" type="text/javascript"></script>

<!-- Main bxSlider -->
<script src="js/jquery.bxslider.min.js" type="text/javascript"></script>
<!--PriceFormat-->
<script src="js/price.format.js" type="text/javascript"></script>

<script data-main="js/app/main.js" src="js/app/vendor/requirejs/require.js"></script>

<!--Local settings-->
<script src="js/settings-tourist.js"></script>
</body>
</html>

