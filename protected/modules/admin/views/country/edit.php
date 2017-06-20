<?php
/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       17.06.2016
 * @package
 * @copyright   Copyright (c) 2015-2016 soXes GmBh.
 *
 */
?>
<?php echo $form->renderBegin(); ?>
    
    <h2>Изменение имени "<?php echo $entity->name?>"</h2>

    <?php echo $form['type']; ?>

    <div class="form-group">
        <?php echo $form['name']; ?>
    </div>
    
    <button class="btn btn-primary" type="submit">Сохранить</button>
    <a class="btn btn-default" href="<?php echo Yii::app()->createUrl('/admin/name')?>" >Отмена</a>

<?php echo $form->renderEnd(); ?>