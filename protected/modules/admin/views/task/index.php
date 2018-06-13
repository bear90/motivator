<?php 
    use application\models\Entity;
?>

<?php if($message): ?>
    <div class="alert alert-success" role="alert"><?php echo $message; ?></div>
<?php endif; ?>
<?php if($error): ?>
    <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
<?php endif; ?>

<div class="row" id="code">
    <div class="col-md-12">
        <h3>Заявки</h3>
        
            <table class="table table-bordered text-table" id="tasks">
                <tr>
                    <th class="col1">Дата размещения заявки на тур/<br>
                     имя автора заявки/ <br>
                     порядковый номер заявки</th>
                    <th class="col2">Страна тура/<br>
                    вид тура/<br>
                    примерный бюджет</th>
                    <th class="col3">Количество взрослых туристов/ <br>
                    количество детей (возраст)</th>
                    <th class="col4">Продолжительность тура/ <br>
                    предполагаемая дата <br>
                    начала тура</th>
                    <th class="col5">Самое <br>выгодное<br> предложение</th>
                    <th>Операция</th>
                </tr>
                <?php foreach ($entities as $entity):?>
                <?php $model = new Entity\Task($entity);?>
                    <tr>
                        <td>
                            <?php echo $model->createdAt(); ?><br>
                            <?php echo $model->data()->relName->name; ?><br>
                            № <?php echo $model->data()->id; ?><br>
                        </td>

                        <td>
                            <?php echo implode('-', $model->getCountryOptions()); ?>/<br>
                            <?php echo $model->data()->relTourType->name; ?>/<br>
                            <?php if(0 && $model->data()->planPrice): ?>
                            <?php echo $model->data()->planPrice; ?>€
                            <?php endif; ?>
                        </td>
                        
                        <td>
                            Взрослых: <?php echo $model->data()->adultCount; ?> <br>
                            <?php if($model->data()->childCount): ?>
                                Детей:
                                <?php foreach($model->data()->childAges as $child):?>
                                    1 (<?php echo $child->age ?>
                                    <?php echo Yii::t('front', 'n==1#год|n<5#года|n>4#лет', $child->age) ?>
                                    ) <br>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </td>
                        
                        <td>
                            <?php echo $model->data()->days; ?>
                            <?php echo Yii::t('front', 'n==1#день|n<5#дня|n>4#дней', $model->data()->days) ?> /<br>
                            <?php echo $model->startedAt(); ?>
                        </td>
                        
                        <td>
                            <?php if($model->data()->generalPrice) : ?>
                                <div class="block"><?php echo ceil($model->data()->generalPrice); ?>€</div>
                            <?php endif; ?>

                            <?php if($model->data()->earlyPrice) : ?>
                                <div class="block">
                                    <i class="fa fa-snowflake-o" aria-hidden="true"></i>
                                    <?php echo ceil($model->data()->earlyPrice); ?>€
                                </div>
                            <?php endif; ?>

                            <?php if($model->data()->lastMinPrice) : ?>
                                <div class="block">
                                    <span class="glyphicon glyphicon-fire"></span>
                                    <?php echo ceil($model->data()->lastMinPrice); ?>€
                                </div>
                            <?php endif; ?>
                        </td>

                        <td>
                            <a href="<?php echo Yii::app()->createUrl("/admin/task/delete/{$entity->id}")?>" type="button" class="btn btn-danger btn-xs">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> удалить
                            </a>
                        </td>
                    </tr>
                <?php endforeach;?>
            </table>

    </div>
</div>
