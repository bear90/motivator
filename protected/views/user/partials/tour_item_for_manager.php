<?php
    $canOffer = $touragent && $touragent->id == $tour->touragentId && !$manager->boss;
    $responsibleManager = $canOffer && $manager->id == $tour->managerId;
?>

<div class="tabs-block-inner tour">
    <div class="head-inner-block view">

        <h3>ЗАЯВКА НА ТУР</h3>

        <span class="request-head-block clearfix">
            <div class="inner-block">
                <label for="">Турагент:</label> <?php echo $tour->touragent->name; ?>
            </div>

            <div class="inner-block">
                <label>Пожелания к туру:</label>
                <?php echo $tour->wishes; ?>
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
                'touragent' => $touragent,
                'canChange' => $manager && $manager->id == $tour->managerId ||
                               $touragent && !$tour->managerId && !$manager->boss && $touragent->id == $tour->touragentId,
                'viewOperator' => $touragent && $touragent->id == $tour->touragentId
            ]); ?>
            
        </span>

    </div>
</div>