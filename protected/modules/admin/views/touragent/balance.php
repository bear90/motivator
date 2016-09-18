<h2>Таблица учёта баланса турагентов:</h2>

<?php if($message): ?>
    <div><?php echo $message; ?></div><br>
<?php endif; ?>

<table class="table table-bordered balance">
    <?php 
        $buf = [];
        foreach ($touragents as $a) {
            foreach ($touragents as $b) {
                if ($a->id == $b->id || array_intersect(["{$a->id}-{$b->id}", "{$b->id}-{$a->id}"], $buf))
                {
                    continue;
                }
                $buf[] = "{$a->id}-{$b->id}";

                print "
                <tr>
                    <th>{$a->name}</th>
                    <th></th>
                    <th>{$b->name}</th>
                </tr>";
                foreach ($balance as $item) {
                    $key = $item['type'];
                    $value = $item['amount'];
                    switch (true) {
                        // Right arrow
                        case $key == "{$a->id}-{$b->id}":
                            print "<tr>";
                            print "<td>{$value}</td>";
                            print '<td><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></td>';
                            print "<td></td>";
                            print "</tr>";
                            break;
                        
                        // Left arrow
                        case $key == "{$b->id}-{$a->id}":
                            print "<tr>";
                            print "<td></td>";
                            print '<td><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></td>';
                            print "<td>{$value}</td>";
                            print "</tr>";
                            break;
                    }
                }
                print "</tr>";
            }
        }
    ?>
</table>

<a href="<?php echo Yii::app()->createUrl("/admin/touragent/clear-discont")?>" type="button" class="btn btn-default"
    onclick="return confirm('Вы уверены что хотите очистить таблицу?')">
    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Очистить таблицу от лишних записей
</a>


    