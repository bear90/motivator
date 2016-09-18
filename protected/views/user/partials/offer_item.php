

<div class="item view" data-id="<?php echo $offer->id; ?>">
    
    <?php echo CHtml::hiddenField("TourOffer[{$number}][id]", $offer->id); ?>

    <h4>ПРЕДЛОЖЕНИЕ_№<?php echo $number; ?></h4>

    <?php if($readOnly === false): ?>
    <div class="inner-block">
        <button type="button" class="btn btn-default btn-yellow edit">РЕДАКТИРОВАТЬ</button>
        <button type="button" class="btn btn-default btn-yellow confirm">ВЫБРАТЬ ТУР</button>
    </div>
    <?php endif; ?>

    <div class="viewBlock form">

        <?php if($viewOperator): ?>
        <div class="inner-block form-group">
            <label>Туроператор:</label>
            <?php echo $offer->operator ? $offer->operator->name : ''; ?>
        </div>
        <?php endif; ?>

        <div class="inner-block form-group">
            <label>Начало тура:</label>
            <?php echo Yii::app()->dateFormatter->format('dd.MM.yyyy', $offer->startDate); ?>
        </div>

        <div class="inner-block form-group">
            <label>Окончание тура:</label>
            <?php echo Yii::app()->dateFormatter->format('dd.MM.yyyy', $offer->endDate); ?>
        </div>

        <div class="inner-block form-group">
            <label>Описание тура:</label>
            <p><?php echo $offer->description; ?></p>
        </div>

        <div class="inner-block form-group">
            <label>Стоимость тура на момент отправки предложения:</label>
            <?php echo Tool::getNewPriceText($offer->price); ?>
        </div>

        <div class="inner-block form-group">
            <label>Стоимость тура на сегодня:</label>
            <?php echo Tool::getNewPriceText($offer->getCurrentPrice()); ?>
        </div>

        <div class="inner-block">
            <label>Стартовая абонентская скидка:</label>
            <?php echo Tool::getNewPriceText($offer->minDiscont); ?>
        </div>

        <div class="inner-block red">
            <label>Максимально возможная абонентская скидка:</label>
            <?php echo Tool::getNewPriceText($offer->maxDiscont); ?>
        </div>

        <div class="inner-block"><label for="">Стартовая предоплата:</label></div>
        <div class="inner-block">
            <label>к внесению:</label>
            <?php echo Tool::getNewPriceText($offer->prepayment); ?>
        </div>

        <div class="inner-block"><label for="">Предоплата при бронировании тура:</label></div>
        <div class="inner-block">
            <label>к внесению:</label>
            <?php echo Tool::getNewPriceText($offer->bookingPrepayment); ?>
        </div>

        <div class="inner-block">
            <label>Доплата при покупке тура</label> с учётом максимально возможной абонентской скидки и стоимости тура на момент отправки предложения:
            <?php echo Tool::getNewPriceText($offer->surchange); ?>
        </div>

        <?php if($offer->bookingEndDate): ?>
        <div class="inner-block form-group">
            <label>Конечная дата внесения предоплаты при бронировании тура:</label>
            <?php echo Yii::app()->dateFormatter->format('dd.MM.yyyy', $offer->bookingEndDate); ?>
        </div>
        <?php endif;?>

        <div class="inner-block form-group">
            <label>Конечная дата оплаты тура:</label>
            <?php echo Yii::app()->dateFormatter->format('dd.MM.yyyy', $offer->paymentEndDate); ?>
        </div>

        <?php if($readOnly === false): ?>
        <div class="viewBlock confirmation hidden">
            <button type="button" class="btn btn-default btn-green2 paid">ПРЕДОПЛАТА ПОЛУЧЕНА / ТУР ВЫБРАН</button>
        </div>
        <?php endif; ?>
    </div>

    <?php if($readOnly === false): ?>
    <div class="editBlock form">

        <div class="inner-block form-group">
            <label>Выберите валюту:</label>
            <?php echo CHtml::dropDownList("TourOffer[{$number}][currencyUnit]",
                $offer->currencyUnit,
                Tool::getCurrencyList(),
                ['class' => 'currencyUnit']); ?>
        </div>

        <div class="inner-block form-group">
            <label>Стоимость тура на момент отправки предложения:</label>
            <?php echo CHtml::textField("TourOffer[{$number}][currency]", $offer->currency, ['class' => 'currency']); ?>
        </div>

        <div class="inner-block form-group">
            <label>Предоплата при бронировании тура:</label>
            <?php echo CHtml::textField("TourOffer[{$number}][bookingPrepayment]", 
                $offer->bookingPrepayment, 
                ['class' => 'bookingPrepayment']); ?>
        </div>

        <h4>ОПИСАНИЕ ТУРА:</h4> 
        
        <div class="inner-block form-group">
            <label>Начало тура:</label>
            <?php echo CHtml::textField(
                "TourOffer[{$number}][startDate]", 
                Yii::app()->dateFormatter->format('dd.MM.yyyy', $offer->startDate), 
                ['class' => 'startDate']); ?>
        </div>
        
        <div class="inner-block form-group">
            <label>Окончание тура:</label>
            <?php echo CHtml::textField("TourOffer[{$number}][endDate]", 
                Yii::app()->dateFormatter->format('dd.MM.yyyy', $offer->endDate), 
                ['class' => 'endDate']); ?>
        </div>

        <div class="inner-block form-group">
            <label>Конечная дата внесения предоплаты при бронировании тура:</label>
            <?php echo CHtml::textField("TourOffer[{$number}][bookingEndDate]",
                Yii::app()->dateFormatter->format('dd.MM.yyyy', $offer->bookingEndDate),
                ['class' => 'bookingEndDate']); ?>
        </div>

        <div class="inner-block form-group">
            <label>Конечная дата оплаты тура:</label>
            <?php echo CHtml::textField("TourOffer[{$number}][paymentEndDate]",
                Yii::app()->dateFormatter->format('dd.MM.yyyy', $offer->paymentEndDate),
                ['class' => 'paymentEndDate']); ?>
        </div>
        
        <div class="inner-block form-group">
            <label>Туроператор:</label>
            <?php echo CHtml::dropDownList("TourOffer[{$number}][operatorId]", 
                $offer->operatorId,
                $touragent->getOperatorList(),
                ['class' => 'operator', 'disabled' => true]); ?>
        </div>

        <div class="inner-block form-group">
            <?php echo CHtml::textArea("TourOffer[{$number}][description]", $offer->description, [
                'class' => 'description',
                'id' => "description_{$offer->tourId}_{$number}"
            ]); ?>
        </div>
        <p><a href="#" class="add addOffer">+ ещё одно предложение</a></p>
        <button type="submit" class="btn btn-default btn-green2 save">ОБНОВИТЬ</button>
    </div>
    <?php endif; ?>
</div>