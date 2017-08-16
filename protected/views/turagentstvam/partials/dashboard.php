<?php
    use application\models\Entity\Touragent;

    $user = \Yii::app()->user->getModel();
?>
<div class="dashboard">
    <h4>Рабочий кабинет турагентства <b><?php echo $user->touragent->name; ?></b></h4>
    
    <div class="row">
        <a href="#offers-stat" data-toggle="collapse">Количество размещённых предложений</a>
    </div>

    <div class="row block-stat collapse" id="offers-stat">
        <div class="col-md-6">Всего:</div>
        <div class="col-md-6 text-right"><?php echo Touragent\Repository::total($user->touragent->id); ?></div>
    </div>

    <div class="row">
        <a href="/#block-main-table">Перейти к таблице заявок на туры</a>
    </div>


</div>