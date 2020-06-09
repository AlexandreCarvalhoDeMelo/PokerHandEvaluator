# Poker hand evaluator

Requirements: 
* PHP 7.2
* PHPUnit (dev)

### Installation

Just run composer install and give the file permissions:
```
composer install
sudo chmod +x validator
```

Run
```
./validator hands.txt
```

###Sample output
```
Sorted result:
A♥ K♥ Q♥ J♥ 10♥
5♦ 6♦ 7♦ 8♦ 9♦
J♥ J♦ J♣ J♠ A♠
10♠ 10♣ 10♦ 2♠ 2♥
K♣ 10♣ 9♣ 7♣ 6♣
8♣ 8♠ 8♥ J♠ 5♥
2♣ 3♥ 4♦ 5♠ 6♠
Q♣ Q♠ 4♠ 4♥ A♣
K♠ K♦ 6♥ 2♦ 3♣
A♠ 10♦ 9♥ 6♦ 4♣
A♠ J♦ 9♥ 5♦ 3♣
A♦ 9♠ 7♠ 5♠ 3♦

```

####note
Quite fun test to do : )