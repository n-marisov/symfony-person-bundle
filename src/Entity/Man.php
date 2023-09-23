<?php

namespace Maris\Symfony\Person\Entity;

use Maris\interfaces\Person\Model\GenderInterface;
use Maris\Symfony\Person\Model\Gender;

class Man extends Person
{
    public function getGender(): GenderInterface
    {
        return Gender::MAN;
    }
}