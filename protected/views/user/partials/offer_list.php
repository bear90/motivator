<?php if(count($tour->offers)): ?>
    
    <div class="info">Предложения от турагента</div>

    <div class="inner-block">
        <label>Контактные данные менеджера:</label>
        <div class="value">
            <?php echo \Tool::getManagerContacts($tour, $manager); ?>
        </div>
    </div>
    
    <div class="offers">
    <?php 
        if($canChange)
        {
            echo CHtml::beginForm('/user/createoffer', 'post', ['class' => 'offerForm']); 
            echo CHtml::hiddenField('tourId', $tour->id);
        }
        
        foreach ($tour->offers as $num => $model) {
            $this->renderPartial('partials/offer_item', [
                'number' => $num+1,
                'offer' => $model,
                'readOnly' => $canChange === false
            ]);
        }

        if($canChange)
        {
            echo CHtml::endForm();
        }
        
    ?>
    </div>

<?php elseif ($canChange): ?>
    
    <div class="info">Оставьте свои предложения!</div>

    <div class="inner-block">
        <label>Контактные данные менеджера:</label>
        <div class="value">
            <?php echo \Tool::getManagerContacts($tour, $manager); ?>
        </div>
    </div>

    <div class="offers">
        <?php 
        
        echo CHtml::beginForm('/user/createoffer', 'post', ['class' => 'offerForm']); 
        echo CHtml::hiddenField('tourId', $tour->id);

        $this->renderPartial('partials/offer_new', [
            'number' => 1,
            'offer' => new \application\models\TourOffer()
        ]); 

        echo CHtml::endForm();
        ?>
    </div>

<?php endif; ?>