<?php
/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       10.06.2016
 *
 */
?>
<div class="row-fluid">
    <div class="col-md-4 col-md-offset-4">
        <?php echo $loginForm->renderBegin(); ?>
            <?php echo $loginForm['submit']; ?>
            <div class="form-group">
                <?php echo $loginForm['password']; ?>
            </div>
            <div class="checkbox">
                  <label>
                    <input type="checkbox"> Запомнить меня
                </label>
            </div>
            <?php if ($loginError): ?>
                <small class="help-block error" ><?php echo $loginError; ?></small>
            <?php endif; ?>
            <div class="form-group">
                <button type="submit" class="btn btn-default">Войти</button>
            </div>
        <?php echo $loginForm->renderEnd(); ?>
    </div>
</div>