<?php
/**
 * @var \CForm $loginForm
 * @var \CForm $taskForm
 * @var \CForm $registerForm
 * @var string $loginError
 * @author soza.mihail@gmail.com
 */

use application\modules\admin\models\Text;
use application\models\Configuration;

    $domain = Configuration::get(Configuration::SITE_DOMAIN);
?>
<section id="blank" class="container-fluid" data-structure="index">
    <!--Menu-->
    <div class="row" id="main-menu">
        <div class="col-md-12 col-lg-11 col-lg-offset-1">
            <?php $this->widget('zii.widgets.CMenu',array(
                'items' => [
                    [
                        'label' => 'Туристам',
                        'url' => ['/'],
                        'active' => true
                    ],
                    [
                        'label' => 'Турагентам',
                        'url' => ['/turagentam'],
                    ],
                    [
                        'label' => 'Туроператорам',
                        'url' => ['/turoperatoram'],
                    ],
                    [
                        'label' => 'Контакты',
                        'url' => ['/kontakty'],
                    ]
                ],
                'htmlOptions' => ['class' => 'nav navbar-nav'],
                'itemCssClass' => 'text-uppercase'
            )); ?>
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
                <a href="#login-form" data-toggle="collapse"  id="btn-privet-cabinet" class="btn btn-default">ОЗНАКОМИТЬСЯ   С   ПРЕДЛОЖЕНИЯМИ</a>
            </div>
        </div>
        <div class="row hidden" id="add-task">
            <div class="col-md-6">
                <?php echo $taskForm->renderBegin(); ?>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <?php echo $taskForm['name1']; ?>
                        </div>
                        <div class="col-md-6">
                            <?php echo $taskForm['name2']; ?>
                        </div>
                    </div>
                    
                    <span class="help-block">В случае отсутствия вашего имени в списке, выберите из него имя, наиболее близкое по звучанию к вашему</span>
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
                    <?php echo $taskForm['startedAt']; ?>
                </div>

                <div class="form-group">
                    <?php echo $taskForm['email']; ?>
                    <span class="help-block">Ваш e-mail будет скрыт от посетителей сайта и недоступен для просмотра менеджерами турагентств. Он будет использован для отправки вам информационных писем администратором сайта в связи с обслуживанием вашей заявки</span>
                </div>

                <div class="form-group">
                    <?php echo $taskForm['verifyCode']; ?>

                    <?php $this->widget('CCaptcha') ?>
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
        <p>Проведите свой личный тендер!<br>
            Снимите <span class="text-orange">пенки</span><br>
            с бонусных программ продавцов туров!
        </p>
    </div>

    <div class="turistam-description">
        <?php echo Text::get('turistam-description'); ?>
    </div>

    <?php $this->renderPartial('partials/main-table')?>

    <div class="fixed-socseti">
        <a target="_blank" href="https://vk.com/motivatortravel"><img src="/img/soc-vk.png" alt=""></a>
        <a target="_blank" href="https://www.facebook.com/%D0%9C%D0%BE%D1%82%D0%B8%D0%B2%D0%B0%D1%82%D0%BE%D1%80-203321533372476/?__mref=message"><img src="/img/soc-fb.png" alt=""></a>
        <a target="_blank" href="http://m.ok.ru/group/52925620093131"><img src="/img/soc-od.png" alt=""></a>
        <a target="_blank" href="http://instagram.com/motivatortour"><img src="/img/soc-ig.png" alt=""></a>
    </div>
</section>
