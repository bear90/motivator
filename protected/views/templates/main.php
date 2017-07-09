<?php
/**
 * @author msoza@soxes.ch
 */

    use application\models\entities\Configuration;
    use application\models\Entity;

    $domain = Configuration::get(Configuration::SITE_DOMAIN);
    $user = new Entity\User($task->user);
?>

<style>
    a, p {font-size: 26px}
</style>


<p><b>ЗАЯВКА № <?php echo $task->id?></b></p>

<?php if(!in_array($view, array('last-notification'))): ?>
    
    <p><a href="<?php echo $user->getAutoLoginLink(); ?>">Перейти в раздел заявки</a></p>

<?php endif; ?>

<?php echo $content; ?>
