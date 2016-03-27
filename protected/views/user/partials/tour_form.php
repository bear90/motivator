<?php
    use application\models\forms\OrderTour;

    $form = new \CForm('application.views.forms.order_tour', new OrderTour());
?>

<div class="tabs-block-inner">
    <div class="head-inner-block">
        <div class="inner-block col-xs-12">
            <label>Для выбора  тура и турагента ознакомьтесь с предложениями от партнёров системы «МОТИВАТОР»:</label>
            <?php echo CHtml::dropDownList('site', null, \application\models\Touragent::getSiteOptions());?>
        </div>
        <h4 class="title">Заполните и отправьте заявку на тур!</h4>
        <span class="sub-title">Вы можете отправить несколько заявок на предполагаемые туры.</span>
    </div>
    
    <div class="head-inner-block">
        <h3>ЗАЯВКА НА ТУР</h3>
        <?php echo $form->renderBegin(); ?>
            <div class="step1">

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
                    <button type="<?php echo $tourist->phone ? 'submit' : 'button'; ?>" class="btn btn-default btn-green2">ОТПРАВИТЬ ЗАЯВКУ НА ТУР</button>
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
                    <button type="submit" class="btn btn-default btn-green2">ОТПРАВИТЬ ЗАЯВКУ НА ТУР</button>
                </p>
            </div>
            <?php endif;?>

            
        <?php echo $form->renderEnd(); ?>
    </div>
</div>