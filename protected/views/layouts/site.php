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
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/jquery/bootstrapValidator.min.css">
    <link rel="stylesheet" href="/css/plugins/slidebars.css">
    <link rel="stylesheet" href="/css/modules/tab.css">
    <link rel="stylesheet" href="/css/tourist.css?ver=1.0.3">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
</head>
<body>

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
            <img src="img/logo.png" alt="Motivator">
            <h1 class="text-uppercase text-right text-logo">Для туристов &ndash; это сервис, приносящий выгоду</h1>
        </a>
    </header>

    <?php echo $content; ?>

    <footer class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-xs-offset-0 col-sm-4 col-sm-offset-4 col-lg-3 col-lg-offset-0">
                <a class="logo" href="/">
                    <img src="img/logo.png" alt="Motivator">
                    
                </a>
            </div>
            <div class="col-md-6" id="footer-menu">
                <?php $this->widget('application\\components\\widgets\\MenuWidget', ['active' => 'turistam']); ?>
            </div>
            <div class="col-md-3" id="creator"></div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 text-uppercase text-center" id="copyright">COPYRIGHT 2016-<?php echo date('Y'); ?>  ©  2016-<?php echo date('Y'); ?>  ЛАЗАРЕВ Д.А.  ВСЕ ПРАВА ЗАЩИЩЕНЫ.</div>
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

<!--SlideBars plugin-->
<script src="js/slidebars.js" type="text/javascript"></script>

<!-- Main bxSlider -->
<script src="/js/jquery.bxslider.min.js" type="text/javascript"></script>
<script src="/js/settings-tourist.js" type="text/javascript"></script>

<script data-main="js/app/main.js" src="js/app/vendor/requirejs/require.js"></script>

<!--Local settings-->


<?php include_once('partials/ga.php'); ?>

</body>
</html>

