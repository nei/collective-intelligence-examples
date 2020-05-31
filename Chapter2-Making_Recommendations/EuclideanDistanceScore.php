<?php

require 'critics.php';

// Euclidean distance
function similarityScore($preferences, $person1, $person2): float
{
    $commonVotes = [];
    foreach($preferences[$person1] as $p1Movie => $p1Vote) {
        foreach($preferences[$person2] as $p2Movie => $p2Vote) {
            if($p1Movie == $p2Movie) {
                $commonVotes[$p1Movie] = 1;
            }
        }
    }

    if (empty($commonVotes)) {
        return 0;
    }

    $sum = array_reduce(array_keys($commonVotes), function($sum, $movie) use ($preferences, $person1, $person2) {
        $sum += pow($preferences[$person1][$movie]-$preferences[$person2][$movie],2);
        return $sum;
    }, 0);

    $euclideanDistance = 1/(1 + sqrt($sum));

    return $euclideanDistance;
}

$rank = [];
$people = array_keys($critics);
foreach ($people as $i => $person1) {
    foreach ($people as $j => $person2) {
        if ($person1 !== $person2){
            $rank[] = [
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
   echo sprintf('(%s) and (%s) has similarity score of %f', $data['person1'], $data['person2'], $data['score']).PHP_EOL;
});