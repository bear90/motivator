
    <?php if ($manager && $tourist->tour->touragentId == $manager->touragentId):?>
        <div>
            Туроператор: 
            <span class="value date"><?php echo $tourist->tour->operator ? $tourist->tour->operator->name : ''; ?></span>
        </div>
    <?php endif; ?>

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
    <div>Описание тура, условия обслуживания:
        <p>
            <?php echo $tourist->tour->description; ?>
        </p>
    </div>
    <div class="clrfix">Стоимость тура: 
        <span class="value money">
            <?php echo Tool::getNewPriceText($tourist->tour->getCurrentPrice()); ?>
        </span>
    </div>

    <div>Стартовая предоплата: 
        <span class="value money">
            <?php echo Tool::getNewPriceText($tourist->tour->prepayment); ?>
        </span>
    </div>
    <div>Предоплата при бронировании тура:</div>
    <div>внесено: 
        <span class="value money">
            <?php echo Tool::getNewPriceText($tourist->tour->bookingPrepaymentPaid); ?>
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
        <label class="col-md-8"><a href="#" class="show-invited">Скидка за привлечение:</a></label>
        <div class="col-md-4 ta-r"><?php echo Tool::getNewPriceText($tourist->getPartnerDiscont()); ?></div>
    </div>
    <div class="row hidden-row bg-grey invited hidden">
        <?php foreach ($tourist->getInvited() as $item): ?>
        <div class="title">
            <label class="col-md-8"><?php echo $item['name'] ?>:</label>
            <div class="col-md-4 ta-r"><?php echo Tool::getNewPriceText($item['amount']); ?></div>
        </div>
        <?php endforeach; ?>
    </div>
    
    <div>Доплата при покупке тура: 
        <span class="value money">
            <?php echo Tool::getNewPriceText($tourist->tour->getCurrentSurchange()); ?>
        </span>
    </div>
    
    <div class="viewBlock confirmation">
        <label for="confirmation"><input type="checkbox" name="confirmation" id="confirmation"> Подтверждаю получение  доплаты за тур.</label>
        <button type="button" class="btn btn-default btn-green2 paid">ДОПЛАТА ПОЛУЧЕНА / ТУР ПРОДАН </button>
    </div>