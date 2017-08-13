<?php
    use application\modules\admin\models\Text;
?>

<section id="blank" class="container-fluid" data-structure="touragentam-dashboard"
    data-manager-id="<?php echo $manager->id; ?>"
    data-touragent-id="<?php echo $manager->touragent->id; ?>">
    <div class="row">
        <div class="head">
            <h1 class="touragentName"><?php echo $manager->touragent->name; ?></h1>
            <h1>Рабочий кабинет турагента</h1>
            <h1 class="yellow">
                <?php echo $manager->name; ?>
                <?php if(!$manager->boss): ?>
                <span class="bonus"><?php echo $manager->bonus; ?></span>
                <?php endif; ?>
            </h1>
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
                <a href="/turagentam/dashboard/<?php echo $manager->id; ?>?tab=tab4" target="_blank" class="tab <?php echo $this->activeTab == 'tab4' ? 'active' : ''; ?>" id="fourTab">РАСЧЁТ</a>
            </div>

            <div class="tab1 tabs-block clearfix">
                <div class="inner-block tourists-tabs">
                    <a href="#want_discont" class="clients-link blue">Cоискатели скидки</a>
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
                            <?php foreach($manager->getGettingDiscount() as $tourist): ?>
                                <?php $this->renderPartial('partials/tourist_item', [
                                    'tourist' => $tourist
                                ]); ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div class="users-block hidden have_discont">
                        <ul>
                            <?php foreach($manager->getHaveDiscount() as $tourist): ?>
                                <?php $this->renderPartial('partials/tourist_item', [
                                    'tourist' => $tourist
                                ]); ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    
                </div>
            </div>
            <div class="tab2 tabs-block search">
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

                        <div class="inner-block search-results hidden" id="search-results"><!-- --></div>
                        
                        <div class="cls"><!-- --></div>
                    <?php echo CHtml::endForm(); ?>
                </div>
            </div>

            <div class="tab3 tabs-block help">
                <ul class="nav nav-pills motiv" role="tablist">
                    <li role="presentation" class="active"><a data-toggle="pill" href="#instructions">Инструкции</a></li>
                    <li role="presentation"><a data-toggle="pill" href="#ask-question">Задать вопрос</a></li>
                    <li role="presentation"><a data-toggle="pill" href="#consult">Телефонная консультация</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="instructions">
                    <?php $this->renderPartial('partials/tab-help/instructions'); ?>
                    </div>
                    
                    <div role="tabpanel" class="tab-pane" id="ask-question">
                    <?php $this->renderPartial('partials/tab-help/ask-question'); ?>
                    </div>

                    <div role="tabpanel" class="tab-pane" id="consult">
                    <?php echo Text::get('touragent-consult'); ?>
                    </div>
                </div>
            </div>

            <div class="tab4 tabs-block raschet">
                <ul class="nav nav-pills motiv" role="tablist">
                    <li role="presentation" class="active"><a data-toggle="pill" href="#choice-tour">ВЫБОР ТУРА</a></li>
                    <li role="presentation"><a data-toggle="pill" href="#change-tour">ЗАМЕНА ТУРА</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="choice-tour">
                    <?php $this->renderPartial('partials/tab4/choice-tour'); ?>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="change-tour">
                    <?php $this->renderPartial('partials/tab4/change-tour'); ?>
                    </div>
                </div>
            </div>

            <div class="info-block orders">

                <a href="#" class="bottom-link hidden-sm hidden-md hidden-lg hidden"></a>

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

            <div id="alarm-message" class="alert alert-warning" role="alert">ПОЛУЧЕНА  НОВАЯ  ЗАЯВКА  НА  ТУР!
                <button type="button" class="close" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <audio controls id="alarm-audio">
                <source src="/audio/new-message.ogg" type="audio/ogg">
                <source src="/audio/new-message.mp3" type="audio/mpeg">
            </audio>

            <a href="#" class="bottom-link hidden-xs hidden"></a>
        </div>​
    </div>
</section>