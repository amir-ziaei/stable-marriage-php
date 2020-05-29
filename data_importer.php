<?php

$group1_members_keys = explode(',',$group1_members_keys);
$group2_members_keys = explode(',',$group2_members_keys);

if(count($group1_members_keys) != count($group2_members_keys))
    throw new Exception('Length of the groups must be equal.');

$group1 = new group();
$group2 = new group();

foreach ($group1_members_keys as $key)
    $group1->add_member(new Person($key));

foreach ($group2_members_keys as $key)
    $group2->add_member(new Person($key));

$i = 0;
foreach ($group1->members as $person) {
    $preferences = explode(',',$groups['1'][$i]);
    foreach ($preferences as $preference)
        $person->add_preference($group2->get_member($preference));
    $i++;
}

$i = 0;
foreach ($group2->members as $person) {
    $preferences = explode(',',$groups['2'][$i]);
    foreach ($preferences as $preference)
        $person->add_preference($group1->get_member($preference));
    $i++;
}
