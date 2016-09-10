
<?php 
    use application\models\Touroperator;

    CHtml::$errorCss = 'help-block';
    $operatorIds = array_map(function($item){
        return $item->touroperatorId;
    }, $touragent->touroperatorLinks);
?>

<?php echo $touragentForm->renderBegin(); ?>
    <h2>Редактирование турагента: <?php echo $touragent->name ?></h2>
    <?php if ($success): ?>
        <small class="help-block success" ><?php echo $success; ?></small>
    <?php endif; ?>
    <div class="form-group">
        <?php echo $touragentForm['name']; ?>
    </div>
    <div class="form-group">
        <?php echo $touragentForm['address']; ?>
    </div>
    <div class="form-group">
        <?php echo $touragentForm['site']; ?>
    </div>
    <div class="form-group">
        <?php echo $touragentForm['logo']; ?>
        <?php if($touragent->logo): ?>
            <div class="preview">
                <img src="<?php echo $touragent->getLogoSrc(); ?>" alt="">
            </div>
            <div class="checkbox">
                <label><input type="checkbox" name="deleteLogo"> Удалить логотип</label>
            </div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <?php echo $touragentForm['password']; ?>
        <?php echo $touragentForm['repeate']; ?>
    </div>
    <div class="form-group">
        <label for="">Туроператоры:</label>
        <?php foreach(Touroperator::getList() as $id => $name): ?>
            <div class="checkbox">
                <label>
                    <?php echo CHtml::checkBox('Touroperator[]', in_array($id, $operatorIds), ['value' => $id])?>
                    <?php echo $name; ?>
                </label>
            </div>
        <?php endforeach; ?>
    </div>
    
    <div class="form-group">
        <?php echo $touragentForm['currencyFactor']; ?>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-default">Сохранить</button>
    </div>
<?php echo $touragentForm->renderEnd(); ?>

<h2>Размер абонентской скидки в течение года</h2>
<div class="row">
    <div class="col-md-6">
        <?php $this->renderPartial('partials/discountEdit', [
            'year' => date('Y'),
            'touragentParams' => $this->getTouragentParams(date('Y'), $touragent->id)
        ]) ?>
    </div>
    <div class="col-md-6">
        <?php $this->renderPartial('partials/discountEdit', [
            'year' => date('Y') + 1,
            'touragentParams' => $this->getTouragentParams(date('Y') + 1, $touragent->id)
        ]) ?>
    </div>
</div>