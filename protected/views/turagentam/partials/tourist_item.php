<?php

    use application\models\defines\TouristStatus;

    $link = $tourist->statusId == TouristStatus::WANT_DISCONT
        ? Yii::app()->createUrl('user/dashboard/' . $tourist->id . '?tab=tab1')
        : Yii::app()->createUrl('user/dashboard/' . $tourist->id . '?tab=tab5');
?>
<li class="clearfix <?php echo $tourist->status->name; ?>">
    <span class="name">
        <a href="<?php echo $link; ?>"><?php echo $tourist->lastName . ' ' . $tourist->firstName; ?></a>
    </span>
    
    <?php if($tourist->statusId == TouristStatus::WANT_DISCONT): ?>
    
    <span class="date"><?php echo $tourist->getTimer1("d.m.Y"); ?></span>
    
    <?php elseif ($tourist->statusId == TouristStatus::GETTING_DISCONT): ?>

        <span class="date"><?php echo $tourist->getCounterDate("d.m.Y"); ?></span>

    <?php elseif ($tourist->statusId == TouristStatus::HAVE_DISCONT): ?>

        <span class="date"><?php echo $tourist->getCounterDate("d.m.Y"); ?></span>
    
    <?php endif;?>
</li>