<?php echo CHtml::beginForm(); ?>

<div class="form-group">
    <label>Номер личного кабинета</label>
    <?php echo CHtml::textField("touristId", '', ['class' => 'form-control']); ?>
</div>

<div class="form-group">
    <label>Фамилия</label>
    <?php echo CHtml::textField("touristLastName", '', ['class' => 'form-control']); ?>
</div>

<div class="form-group">
    <label>Имя</label>
    <?php echo CHtml::textField("touristFirstName", '', ['class' => 'form-control']); ?>
</div>

<div class="form-group">
    <label>Отчество</label>
    <?php echo CHtml::textField("touristMiddleName", '', ['class' => 'form-control']); ?>
</div>

<div class="form-group">
    <label>Страна отдыха</label>
    <?php echo CHtml::textField("tourCity", '', ['class' => 'form-control']); ?>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">НАЙТИ</button>
</div>
<?php echo CHtml::endForm(); ?>