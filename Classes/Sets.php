<?php

Class Sets
{

    protected $sets = [];



    public function __construct($sets)
    {
        $this->sets = $sets;
    }

    public function objectToArray($d) {
        if (is_object($d)) {
            // Gets the properties of the given object
            // with get_object_vars function
            $d = get_object_vars($d);
        }
		
        if (is_array($d)) {
            /*
            * Return array converted to object
            * Using __FUNCTION__ (Magic constant)
            * for recursive call
            */
            return array_map(__FUNCTION__, $d);
        }
        else {
            // Return array
            return $d;
        }
    }


    public function is_done()
    {

        $array = json_decode(json_encode($this->sets['set_1']), TRUE);

        return (in_array(NULL, array_column($array,'match'))) ? FALSE : TRUE;

    }


    public function run_matching()
    {

        while( ! $this->is_done() )
        //for($i=0;$i<5;$i++)
        {
            foreach($this->sets['set_1'] as $person) //catching people from set_1 (proposers)
            {
                if( ! $person->is_matched() ) //if the person is single
                {

                    foreach( $person->preferences as $match ) //catching the preferences of the person
                    {

                            if(  $match->is_matched()  ) //if the wished person is already taken
                            {
                                $pos_this_person = array_search($person->key, $match->preferences);
                                $pos_old_person = array_search($match->match, $match->preferences);
                                if(  $pos_this_person  <    $pos_old_person  )
                                {
                                    $this->sets['set_1'][$match->match]->match = NULL;
                                    $match->match = $person->key;
                                    $person->match = $match->key;
                                    break;
                                }
                                //else we move on and do nothing
                            }
                            else //if the person is single
                            {
                                $match->match = $person->key;
                                $person->match = $match->key;
                                break;
                            }

                    }

                }
            }
        }

    }

    public function display_results()
    {
        echo "<ul>";
        foreach($this->sets['set_1'] as $person)
            echo "<li><strong>".$person->key."</strong> ---> ".$person->match."</li>";
        echo "</ul>";
    }


}