<w:tbl>
    <w:tblPr>
        <w:tblStyle w:val="a4"/>
        <w:tblW w:w="0" w:type="auto"/>
        <w:tblLook w:val="04A0"/>
    </w:tblPr>
    <w:tblGrid>
        <w:gridCol w:w="1420"/>
        <w:gridCol w:w="1556"/>
        <w:gridCol w:w="2075"/>
        <w:gridCol w:w="1581"/>
        <w:gridCol w:w="1479"/>
        <w:gridCol w:w="1460"/>
    </w:tblGrid>
    <?php foreach($rows as $i => $entity):?>
    <w:tr>
        <w:tc>
            <w:p>
                <w:r>
                    <w:t><?php echo ($i+1); ?></w:t>
                </w:r>
            </w:p>
        </w:tc>
        <w:tc>
            <w:p>
                <w:r>
                    <w:t><?php echo $entity->fullName; ?></w:t>
                </w:r>
            </w:p>
        </w:tc>
        <w:tc>
            <w:p>
                <w:r>
                    <w:t><?php echo $entity->phone; ?></w:t>
                </w:r>
            </w:p>
        </w:tc>
        <w:tc>
            <w:p>
                <w:r>
                    <w:t><?php echo $entity->tour->getSoldAt('d.m.Y'); ?></w:t>
                </w:r>
            </w:p>
        </w:tc>
        <w:tc>
            <w:p>
                <w:r>
                    <w:t><?php echo $entity->tour->price; ?></w:t>
                </w:r>
            </w:p>
        </w:tc>
        <w:tc>
            <w:p>
                <w:r>
                    <w:t><?php echo round($entity->tour->price * $percent/100, 2); ?></w:t>
                </w:r>
            </w:p>
        </w:tc>
    </w:tr>
    <?php endforeach;?>
</w:tbl>