<?php
/**
 * @author msoza@soxes.ch
 */

use application\models\Configuration;
?>
<p>Уважаемый соискатель скидки!</p>

<p>Напоминаю, что если в оставшийся срок вы не выберете тур и не внесёте предоплату в размере
    <?php echo Configuration::get(Configuration::MIN_DISCONT)?>% от его стоимости на счёт турагента,
    ваш личный кабинет, к сожалению, будет автоматически удалён программой сайта.</p>

<p>Для дальнейшего участия в работе системы вам понадобится новый личный кабинет.</p>

<p>Система «МОТИВАТОР».</p>


