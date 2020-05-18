<?php

Class Person
{
    static $index = 0;
    public $key;
    public $preferences = [];
    public $match = NULL;
    public $id;

    public function __construct($key)
    {
        $this->key = $key;
        $this->id = ++self::$index;
    }

    public function add_preference($person)
    {
        if($this->id !== $person->id)
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

}
