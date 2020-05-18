<?php

class SMP
{
    protected $group1;
    protected $group2;

    public function __construct($group1,$group2)
    {
        $this->group1 = $group1;
        $this->group2 = $group2;
    }

    protected function is_done()
    {
        return ($this->group1->has_single()) ? FALSE : TRUE;
    }

    protected function get_pos($obj, $array)
    {
        // calculating position of an object within array
        foreach ($array as $key => $element) {
            if($element === $obj)
                return $key;
        }
    }

    protected function match($person1, $person2) {
        $person1->match($person2);
        $person2->match($person1);
    }

    protected function match_with_break_up($person1, $person2) {
        $person1->match->dismatch(); // make the old person single
        $person1->match($person2);
        $person2->match($person1);
    }

    protected function run_matching()
    {
        // until the single members remain
        while( ! $this->is_done() )
        {
            foreach( $this->group1->get_single_memebers() as $proposer ) //looping over the singles in group1
            {
                    foreach( $proposer->preferences as $crush ) //catching the preferences of the proposer
                    {

                            if(  ! $crush->is_single()  ) //if the crush of the proposer is already taken
                            {
                                $pos_new_proposer = $this->get_pos($proposer, $crush->preferences);
                                $pos_old_proposer = $this->get_pos($crush->match, $crush->preferences);
                                if(  $pos_new_proposer  <    $pos_old_proposer  ) // if the crush likes the proposer more than the previous match
                                {
                                    $this->match_with_break_up($crush,$proposer);
                                    break;
                                }
                            }
                            //if the person is single
                            else
                            {
                                $this->match($crush,$proposer);
                                break;
                            }

                    }
            }
        }

    }

    public function resolve()
    {
        $this->run_matching();
        $this->group1->display();
    }
}
