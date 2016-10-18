<?php  echo CHtml::beginForm('/user/edittour', 'post', ['class' => 'editForm']); ?> 
    <?php echo CHtml::hiddenField('tab', 'tab5'); ?>
    <?php echo CHtml::hiddenField('tourId', $tour->id); ?>

    <div>Предоплата при бронировании тура на момент его выбора/редактирования:</div>

    <div class="inner-block form-group">
        <label>к внесению <span class="cur">(<?php echo Tool::getCurrencyList($tour->currencyUnit, 'comment')?>)</span>:</label>
        <?php echo CHtml::textField("Tour[bookingPrepayment]", 
            $tour->bookingPrepayment, 
            ['class' => 'bookingPrepayment']); ?>
    </div>

    <div class="inner-block form-group">
        <label>внесено (в белорусских рублях):</label>
        <?php echo CHtml::textField("Tour[bookingPrepaymentPaid]", 
            $tour->bookingPrepaymentPaid, 
            ['class' => 'bookingPrepaymentPaid']); ?>
    </div>

    <div class="inner-block form-group">
        <label>Конечная дата внесения предоплаты при бронировании тура:</label>
        <?php echo CHtml::textField("Tour[bookingEndDate]",
            Yii::app()->dateFormatter->format('dd.MM.yyyy', $tour->bookingEndDate),
            ['class' => 'bookingEndDate']); ?>
    </div>

    <div class="inner-block form-group">
        <label>Конечная дата оплаты тура:</label>
        <?php echo CHtml::textField("Tour[paymentEndDate]",
            Yii::app()->dateFormatter->format('dd.MM.yyyy', $tour->paymentEndDate),
            ['class' => 'paymentEndDate']); ?>
    </div>

    <h4>ОПИСАНИЕ ТУРА:</h4> 

    <div class="inner-block form-group">
        <?php echo CHtml::textArea("Tour[description]", $tour->description, ['class' => 'description']); ?>
    </div>

    <button type="submit" class="btn btn-default btn-green2 save">ОБНОВИТЬ</button>

<?php echo CHtml::endForm(); ?>