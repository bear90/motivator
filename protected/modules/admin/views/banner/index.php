<?php
/**
 * @var CForm $form
 * @var \application\models\BannerSite[] $entities
 */
    CHtml::$errorCss = 'help-block';
?>
<h3>Рекламный блок</h3>

<?php if($message): ?>
    <div class="alert alert-success" role="alert"><?php echo $message; ?></div>
<?php endif; ?>

<?php if (count($entities)):?>
    <table class="table table-bordered">
        <tr>
            <th>Название блока</th>
            <th class="col-md-2">Действия</th>
        </tr>
        <?php foreach ($entities as $entity): ?>
        <tr>
            <td><?php echo $entity->name; ?> (<?php echo $entity->width; ?>x<?php echo $entity->height; ?>)</td>
            <td></td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>Нет рекламных блоков</p>
<?php endif; ?>



<?php echo $form->renderBegin(); ?>
    <div class="form-group">
        <?php echo $form['name']; ?>
    </div>
    <div class="form-group">
        <?php echo $form['width']; ?>
    </div>
    <div class="form-group">
        <?php echo $form['height']; ?>
    </div>
<div class="form-group">
    <button type="submit" class="btn btn-default">Добавить</button>
</div>
<?php echo $form->renderEnd(); ?>