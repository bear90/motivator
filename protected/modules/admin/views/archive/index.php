

<h2>Архив абонентов:</h2>

<?php if(count($entities)): ?>
<table class="table table-bordered text-table">
    <tr>
        <th>ФИО</th>
        <th>Email</th>
        <th>Телефон</th>
        <th>ТА</th>
        <th>ТО</th>
        <th>Дата продажи</th>
        <th>Стоимость</th>
        <th>МВАС</th>
        <th>НАС</th>
        <th>СзП</th>
    </tr>
    <?php foreach ($entities as $entity):?>
        <tr>
            <td><?php echo $entity->fullName; ?></td>
            <td><?php echo $entity->email; ?></td>
            <td><?php echo $entity->phone; ?></td>
            <td><?php echo $entity->tour->touragent->name; ?></td>
            <td><?php echo $entity->tour->operator ? $entity->tour->operator->name : ''; ?></td>
            <td><?php echo $entity->tour->getSoldAt('d.m.Y'); ?></td>
            <td><?php echo $entity->tour->price; ?></td>
            <td><?php echo $entity->tour->maxDiscont; ?></td>
            <td><?php echo $entity->abonentDiscont; ?></td>
            <td><?php echo $entity->partnerDiscont; ?></td>
            
        </tr>
    <?php endforeach;?>
</table>
<?php else: ?>
    <p>Нет туристов в статусе "Обладатель скидки"</p>
<?php endif; ?>


<a href="<?php echo Yii::app()->createUrl("/admin/archive/export/")?>" type="button" class="btn btn-default" target="_blank">
    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Экспорт в Excel
</a>