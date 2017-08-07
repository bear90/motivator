<?php
    use application\models\defines\Offer\PriceType;

    $offerForm->getModel()->taskId = $taskId;
?>

<div id="offer_form_<?php echo $taskId; ?>">
    <?php echo $offerForm->renderBegin(); ?>
    <?php echo $offerForm['taskId']; ?>

    <div class="form-group contact">
        <?php echo $offerForm['contact']; ?>
    </div>

    <div class="form-group description">
        <?php echo $offerForm['description']; ?>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="">Выберите режим продажи тура:</label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="">Укажите стоимость тура в $:</label>
            </div>
        </div>
    </div>

    <div class="row price">
        <div class="col-md-3">
            <div class="form-group">
                <?php echo $offerForm['priceType']; ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo $offerForm['price']; ?>
            </div>
        </div>
    </div>
    <a href="#" class="offer-add-price">+ Добавить режим продажи тура</a>

    <div class="form-block button">
        <button type="submit" class="btn btn-default btn-green">Разместить предложение</button>
        <button type="button" class="btn btn-default btn-yellow cancel-offer">Вернуться к списку заявок</button>
    </div>

    <?php echo $offerForm->renderEnd(); ?>
</div>