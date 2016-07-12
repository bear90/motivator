<?php
/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       17.06.2016
 * @package
 * @copyright   Copyright (c) 2015-2016 soXes GmBh.
 *
 * @var array templates
 *
 */
?>

<h2>Шаблоны писем:</h2>
<?php if($message): ?>
    <div><?php echo $message; ?></div><br>
<?php endif; ?>

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
