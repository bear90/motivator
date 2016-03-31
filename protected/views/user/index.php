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
        <a href="#" class="link-now">Личный кабинет туриста</a>
    </div>
    <div class="lk-block ">
        <span>ЛИЧНЫЙ КАБИНЕТ <b>№<?php echo $tourist->id; ?></b></span>
    </div>
</header>

<section id="tourist-cabinet" class="container-fluid tourist" data-structure="user">
    <div class="row">
        <div class="head">
            <h1>
            <?php echo $tourist->lastName; ?>
            <?php echo $tourist->firstName; ?>
            <?php echo $tourist->middleName; ?>
            </h1>
            <?php if($tourist->phone): ?>
                <span><?php echo $tourist->getFormatedPhone(); ?></span><br>
            <?php endif; ?>
            <span class="mail"><?php echo $tourist->email; ?></span>
            <?php if($tourist->tourCity): ?>
                <h1><b>Город покупки тура:</b> <span><?php echo $tourist->tourCity; ?></span></h1>
            <?php endif; ?>
            <h1><b>Статус:</b> <span><?php echo $tourist->status->description; ?></span></h1>

            <a class="right-escape" href="<?php echo Yii::app()->createUrl('user/logout'); ?>">
                <span>Вых</span>
            </a>
        </div>
    </div>
    <div id="rule-tab" class="center-block">
        <div id="wrapper" class="ms_tabs <?php echo $this->activeTab; ?>" data-selected="<?php echo $this->activeTab; ?>" data-collapse="1">
            <div class="tabs-link clearfix">
                <a href="#tab1" class="tab <?php echo $this->activeTab == 'tab1' ? 'active' : ''; ?>">ВЫБОР ТУРА</a>
                <a href="#tab5" class="tab <?php echo $this->activeTab == 'tab5' ? 'active' : ''; ?>" id="fiveTab">ВАШ ТУР</a>
                <a href="#tab2" class="tab <?php echo $this->activeTab == 'tab2' ? 'active' : ''; ?>" id="secondTab">ПРИЗ</a>
                <a href="#tab3" class="tab <?php echo $this->activeTab == 'tab3' ? 'active' : ''; ?>" id="threeTab">ИНСТРУКЦИИ</a>
                <a href="#tab4" class="tab <?php echo $this->activeTab == 'tab4' ? 'active' : ''; ?>" id="fourTab">ПРАВИЛА РАБОTЫ</a>
                <a href="#tab6" class="tab <?php echo $this->activeTab == 'tab6' ? 'active' : ''; ?>" id="sixTab">ВАШ МЕНЕДЖЕР</a>
            </div>

            
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
            <div class="tab2 tabs-block">
                <div class="inner-block">
                    <h4>Приз</h4>
                    <p>Розыграш призов будет производиться <span>с 01.03.2016</span></p>
                </div>

            </div>
            <div class="tab3 tabs-block">
                <div class="inner-block">
                    <h4>Инструкция</h4>
                    <p>Как я уже писал Вам ранее, я предлагаю до сделать некоторые заготовки двух вкладок, планируемых к работе (кстати, Вы можете кое что взять из ранее сделанных нами вкладок.</p>
                </div>

            </div>
            <div class="tab4 tabs-block">
                <div class="inner-block">
                    <h4>Текстовый блок</h4>
                    <p>Как я уже писал Вам ранее, я предлагаю до сделать некоторые заготовки двух вкладок, планируемых к работе (кстати, Вы можете кое что взять из ранее сделанных нами вкладок.</p>
                </div>

            </div>
            <div class="tab5 tabs-block">
                <div class="inner-block our-tour">
                    <p>Тур не выбран!</p>
                </div>
                <!-- <div class="inner-block our-tour">
                    <h4>Ваш тур</h4>
                    <span>Страна: <span class="value">Турция</span></span>
                    <span>Город/Регион: <span class="value">Стамбул</span></span>
                    <span>Начало тура: <span class="value date">12.02.2016</span></span>
                    <span>Окончание тура: <span class="value date">22.02.2016</span></span>
                    <span>Исходная стоимость тура: <span class="value money">20 000 000 бел.руб.</span></span>
                    <span>Сумма аванса: <span class="value money">400 000 бел.руб.</span></span>
                    <span class="sell">Сумма скидки: <span class="value money">2 000 000 бел.руб.</span></span>
                    <span>Сумма к доплате: <span class="value money">17 600 000 бел.руб.</span></span>
                </div> -->

            </div>

            <div class="tab6 tabs-block">
                <div class="inner-block">
                    <p>После выбора тура вам будет выделен персональный менеджер!</p>
                </div>

            </div>

            <div class="tab7 tabs-block">
            <?php if ($tourFormSubmitted): ?>
                <div class="send-block center">
                    <span class="arrow-ok"></span>
                    <h2>ОТПРАВЛЕНО</h2>
                    <p>Ваша заявка отправлена турагенту!</p>
                    <p>В Вашем личном кабинете и по почте ожидайте сообщения с предложениями туров  согласно заявке, а также звонок Вашего менеджера.</p>
                    <p>Для отправки заявок нескольким турагентам воспользуйтесь кнопкой «ВЫБОР ТУРА».</p>
                    <br>
                    <p>Желаю вам удачного выбора тура!<br>Система «МОТИВАТОР».</p>
                </div>
                
            <?php else: ?>
                <h4>Уважаемый соискатель скидки!</h4>
                <p>Приветствую вас в вашем личном кабинете!</p>
                <p>Выберите понравившийся Вам тур и заполните заявку на него.</p>
                <p>Система «МОТИВАТОР».</p>

                <p>
                    <a class=" btn btn-default btn-green" href="#tab1">ВЫБРАТЬ ТУР И ЗАПОЛНИТЬ ЗАЯВКУ</a>
                </p>
            <?php endif; ?>
            </div>

            <div class="info-block">
                
            </div>

            <div class="bottom-block tourists">
                <div class="sell-block">
                    <h4>Сумма вашей скидки: <b>99 999 999 <small>бел.руб.</small></b> </h4>
                </div>
                <div class="end-sell">
                   <div class="bottom-container">
                        <div class="inner-block">
                           <h4>До окончания срока внесения предоплаты осталось:</h4>
                       </div>
                       <div class="inner-block">
                           <div class="countdown-time clearfix" data-date="<?php echo $tourist->getTimer1(); ?>"></div>
                       </div>
                       <div class="bottom-inner-block">
                           <h4>Конечная дата внесения предоплаты: <b><?php echo $tourist->getTimer1('d.m.Y'); ?></b></h4>
                       </div>
                   </div>
                </div>
            </div>
        </div>​
    </div>
</section>