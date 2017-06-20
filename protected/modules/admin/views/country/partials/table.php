<table class="table table-bordered text-table">
    <tr>
        <th>Имя</th>
        <th>Операция</th>
    </tr>
    <?php foreach ($entities as $entity):?>
        <tr>
            <td><?php echo $entity->name; ?></td>

            <td>
                <a href="<?php echo Yii::app()->createUrl("/admin/country/edit/{$entity->id}")?>" type="button" class="btn btn-default btn-xs">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> редактировать
                </a>
                <a href="<?php echo Yii::app()->createUrl("/admin/country/delete/{$entity->id}")?>" type="button" class="btn btn-danger btn-xs">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> удалить
                </a>
            </td>
        </tr>
    <?php endforeach;?>
</table>


<?php echo $form->renderBegin(); ?>
    <?php echo $form['type']; ?>

    <div class="form-group">
        <?php echo $form['name']; ?>
    </div>

    <button type="submit" class="btn btn-default btn-xs">Добавить</button>

<?php echo $form->renderEnd(); ?>
