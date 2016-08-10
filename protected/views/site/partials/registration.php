<?php
    use application\models\forms\UserRegister;
    use application\modules\admin\models\Text;

    $registerForm = new \CForm('application.views.forms.register', new UserRegister())
?>

<!--Info board -->
<div class="row center-block text-center" id="register-block">
    <div class="step1">
        <a href="#info-board-issue" data-toggle="collapse" data-parent="#info-board-issue" id="btn-info-board-issue" class="btn btn-default text-uppercase text-center">Зарегистрироваться</a>
        <!--Info board (hide block) -->
        <div class="collapse" id="info-board-issue">
            <!--Form3-->
            <?php echo $registerForm->renderBegin(); ?>

                <div class="row fld-group">
                    <div class="input-fld col-xs-12">
                        <?php echo $registerForm['last_name']; ?>
                    </div>
                    <div class="input-fld col-xs-12">
                        <?php echo $registerForm['first_name']; ?>
                    </div>
                    <div class="input-fld col-xs-12">
                        <?php echo $registerForm['email']; ?>
                    </div>
                </div>
                <div class="row">
                    <a class="btn btn-default btn-continue" id="btn-continue-1" href="#">Продолжить</a>
                </div>

            <?php echo $registerForm->renderEnd(); ?>
        </div><!--/info-board-issue -->
    </div>

    <!--Result on submit form3 (hidden)-->
    <div class="row hidden" id="form-result">
        <div class="step2 ">
            <form action="">
                <?$this->widget('CCaptcha')?>
                <div class="input-fld col-xs-12">
                    <?php echo $registerForm['verifyCode']; ?>
                </div>
                <div class="row">
                    <a class="btn btn-default btn-continue" id="btn-continue-2">Продолжить</a>
                </div>
            </form>
        </div>

        <div class="step3 hidden">
            <div class="info-result">
                <form action="">
                    <span style="font-size: 1.5em;">В случае привлечения вас абонентом сервиса «МОТИВАТОР»<br>
                            введите сообщенный им номер личного кабинета:<br></span>

                    <div class="groupCode center-block">
                        <div class="input-fld col-xs-12">
                            <?php echo $registerForm['groupCode']; ?>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row center-block" id="issue-btns">
                <a class="btn btn-default btn-continue" id="btn-continue-3">Продолжить</a>
            </div>
        </div>

        <div class="step4 hidden">
            <div class="UserGaide">
                <form action="">
                    <input type="checkbox" name="userGaide" value="1"><label style="font-size: 1.3em; padding-left: 10px;">Я подтверждаю свое согласие с условиями <a href="#" style="text-decoration: underline;">пользовательского соглашения</a></label>
                </form>
            </div>
            
            <div class="gaide"><?php echo Text::get('gaide'); ?></div>

            <div class="row center-block" id="issue-btns">
                <a class="btn btn-default btn-continue" id="btn-continue-4">Продолжить</a>
            </div>
        </div>

        <div class="step5 hidden">
            <div class="row center-block text-center" style="margin-bottom: 30px;">
                <a href="#info-board-issue" data-toggle="collapse" data-parent="#info-board-issue" id="btn-info-board-issue-2" class="btn btn-default text-uppercase text-center">Зарегистрироваться</a>
            </div>
        </div>

        <div class="step-success hidden">
            <div class="info-result" style="font-size: 1.4em;">
                На ваш адрес отправлено сообщение <br>о присвоении вам статуса абонента сервиса
                «МОТИВАТОР»,<br> а также инструкция и пароль для входа в ваш личный кабинет
            </div>
        </div>
        <div class="step-fail hidden">
            <div class="info-result" style="font-size: 1.4em;">
                Произошла ошибка регистрации. Обратитесь к администратору сайта.
            </div>
        </div>
    </div><!--/form-result -->
    
</div><!--/info board block-->