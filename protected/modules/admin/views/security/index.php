
<?php if($message): ?>
    <div class="alert alert-success" role="alert"><?php echo $message; ?></div>
<?php endif; ?>
<?php if($error): ?>
    <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
<?php endif; ?>

<div class="row" id="password">
    <div class="col-md-6">
        <h3>Пароли</h3>
        
        <?php echo $form->renderBegin(); ?>
            <table class="table table-bordered text-table">
                <tr>
                    <th><!-- --></th>
                    <th>Пароль</th>
                    <th>Операция</th>
                </tr>
                <?php foreach ($entities as $entity):?>
                    <tr>
                        <td></td>
                        <td><?php echo $entity->password; ?></td>

                        <td>
                            <a href="<?php echo Yii::app()->createUrl("/admin/security/delete/{$entity->id}")?>" type="button" class="btn btn-danger btn-xs">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> удалить
                            </a>
                        </td>
                    </tr>
                <?php endforeach;?>
            </table>

            <div class="form-group">
                <button type="submit" class="btn btn-default btn-xs">Удалить</button>

                <button type="submit" class="btn btn-default btn-xs">Просмотреть</button>
            </div>

        <?php echo $form->renderEnd(); ?>


        <?php echo $form->renderBegin(); ?>
            
            <?php echo $form['action']; ?>

            <div class="form-group">
                <?php echo $form['count']; ?>
            </div>

            <button type="submit" class="btn btn-default btn-xs">Сгенерировать</button>

        <?php echo $form->renderEnd(); ?>


    </div>
</div>
