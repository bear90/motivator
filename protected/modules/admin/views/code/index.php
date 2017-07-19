
<?php if($message): ?>
    <div class="alert alert-success" role="alert"><?php echo $message; ?></div>
<?php endif; ?>
<?php if($error): ?>
    <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
<?php endif; ?>

<div class="row" id="code">
    <div class="col-md-6">
        <h3>Коды</h3>
        
        <?php echo $form->renderBegin(); ?>

            <?php echo $form['action']; ?>

            <table class="table table-bordered text-table">
                <tr>
                    <th><!-- --></th>
                    <th>Код</th>
                    <th>Время жизни</th>
                    <th>Операция</th>
                </tr>
                <?php foreach ($entities as $entity):?>
                    <tr>
                        <td>
                            <?php echo CHtml::checkBox('code[]', false, ['value' => $entity->id]); ?>
                        </td>
                        <td><?php echo $entity->code; ?></td>
                        <td>
                        <?php echo $entity->expiredAt != '0000-00-00 00:00:00' 
                            ? (new \DateTime($entity->expiredAt))->format('d.m.Y') 
                            : '-'; ?>
                        </td>

                        <td>
                            <a href="<?php echo Yii::app()->createUrl("/admin/code/delete/{$entity->id}")?>" type="button" class="btn btn-danger btn-xs">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> удалить
                            </a>
                        </td>
                    </tr>
                <?php endforeach;?>
            </table>

            <div class="form-group">
                <button type="button" class="btn btn-default btn-xs delete">Удалить</button>

                <button type="button" class="btn btn-default btn-xs view">Просмотреть</button>
            </div>

        <?php echo $form->renderEnd(); ?>


        <?php echo $generateForm->renderBegin(); ?>
            
            <?php echo $generateForm['action']; ?>

            <div class="form-group">
                <?php echo $generateForm['count']; ?>
            </div>

            <button type="submit" class="btn btn-default btn-xs">Сгенерировать</button>

        <?php echo $generateForm->renderEnd(); ?>


    </div>
</div>
