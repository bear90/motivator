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
        <td>Стартовая скидка для писем</td>
        <td><?php echo CHtml::textField('config['.Configuration::MIN_DISCONT.']', Configuration::get(Configuration::MIN_DISCONT)); ?>%</td>
    </tr>
    <tr>
        <td>Максимально возможная скидка для писем</td>
        <td><?php echo CHtml::textField('config['.Configuration::MAX_DISCONT.']', Configuration::get(Configuration::MAX_DISCONT)); ?>%</td>
    </tr>
    <tr>
        <td>Размер предоплаты</td>
        <td><?php echo CHtml::textField('config['.Configuration::PREPAYMENT.']', Configuration::get(Configuration::PREPAYMENT)); ?>%</td>
    </tr>
    <tr>
        <td>Срок для выбора тура</td>
        <td><?php echo CHtml::textField('config['.Configuration::ORDER_TOUR_TIMER.']', Configuration::get(Configuration::ORDER_TOUR_TIMER)); ?> дней</td>
    </tr>
    <tr>
        <td>Срок до последнего предупреждения</td>
        <td><?php echo CHtml::textField('config['.Configuration::LAST_REMIND.']', Configuration::get(Configuration::LAST_REMIND)); ?> дней</td>
    </tr>
    <tr>
        <td>Период адаптации туриста</td>
        <td><?php echo CHtml::textField('config['.Configuration::ADAPTATION_PERIOD.']', Configuration::get(Configuration::ADAPTATION_PERIOD)); ?> дней</td>
    </tr>
    <tr>
        <td>Срок до удаления ЛК</td>
        <td><?php echo CHtml::textField('config['.Configuration::DELETE_USER_TIMER.']', Configuration::get(Configuration::DELETE_USER_TIMER)); ?> дней</td>
    </tr>
    <tr>
        <td>Интервал дублирующих отправок (ш.№10)</td>
        <td><?php echo CHtml::textField('config['.Configuration::TEMPLATE_10_PERIOD.']', Configuration::get(Configuration::TEMPLATE_10_PERIOD)); ?> дней</td>
    </tr>
    <tr>
        <td>Интервал дублирующих отправок (ш.№11)</td>
        <td><?php echo CHtml::textField('config['.Configuration::TEMPLATE_11_PERIOD.']', Configuration::get(Configuration::TEMPLATE_11_PERIOD)); ?> дней</td>
    </tr>
    <tr>
        <td>Интервал дублирующих отправок (ш.№12)</td>
        <td><?php echo CHtml::textField('config['.Configuration::TEMPLATE_12_PERIOD.']', Configuration::get(Configuration::TEMPLATE_12_PERIOD)); ?> дней</td>
    </tr>
    <tr>
        <td>Проверочный коэфициент</td>
        <td>
            <?php echo CHtml::textField('config['.Configuration::DELTA.']', Configuration::get(Configuration::DELTA)); ?>
        </td>
    </tr>
</table>
<div class="form-group">
    <button type="submit" class="btn btn-default">Сохранить</button>
</div>
<?php echo CHtml::endForm(); ?>