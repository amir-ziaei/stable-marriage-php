<?php


$_data = [
    0 => [
        "1" => "B,A,C,F,D,E",
        "2" => "F,E,A,C,B,D",
        "3" => "E,B,D,A,C,F",
        "4" => "E,F,C,A,B,D",
        "5" => "A,B,C,E,F,D",
        "6" => "E,C,A,B,F,D",
    ],
    1 => [
        "A" => "6,3,4,1,2,5",
        "B" => "2,3,1,4,6,5",
        "C" => "6,1,5,4,3,2",
        "D" => "2,3,6,4,1,5",
        "E" => "3,6,1,2,5,4",
        "F" => "6,2,3,4,1,5",
    ],
];

function is_available($array)
{
    $is_available = true;
    $size = count($array);
    for($i=0; $i<$size; $i++)
        if($array[$i])
            $is_available = false;
    return $is_available;
}

function remain_in_loop($array)
{
    $size = count($array);
    for($i=1;$i<=$size;$i++)
        if(!in_array(true,$array[$i]))
            return true;
    return false;
}

function is_matched($array)
{
    return in_array(true,$array) ? true : false;
}

function getTheMatch($preferencesList)
{
    return array_search(true, $preferencesList);
}

for($i=0; $i<=1; $i++)
{
    foreach($_data[$i] as $person => $preferences)
    {
        $preferences = explode(',', $preferences);
        foreach($preferences as $preference)
            $data[$i][$person][$preference] = false;
    }
}

function getPosition($person1, $person2sList)
{
    return array_search($person1, array_keys($person2sList));
}


//die(var_dump());



while(remain_in_loop($data[0])) //remain in the loop until everyone has a match
{
    foreach($data[0] as $person => $preferences) //grab the first person from proposers
    {
        if(!is_matched($preferences)) //is the person already engaged?
        {
            foreach($preferences as $preference => $value) //get each preferences of them
            {
                $theCrush = $data[1][$preference]; //call it their crush
                //die(var_dump($theCrush));

                if(is_matched($theCrush)) //if the crush has already been engaged
                {
                    $previousPerson = getTheMatch($theCrush); //get the crush's person
                    if(getPosition($person,$theCrush) > getPosition($previousPerson, $theCrush)) //compare our new guy with it
                    {
                        //replacing the match
                        $data[0][$previousPerson][$preference] = false;
                        $data[0][$person][$preference] = true;
                        $data[1][$preference][$person] = true;
                        break;
                    }
                }
                else
                {
                    //make the match with our person
                    
                    $data[0][$person][$preference] = true;
                    $data[1][$preference][$person] = true;
                    break;
                }
            }
        } 
    }
}

?>