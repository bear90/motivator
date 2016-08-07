<?php
    use application\models\Configuration;
?>

<h2>Туроператоры:</h2>
<?php if($message): ?>
    <div class="alert alert-success" role="alert"><?php echo $message; ?></div>
<?php endif; ?>

<?php if(count($entities)): ?>
<table class="table table-bordered text-table">
    <tr>
        <th>Название</th>
        <th>Операции</th>
    </tr>
    <?php foreach ($entities as $entity):?>
        <tr>
            <td><?php echo $entity->name; ?></td>

            <td>
                <a href="<?php echo Yii::app()->createUrl("/admin/touroperator/edit/{$entity->id}")?>" type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> редактировать
                </a>
                <a href="<?php echo Yii::app()->createUrl("/admin/touroperator/delete/{$entity->id}")?>" type="button" class="btn btn-danger" onclick="return confirm('Вы уверены?');">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> удалить
                </a>
            </td>
        </tr>
    <?php endforeach;?>
</table>
<?php else: ?>
    <p>Нет записей</p>
<?php endif; ?>


<a href="<?php echo Yii::app()->createUrl("/admin/touroperator/add/")?>" type="button" class="btn btn-default">
    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> добавить
</a>