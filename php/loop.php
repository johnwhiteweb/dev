<?php
$list = array(
    '1' => 1,
    '2' => 2,
    '3' => 3,
    '4' =>  array (
        '1' => 1,
        '2' => 2,
        '3' => 3,
        '4' =>  array ( '1' => 1,
        '2' => 2,
        '3' => 3,
        '4' =>  4
    )
    )
);

foreach ($list as $key => $value) {
    # code...
    print_r($key . " : " . $value);
};