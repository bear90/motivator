<?php
    use application\models\defines\Offer\PriceType;
?>

<?php for($i = count($offers); $i>0; $i--) : ?>

    <div class="row" id="offer_<?php echo $offers[$i-1]->id; ?>">
        <div class="col-md-12">
            <h3>Предложение №<?php echo $i; ?></h3>

            <?php if($showContactForFirtsOne && $i==count($offers)): ?>
                <div><?php echo $offers[$i-1]->contact; ?></div>
            <?php endif; ?>

            <div><?php echo $offers[$i-1]->description; ?></div>

            <?php if(!is_null($offers[$i-1]->price)) : ?>
                <div>
                    Штатная продажа: <?php echo ceil($offers[$i-1]->price); ?>
                </div>
            <?php endif; ?>

            <?php if(!is_null($offers[$i-1]->earlyPrice)) : ?>
                <div>
                    Ранее бронирование: 
                    <i class="fa fa-snowflake-o" aria-hidden="true"></i> <?php echo ceil($offers[$i-1]->earlyPrice); ?>
                </div>
            <?php endif; ?>

            <?php if(!is_null($offers[$i-1]->lastMinPrice)) : ?>
                <div>
                    Горящий тур:
                    <span class="glyphicon glyphicon-fire"></span> <?php echo ceil($offers[$i-1]->lastMinPrice); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php endfor;?>

<button type="button" class="btn btn-default btn-green add-offer2" data-id="<?php echo $taskId; ?>">Разместить предложение</button>