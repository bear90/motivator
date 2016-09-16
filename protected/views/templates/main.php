<?php
/**
 * @author msoza@soxes.ch
 */

    use application\models\Configuration;

    $domain = Configuration::get(Configuration::SITE_DOMAIN);
?>

<style>
    a, p {font-size: 26px}
</style>

<p><img src="<?php echo $domain; ?>/img/logo-email.png"></p>


<p><b>ЛИЧНЫЙ  КАБИНЕТ № <?php echo str_pad($tourist->id, 4, "0", STR_PAD_LEFT)?></b></p>

<?php if($view != 'cabinet_deleted'): ?>
    
    <p><a href="<?php echo $tourist->user->getAutoLoginLink(); ?>">Перейти в личный кабинет</a></p>

<?php endif; ?>

<?php echo $content; ?>

<p>ПРИСОЕДИНЯЙТЕСЬ К НАМ:
    <a target="_blank" href="https://vk.com/motivatortravel"><img src="<?php echo $domain; ?>/img/soc-vk.png" alt=""></a>
    <a target="_blank" href="https://www.facebook.com/%D0%9C%D0%BE%D1%82%D0%B8%D0%B2%D0%B0%D1%82%D0%BE%D1%80-203321533372476/?__mref=message"><img src="<?php echo $domain; ?>/img/soc-fb.png" alt=""></a>
    <a target="_blank" href="http://m.ok.ru/group/52925620093131"><img src="<?php echo $domain; ?>/img/soc-od.png" alt=""></a>
</p>