<?php
/**
 * @var CForm $form
 */
?>
<h3>Рекламный блок</h3>

<?php if($message): ?>
    <div><?php echo $message; ?></div><br>
<?php endif; ?>



<table class="table table-bordered">
    <tr>
        <th>Название блока</th>
        <th>Действия</th>
    </tr>
</table>

<?php echo $form->renderBegin(); ?>
    <div class="form-group">
        <?php echo $form['name']; ?>
    </div>
<div class="form-group">
    <button type="submit" class="btn btn-default">Добавить</button>
</div>
<?php echo $form->renderEnd(); ?>