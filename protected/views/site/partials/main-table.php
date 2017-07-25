<?php
    use application\models\Entity;
?>

<div class="row" id="block-main-table">
    <div class="col-md-12">
        <h2>Таблица заявок на туры/самых выгодных предложений* по ним.</h2>

        <p>*В столбце «Самое выгодное предложение» стоимость горящих туров помечена символом <span class="glyphicon glyphicon-fire"></span>, стоимость туров при раннем бронировании помечена символом <i class="fa fa-snowflake-o" aria-hidden="true"></i>.</p>

        <?php if(!\Yii::app()->user->isUser()): ?>

        <div class="row">
            <div class="col-md-12">Вы можете выбрать интересующие вас заявки, задав параметры выбора:</div>
        </div>

        <div class="row" id="add-task-filter">
            <div class="col-md-3 filter" >
                <a href="#add-task-filter-country">страна тура</a><br>
                <a href="#add-task-filter-startedat">дата начала тура</a><br>
                <a href="#add-task-filter-adultcount">количество взрослых туристов</a>
            </div>
            <div class="col-md-6">
                <?php if($filterForm->getModel(false)->filtered()) : ?>
                    <button type="button" class="btn btn-default btn-yellow skip">ВЕРНУТЬСЯ К ПОЛНОМУ СПИСКУ ЗАЯВОК НА ТУРЫ</button>
                <?php endif; ?>
            </div>
            <div class="col-md-3">
                <?php echo $filterForm->renderBegin(); ?>
                
                <div id="add-task-filter-country" class="block hidden">
                    <div class="form-group">
                        <?php echo $filterForm['country']; ?>
                        <div class="help-block">Чтобы ускорить выбор страны,<br> введите первые буквы её названия</div>
                    </div>

                    <button type="submit" class="btn btn-default">Найти</button>
                </div>

                <div id="add-task-filter-startedat" class="block hidden">
                    <div class="form-group">
                        <label for="task_startedAt">От:</label>
                        <div class="input-group">
                            <div class="input-group-addon calendar"><span class="glyphicon glyphicon-calendar"></span>
                            </div>
                            <?php echo $filterForm['startedAtFrom']; ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="task_startedAt">До:</label>
                        <div class="input-group">
                            <div class="input-group-addon calendar"><span class="glyphicon glyphicon-calendar"></span>
                            </div>
                            <?php echo $filterForm['startedAtTo']; ?>
                        </div>
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
        
        <?php endif; ?>

        <?php if(\Yii::app()->user->isAdmin()): ?>
            <?php $this->renderPartial('partials/main-table-for-admin', [
                'entities' => $entities,
                'filtered' => true,
                'createdTaskId' => $createdTaskId
            ])?>
        <?php elseif(\Yii::app()->user->isManager()): ?>
            <?php $this->renderPartial('partials/main-table-for-manager', [
                'entities' => $entities,
                'offerForm' => $offerForm,
                'offerForTask' => $offerForTask,
                'filtered' => !empty($createdTaskId),
                'createdTaskId' => $createdTaskId
            ])?>
        <?php elseif(\Yii::app()->user->isUser()): ?>
            <?php $this->renderPartial('partials/main-table-for-user', [
                'entities' => $entities,
                'actionMessage' => $actionMessage,
                'filtered' => !empty($createdTaskId),
                'createdTaskId' => $createdTaskId
            ])?>
        <?php else: ?>
            <?php $this->renderPartial('partials/main-table-for-other', [
                'entities' => $entities,
                'filtered' => $filterForm->getModel(false)->filtered() || !empty($createdTaskId),
                'createdTaskId' => $createdTaskId
            ])?>
        <?php endif; ?>
    </div>
</div>