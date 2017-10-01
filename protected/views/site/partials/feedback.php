<div id="feedback">
    <a href="#" class="glyphicon glyphicon-remove-sign hidden"></a>

    <p>Если вы не разместили заявку на свой тур, - опишите, пожалуйста, причину неразмещения.</p>
    <p>Спасибо за честный ответ!</p>

    <a href="#" class="show-feedback-button">Ответить</a>


    <?php echo $feedbackForm->renderBegin(); ?>

    <div class="alert hidden" role="alert"></div>

    <div class="form-group">
        <?php echo $feedbackForm['feedback']; ?>
    </div>

    <a href="#" class="submit-button">Отправить ответ</a>
    
    <?php echo $feedbackForm->renderEnd(); ?>

    


</div>