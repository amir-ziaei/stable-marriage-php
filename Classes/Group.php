<?php

class Group
{

    public $members = [];


    public function add_member($member)
    {
        $this->members[] = $member;
    }

    public function get_member($key)
    {
        foreach ($this->members as $person)
            if ($person->key == $key)
                return $person;
    }

    public function get_single_members()
    {
        $singles = [];
        foreach ($this->members as $member)
            if ($member->is_single())
                $singles[] = $member;

        return $singles;
    }

    public function has_single()
    {
        foreach ($this->members as $person)
            if ($person->is_single())
                return TRUE;

        return FALSE;
    }

    public function display()
    {
        foreach ($this->members as $member)
            $member->display();
    }

}
