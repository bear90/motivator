<?php
    $link = Yii::app()->createUrl('user/dashboard/' . $tour->tourist->id);
?>
<div class="inner-block item" data-id="<?php echo $tour->id; ?>">
    <form action="<?php echo $link; ?>" class="clearfix">
        <?php echo CHtml::hiddenField('tab', 'tab1'); ?>
        <h4>Новый клиент: <?php echo $tour->tourist->getFullName(); ?></h4>
        <div class="form-block">
            <label>Пожелания к туру:</label>
            <input type="text" value="<?php echo $tour->wishes; ?>" readonly="true">
        </div>
        <input type="submit" value="ВОЙTИ В КАБИНЕT">
    </form>
</div>