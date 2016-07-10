
<h3><?php echo $year?> Год</h3>

<?php echo CHtml::form(); ?>
<?php echo CHtml::hiddenField("year", $year); ?>
    <table class="table table-striped table-bordered">
        <tr>
            <th>Номер недели в году</th>
            <th>Стартовая абонентская скидка (%)</th>
            <th>Максимальная абонентская скидка (%)</th>
        </tr>
        <?php foreach($touragentParams as $i=>$item):?>
            <tr>
                <td><?php echo $i+1?> <br>(<?php echo $this->getDateLabel($year, $i+1); ?>)</td>
                <td><?php echo CHtml::activeTextField($item, "[{$i}]minDiscount"); ?></td>
                <td><?php echo CHtml::activeTextField($item, "[{$i}]maxDiscount"); ?></td>
            </tr>
        <?php endforeach;?>
    </table>
    <div class="form-group">
        <button type="submit" class="btn btn-default">Обновить</button>
    </div>
<?php echo CHtml::endForm(); ?>