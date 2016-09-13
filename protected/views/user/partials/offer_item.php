

<div class="item view" data-id="<?php echo $offer->id; ?>">
    
    <?php echo CHtml::hiddenField("TourOffer[{$number}][id]", $offer->id); ?>

    <h4>ПРЕДЛОЖЕНИЕ_№<?php echo $number; ?></h4>

    <?php if($readOnly === false): ?>
    <div class="inner-block">
        <button type="button" class="btn btn-default btn-yellow edit">РЕДАКТИРОВАТЬ</button>
        <button type="button" class="btn btn-default btn-yellow confirm">ВЫБРАТЬ ТУР</button>
    </div>

    <div class="viewBlock confirmation hidden">
        <button type="button" class="btn btn-default btn-green2 paid">ПРЕДОПЛАТА ПОЛУЧЕНА / ТУР ВЫБРАН</button>
    </div>
    <?php endif; ?>

    <div class="viewBlock form">

        <div class="inner-block form-group">
            <label>Страна:</label>
            <?php echo $offer->country; ?>
        </div>

        <div class="inner-block form-group">
            <label>Город/Регион:</label>
            <?php echo $offer->city; ?>
        </div>

        <div class="inner-block form-group">
            <label>Дата начала тура:</label>
            <?php echo Yii::app()->dateFormatter->format('dd.MM.yyyy', $offer->startDate); ?>
        </div>

        <div class="inner-block form-group">
            <label>Дата окончания тура:</label>
            <?php echo Yii::app()->dateFormatter->format('dd.MM.yyyy', $offer->endDate); ?>
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

        <?php if($viewOperator): ?>
        <div class="inner-block form-group">
            <label>Туроператор:</label>
            <?php echo $offer->operator ? $offer->operator->name : ''; ?>
        </div>
        <?php endif; ?>

        <div class="inner-block form-group">
            <label>Описание тура:</label>
            <p><?php echo $offer->description; ?></p>
        </div>

        <div class="inner-block form-group">
            <label>Исходная стоимость тура на момент отправки предложения:</label>
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
        <div class="inner-block">
            <label>Максимально возможная абонентская скидка:</label>
            <?php echo Tool::getNewPriceText($offer->maxDiscont); ?>
        </div>
        <div class="inner-block">
            <label>Предоплата:</label>
            <?php echo Tool::getNewPriceText($offer->prepayment); ?>
        </div>
        <div class="inner-block">
            <label>Сумма к доплате при максимально возможной абонентской скидке:</label>
            <?php echo Tool::getNewPriceText($offer->surchange); ?>
        </div>
    </div>

    <?php if($readOnly === false): ?>
    <div class="editBlock form">

        <div class="inner-block form-group">
            <label>Выберите валюту:</label>
            <?php echo CHtml::dropDownList("TourOffer[{$number}][currencyUnit]",
                $offer->currencyUnit,
                ['usd' => 'Доллары', 'eur' => 'Евро', 'byn' => 'Белорусские рубли'],
                ['class' => 'currencyUnit']); ?>
        </div>

        <div class="inner-block form-group">
            <label>Исходная стоимость тура на момент отправки предложения:</label>
            <?php echo CHtml::textField("TourOffer[{$number}][currency]", $offer->currency, ['class' => 'currency']); ?>
        </div>

        <div class="inner-block">
            <label>Стартовая абонентская скидка:</label>
            
        </div>
        <div class="inner-block">
            <label>Максимально возможная абонентская скидка:</label>
            
        </div>
        <div class="inner-block">
            <label>Предоплата:</label>
            
        </div>
        <div class="inner-block">
            <label>Сумма к доплате при максимально возможной абонентской скидке:</label>
            
        </div>

        <h4>ОПИСАНИЕ ТУРА:</h4> 
        
        <div class="inner-block form-group">
            <label>Страна:</label>
            <?php echo CHtml::textField(
                "TourOffer[{$number}][country]", 
                $offer->country, 
                ['class' => 'country']); ?>
        </div> 
        
        <div class="inner-block form-group">
            <label>Город/Регион:</label>
            <?php echo CHtml::textField(
                "TourOffer[{$number}][city]", 
                $offer->city, 
                ['class' => 'city']); ?>
        </div>
        
        <div class="inner-block form-group">
            <label>Дата начала тура:</label>
            <?php echo CHtml::textField(
                "TourOffer[{$number}][startDate]", 
                Yii::app()->dateFormatter->format('dd.MM.yyyy', $offer->startDate), 
                ['class' => 'startDate']); ?>
        </div>
        
        <div class="inner-block form-group">
            <label>Дата окончания тура:</label>
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