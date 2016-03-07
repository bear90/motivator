<section id="tourist-cabinet" class="container-fluid tourist" data-structure="user">
    <div class="row">
        <div class="head">
            <h1>
            <?php echo $tourist->lastName; ?>
            <?php echo $tourist->firstName; ?>
            </h1>
            <?php if($tourist->phone): ?>
                <span><?php echo $tourist->phone; ?></span><br>
            <?php endif; ?>
            <span class="mail"><?php echo $tourist->email; ?></span>
            <?php if($tourist->tourCity): ?>
                <h1><b>Город покупки тура:</b> <span><?php echo $tourist->tourCity; ?></span></h1>
            <?php endif; ?>
            <h1><b>Статус:</b> <span><?php echo $tourist->status->description; ?></span></h1>
           <!-- <a href="#" class="hide-block">Скрыть</a>-->
            <a class="right-escape" href="<?php echo Yii::app()->createUrl('user/logout'); ?>">
                <span>Вых</span>
            </a>
        </div>
    </div>
    <div id="rule-tab" class="center-block">
        <div id="wrapper" class="ms_tabs <?php echo $this->activeTab; ?>" data-selected="<?php echo $this->activeTab; ?>">
            <div class="tabs-link clearfix">
                <a href="#tab1" class="tab">ВЫБОР ТУРА</a>
                <a href="#tab5" class="tab" id="fiveTab">ВАШ ТУР</a>
                <a href="#tab2" class="tab" id="secondTab">ПРИЗ</a>
                <a href="#tab3" class="tab" id="threeTab">ИНСТРУКЦИИ</a>
                <a href="#tab4" class="tab" id="fourTab">ПРАВИЛА РАБОTЫ</a>
                <a href="#tab6" class="tab" id="sixTab">ВАШ МЕНЕДЖЕР</a>
            </div>

            <div class="tab1 tabs-block clearfix" id="order-tour">
                <?php $this->renderPartial('partials/your_tour', [
                    'tourFormSubmitted' => $tourFormSubmitted,
                    'tours' => $tours
                ]); ?>
            </div>
            <div class="tab2 tabs-block">
                <div class="inner-block">
                    <h4>Приз</h4>
                    <p>Розыграш призов будет производиться <span>с 01.03.2016</span></p>
                </div>
                <a href="#" class="hide-block">Скрыть</a>
            </div>
            <div class="tab3 tabs-block">
                <div class="inner-block">
                    <h4>Инструкция</h4>
                    <p>Как я уже писал Вам ранее, я предлагаю до сделать некоторые заготовки двух вкладок, планируемых к работе (кстати, Вы можете кое что взять из ранее сделанных нами вкладок.</p>
                </div>
                <a href="#" class="hide-block">Скрыть</a>
            </div>
            <div class="tab4 tabs-block">
                <div class="inner-block">
                    <h4>Текстовый блок</h4>
                    <p>Как я уже писал Вам ранее, я предлагаю до сделать некоторые заготовки двух вкладок, планируемых к работе (кстати, Вы можете кое что взять из ранее сделанных нами вкладок.</p>
                </div>
                <a href="#" class="hide-block">Скрыть</a>
            </div>
            <div class="tab5 tabs-block">
                <div class="inner-block our-tour">
                    <h4>Ваш тур</h4>
                    <span>Страна: <span class="value">Турция</span></span>
                    <span>Город/Регион: <span class="value">Стамбул</span></span>
                    <span>Начало тура: <span class="value date">12.02.2016</span></span>
                    <span>Окончание тура: <span class="value date">22.02.2016</span></span>
                    <span>Исходная стоимость тура: <span class="value money">20 000 000 бел.руб.</span></span>
                    <span>Сумма аванса: <span class="value money">400 000 бел.руб.</span></span>
                    <span class="sell">Сумма скидки: <span class="value money">2 000 000 бел.руб.</span></span>
                    <span>Сумма к доплате: <span class="value money">17 600 000 бел.руб.</span></span>
                </div>
                <a href="#" class="hide-block">Скрыть</a>
            </div>

            <div class="tab6 tabs-block">
                <div class="inner-block">
                    <h4> скидки!</h4>
                    <p>Приветствую вас в вашем личном кабинете!</p>
                    <p>Система «МОТИВАТОР».</p>
                    <p>В течение указанного ниже срока 
                    вам предоставляется возможность выбрать тур и, внеся аванс в размере 2%, начать участвовать в накоплении скидки. 
                    В случае не внесения аванса вовремя 
                    ваш личный кабинет будет ликвидирован. 
                    Для выбора тура вам следует отправить заявку на него.</p>

                </div>
                <a href="#" class="hide-block">Скрыть</a>
            </div>


            <div class="tab7 tabs-block">
                <div class="inner-block">
                    <h4>Уважаемый соискатель скидки!</h4>
                    <p>Приветствую вас в вашем личном кабинете!</p>
                    <p>Система «МОТИВАТОР».</p>
                    <p>В течение указанного ниже срока 
                    вам предоставляется возможность выбрать тур и, внеся аванс в размере 2%, начать участвовать в накоплении скидки. 
                    В случае не внесения аванса вовремя 
                    ваш личный кабинет будет ликвидирован. 
                    Для выбора тура вам следует отправить заявку на него.</p>

                    <p>
                        <a class="tab btn btn-default btn-green" href="#tab1">Выбрать тур и заполнить заявку</a>
                    </p>
                </div>
            </div>

            <div class="info-block">
                
            </div>

            <div class="bottom-block tourists">
                <div class="sell-block">
                    <h4>Сумма вашей скидки: <b>9 999 999 <small>бел.руб.</small></b> </h4>
                </div>
                <div class="end-sell">
                   <div class="bottom-container">
                        <div class="inner-block">
                           <h4>До окончания срока внесения аванса осталось:</h4>
                       </div>
                       <div class="inner-block">
                           <div class="countdown-time clearfix" data-date="<?php echo $tourist->getTimer1(); ?>"></div>
                       </div>
                       <div class="bottom-inner-block">
                           <h4>Конечная дата внесения аванса: <b><?php echo $tourist->getTimer1('d.m.Y'); ?></b></h4>
                       </div>
                   </div>
                </div>
            </div>
        </div>​
    </div>
</section>