<?php  echo CHtml::beginForm('/user/change-and-paid-tour', 'post', ['class' => 'changeAndPaidForm']); ?> 
    <?php echo CHtml::hiddenField('tab', 'tab5'); ?>
    <?php echo CHtml::hiddenField('tourId', $tour->id); ?>
    <?php echo CHtml::hiddenField('bookingPrepayment', $tour->getBookingPrepayment()); ?>

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
            <label>
                Стоимость тура
                <span class="cur">(<?php echo Tool::getCurrencyList($tour->currencyUnit, 'comment')?>)</span>:
            </label>
            <?php echo CHtml::textField("Tour[currency]", $tour->currency, ['class' => 'currency']); ?>
        </div>

        <div>Предоплата при бронировании тура:</div>

        <div class="inner-block form-group">
            <label>
                к внесению 
                <span class="cur">(<?php echo Tool::getCurrencyList($tour->currencyUnit, 'comment')?>)</span>:
            </label>
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

        <h4>ОПИСАНИЕ ТУРА, УСЛОВИЯ ОБСЛУЖИВАНИЯ:</h4> 
        
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
                'id' => 'descriptionChangeAndPaid'
            ]); ?>
        </div>

        <button type="button" class="btn btn-default btn-green2 preview">ПОКАЗАТЬ</button>

    </div>

    <div class="preview hidden">
        <div class="ajax"><!-- --></div>

        <label for="confirmationChangeAndPaid">
            <input type="checkbox" name="confirmationChangeAndPaid" id="confirmationChangeAndPaid"> Подтверждаю получение  доплаты за тур.
        </label>
        <button type="submit" class="btn btn-default btn-green2 save">ДОПЛАТА ПОЛУЧЕНА / ТУР ПРОДАН</button>
    </div>

<?php echo CHtml::endForm(); ?>