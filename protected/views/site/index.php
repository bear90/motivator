<?php
/**
 * @var \CForm $loginForm
 * @var \CForm $taskForm
 * @var \CForm $registerForm
 * @var string $loginMessage
 * @author soza.mihail@gmail.com
 */

use application\modules\admin\models\Text;

?>
<section id="blank" class="container-fluid" data-structure="index">
    <!--Menu-->
    <div class="row" id="main-menu">
        <div class="col-md-12 col-lg-11 col-lg-offset-1">
            <?php $this->widget('application\\components\\widgets\\MenuWidget', [
              'active' => 'turistam'
            ]); ?>
        </div>
    </div>
    <!--Gallery-->
    <div class="row">
        <ul class="tourist-gallery hidden-xs">
            <li><img src="img/slide-4.jpg" alt="1"></li>
            <li><img src="img/slide-7.jpg" alt="2"></li>
            <li><img src="img/slide-8.jpg" alt="3"></li>
            <li><img src="img/slide-2.jpg" alt="4"></li>
            <li><img src="img/slide-6.jpg" alt="5"></li>
        </ul>
    </div>
    <!--Slider-->
    <div class="row" id="slider">
        <ul class="tourist-slider visible-xs-block">
            <li><img src="img/slide-4.jpg" alt="1"></li>
            <li><img src="img/slide-7.jpg" alt="2"></li>
            <li><img src="img/slide-8.jpg" alt="3"></li>
            <li><img src="img/slide-2.jpg" alt="4"></li>
            <li><img src="img/slide-6.jpg" alt="5"></li>
        </ul>
    </div>
    <!--Privet cabinet tourist-->
    <div class="center-block" id="privet-cabinet">
        <div class="row" id="main-add-buttons">
            <div class="col-md-6">
                <a href="#add-task" data-toggle="collapse"  id="btn-add-task" class="btn btn-default">РАЗМЕСТИТЬ  ЗАЯВКУ  НА  ТУР</a>
            </div>

            <div class="col-md-6">
                <?php if (!\Yii::app()->user->isUser()): ?>
                    <a href="#login-user" id="btn-user-login" class="btn btn-default">ПОКАЗАТЬ ПРЕДЛОЖЕНИЯ</a>
                <?php else: ?>
                    <a href="/#block-main-table" class="btn btn-default">ПОКАЗАТЬ ПРЕДЛОЖЕНИЯ</a>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="row <?php echo $loginMessage ? '' : 'hidden'; ?>" id="login-user">
            <div class="col-md-4 col-md-offset-7">
                <?php echo $loginForm->renderBegin(); ?>
                
                <div class="form-group">
                    <?php echo $loginForm['password']; ?>
                </div>

                <?php if ($loginMessage): ?>
                    <div class="alert alert-danger" role="alert"><?php echo $loginMessage; ?></div>
                <?php endif; ?>

                <div class="form-block button">
                    <button type="submit" class="btn btn-default btn-green">Войти</button>
                </div>

                <?php echo $loginForm->renderEnd(); ?>
            </div>
        </div>

        <div class="row hidden" id="add-task">
            <div class="col-md-6">
                <?php echo $taskForm->renderBegin(); ?>

                
                <div class="row">
                <div class="col-md-12">
                    <b>Укажите свое имя:</b>
                </div>
                
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo $taskForm['name1']; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo $taskForm['name2']; ?>
                        </div>
                    </div>
                </div>
                <span class="help-block">В случае отсутствия вашего имени в списке, выберите из него имя, наиболее близкое по звучанию к вашему</span>
                
                <div class="row">
                    <div class="col-md-12">
                        
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $taskForm['country']; ?>
                    <a href="#" id="task-add-country">+ Добавить страну</a>
                </div>

                <div class="form-group">
                    <?php echo $taskForm['tourType']; ?>
                </div>

                <div class="form-group">
                    <?php echo $taskForm['adultCount']; ?>
                </div>

                <div class="form-group">
                    <?php echo $taskForm['childCount']; ?>
                </div>

                <div class="form-group hidden">
                    <?php echo $taskForm['childAge']; ?>
                </div>

                <div class="form-group">
                    <?php echo $taskForm['days']; ?>
                </div>

                <div class="form-group">
                    <label class="control-label" for="task_startedAt">Укажите предполагаемую дату начала тура:</label>
                    <div class="input-group">
                        <div class="input-group-addon calendar"><span class="glyphicon glyphicon-calendar"></span>
                        </div>
                        <?php echo $taskForm['startedAt']; ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $taskForm['email']; ?>
                    <span class="help-block">Ваш e-mail будет скрыт от посетителей сайта и недоступен для просмотра менеджерами турагентств. Он будет использован для отправки вам информационных писем администратором сайта в связи с обслуживанием вашей заявки</span>
                </div>

                <div class="form-group">
                    <?php echo $taskForm['verifyCode']; ?>

                    <?php $this->widget('CCaptcha') ?>
                </div>

                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <?php echo $taskForm['checkbox']; ?>
                            С правилами работы сервиса и <a id="gaide-link" href="#">пользовательским соглашением</a> ознакомлен
                        </label>
                    </div>

                    <div class="gaide hidden"><?php echo Text::get('gaide'); ?></div>
                </div>

                <div class="form-block button">
                    <button type="submit" class="btn btn-default btn-green">РАЗМЕСТИТЬ ЗАЯВКУ НА ТУР</button>
                </div>

                <?php echo $taskForm->renderEnd(); ?>
            </div>
        </div>
    </div>

    <!--Discounts-->
    <div class="center-block" id="discount-attraction">
        <?php echo Text::get('turistam-slogan'); ?>
    </div>

    <div class="turistam-description">
        <?php echo Text::get('turistam-description'); ?>
    </div>

    
    <?php $this->renderPartial('partials/main-table', [
        'offerForTask' => $offerForTask,
        'entities' => $entities,
        'filterForm' => $filterForm,
        'offerForm' => $offerForm,
        'actionMessage' => $actionMessage,
    ])?>
        

</section>
