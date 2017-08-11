<?php
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

                <div class="desc hidden">Всего: 0</div>
            </td>
            <td>
                <a href="<?php echo Yii::app()->createUrl("admin/touragent/{$touragent->id}"); ?>">Редактировать</a><br>
                <a href="<?php echo Yii::app()->createUrl("admin/touragent/edit/{$touragent->id}"); ?>?action=<?php echo $touragent->status ? 'deactivate' : 'activate'?>">
                        <?php echo $touragent->status==0 ? 'Заблокировать' : 'Разблокировать'; ?>
                    </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="<?php echo Yii::app()->createUrl("/admin/touragent/add/")?>" type="button" class="btn btn-default">
    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Добавить
</a>
