
<?php 
    use application\models\Touroperator;

    CHtml::$errorCss = 'help-block';
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