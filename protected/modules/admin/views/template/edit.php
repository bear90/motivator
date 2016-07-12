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
<form action="" method="post">
    
    <h2><?php echo $template->comment; ?></h2>

    <div class="form-group">
        <?php echo CHtml::textField("Template[comment]", $template->comment, ['class' => 'form-control']); ?>
    </div>
    
    <div class="form-group">
        <?php echo CHtml::textArea("Template[content]", $template->content, ['class' => 'tiny-text hidden']); ?>
    </div>
    
    <button class="btn btn-primary" type="submit">Сохранить</button>
    <a class="btn btn-default" href="<?php echo Yii::app()->createUrl('/admin/template')?>" >Отмена</a>
</form>