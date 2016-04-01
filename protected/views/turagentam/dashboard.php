<section id="blank" class="container-fluid" data-structure="touragentam-dashboard">
    <div class="row">
        <div class="head">
            <h1>Рабочий кабинет турагента</h1>
            <h1 class="yellow"><?php echo $manager->name; ?></h1>
            <a class="right-escape" href="/turagentam/logout">
                <span>Вых</span>
            </a>
        </div>
    </div>
    <div id="rule-tab" class="center-block">
        <div id="wrapper" class="ms_tabs <?php echo $this->activeTab; ?>" data-selected="<?php echo $this->activeTab; ?>" data-collapse="1">
            <div class="tabs-link clearfix" data-current="">
                <a href="#tab1" class="tab <?php echo $this->activeTab == 'tab1' ? 'active' : ''; ?>">Клиенты</a>
                <a href="#tab2" class="tab <?php echo $this->activeTab == 'tab2' ? 'active' : ''; ?> tab2" id="secondTab">Поиск Клиента</a>
                <a href="#tab3" class="tab <?php echo $this->activeTab == 'tab3' ? 'active' : ''; ?>" id="threeTab">ПОМОЩЬ</a>
                <a href="#tab4" class="tab <?php echo $this->activeTab == 'tab4' ? 'active' : ''; ?>" id="fourTab">ПРАВИЛА РАБОTЫ</a>
            </div>

            <div class="tab1 tabs-block clearfix">
                <div class="inner-block tourists-tabs">
                    <a href="#want_discont" class="clients-link blue">Сооискатели скидки</a>
                    <a href="#getting_discont" class="clients-link red">Получатели скидки</a>
                    <a href="#have_discont" class="clients-link green">Обладатели скидки</a>
                </div>

                <div class="inner-block">
                    <div class="users-block hidden want_discont">
                        <ul>
                            <?php foreach($manager->getWantDiscont() as $tourist): ?>
                                <?php $this->renderPartial('partials/tourist_item', [
                                    'tourist' => $tourist
                                ]); ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div class="users-block hidden getting_discont">
                        <ul>
                            <?php foreach($manager->getGettingDiscint() as $tourist): ?>
                                <?php $this->renderPartial('partials/tourist_item', [
                                    'tourist' => $tourist
                                ]); ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div class="users-block hidden have_discont">
                        <ul>
                            <?php foreach($manager->getHaveDiscont() as $tourist): ?>
                                <?php $this->renderPartial('partials/tourist_item', [
                                    'tourist' => $tourist
                                ]); ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    
                </div>
            </div>
            <div class="tab2 tabs-block">
                <div class="inner-block">
                    <?php echo CHtml::beginForm("/turagentam/dashboard/{$manager->id}/?tab=tab2", 'post', ['class' => 'searchTourist']); ?>
                    <?php echo CHtml::hiddenField("searchTourist"); ?>
                        <div class="form-block first">
                            <label>Номер личного кабинета</label>
                            <?php echo CHtml::textField("touristId"); ?>
                        </div>
                        <div class="form-block second">
                            <label>Фамилия</label>
                            <?php echo CHtml::textField("touristLastName"); ?>
                        </div>
                        <div class="form-block third">
                            <label>Имя</label>
                            <?php echo CHtml::textField("touristFirstName"); ?>
                        </div>
                        <div class="form-block four">
                            <label>Отчество</label>
                            <?php echo CHtml::textField("touristMiddleName"); ?>
                        </div>
                        <div class="form-block five">
                            <label>Страна отдыха</label>
                            <?php echo CHtml::textField("tourCity"); ?>
                        </div>
                        <div class="form-block button">
                            <button type="submit" class="btn btn-default btn-green">НАЙТИ</button>
                        </div>

                        <?php if(count($foundTourists)): ?>
                        <div class="inner-block search-results">
                            <div class="users-block want-discont">
                                <ul>
                                    <?php foreach($foundTourists as $tourist): ?>
                                        <?php $this->renderPartial('partials/tourist_item', [
                                            'tourist' => $tourist
                                        ]); ?>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <?php endif; ?>
                        
                        <div class="cls"><!-- --></div>
                    <?php echo CHtml::endForm(); ?>
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
                    <p>Как я уже писал Вам ранее, я предлагаю до сделать некоторые заготовки двух вкладок, планируемых к работе (кстати, Вы можете кое что взять из ранее сделанных нами вкладок.</p>
                </div>
            </div>

            <div class="info-block">
                <!-- <div class="inner-block">
                    <h4>Сообщение</h4>
                    <p>Как я уже писал Вам ранее, я предлагаю до сделать некоторые заготовки двух вкладок, планируемых к работе (кстати, Вы можете кое что взять из ранее сделанных нами вкладок.</p>
                </div> -->

                <a href="#" class="bottom-link hidden-sm hidden-md hidden-lg"></a>

                <?php if(count($newTours)): ?>
                    <?php foreach($newTours as $tour): ?>
                        <?php $this->renderPartial('partials/new_tour', [
                            'tour' => $tour
                        ]); ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="inner-block">
                        <p>Нет новых клиентов</p>
                    </div>
                <?php endif; ?>
            </div>

            <a href="#" class="bottom-link hidden-xs"></a>
        </div>​
    </div>
</section>