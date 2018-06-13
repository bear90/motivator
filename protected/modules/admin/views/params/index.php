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
        <td>Cрок до первого предупреждения</td>
        <td><?php echo CHtml::textField('config['.Configuration::FIRST_NOTICE_TERM.']', Configuration::get(Configuration::FIRST_NOTICE_TERM), ['class' => 'form-control']); ?></td>
    </tr>
    <tr>
        <td>Cрок до второго предупреждения</td>
        <td><?php echo CHtml::textField('config['.Configuration::SECOND_NOTICE_TERM.']', Configuration::get(Configuration::SECOND_NOTICE_TERM), ['class' => 'form-control']); ?></td>
    </tr>
    <tr>
        <td>Cрок до удаления заявки</td>
        <td><?php echo CHtml::textField('config['.Configuration::LAST_NOTICE_TERM.']', Configuration::get(Configuration::LAST_NOTICE_TERM), ['class' => 'form-control']); ?></td>
    </tr>
    <tr>
        <td>Cрок продления размещения</td>
        <td><?php echo CHtml::textField('config['.Configuration::TASK_PROLONG_TERM.']', Configuration::get(Configuration::TASK_PROLONG_TERM), ['class' => 'form-control']); ?></td>
    </tr>
    <tr>
        <td>Срок действия рекламного кода доступа (часы)</td>
        <td>
            <div class="form-group">
                <?php echo CHtml::textField('config['.Configuration::CODE_LIVE_TIME.']', Configuration::get(Configuration::CODE_LIVE_TIME), ['class' => 'form-control integer']); ?>
            </div>
        </td>
    </tr>
    <tr>
        <td>Срок действия телефон_кода доступа (часы)</td>
        <td>
            <div class="form-group">
                <?php echo CHtml::textField('config['.Configuration::CODE_PHONE_LIVE_TIME.']', Configuration::get(Configuration::CODE_PHONE_LIVE_TIME), ['class' => 'form-control integer']); ?>
            </div>
        </td>
    </tr>
    <tr>
        <td>Поясняющий текст к полю "Страна тура"</td>
        <td>
            <div class="form-group">
                <?php echo CHtml::textField('config['.Configuration::TASK_DESCRIPTION_HELP.']', Configuration::get(Configuration::TASK_DESCRIPTION_HELP), ['class' => 'form-control']); ?>
            </div>
        </td>
    </tr>

    
    <?php for($i=1; $i<41; $i++): ?>
    <tr>
        <td>Время показа cлайда №<?php echo $i; ?> (сек)</td>
        <td>
            <div class="form-group">
                <?php echo CHtml::textField(
                    'config[SLIDE_SHOWING_TIME_' . $i . ']', 
                    Configuration::get("SLIDE_SHOWING_TIME_{$i}"), 
                    ['class' => 'form-control integer']
                ); ?>
            </div>
        </td>
    </tr>
    <?php endfor; ?>

</table>
<div class="form-group">
    <button type="submit" class="btn btn-default">Сохранить</button>
</div>
<?php echo CHtml::endForm(); ?>