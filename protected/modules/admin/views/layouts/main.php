<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    
    <title>Мотиватор - Диспетчерская</title>
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/jquery-ui.min.css">
</head>
<body>

<?php if (!empty(\Yii::app()->params['testSite'])): ?>
<h1>Тестовый сайт</h1>
<?php endif; ?>

    <div class="container-fluid">
        <aside>
            <?php $this->widget('zii.widgets.CMenu',array(
                'items' => $this->getMenu(),
                'htmlOptions' => ['class' => 'nav nav-pills nav-stacked'],
                //'itemCssClass' => 'text-uppercase',
            )); ?>
        </aside>
        <section data-structure="<?php echo $this->jsModule?>"><?php echo $content; ?></section>

    </div>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/js/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="/js/bootstrap.min.js"></script>
    <script data-main="/js/app/admin.js" src="/js/app/vendor/requirejs/require.js"></script>
</body>
