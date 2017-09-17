<?php
    use application\models\entities\Configuration;
?>
<h2>Отзывы:</h2>

<?php if($message): ?>
    <div class="alert alert-success" role="alert"><?php echo $message; ?></div>
<?php endif; ?>

<ol id="feedback">
    <?php foreach((array) $entities as $entity): ?>
    <li>
        <?php echo $entity->text; ?>

        <div class="action hidden">
            <a href="<?php echo Yii::app()->createUrl("/admin/feedback/delete/{$entity->id}")?>" 
                type="button" class="btn btn-danger btn-xs">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Удалить
            </a>
        </div>
    </li>
    <?php endforeach; ?>
</ul>