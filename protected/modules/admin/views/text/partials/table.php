<table class="table table-bordered text-table">
    <tr>
        <th>Название</th>
        <th>Операции</th>
    </tr>
    <?php foreach ($pages as $page):?>
        <tr>
            <td><?php echo $page->comment; ?></td>

            <td>
                <a href="<?php echo Yii::app()->createUrl("/admin/text/edit/{$page->id}")?>" type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> редактировать
                </a>
            </td>
        </tr>
    <?php endforeach;?>
</table>