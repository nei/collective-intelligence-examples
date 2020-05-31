<?php

include 'EuclideanDistanceScore.php';
include 'PearsonCorrelationScore.php';

$critics = require 'critics.php';

function generateRank($critics, $methodRank): array {
    $rank = [];
    $people = array_keys($critics);
    foreach ($people as $i => $person1) {
        foreach ($people as $j => $person2) {
            if ($person1 !== $person2 and !in_array($person2.$person1, array_keys($rank))) {
                $rank[$person1.$person2] = [
                    'person1' => $person1,
                    'person2' => $person2,
                    'score' => $methodRank->score($critics, $person1, $person2)
                ];

            }
        }
    }

    usort($rank, function($a, $b) {
        return $b['score'] <=> $a['score'];
    });

    return $rank;
}

echo '--- Euclidean Distance Score ------------'.PHP_EOL;
$rank1 = generateRank($critics, new EuclideanDistanceScore());
array_walk($rank1, function($data) {
    echo sprintf('%s, %s, %f', $data['person1'], $data['person2'], $data['score']).PHP_EOL;
});

echo PHP_EOL;

echo '--- Pearson Correlation Score ------------'.PHP_EOL;
$rank2 = generateRank($critics, new PearsonCorrelationScore());
array_walk($rank2, function($data) {
    echo sprintf('%s, %s, %f', $data['person1'], $data['person2'], $data['score']).PHP_EOL;
});

echo PHP_EOL;

function compareMoveis($critics, $person1, $person2) {
    return array_diff(array_keys($critics[$person1]), array_keys($critics[$person2]));
}

echo 'Movies suggestions for the top 3 from the rank based on Pearson\'s method:' .PHP_EOL;
foreach((array_slice($rank2, 0, 3)) as $common){

    $diff1 = compareMoveis($critics, $common['person1'], $common['person2']);
    foreach ($diff1 as $movieSuggestion) {
        echo sprintf('%s is most likely to %s "%s" from %s',
                $common['person2'],
                ($critics[$common['person1']][$movieSuggestion] >= 3) ? 'enjoy' : 'dislike',
                $movieSuggestion,
                $common['person1']
            ).PHP_EOL;
    }

    $diff2 = compareMoveis($critics, $common['person2'], $common['person1']);
    foreach ($diff2 as $movieSuggestion) {
        echo sprintf('%s is most likely to %s "%s" from %s',
                $common['person1'],
                ($critics[$common['person2']][$movieSuggestion] >= 3) ? 'enjoy' : 'dislike',
                $movieSuggestion,
                $common['person2']
            ).PHP_EOL;
    }


};