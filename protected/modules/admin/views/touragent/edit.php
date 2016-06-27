<?php CHtml::$errorCss = 'help-block'; ?>

<?php echo $touragentForm->renderBegin(); ?>
    <h2>Редактирование турагента: <?php echo $touragent->name ?></h2>
    <?php if ($success): ?>
        <small class="help-block success" ><?php echo $success; ?></small>
    <?php endif; ?>
    <div class="form-group">
        <?php echo $touragentForm['name']; ?>
    </div>
    <div class="form-group">
        <?php echo $touragentForm['site']; ?>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-default">Сохранить</button>
    </div>
<?php echo $touragentForm->renderEnd(); ?>

<h2>Размер абонентской скидки в течение года</h2>
<div class="row">
    <div class="col-md-6">
        <?php $this->renderPartial('partials/discountEdit', [
            'year' => date('Y')
        ]) ?>
    </div>
    <div class="col-md-6">
        <?php $this->renderPartial('partials/discountEdit', [
            'year' => date('Y') + 1
        ]) ?>
    </div>
</div>