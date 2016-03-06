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
    <link rel="stylesheet" href="/css/jquery-ui.min.css">
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
            <div class="lk-block ">
                <span>ЛИЧНЫЙ КАБИНЕТ <b>№<?php echo Yii::app()->user->model->tourist->id; ?></b></span>
            </div>
        </header>

        <?php echo $content; ?>

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
    <script src="/js/settings-contacts.js"></script>

    <script data-main="/js/app/main.js" src="/js/app/vendor/requirejs/require.js"></script>

    <!--Local settings-->
    <script src="/js/settings-tourist.js"></script>

</body>
</html>