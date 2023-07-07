<?php

namespace App\Testdome;




function fib($n) {
    if ($n == 0) return [];
    if ($n > 2){
        $sequence = fib($n - 1);
        $nextNumber = $sequence[$n - 2] + $sequence[$n - 3];
        $sequence[] = $nextNumber;
        return $sequence;
    } else {
        return [0,1];
    }
}

// this knoww also as FizBuzz
function tiktak() {
    for ($i = 1; $i <= 100; $i++) {
        if ($i % 3 == 0 && $i % 5 == 0) {
            echo "TicTac";
        } elseif ($i % 3 == 0) {
            echo "Tic";
        } elseif ($i % 5 == 0) {
            echo "Tac";
        } else {
            echo $i;
        }
    
        echo " ";
    }
}

function findLargestElement($array) {
    $largest = null;

    foreach ($array as $element) {
        if ($largest === null || $element > $largest) {
            $largest = $element;
        }
    }

    return $largest;
}
$fibonacciSequence = fib(13);
print_r($fibonacciSequence);
function getLatestDayOfMonth($date) {
    $dateFormat = 'd-m-Y';
    $parsedDate = \DateTime::createFromFormat($dateFormat, $date);
    if (!$parsedDate) {
        return null; // Return null for invalid date format
    }

    $year = $parsedDate->format('Y'); 
    $month = $parsedDate->format('m');
    $lastDayOfMonth = date('t', strtotime($year . '-' . $month . '-01'));
    $latestDate = \DateTime::createFromFormat('Y-m-d', $year . '-' . $month . '-' . $lastDayOfMonth);
    // currentday and current day of week 
    // not sure if latest means current so this why  added
    $currentday = date('d');
    $currentDayOfWeek = date('l');
    echo date('t');
    $dayOfWeek = $latestDate->format('l');
    
    return [
        'day' => $lastDayOfMonth,
        'dayOfWeek' => $dayOfWeek,
        'currentDay' => $currentday,
        'currentDayOfWeek' => $currentDayOfWeek
    ];
}

$latestDay = getLatestDayOfMonth('07-07-2023');

print_r($latestDay);

function printStringInFrame($str) {
    $words = explode(" ", $str);
    $maxLength = max(array_map('strlen', $words));
    $frameWidth = $maxLength + 4;

    echo str_repeat("*", $frameWidth) .PHP_EOL;
    foreach ($words as $word) {
        $padding = $maxLength - strlen($word);
        echo "* " . $word . str_repeat(" ", $padding) . " *" . PHP_EOL;
    }
    echo str_repeat("*", $frameWidth) . PHP_EOL;
}

$string = "Good luck with the test";
printStringInFrame($string);