<?php
/**
 * @author msoza@soxes.ch
 */

use application\models\Configuration;
?>

<p><img src="<?php echo Configuration::get(Configuration::SITE_DOMAIN); ?>/img/logo.png"></p>

<p><b>ЛИЧНЫЙ  КАБИНЕТ № <?php echo str_pad($tourist->id, 4, "0", STR_PAD_LEFT)?></b></p>

<p><a href="<?php echo $tourist->user->getAutoLoginLink(); ?>">Перейти в личный кабинет</a></p>

<?php echo $content; ?>

<p>ПРИСОЕДИНЯЙТЕСЬ К НАМ:</p>