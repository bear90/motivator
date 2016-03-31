<?php
    $canOffer = $touragent->id == $tour->touragentId;
    $hasOffer = false; //count($tour->offer) > 0;
    $responsibleManager = $canOffer && $manager->id == $tour->managerId;
?>

<div class="tabs-block-inner tour">
    <div class="head-inner-block view">

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

            <?php $this->renderPartial('partials/offer_list', [
                'tour' => $tour,
                'manager' => $manager,
                'canChange' => $manager->id == $tour->managerId ||
                               !$tour->managerId && $touragent->id == $tour->touragentId
            ]); ?>
            
        </span>

    </div>
</div>