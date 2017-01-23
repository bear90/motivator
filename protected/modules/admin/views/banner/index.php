<?php
/**
 * @var CForm $form
 * @var CForm $formBanner
 * @var string $error
 * @var \application\models\BannerSite[] $entities
 */
    CHtml::$errorCss = 'help-block';
?>
<h3>Рекламный блок</h3>

<?php if($message): ?>
    <div class="alert alert-success" role="alert"><?php echo $message; ?></div>
<?php endif; ?>
<?php if($error): ?>
    <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
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
            <td>
                <a href="<?php echo Yii::app()->createUrl("admin/banner/delete/{$entity->id}"); ?>"
                   onclick="return confirm('Вы уверены что хотите удалить блок?')">Удалить</a><br>
                <a href="<?php echo Yii::app()->createUrl("admin/banner/update/{$entity->id}"); ?>">Изменить</a><br>
                <a href="<?php echo Yii::app()->createUrl("admin/banner/upload/{$entity->id}"); ?>"
                   class="upload-image">Добавить изображение</a><br>
            </td>
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


<?php echo $formBanner->renderBegin(); ?>
<?php echo $formBanner['banner']; ?>
<?php echo $formBanner->renderEnd(); ?>
