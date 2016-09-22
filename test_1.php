<?php
    $a = [
    '2015-09-11',
    '2015-10-08',
    '2015-11-09',
    '2015-12-07',
    '2016-01-03',
    '2016-02-03',
    '2016-03-03',
    '2016-03-31',
    '2016-05-01',
    '2016-06-02',
    '2016-06-30',
    '2016-07-26',
    '2016-08-21',
    ];

    function calc($date, $intrval)
    {
        $date->add(new DateInterval("P{$intrval}D"));
        echo "<p>" . $date->format("Y-m-d") . "</p>";

        $date->add(new DateInterval("P{$intrval}D"));
        echo "<p>" . $date->format("Y-m-d") . "</p>";
    }

    $prev = null;
    $days = [];
    foreach ($a as $value) {
        $date = new DateTime($value);
        

        if (isset($prev))
        {
            $interval = $date->diff($prev);
            $days[] = intval($interval->format('%a'));
        }
        
        $prev = $date;
    }

    var_dump($days);
    $aver = round(array_sum($days) / count($days));
    $max = max($days);
    $min = min($days);
    $otkl = round(($max-$min)/2, 0);

    echo "ever: {$aver}<br>";
    echo "max: {$max}<br>";
    echo "min: {$min}<br>";
    echo "+-{$otkl}<br>";

    echo "<h2>Average</h2>";
    calc(clone $date, $aver);

    echo "<h2>Min</h2>";
    calc(clone $date, $min);

    echo "<h2>Max</h2>";
    calc(clone $date, $max);



