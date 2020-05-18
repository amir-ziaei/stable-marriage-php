# stable-marriage-php

PHP Implementation of Stable Marriage Problem

## Usage

The configuration is pretty simple... all you have to do is to open config.php, and edit it based on your problem.

![Random stable marriage problem](https://i.ibb.co/whjMz0K/Screen-Shot-2020-04-07-at-8-37-44-AM.png)

For example, for a problem like above the proper code should be as follows:

```php
$group1_members_keys = "1,2,3,4,5,6";
$group2_members_keys = "A,B,C,D,E,F";

$groups = [
    // preferences lists
    '1' => [
        'B,A,C,F,D,E',
        'F,E,A,C,B,D',
        'E,B,D,A,C,F',
        'E,F,C,A,B,D',
        'A,B,C,E,F,D',
        'E,C,A,B,F,D',
    ],
    '2' => [
        '6,3,4,1,2,5',
        '2,3,1,4,6,5',
        '6,1,5,4,3,2',
        '2,3,6,4,1,5',
        '3,6,1,2,5,4',
        '6,2,3,4,1,5',
    ]
];
```
