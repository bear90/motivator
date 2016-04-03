<h4>Ваш тур</h4>
<span>Страна: <span class="value date"><?php echo $tourist->offer->country; ?></span></span>
<span>Город/Регион: <span class="value date"><?php echo $tourist->offer->city; ?></span></span>
<span>Начало тура: 
    <span class="value date">
        <?php echo Yii::app()->dateFormatter->format('dd.MM.yyyy', $tourist->offer->startDate); ?>
    </span>
</span>
<span>Окончание тура: 
    <span class="value date">
        <?php echo Yii::app()->dateFormatter->format('dd.MM.yyyy', $tourist->offer->endDate); ?>
    </span>
</span>
<span>Исходная стоимость тура: 
    <span class="value money">
        <?php echo number_format($tourist->offer->price, 0, ',', ' '); ?> бел.руб.
    </span>
</span>
<span>Предоплата: 
    <span class="value money">
        <?php echo number_format($tourist->offer->prepayment, 0, ',', ' '); ?> бел.руб.
    </span>
</span>

<span class="sell">Общая скидка: 
    <span class="value money">
        <?php echo number_format($tourist->offer->surchange, 0, ',', ' '); ?> бел.руб.
    </span>
</span>

<span>В том числе:</span>
<span>Абонентская скидка: 
    <span class="value money">
        <?php echo number_format($tourist->offer->minDiscont, 0, ',', ' '); ?> бел.руб.
    </span>
</span>
<span>Сумма максимально возможной абонентской скидки: 
    <span class="value money">
        <?php echo number_format($tourist->offer->maxDiscont, 0, ',', ' '); ?> бел.руб.
    </span>
</span>
<span>Скидка за привлечение: 
    <span class="value money">
        <?php echo number_format($tourist->offer->getPartnerDiscont(), 0, ',', ' '); ?> бел.руб.
    </span>
</span>
<span>Доплата при покупке тура: 
    <span class="value money">
        <?php echo number_format($tourist->offer->getCurrentSurchange(), 0, ',', ' '); ?> бел.руб.
    </span>
</span>
<span>Описание тура: 
    <p>
        <?php echo $tourist->offer->description; ?>
    </p>
</span>