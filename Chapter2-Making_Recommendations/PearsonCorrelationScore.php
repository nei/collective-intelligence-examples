<?php

$critics = require 'critics.php';

// Euclidean distance
function similarityScore($preferences, $person1, $person2): float
{
    $commonVotes = [];
    foreach($preferences[$person1] as $p1Movie => $p1Vote) {
        foreach($preferences[$person2] as $p2Movie => $p2Vote) {
            if ($p1Movie == $p2Movie) {
                $commonVotes[$p1Movie] = 1;
            }
        }
    }

    if (empty($commonVotes)) {
        return 0;
    }

    $person1Sum = $person2Sum = $sum1Square = $sum2Square = $pSum = 0;
    $n = count($commonVotes);
    foreach($commonVotes as $movie => $shared) {
        //Add up all the preferences
        $person1Sum += $preferences[$person1][$movie];
        $person2Sum += $preferences[$person2][$movie];

        //Sum up the squares
        $sum1Square += pow($preferences[$person1][$movie],2);
        $sum2Square += pow($preferences[$person2][$movie],2);

        //Sum up the products
        $pSum += $preferences[$person1][$movie] * $preferences[$person2][$movie];
    }

    //Calculate Pearson score
    $num = $pSum - (($person1Sum * $person2Sum) / $n);
    $den = sqrt(($sum1Square - (pow($person1Sum,2)/$n)) * ($sum2Square - (pow($person2Sum,2)/$n)));

    return ($den == 0) ? 0 : ($num/$den);
}

$rank = [];
$people = array_keys($critics);
foreach ($people as $i => $person1) {
    foreach ($people as $j => $person2) {
        if ($person1 !== $person2 and !in_array($person2.$person1, array_keys($rank))) {
            $rank[$person1.$person2] = [
                'person1' => $person1,
                'person2' => $person2,
                'score' => similarityScore($critics, $person1, $person2)
            ];

        }
    }
}

usort($rank, function($a, $b) {
    return $b['score'] <=> $a['score'];
});

array_walk($rank, function($data) {
   echo sprintf('%s, %s, %f', $data['person1'], $data['person2'], $data['score']).PHP_EOL;
});