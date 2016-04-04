<?php
    $link = Yii::app()->createUrl('user/dashboard/' . $tourist->id . '?tab=tab1');
?>
<li class="clearfix <?php echo $tourist->status->name; ?>">
    <span class="name">
        <a href="<?php echo $link; ?>"><?php echo $tourist->lastName . ' ' . $tourist->firstName; ?></a>
    </span>
    
    <?php if($tourist->statusId == \application\models\defines\TouristStatus::WANT_DISCONT): ?>
    
    <span class="date"><?php echo $tourist->getTimer1("d.m.Y"); ?></span>
    
    <?php elseif ($tourist->statusId == \application\models\defines\TouristStatus::GETTING_DISCONT): ?>
    
    <span class="date"><?php echo $tourist->getTimer2("d.m.Y"); ?></span>
    
    <?php endif;?>
</li>