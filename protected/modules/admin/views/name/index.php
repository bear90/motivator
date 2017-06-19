
<?php if($message): ?>
    <div class="alert alert-success" role="alert"><?php echo $message; ?></div>
<?php endif; ?>
<?php if($error): ?>
    <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
<?php endif; ?>

<div class="row" id="user-name">
    <div class="col-md-6">
        <h3>Женские имена</h3>
        <?php $this->renderPartial('partials/table' , [
            'entities' => $female,
            'form' => $formFemale
        ]); ?>
    </div>
    
    <div class="col-md-6">
        <h3>Мужские имена</h3>
        <?php $this->renderPartial('partials/table' , [
            'entities' => $male,
            'form' => $formMale
        ]); ?>
    </div>
</div>
