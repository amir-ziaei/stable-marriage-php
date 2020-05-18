<?php

Class Person
{
    public $key;
    public $preferences = [];
    public $match = NULL;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function add_preference($person)
    {
        $this->preferences[] = $person;
    }

    public function is_single()
    {
        return (gettype($this->match) === "object") ? FALSE : TRUE;
    }

    public function match($person)
    {
        $this->match = $person;
    }

    public function dismatch()
    {
        $this->match = NULL;
    }

    public function display()
    {
        echo $this->key." => ".$this->match->key."\n";
    }

}
