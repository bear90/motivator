<?php
  use application\models\defines\TouristStatus;
?>
<?php if(0 && $tourist->statusId > TouristStatus::WANT_DISCONT &&
         $manager !== null &&
         $tourist->tour->managerId == $manager->id): ?>
    <div class="top clearfix <?php echo $tourist->getCounterDate() === null ? 'pulse' : ''; ?>">
        <div class="inner-block">
           <h4 class="<?php echo $tourist->getCounterDate() === null ? 'hidden' : ''; ?>">
                <?php echo Yii::t('front', 'l-conter-title-' . $tourist->counterReason); ?>
           </h4>
           <button type="button" class="btn btn-default btn-green2 reason-list">Выбрать повод пуска счётчика</button>
           <ul class="custom-list hidden">
               <li><a href="#" data-id="1">Внесение аванса</a></li>
               <!-- <li><a href="#" data-id="2">Подача документов</a></li> -->
               <li><a href="#" data-id="3">Оплата тура</a></li>
               <li><a href="#" data-id="4">Окончание тура</a></li>
           </ul>
        </div>
        <div class="inner-block">
           <div class="countdown-time clearfix" data-date="<?php echo $tourist->getCounterDate() ?: 0; ?>"></div>
        </div>
    </div>

    <div class="bottom-inner-block clearfix <?php echo $tourist->getCounterDate() === null ? 'hidden' : ''; ?>">
        <?php echo CHtml::beginForm('/user/settimer/' . $tourist->id, 'post', ['class' => 'counterForm']); ?>
        <?php echo CHtml::hiddenField('counterReason'); ?>
        <div class="inner-block form-group">
            <label><?php echo Yii::t('front', 'l-conter-date-' . $tourist->counterReason); ?></label>
            <?php echo CHtml::textField("counterDate", $tourist->getCounterDate('d.m.Y')); ?>
        </div>
        <?php echo CHtml::endForm(); ?>
    </div>
    
<?php else: ?>

    <div class="top clearfix">
        <div class="inner-block">
           <h4><?php echo Yii::t('front', 'l-conter-title-' . $tourist->counterReason); ?></h4>
        </div>
        <div class="inner-block">
           <div class="countdown-time clearfix" data-date="<?php echo $tourist->getCounterDate() ?: 0; ?>"></div>
        </div>
    </div>

    <div class="bottom-inner-block">
        <?php if($tourist->getCounterDate()): ?>
        <h4>
            <?php echo Yii::t('front', 'l-conter-date-' . $tourist->counterReason); ?> 
            <b><?php echo $tourist->getCounterDate('d.m.Y'); ?></b>
        </h4>
        <?php endif; ?>
    </div>

<?php endif; ?>