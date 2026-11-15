<?php
require_once (__DIR__).'/../includes/validation.php';

//test validateValues
$valueTests = [
    [
        'id' => 1,
        'name' => 'Valid Name',
        'type' => 'Gift Card',
        'value' => 21.10,
        'points' => 2110,
        'expected' => ''
    ],
    [
        'id' => 1,
        'name' => '',
        'type' => 'Gift Card',
        'value' => 21.10,
        'points' => 2110,
        'expected' => ''
    ],
    [
        'id' => 1,
        'name' => 'Altered Type',
        'type' => 'Altered Gift Card',
        'value' => 21.10,
        'points' => 2110,
        'expected' => ''
    ],
    [
        'id' => 1,
        'name' => '0 Value Card',
        'type' => 'Gift Card',
        'value' => 0,
        'points' => 2110,
        'expected' => ''
    ],
        [
        'id' => 1,
        'name' => '0 Points Card',
        'type' => 'Gift Card',
        'value' => 21.10,
        'points' => 0,
        'expected' => ''
    ]
];

foreach ($valueTests as $test) { //needed to implode, before comparison, otherwise array object would be compared against
    $actual = validateInfo(18, $test['name'], $test['type'], $test['value'], $test['points']);
    $actual = implode(',', $actual);
    $passed = $actual === $test['expected'];
    echo '<p>' . htmlspecialchars($test['name'], ENT_QUOTES, 'UTF-8') . ': ';
    echo $passed ? 'PASS' : 'FAIL';
    echo '</p>';
}
