<table class="table table-bordered text-table">
    <tr>
        <th>Название</th>
        <th>Операции</th>
    </tr>
    <?php foreach ($templates as $template):?>
        <tr>
            <td><?php echo $template->comment; ?></td>

            <td>
                <a href="<?php echo Yii::app()->createUrl("/admin/template/edit/{$template->id}")?>" type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> редактировать
                </a>
            </td>
        </tr>
    <?php endforeach;?>
</table>