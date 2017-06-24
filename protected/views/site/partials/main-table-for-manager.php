<?php
    use application\models\Entity;
?>

<table class="table table-bordered main-table filtered">
    <tr>
        <th class="col1">Дата размещения заявки на тур/<br>
         имя автора заявки/ <br>
         порядковый номер заявки</th>
        <th class="col2">Страна тура/<br>
        вид тура</th>
        <th class="col3">Количество взрослых туристов/ <br>
        количество детей (возраст)</th>
        <th class="col4">Продолжительность тура/ <br>
        предполагаемая дата <br>
        начала тура</th>
        <th class="col5">Самое <br>выгодное<br> предложение</th>
    </tr>
    <?php foreach($entities as $entity):
        $model = new Entity\Task($entity);
    ?>
    <tr>
        <td><?php echo $model->createdAt(); ?><br>
            <?php echo $model->data()->relName->name; ?><br>
            № <?php echo $model->data()->id; ?><br>
            <a href="#" class="more">подробнее</a><br>
            <button type="button" class="btn btn-default btn-green">Разместить предложение</button>
        </td>
        <td><?php echo implode('-', $model->getCountryOptions()); ?>/<br>
            <?php echo $model->data()->relTourType->name; ?></td>
        <td>
            Взрослых: <?php echo $model->data()->adultCount; ?> <br>
            <?php if($model->data()->childCount): ?>
                Детей:
                <?php foreach($model->data()->childAges as $child):?>
                    1 (<?php echo $child->age ?> 
                    <?php echo Yii::t('front', 'n==1#год|n<5#года|n>4#лет', $child->age) ?>
                    ), <br>
                <?php endforeach; ?>
            <?php endif; ?>
        </td>
        <td>
            <?php echo $model->data()->days; ?> 
            <?php echo Yii::t('front', 'n==1#день|n<5#дня|n>4#дней', $model->data()->days) ?> /<br> 
            <?php echo $model->startedAt(); ?>
        </td>
        <td>
            <div class="block"><i class="fa fa-snowflake-o" aria-hidden="true"></i>490€</div>
        </td>
    </tr>
    <?php endforeach;?>
</table>