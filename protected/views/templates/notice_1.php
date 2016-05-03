<?php
/**
 * @author msoza@soxes.ch
 */

use application\models\Configuration;
?>

<p>Уважаемый получатель скидки!</p>

<p>Помимо накопления абонентской скидки вы можете получить скидку за привлечение –  по
    <?php echo Configuration::get(Configuration::PARTNER_PERCENT)?>% от стоимости тура каждого человека,
    указавшего при своей регистрации ваш код группы.</p>

<p>Сообщите своим родственникам, друзьям, коллегам, соседям о возможности получить скидку при покупке тура и
    приобщите их к участию в работе системы.</p>

<p>Ваш код группы указан в персональных данных владельца личного кабинета.</p>

<p>Размер вашей общей скидки не ограничен!</p>

<p>Система «МОТИВАТОР».</p>
