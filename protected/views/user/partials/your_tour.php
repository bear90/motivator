<?php
    use application\models\forms\OrderTour;

    $form = new \CForm('application.views.forms.order_tour', new OrderTour());
?>

<div class="tabs-block-inner">
    <div class="head-inner-block">
        <h4 class="title">Заполните и отправьте заявку на тур!</h4>
        <span class="sub-title">Вы можете отправить несколько заявок на предполагаемые туры.</span>
    </div>
    
    <div class="head-inner-block">
        <h3>ЗАЯВКА НА ТУР</h3>
        <?php echo $form->renderBegin(); ?>
            <div class="step1">
                <div class="inner-block col-xs-12">
                    <?php echo $form['site']; ?>
                </div>

                <div class="inner-block col-xs-12">
                    <?php echo $form['touragent']; ?>
                </div>

                <div class="inner-block col-xs-12">
                    <?php echo $form['city']; ?>
                    <a href="#" id="add-city" class="add">+ ещё страна</a>
                </div>
                <div class="inner-block col-xs-12">
                    <?php echo $form['startDate']; ?>
                </div>
                <div class="inner-block col-xs-12">
                    <?php echo $form['endDate']; ?>
                </div>

                <p>
                    <button type="<?php echo $tourist->phone ? 'submit' : 'button'; ?>" class="btn btn-default btn-green">ОТПРАВИТЬ ЗАЯВКУ НА ТУР</button>
                </p>
            </div>

            <?php if(empty($tourist->phone)):?>
            <div class="step2 hidden">
                <h4>Сообщите дополнительно свои данные:</h4>
                <div class="inner-block col-xs-12">
                    <?php echo $form['middleName']; ?>
                </div>
                <div class="inner-block col-xs-12">
                    <?php echo $form['phone']; ?>
                </div>

                <p>
                    <button type="submit" class="btn btn-default btn-green">ОТПРАВИТЬ ЗАЯВКУ НА ТУР</button>
                </p>
            </div>
            <?php endif;?>

            
        <?php echo $form->renderEnd(); ?>
    </div>

    <a href="#" class="hide-block">Скрыть</a>
</div>

<?php if (count($tours)):?>
        <?php foreach ($tours as $tour): ?>
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
                </span>
            </div>
        </div>
        <?php endforeach; ?>
<?php endif;?>
