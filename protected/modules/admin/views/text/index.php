<?php
/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       17.06.2016
 * @package
 * @copyright   Copyright (c) 2015-2016 soXes GmBh.
 *
 * @var array pages
 *
 */
?>

<?php if($message): ?>
    <div><?php echo $message; ?></div><br>
<?php endif; ?>

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
