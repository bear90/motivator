<?php  echo CHtml::beginForm('/user/changetour', 'post', ['class' => 'offerForm changing']); ?> 
    <?php echo CHtml::hiddenField('tab', 'tab5'); ?>
    <?php echo CHtml::hiddenField('tourId', $tour->id); ?>

    <div class="body">

        <div class="inner-block form-group">
            <label>Туроператор:</label>
            <?php echo CHtml::dropDownList("Tour[operatorId]", $tour->operatorId,
                $touragent->getOperatorList(),
                ['class' => 'operator', 'disabled' => true]); ?>
        </div>

        <div class="inner-block form-group">
            <label>Выберите валюту:</label>
            <?php echo CHtml::dropDownList("Tour[currencyUnit]", $tour->currencyUnit, 
            Tool::getCurrencyList(),
            ['class' => 'currencyUnit']); ?>
        </div>

        <div class="inner-block form-group">
            <label>Стоимость тура:</label>
            <?php echo CHtml::textField("Tour[currency]", $tour->currency, ['class' => 'currency']); ?>
        </div>

        <div>Предоплата при бронировании тура:</div>

        <div class="inner-block form-group">
            <label>к внесению:</label>
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

        <h4>ОПИСАНИЕ ТУРА:</h4> 
        
        <div class="inner-block form-group">
            <label>Дата начала тура:</label>
            <?php echo CHtml::textField(
                "Tour[startDate]", 
                Yii::app()->dateFormatter->format('dd.MM.yyyy', $tour->startDate), 
                ['class' => 'startDate']); ?>
        </div>
        
        <div class="inner-block form-group">
            <label>Дата окончания тура:</label>
            <?php echo CHtml::textField("Tour[endDate]", 
                Yii::app()->dateFormatter->format('dd.MM.yyyy', $tour->endDate), 
                ['class' => 'endDate']); ?>
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

        <div class="inner-block form-group">
            <?php echo CHtml::textArea("Tour[description]", $tour->description, [
                'class' => 'description',
                'id' => 'description'
            ]); ?>
        </div>

        <button type="button" class="btn btn-default btn-green2 preview">ПОКАЗАТЬ</button>

    </div>

    <div class="preview hidden">
        <div class="ajax"><!-- --></div>

        <button type="submit" class="btn btn-default btn-green2 save">ПРЕДОПЛАТА ПОЛУЧЕНА / ТУР ВЫБРАН</button>
    </div>

<?php echo CHtml::endForm(); ?>