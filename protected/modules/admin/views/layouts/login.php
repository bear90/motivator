<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Портал penki.by– Диспетчерская</title>
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>

<?php if (!empty(\Yii::app()->params['testSite'])): ?>
<h1>Тестовый сайт</h1>
<?php endif; ?>

<div class="container-fluid">
    <?php echo $content; ?>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/js/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="/js/bootstrap.min.js"></script>
</body>
