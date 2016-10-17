<?php
    use application\models\defines\TouristStatus;

    $noForm = isset($noForm) ? $noForm : false;
    $readOnly = !$manager || $manager->id != $tourist->tour->managerId || $noForm;
?>
<h4>Ваш тур</h4>

<?php if($readOnly === false && $tourist->statusId == TouristStatus::GETTING_DISCONT): ?>

    <div class="inner-block text-center buttons">
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-default btn-yellow edit">РЕДАКТИРОВАТЬ</button>
                <button type="button" class="btn btn-default btn-yellow change">ЗАМЕНИТЬ ТУР</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-default btn-yellow confirm">ПРОДАТЬ  ТУР</button>
                <button type="button" class="btn btn-default btn-yellow changeAndPaid">ЗАМЕНИТЬ  И  ПРОДАТЬ ТУР</button>
            </div>
        </div>
    </div>

<?php endif; ?>


<div class="viewBlock form">
    <?php $this->renderPartial('partials/your_tour/view', [
        'tourist' => $tourist,
        'tour' => $tourist->tour,
        'isCurrentTouragent' => $manager && $tourist->tour->touragentId == $manager->touragentId,
    ]); ?>
</div>

<?php if ($noForm === false): ?>
    <div class="viewBlock paid hidden">
        <?php $this->renderPartial('partials/your_tour/confirm_paid', [
            'tourist' => $tourist,
            'tour' => $tourist->tour,
            'isCurrentTouragent' => $manager && $tourist->tour->touragentId == $manager->touragentId,
        ]); ?>
    </div>

    <?php if($readOnly === false): ?>
        <div class="editBlock">
            <?php $this->renderPartial('partials/your_tour/edit', [
                'tour' => $tourist->tour,
                'touragent' => $manager->touragent,
            ]); ?>
        </div>
    <?php endif; ?>

    <?php if($readOnly === false): ?>
        <div class="changeBlock">
            <?php $this->renderPartial('partials/your_tour/change', [
                'tour' => $tourist->tour,
                'touragent' => $manager->touragent,
            ]); ?>
        </div>

        <div class="changeAndPaidBlock">
            <?php $this->renderPartial('partials/your_tour/change_and_paid', [
                'tour' => $tourist->tour,
                'touragent' => $manager->touragent,
            ]); ?>
        </div>
    <?php endif; ?>
<?php endif; ?>


