<?php if ($isCurrentTouragent):?>
    <div class="title">Туроператор: 
        <span class="value date"><?php echo $tour->operator ? $tour->operator->name : ''; ?></span>
    </div>
<?php endif; ?>

<div class="title">Начало тура: 
    <span class="value date">
        <?php echo Yii::app()->dateFormatter->format('dd.MM.yyyy', $tour->startDate); ?>
    </span>
</div>

<div class="title">Окончание тура: 
    <span class="value date">
        <?php echo Yii::app()->dateFormatter->format('dd.MM.yyyy', $tour->endDate); ?>
    </span>
</div>

<div class="title">Описание тура:
    <p>
        <?php echo $tour->description; ?>
    </p>
</div>

<div class="title clrfix">Стоимость тура на момент его выбора: 
    <span class="value money">
        <?php echo Tool::getNewPriceText($tour->price); ?>
    </span>
</div>

<div class="title">Стоимость тура на сегодня: 
    <span class="value money">
        <?php echo Tool::getNewPriceText($tour->getCurrentPrice()); ?>
    </span>
</div>

<div class="title">Стартовая предоплата: 
    <span class="value money">
        <?php echo Tool::getNewPriceText($tour->prepayment); ?>
    </span>
</div>

<div class="title">Предоплата при бронировании тура <span>на момент его выбора/редактирования:</span></div>

<div class="title">к внесению: 
    <span class="value money">
        <?php echo Tool::getNewPriceText($tour->getBookingPrepayment()); ?>
    </span>
</div>

<div class="title">внесено: 
    <span class="value money">
        <?php echo Tool::getNewPriceText($tour->bookingPrepaymentPaid); ?>
    </span>
</div>

<div class="title sell red">Общая скидка:
    <a href="#" class="more">подробнее</a>
    <span class="value money">
        <?php echo Tool::getNewPriceText($tourist->getTotalDiscont()); ?>
    </span>
</div>

<div class="title row hidden-row bg-grey">
    <label class="col-md-8">Стартовая абонентская скидка:</label>
    <div class="col-md-4 ta-r"><?php echo Tool::getNewPriceText($tour->minDiscont); ?></div>
</div>

<div class="title row hidden-row bg-grey">
    <label class="col-md-8">Добавочная абонентская скидка:</label>
    <div class="col-md-4 ta-r"><?php echo Tool::getNewPriceText($tourist->abonentDiscont); ?></div>
</div>

<div class="title row hidden-row bg-grey">
    <label class="col-md-8">Максимально возможная абонентcкая скидка:</label>
    <div class="col-md-4 ta-r"><?php echo Tool::getNewPriceText($tour->maxDiscont); ?></div>
</div>

<div class="title row hidden-row bg-grey">
    <label class="col-md-8">Скидка за привлечение:</label>
    <div class="col-md-4 ta-r"><?php echo Tool::getNewPriceText($tourist->getPartnerDiscont()); ?></div>
</div>

<div class="title">Доплата при покупке тура <span>с учётом его стоимости на момент выбора:</span> 
    <span class="value money">
        <?php echo Tool::getNewPriceText($tour->getCurrentSurchange()); ?>
    </span>
</div>

<?php if($tour->bookingEndDate): ?>
<div class="title clrfix">Конечная дата внесения предоплаты при бронировании тура: 
    <span class="value money">
        <?php echo Yii::app()->dateFormatter->format('dd.MM.yyyy', $tour->bookingEndDate); ?>
    </span>
</div>
<?php endif; ?>

<div class="title">Конечная дата оплаты тура: 
    <span class="value money">
        <?php echo Yii::app()->dateFormatter->format('dd.MM.yyyy', $tour->paymentEndDate); ?>
    </span>
</div>