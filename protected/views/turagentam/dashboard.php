<section id="blank" class="container-fluid">
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
        <div id="wrapper" class="ms_tabs" data-collapse="1">
            <div class="tabs-link clearfix" data-current="">
                <a href="#tab1" class="tab">Клиенты</a>
                <a href="#tab2" class="tab tab2" id="secondTab">Поиск Клиента</a>
                <a href="#tab3" class="tab" id="threeTab">ПОМОЩЬ</a>
                <a href="#tab4" class="tab" id="fourTab">ПРАВИЛА РАБОTЫ</a>
            </div>

            <div class="tab1 tabs-block clearfix">
                <div class="inner-block">
                    <a href="#" class="clients-link blue">Сооискатели скидки</a>
                    <a href="#" class="clients-link red">Получатели скидки</a>
                    <a href="#" class="clients-link green">Обладатели скидки</a>
                </div>

                <div class="inner-block">
                    <div class="users-block">
                        <ul class="clearfix">
                            <li class="clearfix"><span class="name">Шараленкова Мария</span><span class="date">04.01.2016</span></li>
                            <li class="clearfix"><span class="name">Первопупкинский Илья</span><span class="date">04.01.2016</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab2 tabs-block">
                <div class="inner-block">
                    <form action="/" class="clearfix">
                        <div class="form-block first">
                            <label>Номер личного кабинета</label>
                            <input type="text">
                        </div>
                        <div class="form-block second">
                            <label>Фамилия</label>
                            <input type="text">
                        </div>
                        <div class="form-block third">
                            <label>Имя</label>
                            <input type="text">
                        </div>
                        <div class="form-block four">
                            <label>Отчество</label>
                            <input type="text">
                        </div>
                        <div class="form-block five">
                            <label>Страна отдыха</label>
                            <input type="text">
                        </div>
                        <div class="form-block button">
                            <button type="button" class="btn btn-default btn-green">НАЙТИ</button>
                        </div>
                        
                    </form>
                </div>
                <a href="#" class="hide-block">Скрыть</a>
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
                    <div class="inner-block">
                        <form action="/" class="clearfix">
                            <h4>Новый клиент: <?php echo $tour->tourist->getFullName(); ?></h4>
                            <div class="form-block">
                                <label>Страна отдыха:</label>
                                <input type="text" value="<?php echo $tour->getCities(); ?>" readonly="true">
                            </div>
                            <input type="submit" value="ВОЙTИ В КАБИНЕT">
                        </form>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <a href="#" class="bottom-link hidden-xs"></a>
        </div>​
    </div>
</section>