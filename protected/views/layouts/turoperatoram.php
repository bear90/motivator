<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Удобный поиск туристам, прямой канал активных продаж турагентствам</title>
    <meta content="Покупатели туров бесплатно размещают заявки. Турагентства, размещают  лучшие, чем у конкурентов, предложения. Туристы покупают выбранные туры  у турагентств" name='description'>
    <meta content="тур поиск, подбор тура, купить тур, путевка, горящий тур,  дешево, все включено, тур из Минска цены, дешевый тур, тур сайты Минска, экскурсионный тур, стоимость  тур, куда поехать, шоп тур, тур на выходные" name='keywords'>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="/img/favicon.ico">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/jquery/bootstrapValidator.min.css">
    <link rel="stylesheet" href="css/plugins/slidebars.css">
    <link rel="stylesheet" href="/css/modules/tab.css">
    <link rel="stylesheet" href="css/tourist.css">
    <link rel="stylesheet" href="css/contacts.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body class="turoperatoram">

<?php if (!empty(\Yii::app()->params['testSite'])): ?>
<h1>Тестовый сайт</h1>
<?php endif; ?>

    <div class="content" canvas="container" class="close-any">
        <header class="container-fluid">
            <div class="btn btn-default toggle-left">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </div>
            <a class="logo" href="/">
                <h1 class="text-right text-logo"><span>П<span>ортал</span><i>penki.by</i></span></h1>
            </a>
        </header>

        <?php echo $content; ?>

        <footer class="container-fluid">
            <div class="row">
            
                <div class="col-xs-12 col-xs-offset-0 col-sm-4 col-sm-offset-4 col-lg-3 col-lg-offset-0">
                    <a class="logo" href="/">
                        <h2 class="text-right text-logo"><span>П<span>роект</span><i>penki.by</i></span></h2>
                    </a>
                </div>

                <div class="col-md-6" id="footer-menu">
                    <?php $this->widget('application\\components\\widgets\\MenuWidget', [
                        'active' => 'turoperatoram'
                    ]); ?>
                </div>

                <div class="col-md-3" id="creator">
                  
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 text-uppercase text-center" id="copyright">COPYRIGHT 2016-<?php echo date('Y'); ?> © 2016-<?php echo date('Y'); ?> ШАБЛОВСКИЙ И.Б. ВСЕ ПРАВА ЗАЩИЩЕНЫ.</div>
            </div>
        </footer>
    </div>


    <!-- Left Slidebar menu -->
    <div off-canvas="sb-1 left reveal">
            <?php $this->widget('application\\components\\widgets\\MenuWidget', [
                'active' => 'turoperatoram',
                'htmlOptions' => [
                    'id' => 'side-menu'
                ]
            ]); ?>
    </div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/js/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrapValidator.min.js" type="text/javascript"></script>
    <!--SlideBars plugin-->
    <script src="js/slidebars.js" type="text/javascript"></script>

    <!-- Main bxSlider -->
    <script src="js/jquery.bxslider.min.js" type="text/javascript"></script>
    <!--Local settings-->
    <script src="js/settings-tourist.js"></script>

    <script data-main="js/app/main.js" src="js/app/vendor/requirejs/require.js"></script>

    <?php include_once('partials/ga.php'); ?>

</body>
</html>
