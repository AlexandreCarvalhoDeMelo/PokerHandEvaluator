<?php
declare(strict_types=1);

namespace DrPoker\Test\Integration;

use DrPoker\Hand;
use PHPUnit\Framework\TestCase;

/**
 * Class HandEvaluatorTest
 *
 * @package DrPoker\Tests\Integration
 */
class HandEvaluatorTest extends TestCase
{

    public function test()
    {
        $data = '8♣ 8♠ 8♥ J♠ 5♥
Q♣ Q♠ 4♠ 4♥ A♣
A♦ 9♠ 7♠ 5♠ 3♦
A♠ 10♦ 9♥ 6♦ 4♣
A♠ J♦ 9♥ 5♦ 3♣
K♠ K♦ 6♥ 2♦ 3♣
A♥ K♥ Q♥ J♥ 10♥
2♣ 3♥ 4♦ 5♠ 6♠
K♣ 10♣ 9♣ 7♣ 6♣
10♠ 10♣ 10♦ 2♠ 2♥
J♥ J♦ J♣ J♠ A♠
5♦ 6♦ 7♦ 8♦ 9♦';

        $expected = [
            'A♥ K♥ Q♥ J♥ 10♥',
            '5♦ 6♦ 7♦ 8♦ 9♦',
            'J♥ J♦ J♣ J♠ A♠',
            '10♠ 10♣ 10♦ 2♠ 2♥',
            'K♣ 10♣ 9♣ 7♣ 6♣',
            '8♣ 8♠ 8♥ J♠ 5♥',
            '2♣ 3♥ 4♦ 5♠ 6♠',
            'Q♣ Q♠ 4♠ 4♥ A♣',
            'K♠ K♦ 6♥ 2♦ 3♣',
            'A♠ 10♦ 9♥ 6♦ 4♣',
            'A♠ J♦ 9♥ 5♦ 3♣',
            'A♦ 9♠ 7♠ 5♠ 3♦'];

        $sortedData = Hand::evaluate($data);

        $position = 0;
        foreach ($sortedData as $hand) {
            self::assertEquals($expected[$position], $hand[2]);
            $position++;
       }
    }

}