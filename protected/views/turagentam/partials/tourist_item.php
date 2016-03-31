<?php
    $link = Yii::app()->createUrl('user/dashboard/' . $tourist->id . '?tab=tab1');
?>
<li class="clearfix">
    <span class="name">
        <a href="<?php echo $link; ?>"><?php echo $tourist->lastName . ' ' . $tourist->firstName; ?></a>
    </span>
    <span class="date"><?php echo $tourist->getTimer1("d.m.Y"); ?></span>
</li>