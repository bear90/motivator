<?php
    use application\models\Entity\Touragent;

    $user = \Yii::app()->user->getModel();
    $filterForm->getModel()->touragentId = \Yii::app()->user->model->touragent->id; 
?>
<div class="dashboard">
    <h4>Рабочий кабинет турагентства <b><?php echo $user->touragent->name; ?></b></h4>
    
    <div class="row">
        <a href="#offers-stat" data-toggle="collapse">Количество размещённых предложений</a>
    </div>

    <div class="row block-stat collapse" id="offers-stat">
        <?php echo $filterForm->renderBegin(); ?>
            <?php echo $filterForm['touragentId']; ?> 

            <div class="row">
                <div class="col-md-6">Всего:</div>
                <div class="col-md-6"><?php echo Touragent\Repository::total($user->touragent->id); ?></div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        За период 
                    </div>
                    <div class="form-group">
                        <?php echo $filterForm['from']; ?> 
                    </div>

                    <div class="form-group">
                        <?php echo $filterForm['to']; ?>
                    </div>

                    <button type="button" class="btn btn-small find">Показать</button>
                    <button type="button" class="btn btn-small reset">Очистить</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ajax"><!-- --></div>
            </div>
        <?php echo $filterForm->renderEnd(); ?>
    </div>

    <div class="row">
        <a href="/#block-main-table">Перейти к таблице заявок на туры</a>
    </div>


</div>