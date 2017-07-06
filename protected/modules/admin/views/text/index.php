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

$part1 = array_filter($pages, function($item){
    return $item->position < 110;
});

$part2 = array_filter($pages, function($item){
    return $item->position >= 110 && $item->position < 150;
});

$part3 = array_filter($pages, function($item){
    return $item->position >= 150 && $item->position < 160;
});

$part4 = array_filter($pages, function($item){
    return $item->position >= 160 && $item->position < 170;
});

$part5 = array_filter($pages, function($item){
    return $item->position >= 170 && $item->position < 210;
});

$part6 = array_filter($pages, function($item){
    return $item->position >= 210;
});
?>

<?php if($message): ?>
    <div><?php echo $message; ?></div><br>
<?php endif; ?>

<h3>Страница «ТУРИСТАМ»</h3>
<?php $this->renderPartial('partials/table' , ['pages' => $part1]); ?>

<h3>Страница «ТУРАГЕНТАМ»</h3>
<?php $this->renderPartial('partials/table' , ['pages' => $part2]); ?>

<h3>Страница «О ПОРТАЛЕ»</h3>
<?php $this->renderPartial('partials/table' , ['pages' => $part3]); ?>

<h3>Страница «КОНТАКТЫ»</h3>
<?php $this->renderPartial('partials/table' , ['pages' => $part4]); ?>

<h3>Личный кабинет абонента</h3>
<?php $this->renderPartial('partials/table' , ['pages' => $part5]); ?>

<h3>Рабочий кабинет турагента»</h3>
<?php $this->renderPartial('partials/table' , ['pages' => $part6]); ?>