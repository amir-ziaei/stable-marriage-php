<?php

$set_1_keys = explode(',',$set_1_keys);
$set_2_keys = explode(',',$set_2_keys);

if(count($set_1_keys) != count($set_2_keys))
    throw new Exception('Length of sets must be equal.');


for($i=0; $i<count($set_1_keys); $i++)
    $data['set_1'][$set_1_keys[$i]]  = new Person($set_1_keys[$i]);

for($i=0; $i<count($set_1_keys); $i++)
    $data['set_2'][$set_2_keys[$i]]  = new Person($set_2_keys[$i]);


$i = 0;
foreach($data['set_1'] as $person)
{
    $preferences = explode(',',$sets['set_1'][$i]);
    foreach($preferences as $preference)
        $person->set_preferences($data['set_2'][$preference]);
    $i++;
}

$i = 0;
foreach($data['set_2'] as $person)
{
    $preferences = explode(',',$sets['set_2'][$i]);
    foreach($preferences as $preference)
        $person->set_preferences($data['set_1'][$preference]->key);
    $i++;
}