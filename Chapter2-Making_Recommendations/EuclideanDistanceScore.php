<?php

class EuclideanDistanceScore
{
    public function score($preferences, $person1, $person2): float
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
}