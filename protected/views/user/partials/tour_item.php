<div class="tabs-block-inner">
    <div class="head-inner-block view">
       
        <i class="glyphicon glyphicon-trash" data-href="/user/removetour?id=<?php echo $tour->id; ?>"><!-- --></i>

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
                'offers' => $tour->offers,
                'canChange' => false
            ]); ?>
        </span>
    </div>
</div>