<?php if($tourist->statusId == \application\models\defines\TouristStatus::WANT_DISCONT):?>

<div class="top clearfix">
    <div class="inner-block">
       <h4>До окончания срока внесения предоплаты осталось:</h4>
    </div>
    <div class="inner-block">
       <div class="countdown-time clearfix" data-date="<?php echo $tourist->getTimer1(); ?>"></div>
    </div>
</div>

<div class="bottom-inner-block">
   <h4>Конечная дата внесения предоплаты: <b><?php echo $tourist->getTimer1('d.m.Y'); ?></b></h4>
</div>

<?php elseif($tourist->statusId == \application\models\defines\TouristStatus::GETTING_DISCONT): ?>

<div class="top clearfix pulse">
    <div class="inner-block">
       <h4 class="hidden">До окончания срока внесения ... осталось:</h4>
       <button type="button" class="btn btn-default btn-green2 reason-list">Выбрать повод пуска счётчика</button>
       <ul class="custom-list hidden">
           <li><a href="#" data-id="1">Внесение аванса</a></li>
           <li><a href="#" data-id="2">Подача документов</a></li>
           <li><a href="#" data-id="3">Оплата тура</a></li>
           <li><a href="#" data-id="4">Окончание тура</a></li>
       </ul>
    </div>
    <div class="inner-block">
       <div class="countdown-time clearfix" data-date="0"></div>
    </div>
</div>

<div class="bottom-inner-block clearfix hidden">
   <div class="inner-block form-group">
        <label>конечная дата …:</label>
        <?php echo CHtml::textField("counterFinishDate"); ?>
    </div>
</div>

<?php endif; ?>