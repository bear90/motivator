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

$part1 = array_filter($templates, function($item){
    return $item->position < 90;
});

$part2 = array_filter($templates, function($item){
    return $item->position >= 90 && $item->position < 190;
});

$part3 = array_filter($templates, function($item){
    return $item->position >= 190;
});
?>

<h2>Шаблоны писем:</h2>

<?php if($message): ?>
    <div><?php echo $message; ?></div><br>
<?php endif; ?>

<h3>Статус «соискатель скидки»</h3>
<?php $this->renderPartial('partials/table' , ['templates' => $part1]); ?>

<h3>Статус «получатель скидки»</h3>
<?php $this->renderPartial('partials/table' , ['templates' => $part2]); ?>

<h3>Статус «обладатель скидки»</h3>
<?php $this->renderPartial('partials/table' , ['templates' => $part3]); ?>

