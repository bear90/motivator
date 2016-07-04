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
        <td>
            <a href="<?php echo Yii::app()->createUrl("admin/touragent/clear/{$touragent->id}"); ?>">Удалить туристов</a><br>
            <a href="<?php echo Yii::app()->createUrl("admin/touragent/{$touragent->id}"); ?>">Редактировать</a>
        </td>
    </tr>
<?php endforeach; ?>
    <tr>
        <td>Общее</td>
        <td></td>
        <td><?php echo \Tool::calcCheckingDelta(); ?></td>
        <td></td>
        <td></td>
    </tr>
</table>

<h2>Таблица учёта баланса турагентов:</h2>
<table class="table table-bordered">
    <?php for($i=-1; $i<count($touragents); $i++): ?>
        <?php $a = isset($touragents[$i]) ? $touragents[$i] : null; ?>
        <tr>
        <?php for($j=-1; $j<count($touragents); $j++): ?>
            <?php $b = isset($touragents[$j]) ? $touragents[$j]  : null; ?>
            <?php if($i==-1 && $j>=0): ?>
                <td><?php echo $b->name; ?></td>
            <?php elseif($i>=0 && $j==-1): ?>
                <td><?php echo $a->name; ?></td>
            <?php elseif($i>=0 && $j>=0): ?>
                <td><?php echo $balance[$a->id][$b->id]; ?></td>
            <?php else: ?>
                <td></td>
            <?php endif; ?>
        <?php endfor; ?>
        </tr>
    <?php endfor; ?>
</table>