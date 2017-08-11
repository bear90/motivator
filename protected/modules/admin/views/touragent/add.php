
<?php 
    CHtml::$errorCss = 'help-block';
?>

<?php echo $touragentForm->renderBegin(); ?>
    <h2>Создание турагента</h2>

    <div class="form-group">
        <?php echo $touragentForm['name']; ?>
    </div>

    <div class="form-group">
        <?php echo $touragentForm['site']; ?>
    </div>

    <div class="form-group">
        <?php echo $touragentForm['password']; ?>
    </div>

    <div class="form-group">
        <?php echo $touragentForm['password2']; ?>
    </div>
    
    <div class="form-group">
        <button type="submit" class="btn btn-default">Сохранить</button>
    </div>
<?php echo $touragentForm->renderEnd(); ?>