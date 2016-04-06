<?php
    $readOnly = !$manager || $manager->id != $tourist->offer->tour->managerId;
?>
<h4>Ваш тур</h4>

<?php if($readOnly === false): ?>

    <div class="inner-block">
        <button type="button" class="btn btn-default btn-yellow edit">РЕДАКТИРОВАТЬ</button>
        <button type="button" class="btn btn-default btn-green2 paid">ТУР ОПЛАЧЕН</button>
    </div>

<?php endif; ?>


<div class="viewBlock">

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
            <?php echo number_format($tourist->getTotalDiscont(), 0, ',', ' '); ?> бел.руб.
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
</div>

<?php if($readOnly === false): 
    echo CHtml::beginForm('/user/createoffer', 'post', ['class' => 'offerForm']); 
    echo CHtml::hiddenField('tab', 'tab5');
    echo CHtml::hiddenField('tourId', $tourist->offer->tour->id);
    echo CHtml::hiddenField("TourOffer[0][id]", $tourist->offer->id);
?>

    <div class="editBlock">
        <div class="inner-block form-group">
            <label>Исходная стоимость тура:</label>
            <?php echo CHtml::textField("TourOffer[0][price]", $tourist->offer->price, ['class' => 'price']); ?>
        </div>

        <h4>ОПИСАНИЕ ТУРА:</h4> 
        
        <div class="inner-block form-group">
            <label>Страна:</label>
            <?php echo CHtml::textField(
                "TourOffer[0][country]", 
                $tourist->offer->country, 
                ['class' => 'country']); ?>
        </div> 
        
        <div class="inner-block form-group">
            <label>Город/Регион:</label>
            <?php echo CHtml::textField(
                "TourOffer[0][city]", 
                $tourist->offer->city, 
                ['class' => 'city']); ?>
        </div>
        
        <div class="inner-block form-group">
            <label>Дата начала тура:</label>
            <?php echo CHtml::textField(
                "TourOffer[0][startDate]", 
                Yii::app()->dateFormatter->format('dd.MM.yyyy', $tourist->offer->startDate), 
                ['class' => 'startDate']); ?>
        </div>
        
        <div class="inner-block form-group">
            <label>Дата окончания тура:</label>
            <?php echo CHtml::textField("TourOffer[0][endDate]", 
                Yii::app()->dateFormatter->format('dd.MM.yyyy', $tourist->offer->endDate), 
                ['class' => 'endDate']); ?>
        </div>
        <div class="inner-block form-group">
            <?php echo CHtml::textArea("TourOffer[0][description]", $tourist->offer->description, ['class' => 'description']); ?>
        </div>

        <button type="submit" class="btn btn-default btn-green2 save">Обновить</button>
    </div>

<?php 
    echo CHtml::endForm();
    endif; ?>