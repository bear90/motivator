<div class="item edit">

    <h4>ПРЕДЛОЖЕНИЕ_№1</h4>

    <div class="editBlock">

        <div class="inner-block form-group">
            <label>Туроператор:</label>
            <?php echo CHtml::dropDownList("TourOffer[{$number}][operatorId]",
                null,
                $touragent->getOperatorList(),
                ['class' => 'operator']); ?>
        </div>

        <h4>ОПИСАНИЕ ТУРА:</h4> 
        
        <div class="inner-block form-group">
            <label>Дата начала тура:</label>
            <?php echo CHtml::textField("TourOffer[1][startDate]", '', ['class' => 'startDate']); ?>
        </div>
        
        <div class="inner-block form-group">
            <label>Дата окончания тура:</label>
            <?php echo CHtml::textField("TourOffer[1][endDate]", '', ['class' => 'endDate']); ?>
        </div>

        <div class="inner-block form-group">
            <label>Предоплата при бронировании тура:</label>
            <?php echo CHtml::textField("TourOffer[1][bookingPrepayment]", '', ['class' => 'bookingPrepayment']); ?>
        </div>

        <div class="inner-block form-group">
            <label>Конечная дата внесения предоплаты при бронировании тура:</label>
            <?php echo CHtml::textField("TourOffer[1][bookingEndDate]", '', ['class' => 'bookingEndDate']); ?>
        </div>

        <div class="inner-block form-group">
            <label>Конечная дата оплаты тура:</label>
            <?php echo CHtml::textField("TourOffer[1][paymentEndDate]", '', ['class' => 'paymentEndDate']); ?>
        </div>

        <div class="inner-block form-group">
            <label>Выберите валюту:</label>
            <?php echo CHtml::dropDownList("TourOffer[1][currencyUnit]",
                null,
                Tool::getCurrencyList(),
                ['class' => 'currencyUnit']); ?>
        </div>

        <div class="inner-block form-group">
            <label>Исходная стоимость тура на момент отправки предложения:</label>
            <?php echo CHtml::textField("TourOffer[1][currency]", '', ['class' => 'currency']); ?>
        </div>

        <div class="inner-block form-group">
            <?php echo CHtml::textArea("TourOffer[1][description]", '', [
                'class' => 'description',
                'id' => "description_{$tourId}_1"
            ]); ?>
        </div>
        <p><a href="#" class="add addOffer">+ ещё одно предложение</a></p>
        <button type="submit" class="btn btn-default btn-green2 save">РАЗМЕСТИТЬ ПРЕДЛОЖЕНИЕ</button>
    </div>
</div>