<?php
    use application\models\Configuration;
?>
<h2>Турагенты:</h2>
<?php if($message): ?>
    <div><?php echo $message; ?></div><br>
<?php endif; ?>

<table class="table table-bordered">
    <tr>
        <th>Название</th>
        <th>Кол-во туристов</th>
        <th>Коэфициент</th>
        <th>Баланс</th>
        <th>Операции</th>
    </tr>
<?php foreach((array) $touragents as $touragent): ?>
    <tr>
        <td><?php echo $touragent->name; ?></td>
        <td><?php echo count($touragent->touristsGettingDiscount); ?></td>
        <td><!-- --></td>
        <td><?php echo $touragent->account; ?></td>
        <td>
            <a href="<?php echo Yii::app()->createUrl("admin/touragent/clear/{$touragent->id}"); ?>"
            onclick="return confirm('Вы уверены что хотите удалить всех туристов?')">Удалить туристов</a><br>
            <a href="<?php echo Yii::app()->createUrl("admin/touragent/{$touragent->id}"); ?>">Редактировать</a><br>
            <a href="<?php echo Yii::app()->createUrl("admin/touragent/manager/{$touragent->id}"); ?>">Управление мененджерами</a><br>
            <a href="<?php echo Yii::app()->createUrl("admin/touragent/edit/{$touragent->id}"); ?>?action=<?php echo $touragent->status ? 'deactivate' : 'activate'?>">
                    <?php echo $touragent->status ? 'Заблокировать' : 'Разблокировать'; ?>
                </a>
        </td>
    </tr>
<?php endforeach; ?>
    <tr>
        <td>Общее</td>
        <td></td>
        <td><?php echo Configuration::get(Configuration::CHECKING_DELTA); ?></td>
        <td></td>
        <td></td>
    </tr>
</table>

<a href="<?php echo Yii::app()->createUrl("/admin/touragent/add/")?>" type="button" class="btn btn-default">
    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Добавить
</a>
