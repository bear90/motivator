<?php
    use application\models\defines\Offer\PriceType;
?>

<?php foreach($offers as $num => $offer) : ?>

    <div class="row" id="offer_<?php echo $offer->id; ?>">
        <div class="col-md-12">
            <h3>Предложение №<?php echo $num+1; ?></h3>
            <?php echo $offer->description; ?>

            <?php if($offer->priceType == PriceType::GENERAL) : ?>
                <div>
                    Штатная продажа: <?php echo $offer->price; ?>
                </div>
            <?php endif; ?>

            <?php if($offer->priceType == PriceType::EARLY_BOOKING) : ?>
                <div>
                    Ранее бронирование: 
                    <i class="fa fa-snowflake-o" aria-hidden="true"></i> <?php echo $offer->price; ?>
                </div>
            <?php endif; ?>

            <?php if($offer->priceType == PriceType::LASTMINUTE_TOUR) : ?>
                <div>
                    Горящий тур:
                    <span class="glyphicon glyphicon-fire"></span> <?php echo $offer->price; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php endforeach;?>

