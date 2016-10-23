<?php
    use application\models\defines\TouristStatus;
    use application\modules\admin\models\Text;

    $isUser = \Yii::app()->user->isUser();
?>
<header class="container-fluid">
    <div class="btn btn-default toggle-left">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </div>
    <a class="logo" href="/">
        <img src="/img/logo.png" alt="Motivator">
    </a>
    <div class="breadcrumbs hidden-sm hidden-xs">
        <a href="/">Туристам</a>
        <span>/</span>
        <a href="#" class="link-now">Личный кабинет абонента</a>
    </div>
</header>

<section id="tourist-cabinet" class="container-fluid tourist" 
    data-structure="user"
    data-manager-id="<?php echo $manager ? $manager->id : ''; ?>"
    data-tourist-id="<?php echo $tourist->id; ?>">
    <div class="row">
        <div class="head <?php echo $tourist->status->name; ?>">
            <h1>
            <?php echo $tourist->lastName; ?>
            <?php echo $tourist->firstName; ?>
            <?php echo $tourist->middleName; ?>
            </h1>
            <?php if($tourist->phone): ?>
                <span><?php echo $tourist->getFormatedPhone(); ?></span><br>
            <?php endif; ?>
            <span class="mail"><?php echo $tourist->email; ?></span>
            <span class="lk-label">личный кабинет  № <?php echo "{$tourist->id}"; ?></span>

            <h1><b>Статус:</b> <span><?php echo $tourist->status->description; ?></span></h1>

            <a class="right-escape" href="<?php echo Yii::app()->createUrl('user/logout'); ?>">
                <span>Вых</span>
            </a>
        </div>
    </div>
    <div id="rule-tab" class="center-block">
        <div id="wrapper" class="ms_tabs <?php echo $this->activeTab; ?>" data-selected="<?php echo $this->activeTab; ?>" data-collapse="1">
            <div class="tabs-link clearfix">
                <?php if($tourist->statusId < TouristStatus::GETTING_DISCONT): ?>
                    <a href="#tab1" class="green tab <?php echo $this->activeTab == 'tab1' ? 'active' : ''; ?>">ОТПРАВИТЬ ЗАЯВКУ</a>
                <?php endif; ?>
                <a href="#tab5" class="tab <?php echo $this->activeTab == 'tab5' ? 'active' : ''; ?>" id="fiveTab">ВАШ ТУР</a>
                <a href="#tab2" class="tab <?php echo $this->activeTab == 'tab2' ? 'active' : ''; ?>" id="secondTab">ПРИЗ</a>
                <a href="#tab3" class="tab <?php echo $this->activeTab == 'tab3' ? 'active' : ''; ?>" id="threeTab">ФОРТУНА</a>
                <a href="#tab4" class="tab <?php echo $this->activeTab == 'tab4' ? 'active' : ''; ?>" id="fourTab">ПРАВИЛА РАБОTЫ</a>
                <a href="#tab6" class="tab <?php echo $this->activeTab == 'tab6' ? 'active' : ''; ?>" id="sixTab">ВАШ МЕНЕДЖЕР</a>
            </div>

            

            <?php if($tourist->statusId < TouristStatus::GETTING_DISCONT): ?>
            <div 
                class="tab1 tabs-block clearfix" id="order-tour" 
                data-first-tour="<?php echo $tourist->phone ? 0 : 1; ?>">
                <?php $this->renderPartial('partials/tour_form', [
                    'tourFormSubmitted' => $tourFormSubmitted,
                    'tours' => $tours,
                    'tourist' => $tourist,
                    'manager' => $manager,
                    'touragent' => $touragent
                ]); ?>
            </div>
            <?php endif; ?>
            
            <div class="tab2 tabs-block">
                <div class="inner-block">
                    <?php echo Text::get('prize'); ?>
                </div>

            </div>
            <div class="tab3 tabs-block">
                <div class="inner-block">
                    <?php echo Text::get('instruction'); ?>
                </div>

            </div>
            <div class="tab4 tabs-block">
                <div class="inner-block">
                    <?php echo Text::get('rules'); ?>
                </div>

            </div>

            <div class="tab5 tabs-block" id="your-tour">

                <?php if($message): ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>

                <?php if (!$tourist->tour): ?>

                    <div class="inner-block our-tour">
                        <p>Тур не выбран!</p>
                    </div>

                <?php else:?>

                    <div class="inner-block our-tour view" data-id="<?php echo $tourist->id; ?>">
                        <?php if($tourist->statusId != TouristStatus::HAVE_DISCONT): ?>
                            <?php $this->renderPartial('partials/your_tour', [
                                'tourist' => $tourist,
                                'manager' => $manager,
                            ]); ?>
                        <?php else: ?>
                            <?php $this->renderPartial('partials/your_tour_paid', [
                                'tourist' => $tourist,
                                'manager' => $manager,
                            ]); ?>
                        <?php endif; ?>
                    </div>

                <?php endif; ?>

            </div>

            <div class="tab6 tabs-block">
                <div class="inner-block">
                    <?php if($tourist->hasManager()):?>
                        <h4><?php echo $tourist->getManager()->name; ?></h4>
                        <p><?php echo $tourist->getManager()->description; ?></p>
                        <p>
                            <a href="<?php echo $tourist->getManager()->touragent->getSiteLink(); ?>" class="link-to-touragent" target="_blank">перейти на сайт турагента</a>
                        </p>
                    <?php else: ?>
                        <p>После выбора тура вам будет выделен персональный менеджер!</p>
                    <?php endif;?>

                    <?php echo Text::get('your_manager'); ?> 
                </div>

            </div>

            
            <?php if ($tourFormSubmitted): ?>
                <div class="tab7 tabs-block">
                    <div class="send-block center">
                        <span class="arrow-ok"></span>
                        <h2>ОТПРАВЛЕНО</h2>
                        <p>Уважаемый соискатель скидки!</p>
                        <p>Ваша заявка на тур получена турагентом.</p>
                        <p>Ожидайте предложение по ней от обслуживающего вас менеджера.</p>
                        <p>Вы можете отправить несколько заявок на туры (в том числе – разным турагентам), однако в рамках одного личного кабинета вы можете приобрести только один тур.</p>
                        <br>
                        <p>Сервис «МОТИВАТОР».</p>
                    </div>
                </div>
            <?php endif; ?>

            

            

            <div class="info-block">
                <?php if($showWelcomeForm): ?>
                    <div class="inner-block message text-center">
                        <p>Уважаемый соискатель скидки!</p>
                        <p>Выберите понравившийся вам тур, заполните и отправьте заявку на него.</p>
                        <p>Сервис «МОТИВАТОР».</p>

                        <p>
                            <a class=" btn btn-default btn-green" href="<?php echo Yii::app()->createUrl('user/dashboard?tab=tab1'); ?>">ВЫБРАТЬ ТУР И ЗАПОЛНИТЬ ЗАЯВКУ</a>
                        </p>
                    </div>
                <?php endif; ?>

                <?php foreach ($frashMessages as $message): ?>
                    <div class="inner-block message">
                        <a href="#" class="remove" data-id="<?php echo $message->id; ?>">
                            <i class="glyphicon glyphicon-remove"></i>
                        </a>
                        <?php echo $message->text; ?>
                    </div>
                <?php endforeach; ?>
                
                <div class="main-content">
                <?php if($tourist->statusId < TouristStatus::GETTING_DISCONT): ?>
                    <?php foreach ($tours as $tour): ?>
                        <?php $this->renderPartial('partials/tour_item', [
                                'tour' => $tour,
                                'touragent' => $touragent,
                                'canRemove' => $isUser ? true : false,
                            ]); ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="inner-block our-tour view" data-id="<?php echo $tourist->id; ?>">
                        <?php if($tourist->statusId != TouristStatus::HAVE_DISCONT): ?>
                            <?php $this->renderPartial('partials/your_tour', [
                                'tourist' => $tourist,
                                'manager' => $manager,
                                'noForm' => true
                            ]); ?>
                        <?php else: ?>
                            <?php $this->renderPartial('partials/your_tour_paid', [
                                'tourist' => $tourist,
                                'manager' => $manager
                            ]); ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                </div>

                <?php foreach ($messages as $message): ?>
                    <div class="inner-block message">
                        <a href="#" class="remove" data-id="<?php echo $message->id; ?>">
                            <i class="glyphicon glyphicon-remove"></i>
                        </a>
                        <?php echo $message->text; ?>
                    </div>
                <?php endforeach; ?>
            </div>
                        
            <a href="#" class="bottom-link hidden-xs"></a>

            <div class="bottom-block tourists">
                <div class="sell-block">
                    <h4>Сумма вашей скидки: <b>
                    <?php echo Tool::getNewPriceText2($tourist->getTotalDiscont()); ?></b> </h4>
                </div>
                <div class="end-sell">
                   <div class="bottom-container">
                        <?php $this->renderPartial('partials/counter', [
                            'tourist' => $tourist,
                            'manager' => $manager,
                        ]);?>
                   </div>
                </div>
            </div>
        </div>​
    </div>
    

    <div class="fixed-socseti">
        <a target="_blank" href="https://vk.com/motivatortravel"><img src="/img/soc-vk.png" alt=""></a>
        <a target="_blank" href="https://www.facebook.com/%D0%9C%D0%BE%D1%82%D0%B8%D0%B2%D0%B0%D1%82%D0%BE%D1%80-203321533372476/?__mref=message"><img src="/img/soc-fb.png" alt=""></a>
        <a target="_blank" href="http://m.ok.ru/group/52925620093131"><img src="/img/soc-od.png" alt=""></a>
    </div>
</section>