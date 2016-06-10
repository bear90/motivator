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
<?php
$count = $summDelta = 0;
foreach((array) $touragents as $touragent):
    $delta = $touragent->calculateDelta();
    $summDelta += $delta;
    $count += $delta ? 1 : 0;
?>
    <tr>
        <td><?php echo $touragent->name; ?></td>
        <td><?php echo count($touragent->tourists2); ?></td>
        <td><?php echo $delta; ?></td>
        <td><?php echo $touragent->account; ?></td>
        <td><a href="<?php echo Yii::app()->createUrl("admin/touragent/clear/{$touragent->id}"); ?>">Удалить туристов</a></td>
    </tr>
<?php endforeach; ?>
    <tr>
        <td>Общее</td>
        <td></td>
        <td><?php echo $count ? round($summDelta/$count, 2) : 0; ?></td>
        <td></td>
        <td></td>
    </tr>
</table>