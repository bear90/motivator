<?php
    use application\models\Entity;
    use application\modules\admin\models\Text;
?>

<table id="all-tasks" class="table table-bordered main-table 
    <?php echo $filtered ? 'filtered' : '' ?>">
    <tr>
        <th class="col1">Порядковый номер заявки на тур/<br>
         дата размещения заявки/ <br>
         имя автора заявки</th>

        <th class="col2">Страна тура/<br>
        подробнее о туре<!--/<br>
         примерный бюджет --></th>

        <th class="col3">Количество взрослых туристов/ <br>
        количество детей (возраст)</th>

        <th class="col4">Предполагаемая<br>
        продолжительность тура/<br>
        планируемая дата начала тура</th>
        
        <th class="col5">Самое <br>выгодное<br> предложение</th>
    </tr>

    <?php if (count($entities)): ?>
        <?php foreach($entities as $entity):
        $model = new Entity\Task($entity);
        ?>
    <tr id="task_<?php echo $model->data()->id; ?>">
            <td>
                № <?php echo $model->data()->id; ?><br>
                <?php echo $model->createdAt(); ?><br>
                <?php echo $model->data()->relName->name; ?><br>
                <noindex><?php echo $model->data()->email; ?></noindex><br>
                <a href="#" class="offers-link">подробнее</a><br>
            </td>

            <td>
                <?php echo implode(' или ', $model->getCountryOptions()); ?>/<br>
                <a href="#" class="tour-description-link">Подробнее о туре</a>

                <div class="tour-description hidden">
                    <?php echo $model->data()->relTourType->name; ?>/<br>
                    <?php if($model->data()->description): ?>
                    <?php echo $model->data()->description; ?>
                    <?php endif;?>
                    <?php /*if($model->data()->planPrice): ?>
                    <?php echo $model->data()->planPrice; ?>$
                    <?php endif; */?>
                </div>
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
                    <div class="block"><?php echo ceil($model->data()->generalPrice); ?>$</div>
                <?php endif; ?>

                <?php if($model->data()->earlyPrice) : ?>
                    <div class="block">
                        <i class="fa fa-snowflake-o" aria-hidden="true"></i>
                        <?php echo ceil($model->data()->earlyPrice); ?>$
                    </div>
                <?php endif; ?>

                <?php if($model->data()->lastMinPrice) : ?>
                    <div class="block">
                        <span class="glyphicon glyphicon-fire"></span>
                        <?php echo ceil($model->data()->lastMinPrice); ?>$
                    </div>
                <?php endif; ?>
            </td>
        </tr>

        <tr class="offers-row hidden">
            <td colspan="5">
                <?php if (count($entity->offers)) : ?>
                    <?php $this->renderPartial('partials/offer-list', [
                        'offers' => $entity->offers,
                        'taskId' => $model->data()->id,
                        'showContact' => true
                    ])?>
                <?php else: ?>
                    <div class="text-center">
                        <?php echo Text::get('empty-offers'); ?>
                    </div>
                <?php endif; ?>
            </td>
        </tr>

        <?php if ($model->data()->id == $createdTaskId): ?>
        <tr>
            <td colspan="5">
                <b class="green"><?php echo Text::get('sent-email-message'); ?></b>
            </td>
        </tr>
        <?php endif;?>
        
        <?php endforeach;?>
    <?php else:?>
        <tr>
            <td colspan="5">
                Заявки с данными параметрами выбора отсутствуют!
            </td>
        </tr>
    <?php endif;?>
</table>
