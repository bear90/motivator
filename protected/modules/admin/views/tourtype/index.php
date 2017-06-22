
<?php if($message): ?>
    <div class="alert alert-success" role="alert"><?php echo $message; ?></div>
<?php endif; ?>
<?php if($error): ?>
    <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
<?php endif; ?>

<div class="row" id="tourtype">
    <div class="col-md-6">
        <h3>Страны</h3>
        <?php $this->renderPartial('partials/table' , [
            'entities' => $entities,
            'form' => $form
        ]); ?>
    </div>
</div>
