<?php
    use application\models\entities\Configuration;
?>

<h2>Параметры:</h2>
<?php if($message): ?>
    <div><?php echo $message; ?></div><br>
<?php endif; ?>

<?php echo CHtml::form(); ?>
<table class="table table-bordered">
    <tr>
        <th style="width: 40%">Название</th>
        <th>Значение</th>
    </tr>
    <tr>
        <td>Уведомление при размещении заявки</td>
        <td><?php echo CHtml::textField('config['.Configuration::PARAM_SENT_EMAIL_MESSAGE.']', Configuration::get(Configuration::PARAM_SENT_EMAIL_MESSAGE), ['class' => 'form-control']); ?></td>
    </tr>
</table>
<div class="form-group">
    <button type="submit" class="btn btn-default">Сохранить</button>
</div>
<?php echo CHtml::endForm(); ?>