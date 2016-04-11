<?php
/**
 * @author msoza@soxes.ch
 */
use application\models\Configuration;
?>
<p>Уважаемый соискатель скидки!</p>

<p>В течение <?php echo Configuration::get(Configuration::ORDER_TOUR_TIMER)?>-и дней вам предоставляется
    возможность выбрать тур и, внеся за него предоплату в размере
    <?php echo Configuration::get(Configuration::PREPAYMENT)?>% на счёт турагента, начать участвовать в
накоплении абонентской скидки.</p>

<p>Для выбора тура вам следует отправить заявку на него.</p>

<p>Выберите понравившийся вам тур!</p>

<p>Система «МОТИВАТОР».</p>

