<?php
    $canOffer = $touragent->id == $tour->touragentId;
    $hasOffer = strlen($tour->offer) > 0;
    $responsibleManager = $canOffer && $manager->id == $tour->managerId;
?>

<div class="tabs-block-inner tour">
    <div class="head-inner-block view">
        
        <?php if($canOffer):?>
        <form class="tourForm bv-form" action="<?php echo Yii::app()->createUrl("user/updatetour/{$tour->id}"); ?>" method="post">
        <?php endif;?>

            <?php if($canOffer): ?>
                <?php if($hasOffer): ?>
                    <div class="info">Предложение от турагента</div>
                <?php else: ?>
                    <div class="info">Оставьте своё предложение!</div>
                <?php endif; ?>
            <?php endif; ?>

            <h3>ЗАЯВКА НА ТУР</h3>

            <span class="request-head-block clearfix">
                <div class="inner-block">
                    <label for="">Турагента:</label> <?php echo $tour->touragent->name; ?>
                </div>

                <div class="inner-block">
                    <label>Cтрана отдыха:</label>
                    <?php echo $tour->getCities(); ?>
                </div>
                <div class="inner-block">
                    <label>Ориентировочная дата начала тура:</label>
                    <?php echo Yii::app()->dateFormatter->format('dd.MM.yyyy', $tour->startDate); ?>

                </div>
                <div class="inner-block">
                    <label>Ориентировочная дата окончания тура:</label>
                    <?php echo Yii::app()->dateFormatter->format('dd.MM.yyyy', $tour->endDate); ?>
                </div>

                
                <?php if($canOffer): ?>
                    <?php if($hasOffer): ?>
                        <div class="inner-block form-group">
                            <label>Предложение от турагента:</label>
                            <div class="view"><?php echo $tour->offer; ?></div>
                            <textarea name="offer" class="offer hidden" rows="10"><?php echo $tour->offer; ?></textarea>
                        </div>
                        <?php if($responsibleManager): ?>
                        <button type="button" class="btn btn-default btn-green2 edit">РЕДАКТИРОВАТЬ ПРЕДЛОЖЕНИЕ</button>
                        <button type="submit" class="btn btn-default btn-green2 ok hidden">РАЗМЕСТИТЬ ПРЕДЛОЖЕНИЕ</button>
                        <?php endif; ?>
                    <?php else: ?>
                        <div class="inner-block form-group">
                            <textarea name="offer" class="offer" rows="10"><?php echo $tour->offer; ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-default btn-green2 save hidden">РАЗМЕСТИТЬ ПРЕДЛОЖЕНИЕ</button>
                    <?php endif; ?>
                <?php endif; ?>
                
            </span>
        
        <?php if($canOffer): ?>
        </form>
        <?php endif; ?>

    </div>
</div>