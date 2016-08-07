<?php
    //use application\models\Configuration;
?>

<h2>Менеджеры турагента <?php echo $touragent->name; ?>:</h2>
<?php if($message): ?>
    <div class="alert alert-success" role="alert"><?php echo $message; ?></div>
<?php endif; ?>

<?php if(count($entities)): ?>
<table class="table table-bordered text-table">
    <tr>
        <th>Название</th>
        <th>Руководитель</th>
        <th class="actions">Операции</th>
    </tr>
    <?php foreach ($entities as $entity):?>
        <tr>
            <td><?php echo $entity->name; ?></td>
            <td>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" disabled="true" <?php if($entity->boss): ?> checked="true"<?php endif; ?> />
                    </label>
                </div>
            </td>

            <td>
                <a href="<?php echo Yii::app()->createUrl("/admin/touragent/edit-manager/{$entity->id}")?>" type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> редактировать
                </a>

                <a href="<?php echo Yii::app()->createUrl("/admin/touragent/delete-manager/{$entity->id}")?>" type="button" class="btn btn-danger" onclick="return confirm('Вы уверены?');">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> удалить
                </a>
            </td>
        </tr>
    <?php endforeach;?>
</table>
<?php else: ?>
    <p>Нет записей</p>
<?php endif; ?>


<a href="<?php echo Yii::app()->createUrl("/admin/touragent/add-manager/{$touragent->id}")?>" type="button" class="btn btn-default">
    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> добавить менеджера
</a>