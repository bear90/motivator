<?php
    use application\models\Configuration;
?>

<h2>Параметры:</h2>
<?php if($message): ?>
    <div><?php echo $message; ?></div><br>
<?php endif; ?>

<?php echo CHtml::form(); ?>
<table class="table table-bordered">
    <tr>
        <th>Название</th>
        <th>Значение</th>
    </tr>
    <tr>
        <td>Минимальная скидка</td>
        <td><?php echo CHtml::textField('config['.Configuration::MIN_DISCONT.']', Configuration::get(Configuration::MIN_DISCONT)); ?>%</td>
    </tr>
    <tr>
        <td>Максимальная скидка</td>
        <td><?php echo CHtml::textField('config['.Configuration::MAX_DISCONT.']', Configuration::get(Configuration::MAX_DISCONT)); ?>%</td>
    </tr>
    <tr>
        <td>Предоплата</td>
        <td><?php echo CHtml::textField('config['.Configuration::PREPAYMENT.']', Configuration::get(Configuration::PREPAYMENT)); ?>%</td>
    </tr>
    <tr>
        <td>Дней на выбор тура</td>
        <td><?php echo CHtml::textField('config['.Configuration::ORDER_TOUR_TIMER.']', Configuration::get(Configuration::ORDER_TOUR_TIMER)); ?> дней</td>
    </tr>
</table>
<div class="form-group">
    <button type="submit" class="btn btn-default">Сохранить</button>
</div>
<?php echo CHtml::endForm(); ?>