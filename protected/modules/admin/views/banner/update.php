<?php
/**
 * @var CForm $form
 * @var \application\models\BannerSite $entity
 */
    CHtml::$errorCss = 'help-block';
    $form->action = Yii::app()->createUrl('/admin/banner/update/' . $entity->id);
?>
<h3>Рекламный блок `<?php echo $entity->name; ?>`</h3>

<?php echo $form->renderBegin(); ?>
    <div class="form-group">
        <?php echo $form['name']; ?>
    </div>
<div class="form-group">
    <button type="submit" class="btn btn-default">Изменить</button>
</div>
<?php echo $form->renderEnd(); ?>