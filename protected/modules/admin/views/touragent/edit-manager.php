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
<?php CHtml::$errorCss = 'help-block'; ?>

<?php echo $form->renderBegin(); ?>
    
    <h2>Редактирование менеджера</h2>

    <div class="form-group">
        <?php echo $form['name']; ?>
    </div>

    <div class="form-group">
        <div class="checkbox">
            <label><?php echo $form['boss']; ?> Руководитель</label>
        </div>
    </div>

    

    <div class="form-group">
        <?php echo $form['description']; ?>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-default">Сохранить</button>
        <a class="btn btn-default" href="<?php echo Yii::app()->createUrl("/admin/touragent/manager/{$touragent->id}")?>" >Отмена</a>
    </div>
<?php echo $form->renderEnd(); ?>