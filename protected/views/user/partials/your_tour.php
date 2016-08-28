<?php
    use application\models\defines\TouristStatus;

    $readOnly = !$manager || $manager->id != $tourist->tour->managerId;
?>
<h4>Ваш тур</h4>

<?php if($readOnly === false && $tourist->statusId == TouristStatus::GETTING_DISCONT): ?>

    <div class="inner-block">
        <button type="button" class="btn btn-default btn-yellow edit">РЕДАКТИРОВАТЬ</button>
        <button type="button" class="btn btn-default btn-yellow confirm">ПРОДАТЬ  ТУР</button>
    </div>

<?php endif; ?>


<div class="viewBlock form">

    <?php if ($manager && $tourist->tour->touragentId == $manager->touragentId):?>
    <div>Туроператор: <span class="value date"><?php echo $tourist->tour->operator ? $tourist->tour->operator->name : ''; ?></span></div>
    <?php endif; ?>

    <div>Страна: <span class="value date"><?php echo $tourist->tour->country; ?></span></div>
    <div>Город/Регион: <span class="value date"><?php echo $tourist->tour->city; ?></span></div>
    <div>Начало тура: 
        <span class="value date">
            <?php echo Yii::app()->dateFormatter->format('dd.MM.yyyy', $tourist->tour->startDate); ?>
        </span>
    </div>
    <div>Окончание тура: 
        <span class="value date">
            <?php echo Yii::app()->dateFormatter->format('dd.MM.yyyy', $tourist->tour->endDate); ?>
        </span>
    </div>
    <div>Описание тура:
        <p>
            <?php echo $tourist->tour->description; ?>
        </p>
    </div>
    <div>Исходная стоимость тура: 
        <span class="value money">
            <?php echo Tool::getNewPriceText($tourist->tour->price); ?>
        </span>
    </div>
    <div>Предоплата: 
        <span class="value money">
            <?php echo Tool::getNewPriceText($tourist->tour->prepayment); ?>
        </span>
    </div>

    <div class="sell red">Общая скидка:
        <a href="#" class="more">подробнее</a>
        <span class="value money">
            <?php echo Tool::getNewPriceText($tourist->getTotalDiscont()); ?>
        </span>
    </div>

    <div class="row hidden-row bg-grey">
        <label class="col-md-8">Стартовая абонентская скидка:</label>
        <div class="col-md-4 ta-r"><?php echo Tool::getNewPriceText($tourist->tour->minDiscont); ?></div>
    </div>
    <div class="row hidden-row bg-grey">
        <label class="col-md-8">Добавочная абонентская скидка:</label>
        <div class="col-md-4 ta-r"><?php echo Tool::getNewPriceText($tourist->abonentDiscont); ?></div>
    </div>
    <div class="row hidden-row bg-grey">
        <label class="col-md-8">Максимально возможная абонентcкая скидка:</label>
        <div class="col-md-4 ta-r"><?php echo Tool::getNewPriceText($tourist->tour->maxDiscont); ?></div>
    </div>
    <div class="row hidden-row bg-grey">
        <label class="col-md-8">Скидка за привлечение:</label>
        <div class="col-md-4 ta-r"><?php echo Tool::getNewPriceText($tourist->getPartnerDiscont()); ?></div>
    </div>
    
    <div>Доплата при покупке тура: 
        <span class="value money">
            <?php echo Tool::getNewPriceText($tourist->tour->getCurrentSurchange()); ?>
        </span>
    </div>
    <div>Конечная дата оплаты тура: 
        <span class="value money">
            <?php echo $tourist->getCounterDate('d.m.Y'); ?>
        </span>
    </div>
</div>

<div class="viewBlock confirmation hidden">
    <label for="confirmation"><input type="checkbox" name="confirmation" id="confirmation"> Я подтверждаю личную ответственность за достоверность информации о получении доплаты за тур.</label>
    <button type="button" class="btn btn-default btn-green2 paid">ДОПЛАТА ПОЛУЧЕНА / ТУР ПРОДАН </button>
</div>

<?php if($readOnly === false): 
    echo CHtml::beginForm('/user/changetour', 'post', ['class' => 'offerForm']); 
    echo CHtml::hiddenField('tab', 'tab5');
    echo CHtml::hiddenField('tourId', $tourist->tour->id);
?>

    <div class="editBlock">
        <div class="inner-block form-group">
            <label>Туроператор:</label>
            <?php echo CHtml::dropDownList("Tour[operatorId]", $tourist->tour->operatorId,
                $manager->touragent->getOperatorList(),
                ['class' => 'operator', 'disabled' => true]); ?>
        </div>

        <div class="inner-block form-group">
            <label>Исходная стоимость тура:</label>
            <?php echo CHtml::textField("Tour[price]", $tourist->tour->price, ['class' => 'price']); ?>
        </div>

        <h4>ОПИСАНИЕ ТУРА:</h4> 
        
        <div class="inner-block form-group">
            <label>Страна:</label>
            <?php echo CHtml::textField(
                "Tour[country]", 
                $tourist->tour->country, 
                ['class' => 'country']); ?>
        </div> 
        
        <div class="inner-block form-group">
            <label>Город/Регион:</label>
            <?php echo CHtml::textField(
                "Tour[city]", 
                $tourist->tour->city, 
                ['class' => 'city']); ?>
        </div>
        
        <div class="inner-block form-group">
            <label>Дата начала тура:</label>
            <?php echo CHtml::textField(
                "Tour[startDate]", 
                Yii::app()->dateFormatter->format('dd.MM.yyyy', $tourist->tour->startDate), 
                ['class' => 'startDate']); ?>
        </div>
        
        <div class="inner-block form-group">
            <label>Дата окончания тура:</label>
            <?php echo CHtml::textField("Tour[endDate]", 
                Yii::app()->dateFormatter->format('dd.MM.yyyy', $tourist->tour->endDate), 
                ['class' => 'endDate']); ?>
        </div>

        <div class="inner-block form-group">
            <label>Конечная дата оплаты тура:</label>
            <?php echo CHtml::textField("paymentEndDate",
                $tourist->getCounterDate('d.m.Y'),
                ['class' => 'paymentEndDate']); ?>
        </div>

        <div class="inner-block form-group">
            <?php echo CHtml::textArea("Tour[description]", $tourist->tour->description, ['class' => 'description']); ?>
        </div>

        <button type="submit" class="btn btn-default btn-green2 save">ПРЕДОПЛАТА ПОЛУЧЕНА / ТУР ВЫБРАН</button>
    </div>

<?php 
    echo CHtml::endForm();
    endif; ?>