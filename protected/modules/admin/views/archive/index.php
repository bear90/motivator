

<h2>Архив абонентов:</h2>

<?php if(count($entities)): ?>
<table class="table table-bordered text-table">
    <tr>
        <th>Турист</th>
        <th>ТА</th>
        <th>ТО</th>
        <th>Дата продажи</th>
        <th>Информация о туре</th>
    </tr>
    <?php foreach ($entities as $entity):?>
        <tr>
            <td>
                <div><b>ФИО:</b> <?php echo $entity->fullName; ?></div>
                <div><b>Email:</b> <?php echo $entity->email; ?></div>
                <div><b>Телефон:</b> <?php echo $entity->phone; ?></div>
            </td>
            <td>
                <?php echo $entity->tour->touragent->name; ?>
                <div><b>Менеджер:</b> <?php echo $entity->getManager()->name; ?></div>
            </td>
            <td><?php echo $entity->tour->operator ? $entity->tour->operator->name : ''; ?></td>
            <td><?php echo $entity->tour->getSoldAt('d.m.Y'); ?></td>
            <td>
                <div><b>Стоимость:</b> <?php echo $entity->tour->price; ?></div>
                <div><b>Предоплата:</b> <?php echo $entity->tour->prepayment; ?></div>
                <div><b>Доплата за тур:</b> <?php echo $entity->tour->getCurrentSurchange(); ?></div>
                <div><b>МВАС:</b> <?php echo $entity->tour->maxDiscont; ?></div>
                <div><b>НАС:</b> <?php echo $entity->abonentDiscont; ?></div>
                <div><b>СзП:</b> <?php echo $entity->partnerDiscont; ?></div>
                <div><b>Период тура:</b> 
                    <?php echo Yii::app()->dateFormatter->format('dd.MM.yyyy', $entity->tour->startDate); ?> -
                    <?php echo Yii::app()->dateFormatter->format('dd.MM.yyyy', $entity->tour->endDate); ?>
                </div>
            </td>
            
        </tr>
    <?php endforeach;?>
</table>
<?php else: ?>
    <p>Нет туристов в статусе "Обладатель скидки"</p>
<?php endif; ?>


<a href="<?php echo Yii::app()->createUrl("/admin/archive/export/")?>" type="button" class="btn btn-default" target="_blank">
    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Экспорт в Excel
</a>