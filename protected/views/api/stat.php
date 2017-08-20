<?php
    $totalCount = count($entities)
?>
<p>
    <div class="row">
        <div class="col-md-6">
            Всего за выбранные период:
        </div>
        <div class="col-md-6">
            <?php echo $totalCount; ?>
        </div>
    </div>
</p>
 
<?php if($totalCount):?>
    <p>
        <div class="row">
            <div class="col-md-6">
                В том числе по датам:
            </div>
            <div class="col-md-6">
                <?php foreach($block1 as $date => $count):?>
                    <div><?php echo $date; ?> – <?php echo $count; ?></div>
                <?php endforeach;?>
            </div>
        </div>
    </p>
     
    <p>
        <div class="row">
            <div class="col-md-6">
                Время размещения:
            </div>
            <div class="col-md-6">
                <?php foreach($block2 as $date):?>
                    <div><?php echo $date; ?></div>
                <?php endforeach;?>
            </div>
        </div>
    </p>

<?php endif;?>