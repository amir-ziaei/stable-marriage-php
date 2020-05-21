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
        foreach ($this->members as $person)
            if( $person->is_single() )
                return TRUE;
        return FALSE;
    }

    public function display()
    {
        foreach($this->members as $person)
            $person->display();
    }

}
