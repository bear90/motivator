<?php
/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       31.06.2016
 * @package
 * @copyright   Copyright (c) 2015-2016 soXes GmBh.
 *
 */
?>

<h2>Изменить пароль:</h2>

<?php if($message): ?>
    <div class="alert alert-success" role="alert"><?php echo $message; ?></div>
<?php endif; ?>

<div class="row">
    <div class="col-md-4">
        <?php echo $passwordForm->renderBegin(); ?>
        
        <div class="form-group">
            <?php echo $passwordForm['password']; ?>
        </div>
        
        <div class="form-group">
            <?php echo $passwordForm['password2']; ?>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>

        <?php echo $passwordForm->renderEnd(); ?>
    </div>
</div>

