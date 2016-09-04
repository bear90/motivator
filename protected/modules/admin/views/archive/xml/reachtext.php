<?php
    $rows = explode("\n", $text);
?>

    <?php foreach ($rows as $row): ?>
        <w:p w:rsidRPr="00E8420F">
            <w:pPr>
                <w:spacing w:after="0"/>
            </w:pPr>
            <w:r w:rsidRPr="00E8420F">
                <w:t><?php echo $row; ?></w:t>
            </w:r>
        </w:p>
    <?php endforeach; ?>