<?php if($message): ?>
    <div><?php echo $message; ?></div><br>
<?php endif; ?>

<table class="table table-bordered">
    <tr>
        <th>Название</th>
        <th>Коэфициент</th>
        <th>Операции</th>
    </tr>
<?php foreach($touragents as $touragent): ?>
    <tr>
        <td><?php echo $touragent->name; ?></td>
        <td><?php echo $touragent->calculateDelta(); ?></td>
        <td><a href="<?php echo Yii::app()->createUrl("admin/touragent/clear/{$touragent->id}"); ?>">Удалить туристов</a></td>
    </tr>
<?php endforeach; ?>
</table>