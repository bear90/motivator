
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

            <div class="checkbox">
                <label>
                    <?php echo $form['showall']; ?> Показать скрытые
                </label>
            </div>

            <?php echo $form['action']; ?>

            <table class="table table-bordered text-table" id="codes">
                <tr>
                    <th><!-- --></th>
                    <th>Код</th>
                    <th>Статус</th>
                    <th>Время жизни</th>
                    <th>Операция</th>
                </tr>
                <?php foreach ($entities as $entity):?>
                    <tr>
                        <td>
                            <?php echo CHtml::checkBox('code[]', false, ['value' => $entity->id]); ?>
                        </td>
                        <td><?php echo $entity->code; ?></td>
                        <td class="status">
                            <?php if($entity->deleted): ?>
                                <span class="glyphicon glyphicon-remove" aria-hidden="true" title="Использованный"></span>
                            <?php else: ?>
                                <span class="glyphicon glyphicon-ok" aria-hidden="true" title="Активный"></span>
                            <?php endif; ?>

                            <?php if($entity->hidden): ?>
                                <span class="glyphicon glyphicon-eye-close" aria-hidden="true" title="Скрыт"></span>
                            <?php else: ?>
                                <span class="glyphicon glyphicon-eye-open" aria-hidden="true" title="Не скрыт"></span>
                            <?php endif; ?>
                        </td>
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

                <button type="button" class="btn btn-default btn-xs not-show">Скрыть</button>

                <?php if($form->getModel()->showall): ?>
                    <button type="button" class="btn btn-default btn-xs not-hide">Показать</button>
                <?php else: ?>    
                    <button type="button" class="btn btn-default btn-xs not-hide" disabled="">Показать</button>
                <?php endif; ?>
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
