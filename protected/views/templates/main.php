<?php
/**
 * @author msoza@soxes.ch
 */

    use application\models\entities\Configuration;
    use application\models\Entity;

    $domain = Configuration::get(Configuration::SITE_DOMAIN);
    $user = new Entity\User($task->user);
?>


<p><b>ЗАЯВКА № <?php echo $task->id?></b></p>

<?php if(!in_array($view, array('last-notification', 'admin-deletion'))): ?>
    
    <p><a href="<?php echo $user->getAutoLoginLink(); ?>">Перейти в раздел заявки</a></p>

<?php endif; ?>

<?php echo $content; ?>
