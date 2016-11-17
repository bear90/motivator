<?php

    $isReportDisabled = count($entities) == 0 || empty($filter['start']) || empty($filter['end']);
?>

<h2>Абонентов:</h2>

<?php echo CHtml::form('/admin/post', 'get', ['class' => 'filter']); ?>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Начальная дата отчётного периода</label>
                <?php echo CHtml::textField('filter[start]', $filter['start'], [
                    'id' => 'startDate',
                    'class' => 'form-control date'
                ]); ?>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Конечная  дата отчётного периода</label>
                <?php echo CHtml::textField('filter[end]', $filter['end'], [
                    'id' => 'endDate',
                    'class' => 'form-control date'
                ]); ?>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-default">Найти</button>

                <a href="<?php echo Yii::app()->createUrl("admin/post/report", ['filter' => $filter]); ?>"
                    <?php if ($isReportDisabled): ?>disabled="disabled"<?php endif; ?>
                    class="btn btn-default" target="_blank">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Экспортировать
                </a>
                
            </div>
        </div>
    </div>
<?php echo CHtml::endForm(); ?>

<?php if(count($entities)): ?>

<table class="table table-bordered admin-table">
    <tr>
        <th>Номер</th>
        <th>ФИО</th>
        <th>Телефон</th>
        <th>Email</th>
        <th>Статус</th>
    </tr>
    <?php foreach ($entities as $i => $entity):?>
        <tr>
            <td><?php echo $i+1; ?></td>
            <td><?php echo $entity->fullName; ?></td>
            <td><?php echo $entity->phone; ?></td>
            <td><?php echo $entity->email; ?></td>
            <td><?php echo $entity->status->description; ?></td>
        </tr>
    <?php endforeach;?>
</table>
<?php else: ?>
    <p>Нет туристов</p>
<?php endif; ?>