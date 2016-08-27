<?php
    use application\modules\admin\models\Text;
?>

<?php echo Text::get('touragent-instructions'); ?>

<div class="panel-group" id="accordion-list" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading1">
      <b class="panel-title">
        <a role="button" data-toggle="collapse" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
          1. ОБЩИЙ  ПРИНЦИП НАЧИСЛЕНИЯ  СКИДКИ
        </a>
      </b>
    </div>
    <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
      <div class="panel-body">
        <?php echo Text::get('instruction_item_1'); ?>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading13">
      <b class="panel-title">
        <a role="button" data-toggle="collapse" href="#collapse13" aria-expanded="true" aria-controls="collapse13">
          2. РЕКОМЕНДАЦИИ ПО РАБОТЕ, ТЕРМИНЫ 
        </a>
      </b>
    </div>
    <div id="collapse13" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading13">
      <div class="panel-body">
        <?php echo Text::get('instruction_item_13'); ?>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading2">
      <b class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse2" aria-expanded="false" aria-controls="collapse2">
          3. ОТПРАВКА  ПРЕДЛОЖЕНИЯ  ПО  ЗАЯВКЕ  НА  ТУР
        </a>
      </b>
    </div>
    <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
      <div class="panel-body">
        <?php echo Text::get('instruction_item_2'); ?>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading3">
      <b class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse3" aria-expanded="false" aria-controls="collapse3">
          4. РЕДАКТИРОВАНИЕ  ПРЕДЛОЖЕНИЯ  ПО  ЗАЯВКЕ  НА  ТУР
        </a>
      </b>
    </div>
    <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
      <div class="panel-body">
        <?php echo Text::get('instruction_item_3'); ?>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading4">
      <b class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse4" aria-expanded="false" aria-controls="collapse4">
          5. ВЫБОР  АБОНЕНТОМ  ТУРА
        </a>
      </b>
    </div>
    <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
      <div class="panel-body">
        <?php echo Text::get('instruction_item_4'); ?>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading5">
      <b class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse5" aria-expanded="false" aria-controls="collapse5">
          6. СКИДКА  ЗА  ПРИВЛЕЧЕНИЕ
        </a>
      </b>
    </div>
    <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
      <div class="panel-body">
        <?php echo Text::get('instruction_item_5'); ?>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading6">
      <b class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse6" aria-expanded="false" aria-controls="collapse6">
          7. ЗАМЕНА  ТУРА
        </a>
      </b>
    </div>
    <div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6">
      <div class="panel-body">
        <?php echo Text::get('instruction_item_6'); ?>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading7">
      <b class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse7" aria-expanded="false" aria-controls="collapse7">
          8. ОТКАЗ  АБОНЕНТА  ОТ  ПОКУПКИ  ТУРА
        </a>
      </b>
    </div>
    <div id="collapse7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading7">
      <div class="panel-body">
        <?php echo Text::get('instruction_item_7'); ?>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading8">
      <b class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse8" aria-expanded="false" aria-controls="collapse8">
          9. ПРОДАЖА  ТУРА
        </a>
      </b>
    </div>
    <div id="collapse8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading8">
      <div class="panel-body">
        <?php echo Text::get('instruction_item_8'); ?>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading9">
      <b class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse9" aria-expanded="false" aria-controls="collapse9">
          10. БЫСТРЫЙ  ОТЪЕЗД  НА  ОТДЫХ
        </a>
      </b>
    </div>
    <div id="collapse9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading9">
      <div class="panel-body">
        <?php echo Text::get('instruction_item_9'); ?>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading10">
      <b class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse10" aria-expanded="false" aria-controls="collapse10">
          11. СОВЕТЫ  И  МАЛЕНЬКИЕ  ХИТРОСТИ
        </a>
      </b>
    </div>
    <div id="collapse10" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading10">
      <div class="panel-body">
        <?php echo Text::get('instruction_item_10'); ?>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading11">
      <b class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse11" aria-expanded="false" aria-controls="collapse11">
          12. НЕШТАТНЫЕ  СИТУАЦИИ
        </a>
      </b>
    </div>
    <div id="collapse11" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading11">
      <div class="panel-body">
        <?php echo Text::get('instruction_item_11'); ?>
      </div>
    </div>
  </div>
  <?php /* ?>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading12">
      <b class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse12" aria-expanded="false" aria-controls="collapse12">
          13. ПО  СЕКРЕТУ  ОТ  КЛИЕНТОВ…
        </a>
      </b>
    </div>
    <div id="collapse12" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading12">
      <div class="panel-body">
        <?php echo Text::get('instruction_item_12'); ?>
      </div>
    </div>
  </div>
  <?php */ ?>
</div>