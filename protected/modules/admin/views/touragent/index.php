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
<?php foreach($touragents as $touragent): ?>
    <tr>
        <td><?php echo $touragent->name; ?></td>
        <td><?php echo count($touragent->tourists2); ?></td>
        <td><?php echo $touragent->calculateDelta(); ?></td>
        <td><?php echo $touragent->account; ?></td>
        <td><a href="<?php echo Yii::app()->createUrl("admin/touragent/clear/{$touragent->id}"); ?>">Удалить туристов</a></td>
    </tr>
<?php endforeach; ?>
</table>