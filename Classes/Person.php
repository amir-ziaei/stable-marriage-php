<?php

Class Person
{

    public $key;
    public $preferences = [];
    public $match;


    public function __construct($key)
    {
        $this->key = $key;
    }

    public function set_preferences($person)
    {
        $this->preferences[] = $person;
    }

    public function is_matched()
    {
        return ($this->match != '') ? TRUE : FALSE;
    }
    
    public function set_match($match)
    {
        $this->match = $match;
    }

}