<?php
    use application\models\defines\Offer\PriceType;
?>

<?php foreach($offers as $num => $offer) : ?>

    <div class="row" id="offer_<?php echo $offer->id; ?>">
        <div class="col-md-12">
            <h3>Предложение №<?php echo $num+1; ?></h3>

            <?php if($showContactForFirtsOne && $num==0): ?>
            <div><?php echo $offer->contact; ?></div>
            <?php endif; ?>

            <div><?php echo $offer->description; ?></div>

            <?php if(!is_null($offer->price)) : ?>
                <div>
                    Штатная продажа: <?php echo ceil($offer->price); ?>
                </div>
            <?php endif; ?>

            <?php if(!is_null($offer->earlyPrice)) : ?>
                <div>
                    Ранее бронирование: 
                    <i class="fa fa-snowflake-o" aria-hidden="true"></i> <?php echo ceil($offer->earlyPrice); ?>
                </div>
            <?php endif; ?>

            <?php if(!is_null($offer->lastMinPrice)) : ?>
                <div>
                    Горящий тур:
                    <span class="glyphicon glyphicon-fire"></span> <?php echo ceil($offer->lastMinPrice); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php endforeach;?>

<button type="button" class="btn btn-default btn-green add-offer2" data-id="<?php echo $taskId; ?>">Разместить предложение</button>