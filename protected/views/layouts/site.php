<?php
/**
 * @author soza.mihail@gmail.com
 */
use application\modules\admin\models\Text;
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Бесплатные заявки Предложения разных турагентств в одном месте</title>
    <meta name="Keywords" content="Тур из Минска, на море, в Египет, Турция, Кипр, Болгария, Грузия, Греция, Таиланд, Бали, Испания, Италия, Львов, автобусные туры из Минска, тур выходного дня, горящие туры, туры  по Европе, купить недорогой тур, тур в Санкт-Петербург, отдых тур">
    <meta name='description' content="Заполни заявку-жди  выгодного предложения  по лучшей цене от конкурирующих турагентств. Экономия времени  на поиск тура. Удобство поиска">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="/img/favicon.ico">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/jquery/bootstrapValidator.min.css">
    <link rel="stylesheet" href="/css/plugins/slidebars.css">
    <link rel="stylesheet" href="/css/modules/tab.css">
    <link rel="stylesheet" href="/css/tourist.css?ver=1.0.9">
    <link rel="stylesheet" href="/css/jquery.ui/jquery-ui.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body class="turistam">

<?php if (!empty(\Yii::app()->params['testSite'])): ?>
<h1>Тестовый сайт</h1>
<?php endif; ?>

<div class="content" canvas="container" class="close-any" style="background-color: #E6EBF1;">
    <header class="container-fluid">
        <div class="btn btn-default toggle-left">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </div>
        <a class="logo" href="/">
            <h1 class="text-right text-logo"><span>П<span>ортал</span><i>penki.by</i></span></h1>
        </a> 
        <div class="slogan"><?php echo Text::get('top-slogan'); ?></div>
    </header>

    <?php echo $content; ?>

    <footer class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-xs-offset-0 col-sm-4 col-sm-offset-4 col-lg-3 col-lg-offset-0">
                <a class="logo" href="/">
                    <h2 class="text-right text-logo">
                        <span>П<span>роект</span><i>penki.by</i></span>
                    </h2>
                </a>
            </div>
            <div class="col-md-6" id="footer-menu">
                <?php $this->widget('application\\components\\widgets\\MenuWidget', ['active' => 'turistam']); ?>
            </div>
            <div class="col-md-3" id="creator"></div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 text-uppercase text-center" id="copyright">COPYRIGHT 2016-<?php echo date('Y'); ?>  ©  2016-<?php echo date('Y'); ?>  ШАБЛОВСКИЙ И.Б.  ВСЕ ПРАВА ЗАЩИЩЕНЫ.</div>
        </div>
    </footer>
</div>

<!-- Left Slidebar menu -->
<div off-canvas="sb-1 left reveal">
    <?php $this->widget('application\\components\\widgets\\MenuWidget', [
        'active' => 'turistam',
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
    <script src="js/settings-contacts.js"></script>

    <!--Local settings-->
    <script src="js/settings-tourist.js"></script>

    <script data-main="js/app/main.js?ver=1.0.27" src="js/app/vendor/requirejs/require.js"></script>


<!--Local settings-->


<?php include_once('partials/ga.php'); ?>

</body>
</html>

