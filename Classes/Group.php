<?php

Class Group
{

    public $members = [];


    public function add_member($member)
    {
        $this->members[] = $member;
    }

    public function member($key)
    {
        foreach($this->members as $person)
            if($person->key == $key)
                return $person;
    }

    public function get_single_memebers()
    {
        $return = [];
        foreach($this->members as $person)
            if($person->is_single())
                $return[] = $person;
        return $return;
    }


    public function has_single()
    {
        $has_single = FALSE;
        foreach ($this->members as $person)
            if( $person->is_single() )
                $has_single = TRUE;

        return $has_single;
    }

    public function display()
    {
        foreach($this->members as $person)
            print_r($person->key." -> ".$person->match->key."\n");
    }

}
