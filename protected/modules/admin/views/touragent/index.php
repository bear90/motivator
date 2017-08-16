<?php
    use application\models\Entity\Touragent;
    use application\models\entities\Configuration;
?>
<h2>Турагенты:</h2>
<?php if($message): ?>
    <div><?php echo $message; ?></div><br>
<?php endif; ?>

<table class="table table-bordered">
    <tr>
        <th>Название</th>
        <th width="20">Операции</th>
    </tr>
    <?php foreach((array) $touragents as $touragent): ?>
        <tr>
            <td>
                <?php echo $touragent->name; ?><br>
                <a href="#" class="more">Количество размещённых предложений</a>

                <div class="desc hidden">Всего: <?php echo Touragent\Repository::total($touragent->id); ?></div>
            </td>
            <td>
                
                <a href="<?php echo Yii::app()->createUrl("/admin/touragent/{$touragent->id}")?>"
                    type="button" class="btn btn-default btn-xs">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Редактировать
                </a>

                <a href="<?php echo Yii::app()->createUrl("admin/touragent/edit/{$touragent->id}"); ?>?action=<?php echo $touragent->status == 1 ? 'deactivate' : 'activate'?>"
                    type="button" class="btn btn-default btn-xs">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> 
                    <?php echo $touragent->status==1 ? 'Заблокировать' : 'Разблокировать'; ?>
                </a>

                <a href="<?php echo Yii::app()->createUrl("/admin/touragent/delete/{$touragent->id}")?>" 
                    type="button" class="btn btn-danger btn-xs">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Удалить
                </a>

            </td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="<?php echo Yii::app()->createUrl("/admin/touragent/add/")?>" type="button" class="btn btn-default">
    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Добавить
</a>
