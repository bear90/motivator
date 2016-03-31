<?php
    $mode = isset($mode) ? $mode : 'view';
?>

<div class="item view">
    
    <?php echo CHtml::hiddenField("TourOffer[{$number}][id]", $offer->id); ?>

    <h4>ПРЕДЛОЖЕНИЕ_№<?php echo $number; ?></h4>

    <?php if($readOnly === false): ?>
    <div class="inner-block">
        <button type="button" class="btn btn-default btn-yellow edit">РЕДАКТИРОВАТЬ</button>
        <button type="button" class="btn btn-default btn-green2 confirm">ПРЕДОПЛАТА ПОЛУЧЕНА ТУР ВЫБРАН</button>
    </div>
    <?php endif; ?>

    <div class="viewBlock">

        <div class="inner-block form-group">
            <label>Исходная стоимость тура:</label>
            <?php echo number_format($offer->price, 0, ',', ' '); ?> бел.руб.
        </div>
        <div class="inner-block">
            <label>Стартовая абонентская скидка:</label>
            <?php echo number_format($offer->minDiscont, 0, ',', ' '); ?> бел.руб.
        </div>
        <div class="inner-block">
            <label>Максимальная абонентская скидка:</label>
            <?php echo number_format($offer->maxDiscont, 0, ',', ' '); ?> бел.руб.
        </div>
        <div class="inner-block">
            <label>Сумма к доплате при максимальной абонентской скидке:</label>
            <?php echo number_format($offer->surchange, 0, ',', ' '); ?> бел.руб.
        </div>

        <h4>ОПИСАНИЕ ТУРА:</h4> 
        
        <div class="inner-block form-group">
            <label>Дата начала тура:</label>
            <?php echo Yii::app()->dateFormatter->format('dd.MM.yyyy', $offer->startDate); ?>
        </div>
        
        <div class="inner-block form-group">
            <label>Дата окончания тура:</label>
            <?php echo Yii::app()->dateFormatter->format('dd.MM.yyyy', $offer->endDate); ?>
        </div>
        <div class="inner-block form-group">
            <?php echo $offer->description; ?>
        </div>
    </div>

    <?php if($readOnly === false): ?>
    <div class="editBlock">

        <div class="inner-block form-group">
            <label>Исходная стоимость тура:</label>
            <?php echo CHtml::textField("TourOffer[{$number}][price]", $offer->price, ['class' => 'price']); ?>
        </div>
        <div class="inner-block">
            <label>Стартовая абонентская скидка:</label>
            
        </div>
        <div class="inner-block">
            <label>Максимальная абонентская скидка:</label>
            
        </div>
        <div class="inner-block">
            <label>Сумма к доплате при максимальной абонентской скидке:</label>
            
        </div>

        <h4>ОПИСАНИЕ ТУРА:</h4> 
        
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
            <?php echo CHtml::textArea("TourOffer[{$number}][description]", $offer->description, ['class' => 'description']); ?>
        </div>
        <p><a href="#" class="add addOffer">+ ещё одно предложение</a></p>
        <button type="submit" class="btn btn-default btn-green2 save">РАЗМЕСТИТЬ ПРЕДЛОЖЕНИЕ</button>
    </div>
    <?php endif; ?>
</div>