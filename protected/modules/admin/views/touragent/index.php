<?php if($message): ?>
    <div><?php echo $message; ?></div><br>
<?php endif; ?>

<?php foreach($touragents as $touragent): ?>
    <div>
        <?php echo $touragent->name; ?>
        <a href="<?php echo Yii::app()->createUrl("admin/touragent/clear/{$touragent->id}"); ?>">Удалить туристов</a>
    </div>
<?php endforeach; ?>