<?php

//Task 1
class First
{
    public $letter = 'A';
    public function getClassname()
    {
        echo 'First' . '</br>';
    }

    public function getLetter()
    {
        echo $this->letter . '</br>';
    }
}
class Second extends First{
    public function getClassname()
    {
        echo 'Second' . '</br>';
    }
    public $letter = 'B';
}

$First = new First();
$Second = new Second();
$First->getClassname();
$Second->getClassname();
$First->getLetter();
$Second->getLetter();
