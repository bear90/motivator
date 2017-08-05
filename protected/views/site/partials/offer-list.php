<?php
    use application\models\defines\Offer\PriceType;
    use application\models\defines\Offer;
    use application\modules\admin\models\Text;

    $showContact = isset($showContact) ? boolval($showContact) : false;
    $count = count($offers);

    $class = function ($type)
    {
        switch ($type) {
            case Offer\Type::FAVORITE:
                return 'favorite';

            case Offer\Type::NOT_PRIORITY:
                return 'not-priority';
            
            default:
                return 'common';
        }
    };
?>

<?php if ($count) : ?>

    <?php foreach($offers as $num => $offer) : ?>

        <div class="item row <?php echo $class($offer->type); ?>" id="offer_<?php echo $offer->id; ?>"
             data-id="<?php echo $offer->id; ?>">
            <div class="col-md-12 text-center">
                <h3>Предложение №<?php echo $offer->sort; ?></h3>

                <?php if(\Yii::app()->user->isUser()): ?>
                    <div class="row priority">
                        
                        <div class="col-md-6">
                            <?php if ($offer->type == Offer\Type::FAVORITE) : ?>
                                <b>ПРИОРИТЕТНОЕ</b>
                            <?php else : ?>
                                <a href="#" class="favorite">добавить в раздел «ИЗБРАННОЕ»</a>
                            <?php endif; ?>
                        </div>

                        <div class="col-md-6">
                            <?php if ($offer->type == Offer\Type::NOT_PRIORITY) : ?>
                                <b>НЕПРИОРИТЕТНОЕ</b>
                            <?php else : ?>
                                <a href="#" class="not_priority">добавить в общий список</a>
                            <?php endif; ?>
                            
                        </div>

                    </div>
                <?php endif; ?>

                <?php if($showContact || $showContactForFirtsOne && $offer->sort==count($offers)): ?>
                    <div><?php echo $offer->contact; ?></div>
                <?php endif; ?>

                <div><?php echo $offer->description; ?></div>

                <?php if(!is_null($offer->price)) : ?>
                    <div>
                        Продажа: <?php echo ceil($offer->price); ?>$
                    </div>
                <?php endif; ?>

                <?php if(!is_null($offer->earlyPrice)) : ?>
                    <div>
                        Ранее бронирование: 
                        <i class="fa fa-snowflake-o" aria-hidden="true"></i> <?php echo ceil($offer->earlyPrice); ?>$
                    </div>
                <?php endif; ?>

                <?php if(!is_null($offer->lastMinPrice)) : ?>
                    <div>
                        Горящий тур:
                        <span class="glyphicon glyphicon-fire"></span> <?php echo ceil($offer->lastMinPrice); ?>$
                    </div>
                <?php endif; ?>
            </div>
        </div>

        

    <?php endforeach;?>

    <?php if (Yii::app()->user->isManager() && !Yii::app()->user->getState('viewOnly')) : ?>
        <button type="button" class="btn btn-default btn-green add-offer2" data-id="<?php echo $taskId; ?>">Разместить предложение</button>
    <?php endif; ?>

<?php //else : ?>

<?php endif; ?>

