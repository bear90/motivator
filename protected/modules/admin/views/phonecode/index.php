
<?php if($message): ?>
    <div class="alert alert-success" role="alert"><?php echo $message; ?></div>
<?php endif; ?>
<?php if($error): ?>
    <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
<?php endif; ?>

<div class="row" id="code">
    <div class="col-md-6">
        <h3>Телефонные коды</h3>
        
        <?php echo $form->renderBegin(); ?>
            
            <div class="form-group">
                <?php echo $form['date_from']; ?>
            </div>
            <div class="form-group">
                <?php echo $form['date_to']; ?>
            </div>

            <button type="submit" class="btn btn-default">Найти</button>
        <?php echo $form->renderEnd(); ?>

<p><!-- --></p>
<p><!-- --></p>

        <div class="row">
            <div class="col-md-12">
                <b>Количество кодов: <?php echo $entities_count; ?></b>
            </div>
        </div>


    </div>
</div>
