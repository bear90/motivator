<div class="item edit">

    <h4>ПРЕДЛОЖЕНИЕ_№1</h4>

    <div class="editBlock">

        <div class="inner-block form-group">
            <label>Исходная стоимость тура:</label>
            <?php echo CHtml::textField("TourOffer[1][price]", '', ['class' => 'price']); ?>
        </div>

        <h4>ОПИСАНИЕ ТУРА:</h4> 
        
        <div class="inner-block form-group">
            <label>Дата начала тура:</label>
            <?php echo CHtml::textField("TourOffer[1][startDate]", '', ['class' => 'startDate']); ?>
        </div>
        
        <div class="inner-block form-group">
            <label>Дата окончания тура:</label>
            <?php echo CHtml::textField("TourOffer[1][endDate]", '', ['class' => 'endDate']); ?>
        </div>
        <div class="inner-block form-group">
            <?php echo CHtml::textArea("TourOffer[1][description]", '', ['class' => 'description']); ?>
        </div>
        <p><a href="#" class="add addOffer">+ ещё одно предложение</a></p>
        <button type="submit" class="btn btn-default btn-green2 save">РАЗМЕСТИТЬ ПРЕДЛОЖЕНИЕ</button>
    </div>
</div>