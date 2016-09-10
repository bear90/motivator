
<?php 
    use application\models\Touroperator;

    CHtml::$errorCss = 'help-block';
?>

<?php echo $touragentForm->renderBegin(); ?>
    <h2>Создание турагента</h2>
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
                    <?php echo CHtml::checkBox('Touroperator[]', false, ['value' => $id])?>
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