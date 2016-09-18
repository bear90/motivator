<?php
    use application\models\Touragent;
    use application\models\Touroperator;

    $touroperatorList = \CMap::mergeArray(['-1' => "Все"], Touroperator::getList());
    $touragentList = \CMap::mergeArray(['-1' => "Все"], Touragent::getList());

    $isAktDisabled = count($entities) == 0 || $touroperatorCount !== 1 || empty($filter['start']) || empty($filter['end']);
    $isAnalizDisabled = count($entities) == 0;
    $isOperatorInfoDisabled = count($entities) == 0 || $touroperatorCount !== 1 || empty($filter['start']) || empty($filter['end']);
?>

<h2>Архив абонентов:</h2>

<?php echo CHtml::form('/admin/archive', 'get', ['class' => 'filter']); ?>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Начальная дата отчётного периода</label>
                <?php echo CHtml::textField('filter[start]', $filter['start'], [
                    'id' => 'startDate',
                    'class' => 'form-control date'
                ]); ?>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Конечная  дата отчётного периода</label>
                <?php echo CHtml::textField('filter[end]', $filter['end'], [
                    'id' => 'endDate',
                    'class' => 'form-control date'
                ]); ?>
            </div>
        </div>
        <div class="col-md-4">
            <label>Туроператоры</label>
            <ul>
                <?php foreach ($touroperatorList as $id => $name): ?>
                    <li>
                        <label>
                            <?php echo CHtml::checkBox(
                                'filter[touroperator][]', 
                                in_array($id, $filter['touroperator']), 
                                ['value' => $id])?>
                            <?php echo $name; ?>
                        </label>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
        <div class="col-md-4">
            <label>Турагенты</label>
            <ul>
            <?php foreach ($touragentList as $id => $name): ?>
                <li>
                    <label>
                        <?php echo CHtml::checkBox(
                            'filter[touragent][]', 
                            in_array($id, $filter['touragent']), 
                            ['value' => $id])?>
                        <?php echo $name; ?>
                    </label>
                </li>
            <?php endforeach ?>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-default">Найти</button>

                <a href="<?php echo Yii::app()->createUrl("admin/archive/akt1", $filter); ?>"
                    <?php if ($isAktDisabled): ?>disabled="disabled"<?php endif; ?>
                    class="btn btn-default" target="_blank">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Акт между ТО и ИП
                </a>
                
                <a href="<?php echo Yii::app()->createUrl("/admin/archive/export-info/", ['filter' => $filter])?>" 
                    <?php if ($isOperatorInfoDisabled): ?>disabled="disabled"<?php endif; ?>
                    type="button" class="btn btn-default" target="_blank">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Информация для ТО
                </a>
                
                <a href="<?php echo Yii::app()->createUrl("/admin/archive/export/", ['filter' => $filter])?>" 
                    <?php if ($isAnalizDisabled): ?>disabled="disabled"<?php endif; ?>
                    type="button" class="btn btn-default" target="_blank">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Анализ
                </a>
                
            </div>
        </div>
    </div>
<?php echo CHtml::endForm(); ?>

<?php if(count($entities)): ?>

<table class="table table-bordered text-table">
    <tr>
        <th>Турист</th>
        <th>ТО</th>
        <th>ТА</th>
        <th>Дата продажи</th>
        <th>Информация о туре</th>
    </tr>
    <?php foreach ($entities as $entity):?>
        <tr>
            <td>
                <div><b>ФИО:</b> <?php echo $entity->fullName; ?></div>
                <div><b>Email:</b> <?php echo $entity->email; ?></div>
                <div><b>Телефон:</b> <?php echo $entity->phone; ?></div>
            </td>
            <td><?php echo $entity->tour->operator ? $entity->tour->operator->name : ''; ?></td>
            <td>
                <?php echo $entity->tour->touragent->name; ?>
                <div><b>Менеджер:</b> <?php echo $entity->getManager()->name; ?></div>
            </td>
            <td><?php echo $entity->tour->getSoldAt('d.m.Y'); ?></td>
            <td>
                <div><b>Стоимость:</b> <?php echo $entity->tour->price; ?></div>
                <div><b>Предоплата:</b> <?php echo $entity->tour->prepayment; ?></div>
                <div><b>Доплата за тур:</b> <?php echo $entity->tour->getCurrentSurchange(); ?></div>
                <div><b>МВАС:</b> <?php echo $entity->tour->maxDiscont; ?></div>
                <div><b>ТАС:</b> <?php echo $entity->getAbonentDiscont(); ?></div>
                <div><b>СзП:</b> <?php echo $entity->partnerDiscont; ?></div>
                <div><b>Период тура:</b> 
                    <?php echo Yii::app()->dateFormatter->format('dd.MM.yyyy', $entity->tour->startDate); ?> -
                    <?php echo Yii::app()->dateFormatter->format('dd.MM.yyyy', $entity->tour->endDate); ?>
                </div>
            </td>
            
        </tr>
    <?php endforeach;?>
</table>
<?php else: ?>
    <p>Нет туристов в статусе "Обладатель скидки"</p>
<?php endif; ?>