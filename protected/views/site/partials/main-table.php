<?php
    use application\models\Entity;
    use application\models\forms;

    $filterForm = new \CForm('application.views.forms.task-filter-form', new forms\TaskFilterForm());
?>

<h2>Список заявок на туры/самых выгодных предложений* по ним.</h2>

<p>*В столбце «Самое выгодное предложение» стоимость горящих туров помечена символом <span class="glyphicon glyphicon-fire"></span>100€, стоимость туров при раннем бронировании помечена символом <i class="fa fa-snowflake-o" aria-hidden="true"></i>1000.</p>
<div class="row">
    <div class="col-md-12">Вы можете выбрать интересующие вас заявки, задав параметры выбора:</div>
</div>
<div class="row" id="add-task-filter">
    <div class="col-md-6 filter" >
        <a href="#add-task-filter-country">страна тура</a><br>
        <a href="#add-task-filter-startedat">дата начала тура</a><br>
        <a href="#add-task-filter-adultcount">количество взрослых туристов</a>
    </div>
    <div class="col-md-6">
        <?php echo $filterForm->renderBegin(); ?>
        
        <div id="add-task-filter-country" class="block hidden">
            <div class="form-group">
                <?php echo $filterForm['country']; ?>
            </div>

            <button type="submit" class="btn btn-default">Найти</button>
        </div>

        <div id="add-task-filter-startedat" class="block hidden">
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <?php echo $filterForm['startedAtAny']; ?>
                        Без ограничений
                    </label>
                </div>
            </div>

            <div class="form-group">
                <?php echo $filterForm['startedAtFrom']; ?>
            </div>

            <div class="form-group">
                <?php echo $filterForm['startedAtTo']; ?>
            </div>

            <button type="submit" class="btn btn-default">Найти</button>
        </div>

        <div id="add-task-filter-adultcount" class="block hidden">
            <div class="form-group">
                <?php echo $filterForm['adultCount']; ?>
            </div>

            <button type="submit" class="btn btn-default">Найти</button>
        </div>

        <?php echo $filterForm->renderEnd(); ?>
    </div>
</div>

<table class="table table-bordered main-table">
    <tr>
        <th>Дата размещения заявки на тур/<br>
         имя автора заявки/ <br>
         порядковый номер заявки</th>
        <th>Страна тура/<br>
        вид тура</th>
        <th>Количество взрослых туристов/ <br>
        количество детей (возраст)</th>
        <th>Продолжительность тура/ <br>
        предполагаемая дата <br>
        начала тура</th>
        <th>Самое <br>выгодное<br> предложение</th>
    </tr>
    <tr>
        <td>21.05.2017 <br>
            Алексей<br>
            № 121</td>
        <td>Египет/<br>
            отдых на море</td>
        <td>Взрослых: 2 чел.<br>
            Детей: 1 (5 лет),
            1 (7 лет).</td>
        <td>12 дней/<br> 20.07.2017</td>
        <td>890€</td>
    </tr>
    <tr>
        <td>18.05.2017<br>
            Наталья<br>
            № 120</td>
        <td>Литва-Польша/<br>
            шоп-тур</td>
        <td>Взрослых: 3 чел.</td>
        <td>5 дней/<br> 25.05.2017</td>
        <td>
            <div class="block"><span class="glyphicon glyphicon-fire"></span>515€</div>
            <div class="block"><i class="fa fa-snowflake-o" aria-hidden="true"></i>420€</div>
        </td>
    </tr>
    <tr>
        <td>17.05.2017<br>
            Михаил<br>
            № 119</td>
        <td>Турция/<br>
            свадебный тур</td>
        <td>Взрослых: 2 чел.</td>
        <td>14 дней/<br> 01.08.2017</td>
        <td>
            <div class="block"><i class="fa fa-snowflake-o" aria-hidden="true"></i>490€</div>
        </td>
    </tr>
    <?php foreach(Entity\Task\Repository::getAll() as $entity):
    $model = new Entity\Task($entity);
    ?>
    <tr>
        <td><?php echo $model->createdAt(); ?><br>
            <?php echo $model->data()->relName->name; ?><br>
            № <?php echo $model->data()->id; ?></td>
        <td><?php echo implode('-', $model->getCountryOptions()); ?>/<br>
            <?php echo $model->data()->relTourType->name; ?></td>
        <td>Взрослых: <?php echo $model->data()->adultCount; ?> чел.</td>
        <td><?php echo $model->data()->days; ?> дней/<br> <?php echo $model->startedAt(); ?></td>
        <td>
            <div class="block"><i class="fa fa-snowflake-o" aria-hidden="true"></i>490€</div>
        </td>
    </tr>
    <?php endforeach;?>
</table>
