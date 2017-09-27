<?php
/**
 * @var \CForm $loginForm
 * @var \CForm $taskForm
 * @var \CForm $registerForm
 * @var string $loginMessage
 * @author soza.mihail@gmail.com
 */

use application\modules\admin\models\Text;
use application\models\entities\Configuration;

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
            <li><img src="img/site-1.jpg" alt="1"></li>
            <li><img src="img/site-2.jpg" alt="2"></li>
            <li><img src="img/site-3.jpg" alt="3"></li>
            <li><img src="img/site-4.jpg" alt="4"></li>
            <li><img src="img/site-5.jpg" alt="5"></li>
        </ul>
    </div>
    <!--Slider-->
    <div class="row" id="slider">
        <ul class="tourist-slider visible-xs-block">
            <li><img src="img/site-1.jpg" alt="1"></li>
            <li><img src="img/site-2.jpg" alt="2"></li>
            <li><img src="img/site-3.jpg" alt="3"></li>
            <li><img src="img/site-4.jpg" alt="4"></li>
            <li><img src="img/site-5.jpg" alt="5"></li>
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
                    <a href="#login-user" id="btn-user-login" class="btn btn-default">ВОЙТИ В РАЗДЕЛ ЗАЯВКИ</a>
                <?php else: ?>
                    <a href="/#block-main-table" class="btn btn-default">ВОЙТИ В РАЗДЕЛ ЗАЯВКИ</a>
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

                <div class="form-group combobox">
                    <label class="with-help">мужское</label>
                    <div class="help-block above">Чтобы ускорить выбор имени введите его первые буквы</div>
                    <?php echo $taskForm['name1']; ?>
                </div>

                <div class="form-group combobox">
                    <label class="with-help">женское</label>
                    <div class="help-block above">Чтобы ускорить выбор имени введите его первые буквы</div>
                    <?php echo $taskForm['name2']; ?>
                </div>

                <div class="form-group combobox">
                    <label class="with-help">Укажите страну/страны тура:</label>
                    <div class="help-block above">Для выбора страны введите первые буквы её названия</div>
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
                    <label class="control-label" for="task_startedAt">Укажите планируемую дату начала тура:</label>
                    <div class="input-group">
                        <div class="input-group-addon calendar"><span class="glyphicon glyphicon-calendar"></span>
                        </div>
                        <?php echo $taskForm['startedAt']; ?>
                    </div>
                </div>

                <?php
                /*<div class="form-group">
                    <?php echo $taskForm['planPrice']; ?>
                </div>
                */?>

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

    <div id="main-slider">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="wraper">
                    <?php for($i=1; $i<10/*34*/; $i++): ?>
                        <img src="/img/slider-<?php echo $i; ?>.jpg" alt=""
                        data-delay="<?php echo Configuration::get("SLIDE_SHOWING_TIME_{$i}"); ?>">
                    <?php endfor; ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2 action">
                <a href="#" class="backward hidden"><span class="glyphicon glyphicon-fast-backward"></span></a>
                <a href="#" class="prev"><span class="glyphicon glyphicon-step-backward"></span></a>
                <a href="#" class="play"><span class="glyphicon glyphicon-play"></span></a>
                <a href="#" class="pause hidden"><span class="glyphicon glyphicon-pause"></span></a>
                <a href="#" class="next"><span class="glyphicon glyphicon-step-forward"></span></a>
            </div>
        </div>
    </div>

    <div class="row" id="ticker">
        <div class="col-md-12 text"><?php echo Text::get('touristam-cout-tourgents'); ?></div>

        <div class="col-md-12">
            <marquee scrollamount="20">
                <?php foreach($touragentNames as $name): ?>
                    <span><?php echo $name; ?></span><span class="circle"></span>
                <?php endforeach; ?>
            </marquee>
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
        'createdTaskId' => $createdTaskId
    ])?>

    <?php if(!\Yii::app()->user->isManager()): ?>
    <?php $this->renderPartial('partials/feedback', [
        'feedbackForm' => $feedbackForm,
    ]); ?>
    <?php endif; ?>
        

</section>
