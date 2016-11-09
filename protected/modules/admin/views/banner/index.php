<h3>Рекламный блок</h3>

<?php if($message): ?>
    <div><?php echo $message; ?></div><br>
<?php endif; ?>


<?php echo CHtml::form(); ?>
<table class="table table-bordered">
    <tr>
        <th>Название</th>
        <th>Значение</th>
    </tr>
</table>

<div class="form-group">
    <button type="submit" class="btn btn-default">Сохранить</button>
</div>
<?php echo CHtml::endForm(); ?>