<?php
    $readOnly = !$manager || $manager->id != $tourist->tour->managerId;
?>
<h4>Ваш тур</h4>

<?php if($readOnly === false && $tourist->statusId == \application\models\defines\TouristStatus::GETTING_DISCONT): ?>

    <div class="inner-block">
        <button type="button" class="btn btn-default btn-yellow edit">РЕДАКТИРОВАТЬ</button>
        <button type="button" class="btn btn-default btn-green2 paid">ТУР ОПЛАЧЕН</button>
    </div>

<?php endif; ?>


<div class="viewBlock">

    <span>Страна: <span class="value date"><?php echo $tourist->tour->country; ?></span></span>
    <span>Город/Регион: <span class="value date"><?php echo $tourist->tour->city; ?></span></span>
    <span>Начало тура: 
        <span class="value date">
            <?php echo Yii::app()->dateFormatter->format('dd.MM.yyyy', $tourist->tour->startDate); ?>
        </span>
    </span>
    <span>Окончание тура: 
        <span class="value date">
            <?php echo Yii::app()->dateFormatter->format('dd.MM.yyyy', $tourist->tour->endDate); ?>
        </span>
    </span>
    <span>Исходная стоимость тура: 
        <span class="value money">
            <?php echo number_format($tourist->tour->price, 0, ',', ' '); ?> бел.руб.
        </span>
    </span>
    <span>Предоплата: 
        <span class="value money">
            <?php echo number_format($tourist->tour->prepayment, 0, ',', ' '); ?> бел.руб.
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
            <?php echo number_format($tourist->getAbonentDiscont(), 0, ',', ' '); ?> бел.руб.
        </span>
    </span>
    <span>Скидка за привлечение: 
        <span class="value money">
            <?php echo number_format($tourist->getPartnerDiscont(), 0, ',', ' '); ?> бел.руб.
        </span>
    </span>
    <span>Доплата при покупке тура: 
        <span class="value money">
            <?php echo number_format($tourist->tour->getCurrentSurchange(), 0, ',', ' '); ?> бел.руб.
        </span>
    </span>
    <span>Описание тура: 
        <p>
            <?php echo $tourist->tour->description; ?>
        </p>
    </span>
</div>

<?php if($readOnly === false): 
    echo CHtml::beginForm('/user/changetour', 'post', ['class' => 'offerForm']); 
    echo CHtml::hiddenField('tab', 'tab5');
    echo CHtml::hiddenField('tourId', $tourist->tour->id);
?>

    <div class="editBlock">
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
            <?php echo CHtml::textArea("Tour[description]", $tourist->tour->description, ['class' => 'description']); ?>
        </div>

        <button type="submit" class="btn btn-default btn-green2 save">Обновить</button>
    </div>

<?php 
    echo CHtml::endForm();
    endif; ?>