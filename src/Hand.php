<?php
declare(strict_types=1);

namespace DrPoker;

/**
 * Class Hand
 * @package DrPoker
 */
class Hand
{

    /**
     * @param string $hands
     * @return array
     */
    public static function evaluate(string $hands) : array
    {

        $score = [];

        $hands = explode(PHP_EOL, $hands);

        foreach ($hands as $handKey => $handValues) {
            $game = self::score(
                explode(" ", $handValues)
            );

            $score[$handKey] = [$game[0], $game[1], $handValues];
        }

        uasort($score, function($a,$b){
            $c = $b[0] - $a[0];
            $c .= $b[1] - $a[1];
            return $c;
        });

        return $score;
    }

    /**
     * @param array $hand
     * @return array
     */
    private static function score(array $hand): array
    {
        $hands = preg_replace("/10/", "T", $hand);
        $noSuitsHands = preg_replace("/♥|♣|♦|♠/", "", $hands);

        $ranks = '23456789TJQKA';

        $countedRanks = array_count_values($noSuitsHands);

        $score = [];
        $rankds = [];

        foreach ($countedRanks as $key => $value) {
            $score[] = $value;
            $rankds[] = strpos($ranks, (string)$key);
        }

        arsort($score);
        arsort($rankds);

        if ([$rankds[0],$rankds[1]] === [12, 3]) {
            $rankds = [3, 2, 1, 0, 12];
        }

        $flush = false;
        $straight = false;

        if(isset($rankds[4])) {
            $straight = ($rankds[4] - $rankds[0] === 4 || $rankds[0] - $rankds[4] === 4);
        }

        $suits = array_map(function($v) {
            return mb_substr($v, 1, 2, "UTF-8");
        }, $hands);

        $flush = count(array_unique($suits)) === 1;

        if ($flush && $straight) {
            $score = 50;
        } elseif ($flush && !$straight) {
            $score = 31;
        } elseif (!$flush && $straight) {
            $score = 30;
        }else{
            $number = implode("",$score);
            $score = substr($number,0 ,2);
        }

        return [
            $score, array_sum($rankds),
        ];
    }
}